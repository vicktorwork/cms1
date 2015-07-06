<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

session_start();

$captcha_id = trim(@$_GET['id']);
if (!preg_match('/^[0-9a-f]{32}$/i', $captcha_id)){ die; }

include('kcaptcha.php');
$captcha = new KCAPTCHA();

$_SESSION['captcha'][$captcha_id] = $captcha->getKeyString();

