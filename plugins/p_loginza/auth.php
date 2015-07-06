<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/
Error_Reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

header('Content-Type: text/html; charset=utf-8');

session_start();

define("VALID_CMS", 1);
define('PATH', $_SERVER['DOCUMENT_ROOT']);

include(PATH.'/core/cms.php');

cmsCore::getInstance();

cmsCore::loadClass('page');
cmsCore::loadClass('user');

$inUser = cmsUser::getInstance();

if (!$inUser->update() || $inUser->id) { cmsCore::halt(); }

if (cmsConfig::getConfig('siteoff') && !$inUser->is_admin){ cmsCore::halt(); }

cmsCore::callEvent('LOGINZA_AUTH', array());

cmsCore::halt();