<?php
// This file is part of Moodle - https://moodle.org/
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
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Tests for block_greeting.
 *
 * @package    block_greeting
 * @category   test
 * @copyright  2026 gh codespace ports visibility 8000:public -c "$CODESPACE_NAME" 2>/dev/null; bash .devcontainer/serve.sh || true
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @covers \block_greeting
 * @covers \block_greeting\local\greeting_text
 */
namespace block_greeting;

use advanced_testcase;

defined('MOODLE_INTERNAL') || die();

/**
 * Tests the greeting message and its template rendering.
 */
final class greeting_test extends advanced_testcase {

    /**
     * The localized greeting is rendered by the content template.
     */
    public function test_greeting_is_rendered(): void {
        global $OUTPUT;

        $message = \block_greeting\local\greeting_text::get_message();
        $html = $OUTPUT->render_from_template('block_greeting/content', [
            'greeting' => $message,
        ]);

        $this->assertSame(get_string('greeting', 'block_greeting'), $message);
        $this->assertStringContainsString($message, $html);
    }
}
