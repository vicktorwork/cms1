<?php
if(!defined('VALID_CMS_ADMIN')) { die('ACCESS DENIED'); }
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/




/******************************************************************************/

$opt = cmsCore::request('opt', 'str', 'list');

cmsCore::loadModel('files');

$toolmenu = array();

if($opt=='list'){

    $toolmenu[] = array('icon'=>'new.gif', 'title'=>$_LANG['AD_ADD_BANNER'], 'link'=>'?view=components&do=config&id='.$id.'&opt=add');
    $toolmenu[] = array('icon'=>'edit.gif', 'title'=>$_LANG['AD_EDIT_SELECTED'], 'link'=>"javascript:checkSel('?view=components&do=config&id=".$id."&opt=edit&multiple=1');");
    $toolmenu[] = array('icon'=>'show.gif', 'title'=>$_LANG['AD_ALLOW_SELECTED'], 'link'=>"javascript:checkSel('?view=components&do=config&id=".$id."&opt=show_banner&multiple=1');");
    $toolmenu[] = array('icon'=>'hide.gif', 'title'=>$_LANG['AD_DISALLOW_SELECTED'], 'link'=>"javascript:checkSel('?view=components&do=config&id=".$id."&opt=hide_banner&multiple=1');");

} else {

    $toolmenu[] = array('icon'=>'save.gif', 'title'=>$_LANG['SAVE'], 'link'=>'javascript:document.addform.submit();');
    $toolmenu[] = array('icon'=>'cancel.gif', 'title'=>$_LANG['CANCEL'], 'link'=>'?view=components&do=config&id='.$id);

}

cpToolMenu($toolmenu);

if ($opt == 'show_banner'){
    if (!isset($_REQUEST['item'])){
        if (isset($_REQUEST['item_id'])){ dbShow('cms_banners', $_REQUEST['item_id']);  }
        echo '1'; exit;
    } else {
        dbShowList('cms_banners', $_REQUEST['item']);
        cmsCore::redirectBack();
    }
}

if ($opt == 'hide_banner'){
    if (!isset($_REQUEST['item'])){
        if (isset($_REQUEST['item_id'])){ dbHide('cms_banners', $_REQUEST['item_id']);  }
        echo '1'; exit;
    } else {
        dbHideList('cms_banners', $_REQUEST['item']);
        cmsCore::redirectBack();
    }
}

if ($opt == 'submit' || $opt == 'update'){

    if(!cmsCore::validateForm()) { cmsCore::error404(); }

    $item_id = cmsCore::request('item_id', 'int', 0);

    $title   = cmsCore::request('title', 'str', $_LANG['AD_UNTITLED_BANNER']);
    $link    = cmsCore::request('b_link', 'str');
    $typeimg = cmsCore::request('typeimg', 'str');
    $maxhits = cmsCore::request('maxhits', 'int');
    $maxuser = 0;
    $published = cmsCore::request('published', 'int', 0);
    $position  = cmsCore::request('position', 'str');

    if(@$_FILES['picture']['size']){

        $ext = mb_strtolower(pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION));

        if(!in_array($ext, array('jpg','jpeg','gif','png','swf'))){
            cmsCore::addSessionMessage($_LANG['AD_INCORRECT_FILE_TYPE'], 'error');
            cmsCore::redirectBack();
        }

        $filename   = md5(microtime()).'.'.$ext;
        $uploaddir  = PATH.'/images/banners/';
        $uploadfile = $uploaddir . $filename;

        if(cmsCore::moveUploadedFile($_FILES['picture']['tmp_name'], $uploadfile, $_FILES['picture']['error'])){

            if($opt == 'submit'){

                $sql = "INSERT INTO cms_banners (position, typeimg, fileurl, hits, clicks, maxhits, maxuser, user_id, pubdate, title, link, published)
                        VALUES ('$position', '$typeimg', '$filename', 0, 0, '$maxhits', '$maxuser', 1, NOW(), '$title', '$link', '$published')";
                $inDB->query($sql);

                cmsCore::redirect('?view=components&do=config&opt=list&id='.$id);

            } else {

                $fileurl = $inDB->get_field('cms_banners', "id = '$item_id'", 'fileurl');
                @unlink($uploaddir.$fileurl);

                $sql = "UPDATE cms_banners SET fileurl = '$filename' WHERE id = '$item_id'";
                $inDB->query($sql) ;

            }

        } else {
            cmsCore::addSessionMessage($_LANG['AD_ADDING_ERROR_TEXT'].cmsCore::uploadError(), 'error');
            cmsCore::redirectBack();
        }

    } elseif($opt == 'submit') {

        cmsCore::addSessionMessage($_LANG['AD_ADDING_ERROR_TEXT'], 'error');
        cmsCore::redirectBack();

    }

    if($opt == 'update'){

        $sql = "UPDATE cms_banners
                SET position = '$position',
                    title = '$title',
                    published = '$published',
                    maxhits = '$maxhits',
                    maxuser = '$maxuser',
                    typeimg = '$typeimg',
                    link = '$link'
                WHERE id = '$item_id'";

        $inDB->query($sql);

        if (!isset($_SESSION['editlist']) || @sizeof($_SESSION['editlist'])==0){
            cmsCore::redirect('?view=components&do=config&opt=list&id='.$id);
        } else {
            cmsCore::redirect('?view=components&do=config&opt=edit&id='.$id);
        }

    }

}

if($opt == 'delete'){

    $item_id = cmsCore::request('item_id', 'int', 0);

    $fileurl = $inDB->get_field('cms_banners', "id = '$item_id'", 'fileurl');
    if(!$fileurl){ cmsCore::error404(); }
    @unlink($uploaddir.$fileurl);

    $inDB->query("DELETE FROM cms_banners WHERE id = '$item_id'");
    $inDB->query("DELETE FROM cms_banner_hits WHERE banner_id = '$item_id'");

    cmsCore::redirectBack();

}

if ($opt == 'list'){

    $fields[] = array('title'=>'id', 'field'=>'id', 'width'=>'30');
    $fields[] = array('title'=>'Имя файла', 'field'=>'filename', 'width'=>'200', 'filter'=>15);
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
    $actions[] = array('title'=>$_LANG['EDIT'], 'icon'=>'edit.gif', 'link'=>'?view=components&do=config&id='.$id.'&opt=edit&item_id=%id%');
    $actions[] = array('title'=>$_LANG['DELETE'], 'icon'=>'delete.gif', 'confirm'=>$_LANG['AD_BANNER_DEL_CONFIRM'], 'link'=>'?view=components&do=config&id='.$id.'&opt=delete&item_id=%id%'); 

    cpListTable('vds_user_files', $fields, $actions, '', 'pubdate DESC');
}

if ($opt == 'add' || $opt == 'edit'){

$inPage = cmsPage::getInstance();

/*
    if ($opt=='add'){
        echo '<h3>Добавить файл</h3>';
        cpAddPathway('Добавление файла');
    } else {
        if(isset($_REQUEST['multiple'])){
            if (isset($_REQUEST['item'])){
                $_SESSION['editlist'] = cmsCore::request('item', 'array_int', array());
            } else {
                cmsCore::addSessionMessage($_LANG['AD_NO_SELECT_OBJECTS'], 'error');
                cmsCore::redirectBack();
            }
        }

        $ostatok = '';

        if (isset($_SESSION['editlist'])){
           $item_id = array_shift($_SESSION['editlist']);
           if (sizeof($_SESSION['editlist'])==0) { unset($_SESSION['editlist']); } else
           { $ostatok = '('.$_LANG['AD_NEXT_IN'].sizeof($_SESSION['editlist']).')'; }
        } else { $item_id = cmsCore::request('item_id', 'int', 0); }

        $mod = cms_model_banners::getBanner($item_id);
        if(!$mod){ cmsCore::error404(); }

        echo '<h3>'.$mod['title'].' '.$ostatok.'</h3>';
        cpAddPathway($mod['title']);

    }
    ?>
    <?php if ($opt=='edit') { ?>
        <table width="625" border="0" cellspacing="5" class="proptable">
              <tr>
                <td align="center">
                    <?php echo cms_model_banners::getBannerById($item_id); ?>
                </td>
             </tr>
        </table>
    <?php } ?>
	
	*/
	
	
	
	
	if (!$inUser->id) { cmsUser::goToLogin(); }

    $usr = cmsUser::getShortUserData($inUser->id);
    if (!$usr) { cmsCore::error404(); }

    $free_mb = $model->config['filessize'] ?
           round($model->config['filessize'] - round(($model->getUserFilesSize($usr['id']) / 1024) / 1024, 2), 2) :
           '';

	if(cmsCore::inRequest('upload')){

		$size_mb      = 0;
		$loaded_files = array();

		$list_files = array();

		foreach($_FILES['upfile'] as $key=>$value) {
			foreach($value as $k=>$v) { $list_files['upfile'.$k][$key] = $v; }
		}

		foreach ($list_files as $key=>$data_array) {

			if ($data_array['error'] != UPLOAD_ERR_OK) { continue; }

			$upload_dir = PATH.'/upload/userfiles/'.$usr['id'];
			@mkdir($upload_dir);

			$name       = $data_array["name"];
			$size       = cmsCore::strClear($data_array["size"]);
			$size_mb    += round(($size/1024)/1024, 2);

			// проверяем тип файла
			$maytypes 	= explode(',', str_replace(' ', '', $model->config['filestype']));
			$path_parts = pathinfo($name);
			// расширение файла
			$ext        = mb_strtolower($path_parts['extension']);

			if(in_array($ext, array('php','htm','html','htaccess'))) { cmsCore::addSessionMessage($_LANG['ERROR_TYPE_FILE'].': '.$model->config['filestype'], 'error'); cmsCore::redirectBack(); }
			if(!in_array($ext, $maytypes)) { cmsCore::addSessionMessage($_LANG['ERROR_TYPE_FILE'].': '.$model->config['filestype'], 'error'); cmsCore::redirectBack(); }

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
			if ($size_mb > $free_mb && $model->config['filessize']){ cmsCore::addSessionMessage($_LANG['YOUR_FILE_LIMIT'].' ('.$max_mb.' '.$_LANG['MBITE'].') '.$_LANG['IS_OVER_LIMIT'].'<br>'.$_LANG['FOR_NEW_FILE_DEL_OLD'], 'error'); cmsCore::redirectBack(); }

			// Загружаем файл
			if ($inCore->moveUploadedFile($data_array["tmp_name"], PATH."/upload/userfiles/{$usr['id']}/$name", $data_array['error'])) {

				$loaded_files[] = $name;

				$sql = "INSERT INTO cms_user_files(user_id, filename, pubdate, allow_who, filesize, hits)
						VALUES ({$usr['id']}, '$name', NOW(), 'all', '$size', 0)";
				$inDB->query($sql);
				$file_id = $inDB->get_last_id('cms_user_files');
				cmsActions::log('add_file', array(
					  'object' => $name,
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

            cmsCore::redirect('/users/'.$usr['id'].'/files.html');

		} else {
			cmsCore::addSessionMessage($_LANG['ERR_BIG_FILE'].' '.$_LANG['ERR_FILE_NAME'], 'error');
            cmsCore::redirectBack();
		}

	}

	if(!cmsCore::inRequest('upload')){

		$inPage->setTitle('загрузка файла');
		$inPage->addHeadJS('includes/jquery/multifile/jquery.multifile.js');

		$inPage->addPathway($usr['nickname'], cmsUser::getProfileURL($usr['login']));
		$inPage->addPathway($_LANG['FILES_ARCHIVE'], '/users/'.$usr['id'].'/files.html');
		$inPage->addPathway($_LANG['UPLOAD_FILES']);
        $inPage->addHeadJsLang(array('FILE_SELECTED','FILE_DENIED','FILE_DUPLICATE'));

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

		cmsPage::initTemplate('components', 'com_users_file_add')->
                assign('free_mb', $free_mb)->
                assign('post_max_b', $post_max_b)->
                assign('post_max_mb', (round($post_max_b/1024)/1024) . ' '.$_LANG['MBITE'])->
                assign('cfg', $model->config)->
                assign('types', $model->config['filestype'])->
                display('com_users_file_add.tpl');

	}
	
	
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

<div class="con_heading">Добавление файла</div>
<!-- {if $free_mb > 0 || !$cfg.filessize}
<div>{$LANG.SELECT_FILE_TEXT}</div>
{if $cfg.filessize}
<div style="margin:10px 0px 0px 0px"><strong>{$LANG.YOUR_FILE_LIMIT}:</strong> {$free_mb} {$LANG.MBITE}</div>
{/if} -->
<div style="margin:0px 0px 10px 0px"><strong>{$LANG.MAX_FILE_SIZE}:</strong> {$post_max_mb}</div>
<div style="margin:0px 0px 10px 0px"><strong>{$LANG.TYPE_FILE}:</strong> {$types}</div>
<form action="" method="post" enctype="multipart/form-data" name="uploadform">
  <input name="MAX_FILE_SIZE" type="hidden" value="{$post_max_b}"/>
  <input type="file" name="upfile[]" id="upfile" />
  <div style="margin-top:20px;overflow:hidden">
    <input style="float:left;margin-right:4px" type="button" name="upload_btn" id="upload_btn" value="{$LANG.UPLOAD_FILES}" onclick="startUpload()"/>
    <input style="float:left" type="button" name="cancel_btn" id="cancel_btn" value="{$LANG.CANCEL}" onclick="window.history.go(-1)" />
    <div id="loadergif" style="display:none;float:left;margin:6px"><img src="/images/ajax-loader.gif" border="0"/></div>
  </div>
  <input type="hidden" name="upload" value="1"/>
</form>
{else}
<div style="color:#660000;margin-bottom:10px;font-weight:bold">{$LANG.YOUR_FILE_LIMIT} ({$max_mb} {$LANG.MBITE}) {$LANG.IS_OVER_LIMIT}.</div>
<div style="color:#660000;font-weight:bold">{$LANG.FOR_NEW_FILE_DEL_OLD}</div>
<div style="margin-top:20px">
  <input type="button" name="cancel" value="{$LANG.CANCEL}" onclick="window.history.go(-1)" />
</div>
{/if}
	
	
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