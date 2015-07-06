<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

define('PATH', $_SERVER['DOCUMENT_ROOT']);
include(PATH.'/core/ajax/ajax_core.php');

$module_id = cmsCore::request('module_id', 'int', 0);
if(!$module_id){ cmsCore::halt(); }

$cfg = $inCore->loadModuleConfig($module_id);

cmsCore::includeFile('modules/mod_polls/module.php');

mod_polls($module_id, $cfg);