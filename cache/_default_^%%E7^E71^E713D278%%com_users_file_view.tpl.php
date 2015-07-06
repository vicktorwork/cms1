<?php /* Smarty version 2.6.28, created on 2015-02-04 14:16:45
         compiled from com_users_file_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_users_file_view.tpl', 7, false),array('function', 'template', 'com_users_file_view.tpl', 63, false),)), $this); ?>
<?php if ($this->_tpl_vars['myprofile']): ?>
<div class="float_bar">
    <a href="/users/addfile.html" class="add_file_link"><?php echo $this->_tpl_vars['LANG']['UPLOAD_FILE_IN_ARCHIVE']; ?>
</a>
</div>
<?php endif; ?>

<div class="con_heading"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['usr']['login']), $this);?>
"><?php echo $this->_tpl_vars['usr']['nickname']; ?>
</a> &rarr; <?php echo $this->_tpl_vars['LANG']['FILES']; ?>
</div>
<?php if ($this->_tpl_vars['files']): ?>
<div class="usr_files_orderbar">
  <table width="100%" cellspacing="0" cellpadding="2">
    <tr>
      <td width="15">&nbsp;</td>
      <td width="80"><strong><?php echo $this->_tpl_vars['LANG']['FILE_COUNT']; ?>
: </strong><?php echo $this->_tpl_vars['total_files']; ?>
</td>
      <?php if ($this->_tpl_vars['myprofile']): ?>
      		<?php if ($this->_tpl_vars['cfg']['filessize']): ?>
                <td width="130"><strong><?php echo $this->_tpl_vars['LANG']['FREE']; ?>
: </strong><?php echo $this->_tpl_vars['free_mb']; ?>
 <?php echo $this->_tpl_vars['LANG']['MBITE']; ?>
</td>
            <?php else: ?>
            	<td width="130"></td>
          	<?php endif; ?>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['total_files'] > 1): ?>
        <td align="right">
            <form name="orderform" method="post" action="" style="margin:0px">
                <input type="button" class="usr_files_orderbtn" onclick="orderPage('pubdate')" name="order_date" value="<?php echo $this->_tpl_vars['LANG']['ORDER_BY_DATE']; ?>
" <?php if ($this->_tpl_vars['orderby'] == 'pubdate'): ?> disabled <?php endif; ?> />
                <input type="button" class="usr_files_orderbtn" onclick="orderPage('filename')" name="order_title" value="<?php echo $this->_tpl_vars['LANG']['ORDER_BY_NAME']; ?>
" <?php if ($this->_tpl_vars['orderby'] == 'filename'): ?> disabled <?php endif; ?> />
                <input type="button" class="usr_files_orderbtn" onclick="orderPage('filesize')" name="order_size" value="<?php echo $this->_tpl_vars['LANG']['ORDER_BY_SIZE']; ?>
" <?php if ($this->_tpl_vars['orderby'] == 'filesize'): ?> disabled <?php endif; ?> />
                <input type="button" class="usr_files_orderbtn" onclick="orderPage('hits')" name="order_hits" value="<?php echo $this->_tpl_vars['LANG']['ORDER_BY_DOWNLOAD']; ?>
" <?php if ($this->_tpl_vars['orderby'] == 'hits'): ?> disabled <?php endif; ?> />
                <input id="orderby" type="hidden" name="orderby" value="<?php echo $this->_tpl_vars['orderby']; ?>
"/>
            </form>
        </td>
      <?php else: ?>
      <td>&nbsp;</td>
      <?php endif; ?>
      </tr>
  </table>
</div>

<form name="listform" id="listform" action="" method="post">
  <table width="100%" cellspacing="0" cellpadding="5" style="border:solid 1px gray">
    <tr>
      <td class="usr_files_head" width="20" align="center">#</td>
      <td class="usr_files_head" width="" colspan="2"><?php echo $this->_tpl_vars['LANG']['FILE_NAME']; ?>
 <?php if ($this->_tpl_vars['orderby'] == 'filename'): ?> &darr; <?php endif; ?></td>
      <?php if ($this->_tpl_vars['myprofile']): ?>
        <td class="usr_files_head" width="100" align="center"><?php echo $this->_tpl_vars['LANG']['VISIBILITY']; ?>
</td>
      <?php endif; ?>
      <td class="usr_files_head" width="100"><?php echo $this->_tpl_vars['LANG']['SIZE']; ?>
 <?php if ($this->_tpl_vars['orderby'] == 'filesize'): ?>&darr;<?php endif; ?></td>
      <td class="usr_files_head" width="120"><?php echo $this->_tpl_vars['LANG']['CREATE_DATE']; ?>
 <?php if ($this->_tpl_vars['orderby'] == 'pubdate'): ?>&darr;<?php endif; ?></td>
      <td class="usr_files_head" width="80" align="center"><?php echo $this->_tpl_vars['LANG']['DOWNLOAD_HITS']; ?>
 <?php if ($this->_tpl_vars['orderby'] == 'hits'): ?>&darr;<?php endif; ?></td>
      </tr>

    <?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['file']):
?>
        <tr>
        <?php if ($this->_tpl_vars['myprofile'] || $this->_tpl_vars['is_admin']): ?>
          <td align="center" valign="top"><input id="fileid<?php echo $this->_tpl_vars['file']['rownum']; ?>
" type="checkbox" name="files[]" value="<?php echo $this->_tpl_vars['file']['id']; ?>
"/></td>
        <?php else: ?>
          <td align="center" valign="top"><?php echo $this->_tpl_vars['file']['rownum']; ?>
</td>
        <?php endif; ?>
          <td width="16" valign="top"><?php echo $this->_tpl_vars['file']['fileicon']; ?>
</td>
          <td valign="top"><a href="<?php echo $this->_tpl_vars['file']['filelink']; ?>
"><?php echo $this->_tpl_vars['file']['filename']; ?>
</a>
            <div class="usr_files_link"><?php echo $this->_tpl_vars['file']['filelink']; ?>
</div></td>
          <?php if ($this->_tpl_vars['myprofile']): ?>
          	<?php if ($this->_tpl_vars['file']['allow_who'] == 'all'): ?>
          <td align="center"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/users/yes.gif" border="0" title="<?php echo $this->_tpl_vars['LANG']['FILE_VIS_ALL']; ?>
"/></td>
          	<?php else: ?>
          <td align="center"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/users/no.gif" border="0" title="<?php echo $this->_tpl_vars['LANG']['FILE_HIDEN']; ?>
"/></td>
            <?php endif; ?>
          <?php endif; ?>
          <td><?php echo $this->_tpl_vars['file']['mb']; ?>
 <?php echo $this->_tpl_vars['LANG']['MBITE']; ?>
</td>
          <td><?php echo $this->_tpl_vars['file']['pubdate']; ?>
</td>
          <td align="center"><?php echo $this->_tpl_vars['file']['hits']; ?>
</td>
          </tr>
    <?php endforeach; endif; unset($_from); ?>
  </table>

  <?php if ($this->_tpl_vars['myprofile'] || $this->_tpl_vars['is_admin']): ?>
    <div style="margin-top:6px; float:right;">
      <input type="button" class="usr_files_orderbtn" name="delete_btn" id="delete_btn" onclick="delFiles('<?php echo $this->_tpl_vars['LANG']['YOU_REALLY_DEL_FILES']; ?>
?')" value="<?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
"/>
      <input type="button" class="usr_files_orderbtn" name="hide_btn" id="delete_btn" onclick="pubFiles(0)" value="<?php echo $this->_tpl_vars['LANG']['HIDE']; ?>
"/>
      <input type="button" class="usr_files_orderbtn" name="show_btn" id="delete_btn" onclick="pubFiles(1)" value="<?php echo $this->_tpl_vars['LANG']['SHOW']; ?>
"/>
    </div>
  <?php endif; ?>
  <?php echo $this->_tpl_vars['pagination']; ?>

</form>
<?php else: ?>
	<p><?php echo $this->_tpl_vars['LANG']['USER_NO_UPLOAD']; ?>
</p>
<?php endif; ?>