<?php /* Smarty version 2.6.28, created on 2015-02-11 20:32:00
         compiled from com_comments_add.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_comments_add.tpl', 7, false),array('function', 'captcha', 'com_comments_add.tpl', 23, false),array('modifier', 'escape', 'com_comments_add.tpl', 19, false),)), $this); ?>
<div class="cm_addentry">
<?php if ($this->_tpl_vars['user_can_add']): ?>
    <?php if ($this->_tpl_vars['can_by_karma'] || ! $this->_tpl_vars['cfg']['min_karma']): ?>
	<form action="/comments/<?php echo $this->_tpl_vars['do']; ?>
" id="msgform" method="POST">
        <input type="hidden" name="parent_id" value="<?php echo $this->_tpl_vars['parent_id']; ?>
" />
        <input type="hidden" name="comment_id" value="<?php echo $this->_tpl_vars['comment']['id']; ?>
" />
        <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
        <input type="hidden" name="target" value="<?php echo $this->_tpl_vars['target']; ?>
"/>
        <input type="hidden" name="target_id" value="<?php echo $this->_tpl_vars['target_id']; ?>
"/>
        <?php if (! $this->_tpl_vars['is_user']): ?>
            <div class="cm_guest_name"><label><?php echo $this->_tpl_vars['LANG']['YOUR_NAME']; ?>
: <input type="text" maxchars="20" size="30" name="guestname" class="text-input" value="" id="guestname" /></label></div>
            <script type="text/javascript"><?php echo '$(document).ready(function(){ $(\'#guestname\').focus(); });'; ?>
</script>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_can_bbcode']): ?>
            <div class="usr_msg_bbcodebox"><?php echo $this->_tpl_vars['bb_toolbar']; ?>
</div>
            <div class="cm_smiles"><?php echo $this->_tpl_vars['smilies']; ?>
</div>
        <?php endif; ?>
        <div class="cm_editor">
            <textarea id="content" name="content" class="ajax_autogrowarea" style="height:150px;min-height: 150px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['comment']['content_bbcode'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</textarea>
        </div>
        <?php if ($this->_tpl_vars['do'] == 'add'): ?>
            <?php if ($this->_tpl_vars['need_captcha']): ?>
                <div class="cm_codebar"><?php echo smarty_function_captcha(array(), $this);?>
</div>
            <?php endif; ?>
            <div class="submit_cmm">
                <input id="submit_cmm" type="button" value="<?php echo $this->_tpl_vars['LANG']['SEND']; ?>
"/>
                <input id="cancel_cmm"type="button" onclick="$('.cm_addentry').remove();$('.cm_add_link').show();" value="<?php echo $this->_tpl_vars['LANG']['CANCEL']; ?>
"/>
            </div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['is_user'] && $this->_tpl_vars['do'] == 'add'): ?>
            <?php if (! $this->_tpl_vars['user_subscribed']): ?>
                <div style="margin:9px 0; float:right; font-size:12px; vertical-align:middle">
                    <label style="padding:5px"><input name="subscribe" type="checkbox" value="1" style="margin:0; vertical-align:middle" /> <?php echo $this->_tpl_vars['LANG']['NOTIFY_NEW_COMM']; ?>
</label>
                </div>
            <?php endif; ?>
        <?php endif; ?>
	</form>
    <div class="sess_messages" <?php if (! $this->_tpl_vars['notice']): ?>style="display:none"<?php endif; ?>>
      <div class="message_info" id="error_mess"><?php echo $this->_tpl_vars['notice']; ?>
</div>
    </div>
    <?php else: ?>
        <?php if ($this->_tpl_vars['is_user']): ?>
            <p><?php echo $this->_tpl_vars['LANG']['YOU_NEED']; ?>
 <a href="/users/<?php echo $this->_tpl_vars['is_user']; ?>
/karma.html"><?php echo $this->_tpl_vars['LANG']['KARMS']; ?>
</a> <?php echo $this->_tpl_vars['LANG']['TO_ADD_COMM']; ?>
.<br> <?php echo $this->_tpl_vars['LANG']['NEED']; ?>
 &mdash; <?php echo $this->_tpl_vars['karma_need']; ?>
, <?php echo $this->_tpl_vars['LANG']['HAS']; ?>
 &mdash; <?php echo $this->_tpl_vars['karma_has']; ?>
.</p>
        <?php else: ?>
            <p><?php echo $this->_tpl_vars['LANG']['COMMENTS_CAN_ADD_ONLY']; ?>
 <a href="/registration" /><?php echo $this->_tpl_vars['LANG']['REGISTERED']; ?>
</a> <?php echo $this->_tpl_vars['LANG']['USERS']; ?>
.</p>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
    <p><?php echo $this->_tpl_vars['LANG']['YOU_HAVENT_ACCESS_TEXT']; ?>
</p>
<?php endif; ?>
</div>