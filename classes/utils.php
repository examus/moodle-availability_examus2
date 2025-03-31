<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Availability plugin for integration with Examus.
 *
 * @package    availability_examus2
 * @copyright  2019-2022 Maksim Burnin <maksim.burnin@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace availability_examus2;

defined('MOODLE_INTERNAL') || die();

/**
 * Utils class
 */
class utils {

    const TOKEN_TIMEOUT = 3 * 60 * 60 * 24;
    /**
     * Provides logict for proctoring fader, exist as soon a possible if
     * no protection is reqired.
     * @param \stdClass $attempt Attempt
     */
    public static function handle_proctoring_fader($attempt) {
        global $DB, $OUTPUT, $PAGE, $USER;

        $cache = \cache::make_from_params(\cache_store::MODE_SESSION, 'availability_examus2', 'session');

        $cmid = state::$attempt['cm_id'];
        $courseid = state::$attempt['course_id'];

        $modinfo = get_fast_modinfo($courseid);
        $cm = $modinfo->get_cm($cmid);
        $course = $cm->get_course();

        $condition = condition::get_examus2_condition($cm);

        if (!$condition) {
            return '';
        }

        // We want to let previews to happen without proctoring.
        $quizobj = \quiz::create($cm->instance, $USER->id);
        if ($quizobj->is_preview_user()) {
            return '';
        }

        if (!$condition->user_in_examus2ed_groups($USER->id)) {
            return '';
        }

        $entry = common::create_entry($condition, $USER->id, $cm);

        $accesscode = $cache->get('accesscode');
        if ($accesscode && $entry->accesscode != $accesscode) {
            $cache->delete('accesscode');
            $cache->set('reset', true);
        }

        $timebracket = common::get_timebracket_for_cm('quiz', $cm);
        $lang = current_language();

        $client = new client($condition, $USER->id);
        $data = $client->exam_data($course, $cm);
        $userdata = $client->user_data($USER, $lang);
        $biometrydata = $client->biometry_data($USER);

        $timedata = $client->time_data($timebracket);
        $pageurl = $PAGE->url;
        $pageurl->param('examus2_accesscode', $entry->accesscode);
        $attemptdata = $client->attempt_data($entry->accesscode, $pageurl->out(false));

        $data = array_merge($data, $userdata, $timedata, $attemptdata, $biometrydata);

        if ($condition->schedulingrequired && empty($entry->timescheduled)) {
            $data['schedule'] = true;
        }

        $entryisactive = in_array($entry->status, ['started', 'scheduled', 'new']);
        $attemptinprogess = $attempt && $attempt->state == \quiz_attempt::IN_PROGRESS;

        if ($entryisactive || $attemptinprogess) {
            // We have to pass formdata in any case because exam can be opened outside iframe.
            $formdata = $client->get_form('start', $data);
            $entryreset = $cache->get('reset');

            // Our entry is active, we are showing user a fader.
            $PAGE->requires->js_call_amd('availability_examus2/fader', 'init', [
                isset($formdata) ? $formdata : null,
                $entryreset ? true : false
            ]);
        }
    }

    /**
     * When attempt is started, see if we are in proctoring, reset old entries,
     * redirect to proctoring if needed
     * @param \stdClass $course course
     * @param \stdClass $cm cm
     * @param \stdClass $user user
     */
    public static function handle_start_attempt($course, $cm, $user) {
        global $DB, $OUTPUT;

        $cache = \cache::make_from_params(\cache_store::MODE_SESSION, 'availability_examus2', 'session');

        $modinfo = get_fast_modinfo($course->id);
        $cminfo = $modinfo->get_cm($cm->id);

        $condition = condition::get_examus2_condition($cminfo);
        if (!$condition) {
            return;
        }

        // We want to let previews to happen without proctoring.
        $quizobj = \quiz::create($cminfo->instance, $user->id);
        if ($quizobj->is_preview_user()) {
            return;
        }

        if (!$condition->user_in_examus2ed_groups($user->id)) {
            return;
        }

        $accesscode = $cache->get('accesscode');
        $entry = null;
        $reset = false;
        if ($accesscode) {
            $entry = $DB->get_record('availability_examus2_entries', [
                'accesscode' => $accesscode,
            ]);

            // Entry is old.
            if ($entry && !in_array($entry->status, ['new', 'scheduled', 'started'])) {
                $reset = true;
            }

            // Entry belongs to other cm.
            if ($entry && $entry->cmid != $cminfo->id) {
                $reset = true;
            }

            if (!$entry) {
                $reset = true;
            }

            if ($reset) {
                $cache->delete('accesscode');
                $cache->set('reset', true);
            }

            // We don't want to redirect at this stage.
            // Because its possible that the user is working through Web-app.
            return;
        } else {
            $entry = common::create_entry($condition, $user->id, $cminfo);
        }

        // The attempt is already started, letting it open.
        if ($entry->status == 'started') {
            return;
        }

        $timebracket = common::get_timebracket_for_cm('quiz', $cminfo);

        $urlparams = ['examus2_accesscode' => $entry->accesscode];

        $tokenvaliduntil = time() + self::TOKEN_TIMEOUT;
        $urlparams['token'] = get_user_key('availability_examus2', $user->id, null, false, $tokenvaliduntil);

        $location = new \moodle_url('/availability/condition/examus2/entry.php', $urlparams);

        $lang = current_language();

        $client = new \availability_examus2\client($condition, $user->id);
        $data = $client->exam_data($course, $cminfo);
        $userdata = $client->user_data($user, $lang);
        $biometrydata = $client->biometry_data($user);
        $timedata = $client->time_data($timebracket);
        $attemptdata = $client->attempt_data($entry->accesscode, $location->out(false));

        $data = array_merge($data, $userdata, $timedata, $attemptdata, $biometrydata);

        if ($condition->schedulingrequired) {
            $data['schedule'] = true;
        }

        $formdata = $client->get_form('start', $data);

        $data = [
            'action' => $formdata['action'],
            'method' => $formdata['method'],
            'token' => isset($formdata['token']) ? $formdata['token'] : null
        ];
        echo $OUTPUT->render_from_template('availability_examus2/redirect', $data);
        die();
    }

    /**
     * If accesscode param is provided, find entry, handle it's state.
     * @param string $accesscode Accesscode/SessionId value
     */
    public static function handle_accesscode_param($accesscode) {
        global $DB;

        $cache = \cache::make_from_params(\cache_store::MODE_SESSION, 'availability_examus2', 'session');

        // User is coming from examus2, reset is done if it was requested before.
        $cache->delete('reset');

        $cache->set('accesscode', $accesscode);

        // We know accesscode is passed in params.
        $entry = $DB->get_record('availability_examus2_entries', [
            'accesscode' => $accesscode,
        ]);

        // If entry exists, we need to check if we have a newer one.
        if ($entry) {
            $modinfo = get_fast_modinfo($entry->courseid);
            $cminfo = $modinfo->get_cm($entry->cmid);

            $condition = \availability_examus2\condition::get_examus2_condition($cminfo);
            if (!$condition) {
                return;
            }

            $newentry = \availability_examus2\common::most_recent_entry($entry);
            if ($newentry && $newentry->id != $entry->id) {
                $entry = $newentry;
                $cache->set('reset', true);
            }

            $modinfo = get_fast_modinfo($entry->courseid);
            $cminfo = $modinfo->get_cm($entry->cmid);

            // The entry is already finished or canceled, we need to reset it.
            if (!in_array($entry->status, ['new', 'scheduled', 'started'])) {
                $entry = \availability_examus2\common::create_entry($condition, $entry->userid, $cminfo);
                $cache->set('reset', true);
            }
        } else {
            // If entry does not exist, we need to create a new one and redirect.
            $cache->set('reset', true);
        }

        if ($entry) {
            $quizurl = new \moodle_url('/mod/quiz/view.php', ['id' => $cminfo->id]);
            redirect($quizurl);
            exit;
        } else {
            throw new \moodle_exception('error_no_entry_found', 'availability_examus2');
        }
    }
}
