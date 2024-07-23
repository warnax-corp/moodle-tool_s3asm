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

namespace tool_s3asm\check;
use core\check\check;
use core\check\result;
use action_link;
use moodle_url;
use tool_s3asm\local\client\s3_client;

/**
 * Status check for s3 logs delivery.
 *
 * @package    tool_s3asm
 * @author     Dmitrii Metelkin <dmitriim@catalyst-au.net>
 * @copyright  Catalyst IT
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class status extends check {
    /**
     * Link to the settings page.
     *
     * @return action_link|null
     */
    public function get_action_link(): ?action_link {
        return new action_link(
            new moodle_url('/admin/settings.php', ['section' => 'tool_s3asm']),
            get_string('pluginname', 'tool_s3asm')
        );
    }

    /**
     * Check for the status.
     *
     * @return result
     */
    public function get_result(): result {
        $client = new s3_client();

        // Connection check.
        if (!$client->test_connection()->success) {
            return new result(result::ERROR, get_string('connectionfailure', 'tool_s3asm', ''));
        }

        // Permission check.
        if (!$client->test_permissions()->success) {
            return new result(result::ERROR, get_string('writefailure', 'tool_s3asm', ''));
        }

        // All configured, but disabled.
        if (empty(get_config('tool_s3asm', 'enable'))) {
            return new result(result::WARNING, get_string('asmdisabled', 'tool_s3asm'));
        }

        return new result(result::OK, get_string('connectionsuccess', 'tool_s3asm'));
    }
}
