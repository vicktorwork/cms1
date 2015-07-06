<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

    define('PATH', $_SERVER['DOCUMENT_ROOT']);
	include(PATH.'/core/ajax/ajax_core.php');

	// Входные переменые
    $user_id  = cmsCore::request('user_id', 'int', 0);
	if(!$user_id) { cmsCore::halt(); }

    $plugin = cmsCore::loadPlugin('p_usertab');

    if ($plugin!==false){
        $plugin->execute('', array('user_id'=>$user_id));
        $html = $plugin->viewTab($user_id);
    }

    cmsCore::halt($html);

?>
