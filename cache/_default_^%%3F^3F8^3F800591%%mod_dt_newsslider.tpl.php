<?php /* Smarty version 2.6.28, created on 2015-07-06 11:56:35
         compiled from mod_dt_newsslider.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'mod_dt_newsslider.tpl', 1, false),array('modifier', 'truncate', 'mod_dt_newsslider.tpl', 1, false),array('modifier', 'strip_tags', 'mod_dt_newsslider.tpl', 1, false),)), $this); ?>
<link rel="stylesheet" href="/modules/mod_dt_newsslider/css/style<?php echo $this->_tpl_vars['cfg']['style']; ?>
/newsslider<?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] < 5): ?>_s<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
<?php endif; ?>.css" type="text/css" />
" class="style<?php echo $this->_tpl_vars['cfg']['style']; ?>
 <?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] < 5): ?>sb<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
<?php endif; ?> dt_newsslider <?php if ($this->_tpl_vars['cfg']['fullimg']): ?>fullimg<?php endif; ?>" <?php if ($this->_tpl_vars['cfg']['style'] > 10): ?>style="height: <?php echo $this->_tpl_vars['cfg']['sliderheight']; ?>
px"<?php endif; ?>>
px"<?php endif; ?>>
    foreach ($_from as $this->_tpl_vars['sid'] => $this->_tpl_vars['list_item']):
?>
_<?php echo $this->_tpl_vars['sid']; ?>
" class="dt_newsslider_list_item">
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
/<?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] == 1): ?>sb<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
/<?php endif; ?>noimage_s.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
</span><?php if ($this->_tpl_vars['cfg']['style'] > 4): ?><span class="dt_newsslider_list_desc"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list_item']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</span><?php endif; ?>
</span><?php if ($this->_tpl_vars['cfg']['style'] > 4): ?><span class="dt_newsslider_list_desc" style="padding-left:15px;"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['list_item']['content'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 80) : smarty_modifier_truncate($_tmp, 80)); ?>
</span><?php endif; ?>
" id="dt_newsslider_next<?php echo $this->_tpl_vars['module_id']; ?>
" class="dt_newsslider_control dt_newsslider_next"></span>
" id="dt_newsslider_prev<?php echo $this->_tpl_vars['module_id']; ?>
" class="dt_newsslider_control dt_newsslider_prev"></span>
    foreach ($_from as $this->_tpl_vars['sid'] => $this->_tpl_vars['slide']):
?>
_<?php echo $this->_tpl_vars['sid']; ?>
" class="dt_newsslider_slide">
" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['slide']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
/<?php if ($this->_tpl_vars['cfg']['substyle'] && $this->_tpl_vars['cfg']['style'] == 1): ?>sb<?php echo $this->_tpl_vars['cfg']['substyle']; ?>
/<?php endif; ?>noimage_b.png" alt="<?php echo ((is_array($_tmp=$this->_tpl_vars['list_item']['title'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
</span>
<?php else: ?><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['slide']['description'])) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, $this->_tpl_vars['cfg']['cdesc']) : smarty_modifier_truncate($_tmp, $this->_tpl_vars['cfg']['cdesc'])); ?>
<?php endif; ?></p>
" ><?php echo $this->_tpl_vars['LANG']['DTNEWSSLIDER_MORE']; ?>
</a>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = '; ?>
<?php echo $this->_tpl_vars['cfg']['speed']; ?>
<?php echo ';
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = '; ?>
<?php echo $this->_tpl_vars['cfg']['duration']; ?>
<?php echo ';
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').height();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').width();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list\').width();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = sliderWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' - sliderListWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';
<?php if ($this->_tpl_vars['cfg']['style'] < 11 && $this->_tpl_vars['cfg']['style'] != 5 && $this->_tpl_vars['cfg']['style'] != 6): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').css(\'width\', slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php endif; ?><?php if ($this->_tpl_vars['cfg']['fullimg']): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide .dt_newsslider_slide_img\').css({
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide .dt_newsslider_slide_img img\').css(\'height\', sliderHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');			
<?php endif; ?>
<?php if ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list\').height();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').css(\'padding-bottom\',sliderListHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php endif; ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '()});
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\')'; ?>
<?php if ($this->_tpl_vars['cfg']['style'] < 11): ?><?php echo '.css(
<?php endif; ?><?php echo '.hide().eq(0).addClass(\'active\').show();
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(0).children(\'.dt_newsslider_slide_info\').delay(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').animate({\'top\':\'25px\'});
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(0).children(\'.dt_newsslider_slide_info\').css(\'right\', 0);
<?php endif; ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';				
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').size();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(arrow,event){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').stop(true, true);
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').removeClass(\'active\').fadeOut(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php else: ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').removeClass(\'active\').hide();
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').css({\'top\':\'-500px\'});
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').css(\'right\', -1000);
<?php endif; ?><?php endif; ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' == (slideCount'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1)){slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '=0;}
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '++}
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' == 0){slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '=slideCount'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1;}
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-=1}
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = arrow;
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').fadeIn(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(0, rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').animate({\'right\' : 0},speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php else: ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ',rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').delay(100).animate({\'top\':\'25px\'});
<?php endif; ?><?php endif; ?><?php echo '
<?php if ($this->_tpl_vars['cfg']['style'] < 5): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').fadeIn(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ', rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php elseif ($this->_tpl_vars['cfg']['style'] > 10): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(0, rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').animate({\'right\' : 0},speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php else: ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\').show(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ',rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php if ($this->_tpl_vars['cfg']['style'] == 5 || $this->_tpl_vars['cfg']['style'] == 6): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').children(\'.dt_newsslider_slide_info\').delay(speed'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').animate({\'top\':\'25px\'});
<?php endif; ?><?php endif; ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item.active\').removeClass(\'active\');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item\').eq(slideNum'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ').addClass(\'active\');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item:first\').addClass(\'active\');
<?php if ($this->_tpl_vars['cfg']['event'] == 'click'): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item\').click(function(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(this).prop(\'id\');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.split(\'_\');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '[5],\'click\');
<?php else: ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_list .dt_newsslider_list_item\').mouseenter(function(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ';
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(this).prop(\'id\');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.split(\'_\');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(numGoTo'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '[5],\'hover\');
<?php endif; ?><?php echo '				
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(){ if(!pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '){slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = setTimeout(function(){animSlide'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(\'next\')}, duration'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');} }
<?php if ($this->_tpl_vars['cfg']['pause']): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hover( function(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '); pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = true;}
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false; rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();
<?php elseif (! $this->_tpl_vars['cfg']['pause'] & $this->_tpl_vars['cfg']['event'] == 'hover'): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').mouseleave( function(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false; rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();
<?php endif; ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();

<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').height();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = slides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.length;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').width();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').css(\'height\', sliderHeight'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '.wrapAll(\'<div id="dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '"></div>\')
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').css(\'width\', slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' * numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '()});
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_control\')
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = ($(this).attr(\'id\')==\'dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\') ? currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '+1 : currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').animate({
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '*(-currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ')
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = function(){ 
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '){slideTime'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = setTimeout(function(){slideShow'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '()}, '; ?>
<?php echo $this->_tpl_vars['cfg']['duration']; ?>
<?php echo ');}
<?php if ($this->_tpl_vars['cfg']['pause']): ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hover( function(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '); pause'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = true;}
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = false; rotator'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();
<?php endif; ?><?php echo '
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();							
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' !== numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' #dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').click();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' #dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').animate({\'marginLeft\' : 0});
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = $(\'#dt_newsslider'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').width();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' .dt_newsslider_slide\').css(\'width\' , slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ')
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').css(\'width\', slideWidth'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' * numberOfSlides'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' #dt_newsslider_wrap'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').animate({\'marginLeft\' : 0});
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hide();
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ' = 0;
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(currentPosition'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo ');
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '(position){
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hide() } else{ $(\'#dt_newsslider_prev'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').show() }
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '-1){ $(\'#dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').hide() } else{ $(\'#dt_newsslider_next'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo '\').show() }
