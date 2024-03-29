<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

ini_set('display_errors', 0);
error_reporting(E_ALL);

session_start();

define("VALID_CMS", 1);
define('PATH', $_SERVER['DOCUMENT_ROOT']);

include(PATH.'/core/cms.php');

$inCore = cmsCore::getInstance();

cmsCore::loadClass('page');
cmsCore::loadClass('user');
cmsCore::loadClass('upload_photo');

$inUser = cmsUser::getInstance();

if (!$inUser->update()) { cmsCore::error404(); }
if (!$inUser->id) { cmsCore::error404(); }

// Получаем компонент, с которого идет загрузка
$component = cmsCore::request('component', 'str', 'content');
// Проверяем установлен ли он
if(!$inCore->isComponentInstalled($component)) { cmsCore::error404(); }

$inUploadPhoto = cmsUploadPhoto::getInstance();

// объект плагина
$plugin = $inCore->loadPlugin('p_ckeditor');

// разрешена ли загрузка фото
if(!$plugin->canUpload()){ cmsCore::error404(); }

// Загружаем конфиг плагина
$cfg = $inCore->loadPluginConfig('p_ckeditor');
if(!$cfg) { cmsCore::error404(); }

global $_LANG;

// Выставляем конфигурационные параметры
$inUploadPhoto->upload_dir    = PATH.'/upload/';
$inUploadPhoto->medium_size_w = $cfg['photo_width'];
$inUploadPhoto->medium_size_h = $cfg['photo_height'];
$inUploadPhoto->thumbsqr      = false;
$inUploadPhoto->is_watermark  = $cfg['iswatermark'];
$inUploadPhoto->only_medium   = true;
$inUploadPhoto->dir_medium    = 'wysiwyg/';
$inUploadPhoto->input_name    = 'upload';
// Процесс загрузки фото
$file = $inUploadPhoto->uploadPhoto();

$http_path = '/upload/wysiwyg/'.$file['filename'];
$error     = '';

if (!$file['filename']) {
    $error     = $_LANG['CK_UPLOAD_ERROR'];
    $http_path = '';
}

cmsCore::halt('<script type="text/javascript">window.parent.CKEDITOR.tools.callFunction('.cmsCore::request('CKEditorFuncNum', 'int', 0).',  "'.$http_path.'", "'.$error.'" );</script>');
