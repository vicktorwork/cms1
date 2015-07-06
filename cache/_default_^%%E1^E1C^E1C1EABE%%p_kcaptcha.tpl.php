<?php /* Smarty version 2.6.28, created on 2015-03-13 20:15:46
         compiled from p_kcaptcha.tpl */ ?>
<table align="left" cellpadding="2" cellspacing="0">
    <tr>
        <td valign="middle" width="130" style="padding-left:0">
            <img id="kcaptcha<?php echo $this->_tpl_vars['input_id']; ?>
" class="captcha" src="/plugins/p_kcaptcha/codegen/cms_codegen.php?id=<?php echo $this->_tpl_vars['input_id']; ?>
" />
        </td>
        <td valign="middle">
            <div><?php echo $this->_tpl_vars['LANG']['P_CAPTCHA_CODE']; ?>
:</div>
            <div><input name="captcha_code" type="text" style="width:120px" class="text-input" /></div>
            <div><a href="#" onclick="$('#kcaptcha<?php echo $this->_tpl_vars['input_id']; ?>
').attr('src', '/plugins/p_kcaptcha/codegen/cms_codegen.php?'+Math.random()+'&id=<?php echo $this->_tpl_vars['input_id']; ?>
');return false;"><small><?php echo $this->_tpl_vars['LANG']['P_CAPTCHA_RELOAD']; ?>
</small></a></div>
            <input name="captcha_id" type="hidden" value="<?php echo $this->_tpl_vars['input_id']; ?>
"/>
        </td>
    </tr>
</table>