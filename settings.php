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

if ($hassiteconfig) {
    $settings = null;
    $pluginsettings = new admin_settingpage('manageavailabilityexamus2', new lang_string('settings', 'availability_examus2'));

    $logpage = new admin_externalpage(
        'availability_examus2_log',
        get_string('log_section', 'availability_examus2'),
        $CFG->wwwroot . '/availability/condition/examus2/index.php',
        'availability/examus2:logaccess'
    );

    $defaultspage = new admin_externalpage(
        'availability_examus2_defaults',
        get_string('defaults', 'availability_examus2'),
        $CFG->wwwroot . '/availability/condition/examus2/defaults.php',
        'availability/examus2:logaccess'
    );

    $category = new admin_category('availability_examus2_admin', new lang_string('pluginname', 'availability_examus2'));

    $ADMIN->add('availabilitysettings', $category);
    $ADMIN->add('reports', $logpage);
    $ADMIN->add('availability_examus2_admin', $defaultspage);
    $ADMIN->add('availability_examus2_admin', $pluginsettings);

    //$ADMIN->add('availability_examus2_admin', $logpage);

    if ($ADMIN->fulltree) {
        $pluginsettings->add(new admin_setting_configtext('availability_examus2/examus_url',
            new lang_string('settings_examus_url', 'availability_examus2'),
            '', '', PARAM_HOST));

        $pluginsettings->add(new admin_setting_configtext('availability_examus2/integration_name',
            new lang_string('settings_integration_name', 'availability_examus2'),
            '', '', PARAM_TEXT));

        $pluginsettings->add(new admin_setting_configtext('availability_examus2/jwt_secret',
            new lang_string('settings_jwt_secret', 'availability_examus2'),
            '', '', PARAM_TEXT));
            
        $pluginsettings->add(new admin_setting_configtext('availability_examus2/account_name',
            new lang_string('settings_account_name', 'availability_examus2'),
            '', '', PARAM_TEXT));

        $pluginsettings->add(new admin_setting_configcheckbox('availability_examus2/user_emails',
            new lang_string('settings_user_emails', 'availability_examus2'),
            '', 1));

        $pluginsettings->add(new admin_setting_configcheckbox('availability_examus2/seamless_auth',
            new lang_string('settings_seamless_auth', 'availability_examus2'),
            '', 1));

    }
}
