<?php
  
	function info_module_mod_dt_newsslider(){
	
		$_module['title']        = 'DT Слайдер новостей';
		$_module['name']         = 'DT NewsSlider';
		$_module['description']  = 'Простой новостной слайдер';
		$_module['link']         = 'mod_dt_newsslider';
		$_module['position']     = 'maintop';
		$_module['author']       = 'Dezerit Templates';
		$_module['version']      = '1.4';
		
		$_module['config'] = array();
		$_module['config']['style'] = 1;
		$_module['config']['substyle'] = 1;
		$_module['config']['listwidth'] = 0;
		$_module['config']['sliderheight'] = 300;
		$_module['config']['noshadow'] = 0;
		$_module['config']['noimage'] = 0;
		$_module['config']['newscount'] = 5;
		$_module['config']['speed'] = 500;
		$_module['config']['duration'] = 5000;
		$_module['config']['pause'] = 1;
		$_module['config']['event'] = 1;
		$_module['config']['cat_id'] = 0;
		$_module['config']['subs'] = 1;
		$_module['config']['ctitle'] = 50;
		$_module['config']['cdesc'] = 200;
		$_module['config']['anons'] = 1;
		$_module['config']['smallimg'] = 1;
		$_module['config']['fullimg'] = 1;
		
		
		return $_module;
	}
		
	function install_module_mod_dt_newsslider(){
		return true;
	}
		
	function upgrade_module_mod_dt_newsslider(){
		return true;
	}

?>
