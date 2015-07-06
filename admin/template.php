<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/
	defined('VALID_CMS_ADMIN') or die();
	$inDB = cmsDatabase::getInstance();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php cpHead(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/styles.css?17" rel="stylesheet" type="text/css" />
<link href="js/hmenu/hmenu.css" rel="stylesheet" type="text/css" />
<link href="images/icons/ico.png" rel="SHORTCUT ICON" type="image/x-icon">
<link href="/includes/jquery/tablesorter/style.css" rel="stylesheet" type="text/css" />
<link href="/includes/jqueryui/css/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/admin.js"></script>
<script type="text/javascript" src="/includes/jquery/jquery.columnfilters.js"></script>
<script type="text/javascript" src="/includes/jquery/tablesorter/jquery.tablesorter.min.js"></script>
<script type="text/javascript" src="/includes/jquery/jquery.preload.js"></script>
<script type="text/javascript" src="/includes/jqueryui/jquery-ui.min.js"></script>
<script type="text/javascript" src="/includes/jqueryui/init-ui.js"></script>
<script type="text/javascript" src="/includes/jqueryui/i18n/jquery.ui.datepicker-<?php echo cmsConfig::getConfig('lang'); ?>.min.js"></script>
<script type="text/javascript" src="/includes/jquery/jquery.form.js"></script>
<script type="text/javascript" src="js/hltable.js"></script>
<script type="text/javascript" src="js/jquery.jclock.js"></script>
</head>

<body>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
        <tr>
            <td valign="top">
                <div id="container">
                    <div id="header" style="height:55px">
                        <table width="100%" height="55" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="230" align="left" valign="middle" style="padding-left:20px; padding-top:5px;">
                                    <a href="/admin/">
                                        <img src="images/toplogo.png" alt="<?php echo $_LANG['AD_ADMIN_PANEL']; ?>" border="0" />
                                    </a>
                                </td>
                                <td width="120">
                                    <div class="jdate"><?php echo date('d') .' '. $_LANG['MONTH_'.date('m')]; ?></div>
                                    <div class="jclock">00:00:00</div>
                                </td>
<td width="140">
	<div style="font-size:10px;margin:8px; width:180px;">
		<?php echo cpWhoOnline();?>
		
		  
	</div>
</td>
<td>

		<!-- <script type="text/javascript">
		function mouseOut()
		{
			document.getElementById('button' ).style.display = 'none';
			//visible = false;
		}
		function mouseOver()
		{
			document.getElementById('button' ).style.display = 'block';
			//visible = true;
		}
		</script>  
		<a style="float:left;" href="#"  onmouseover="mouseOver()" onmouseout="mouseOut()" ><img src="images/row_f.png"></a>
		<div id="button" style="display:none; position: absolute; z-index: 999; padding:8px">
			<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
				  <td width="16"><img src="images/icons/hmenu/users.png" width="16" height="16" /></td>
				  <td><a href="index.php?view=users"><?php echo $_LANG['AD_FROM_USERS']; ?></a> &mdash; <?php echo $inDB->rows_count('cms_users', 'is_deleted=0'); ?></td>
				</tr>
				<tr>
				  <td><img src="images/icons/hmenu/users.png" width="16" height="16" /></td>
				  <td><?php echo $_LANG['AD_NEW_USERS_TODAY']; ?> &mdash; <?php echo (int)$inDB->get_field('cms_users', "DATE_FORMAT(regdate, '%d-%m-%Y') = DATE_FORMAT(NOW(), '%d-%m-%Y') AND is_deleted = 0", 'COUNT(id)'); ?></td>
				</tr>
				<tr>
				  <td><img src="images/icons/hmenu/users.png" width="16" height="16" /></td>
				  <td><?php echo $_LANG['AD_NEW_USERS_THEES_WEEK']; ?> &mdash; <?php echo (int)$inDB->get_field('cms_users', "regdate >= DATE_SUB(NOW(), INTERVAL 7 DAY)", 'COUNT(id)'); ?></td>
				</tr>
				<tr>
				  <td><img src="images/icons/hmenu/users.png" width="16" height="16" /></td>
				  <td><?php echo $_LANG['AD_NEW_USERS_THEES_MONTH']; ?> &mdash; <?php echo (int)$inDB->get_field('cms_users', "regdate >= DATE_SUB(NOW(), INTERVAL 1 MONTH)", 'COUNT(id)'); ?></td>
				</tr>
			</table>
		</div> -->

<!--<script type="text/javascript">
function openbox(id){
    display = document.getElementById(id).style.display;

    if(display=='none'){
       document.getElementById(id).style.display='block';
    }else{
       document.getElementById(id).style.display='none';
    }
}
</script>
 <a href="#" onclick="openbox('box'); return false">Открыть</a>
<div id="box" style="display: none;">Отображаемый блок</div> -->




</td>
								 <td>
                                    <?php
                                        $new_messages =	$inUser->getNewMsg();
                                        if ($new_messages['total']){
                                            $msg_link = '<a href="/users/'.$inUser->id.'/messages.html" style="color:yellow">'.$_LANG['AD_NEW_MSG'].' ('.$new_messages['total'].')</a>';
                                        } else {
                                            $msg_link = '<span>'.$_LANG['NO'].' '.$_LANG['NEW_MESSAGES'].'</span>';
                                        }
                                    ?>
                                    <div class="juser"><?php echo $_LANG['AD_YOU']; ?> &mdash; <a href="<?php echo cmsUser::getProfileURL($inUser->login); ?>" target="_blank" title="<?php echo $_LANG['AD_GO_PROFILE']; ?>"><?php echo $inDB->get_field('cms_users', 'id='.$inUser->id, 'nickname'); ?></a>, ip: <?php echo $inUser->ip ?></div>
                                    <div class="jmessages"><?php echo $msg_link; ?></div>
                                </td>
                                <td width="120">
                                    <div class="jsite"><a href="/" target="_blank"><?php echo $_LANG['AD_OPEN_SITE']; ?></a></div>
                                    <div class="jlogout"><a href="/logout" target="" ><?php echo $_LANG['AD_EXIT']; ?></a></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div id="mainmenu" style="height:24px; background:url(js/hmenu/hmenubg.jpg) repeat-x">
                        <div style="padding-left:15px;height:24px"><?php cpMenu(); ?></div>
                    </div>
                    <div id="pathway" style="margin-top:4px;">
                        <?php cpPathway('&rarr;'); ?>
                    </div>
                    <?php $messages = cmsCore::getSessionMessages();
                    if ($messages) { ?>
                    <div class="sess_messages">
                        <?php foreach($messages as $message){
                                 echo $message;
                              }?>
                    </div>
                    <?php } ?>
                    <div id="body" style="padding:5px 10px 10px 10px;">
                        <?php cpBody(); ?>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td height="50">
                <div id="footer" style="text-align:center;background:#ecf0f1;height:50px;line-height:50px;border-top: 1px solid #95a5a6;">
                    &copy; <a href="http://www.cms.vadyus.com/"><strong>vadyus</strong></a><strong> v<?php echo CORE_VERSION?>, 2007—<?php echo date('Y'); ?></strong><br />
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
