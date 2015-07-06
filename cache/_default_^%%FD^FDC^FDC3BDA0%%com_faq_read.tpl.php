<?php /* Smarty version 2.6.28, created on 2015-03-13 20:15:53
         compiled from com_faq_read.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'template', 'com_faq_read.tpl', 5, false),array('function', 'profile_url', 'com_faq_read.tpl', 9, false),array('function', 'comments', 'com_faq_read.tpl', 31, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['LANG']['QUESTION_VIEW']; ?>
 <?php if ($this->_tpl_vars['is_admin']): ?><a href="/faq/delquest<?php echo $this->_tpl_vars['quest']['id']; ?>
.html">X</a><?php endif; ?></div>

<table cellspacing="5" cellpadding="0" border="0" width="100%">
	<tr>
		<td width="35" valign="top"><img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/big/faq_quest.png" border="0" /></td>
		<td width="" valign="top">
			<div class="faq_questtext"><?php echo $this->_tpl_vars['quest']['quest']; ?>
</div>
			<?php if ($this->_tpl_vars['cfg']['user_link']): ?>
            <div class="faq_questuser"><?php if ($this->_tpl_vars['quest']['nickname']): ?><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['quest']['login']), $this);?>
"><?php echo $this->_tpl_vars['quest']['nickname']; ?>
</a><?php else: ?><?php echo $this->_tpl_vars['LANG']['QUESTION_GUEST']; ?>
<?php endif; ?></div>
			<?php endif; ?>
			<div class="faq_questdate"><?php echo $this->_tpl_vars['quest']['pubdate']; ?>
</div>
		</td>
	</tr>
</table>

<?php if ($this->_tpl_vars['quest']['answer']): ?>
<table cellspacing="5" cellpadding="0" border="0" width="100%" style="margin:15px 0px;">
	<tr>
		<td width="35" valign="top">
			<img src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/big/faq_answer.png" border="0" />
		</td>
		<td width="" valign="top">
			<div class="faq_answertext"><?php echo $this->_tpl_vars['quest']['answer']; ?>
</div>
			<div class="faq_questdate"><?php echo $this->_tpl_vars['quest']['answerdate']; ?>
</div>
		</td>
	</tr>
</table>
<?php endif; ?>

<?php if ($this->_tpl_vars['cfg']['is_comment']): ?>
<?php echo cmsSmartyComments(array('target' => 'faq','target_id' => $this->_tpl_vars['quest']['id'],'labels' => $this->_tpl_vars['labels']), $this);?>

<?php endif; ?>