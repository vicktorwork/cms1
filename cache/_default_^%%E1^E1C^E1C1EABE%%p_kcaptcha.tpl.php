<?php /* Smarty version 2.6.28, created on 2015-02-23 16:39:32
         compiled from p_kcaptcha.tpl */ ?>
<div class="img_captcha">
	<img id="kcaptcha<?php echo $this->_tpl_vars['input_id']; ?>
" class="captcha" src="/plugins/p_kcaptcha/codegen/cms_codegen.php?id=<?php echo $this->_tpl_vars['input_id']; ?>
" />
</div>
<div class="captch_cont"><p><?php echo $this->_tpl_vars['LANG']['P_CAPTCHA_CODE']; ?>
:</p>
<input name="captcha_code" type="text" class="text-input" />
<a href="#" onclick="$('#kcaptcha<?php echo $this->_tpl_vars['input_id']; ?>
').attr('src', '/plugins/p_kcaptcha/codegen/cms_codegen.php?'+Math.random()+'&id=<?php echo $this->_tpl_vars['input_id']; ?>
');return false;"><?php echo $this->_tpl_vars['LANG']['P_CAPTCHA_RELOAD']; ?>
</a></div>
<input name="captcha_id" type="hidden" value="<?php echo $this->_tpl_vars['input_id']; ?>
"/>