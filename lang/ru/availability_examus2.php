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

$string['examus2:logaccess'] = 'Доступ к отчету Examus';
$string['examus2:logaccess_course'] = 'Доступ к отчету Examus (определенный курс)';
$string['examus2:logaccess_all'] = 'Доступ к отчету Examus (все курсы)';

$string['description'] = 'Позволяет студентам использовать сервис "Examus"';
$string['pluginname'] = 'Прокторинг "Examus"';
$string['title'] = 'Examus';

$string['error_no_entry_found'] = 'No exam entry found by accesscode';
$string['error_not_in_range'] = 'Значение должно быть в диапазоне от %d до %d';
$string['error_setduration'] = 'Длительность в минутах должна быть кратна 30 (30, 60, 90)';

$string['settings_examus_url'] = 'Examus URL';
$string['settings_integration_name'] = 'Integration Name';
$string['settings_jwt_secret'] = 'JWT Secret';
$string['settings_account_name'] = 'Account Name';
$string['settings_user_emails'] = 'Отправлять email пользователей в Examus';
$string['settings_seamless_auth'] = 'Автоматическая авторизация пользователя';
$string['settings_seamless_auth_desc'] = 'Активация данной опции означает что прокторинг будет хранить авторизационный токен';

$string['description_examus2'] = 'Вы будете перенаправлены на Examus';
$string['description_no_webservices'] = 'Недоступно через мобильное приложение Moodle';

$string['settings'] = 'Настройки интеграции';
$string['log_section'] = 'Журнал Examus';
$string['status'] = 'Статус';
$string['module'] = 'Модуль';
$string['new_entry'] = 'Новая запись';
$string['new_entry_force'] = 'Новая запись';
$string['duration'] = 'Длительность в минутах, кратная 30';
$string['log_review'] = 'Результат';
$string['log_archive_link'] = 'Архив';
$string['log_report_link'] = 'Отчет';
$string['log_attempt'] = 'Попытка';
$string['log_attempt_missing'] = 'удалена';

$string['new_entry_created'] = 'Новая запись успешно создана';
$string['entry_exist'] = 'Новая запись уже существует';
$string['date_modified'] = 'Дата последнего изменения';

$string['proctoring_mode'] = 'Режим прокторинга';
$string['online_mode'] = 'Синхронный';
$string['offline_mode'] = 'Асинхронный';
$string['auto_mode'] = 'Автоматический';
$string['identification_mode'] = 'Идентификация';

$string['identification'] = 'Режим фотографирования';
$string['face_passport_identification'] = 'Лицо и паспорт';
$string['passport_identification'] = 'Паспорт';
$string['face_identification'] = 'Лицо';
$string['skip_identification'] = 'Пропустить';

$string['web_camera_main_view'] = 'Положение основной камеры';
$string['web_camera_main_view_front'] = 'Фронтальная';
$string['web_camera_main_view_side'] = 'Боковая';

$string['select_groups'] = 'Использовать прокторинг только для выбраных групп';
$string['select_groups_desc'] = 'Для каждой выбранной группы (если отмечена галочкой) будет запускаться прокторинг, кто не отмечен - тест будет запускаться без прокторинга. При этом если не выбрать галочкой ни одну группу, то прокторинг будет запускаться для всех участников курса';

$string['is_trial'] = 'Пробный экзамен';
$string['auxiliary_camera'] = 'Дополнительная камера (смартфон)';
$string['enable_ldb'] = 'Использовать защищенный браузер';
$string['allowmultipledisplays'] = 'Разрешить использование второго монитора';
$string['allowvirtualenvironment'] = 'Разрешить использовать виртуальные машины';
$string['checkidphotoquality'] = 'Проверять качество фото';

$string['rules'] = 'Правила';
$string['custom_rules'] = "Нестандартные правила";
$string['desktop_app_forbidden_processes'] = 'Запрещенные процессы';
$string['desktop_app_allowed_processes'] = 'Разрешенные процессы';

$string['user_agreement_url'] = "URL пользовательского соглашения";

$string['biometry_header'] = 'Параметры биометрической идентификации';
$string['biometry_enabled'] = 'Включить биометрическую идентификацию';
$string['biometry_skipfail'] = 'Пропускать пользователя в экзамен при отрицательном результате идентификации';
$string['biometry_flow'] = 'Название Verification Flow';
$string['biometry_theme'] = 'Тема';

$string['time_scheduled'] = 'Время записи в календаре';
$string['time_finish'] = 'Время попытки';

$string['auto_rescheduling'] = 'Автоматический сброс при пропуске экзамена';
$string['enable'] = 'Включить';

$string['allow_to_use_websites'] = 'Разрешить веб-сайты';
$string['allow_to_use_books'] = 'Разрешить использование книг';
$string['allow_to_use_paper'] = 'Разрешить черновики';
$string['allow_to_use_messengers'] = 'Разрешить мессенджеры';
$string['allow_to_use_calculator'] = 'Разрешить калькулятор';
$string['allow_to_use_excel'] = 'Разрешить использование Excel';
$string['allow_to_use_human_assistant'] = 'Разрешить помощь людей';
$string['allow_absence_in_frame'] = 'Разрешить выход из комнаты';
$string['allow_voices'] = 'Разрешить голоса';
$string['allow_wrong_gaze_direction'] = 'Разрешить взгляд в сторону';

$string['scoring_params_header'] = 'Параметры расчета скоринга';
$string['scoring_cheater_level'] = 'Порог нарушителя';
$string['scoring_extra_user'] = 'Наличие еще одного человека в кадре';
$string['scoring_user_replaced'] = 'Подмена тестируемого';
$string['scoring_absent_user'] = 'Отсутствие тестируемого';
$string['scoring_look_away'] = 'Увод взгляда с экрана';
$string['scoring_active_window_changed'] = 'Смена активного окна на компьютере';
$string['scoring_forbidden_device'] = 'Запрещенное оборудование';
$string['scoring_voice'] = 'Звуки голосов в трансляции';
$string['scoring_phone'] = 'Использование телефона';

$string['status_new'] = 'Попытка не начата';
$string['status_started'] = 'Попытка начата';
$string['status_unknown'] = 'Не проверено';
$string['status_accepted'] = 'Не нарушитель';
$string['status_rejected'] = 'Нарушитель';
$string['status_force_reset'] = 'Попытка сброшена';
$string['status_finished'] = 'Завершено, ожидается статус';
$string['status_scheduled'] = 'Запланировано';

$string['scheduling_required'] = 'Обязательна запись в календаре';
$string['apply_filter'] = 'Применить фильтры';
$string['allcourses'] = 'Все курсы';
$string['allstatuses'] = 'Все статусы';
$string['userquery'] = 'Username или Email пользователя начинается с';
$string['fromdate'] = 'С:';
$string['todate'] = 'По:';

$string['score'] = 'Скоринг';
$string['threshold_attention'] = 'Порог подозрительности';
$string['threshold_rejected'] = 'Порог отклонения';
$string['session_start'] = 'Начало сессии';
$string['session_end'] = 'Окончание сессии';
$string['warnings'] = 'Нарушения';
$string['comment'] = 'Комментарий';

$string['details'] = 'Подробности';

// Fader screen.
$string['fader_awaiting_proctoring'] = 'Проверяем, что прокторинг запущен...';
$string['fader_instructions'] = '<p>Это не займёт много времени</p>';
$string['fader_reset'] = 'Перезагрузите страницу, чтобы продолжить тестирование';

// Dafault settings
$string['defaults'] = 'Настройки по умолчанию';
$string['defaults_proctoring_settings'] = 'Настройки прокторинга';

$string['log_details_warnings'] = 'Нарушения';
$string['log_details_warning_type'] = 'Тип';
$string['log_details_warning_title'] = 'Описание';
$string['log_details_warning_start'] = 'Начало';
$string['log_details_warning_end'] = 'Конец';

$string['visible_warnings'] = 'Видимые пользователю уведомления';

$string['warning_extra_user_in_frame'] = 'Наличие еще одного человека в кадре';
$string['warning_substitution_user'] = 'Подмена тестируемого';
$string['warning_no_user_in_frame'] = 'Отсутствие тестируемого';
$string['warning_avert_eyes'] = 'Увод взгляда с экрана';
$string['warning_timeout'] = 'Таймаут, соединение отсутствует';
$string['warning_change_active_window_on_computer'] = 'Смена активного окна на компьютере';
$string['warning_talk'] = 'Разговор во время экзамена';
$string['warning_forbidden_software'] = 'Используются запрещенные сайты/ПО';
$string['warning_forbidden_device'] = 'Используются запрещенные тех. средства';
$string['warning_voice_detected'] = 'Звуки голосов в трансляции';
$string['warning_extra_display'] = 'Используется второй монитор';
$string['warning_books'] = 'Использование книг/конспекта';
$string['warning_cheater'] = 'Нарушитель';
$string['warning_mic_muted'] = 'Микрофон отключен';
$string['warning_mic_no_sound'] = 'Нет звука';
$string['warning_mic_no_device_connected'] = 'Микрофон не подключен';
$string['warning_camera_no_picture'] = 'Нет изображения с камеры';
$string['warning_camera_no_device_connected'] = 'Камера не подключена';
$string['warning_nonverbal'] = 'Невербальное общение';
$string['warning_phone'] = 'Используется телефон';
$string['warning_phone_screen'] = 'Демонстрируется экран телефона';
$string['warning_no_ping'] = 'Приложение студента потеряло связь с сервером';
$string['warning_desktop_request_pending'] = 'Отсутствует доступ к рабочему столу';

$string['privacy:path'] = 'Записи прокторинга';
$string['privacy:metadata:availability_examus2_entries'] = 'Список записей прокторинга';
$string['privacy:metadata:availability_examus2_entries:courseid'] = 'Course ID';
$string['privacy:metadata:availability_examus2_entries:cmid'] = 'Course Module ID';
$string['privacy:metadata:availability_examus2_entries:attemptid'] = 'ID попытки';
$string['privacy:metadata:availability_examus2_entries:userid'] = 'ID пользователя, к которому относится попытка';
$string['privacy:metadata:availability_examus2_entries:accesscode'] = 'Accesscode';
$string['privacy:metadata:availability_examus2_entries:status'] = 'Статуст прокторинга';
$string['privacy:metadata:availability_examus2_entries:review_link'] = 'URL Результата';
$string['privacy:metadata:availability_examus2_entries:archiveurl'] = 'URL Архива';
$string['privacy:metadata:availability_examus2_entries:timecreated'] = 'Время создания записи';
$string['privacy:metadata:availability_examus2_entries:timemodified'] = 'Время модификации записи';
$string['privacy:metadata:availability_examus2_entries:timescheduled'] = 'Время, на которое запланирована запись';
$string['privacy:metadata:availability_examus2_entries:score'] = 'Скоринг прокторинга';
$string['privacy:metadata:availability_examus2_entries:comment'] = 'Комментарий проктора';
$string['privacy:metadata:availability_examus2_entries:threshold'] = 'Порог нарушения';
$string['privacy:metadata:availability_examus2_entries:warnings'] = 'Список предупреждений прокторинга';
$string['privacy:metadata:availability_examus2_entries:sessionstart'] = 'Время начала сессии';
$string['privacy:metadata:availability_examus2_entries:sessionend'] = 'Время окончания сессии';

//Hint text

$string['duration_desc'] = 'Длительность проводимого тестирования. При прокторинге с записью в слот это время должно быть обязательно эквивалентно продолжительности слота! Если слот длится 60 минут, то время потребуется указать также 60 минут.<br>Длительность всегда кратна 30-и минутам. Если тест длится 40 минут, то в ограничении потребуется выставлять 60 минут.<br><b>Важно:</b> по истечению времени Экзамус <b>не завершает<b> экзамен!';
$string['proctoring_mode_desc'] = 'Выбор режима прокторинга для проводимого тестирования:<br><ul><li>Синхронный (Экзамен с проктором в реальном времени)</li><li>Асинхронный (Экзамен с пост-просмотром видеозаписи)</li><li>Автоматический (Экзамен с автоматическим выставлением статус на основании скоринга)</li><li>Идентификация (Экзамен, при котором проктор только лишь идентифицирует пользователя, но не участвует в наблюдении; дальнейший процесс экзамена происходит с участием только автоматики).</li></ul>';
$string['identification_desc'] = 'Запрос фотографии по запросу на этапе идентификации студента:<br><ul><li>Паспорт - запросить фотографию только документа.</li><li>Лицо - запросить фотографию только лица.</li><li>Лицо и паспорт - запросить фотографию сначала лица, затем документа.</li><li>Пропустить – пропуск этапа идентификации, без запроса лица и/или паспорта. *</li></ul><b>Важно: *</b> рекомендуем использовать<br>Пропустить в том случае, если будет использоваться биометрическая идентификация. Если биометрия не применятся, то указывайте Лицо\Паспорт!';
$string['scheduling_required_desc'] = 'Поведение по умолчанию: если выбран синхронный режим прокторинга или Идентификация, то параметр «<b>Обязательна запись в календаре</b>» активен, т.е требуется запись в календаре; если выбран асинхронный или автоматический режим прокторинга, то запись в календаре не требуется.<br>По желанию этот параметр можно снять, таким образом убрать зависимость от режима прокторинга и обязательностью записи в календарный слот, например, возможно пройти тестирование в синхронном режиме прокторинга без записи в Календарь.';
$string['auto_rescheduling_desc'] = 'Предназначен только для синхронного прокторинга с записью в календаре.<br>Если студент записался на экзамен в слот, но пропустил его, то его попытка будет сброшена и появится возможность повторной записи в слот.';
$string['is_trial_desc'] = 'Экзамены с такой пометкой не будут выгружаться в отчете, а видеозаписи не будут отображаться в архиве.';
$string['enable_ldb_desc'] = 'Использовать защищённый браузер для прохождения тестирования.';
$string['custom_rules_desc'] = 'Прописанные текстом правила, которые отсутствуют в стандартном списке. Отображаются в интерфейсе проктора и в видеоархиве.';
$string['auxiliary_camera_desc'] = 'Добавляет обязательность прохождения экзамена с использованием дополнительной камеры смартфона через подключение по QR-коду.';
$string['rules_desc'] = 'Выбор правил тестирования из списка. При активации отображаются как активные иконки в интерфейсе пользователя и проктора.';
$string['visible_warnings_desc'] = 'При нарушении правил экзамена у тестируемого на экране могут отображаться различные предупреждения о нарушениях. Выберите, какие типы нарушений показывать тестируемому, а какие скрывать.<br><b>Важно:</b> если выбор не сделан, то будут использованы значения по умолчанию (показываются все)';
$string['scoring_params_header_desc'] = 'Для тонкой настройки расчета скоринга и вычисления результата прокторинга для конкретного экзамена можно менять параметры скоринга.<br><b>Важно:</b> если выбор не сделан, то будут использованы значения по умолчанию (показываются все)';
$string['desktop_app_forbidden_processes_desc'] = 'Используйте перенос строки для разделения приложений';
$string['desktop_app_allowed_processes_desc'] = 'Используйте перенос строки для разделения приложений';
$string['user_agreement_url_desc'] = 'Ссылка на правила (URL) на любой странице. Предназначено для вставки собственной страницы с правилами перед прохождением экзамена.';

$string['enabledAllowedProcesses'] = 'Включить разрешенные процессы';
$string['enabledForbiddenProcesses'] = 'Включить запрещенные процессы';
