<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

$_LANG['INS_DB_HOST_EMPTY']              = 'Необходимо указать сервер БД!';
$_LANG['INS_DB_BASE_EMPTY']              = 'Необходимо указать название БД!';
$_LANG['INS_DB_USER_EMPTY']              = 'Необходимо указать пользователя БД!';
$_LANG['INS_DB_PREFIX_EMPTY']            = 'Необходимо указать префикс БД!';
$_LANG['INS_ADMIN_LOGIN_EMPTY']          = 'Необходимо указать логин администратора, не менее 3-х символов!';
$_LANG['INS_ADMIN_PASS_6']               = 'не менее 6-ти символов!';
$_LANG['INS_ADMIN_PASS_EMPTY']           = 'Необходимо указать пароль администратора, '.$_LANG['INS_ADMIN_PASS_6'];
$_LANG['INS_HEADER']                     = 'Установка vadyus';
$_LANG['INS_START']                      = 'Начало';
$_LANG['INS_CHECK_PHP_TITLE']            = 'Проверка PHP';
$_LANG['INS_CHECK_PHP']                  = 'Проверка PHP расширений';
$_LANG['INS_CHECK_FOLDER_TITLE']         = 'Проверка прав';
$_LANG['INS_CHECK_FOLDER']               = 'Проверка прав на папки';
$_LANG['INS_INSTALL']                    = 'Установка';
$_LANG['INS_DO_INSTALL']                 = 'Установить';
$_LANG['INS_WELCOME']                    = 'Добро пожаловать';
$_LANG['INS_WELCOME_NOTES']              = '<p>Cкрипт установки проверит сервер на соответствие техническим требованиям и совершит все необходимые действия для начала работы с vadyus.</p><p>Устанавливать vadyus можно только в корневую директорию сайта.</p><p>Перед началом установки создайте новую базу данных MySQL на вашем хостинге. Сравнение (COLLATION) должно быть любое из utf8_* согласно ваших потребностей. В большинстве случаев это utf8_general_ci.</p><p>Как установить систему на локальный компьютер с ОС Windows&trade; для тестирования, читайте в <a href="http://www.cms.vadyus.com/wiki/doku.php/локальная_установка_денвер" target="_blank">инструкции</a> на официальном сайте.</p><p>vadyus распространяется по лицензии GNU/GPL версии 2. Вы должны согласиться с условиями этой лицензии для установки системы.</p>';
$_LANG['INS_ACCEPT_LICENSE']             = ' Я согласен с условиями <a target="_blank" href="/license.rus.txt">лицензии GNU/GPL</a> (<a target="_blank" href="http://www.gnu.org/licenses/gpl-2.0.html">оригинал на английском</a>).';
$_LANG['INS_CHECKPHP_HINT']              = 'Для корректной работы vadyus необходим php интерпретатор версии не ниже 5.2.0, веб сервер Apache + mod_rewrite (возможно использовать и чистый nginx, однако правила .htaccess необходимо переписать согласно документации), сервер баз данных MySQL не ниже 5 версии.<br>Ниже указана текущая версия php, перечислены требуемые расширения и их статус наличия.';
$_LANG['INS_PHP_VERSION']                = 'Версия PHP интерпретатора';
$_LANG['INS_INSTALL_VERSION']            = 'Установленная версия';
$_LANG['INS_NEED_EXTENTION']             = 'Требуемые расширения PHP';
$_LANG['INS_PHPNET_HINT']                = 'Посмотреть описание на сайте PHP';
$_LANG['INS_INSTALL_OK']                 = 'Установлено';
$_LANG['INS_INSTALL_NOTFOUND']           = 'Не найдено';
$_LANG['INS_FOLDERS_NOTES']              = '<p>Для корректной работы vadyus указанные ниже папки (и вложенные в них, но за исключением вложенных в "/includes") должны быть доступны для записи. Сменить права можно с помощью FTP-клиента или же непосредственно на сервере при помощи chmod.</p><p>Для успешного завершения установки необходимы как минимум права на запись для директории "/includes". Для остальных директорий допустимо игнорирование предупреждения о недоступности прав на запись, но только на момент установки.</p><p>Обращаем ваше внимание на то, что сразу после установки, на директорию "/includes" в целях безопасности права на запись необходимо снять. А после основного конфигурирования сайта сделать недоступным для записи файл /includes/config.inc.php</p>';

$_LANG['INS_PERMISSION']                 = 'Текущие права доступа';
$_LANG['INS_PERMISSION_OK']              = 'доступна для записи';
$_LANG['INS_PERMISSION_NO']              = 'недоступна для записи';
$_LANG['INS_FORM_INSERT']                = 'Заполните форму и нажмите "Установить" для завершения процесса.';
$_LANG['INS_FORM_SITE']                  = 'Название сайта: ';
$_LANG['INS_FORM_LOGIN']                 = 'Логин администратора сайта: ';
$_LANG['INS_FORM_PASS']                  = 'Пароль администратора сайта: ';
$_LANG['INS_FORM_MYSQL']                 = 'Сервер MySQL: ';
$_LANG['INS_FORM_BDNAME']                = 'Название базы данных: ';
$_LANG['INS_FORM_BDUSER']                = 'Пользователь БД: ';
$_LANG['INS_BDPASS']                     = 'Пароль пользователя БД: ';
$_LANG['INS_FORM_PREFIX']                = 'Префикс таблиц в базе данных: ';
$_LANG['INS_FORM_DEMO']                  = 'Демо-данные: ';
$_LANG['INS_FORM_NOTES']                 = '<p>При установке с демо-данными всем пользователям будет установлен одинаковый пароль, совпадающий с паролем администратора. Логин каждого пользователя можно узнать из адреса его профиля или из панели управления. </p><p>Установка может занять от секунд до нескольких минут, в зависимости от скорости вашего сервера.</p>';
$_LANG['INS_FORM_SUCCESS']               = 'Поздравляем, установка завершена! Система установлена и готова к работе.';
$_LANG['INS_CRON_TODO']                  = 'Создайте задание для CRON';
$_LANG['INS_CRON_NOTES']                 = 'Добавьте файл <strong>/cron.php</strong> в расписание заданий CRON в панели вашего хостинга.<br/>Интервал выполнения &mdash; 24 часа. Это позволит системе выполнять периодические сервисные задачи. Возможная команда, которую нужно добавить в CRON, выглядит так: ';
$_LANG['INS_FEEDBACK_SUPPORT']           = 'В случае затруднений обратитесь в техническую поддержку хостинга.';
$_LANG['INS_ATTENTION']                  = 'Внимание!';
$_LANG['INS_DELETE_TODO']                = 'До перехода на сайт необходимо удалить каталоги "install" и "migrate"<br/> на сервере вместе со всеми находящимися в них файлами!';
$_LANG['INS_GO_SITE']                    = 'Перейти на сайт';
$_LANG['INS_GO_CP']                      = 'Панель управления';
$_LANG['INS_GO_HANDBOOK']                = 'Учебник для начинающих';
$_LANG['INS_GO_VIDEO']                   = 'Видео-уроки';
$_LANG['INS_NEXT']                       = 'Далее →';
$_LANG['INS_BACK']                       = '← Назад';

$_LANG['INS_INCOMPLETE']                 = 'Установка не завершена';
$_LANG['INS_DELETE_INST_MIGRATE']        = 'Если процесс установки был закончен,<br/> удалите папки "install" и "migrate" на сервере и обновите страницу.';
$_LANG['INS_RELOAD_PAGE']                = 'Обновить страницу';

$_LANG['CFG_SITENAME']                   = 'Моя социальная сеть';
$_LANG['CFG_OFFTEXT']                    = 'Производится обновление сайта';
$_LANG['CFG_KEYWORDS']                   = 'vadyus, система управления сайтом, бесплатная CMS, движок сайта, CMS, движок социальной сети';
$_LANG['CFG_METADESC']                   = 'vadyus - бесплатная система управления сайтом с социальными функциями';

?>
