<?php /* Smarty version 2.6.28, created on 2015-04-27 20:02:27
         compiled from com_photos_add1.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'com_photos_add1.tpl', 26, false),)), $this); ?>
<?php echo '
<script type="text/javascript">
    function mod_text(){
        if ($(\'#only_mod\').prop(\'checked\')){'; ?>

			$('#text_mes').html('<strong><?php echo $this->_tpl_vars['LANG']['STEP_1']; ?>
</strong>: <?php echo $this->_tpl_vars['LANG']['PHOTO_DESCS']; ?>
.');
			$('#text_title').html('<?php echo $this->_tpl_vars['LANG']['PHOTO_TITLES']; ?>
:');
			$('#text_desc').html('<?php echo $this->_tpl_vars['LANG']['PHOTO_DESCS']; ?>
:');<?php echo '
        } else {'; ?>

			$('#text_mes').html('<strong><?php echo $this->_tpl_vars['LANG']['STEP_1']; ?>
</strong>: <?php echo $this->_tpl_vars['LANG']['PHOTO_DESC']; ?>
.');
			$('#text_title').html('<?php echo $this->_tpl_vars['LANG']['PHOTO_TITLE']; ?>
:');
			$('#text_desc').html('<?php echo $this->_tpl_vars['LANG']['PHOTO_DESC']; ?>
:');<?php echo '
        }
    }
</script>
'; ?>


<h3 style="border-bottom: solid 1px gray" id="text_mes">
	<strong><?php echo $this->_tpl_vars['LANG']['STEP_1']; ?>
</strong>: <?php echo $this->_tpl_vars['LANG']['PHOTO_DESC']; ?>
.
</h3>
<div class="usr_photos_notice"><?php echo $this->_tpl_vars['LANG']['PHOTO_PLEASE_NOTE']; ?>
</div>
<form action="" method="POST">
	<table width="100%" cellpadding="4">
		<tr>
			<td width="260" id="text_title"><strong><?php echo $this->_tpl_vars['LANG']['PHOTO_TITLE']; ?>
:</strong></td>
			<td>
				<input name="title" type="text" id="title" class="text-input" style="width:350px;" maxlength="250" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
			</td>
		</tr>
		<tr>
			<td valign="top" id="text_desc"><strong><?php echo $this->_tpl_vars['LANG']['PHOTO_DESC']; ?>
:</strong></td>
			<td valign="top">
				<textarea name="description" style="width:350px;" rows="5" class="text-input"><?php echo $this->_tpl_vars['mod']['description']; ?>
</textarea>
			</td>
		</tr>
        <?php if (! $this->_tpl_vars['no_tags']): ?>
		<tr>
			<td><strong><?php echo $this->_tpl_vars['LANG']['TAGS']; ?>
:</strong></td>
			<td>
				<input name="tags" type="text" id="tags" class="text-input" style="width:350px;" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['tags'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
"/>
				<div><small><?php echo $this->_tpl_vars['LANG']['KEYWORDS']; ?>
</small></div>
				<script type="text/javascript">
					<?php echo $this->_tpl_vars['autocomplete_js']; ?>

				</script>
			</td>
		</tr>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_admin']): ?>
          <tr>
            <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['COMMENT_PHOTO']; ?>
:</strong></td>
            <td><select name="comments" style="width:60px">
                    <option value="0"><?php echo $this->_tpl_vars['LANG']['NO']; ?>
</option>
                    <option value="1" selected="selected"><?php echo $this->_tpl_vars['LANG']['YES']; ?>
</option>
                </select>
            </td>
          </tr>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['cfg']['seo_user_access'] || $this->_tpl_vars['is_admin']): ?>
            <tr>
                <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SEO_PAGETITLE']; ?>
</strong><div class="hint"><?php echo $this->_tpl_vars['LANG']['SEO_PAGETITLE_HINT']; ?>
</div></td>
                <td>
                    <input name="pagetitle" style="width:350px" class="text-input" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['pagetitle'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                </td>
            </tr>
            <tr>
                <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SEO_METAKEYS']; ?>
</strong></td>
                <td>
                    <input name="meta_keys" style="width:350px" class="text-input" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['meta_keys'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                </td>
            </tr>
            <tr>
                <td valign="top"><strong><?php echo $this->_tpl_vars['LANG']['SEO_METADESCR']; ?>
</strong><div class="hint"><?php echo $this->_tpl_vars['LANG']['SEO_METADESCR_HINT']; ?>
</div></td>
                <td>
                    <textarea name="meta_desc" rows="3" style="width:350px" class="text-input"><?php echo ((is_array($_tmp=$this->_tpl_vars['mod']['meta_desc'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
                </td>
            </tr>
         <?php endif; ?>
		<tr>
			<td colspan="2" valign="top">
		    <input type="submit" name="submit" id="text_subm" value="<?php echo $this->_tpl_vars['LANG']['GO_TO_UPLOAD']; ?>
" /> <input id="only_mod" name="only_mod" type="checkbox" value="1" onclick="mod_text()" />  <label for="only_mod"><?php echo $this->_tpl_vars['LANG']['ADD_MULTY']; ?>
</label></td>
		</tr>
	</table>
</form>