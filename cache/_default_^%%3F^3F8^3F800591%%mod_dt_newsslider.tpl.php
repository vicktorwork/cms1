<?php /* Smarty version 2.6.28, created on 2015-07-06 11:56:35
         compiled from mod_dt_newsslider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'mod_dt_newsslider.tpl', 1, false),array('modifier', 'truncate', 'mod_dt_newsslider.tpl', 1, false),array('modifier', 'strip_tags', 'mod_dt_newsslider.tpl', 1, false),)), $this); ?>
<link rel="stylesheet" href="/modules/mod_dt_newsslider/css/style<?php echo $this->_tpl_vars['cfg']['style']; ?>
/newsslider<?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] < 5): ?>_s<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
<?php endif; ?>.css" type="text/css" /><div id="dt_newsslider<?php echo $this->_tpl_vars['module_id']; ?>
" class="style<?php echo $this->_tpl_vars['cfg']['style']; ?>
 <?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] < 5): ?>sb<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
<?php endif; ?> dt_newsslider <?php if ($this->_tpl_vars['cfg']['fullimg']): ?>fullimg<?php endif; ?>" <?php if ($this->_tpl_vars['cfg']['style'] > 10): ?>style="height: <?php echo $this->_tpl_vars['cfg']['sliderheight']; ?>
px"<?php endif; ?>>	<?php if ($this->_tpl_vars['cfg']['style'] < 15): ?>	<div class="dt_newsslider_list" <?php if ($this->_tpl_vars['cfg']['listwidth']): ?>style="width: <?php echo $this->_tpl_vars['cfg']['listwidth']; ?>
px"<?php endif; ?>>		<?php $_from = $this->_tpl_vars['slider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sid'] => $this->_tpl_vars['list_item']):
?>		<div id="dt_newsslider_list_item_<?php echo $this->_tpl_vars['module_id']; ?>
_<?php echo $this->_tpl_vars['sid']; ?>
" class="dt_newsslider_list_item">			<div class="dt_newsslider_list_itembg">				<?php if (! $this->_tpl_vars['cfg']['noimage']): ?>				<span class="dt_newsslider_list_img">					<?php if ($this->_tpl_vars['list_item']['image']): ?>						<img src="/images/photos/small/<?php echo $this->_tpl_vars['list_item']['image']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />					<?php else: ?>						<img src="/modules/mod_dt_newsslider/images/style<?php echo $this->_tpl_vars['cfg']['style']; ?>
/<?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] == 1): ?>sb<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
/<?php endif; ?>noimage_s.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />					<?php endif; ?>				</span>				<span class="dt_newsslider_list_title"><?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['cfg']['ctitle']) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['cfg']['ctitle'])); ?>
</span><?php if ($this->_tpl_vars['cfg']['style'] > 4): ?><span class="dt_newsslider_list_desc"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list_item']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</span><?php endif; ?>				<?php else: ?>				<span class="dt_newsslider_list_title" style="padding-left:15px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['cfg']['ctitle']) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['cfg']['ctitle'])); ?>
</span><?php if ($this->_tpl_vars['cfg']['style'] > 4): ?><span class="dt_newsslider_list_desc" style="padding-left:15px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list_item']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</span><?php endif; ?>				<?php endif; ?>			</div>		</div>		<?php endforeach; endif; unset($_from); ?>	</div>	<?php else: ?>	<span title="<?php echo $this->_tpl_vars['LANG']['DTNEWSSLIDER_NEXT']; ?>
" id="dt_newsslider_next<?php echo $this->_tpl_vars['module_id']; ?>
" class="dt_newsslider_control dt_newsslider_next"></span>	<span title="<?php echo $this->_tpl_vars['LANG']['DTNEWSSLIDER_PREV']; ?>
" id="dt_newsslider_prev<?php echo $this->_tpl_vars['module_id']; ?>
" class="dt_newsslider_control dt_newsslider_prev"></span>	<?php endif; ?>	<?php $_from = $this->_tpl_vars['slider']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sid'] => $this->_tpl_vars['slide']):
?>	<div id="newsslider_slide_<?php echo $this->_tpl_vars['module_id']; ?>
_<?php echo $this->_tpl_vars['sid']; ?>
" class="dt_newsslider_slide">		<div class="dt_newsslider_slide_img">			<?php if ($this->_tpl_vars['slide']['image']): ?>				<img src="/images/photos/<?php if ($this->_tpl_vars['cfg']['smallimg']): ?>small<?php else: ?>medium<?php endif; ?>/<?php echo $this->_tpl_vars['slide']['image']; ?>
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['slide']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />			<?php else: ?>				<img src="/modules/mod_dt_newsslider/images/style<?php echo $this->_tpl_vars['cfg']['style']; ?>
/<?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] == 1): ?>sb<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
/<?php endif; ?>noimage_b.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />			<?php endif; ?>		</div>		<?php if (! $this->_tpl_vars['cfg']['noshadow'] && $this->_tpl_vars['cfg']['style'] == 4): ?>			<div class="dt_newsslider_nb2shadow"></div>		<?php endif; ?>		<div class="dt_newsslider_slide_info">			<span class="dt_newsslider_slide_title"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['slide']['title'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['cfg']['ctitle']) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['cfg']['ctitle'])); ?>
</span>			<p class="dt_newsslider_slide_desc"><?php if ($this->_tpl_vars['cfg']['anons']): ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['slide']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['cfg']['cdesc']) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['cfg']['cdesc'])); ?>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['slide']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['cfg']['cdesc']) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['cfg']['cdesc'])); ?>
<?php endif; ?></p>			<a class="dt_newsslider_slide_more" href="<?php echo $this->_tpl_vars['slide']['url']; ?>
" ><?php echo $this->_tpl_vars['LANG']['DTNEWSSLIDER_MORE']; ?>
</a>		</div>	</div>	<?php endforeach; endif; unset($_from); ?>	<div class="clear"></div></div><?php if ($this->_tpl_vars['cfg']['style'] < 15): ?>	<?php echo '		<script type=text/javascript>			(function ($) {			var speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = '; ?>
<?php echo $this->_tpl_vars['cfg']['speed']; ?>
<?php echo ';			var duration'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = '; ?>
<?php echo $this->_tpl_vars['cfg']['duration']; ?>
<?php echo ';			var reSizeSlider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(){				var sliderHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').height();				var sliderWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').width();				var sliderListWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list\').width();				var slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = sliderWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' - sliderListWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';								'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] < 11 && $this->_tpl_vars['cfg']['style'] != 5 && $this->_tpl_vars['cfg']['style'] != 6): ?><?php echo '				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').css(\'width\', slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');				'; ?>
<?php endif; ?><?php if ($this->_tpl_vars['cfg']['fullimg']): ?><?php echo '				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide .dt_newsslider_slide_img\').css({					\'width\' : \'100%\',					\'height\' : sliderHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '				});				'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '					$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide .dt_newsslider_slide_img img\').css(\'height\', sliderHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							'; ?>
<?php endif; ?>					<?php endif; ?>				<?php echo '				'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '					var sliderListHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list\').height();					$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').css(\'padding-bottom\',sliderListHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');				'; ?>
<?php endif; ?><?php echo '			}			reSizeSlider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();			$(window).resize(function() {reSizeSlider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '()});			$(document).ready(function(e) {				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\')'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] < 11): ?><?php echo '.css(				{\'position\' : \'absolute\', \'top\':\'0\', \'left\': \'0\'})'; ?>
<?php endif; ?><?php echo '.hide().eq(0).addClass(\'active\').show();				'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(0).children(\'.dt_newsslider_slide_info\').delay(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').animate({\'top\':\'25px\'});				'; ?>
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(0).children(\'.dt_newsslider_slide_info\').css(\'right\', 0);				'; ?>
<?php endif; ?><?php echo '					var slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;					var slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';									var slideCount'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').size();					var animSlide'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(arrow,event){						clearTimeout(slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');						if(event == \'hover\'){							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').stop(true, true);						}						'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').removeClass(\'active\').fadeOut(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');						'; ?>
<?php else: ?><?php echo '						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').removeClass(\'active\').hide();						'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').css({\'top\':\'-500px\'});						'; ?>
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').css(\'right\', -1000);						'; ?>
<?php endif; ?><?php endif; ?><?php echo '						if(arrow == \'next\'){							if(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' == (slideCount'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1)){slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '=0;}							else{slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '++}							}						else if(arrow == \'prew\')						{							if(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' == 0){slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '=slideCount'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1;}							else{slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-=1}						}						else{							slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = arrow;							}						if(event == \'hover\'){							'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').fadeIn(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							'; ?>
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(0, rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').animate({\'right\' : 0},speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							'; ?>
<?php else: ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ',rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').delay(100).animate({\'top\':\'25px\'});							'; ?>
<?php endif; ?><?php endif; ?><?php echo '						}else{							'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').fadeIn(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ', rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							'; ?>
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(0, rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').animate({\'right\' : 0},speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							'; ?>
<?php else: ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ',rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');							'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').delay(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').animate({\'top\':\'25px\'});							'; ?>
<?php endif; ?><?php endif; ?><?php echo '						}						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item.active\').removeClass(\'active\');						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\');					}													$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item:first\').addClass(\'active\');										'; ?>
<?php if ($this->_tpl_vars['cfg']['event'] == 'click'): ?><?php echo '					$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item\').click(function(){						var numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';						numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(this).prop(\'id\');						numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.split(\'_\');						animSlide'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '[5],\'click\');					});					'; ?>
<?php else: ?><?php echo '					$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item\').mouseenter(function(){						var numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';						numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(this).prop(\'id\');						numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.split(\'_\');						animSlide'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '[5],\'hover\');					});					'; ?>
<?php endif; ?><?php echo '									var pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false;					var rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(){ if(!pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '){slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = setTimeout(function(){animSlide'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(\'next\')}, duration'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');} }					'; ?>
<?php if ($this->_tpl_vars['cfg']['pause']): ?><?php echo '					$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hover( function(){						clearTimeout(slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '); pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = true;}						,function(){pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false; rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();					});					'; ?>
<?php elseif (! $this->_tpl_vars['cfg']['pause'] & $this->_tpl_vars['cfg']['event'] == 'hover'): ?><?php echo '							$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').mouseleave( function(){								pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false; rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();							});					'; ?>
<?php endif; ?><?php echo '					rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();				});				})(jQuery);		</script>	'; ?>
<?php else: ?>	<?php echo '		<script type=text/javascript>			$(document).ready(function(){				currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;				var sliderHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').height();				var slides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\');				var numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = slides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.length;				slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').width();				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').css(\'height\', sliderHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');				slides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.wrapAll(\'<div id="dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '"></div>\')					.css({					  \'float\' : \'left\',					  \'width\' : slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '					});				$(\'#dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').css(\'width\', slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' * numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');				$(window).resize(function() {reSizeSlider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '()});				manageControls'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_control\')					.bind(\'click\', function(){					currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = ($(this).attr(\'id\')==\'dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\') ? currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '+1 : currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1;					manageControls'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');					$(\'#dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').animate({					  \'marginLeft\' : slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '*(-currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ')					});				});				var pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false;				var rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(){ 					if(!pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '){slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = setTimeout(function(){slideShow'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '()}, '; ?>
<?php echo $this->_tpl_vars['cfg']['duration']; ?>
<?php echo ');}				};				'; ?>
<?php if ($this->_tpl_vars['cfg']['pause']): ?><?php echo '				$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hover( function(){					clearTimeout(slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '); pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = true;}					,function(){pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false; rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();				});				'; ?>
<?php endif; ?><?php echo '				rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();											function slideShow'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(){					if(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' !== numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1){						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' #dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').click();						rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();					}else{						$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' #dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').animate({\'marginLeft\' : 0});						currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;						manageControls'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');						rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();					}				}				function reSizeSlider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(){					slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').width();					$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').css(\'width\' , slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ')					$(\'#dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').css(\'width\', slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' * numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');					$(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' #dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').animate({\'marginLeft\' : 0});					$(\'#dt_newsslider_prev'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hide();					currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;					manageControls'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');				}						function manageControls'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(position){					if(position==0){ $(\'#dt_newsslider_prev'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hide() } else{ $(\'#dt_newsslider_prev'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').show() }					if(position==numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1){ $(\'#dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hide() } else{ $(\'#dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').show() }				}					});		</script>	'; ?>
<?php endif; ?>