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
 * Plugin strings are defined here.
 *
 * @package     tool_s3asm
 * @category    string
 * @copyright   2024 WARNAX Corp. <kosuke@warnax.co.jp>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'S3 AsM Exporter';
$string['pluginnamedesc'] = 'Moodle to Amazon S3 AsM Exporter';

$string['asmsettings'] = 'AsM Settings';
$string['awss3settings'] = 'Amazon S3 Settings';
$string['awss3settings_desc'] = 'Settings for AWS and S3 access';
$string['bucket'] = 'Bucket';
$string['bucket_desc'] = 'The name of the bucket to store the logs in.';
$string['checkstatus'] = 'S3 AsM Exporter status';
$string['connectionsuccess'] = 'Could establish connection to the S3 storage.';
$string['connectionfailure'] = 'Could not establish connection to S3 storage. {$a}';
$string['enable'] = 'Enable AsM Exporter';
$string['enable_desc'] = 'Enable AsM Export tasks Help with Enable AsM Export tasks';
$string['generalsettings'] = 'General Settings';
$string['asmid'] = 'AsM ID';
$string['asmid_desc'] = 'The AsM ID used to upload S3';
$string['keyid'] = 'Key ID';
$string['keyid_desc'] = 'The AWS API key used to make AWS API calls for S3';
$string['asmdisabled'] = 'AsM Export tasks are disabled';
$string['processasm'] = 'Run the S3 AsM processing task';
$string['notconfigured'] = 'Missing configuration.';
$string['sdkcredsok'] = 'AWS credentials found. This setting can be safely enabled.';
$string['sdkcredserror'] = 'Couldn\'t find AWS credentials. It\'s unsafe to enable this setting. Follow up <a href="https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html">AWS documentation</a>.';
$string['s3region'] = 'AWS Region';
$string['s3region_desc'] = 'The AWS Region to use for API calls';
$string['secretkey'] = 'Secret Key';
$string['secretkey_desc'] = 'The AWS secret key used to make AWS API calls for S3';
$string['permissioncheckpassed'] = 'Permissions check passed.';
$string['privacy:metadata'] = 's3asm tool export AsM purposes';
$string['privacy:metadata:tool_s3asm:realuserid'] = 'The ID of the real user behind the event, when masquerading a user.';
$string['privacy:metadata:tool_s3asm:relateduserid'] = 'The ID of a user related to an event';
$string['privacy:metadata:tool_s3asm:userid'] = 'The ID of the user who triggered an event';
$string['privacy:metadata:tool_s3asm:externalpurpose'] = 's3asm tool exports AsM purposes';
$string['usesdkcreds'] = 'Use the default credential provider chain to find AWS credentials';
$string['usesdkcreds_desc'] = 'If Moodle is hosted inside AWS, the default credential chain can be used for access to s3 AsM.';
$string['writefailure'] = 'Could not write object to the S3 storage. {$a}';
