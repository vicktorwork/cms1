<?php /* Smarty version 2.6.28, created on 2015-02-11 20:22:45
         compiled from com_comments_list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'com_comments_list.tpl', 3, false),array('function', 'profile_url', 'com_comments_list.tpl', 16, false),array('function', 'template', 'com_comments_list.tpl', 34, false),array('function', 'csrf_token', 'com_comments_list.tpl', 69, false),array('modifier', 'rating', 'com_comments_list.tpl', 33, false),array('modifier', 'escape', 'com_comments_list.tpl', 63, false),)), $this); ?>
<?php if ($this->_tpl_vars['comments_count']): ?> 
	<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cid'] => $this->_tpl_vars['comment']):
?>
        <?php echo smarty_function_math(array('equation' => "x+1",'x' => $this->_tpl_vars['cid'],'assign' => 'next'), $this);?>

		<a name="c<?php echo $this->_tpl_vars['comment']['id']; ?>
"></a>
        <?php if ($this->_tpl_vars['comment']['level'] < $this->_tpl_vars['cfg']['max_level']-1): ?>
            <div style="margin-left:<?php echo smarty_function_math(array('equation' => "x*35",'x' => $this->_tpl_vars['comment']['level']), $this);?>
px;">
        <?php else: ?>
            <div style="margin-left:<?php echo smarty_function_math(array('equation' => "(x-1)*35",'x' => $this->_tpl_vars['cfg']['max_level']), $this);?>
px;">
        <?php endif; ?>
        <table class="cmm_entry">
			<tr>
				<td class="cmm_title" valign="middle">
					<?php if (! $this->_tpl_vars['comment']['is_profile']): ?>
						<span class="cmm_author"><?php echo $this->_tpl_vars['comment']['author']; ?>
 <?php if ($this->_tpl_vars['is_admin'] && $this->_tpl_vars['comment']['ip']): ?>(<?php echo $this->_tpl_vars['comment']['ip']; ?>
)<?php endif; ?></span>
					<?php else: ?>
						<span class="cmm_author"><a href="<?php echo cmsSmartyProfileURL(array('login' => $this->_tpl_vars['comment']['author']['login']), $this);?>
"><?php echo $this->_tpl_vars['comment']['author']['nickname']; ?>
</a> <?php if ($this->_tpl_vars['is_admin'] && $this->_tpl_vars['comment']['ip']): ?>(<?php echo $this->_tpl_vars['comment']['ip']; ?>
)<?php endif; ?></span>
					<?php endif; ?>
                    <a class="cmm_anchor" href="#c<?php echo $this->_tpl_vars['comment']['id']; ?>
" title="<?php echo $this->_tpl_vars['LANG']['LINK_TO_COMMENT']; ?>
">#</a>
                    <span class="cmm_date"><?php if ($this->_tpl_vars['comment']['published']): ?><?php echo $this->_tpl_vars['comment']['fpubdate']; ?>
<?php else: ?><span style="color:#F00"><?php echo $this->_tpl_vars['LANG']['WAIT_MODERING']; ?>
</span><?php endif; ?></span>
                    <?php if (! $this->_tpl_vars['is_user'] || $this->_tpl_vars['comment']['is_voted'] || ! $this->_tpl_vars['comment']['is_profile']): ?>
                        <span class="cmm_votes">
                        <?php if ($this->_tpl_vars['comment']['rating'] > 0): ?>
                            <span class="cmm_good">+<?php echo $this->_tpl_vars['comment']['rating']; ?>
</span>
                        <?php elseif ($this->_tpl_vars['comment']['rating'] < 0): ?>
                            <span class="cmm_bad"><?php echo $this->_tpl_vars['comment']['rating']; ?>
</span>
                        <?php else: ?>
                            <?php echo $this->_tpl_vars['comment']['rating']; ?>

                        <?php endif; ?>
                        </span>
                    <?php else: ?>
                        <span class="cmm_votes" id="votes<?php echo $this->_tpl_vars['comment']['id']; ?>
">
                            <table border="0" cellpadding="0" cellspacing="0"><tr>
                            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['rating'])) ? $this->_run_mod_handler('rating', true, $_tmp) : smarty_modifier_rating($_tmp)); ?>
</td>
                            <td><a href="javascript:void(0);" onclick="voteComment(<?php echo $this->_tpl_vars['comment']['id']; ?>
, -1);" title="<?php echo $this->_tpl_vars['LANG']['BAD_COMMENT']; ?>
"><img border="0" alt="-" src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/comments/vote_down.gif" style="margin-left:8px"/></a></td>
                            <td><a href="javascript:void(0);" onclick="voteComment(<?php echo $this->_tpl_vars['comment']['id']; ?>
, 1);" title="<?php echo $this->_tpl_vars['LANG']['GOOD_COMMENT']; ?>
"><img border="0" alt="+" src="/templates/<?php echo cmsSmartyCurrentTemplate(array(), $this);?>
/images/icons/comments/vote_up.gif" style="margin-left:2px"/></a></td>
                            </tr></table>
                        </span>
                    <?php endif; ?>
				</td>
			</tr>
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
					<td class="cmm_content" valign="top">
				<?php endif; ?>
                	<div id="cm_msg_<?php echo $this->_tpl_vars['comment']['id']; ?>
">
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
                    </div>

                    <div style="margin-top:15px;">
                        <span id="cm_add_link<?php echo $this->_tpl_vars['comment']['id']; ?>
" class="cm_add_link"><a href="javascript:void(0)" onclick="addComment('<?php echo ((is_array($_tmp=$this->_tpl_vars['target'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
', '<?php echo $this->_tpl_vars['target_id']; ?>
', <?php echo $this->_tpl_vars['comment']['id']; ?>
)" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['REPLY']; ?>
</a></span>
                        <?php if ($this->_tpl_vars['is_user']): ?>
                            <?php if ($this->_tpl_vars['is_admin'] || ( $this->_tpl_vars['comment']['is_my'] && $this->_tpl_vars['comment']['is_editable'] && $this->_tpl_vars['comment']['content_bbcode'] ) || ( $this->_tpl_vars['user_can_moderate'] && $this->_tpl_vars['comment']['content_bbcode'] )): ?>
                                <?php if (! $this->_tpl_vars['comment']['content_bbcode']): ?>
                                    <span class="left_border"><a href="/admin/index.php?view=components&do=config&link=comments&opt=edit&item_id=<?php echo $this->_tpl_vars['comment']['id']; ?>
"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a></span>
                                <?php else: ?>
                                   <span class="left_border"><a href="javascript:" onclick="editComment('<?php echo $this->_tpl_vars['comment']['id']; ?>
', '<?php echo smarty_function_csrf_token(array(), $this);?>
')" class="ajaxlink"><?php echo $this->_tpl_vars['LANG']['EDIT']; ?>
</a></span>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if ($this->_tpl_vars['is_admin'] || ( $this->_tpl_vars['comment']['is_my'] && $this->_tpl_vars['user_can_delete'] ) || $this->_tpl_vars['user_can_moderate']): ?>
                                <span class="left_border"><a href="javascript:" onclick="deleteComment(<?php echo $this->_tpl_vars['comment']['id']; ?>
, '<?php echo smarty_function_csrf_token(array(), $this);?>
'<?php if ($this->_tpl_vars['comments'][$this->_tpl_vars['next']]['level'] > $this->_tpl_vars['comment']['level']): ?>, 1<?php endif; ?>);return false;" class="ajaxlink"><?php if ($this->_tpl_vars['comments'][$this->_tpl_vars['next']]['level'] > $this->_tpl_vars['comment']['level']): ?><?php echo $this->_tpl_vars['LANG']['DELETE_BRANCH']; ?>
<?php else: ?><?php echo $this->_tpl_vars['LANG']['DELETE']; ?>
<?php endif; ?></a></span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>

                    <?php if ($this->_tpl_vars['comment']['is_profile']): ?>
                        </td></tr></table>
                    <?php endif; ?>
					</td>
				</tr>
			</table>
            <div id="cm_addentry<?php echo $this->_tpl_vars['comment']['id']; ?>
" class="reply" style="display:none"></div>
        </div>
	<?php endforeach; endif; unset($_from); ?>

<?php else: ?>
	<p><?php echo $this->_tpl_vars['labels']['not_comments']; ?>
</p>
<?php endif; ?>