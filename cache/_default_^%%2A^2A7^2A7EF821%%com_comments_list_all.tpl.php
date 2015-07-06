<?php /* Smarty version 2.6.28, created on 2015-01-19 01:38:49
         compiled from com_comments_list_all.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'profile_url', 'com_comments_list_all.tpl', 4, false),array('modifier', 'rating', 'com_comments_list_all.tpl', 28, false),)), $this); ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['page_title']; ?>
 (<?php echo $this->_tpl_vars['comments_count']; ?>
)</h1>
<?php if ($this->_tpl_vars['comments_count']): ?>
	<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cid'] => $this->_tpl_vars['comment']):
?>
    	<h3 class="cmm_all_title"><span class="cmm_all_author"><?php if (! $this->_tpl_vars['comment']['is_profile']): ?><?php echo $this->_tpl_vars['comment']['author']; ?>
<?php else: ?><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['comment']['author']['login']), $this);?>
"><?php echo $this->_tpl_vars['comment']['author']['nickname']; ?>
</a><?php endif; ?> <?php if ($this->_tpl_vars['is_admin']): ?><?php echo $this->_tpl_vars['comment']['ip']; ?>
<?php endif; ?></span> <span class="cmm_all_gender"> <?php echo $this->_tpl_vars['comment']['gender']; ?>
</span>  &rarr; <a class="cmm_all_target" href="<?php echo $this->_tpl_vars['comment']['target_link']; ?>
#c<?php echo $this->_tpl_vars['comment']['id']; ?>
" title="<?php echo $this->_tpl_vars['LANG']['LINK_TO_COMMENT']; ?>
"><?php echo $this->_tpl_vars['comment']['target_title']; ?>
</a> <span class="cmm_date"><?php if ($this->_tpl_vars['comment']['published']): ?><?php echo $this->_tpl_vars['comment']['fpubdate']; ?>
<?php else: ?><span style="color:#F00"><?php echo $this->_tpl_vars['LANG']['WAIT_MODERING']; ?>
</span><?php endif; ?></span></h3>
        <table class="cmm_entry">
			<tr>
				<?php if ($this->_tpl_vars['comment']['is_profile']): ?>
					<td valign="top">
						<table width="100%" cellpadding="1" cellspacing="0">
							<tr>
								<td width="70" height="70"  align="center" valign="top" class="cmm_avatar">
									<a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['comment']['author']['login']), $this);?>
"><img border="0" class="usr_img_small" src="<?php echo $this->_tpl_vars['comment']['user_image']; ?>
" /></a>
								</td>
								<td class="cmm_content_av" valign="top">
				<?php else: ?>
					<td class="cmm_all_content" valign="top">
				<?php endif; ?>
					<?php if ($this->_tpl_vars['comment']['show']): ?>
						<?php echo $this->_tpl_vars['comment']['content']; ?>

					<?php else: ?>
						<a href="javascript:void(0)" onclick="expandComment(<?php echo $this->_tpl_vars['comment']['id']; ?>
)" id="expandlink<?php echo $this->_tpl_vars['comment']['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['SHOW_COMMENT']; ?>
</a>
						<div id="expandblock<?php echo $this->_tpl_vars['comment']['id']; ?>
" style="display:none"><?php echo $this->_tpl_vars['comment']['content']; ?>
</div>
					<?php endif; ?>
						<?php if ($this->_tpl_vars['comment']['is_profile']): ?>
							</td></tr></table>
						<?php endif; ?>
					</td>
                    <td align="right" valign="middle"><span class="cmm_all_votes" style="font-size:18px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['rating'])) ? $this->_run_mod_handler('rating', true, $_tmp) : smarty_modifier_rating($_tmp)); ?>
</span></td>
				</tr>
			</table>
	<?php endforeach; endif; unset($_from); ?>
<?php echo $this->_tpl_vars['pagebar']; ?>

<?php else: ?>
	<p><?php echo $this->_tpl_vars['LANG']['NOT_COMMENT_TEXT']; ?>
</p>
<?php endif; ?>