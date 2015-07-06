<div class="img_captcha">
	<img id="kcaptcha{$input_id}" class="captcha" src="/plugins/p_kcaptcha/codegen/cms_codegen.php?id={$input_id}" />
</div>
<div class="captch_cont"><p>{$LANG.P_CAPTCHA_CODE}:</p>
<input name="captcha_code" type="text" class="text-input" />
<a href="#" onclick="$('#kcaptcha{$input_id}').attr('src', '/plugins/p_kcaptcha/codegen/cms_codegen.php?'+Math.random()+'&id={$input_id}');return false;">{$LANG.P_CAPTCHA_RELOAD}</a></div>
<input name="captcha_id" type="hidden" value="{$input_id}"/>