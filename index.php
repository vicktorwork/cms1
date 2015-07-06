<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

Error_Reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

header('Content-Type: text/html; charset=utf-8');
header('X-Powered-By: vadyus');
define('PATH', dirname(__FILE__));
define('VALID_CMS', 1);

// Проверяем, что система установлена
if (!file_exists(PATH.'/includes/config.inc.php')){
    header('location:/install/');
    die();
}

session_start();

require(PATH.'/core/cms.php');
$inCore = cmsCore::getInstance();

// Загружаем нужные классы
cmsCore::loadClass('page');
cmsCore::loadClass('user');
cmsCore::loadClass('actions');

// Проверяем что директории установки и миграции удалены
if(is_dir(PATH.'/install') || is_dir(PATH.'/migrate')) {
    cmsPage::includeTemplateFile('special/installation.php');
    cmsCore::halt();
}

cmsCore::callEvent('GET_INDEX', '');

$inPage = cmsPage::getInstance();
$inConf = cmsConfig::getInstance();
$inUser = cmsUser::getInstance();

// автоматически авторизуем пользователя, если найден кукис
$inUser->autoLogin();

// проверяем что пользователь не удален и не забанен и загружаем его данные
if (!$inUser->update() && !$_SERVER['REQUEST_URI']!=='/logout') { cmsCore::halt(); }

//Если сайт выключен и пользователь не администратор,
//то показываем шаблон сообщения о том что сайт отключен
if ($inConf->siteoff &&
    !$inUser->is_admin &&
    $_SERVER['REQUEST_URI']!='/login' &&
    $_SERVER['REQUEST_URI']!='/logout'
   ){
        cmsPage::includeTemplateFile('special/siteoff.php');
        cmsCore::halt();
}

// Мониторинг пользователей
$inUser->onlineStats();

// Строим глубиномер
$inPage->addPathway($_LANG['PATH_HOME'], '/');

//Проверяем доступ пользователя
//При положительном результате
//Строим тело страницы (запускаем текущий компонент)
if ($inCore->checkMenuAccess()) {
    $inCore->proceedBody();
}

//Проверяем нужно ли показать входную страницу (splash)
if($inCore->isSplash()){
    //Показываем входную страницу
    if (!$inPage->showSplash()){
        //Если шаблон входной страницы не был найден,
        //показываем обычный шаблон сайта
        $inPage->showTemplate();
    }
} else {
    //показываем шаблон сайта
    $inPage->showTemplate();
}