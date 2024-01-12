YUI.add('moodle-availability_examus2-form', function (Y, NAME) {

/**
 * JavaScript for form editing profile conditions.
 *
 * @module moodle-availability_examus2-form
 */
/** @suppress checkVars */
M.availability_examus2 = M.availability_examus2 || {};

M.availability_examus2.form = Y.Object(M.core_availability.plugin);

M.availability_examus2.form.rules = null;

M.availability_examus2.form.initInner = function(rules, warnings, scoring, defaults) {
    this.rules = rules;
    this.warnings = warnings;
    this.scoring = scoring;
    this.defaults = defaults;
};

M.availability_examus2.form.instId = 0;

M.availability_examus2.form.getNode = function(json) {
    M.availability_examus2.form.instId += 1;
    var html, node, value;

    var id = 'examus2' + M.availability_examus2.form.instId;
    var durationId = id + '_duration';
    var modeId = id + '_mode';
    var schedulingRequiredId = id + '_schedulingRequired';
    var autoReschedulingId = id + '_autoRescheduling';
    var isTrialId = id + '_isTrial';
    var identificationId = id + '_identification';
    var customRulesId = id + '_customRules';
    var auxiliaryCameraId = id + '_auxCamera';
    var allowmultipledisplaysId = id + '_allowmultipledisplays';
    var allowvirtualenvironmentId = id + '_allowvirtualenvironment';
    var checkidphotoqualityId = id + '_checkidphotoquality';
    var enableLdbId = id + '_ldb';
    var biometryEnabledId = id + '_biometryEnabled';
    var biometrySkipfailId = id + '_biometrySkipfail';
    var biometryFlowId = id + '_biometryFlow';
    var biometryThemeId = id + '_biometryTheme';
    var userAgreementId = id + '_userAgreement';
    var webCameraMainViewId = id + '_webCameraMainView';


    var tabButtonOne, tabButtonTwo, tabOne, tabTwo;

    /**
     * @param {string} identifier A string identifier
     * @param {string} module Module name
     * @returns {string} A string from translations.
     */
    function getString(identifier, module) {
        module = module || 'availability_examus2';
        return M.util.get_string(identifier, module);
    }

    /**
     * @param {string} content Content to be wraped
     * @param {string} module Module name
     * @returns {string} Wraped content
     */
    function moreLess(content) {
        var showmore = getString('showmore', 'core_form');
        var showless = getString('showless', 'core_form');

        return '<a href="#" class="examus2-moreless" data-more="' + showmore + '" data-less="' + showless + '">' +
            showmore +
            '</a><div class="hidden col-md-12">' + content + '</div>';
    }

    function switchMoreLessState(target) {
        var next = target.next();
        var hidden = next.hasClass('hidden');

        if (hidden) {
            next.removeClass('hidden');
            target.setContent(target.getAttribute('data-less'));
        } else {
            next.addClass('hidden');
            target.setContent(target.getAttribute('data-more'));
        }
    }

    function formGroup(id, label, hint, content, fullwidth) {
        var labelcols = fullwidth ? 10 : 5;
        var fieldcols = fullwidth ? 10 : 7;

        return '<span class="availability-group form-group mb-2">' +
            '<div class="col-md-' + labelcols + ' col-form-label d-flex flex-nowrap pb-0 pr-md-0">' +
            '  <label for="' + id + '">' + label + '</label>' +
            '</div>' +
            '<div class="col-md-' + fieldcols + ' form-inline align-items-center flex-nowrap felement">' +
            content +
            (hint ?
                '<a class="btn btn-link p-0 ml-2" role="button" data-container="body" ' +
                'data-toggle="popover" data-placement="right" data-content="' +
                '<div class=&quot;no-overflow&quot;>' +
                '<p>' + hint + '</p></div> " data-html="true" tabindex="0" ' +
                'data-trigger="focus" data-original-title="" title="">' +
                '<i class="icon fa fa-question-circle text-info fa-fw " title="Справка по использованию' +
                '" aria-label="Справка по использованию"> ' +
                '</i></a>' : '') +
            '</div>' +
            '</span>';
    }

    function setSchedulingState() {
        var manualmodes = ['normal', 'identification'];
        var mode = node.one('select[name=mode]').get('value').trim();
        var checked = manualmodes.indexOf(mode) >= 0;
        node.one('#' + schedulingRequiredId).set('checked', checked);
    }

    function nextTick(callback) {
        setTimeout(callback, 0);
    }

    function switchTab(tab) {
        if (tab == 1) {
            tabButtonOne.addClass('btn-primary');
            tabButtonOne.removeClass('btn-secondary');
            tabButtonTwo.addClass('btn-secondary');
            tabButtonTwo.removeClass('btn-primary');
            tabOne.removeClass('hidden');
            tabTwo.addClass('hidden');
        } else {
            tabButtonTwo.addClass('btn-primary');
            tabButtonTwo.removeClass('btn-secondary');
            tabButtonOne.addClass('btn-secondary');
            tabButtonOne.removeClass('btn-primary');
            tabOne.addClass('hidden');
            tabTwo.removeClass('hidden');
        }
    }

    // html += formGroup(useDefaultsId, getString('usedefaults'),
    //     '<input type="checkbox" name="usedefaults" id="' + useDefaultsId + '" value="1">&nbsp;' +
    //     '<label for="' + useDefaultsId + '">' + getString('enable') + '</label> '
    // );

    html = formGroup(durationId, getString('duration'), getString('duration_desc'),
        '<input type="text" name="duration" style="flex-wrap: nowrap;" id="' + durationId + '" class="form-control">'
    );

    html += formGroup(modeId, getString('proctoring_mode'), getString('proctoring_mode_desc'),
        '<select name="mode" id="' + modeId + '" class="custom-select">' +
        '  <option value="online">' + getString('online_mode') + '</option>' +
        '  <option value="identification">' + getString('identification_mode') + '</option>' +
        '  <option value="offline">' + getString('offline_mode') + '</option>' +
        '  <option value="auto">' + getString('auto_mode') + '</option>' +
        '</select>'
    );

    html += formGroup(identificationId, getString('identification'), getString('identification_desc'),
        '<select name="identification" id="' + identificationId + '" class="custom-select">' +
        '  <option value="passport">' + getString('passport_identification') + '</option>' +
        '  <option value="face">' + getString('face_identification') + '</option>' +
        '  <option value="face_and_passport">' + getString('face_passport_identification') + '</option>' +
        '  <option value="skip">' + getString('skip_identification') + '</option>' +
        '</select>'
    );

    html += formGroup(webCameraMainViewId, getString('web_camera_main_view'), '',
        '<select name="webcameramainview" id="' + webCameraMainViewId + '" class="custom-select">' +
        '  <option value="front">' + getString('web_camera_main_view_front') + '</option>' +
        '  <option value="side">' + getString('web_camera_main_view_side') + '</option>' +
        '</select>'
    );

    html += formGroup(schedulingRequiredId, getString('scheduling_required'), getString('scheduling_required_desc'),
        '<input type="checkbox" name="scheduling_required" id="' + schedulingRequiredId + '" value="1">&nbsp;' +
        '<label for="' + schedulingRequiredId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(autoReschedulingId, getString('auto_rescheduling'), getString('auto_rescheduling_desc'),
        '<input type="checkbox" name="auto_rescheduling" id="' + autoReschedulingId + '" value="1">&nbsp;' +
        '<label for="' + autoReschedulingId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(isTrialId, getString('is_trial'), getString('is_trial_desc'),
        '<input type="checkbox" name="istrial" id="' + isTrialId + '" value="1">&nbsp;' +
        '<label for="' + isTrialId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(auxiliaryCameraId, getString('auxiliary_camera'), getString('auxiliary_camera_desc'),
        '<input type="checkbox" name="auxiliarycamera" id="' + auxiliaryCameraId + '" value="1">&nbsp;' +
        '<label for="' + auxiliaryCameraId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(enableLdbId, getString('enable_ldb'), getString('enable_ldb_desc'),
        '<input type="checkbox" name="ldb" id="' + enableLdbId + '" value="1">&nbsp;' +
        '<label for="' + enableLdbId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(allowmultipledisplaysId, getString('allowmultipledisplays'), '',
        '<input type="checkbox" name="allowmultipledisplays" id="' + allowmultipledisplaysId + '" value="1">&nbsp;' +
        '<label for="' + allowmultipledisplaysId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(allowvirtualenvironmentId, getString('allowvirtualenvironment'), '',
        '<input type="checkbox" name="allowvirtualenvironment" id="' + allowvirtualenvironmentId + '" value="1">&nbsp;' +
        '<label for="' + allowvirtualenvironmentId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(checkidphotoqualityId, getString('checkidphotoquality'), '',
        '<input type="checkbox" name="checkidphotoquality" id="' + checkidphotoqualityId + '" value="1">&nbsp;' +
        '<label for="' + checkidphotoqualityId + '">' + getString('enable') + '</label> '
    );

    html += formGroup(userAgreementId, getString('user_agreement_url'), getString('user_agreement_url_desc'),
        '<input name="useragreementurl" id="' + userAgreementId + '" class="form-control" value="" />'
    );

    html += formGroup(customRulesId, getString('custom_rules'), getString('custom_rules_desc'),
        '<textarea name="customrules" id="' + customRulesId + '" style="flex: 1;" class="form-control"></textarea>'
    );


    var ruleOptions = '';
    for (var key in this.rules) {
        var keyId = id + '_' + key;
        ruleOptions += '<div style="display:flex;gap:4px;margin-bottom:4px;"><input type="checkbox" name="' + key + '" id="' + keyId + '" value="' + key + '" >&nbsp;';
        ruleOptions += '<label for="' + keyId + '" style="white-space: break-spaces">' + getString(key) + '</label></div>';
    }

    html += formGroup(null, getString('rules'), getString('rules_desc'),
        '<div class="rules" style="white-space:nowrap">' + ruleOptions + '</div>'
    );

    var warningOptions = '';
    for (var wkey in this.warnings) {
        var wkeyId = id + '_' + wkey;
        warningOptions += '<div style="display:flex;gap:4px;margin-bottom:4px;"><input type="checkbox" name="' + wkey + '" id="' + wkeyId + '" value="' + wkey + '" >&nbsp;';
        warningOptions += '<label for="' + wkeyId + '" style="white-space: break-spaces">' + getString(wkey) + '</label></div>';
    }

    var scoringOptions = '';
    for (var skey in this.scoring) {
        var skeyId = id + '_' + skey;
        var smin = this.scoring[skey].min;
        var smax = this.scoring[skey].max;
        var scoringInputHTML = '<input type="number" class="examus2-scoring-input" value=""' +
            'step="0.01" ' +
            'name="' + skey + '"' +
            'id="scoring_' + skeyId + '"' +
            'min="' + smin + '" max="' + smax + '">';

        scoringOptions += formGroup(skeyId, getString('scoring_' + skey), '', scoringInputHTML);
    }

    var biometryOptions = '';
    biometryOptions += formGroup(biometryEnabledId, getString('biometry_enabled'), '',
        '<input type="checkbox" name="biometryenabled" id="' + biometryEnabledId + '" value="1">&nbsp;' +
        '<label for="' + biometryEnabledId + '">' + getString('enable') + '</label> '
    );
    biometryOptions += formGroup(biometrySkipfailId, getString('biometry_skipfail'), '',
        '<input type="checkbox" name="biometryskipfail" id="' + biometrySkipfailId + '" value="1">&nbsp;' +
        '<label for="' + biometrySkipfailId + '">' + getString('enable') + '</label> '
    );
    biometryOptions += formGroup(biometryFlowId, getString('biometry_flow'), '',
        '<input type="text" name="biometryflow" id="' + biometryFlowId + '" class="form-control">'
    );
    biometryOptions += formGroup(biometryThemeId, getString('biometry_theme'), '',
        '<input type="text" name="biometrytheme" id="' + biometryThemeId + '" class="form-control">'
    );


    var htmlTwo = '';
    htmlTwo += formGroup(null, getString('visible_warnings'), getString('visible_warnings_desc'),
        '<div class="warnings" style="white-space: nowrap" >' + moreLess(warningOptions) + '</div>',
        true);

    htmlTwo += formGroup(null, getString('scoring_params_header'), getString('scoring_params_header_desc'),
        moreLess(scoringOptions),
        true);

    htmlTwo += formGroup(null, getString('biometry_header'), '',
        moreLess(biometryOptions),
        true);


    node = Y.Node.create('<span class="availability_examus2-tabs" style="position:relative"></span>');

    node.setHTML('<label><strong>' + getString('title') + '</strong></label><br><br>');

    var tabButtons = Y.Node.create(
        '<div style="position:absolute; top: 0; right: 0;" class="availability_examus2-tab-btns"></div>'
    ).appendTo(node);
    tabButtonOne = Y.Node.create('<a href="#" class="btn btn-primary">1</a>').appendTo(tabButtons);
    tabButtonTwo = Y.Node.create('<a href="#" class="btn btn-secondary">2</a>').appendTo(tabButtons);

    tabOne = Y.Node.create('<div class="tab_content">' + html + '</div>').appendTo(node);
    tabTwo = Y.Node.create('<div class="tab_content hidden">' + htmlTwo + '</div>').appendTo(node);


    if (json.rules === undefined) {
        json.rules = this.rules;
    }

    if (json.warnings === undefined) {
        json.warnings = this.warnings;
    }

    json.scoring = json.scoring || {};

    if (json.creating) {
        for (var dkey in this.defaults) {
            var dvalue = this.defaults[dkey];
            if (dkey == 'scoring') {
                for (var dskey in dvalue) {
                    json.scoring[dskey] = dvalue[dskey] ? parseFloat(dvalue[dskey]) : null;
                }
            } else if (dkey == 'rules') {
                for (var drkey in dvalue) {
                    json.rules[drkey] = dvalue[drkey];
                }
            } else if (dkey == 'warnings') {
                for (var dwkey in dvalue) {
                    json.warnings[dwkey] = dvalue[dwkey] ? true : false;
                }
            } else {
                json[dkey] = dvalue;

            }
        }

        if (!json.mode) {
            json.mode = 'online';
            json.scheduling_required = true;
        }
    }

    if (json.duration !== undefined) {
        node.one('input[name=duration]').set('value', json.duration);
    }

    if (json.mode !== undefined) {
        node.one('select[name=mode] option[value=' + json.mode + ']').set('selected', 'selected');
    }

    if (json.identification !== undefined) {
        node.one('select[name=identification] option[value=' + json.identification + ']').set('selected', 'selected');
    }

    if (json.webcameramainview) {
        node.one('select[name=webcameramainview] option[value=' + json.webcameramainview + ']').set('selected', 'selected');
    }

    if (json.auto_rescheduling !== undefined) {
        node.one('#' + autoReschedulingId).set('checked', json.auto_rescheduling ? 'checked' : null);
    }

    if (json.istrial !== undefined) {
        value = json.istrial ? 'checked' : null;
        node.one('#' + isTrialId).set('checked', value);
    }

    if (json.auxiliarycamera !== undefined) {
        node.one('#' + auxiliaryCameraId).set('checked', json.auxiliarycamera ? 'checked' : null);
    }

    if (json.ldb !== undefined) {
        node.one('#' + enableLdbId).set('checked', json.ldb ? 'checked' : null);
    }

    if (json.scheduling_required !== undefined) {
        node.one('#' + schedulingRequiredId).set('checked', json.scheduling_required ? 'checked' : null);
    }

    if (json.allowmultipledisplays !== undefined) {
        node.one('#' + allowmultipledisplaysId).set('checked', json.allowmultipledisplays ? 'checked' : null);
    }

    if (json.allowvirtualenvironment !== undefined) {
        node.one('#' + allowvirtualenvironmentId).set('checked', json.allowvirtualenvironment ? 'checked' : null);
    }

    if (json.checkidphotoquality !== undefined) {
        node.one('#' + checkidphotoqualityId).set('checked', json.checkidphotoquality ? 'checked' : null);
    }

    if (json.biometryenabled !== undefined) {
        node.one('#' + biometryEnabledId).set('checked', json.biometryenabled ? 'checked' : null);
    }

    if (json.biometryskipfail !== undefined) {
        node.one('#' + biometrySkipfailId).set('checked', json.biometryskipfail ? 'checked' : null);
    }

    if (json.biometryflow !== undefined) {
        node.one('#' + biometryFlowId).set('value', json.biometryflow);
    }

    if (json.biometrytheme !== undefined) {
        node.one('#' + biometryThemeId).set('value', json.biometrytheme);
    }

    // Setting hardcoded defaults when no user-defined exist.
    for (var wrkey in this.warnings) {
        if (json.warnings[wrkey] === undefined) {
            json.warnings[wrkey] = this.warnings[wrkey];
        }
    }
    for (var warningKey in json.warnings) {
        if (json.warnings[warningKey]) {
            var winput = node.one('.warnings input[name=' + warningKey + ']');
            if (winput) {
                winput.set('checked', 'checked');
            }
        }
    }

    for (var ruleKey in json.rules) {
        if (json.rules[ruleKey]) {
            var input = node.one('.rules input[name=' + ruleKey + ']');
            if (input) {
                input.set('checked', 'checked');
            }
        }
    }

    for (var scoringKey in json.scoring) {
        if (!isNaN(json.scoring[scoringKey])) {
            var sinput = node.one('.examus2-scoring-input[name=' + scoringKey + ']');
            if (sinput) {
                sinput.set('value', json.scoring[scoringKey]);
            }
        }
    }

    if (json.customrules !== undefined) {
        node.one('#' + customRulesId).set('value', json.customrules);
    }

    if (json.useragreementurl !== undefined) {
        node.one('#' + userAgreementId).set('value', json.useragreementurl);
    }

    node.delegate('valuechange', function() {
        nextTick(function() {
            M.core_availability.form.update();
        });
    }, 'input,textarea,select');

    node.delegate('click', function() {
        nextTick(function() {
            M.core_availability.form.update();
        });
    }, 'input[type=checkbox]');

    node.delegate('valuechange', function() {
        setSchedulingState();
    }, '#' + modeId);

    tabButtonOne.on('click', function(e) {
        e.preventDefault();
        switchTab(1);
    });
    tabButtonTwo.on('click', function(e) {
        e.preventDefault();
        switchTab(2);
    });
    node.delegate('click', function(e) {
        e.preventDefault();
        switchMoreLessState(e.target);
    }, '.examus2-moreless');

    return node;
};

M.availability_examus2.form.fillValue = function(value, node) {
    var rulesInputs, warningsInputs, scoringInputs, key;
    value.duration = node.one('input[name=duration]').get('value').trim();
    value.mode = node.one('select[name=mode]').get('value').trim();
    value.identification = node.one('select[name=identification]').get('value').trim();
    value.webcameramainview = node.one('select[name=webcameramainview]').get('value').trim();
    value.auto_rescheduling = node.one('input[name=auto_rescheduling]').get('checked');
    value.scheduling_required = node.one('input[name=scheduling_required]').get('checked');
    value.istrial = node.one('input[name=istrial]').get('checked');
    value.customrules = node.one('textarea[name=customrules]').get('value').trim();
    value.useragreementurl = node.one('input[name=useragreementurl]').get('value').trim();
    value.auxiliarycamera = node.one('input[name=auxiliarycamera]').get('checked');
    value.ldb = node.one('input[name=ldb]').get('checked');
    value.allowmultipledisplays = node.one('input[name=allowmultipledisplays]').get('checked');
    value.allowvirtualenvironment = node.one('input[name=allowvirtualenvironment]').get('checked');
    value.checkidphotoquality = node.one('input[name=checkidphotoquality]').get('checked');

    value.biometryenabled = node.one('input[name=biometryenabled]').get('checked');
    value.biometryskipfail = node.one('input[name=biometryskipfail]').get('checked');
    value.biometryflow = node.one('input[name=biometryflow]').get('value').trim();
    value.biometrytheme = node.one('input[name=biometrytheme]').get('value').trim();

    value.rules = {};
    rulesInputs = node.all('.rules input');
    Y.each(rulesInputs, function(ruleInput) {
        key = ruleInput.get('value');
        if (ruleInput.get('checked') === true) {
            value.rules[key] = true;
        } else {
            value.rules[key] = false;
        }
    });

    value.warnings = {};
    warningsInputs = node.all('.warnings input');
    Y.each(warningsInputs, function(warningInput) {
        key = warningInput.get('value');
        if (warningInput.get('checked') === true) {
            value.warnings[key] = true;
        } else {
            value.warnings[key] = false;
        }
    });

    value.scoring = {};
    scoringInputs = node.all('.examus2-scoring-input');
    Y.each(scoringInputs, function(scoringInput) {
        key = scoringInput.get('name');
        var scoringValue = scoringInput.get('value').trim();
        if (scoringValue.length > 0) {
            value.scoring[key] = parseFloat(scoringValue);
        } else {
            value.scoring[key] = null;
        }
    });
};

M.availability_examus2.form.fillErrors = function(errors, node) {
    var value = {};
    this.fillValue(value, node);
    var durationError = document.getElementById('duration_error');
    if ((value.duration === undefined ||
            !(new RegExp('^\\d+$')).test(value.duration) ||
            value.duration % 30 !== 0) &&
        !durationError) {
        var sNode = node._node.querySelector('input[name="duration"]').parentNode.parentNode;
        var span = document.createElement('span');
        span.style.color = 'red';
        span.style.fontSize = '11px';
        span.innerHTML = M.util.get_string('error_setduration', 'availability_examus2');
        span.classList.add('col-md-10');
        span.classList.add('col-form-label');
        span.classList.add('d-flex');
        span.classList.add('mb-1');
        span.classList.add('pt-0');
        span.id = "duration_error";
        sNode.insertAdjacentElement('afterend', span);

    } else if (value.duration !== undefined &&
        (new RegExp('^\\d+$')).test(value.duration) &&
        value.duration % 30 === 0 &&
        durationError) {
        durationError.remove();
    }
};

}, '@VERSION@', {"requires": ["base", "node", "event", "moodle-core_availability-form"]});
