<?php /* Smarty version 2.6.28, created on 2015-02-24 09:34:01
         compiled from com_registration_login.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'csrf_token', 'com_registration_login.tpl', 11, false),array('function', 'captcha', 'com_registration_login.tpl', 23, false),)), $this); ?>
<h1 class="con_heading"><?php echo $this->_tpl_vars['LANG']['SITE_LOGIN']; ?>
</h1>

<?php if ($this->_tpl_vars['is_sess_back']): ?>
    <p class="lf_notice"><?php echo $this->_tpl_vars['LANG']['PAGE_ACCESS_NOTICE']; ?>
</p>
<?php endif; ?>

<table border="0" cellpadding="0" cellspacing="0" width="100%" class="login_form">
    <tr>
        <td valign="top" width="50%">
            <form method="post" action="">
                <input type="hidden" name="csrf_token" value="<?php echo smarty_function_csrf_token(array(), $this);?>
" />
                <div class="lf_title"><?php echo $this->_tpl_vars['LANG']['LOGIN']; ?>
 <?php echo $this->_tpl_vars['LANG']['OR']; ?>
 <?php echo $this->_tpl_vars['LANG']['EMAIL']; ?>
</div>
                <div class="lf_field">
                    <input type="text" name="login" id="login_field" tabindex="1"/> <a href="/registration" class="lf_link"><?php echo $this->_tpl_vars['LANG']['REGISTRATION']; ?>
</a>
                </div>
                <div class="lf_title"><?php echo $this->_tpl_vars['LANG']['PASS']; ?>
</div>
                <div class="lf_field">
                    <input type="password" name="pass" id="pass_field" tabindex="2"/> <a href="/passremind.html" class="lf_link"><?php echo $this->_tpl_vars['LANG']['FORGOT_PASS']; ?>
</a>
                </div>
                <?php if ($this->_tpl_vars['anti_brute_force']): ?>
                    <div class="lf_title"><?php echo $this->_tpl_vars['LANG']['SECUR_SPAM']; ?>
</div>
                    <div class="lf_field">
                        <?php echo smarty_function_captcha(array(), $this);?>

                    </div>
                <?php endif; ?>
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                    <tr>
                        <td width="20"><input type="checkbox" name="remember" value="1" checked="checked" id="remember" tabindex="3" /></td>
                        <td>
                            <label for="remember"><?php echo $this->_tpl_vars['LANG']['REMEMBER_ME']; ?>
</label>
                        </td>
                    </tr>
                </table>
                <p class="lf_submit">
                    <input type="submit" name="login_btn" value="<?php echo $this->_tpl_vars['LANG']['SITE_LOGIN_SUBMIT']; ?>
" tabindex="4" />
                </p>
            </form>
        </td>
        <td valign="top">

            <?php cmsCore::callEvent('LOGINZA_BUTTON', array()); ?>

        </td>
    </tr>
</table>

<script type="text/javascript">
    <?php echo '
    $(document).ready(function(){
        $(\'.login_form #login_field\').focus();
    });
    '; ?>

</script>