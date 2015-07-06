<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

	define('PATH', $_SERVER['DOCUMENT_ROOT']);
	include(PATH.'/core/ajax/ajax_core.php');

    if (!$inUser->id) { cmsCore::halt(); }

	$target  = $inCore->request('target', 'str');
	$item_id = $inCore->request('item_id', 'int');
	$opt     = $inCore->request('opt', 'str');

	if(!$target || !$item_id || !$opt) { cmsCore::halt(); }

	if (!preg_match('/^([a-zA-Z0-9\_]+)$/iu', $target)) { cmsCore::halt(); }

	cmsCore::loadLib('karma');
	
	if ($opt=='plus'){
		cmsSubmitKarma($target, $item_id, 1);
	}
    
	if ($opt=='minus'){
		cmsSubmitKarma($target, $item_id, -1);
	}

	$postkarma = cmsKarma($target, $item_id);	

	$points = cmsKarmaFormat($postkarma['points']);

	echo $points;

	cmsCore::halt();

?>