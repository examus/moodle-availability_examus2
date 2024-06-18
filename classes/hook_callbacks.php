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

namespace availability_examus2;

use availability_examus2\state;
use availability_examus2\utils;

/**
 * Hook callbacks for availability_examus2.
 *
 * @package    availability_examus2
 * @copyright  2024 Evgenii Soldatkin <e.v.soldatkin@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class hook_callbacks {
    /**
     * Hooks into head rendering. Adds proctoring fader/shade and accompanying javascript
     * This is used to prevent users from seeing questions before it is known that
     * attempt is viewed thorough Examus WebApp
     *
     * @param \core\hook\output\before_standard_head_html_generation $hook
     */
    public static function before_standard_head_html_generation(\core\hook\output\before_standard_head_html_generation $hook) {
        global $DB;
        // If there is no active attempt, do nothing.
        if (isset(state::$attempt['attempt_id'])) {
            $attemptid = state::$attempt['attempt_id'];
            $attempt = $DB->get_record('quiz_attempts', ['id' => $attemptid]);
            if ($attempt && $attempt->state == \quiz_attempt::IN_PROGRESS)
                $hook->add_html(utils::handle_proctoring_fader($attempt));
        }
    }
}
