<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }

function applet_noaccess(){

    global $_LANG;

    $GLOBALS['cp_page_title'] = $_LANG['ACCESS_DENIED'];
 	cpAddPathway($_LANG['ACCESS_DENIED'], 'index.php?view=noaccess');

    echo '<h3>'.$_LANG['ACCESS_DENIED'].'</h3>';
    echo '<p>'.$_LANG['AD_ACCESS_DENIED_TEXT'].'</p>';
    echo '<p><a href="javascript:void(0)" onclick="window.history.go(-1)">'.$_LANG['BACK'].'</a></p>';

}

?>