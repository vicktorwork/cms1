<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }

function applet_cache(){

    $target    = cmsCore::request('target', 'str', '');
    $target_id = cmsCore::request('id', 'int', 0);

    if(!$target || !$target_id){
        cmsCore::error404();
    }

    cmsCore::deleteCache($target, $target_id);

	cmsCore::redirectBack();

}
?>