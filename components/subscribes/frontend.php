<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/
if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

function subscribes(){

    $inCore = cmsCore::getInstance();
    $inUser = cmsUser::getInstance();

    $do = $inCore->do;

//========================================================================================================================//
//========================================================================================================================//
    if ($do=='view'){

        $subscribe  = cmsCore::request('subscribe', 'int', 0);
        $target     = cmsCore::request('target', 'str', '');
        $target_id  = cmsCore::request('target_id', 'int', 0);

        if (!$target_id || !$target){
            cmsCore::error404();
        }

        if ($inUser->id){
            cmsUser::subscribe($inUser->id,  $target, $target_id, $subscribe);
        }

        if(cmsCore::isAjax()){
            cmsCore::jsonOutput(array('subscribe'=>$subscribe));
        } else {
            cmsCore::redirectBack();
        }

    }

}
?>