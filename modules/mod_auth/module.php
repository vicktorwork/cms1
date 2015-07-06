<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

function mod_auth($module_id, $cfg){

    $inUser = cmsUser::getInstance();

    if ($inUser->id){ return false; }

    cmsUser::sessionPut('auth_back_url', cmsCore::getBackURL());

    cmsPage::initTemplate('modules', $cfg['tpl'])->
            assign('cfg', $cfg)->
            display($cfg['tpl']);

    return true;

}