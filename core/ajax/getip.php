<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

	define('PATH', $_SERVER['DOCUMENT_ROOT']);
	include(PATH.'/core/ajax/ajax_core.php');

    if (!$inUser->is_admin) { cmsCore::halt(); }

    $user_id = cmsCore::request('user_id', 'int');
    if (!$user_id) { cmsCore::halt(); }

	$last_ip = $inDB->get_field('cms_users', "id = '$user_id'", 'last_ip');

	echo $last_ip;

	cmsCore::halt();

?>
