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
 * Plugin administration pages are defined here.
 *
 * @package     tool_s3asm
 * @category    admin
 * @copyright   2024 WARNAX Corp. <kosuke@warnax.co.jp>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

use tool_s3asm\local\client\s3_client;
use local_aws\admin_settings_aws_region;

global $PAGE;

if ($hassiteconfig) {
    $settings = new admin_settingpage('tool_s3asm', get_string('pluginname', 'tool_s3asm'));
    $ADMIN->add('tools', $settings);

    $settings->add(new admin_setting_heading('tool_s3asm_settings', '', get_string('pluginnamedesc', 'tool_s3asm')));

    if (! during_initial_install ()) {
        $clientstatus = '';
        $sdkstatus = '';

        // Check client actual status only when we are on the settings page.
        if ($PAGE->has_set_url()) {
            $settingsurl = new moodle_url('/admin/settings.php');
            if ($settingsurl->compare($PAGE->url, URL_MATCH_BASE) && $PAGE->url->get_param('section') == 'tool_s3asm') {
                $client = new s3_client();
                $clientstatus = $client->get_client_status_message();
                $sdkstatus = $client->get_sdk_credentials_status();
            }
        }

        // General Settings.
        $settings->add(new admin_setting_heading('tool_s3asm_general',
                get_string('generalsettings', 'tool_s3asm'),
                ''));
        $settings->add(new admin_setting_configcheckbox('tool_s3asm/enable',
                get_string('enable', 'tool_s3asm'),
                get_string('enable_desc', 'tool_s3asm'), 0));

        // $settings->add(new admin_setting_configduration('tool_s3asm/maxruntime',
        //         get_string('maxruntime', 'tool_s3asm' ),
        //         get_string('maxruntime_desc', 'tool_s3asm'),
        //         '86400'));

        // Log Archive settings.
        // $settings->add(new admin_setting_heading('tool_s3asm_archive',
        //         get_string('archivesettings', 'tool_s3asm'),
        //         ''));

        // $settings->add(new admin_setting_configtext('tool_s3asm/maxlogage',
        //         get_string('maxlogage', 'tool_s3asm' ),
        //         get_string('maxlogage_desc', 'tool_s3asm'),
        //         18, PARAM_INT));

        // $settings->add(new admin_setting_configtext('tool_s3asm/prefix',
        //         get_string('prefix', 'tool_s3asm' ),
        //         get_string('prefix_desc', 'tool_s3asm'),
        //         '', PARAM_ALPHA));

        // AWS Bucket and S3 settings.
        $settings->add(new admin_setting_heading('tool_s3asm_awss3',
                get_string('awss3settings', 'tool_s3asm'),
                $clientstatus));

        $settings->add(new admin_setting_configcheckbox('tool_s3asm/usesdkcreds',
                get_string('usesdkcreds', 'tool_s3asm'),
                get_string('usesdkcreds_desc', 'tool_s3asm') . $sdkstatus, 0));

        $settings->add(new admin_setting_configtext('tool_s3asm/bucket',
                get_string('bucket', 'tool_s3asm' ),
                get_string('bucket_desc', 'tool_s3asm'),
                '', PARAM_TEXT));

        $settings->add(new admin_setting_configtext('tool_s3asm/prefix',
                get_string('prefix', 'tool_s3asm' ),
                get_string('prefix_desc', 'tool_s3asm'),
                '', PARAM_TEXT));

        $settings->add(new admin_setting_configtext('tool_s3asm/keyid',
                get_string('keyid', 'tool_s3asm' ),
                get_string('keyid_desc', 'tool_s3asm'),
                '', PARAM_TEXT));

        $settings->add(new admin_setting_configpasswordunmask('tool_s3asm/secretkey',
                get_string('secretkey', 'tool_s3asm' ),
                get_string('secretkey_desc', 'tool_s3asm'),
                ''));

        $settings->add(new admin_settings_aws_region('tool_s3asm/s3region',
                get_string('s3region', 'tool_s3asm'),
                get_string('s3region_desc', 'tool_s3asm'),
                'ap-southeast-2'));
    }
}
