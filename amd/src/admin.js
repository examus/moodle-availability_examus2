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
 * @module     availability_examus2/admin
 * @copyright  2019-2023 Maksim Burnin <maksim.burnin@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

 /**
 * Log table init
 *
 * @method init
 */
 export function init() {
    var jsNewEntryBtn = document.querySelector('.js-new-entry-all-btn');
    var tableCheckboxItem = [...document.querySelectorAll('.js-item-checkbox')];
    var tableCheckboxAll = document.querySelector('.js-all-checkbox');
    tableCheckboxAll.addEventListener('change', function(e) {
        if (e.target.checked) {
            checked(true);
            jsNewEntryBtn.removeAttribute('disabled');
        } else {
            checked(false);
        }
    });
    tableCheckboxItem.forEach(function(el) {
        el.addEventListener('change', function(e) {
            if (e.target.checked) {
                jsNewEntryBtn.removeAttribute('disabled');
            } else if (tableCheckboxItem.every(function(item) {
                    return !item.checked;
                })) {
                jsNewEntryBtn.setAttribute('disabled', 'disabled');
            }
        });
    });
    jsNewEntryBtn.addEventListener('click', async function(e) {
        e.preventDefault();
        var formIds = [];
        var formForces = [];
        tableCheckboxItem.forEach(function(el) {
            if (el.checked) {
                formIds.push(el.value);
                formForces.push(el.getAttribute('force'));
            }
        });
        var renewForm = document.createElement("form");
        var renewFormAction = document.createElement("input");
        var renewFormIds = document.createElement("select");
        var renewFormForces = document.createElement("select");
        renewFormAction.name = "action";
        renewFormIds.name = "ids[]";
        renewFormForces.name = "forces[]";
        renewFormIds.multiple = true;
        renewFormForces.multiple = true;
        renewFormAction.value = "renew";
        formIds.forEach(function(el) {
            var option = document.createElement("option");
            option.selected = true;
            option.value = el;
            renewFormIds.append(option);
        });
        formForces.forEach(function(el) {
            var option = document.createElement("option");
            option.selected = true;
            option.value = el;
            renewFormForces.append(option);
        });
        renewForm.append(renewFormAction);
        renewForm.append(renewFormIds);
        renewForm.append(renewFormForces);
        renewForm.method = "post";
        document.querySelector('body').append(renewForm);
        renewForm.submit();
    });

    /**
     * Check all columns
     *
     * @method checked
     * @param {Boolean} state
     */
    function checked(state) {
        for (var i = 0; i < tableCheckboxItem.length; i++) {
            tableCheckboxItem[i].checked = state;
        }
    }
}