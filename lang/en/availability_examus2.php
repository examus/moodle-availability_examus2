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

defined('MOODLE_INTERNAL') || die();

$string['examus2:logaccess'] = 'Examus log access';
$string['examus2:logaccess_course'] = 'Examus log access for course';
$string['examus2:logaccess_all'] = 'Examus log access for all courses';

$string['description'] = 'Allows students to use Examus';
$string['pluginname'] = 'Examus';
$string['title'] = 'Examus';

$string['error_no_entry_found'] = 'No exam entry found by accesscode';
$string['error_not_in_range'] = 'This value should be between %d and %d';
$string['error_setduration'] = 'Duration must be a multiple of 30';

$string['settings_examus_url'] = 'Examus URL';
$string['settings_integration_name'] = 'Integration Name';
$string['settings_jwt_secret'] = 'JWT Secret';
$string['settings_account_name'] = 'Account Name';
$string['settings_user_emails'] = 'Send user emails to Examus';

$string['description_examus2'] = 'You will be redirected to Examus';
$string['description_no_webservices'] = 'Can not be accessed via Moodle mobile app';

$string['settings'] = 'Integration settings';
$string['log_section'] = 'Examus log';
$string['status'] = 'Status';
$string['module'] = 'Module';
$string['new_entry'] = 'New entry';
$string['new_entry_force'] = 'New entry';
$string['duration'] = 'Duration in minutes (a multiple of 30)';
$string['log_review'] = 'Review';
$string['log_archive_link'] = 'Video';
$string['log_report_link'] = 'Report';
$string['log_attempt'] = 'Attempt';
$string['log_attempt_missing'] = 'deleted';

$string['new_entry_created'] = 'New entry created';
$string['entry_exist'] = 'New entry already exist';
$string['date_modified'] = 'Date of last change';

$string['proctoring_mode'] = 'Examusing mode';
$string['online_mode'] = 'Real-time proctoring';
$string['offline_mode'] = 'Post-review';
$string['auto_mode'] = 'Fully automated';
$string['identification_mode'] = 'Live identification';

$string['identification'] = 'Identification mode';
$string['face_passport_identification'] = 'Face & Passport';
$string['passport_identification'] = 'Passport';
$string['face_identification'] = 'Face';
$string['skip_identification'] = 'Skip';

$string['web_camera_main_view'] = 'Main webcam view';
$string['web_camera_main_view_front'] = 'Front';
$string['web_camera_main_view_side'] = 'Side';

$string['select_groups'] = 'Use proctoring only for selected groups';
$string['select_groups_desc'] = 'Proctoring will be started for each selected group (marked with a check mark), and not be started for all those who aren`t marked. If you don`t select any group, then proctoring will be started for all participants of the course';

$string['is_trial'] = 'Trial exam';
$string['auxiliary_camera'] = 'Auxiliary camera (mobile) ';
$string['auxiliary_camera_mode'] = 'Auxiliary camera mode';
$string['auxiliary_camera_mode_photo'] = 'Photo';
$string['auxiliary_camera_mode_video'] = 'Video';
$string['enable_ldb'] = 'Require locked down browser';
$string['allowmultipledisplays'] = 'Allow to use multiple displays';
$string['facehuntingenabled'] = 'Allow to use face hunting';
$string['allowmobiledevices'] = 'Allow mobile devices';
$string['allowvirtualenvironment'] = 'Allow to use virtual machines';
$string['checkidphotoquality'] = 'Check the quality of ID photo';

$string['rules'] = "Rules";
$string['custom_rules'] = "Custom rules";
$string['desktop_app_forbidden_processes'] = 'Prohibited processes';
$string['desktop_app_allowed_processes'] = 'Allowed processes';

$string['user_agreement_url'] = "User agreement URL";

$string['biometry_header'] = 'Biometric identification settings';
$string['biometry_enabled'] = 'Enable biometric identification';
$string['biometry_skipfail'] = 'Allow user to continue on failure of identification';
$string['biometry_flow'] = 'Verification flow name';
$string['biometry_theme'] = 'Theme';

$string['time_scheduled'] = 'Scheduled';
$string['time_finish'] = 'Attempt finished at';

$string['auto_rescheduling'] = 'Automatic reset for missed exams';
$string['enable'] = 'Enable';

$string['allow_to_use_websites'] = 'Allow to use websites';
$string['allow_to_use_books'] = 'Allow to use books';
$string['allow_to_use_paper'] = 'Allow to use paper';
$string['allow_to_use_messengers'] = 'Allow to use messengers';
$string['allow_to_use_calculator'] = 'Allow to use calculator';
$string['allow_to_use_excel'] = 'Allow to use excel';
$string['allow_to_use_human_assistant'] = 'Allow to use human assistant';
$string['allow_absence_in_frame'] = 'Allow absence in frame';
$string['allow_voices'] = 'Allow voices';
$string['allow_wrong_gaze_direction'] = 'Allow wrong gaze direction';

$string['scoring_params_header'] = 'Scoring params';
$string['scoring_cheater_level'] = 'Cheater threshold';
$string['scoring_extra_user'] = 'An extra person in frame';
$string['scoring_user_replaced'] = 'The student is replaced';
$string['scoring_absent_user'] = 'The student is absent';
$string['scoring_look_away'] = 'Wrong gaze direction';
$string['scoring_active_window_changed'] = 'The active window is changed';
$string['scoring_forbidden_device'] = 'Forbidden hardware';
$string['scoring_voice'] = 'Microphone voice is detected';
$string['scoring_phone'] = 'A phone is used';

$string['status_new'] = 'New';
$string['status_started'] = 'Started';
$string['status_unknown'] = 'Unknown';
$string['status_accepted'] = 'Accepted';
$string['status_rejected'] = 'Rejected';
$string['status_force_reset'] = 'Force reset';
$string['status_finished'] = 'Finished';
$string['status_scheduled'] = 'Scheduled';

$string['scheduling_required'] = 'A calendar entry is required';
$string['apply_filter'] = 'Apply filter';
$string['allcourses'] = 'All courses';
$string['allstatuses'] = 'All statuses';
$string['userquery'] = 'Username or Email starts with';
$string['fromdate'] = 'From date:';
$string['todate'] = 'To date:';

$string['score'] = 'Score';
$string['threshold_attention'] = 'Threshold: Attention';
$string['threshold_rejected'] = 'Threshold: Rejection';
$string['session_start'] = 'Session start';
$string['session_end'] = 'Session end';
$string['warnings'] = 'Warnings';
$string['comment'] = 'Comment';

$string['details'] = 'Details';

// Fader screen.
$string['fader_awaiting_proctoring'] = 'Checking that proctoring is running...';
$string['fader_instructions'] = '<p>It won\'t take long</p>';
$string['fader_reset'] = 'Session was reset, you need to restart the exam';

//Redirect screen
$string['redirect_btn'] = 'Go to Examus';
$string['redirect_title'] = 'Redirecting to Examus';

// Dafault settings
$string['defaults'] = 'Default proctoring settings';
$string['defaults_proctoring_settings'] = 'Examusing settings';

$string['log_details_warnings'] = 'Warnings';
$string['log_details_warning_type'] = 'Type';
$string['log_details_warning_title'] = 'Description';
$string['log_details_warning_start'] = 'Start';
$string['log_details_warning_end'] = 'End';

$string['visible_warnings'] = 'Visible warnings';

$string['warning_extra_user_in_frame'] = 'An extra person in frame';
$string['warning_substitution_user'] = 'The student is replaced';
$string['warning_no_user_in_frame'] = 'The student is absent';
$string['warning_avert_eyes'] = 'Wrong gaze direction';
$string['warning_timeout'] = 'Timeout, no connection';
$string['warning_change_active_window_on_computer'] = 'The active window is changed';
$string['warning_talk'] = 'Human voice in audiostream';
$string['warning_forbidden_software'] = 'Forbidden sites/software';
$string['warning_forbidden_device'] = 'Forbidden hardware';
$string['warning_voice_detected'] = 'Microphone voice is detected';
$string['warning_extra_display'] = 'Extra display is detected';
$string['warning_books'] = 'Books/notes are used';
$string['warning_cheater'] = 'Cheater';
$string['warning_mic_muted'] = 'Microphone is muted';
$string['warning_mic_no_sound'] = 'No sound from microphone';
$string['warning_mic_no_device_connected'] = 'Microphone is not connected';
$string['warning_camera_no_picture'] = 'No picture from camera';
$string['warning_camera_no_device_connected'] = 'Camera is not connected';
$string['warning_nonverbal'] = 'Non-verbal communication';
$string['warning_phone'] = 'Phone is used';
$string['warning_phone_screen'] = 'Phone screen detected';
$string['warning_no_ping'] = 'No connection';
$string['warning_desktop_request_pending'] = 'Desktop is not shared';

$string['privacy:path'] = 'Examus exam entries';
$string['privacy:metadata:availability_examus2_entries'] = 'List of exam entries in proctoring system';
$string['privacy:metadata:availability_examus2_entries:courseid'] = 'Course ID';
$string['privacy:metadata:availability_examus2_entries:cmid'] = 'Course Module ID';
$string['privacy:metadata:availability_examus2_entries:attemptid'] = 'Quiz attempt ID';
$string['privacy:metadata:availability_examus2_entries:userid'] = 'The ID of the user that this record relates to.';
$string['privacy:metadata:availability_examus2_entries:accesscode'] = 'Accesscode';
$string['privacy:metadata:availability_examus2_entries:status'] = 'Entry status';
$string['privacy:metadata:availability_examus2_entries:review_link'] = 'Review URL';
$string['privacy:metadata:availability_examus2_entries:archiveurl'] = 'Archive URL';
$string['privacy:metadata:availability_examus2_entries:timecreated'] = 'Time when entry was created';
$string['privacy:metadata:availability_examus2_entries:timemodified'] = 'Time when entry was last modified';
$string['privacy:metadata:availability_examus2_entries:timescheduled'] = '';
$string['privacy:metadata:availability_examus2_entries:score'] = 'Examusing score';
$string['privacy:metadata:availability_examus2_entries:comment'] = 'Examus\'s comment';
$string['privacy:metadata:availability_examus2_entries:threshold'] = 'Score threshold';
$string['privacy:metadata:availability_examus2_entries:warnings'] = 'List of warnings received during proctoring session';
$string['privacy:metadata:availability_examus2_entries:sessionstart'] = 'Time when proctoring session started';
$string['privacy:metadata:availability_examus2_entries:sessionend'] = 'Time when proctoring session ended';

$string['privacy:metadata:availability_examus2_external'] = 'To integrate with the Examus proctoring system, user data is transmitted via API. This enables user authentication, proctoring session creation, and identity verification. The exported fields are required to establish and monitor proctoring sessions.';
$string['privacy:metadata:availability_examus2_external:username'] = 'The username is transmitted to uniquely identify the user’s account in Examus, ensuring accurate linkage between the testing session and their profile. It serves as a unique identifier for the session.';
$string['privacy:metadata:availability_examus2_external:firstname'] = 'The first name is provided for precise identification in proctoring reports and interfaces, aligning with institutional records. This field is optional and not required.';
$string['privacy:metadata:availability_examus2_external:lastname'] = 'The last name is used to match the user’s identity with official data, simplifying administrative oversight. This field is optional and not required.';
$string['privacy:metadata:availability_examus2_external:middlename'] = 'The patronymic (if applicable) is included to comply with naming standards and ensure full-name consistency. This field is optional and not required.';
$string['privacy:metadata:availability_examus2_external:email'] = 'The email address is required for system notifications and user identification within Examus.';
$string['privacy:metadata:availability_examus2_external:userpicture'] = 'The profile photo (using the avatar from the Moodle profile) is used for visual identity verification during proctoring sessions to prevent impersonation and ensure compliance. This field is optional and not required.';

//Hint text

$string['hint'] = 'Usage help';
$string['duration_desc'] = 'Test duration. In case creating a calendar entry is required for the exam, the exam duration must be equal to the duration of the calendar slot! If the slot lasts 60 minutes, the exam should also be 60 minutes long.<br>This duration should always be a multiple of 30 minutes. If the test lasts 40 minutes, the time limit will need to be set to 60 minutes.<br><b>Important:</b> Examus does not end the exam after the time has passed.';
$string['proctoring_mode_desc'] = 'Choose the proctoring mode for the test:<br><ul><li><li>Synchronous (Exam with live proctor)</li><li>Asynchronous (Exam with post-viewing of the video)</li><li>Automatic (Exam with automatically awarded status based on scoring)</li><li>Identification (An exam in which the proctor only identifies the user, but does not participate in monitoring during the exam — AI does it).</li></ul>';
$string['identification_desc'] = 'Requesting a photo during the identification step.<br><ul><li>Passport - request a photo of the document only.</li><li>Face - request a photo of the face only.</li><li>Face and Passport - Request a photo of the face first, then the document.</li><li>Skip - skip the identification step, without requesting a face and/or passport. *</li></ul><br><b>Important:</b> * we recommend using Skip if biometric identification will be used. If biometrics will not be used, specify Face/Passport!';
$string['scheduling_required_desc'] = 'Default behaviour: if the synchronous mode of proctoring or Identification is selected, then the «<b>Mandatory calendar entry</b>» parameter is active, i.e. calendar entry is required; if the asynchronous or automatic proctoring mode is selected, then calendar entry is not required.<br>Optionally, this parameter can be removed, thus removing the dependence on the proctoring mode and the mandatory calendar entry. For example, it is possible take a test with synchronous proctoring without creating an entry in the Calendar.';
$string['auto_rescheduling_desc'] = 'Intended only for synchronous proctoring with a calendar entry.<br>If a student signed up for an exam slot but missed it, their attempt will be reset and there will be an opportunity to re-enroll in the slot.';
$string['is_trial_desc'] = 'Exams with this option will not be represented in the report, and their videos will not appear in the archive.';
$string['enable_ldb_desc'] = 'If the parameter is active, it disables protection against taking the test without proctoring.';
$string['custom_rules_desc'] = 'Text-based rules that are not on the standard list. Displayed in the Proctor interface and in the video archive.';
$string['auxiliary_camera_desc'] = 'Makes it mandatory to connect an auxiliary camera (smartphone) via QR-code in order to take the test.';
$string['rules_desc'] = 'Selecting test rules from a list. When activated, they are displayed In green collar for both proctors and users.';
$string['visible_warnings_desc'] = 'When a test taker violates the exam rules, various warnings about violations can be displayed on the screen. Choose which types of violations to show to the test taker and which to hide.<br><b>Important:</b> If you do not select any types, the default values will be used (all violations are shown)';
$string['scoring_params_header_desc'] = 'You can change the scoring parameters to fine-tune the cheating score calculation for a particular exam.<br><b>Important:</b> If no options are set, the default values will be used (all are shown)';
$string['desktop_app_forbidden_processes_desc'] = 'Use line breaks to separate applications';
$string['desktop_app_allowed_processes_desc'] = 'Use line breaks to separate applications';
$string['user_agreement_url_desc'] = 'A link to the exam rules (URL) on any page. Insert a custom rules page before the exam.';

$string['enabledAllowedProcesses'] = 'Enable allowed processes';
$string['enabledForbiddenProcesses'] = 'Enable forbidden processes';
