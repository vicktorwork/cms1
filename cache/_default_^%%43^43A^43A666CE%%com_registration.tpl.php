<?php /* Smarty version 2.6.28, created on 2015-03-13 20:15:46
         compiled from com_registration.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'add_js', 'com_registration.tpl', 25, false),array('function', 'csrf_token', 'com_registration.tpl', 28, false),array('function', 'city_input', 'com_registration.tpl', 116, false),array('function', 'dateform', 'com_registration.tpl', 134, false),array('function', 'captcha', 'com_registration.tpl', 142, false),array('modifier', 'escape', 'com_registration.tpl', 36, false),)), $this); ?>
<div class="con_heading"><?php echo $this->_tpl_vars['pagetitle']; ?>
</div>

<?php if ($this->_tpl_vars['cfg']['is_on']): ?>

    <?php if ($this->_tpl_vars['cfg']['reg_type'] == 'invite' && ! $this->_tpl_vars['correct_invite']): ?>

        <p style="margin-bottom:15px; font-size: 14px"><?php echo $this->_tpl_vars['LANG']['INVITES_ONLY']; ?>
</p>

        <form id="regform" name="regform" method="post" action="/registration">
        <table cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td><strong><?php echo $this->_tpl_vars['LANG']['INVITE_CODE']; ?>
:</strong></td>
                <td style="padding-left:15px">
                    <input type="text" name="invite_code" class="text-input" value="" style="width:300px"/>
                </td>
                <td style="padding-left:5px">
                    <input type="submit" name="show_invite" value="<?php echo $this->_tpl_vars['LANG']['SHOW_INVITE']; ?>
" />
                </td>
            </tr>
        </table>
        </form>

    <?php else: ?>

        <?php echo cmsSmartyAddJS(array('file' => 'components/registration/js/check.js'), $this);?>


        <form id="regform" name="regform" method="post" action="/registration/add">
            <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
            <table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr>
                    <td width="269" valign="top" class="">
                        <div><strong><?php echo $this->_tpl_vars['LANG']['LOGIN']; ?>
:</strong></div>
                        <div><small><?php echo $this->_tpl_vars['LANG']['USED_FOR_AUTH']; ?>
<br/><?php echo $this->_tpl_vars['LANG']['ONLY_LAT_SYMBOLS']; ?>
</small></div>
                    </td>
                    <td valign="top" class="">
                        <input name="login" id="logininput" class="text-input" type="text" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['login'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onchange="checkLogin()" autocomplete="off"/>
                        <span class="regstar">*</span>
                        <div id="logincheck"></div>
                    </td>
                </tr>
                <?php if ($this->_tpl_vars['cfg']['name_mode'] == 'nickname'): ?>
                    <tr>
                        <td valign="top" class="" width="269">
                            <div><strong><?php echo $this->_tpl_vars['LANG']['NICKNAME']; ?>
:</strong></div>
                            <small><?php echo $this->_tpl_vars['LANG']['NICKNAME_TEXT']; ?>
</small>
                        </td>
                        <td valign="top" class="">
                            <input name="nickname" id="nickinput" class="text-input" type="text" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['nickname'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                            <span class="regstar">*</span>
                        </td>
                    </tr>
                <?php else: ?>
                    <tr>
                        <td valign="top" class="">
                            <div><strong><?php echo $this->_tpl_vars['LANG']['NAME']; ?>
:</strong></div>
                        </td>
                        <td valign="top" class="">
                            <input name="realname1" id="realname1" class="text-input" type="text" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['realname1'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                            <span class="regstar">*</span>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top" class="">
                            <div><strong><?php echo $this->_tpl_vars['LANG']['SURNAME']; ?>
:</strong></div>
                        </td>
                        <td valign="top" class="">
                            <input name="realname2" id="realname2" class="text-input" type="text" style="width:300px" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['realname2'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
                            <span class="regstar">*</span>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['PASS']; ?>
:</strong></td>
                    <td valign="top" class="">
                        <input name="pass" id="pass1input" class="text-input" type="password" style="width:300px" onchange="$('#passcheck').html('');"/>
                        <span class="regstar">*</span>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['REPEAT_PASS']; ?>
: </strong></td>
                    <td valign="top" class="">
                        <input name="pass2" id="pass2input" class="text-input" type="password" style="width:300px" onchange="checkPasswords()" />
                        <span class="regstar">*</span>
                        <div id="passcheck"></div>
                    </td>
                </tr>
                <tr>
                    <td valign="top" class="">
                        <div><strong><?php echo $this->_tpl_vars['LANG']['EMAIL']; ?>
:</strong></div>
                        <div><small><?php echo $this->_tpl_vars['LANG']['NOPUBLISH_TEXT']; ?>
</small></div>
                    </td>
                    <td valign="top" class="">
                        <input name="email" type="text" class="text-input" style="width:300px" value="<?php echo $this->_tpl_vars['item']['email']; ?>
"/>
                        <span class="regstar">*</span>
                    </td>
                </tr>
                <?php if ($this->_tpl_vars['private_forms']): ?>
                    <?php $_from = $this->_tpl_vars['private_forms']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tid'] => $this->_tpl_vars['field']):
?>
                    <tr>
                        <td valign="top">
                            <strong><?php echo $this->_tpl_vars['field']['title']; ?>
:</strong>
                            <?php if ($this->_tpl_vars['field']['description']): ?>
                                <div><small><?php echo $this->_tpl_vars['field']['description']; ?>
</small></div>
                            <?php endif; ?>
                        </td>
                        <td valign="top">
                            <?php echo $this->_tpl_vars['field']['field']; ?>
 <span class="regstar">*</span>
                        </td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['cfg']['ask_city']): ?>
                    <tr>
                        <td valign="top" class=""><strong><?php echo $this->_tpl_vars['LANG']['CITY']; ?>
:</strong></td>
                        <td valign="top" class="">
                            <?php echo smarty_function_city_input(array('value' => $this->_tpl_vars['item']['city'],'name' => 'city','width' => '300px'), $this);?>

                        </td>
                    </tr>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['cfg']['ask_icq']): ?>
                    <tr>
                        <td valign="top" class=""><strong>ICQ:</strong></td>
                        <td valign="top" class="">
                            <input name="icq" type="text" class="text-input" id="icq" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['item']['icq'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" style="width:300px"/>
                        </td>
                    </tr>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['cfg']['ask_birthdate']): ?>
                    <tr>
                        <td valign="top" class="">
                            <div><strong><?php echo $this->_tpl_vars['LANG']['BIRTH']; ?>
:</strong></div>
                            <div><small><?php echo $this->_tpl_vars['LANG']['NOPUBLISH_TEXT']; ?>
</small></div>
                        </td>
                        <td valign="top" class=""><?php echo smarty_function_dateform(array('seldate' => $this->_tpl_vars['item']['birthdate']), $this);?>
</td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td valign="top" class="">
                        <div><strong><?php echo $this->_tpl_vars['LANG']['SECUR_SPAM']; ?>
: </strong></div>
                        <div><small><?php echo $this->_tpl_vars['LANG']['SECUR_SPAM_TEXT']; ?>
</small></div>
                    </td>
                    <td valign="top" class=""><?php echo smarty_function_captcha(array(), $this);?>
</td>
                </tr>
                <tr>
                    <td valign="top" class="">&nbsp;</td>
                    <td valign="top" class="">
                        <input name="do" type="hidden" value="register" />
                        <input name="save" type="submit" id="save" value="<?php echo $this->_tpl_vars['LANG']['REGISTRATION']; ?>
" />
                    </td>
                </tr>
            </table>
        </form>

    <?php endif; ?>

<?php else: ?>

    <div style="margin-top:10px"><?php echo $this->_tpl_vars['cfg']['offmsg']; ?>
</div>

<?php endif; ?>
