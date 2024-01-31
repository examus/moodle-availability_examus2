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

    function checked(state) {
        for (var i = 0; i < tableCheckboxItem.length; i++) {
            tableCheckboxItem[i].checked = state;
        }
    }
}