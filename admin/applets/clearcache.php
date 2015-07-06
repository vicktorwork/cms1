<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }

function applet_clearcache() {

  global $adminAccess;
  global $_LANG;

  if (!cmsUser::isAdminCan('admin/config', $adminAccess)) { cpAccessDenied(); }

  cmsCore::clearCache();

  cmsCore::addSessionMessage($_LANG['AD_CLEAR_CACHE_SUCCESS'], 'success');

  cmsCore::redirectBack();

}
?>