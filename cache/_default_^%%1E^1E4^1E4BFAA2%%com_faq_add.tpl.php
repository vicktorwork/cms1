<?php /* Smarty version 2.6.28, created on 2015-03-13 20:15:54
         compiled from com_faq_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'captcha', 'com_faq_add.tpl', 25, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['LANG']['SET_QUESTION']; ?>
</div>

<div style="margin-top:10px"><?php echo $this->_tpl_vars['LANG']['SET_QUESTION_TEXT']; ?>
</div>
<div style="margin-bottom:10px"><?php echo $this->_tpl_vars['LANG']['CONTACTS_TEXT']; ?>
</div>

<?php if ($this->_tpl_vars['error']): ?><p style="color:red"><?php echo $this->_tpl_vars['error']; ?>
</p><?php endif; ?>

<form action="" method="POST" name="questform">
	<table cellpadding="0" cellspacing="0" class="faq_add_cat">
		<tr>
			<td width="150">
				<strong><?php echo $this->_tpl_vars['LANG']['CAT_QUESTIONS']; ?>
: </strong>
			</td>
			<td>
				<select name="category_id" style="width:300px">
					<?php echo $this->_tpl_vars['catslist']; ?>

				</select>
			</td>
		</tr>
	</table>

	<textarea name="message" id="faq_message" style=""><?php echo $this->_tpl_vars['message']; ?>
</textarea>

    <?php if (! $this->_tpl_vars['user_id']): ?>
        <p style="margin-bottom:10px"><?php echo smarty_function_captcha(array(), $this);?>
</p>
    <?php endif; ?>

	<div>
		<input type="button" style="font-size:16px;margin-right:2px;margin-top:3px;" onclick="sendQuestion()" name="gosend" value="<?php echo $this->_tpl_vars['LANG']['SEND']; ?>
"/>
		<input type="button" style="font-size:16px;margin-top:3px;" name="cancel" onclick="window.history.go(-1)" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
"/>
	</div>
</form>