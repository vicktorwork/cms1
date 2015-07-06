<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }

function applet_filters(){

	global $_LANG;

	global $adminAccess;
	if (!cmsUser::isAdminCan('admin/plugins', $adminAccess)) { cpAccessDenied(); }
	if (!cmsUser::isAdminCan('admin/filters', $adminAccess)) { cpAccessDenied(); }

	$GLOBALS['cp_page_title'] = $_LANG['AD_FILTERS'];
 	cpAddPathway($_LANG['AD_FILTERS'], 'index.php?view=filters');

	$do = cmsCore::request('do', 'str', 'list');
	$id = cmsCore::request('id', 'int', -1);

	if ($do == 'hide'){
		dbHide('cms_filters', $id);
		echo '1'; exit;
	}

	if ($do == 'show'){
		dbShow('cms_filters', $id);
		echo '1'; exit;
	}

	if ($do == 'list'){

        $fields[] = array('title'=>'id', 'field'=>'id', 'width'=>'30');
        $fields[] = array('title'=>$_LANG['TITLE'], 'field'=>'title', 'width'=>'250');
        $fields[] = array('title'=>$_LANG['DESCRIPTION'], 'field'=>'description', 'width'=>'');
        $fields[] = array('title'=>$_LANG['AD_ENABLE'], 'field'=>'published', 'width'=>'100');

		$actions = array();

		cpListTable('cms_filters', $fields, $actions);

	}

}

?>