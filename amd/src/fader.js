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
 * @module     availability_examus2/fader
 * @copyright  2019-2023 Maksim Burnin <maksim.burnin@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define(['core/str', 'core/notification'], function(str, notification) {
    return {
        init: function(formData, reset) {
            const TAG = 'proctoring fader';
            const expectedData = 'proctoringReady_n6EY';

            //Promise, which resolves when got a message proving the page is being examus2ed.
            const waitForProof = () => new Promise(resolve => {
                const messageHandler = e => {
                    /* eslint-disable no-console */
                    console.debug(TAG, 'got some message', e.data);
                    /* eslint-enable no-console */

                    if (expectedData === e.data) {
                      resolve();
                      /* eslint-disable no-console */
                      console.debug(TAG, 'got proving message', e.data);
                      /* eslint-enable no-console */
                      window.removeEventListener('message', messageHandler);
                    }
                };

                window.addEventListener("message", messageHandler);
            });

            //Prepare the element to cover quiz contents.
            const createFader = (html) => {
                const fader = document.createElement("div");

                fader.innerHTML = html;

                Object.assign(fader.style, {
                    position: 'fixed',
                    zIndex: 1000,
                    fontSize: '2em',
                    width: '100%',
                    height: '100%',
                    background: '#fff',
                    top: 0,
                    left: 0,
                    textAlign: 'center',
                    display: 'flex',
                    justifyContent: 'center',
                    alignContent: 'center',
                    flexDirection: 'column',
                });

                document.body.appendChild(fader);

                return fader;
            };

            const redirectToExamus = () => {
                if (!formData) {
                    return;
                }
                const form = document.createElement("form");
                const input = document.createElement("input");
                form.appendChild(input);
                document.body.appendChild(form);

                form.method = formData['method'];
                form.action = formData['action'];
                input.name = "token";
                input.value = formData['token'];
                form.submit();
            };

            //Run.

            //Prepare to catch the message early.
            const proved = waitForProof();

            str.get_strings([
                {'key' : 'fader_awaiting_proctoring', 'component' : 'availability_examus2'},
                {'key' : 'fader_instructions', 'component' : 'availability_examus2'},
                {'key' : 'fader_reset', 'component' : 'availability_examus2'},
            ]).done(function(s) {
                const faderHTML = s[0] + s[1];
                const strReset = s[2];
                const fader = createFader(faderHTML);
                const redirectTimeout = setTimeout(() => {
                    redirectToExamus();
                }, 15000);
                proved.then(() => {
                    if (reset) {
                        fader.innerHTML = strReset;
                    } else {
                        fader.remove();
                    }
                    clearTimeout(redirectTimeout);
                });
            }).fail(notification.exception);
        }
    };
});