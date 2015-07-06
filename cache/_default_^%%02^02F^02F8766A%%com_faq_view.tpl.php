<?php /* Smarty version 2.6.28, created on 2015-03-13 20:14:54
         compiled from com_faq_view.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'template', 'com_faq_view.tpl', 18, false),array('function', 'profile_url', 'com_faq_view.tpl', 47, false),)), $this); ?>
<?php if ($this->_tpl_vars['is_user'] || $this->_tpl_vars['cfg']['guest_enabled']): ?>
<div class="faq_send_quest">
    <a href="/faq/sendquest<?php if ($this->_tpl_vars['id'] > 0): ?><?php echo $this->_tpl_vars['id']; ?>
<?php endif; ?>.html"><?php echo $this->_tpl_vars['LANG']['SET_QUESTION']; ?>
</a>
</div>
<?php endif; ?>

<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<?php if ($this->_tpl_vars['is_subcats']): ?>
	<?php if ($this->_tpl_vars['id'] > 0): ?>
		<div class="faq_subcats">
	<?php else: ?>
		<div class="faq_cats">
	<?php endif; ?>
		<table width="100%">
			<?php $_from = $this->_tpl_vars['subcats']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['subcat']):
?>
				<tr>
					<td width="40" valign="top"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/big/folder.png" border="0" /></td>
					<td valign="top">
						<div class="faq_cat_link"><a href="/faq/<?php echo $this->_tpl_vars['subcat']['id']; ?>
"><?php echo $this->_tpl_vars['subcat']['title']; ?>
</a></div>
						<?php if ($this->_tpl_vars['subcat']['description']): ?>
							<div class="faq_cat_desc"><?php echo $this->_tpl_vars['subcat']['description']; ?>
</div>
						<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['is_quests']): ?>
    <?php if ($this->_tpl_vars['id'] == 0): ?>
        <h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['LAST_QUESTIONS']; ?>
</h1>
    <?php endif; ?>
	<?php $_from = $this->_tpl_vars['quests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['quest']):
?>
		<div class="faq_quest">
			<table cellspacing="5" cellpadding="0" border="0" width="100%">
				<tr>
					<td width="30" valign="top"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/big/faq_quest.png" border="0" /></td>
					<td width="" valign="middle">
						<div class="faq_quest_link"><a href="/faq/quest<?php echo $this->_tpl_vars['quest']['id']; ?>
.html"><?php echo $this->_tpl_vars['quest']['quest']; ?>
</a></div>
                        <?php if ($this->_tpl_vars['id'] == 0): ?>
                        <div class="faq_questcat">&rarr;  <a href="/faq/<?php echo $this->_tpl_vars['quest']['cid']; ?>
"><?php echo $this->_tpl_vars['quest']['cat_title']; ?>
</a></div>
                        <?php endif; ?>
						<div class="faq_questdate"><?php echo $this->_tpl_vars['quest']['pubdate']; ?>
</div>
                        <?php if ($this->_tpl_vars['cfg']['user_link']): ?>
                        <div class="faq_questuser"><?php if ($this->_tpl_vars['quest']['nickname']): ?><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['quest']['login']), $this);?>
"><?php echo $this->_tpl_vars['quest']['nickname']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['LANG']['QUESTION_GUEST']; ?>
<?php endif; ?></div>
                        <?php endif; ?>

					</td>
				</tr>
			</table>
		</div>
	<?php endforeach; endif; unset($_from); ?>
	<?php if ($this->_tpl_vars['id'] > 0): ?> <?php echo $this->_tpl_vars['pagebar']; ?>
 <?php endif; ?>
<?php endif; ?>