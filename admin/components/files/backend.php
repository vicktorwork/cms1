<?php
if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/
/******************************************************************************/

$opt = cmsCore::request('opt', 'str', 'list');

cmsCore::loadModel('file');

$toolmenu = array();

if($opt=='list'){

    $toolmenu[] = array('icon'=>'new.gif', 'title'=>$_LANG['AD_ADD_BANNER'], 'link'=>'?view=components&do=config&id='.$id.'&opt=add');
    //$toolmenu[] = array('icon'=>'edit.gif', 'title'=>$_LANG['AD_EDIT_SELECTED'], 'link'=>"javascript:checkSel('?view=components&do=config&id=".$id."&opt=edit&multiple=1');");
    // $toolmenu[] = array('icon'=>'show.gif', 'title'=>$_LANG['AD_ALLOW_SELECTED'], 'link'=>"javascript:checkSel('?view=components&do=config&id=".$id."&opt=show_banner&multiple=1');");
    //$toolmenu[] = array('icon'=>'hide.gif', 'title'=>$_LANG['AD_DISALLOW_SELECTED'], 'link'=>"javascript:checkSel('?view=components&do=config&id=".$id."&opt=hide_banner&multiple=1');");

} else {

    $toolmenu[] = array('icon'=>'save.gif', 'title'=>$_LANG['SAVE'], 'link'=>'javascript:document.addform.submit();');
    $toolmenu[] = array('icon'=>'cancel.gif', 'title'=>$_LANG['CANCEL'], 'link'=>'?view=components&do=config&id='.$id);

}

cpToolMenu($toolmenu);



if($opt == 'delete'){
	if (!$inUser->id) { cmsUser::goToLogin(); }
    
    $item_id = cmsCore::request('item_id', 'int', 0);

    $filename = $inDB->get_field('cms_user_files', "id = '$item_id'", 'filename');
    if(!$filename){ cmsCore::error404(); }

	$upload_dir = PATH.'/upload/userfiles/'.$inUser->id.'/';
    $inDB->query("DELETE FROM cms_user_files WHERE id = '$item_id'");

	@unlink($upload_dir.$filename);
    cmsCore::redirectBack();
}

if ($opt == 'list'){
	
	if($_POST['title_submit']){
		$inDB->query("UPDATE cms_user_files SET title = '$_POST[new_title]' WHERE id = '$_POST[file_id]'");
		cmsCore::redirect('index.php?view=components&do=config&link=files');
	}
	
    $fields[] = array('title'=>'id', 'field'=>'id', 'width'=>'30');
    //$fields[] = array('title'=>'Имя файла', 'field'=>'filename', 'width'=>'200', 'filter'=>15, 'fdate'=>cmsCore::fileIcon('%filename%'));
    $fields[] = array('title'=>'Название', 'field'=>'title', 'width'=>'200', 'filter'=>15, 'link'=>"javascript:change_title(%id%)");
    $fields[] = array('title'=>'Имя файла', 'field'=>'filename', 'width'=>'100', 'filter'=>15);
    
//	$fields[] = array('title'=>'filename', 'field'=>'filename', 'width'=>'100', 'filter'=>15, 'link'=>'/upload/userfiles/'.$inUser->id.'/%filename%');
	
	$fields[] = array('title'=>'Размер', 'field'=>'filesize', 'width'=>'200', 'filter'=>15);
    $fields[] = array('title'=>'Скачен', 'field'=>'hits', 'width'=>'200', );
    $fields[] = array('title'=>'Дата добавления', 'field'=>'pubdate', 'width'=>'100', 'filter'=>15, 'fdate'=>'%d/%m/%Y');
  /*
    $fields[] = array('title'=>$_LANG['TITLE'], 'field'=>'title', 'width'=>'', 'filter'=>15, 'link'=>'?view=components&do=config&id='.$id.'&opt=edit&item_id=%id%');
    $fields[] = array('title'=>$_LANG['AD_POSITION'], 'field'=>'position', 'width'=>'100', 'filter'=>15);
    $fields[] = array('title'=>$_LANG['AD_IS_PUBLISHED'], 'field'=>'published', 'width'=>'100', 'do'=>'opt', 'do_suffix'=>'_banner');
    $fields[] = array('title'=>$_LANG['AD_BANNER_HITS'], 'field'=>array('maxhits','hits'), 'width'=>'90', 'prc'=>'bannerHitsbyID');
    $fields[] = array('title'=>$_LANG['AD_BANNER_CLICKS'], 'field'=>'clicks', 'width'=>'90');
    $fields[] = array('title'=>$_LANG['AD_BANNER_CTR'], 'field'=>array('clicks','hits'), 'width'=>'90', 'prc'=>'bannerCTRbyID');
*/
    //$actions[] = array('title'=>$_LANG['EDIT'], 'icon'=>cmsCore::fileIcon('%filename%'), 'link'=>'?view=components&do=config&id='.$id.'&opt=edit&item_id=%id%');
    //$actions[] = array('title'=>$_LANG['EDIT'], 'icon'=>'edit.gif', 'link'=>'?view=components&do=config&id='.$id.'&opt=edit&item_id=%id%');
    $actions[] = array('title'=>$_LANG['DELETE'], 'icon'=>'delete.gif', 'confirm'=>$_LANG['AD_BANNER_DEL_CONFIRM'], 'link'=>'?view=components&do=config&id='.$id.'&opt=delete&item_id=%id%'); 

    cpListTable('vds_user_files', $fields, $actions, '', 'pubdate DESC');
	
	//echo cmsCore::fileIcon('site-vizitka-154d230d5317ff.png');
	?>
	<div id="form_bg"></div>
	<form action=""  method="POST" name="msgform" id="change_title" style="display: none;">
		<input type="text" name="new_title" id="new_title" value="">
		<input type="hidden" name="file_id" id="file_id" value="">
		<input name="title_submit" type="submit" value="Сохранить">
	</form>
	<script>
		$(document).ready(function(){
			$("#form_bg").click(function(){
				$(this).fadeOut();
				$("#change_title").fadeOut();
			});
		});
	</script>
	<?php
}

if ($opt == 'add'){

$inPage = cmsPage::getInstance();


 global $_LANG;
 
 $config = $inCore->loadComponentConfig('users');
 
	if (!$inUser->id) { cmsUser::goToLogin(); }

    $usr = cmsUser::getShortUserData($inUser->id);
	
    if (!$usr) { cmsCore::error404(); }

    $free_mb = $config['filessize'] ?
        //   round($config['filessize'] - round(($model->getUserFilesSize($usr['id']) / 1024) / 1024, 2), 2) :
          round($config['filessize'] - round((10000 / 1024) / 1024, 2), 2) :
		  '';

	if(cmsCore::inRequest('upload')){

		$size_mb      = 0;
		$loaded_files = array();

		$list_files = array();

		foreach($_FILES['upfile'] as $key=>$value) {
			foreach($value as $k=>$v) { $list_files['upfile'.$k][$key] = $v; }
		}

		$filename2 = cmsCore::request('filename', 'str', 0);
		
		
		//var_dump($filename2);
		
		foreach ($list_files as $key=>$data_array) {
		
			if ($data_array['error'] != UPLOAD_ERR_OK) { continue; }

			$upload_dir = PATH.'/upload/userfiles/'.$usr['id'];
			@mkdir($upload_dir);

			$name       = $data_array["name"];
			$size       = cmsCore::strClear($data_array["size"]);
			$size_mb    += round(($size/1024)/1024, 2);

			// проверяем тип файла
			$maytypes 	= explode(',', str_replace(' ', '', $config['filestype']));
			$path_parts = pathinfo($name);
			// расширение файла
			$ext        = mb_strtolower($path_parts['extension']);

			if(in_array($ext, array('php','htm','html','htaccess'))) { cmsCore::addSessionMessage($_LANG['ERROR_TYPE_FILE'].': '.$config['filestype'], 'error'); cmsCore::redirectBack(); }
			if(!in_array($ext, $maytypes)) { cmsCore::addSessionMessage($_LANG['ERROR_TYPE_FILE'].': '.$config['filestype'], 'error'); cmsCore::redirectBack(); }

			// Переводим имя файла в транслит
			// отделяем имя файла от расширения
			$name  = mb_substr($name, 0, mb_strrpos($name, '.'));
			// транслитируем
			$name  = cmsCore::strToURL(preg_replace('/\.+\//', '', $name)).uniqid();
			// присоединяем расширения файла
			$name .= '.'.$ext;
			// Обрабатываем получившееся имя файла для записи в БД
			$name  = cmsCore::strClear($name);

			// Проверяем свободное место
			if ($size_mb > $free_mb && $config['filessize']){ cmsCore::addSessionMessage($_LANG['YOUR_FILE_LIMIT'].' ('.$max_mb.' '.$_LANG['MBITE'].') '.$_LANG['IS_OVER_LIMIT'].'<br>'.$_LANG['FOR_NEW_FILE_DEL_OLD'], 'error'); cmsCore::redirectBack(); }

			// Загружаем файл
			if ($inCore->moveUploadedFile($data_array["tmp_name"], PATH."/upload/userfiles/{$usr['id']}/$name", $data_array['error'])) {

				$loaded_files[] = $name;

				$sql = "INSERT INTO cms_user_files(user_id, title, filename, pubdate, allow_who, filesize, hits)
						VALUES ({$usr['id']}, '$filename2', '$name', NOW(), 'all', '$size', 0)";
				$inDB->query($sql);
				$file_id = $inDB->get_last_id('cms_user_files');
				cmsActions::log('add_file', array(
					  'object' => $filename2,
					  'object_url' => '/users/files/download'.$file_id.'.html',
					  'object_id' => $file_id,
					  'target' => '',
					  'target_url' => '',
					  'description' => ''
				));

			}

		}

		if (sizeof($loaded_files)){

            cmsCore::addSessionMessage($_LANG['FILE_UPLOAD_FINISH'], 'success');

			if ($model->config['filessize']){
                cmsCore::addSessionMessage('<strong>'.$_LANG['FREE_SPACE_LEFT'].':</strong> '.round($free_mb-$size_mb, 2).' '.$_LANG['MBITE'], 'info');
			}

            ///cmsCore::redirect('/users/'.$usr['id'].'/files.html');
            cmsCore::redirect('index.php?view=components&do=config&id=24');
			//cmsCore::redirectBack();
		} else {
			cmsCore::addSessionMessage($_LANG['ERR_BIG_FILE'].' '.$_LANG['ERR_FILE_NAME'], 'error');
            //cmsCore::redirectBack();
		}

	}

	$types = $config['filestype'];
	$post_max_b = trim(@ini_get('upload_max_filesize'));
	
		$last = mb_strtolower($post_max_b{mb_strlen($post_max_b)-1});
		switch($last) {
			case 'g':
				$post_max_b *= 1024;
			case 'm':
				$post_max_b *= 1024;
			case 'k':
				$post_max_b *= 1024;
		}
	$post_max_mb = (round($post_max_b/1024)/1024) . ' '.$_LANG['MBITE'];
	?>
	
<script type="text/javascript">
    function startUpload(){
          $("#upload_btn").prop('disabled', true);
          $("#upload_btn").val(LANG_LOADING+'...');
          $("#cancel_btn").css('display', 'none');
          $("#loadergif").css('display', 'block');
          document.uploadform.submit();
    }
    $(function(){ $('#upfile').MultiFile({ accept:'{$types}', max:3, STRING: { remove:LANG_CANCEL, selected:LANG_FILE_SELECTED, denied:LANG_FILE_DENIED, duplicate:LANG_FILE_DUPLICATE } }); });
</script>

<h2>Добавление файла</h2>
<!-- {if $free_mb > 0 || !$cfg.filessize}
<div>{$LANG.SELECT_FILE_TEXT}</div>
{if $cfg.filessize}
<div style="margin:10px 0px 0px 0px"><strong>{$LANG.YOUR_FILE_LIMIT}:</strong> {$free_mb} {$LANG.MBITE}</div>
{/if} -->
<div style="margin:0px 0px 10px 0px"><strong><? echo $_LANG['MAX_FILE_SIZE']; ?>:</strong> <? echo $post_max_mb; ?></div>
<div style="margin:0px 0px 10px 0px"><strong><? echo $_LANG['TYPE_FILE']; ?>:</strong> <? echo $types; ?></div>
<form action="" method="post" enctype="multipart/form-data" name="uploadform">
  <input name="MAX_FILE_SIZE" type="hidden" value="<? echo $post_max_b; ?>"/>
  <input type="file" name="upfile[]" id="upfile" />
  <input type="text" name="filename"  placeholder="Название файла" id="filename" />
  <div style="margin-top:20px;overflow:hidden">
    <input style="float:left;margin-right:4px" type="button" name="upload_btn" id="upload_btn" value="<? echo $_LANG['UPLOAD_FILES']; ?>" onclick="startUpload()"/>
    <input style="float:left" type="button" name="cancel_btn" id="cancel_btn" value="<? echo $_LANG['CANCEL']; ?>" onclick="window.history.go(-1)" />
    <div id="loadergif" style="display:none;float:left;margin:6px"><img src="/images/ajax-loader.gif" border="0"/></div>
  </div>
  <input type="hidden" name="upload" value="1"/>
</form>
<!-- {else}
<div style="color:#660000;margin-bottom:10px;font-weight:bold"><? echo $_LANG['YOUR_FILE_LIMIT']; ?> (<? echo $max_mb;?> <? echo $_LANG['MBITE']; ?>) <? echo $_LANG['IS_OVER_LIMIT']; ?>.</div>
<div style="color:#660000;font-weight:bold"><? echo $_LANG['FOR_NEW_FILE_DEL_OLD']; ?></div>
<div style="margin-top:20px">
  <input type="button" name="cancel" value="<? echo $_LANG['CANCEL']; ?>" onclick="window.history.go(-1)" />
</div>
{/if} -->
	
	
<!--
    <form action="index.php?view=components&amp;do=config&amp;id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" name="addform" id="addform">
    <input type="hidden" name="csrf_token" value="<?php echo cmsUser::getCsrfToken(); ?>" />
    <table width="625" border="0" cellspacing="5" class="proptable">
      <tr>
        <td width="298"><strong><?php echo $_LANG['AD_BANNER_TITLE']; ?></strong><br />
            <span class="hinttext"><?php echo $_LANG['AD_BANNER_DISPLAYED']; ?></span></td>
        <td width="308"><input name="title" type="text" id="title" size="45" value="<?php echo @$mod['title'];?>"/></td>
      </tr>
      <tr>
        <td><strong><?php echo $_LANG['AD_BANNER_LINK']; ?></strong><br />
            <span class="hinttext"><?php echo $_LANG['AD_BANNER_REMINDER']; ?></span></td>
        <td><input name="b_link" type="text" size="45" value="<?php echo @$mod['link'];?>"/></td>
      </tr>
      <tr>
        <td><strong><?php echo $_LANG['AD_POSITION']; ?></strong></td>
        <td><select name="position" id="position">
                <?php for($m=1;$m<=30;$m++){ ?>
                    <option value="banner<?php echo $m; ?>" <?php if(@$mod['position']=='banner'.$m) { echo 'selected'; } ?>>banner<?php echo $m; ?></option>
                <?php } ?>
        </select></td>
      </tr>
      <tr>
        <td><strong><?php echo $_LANG['AD_BANNER_TYPE']; ?></strong></td>
        <td><select name="typeimg" id="typeimg">
          <option value="image" <?php if(@$mod['typeimg']=='image') { echo 'selected'; } ?>><?php echo $_LANG['AD_BANNER_IMAGE']; ?></option>
          <option value="swf" <?php if(@$mod['typeimg']=='swf') { echo 'selected'; } ?>><?php echo $_LANG['AD_BANNER_FLASH']; ?></option>
        </select></td>
      </tr>
      <tr>
        <td><strong><?php echo $_LANG['AD_BANNER_FILE']; ?></strong><br />
            <span class="hinttext"><?php echo $_LANG['AD_BANNER_FILE_TYPES']; ?></span></td>
        <td><?php if (@$mod['file']) { echo '<a href="/images/photos/'.$mod['file'].'" title="'.$_LANG['AD_BANNER_VIEW_PHOTO'].'">'.$mod['file'].'</a>'; } else { ?>
            <input name="picture" type="file" id="picture" size="30" />
          <?php } ?></td>
      </tr>
      <tr>
        <td><strong><?php echo $_LANG['AD_BANNER_MAX_HITS']; ?></strong><br />
            <span class="hinttext"><?php echo $_LANG['AD_UNLIMITED_HITS']; ?></span></td>
        <td><input name="maxhits" type="text" id="maxhits" size="5" value="<?php echo @$mod['maxhits'];?>"/> <?php echo $_LANG['AD_HITS_LIMIT']; ?></td>
      </tr>
      <tr>
        <td><strong><?php echo $_LANG['AD_BANNER_PUBLISH']; ?></strong><br />
            <span class="hinttext"><?php echo $_LANG['AD_BANNER_DISALLOW']; ?></span></td>
        <td><label><input name="published" type="radio" value="1" checked="checked" <?php if (@$mod['published']) { echo 'checked="checked"'; } ?> /><?php echo $_LANG['YES']; ?></label>
          <label><input name="published" type="radio" value="0"  <?php if (@!$mod['published']) { echo 'checked="checked"'; } ?> /><?php echo $_LANG['NO']; ?></label></td>
      </tr>
    </table>
    <p><strong><?php echo $_LANG['AD_NOTE']; ?></strong> <?php echo $_LANG['AD_BANNER_NOTE']; ?></p>
    <p>
      <input name="add_mod" type="submit" id="add_mod" value="<?php echo $_LANG['SAVE']; ?>" />
      <input name="back3" type="button" id="back3" value="<?php echo $_LANG['CANCEL']; ?>" onclick="window.location.href='index.php?view=components&amp;do=config&amp;id=<?php echo $id; ?>';"/>
      <input name="opt" type="hidden" id="opt" <?php if ($opt=='add') { echo 'value="submit"'; } else { echo 'value="update"'; } ?> />
      <?php
        if ($opt=='edit'){
         echo '<input name="item_id" type="hidden" value="'.$mod['id'].'" />';
        }
      ?>
    </p>
</form>-->
 <?php
}


?>