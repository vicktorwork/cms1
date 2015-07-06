<?php /* Smarty version 2.6.28, created on 2015-02-04 14:16:49
         compiled from com_users_file_add.tpl */ ?>
<?php echo '
<script type="text/javascript">
    function startUpload(){
          $("#upload_btn").prop(\'disabled\', true);
          $("#upload_btn").val(LANG_LOADING+\'...\');
          $("#cancel_btn").css(\'display\', \'none\');
          $("#loadergif").css(\'display\', \'block\');
          document.uploadform.submit();
    }
    $(function(){ $(\'#upfile\').MultiFile({ accept:\''; ?>
<?php echo $this->_tpl_vars['types']; ?>
<?php echo '\', max:3, STRING: { remove:LANG_CANCEL, selected:LANG_FILE_SELECTED, denied:LANG_FILE_DENIED, duplicate:LANG_FILE_DUPLICATE } }); });
</script>
'; ?>

<div class="con_heading"><?php echo $this->_tpl_vars['LANG']['UPLOAD_FILES']; ?>
</div>
<?php if ($this->_tpl_vars['free_mb'] > 0 || ! $this->_tpl_vars['cfg']['filessize']): ?>
<div><?php echo $this->_tpl_vars['LANG']['SELECT_FILE_TEXT']; ?>
</div>
<?php if ($this->_tpl_vars['cfg']['filessize']): ?>
<div style="margin:10px 0px 0px 0px"><strong><?php echo $this->_tpl_vars['LANG']['YOUR_FILE_LIMIT']; ?>
:</strong> <?php echo $this->_tpl_vars['free_mb']; ?>
 <?php echo $this->_tpl_vars['LANG']['MBITE']; ?>
</div>
<?php endif; ?>
<div style="margin:0px 0px 10px 0px"><strong><?php echo $this->_tpl_vars['LANG']['MAX_FILE_SIZE']; ?>
:</strong> <?php echo $this->_tpl_vars['post_max_mb']; ?>
</div>
<div style="margin:0px 0px 10px 0px"><strong><?php echo $this->_tpl_vars['LANG']['TYPE_FILE']; ?>
:</strong> <?php echo $this->_tpl_vars['types']; ?>
</div>
<form action="" method="post" enctype="multipart/form-data" name="uploadform">
  <input name="MAX_FILE_SIZE" type="hidden" value="<?php echo $this->_tpl_vars['post_max_b']; ?>
"/>
  <input type="file" name="upfile[]" id="upfile" />
  <div style="margin-top:20px;overflow:hidden">
    <input style="float:left;margin-right:4px" type="button" name="upload_btn" id="upload_btn" value="<?php echo $this->_tpl_vars['LANG']['UPLOAD_FILES']; ?>
" onclick="startUpload()"/>
    <input style="float:left" type="button" name="cancel_btn" id="cancel_btn" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="window.history.go(-1)" />
    <div id="loadergif" style="display:none;float:left;margin:6px"><img src="/images/ajax-loader.gif" border="0"/></div>
  </div>
  <input type="hidden" name="upload" value="1"/>
</form>
<?php else: ?>
<div style="color:#660000;margin-bottom:10px;font-weight:bold"><?php echo $this->_tpl_vars['LANG']['YOUR_FILE_LIMIT']; ?>
 (<?php echo $this->_tpl_vars['max_mb']; ?>
 <?php echo $this->_tpl_vars['LANG']['MBITE']; ?>
) <?php echo $this->_tpl_vars['LANG']['IS_OVER_LIMIT']; ?>
.</div>
<div style="color:#660000;font-weight:bold"><?php echo $this->_tpl_vars['LANG']['FOR_NEW_FILE_DEL_OLD']; ?>
</div>
<div style="margin-top:20px">
  <input type="button" name="cancel" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
" onclick="window.history.go(-1)" />
</div>
<?php endif; ?>