<link rel="stylesheet" href="/modules/mod_dt_newsslider/css/style{$cfg.style}/newsslider{if $cfg.substyle and $cfg.style < 5}_s{$cfg.substyle}{/if}.css" type="text/css" /><div id="dt_newsslider{$module_id}" class="style{$cfg.style} {if $cfg.substyle and $cfg.style < 5}sb{$cfg.substyle}{/if} dt_newsslider {if $cfg.fullimg}fullimg{/if}" {if $cfg.style > 10}style="height: {$cfg.sliderheight}px"{/if}>	{if $cfg.style < 15}	<div class="dt_newsslider_list" {if $cfg.listwidth}style="width: {$cfg.listwidth}px"{/if}>		{foreach key=sid item=list_item from=$slider}		<div id="dt_newsslider_list_item_{$module_id}_{$sid}" class="dt_newsslider_list_item">			<div class="dt_newsslider_list_itembg">				{if !$cfg.noimage}				<span class="dt_newsslider_list_img">					{if $list_item.image}						<img src="/images/photos/small/{$list_item.image}" alt="{$list_item.title|escape:'html'}" />					{else}						<img src="/modules/mod_dt_newsslider/images/style{$cfg.style}/{if $cfg.substyle and $cfg.style == 1}sb{$cfg.substyle}/{/if}noimage_s.png" alt="{$list_item.title|escape:'html'}" />					{/if}				</span>				<span class="dt_newsslider_list_title">{$list_item.title|truncate:$cfg.ctitle}</span>{if $cfg.style > 4}<span class="dt_newsslider_list_desc">{$list_item.content|strip_tags|truncate:80}</span>{/if}				{else}				<span class="dt_newsslider_list_title" style="padding-left:15px;">{$list_item.title|truncate:$cfg.ctitle}</span>{if $cfg.style > 4}<span class="dt_newsslider_list_desc" style="padding-left:15px;">{$list_item.content|strip_tags|truncate:80}</span>{/if}				{/if}			</div>		</div>		{/foreach}	</div>	{else}	<span title="{$LANG.DTNEWSSLIDER_NEXT}" id="dt_newsslider_next{$module_id}" class="dt_newsslider_control dt_newsslider_next"></span>	<span title="{$LANG.DTNEWSSLIDER_PREV}" id="dt_newsslider_prev{$module_id}" class="dt_newsslider_control dt_newsslider_prev"></span>	{/if}	{foreach key=sid item=slide from=$slider}	<div id="newsslider_slide_{$module_id}_{$sid}" class="dt_newsslider_slide">		<div class="dt_newsslider_slide_img">			{if $slide.image}				<img src="/images/photos/{if $cfg.smallimg}small{else}medium{/if}/{$slide.image}" alt="{$slide.title|escape:'html'}" />			{else}				<img src="/modules/mod_dt_newsslider/images/style{$cfg.style}/{if $cfg.substyle and $cfg.style == 1}sb{$cfg.substyle}/{/if}noimage_b.png" alt="{$list_item.title|escape:'html'}" />			{/if}		</div>		{if !$cfg.noshadow and $cfg.style == 4}			<div class="dt_newsslider_nb2shadow"></div>		{/if}		<div class="dt_newsslider_slide_info">			<span class="dt_newsslider_slide_title">{$slide.title|strip_tags|truncate:$cfg.ctitle}</span>			<div class="dt_newsslider_slide_content">				<p class="dt_newsslider_slide_desc">{if $cfg.anons}{$slide.content|strip_tags|truncate:$cfg.cdesc}{else}{$slide.description|strip_tags|truncate:$cfg.cdesc}{/if}</p>				<a class="dt_newsslider_slide_more" href="{$slide.url}" >{$LANG.DTNEWSSLIDER_MORE}</a>			</div>		</div>	</div>	{/foreach}	<div class="clear"></div></div>{if $cfg.style < 15}	{literal}		<script type=text/javascript>			(function ($) {			var speed{/literal}{$module_id}{literal} = {/literal}{$cfg.speed}{literal};			var duration{/literal}{$module_id}{literal} = {/literal}{$cfg.duration}{literal};			var reSizeSlider{/literal}{$module_id}{literal} = function(){				var sliderHeight{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal}').height();				var sliderWidth{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal}').width();				var sliderListWidth{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_list').width();				var slideWidth{/literal}{$module_id}{literal} = sliderWidth{/literal}{$module_id}{literal} - sliderListWidth{/literal}{$module_id}{literal};								{/literal}{if $cfg.style < 11 && $cfg.style != 5 && $cfg.style != 6}{literal}				$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').css('width', slideWidth{/literal}{$module_id}{literal});				{/literal}{/if}{if $cfg.fullimg}{literal}				$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide .dt_newsslider_slide_img').css({					'width' : '100%',					'height' : sliderHeight{/literal}{$module_id}{literal}				});				{/literal}{if $cfg.style < 5}{literal}					$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide .dt_newsslider_slide_img img').css('height', sliderHeight{/literal}{$module_id}{literal});							{/literal}{/if}					{/if}				{literal}				{/literal}{if $cfg.style > 10}{literal}					var sliderListHeight{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_list').height();					$('#dt_newsslider{/literal}{$module_id}{literal}').css('padding-bottom',sliderListHeight{/literal}{$module_id}{literal});				{/literal}{/if}{literal}			}			reSizeSlider{/literal}{$module_id}{literal}();			$(window).resize(function() {reSizeSlider{/literal}{$module_id}{literal}()});			$(document).ready(function(e) {				$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide'){/literal}{if $cfg.style < 11}{literal}.css(				{'position' : 'absolute', 'top':'0', 'left': '0'}){/literal}{/if}{literal}.hide().eq(0).addClass('active').show();				{/literal}{if $cfg.style == 5 || $cfg.style == 6}{literal}				$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(0).children('.dt_newsslider_slide_info').delay(speed{/literal}{$module_id}{literal}).animate({'top':'25px'});				{/literal}{elseif $cfg.style > 10}{literal}				$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(0).children('.dt_newsslider_slide_info').css('right', 0);				{/literal}{/if}{literal}					var slideNum{/literal}{$module_id}{literal} = 0;					var slideTime{/literal}{$module_id}{literal};									var slideCount{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').size();					var animSlide{/literal}{$module_id}{literal} = function(arrow,event){						clearTimeout(slideTime{/literal}{$module_id}{literal});						if(event == 'hover'){							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).stop(true, true);						}													$('#slider-dots .dot.current_dot').removeClass('current_dot');						if(slideNum{/literal}{$module_id}{literal} == (slideCount{/literal}{$module_id}{literal}-1)){							$('#slider-dots .slider-dot-0').addClass('current_dot');						}						else{							var slide_dot_num = slideNum{/literal}{$module_id}{literal}+1;							$('#slider-dots .slider-dot-'+slide_dot_num).addClass('current_dot');						}													{/literal}{if $cfg.style < 5}{literal}						$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).removeClass('active').fadeOut(speed{/literal}{$module_id}{literal});						{/literal}{else}{literal}						$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).removeClass('active').hide();						{/literal}{if $cfg.style == 5 || $cfg.style == 6 }{literal}						$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).children('.dt_newsslider_slide_info').css({'top':'-500px'});						{/literal}{elseif $cfg.style > 10}{literal}						$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).children('.dt_newsslider_slide_info').css('right', -1000);						{/literal}{/if}{/if}{literal}						if(arrow == 'next'){							if(slideNum{/literal}{$module_id}{literal} == (slideCount{/literal}{$module_id}{literal}-1)){slideNum{/literal}{$module_id}{literal}=0;}							else{slideNum{/literal}{$module_id}{literal}++}							}						else if(arrow == 'prew')						{							if(slideNum{/literal}{$module_id}{literal} == 0){slideNum{/literal}{$module_id}{literal}=slideCount{/literal}{$module_id}{literal}-1;}							else{slideNum{/literal}{$module_id}{literal}-=1}						}						else{							slideNum{/literal}{$module_id}{literal} = arrow;							}						if(event == 'hover'){							{/literal}{if $cfg.style < 5}{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).addClass('active').fadeIn(speed{/literal}{$module_id}{literal});							{/literal}{elseif $cfg.style > 10}{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).addClass('active').show(0, rotator{/literal}{$module_id}{literal});							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).children('.dt_newsslider_slide_info').animate({'right' : 0},speed{/literal}{$module_id}{literal});							{/literal}{else}{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).addClass('active').show(speed{/literal}{$module_id}{literal},rotator{/literal}{$module_id}{literal});							{/literal}{if $cfg.style == 5 || $cfg.style == 6 }{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).children('.dt_newsslider_slide_info').delay(100).animate({'top':'25px'});							{/literal}{/if}{/if}{literal}						}else{							{/literal}{if $cfg.style < 5}{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).addClass('active').fadeIn(speed{/literal}{$module_id}{literal}, rotator{/literal}{$module_id}{literal});							{/literal}{elseif $cfg.style > 10}{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).addClass('active').show(0, rotator{/literal}{$module_id}{literal});							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).children('.dt_newsslider_slide_info').animate({'right' : 0},speed{/literal}{$module_id}{literal});							{/literal}{else}{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).addClass('active').show(speed{/literal}{$module_id}{literal},rotator{/literal}{$module_id}{literal});							{/literal}{if $cfg.style == 5 || $cfg.style == 6 }{literal}							$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').eq(slideNum{/literal}{$module_id}{literal}).children('.dt_newsslider_slide_info').delay(speed{/literal}{$module_id}{literal}).animate({'top':'25px'});							{/literal}{/if}{/if}{literal}						}						$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_list .dt_newsslider_list_item.active').removeClass('active');						$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_list .dt_newsslider_list_item').eq(slideNum{/literal}{$module_id}{literal}).addClass('active');					}													$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_list .dt_newsslider_list_item:first').addClass('active');										{/literal}{if $cfg.event == 'click'}{literal}					$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_list .dt_newsslider_list_item').click(function(){						var numGoTo{/literal}{$module_id}{literal};						numGoTo{/literal}{$module_id}{literal} = $(this).prop('id');						numGoTo{/literal}{$module_id}{literal} = numGoTo{/literal}{$module_id}{literal}.split('_');						animSlide{/literal}{$module_id}{literal}(numGoTo{/literal}{$module_id}{literal}[5],'click');					});					{/literal}{else}{literal}					$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_list .dt_newsslider_list_item').mouseenter(function(){						var numGoTo{/literal}{$module_id}{literal};						numGoTo{/literal}{$module_id}{literal} = $(this).prop('id');						numGoTo{/literal}{$module_id}{literal} = numGoTo{/literal}{$module_id}{literal}.split('_');						animSlide{/literal}{$module_id}{literal}(numGoTo{/literal}{$module_id}{literal}[5],'hover');					});					{/literal}{/if}{literal}									var pause{/literal}{$module_id}{literal} = false;					var rotator{/literal}{$module_id}{literal} = function(){ if(!pause{/literal}{$module_id}{literal}){slideTime{/literal}{$module_id}{literal} = setTimeout(function(){animSlide{/literal}{$module_id}{literal}('next')}, duration{/literal}{$module_id}{literal});} }					{/literal}{if $cfg.pause}{literal}					$('#dt_newsslider{/literal}{$module_id}{literal}').hover( function(){						clearTimeout(slideTime{/literal}{$module_id}{literal}); pause{/literal}{$module_id}{literal} = true;}						,function(){pause{/literal}{$module_id}{literal} = false; rotator{/literal}{$module_id}{literal}();					});					{/literal}{elseif !$cfg.pause & $cfg.event == 'hover'}{literal}							$('#dt_newsslider{/literal}{$module_id}{literal}').mouseleave( function(){								pause{/literal}{$module_id}{literal} = false; rotator{/literal}{$module_id}{literal}();							});					{/literal}{/if}{literal}					rotator{/literal}{$module_id}{literal}();				});				})(jQuery);		</script>	{/literal}{else}	{literal}		<script type=text/javascript>			$(document).ready(function(){				currentPosition{/literal}{$module_id}{literal} = 0;				var sliderHeight{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal}').height();				var slides{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide');				var numberOfSlides{/literal}{$module_id}{literal} = slides{/literal}{$module_id}{literal}.length;				slideWidth{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal}').width();				$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').css('height', sliderHeight{/literal}{$module_id}{literal});				slides{/literal}{$module_id}{literal}.wrapAll('<div id="dt_newsslider_wrap{/literal}{$module_id}{literal}"></div>')					.css({					  'float' : 'left',					  'width' : slideWidth{/literal}{$module_id}{literal}					});				$('#dt_newsslider_wrap{/literal}{$module_id}{literal}').css('width', slideWidth{/literal}{$module_id}{literal} * numberOfSlides{/literal}{$module_id}{literal});				$(window).resize(function() {reSizeSlider{/literal}{$module_id}{literal}()});				manageControls{/literal}{$module_id}{literal}(currentPosition{/literal}{$module_id}{literal});				$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_control')					.bind('click', function(){					currentPosition{/literal}{$module_id}{literal} = ($(this).attr('id')=='dt_newsslider_next{/literal}{$module_id}{literal}') ? currentPosition{/literal}{$module_id}{literal}+1 : currentPosition{/literal}{$module_id}{literal}-1;					manageControls{/literal}{$module_id}{literal}(currentPosition{/literal}{$module_id}{literal});					$('#dt_newsslider_wrap{/literal}{$module_id}{literal}').animate({					  'marginLeft' : slideWidth{/literal}{$module_id}{literal}*(-currentPosition{/literal}{$module_id}{literal})					});				});				var pause{/literal}{$module_id}{literal} = false;				var rotator{/literal}{$module_id}{literal} = function(){ 					if(!pause{/literal}{$module_id}{literal}){slideTime{/literal}{$module_id}{literal} = setTimeout(function(){slideShow{/literal}{$module_id}{literal}()}, {/literal}{$cfg.duration}{literal});}				};				{/literal}{if $cfg.pause}{literal}				$('#dt_newsslider{/literal}{$module_id}{literal}').hover( function(){					clearTimeout(slideTime{/literal}{$module_id}{literal}); pause{/literal}{$module_id}{literal} = true;}					,function(){pause{/literal}{$module_id}{literal} = false; rotator{/literal}{$module_id}{literal}();				});				{/literal}{/if}{literal}				rotator{/literal}{$module_id}{literal}();											function slideShow{/literal}{$module_id}{literal}(){					if(currentPosition{/literal}{$module_id}{literal} !== numberOfSlides{/literal}{$module_id}{literal}-1){						$('#dt_newsslider{/literal}{$module_id}{literal} #dt_newsslider_next{/literal}{$module_id}{literal}').click();						rotator{/literal}{$module_id}{literal}();					}else{						$('#dt_newsslider{/literal}{$module_id}{literal} #dt_newsslider_wrap{/literal}{$module_id}{literal}').animate({'marginLeft' : 0});						currentPosition{/literal}{$module_id}{literal} = 0;						manageControls{/literal}{$module_id}{literal}(currentPosition{/literal}{$module_id}{literal});						rotator{/literal}{$module_id}{literal}();					}				}				function reSizeSlider{/literal}{$module_id}{literal}(){					slideWidth{/literal}{$module_id}{literal} = $('#dt_newsslider{/literal}{$module_id}{literal}').width();					$('#dt_newsslider{/literal}{$module_id}{literal} .dt_newsslider_slide').css('width' , slideWidth{/literal}{$module_id}{literal})					$('#dt_newsslider_wrap{/literal}{$module_id}{literal}').css('width', slideWidth{/literal}{$module_id}{literal} * numberOfSlides{/literal}{$module_id}{literal});					$('#dt_newsslider{/literal}{$module_id}{literal} #dt_newsslider_wrap{/literal}{$module_id}{literal}').animate({'marginLeft' : 0});					$('#dt_newsslider_prev{/literal}{$module_id}{literal}').hide();					currentPosition{/literal}{$module_id}{literal} = 0;					manageControls{/literal}{$module_id}{literal}(currentPosition{/literal}{$module_id}{literal});				}						function manageControls{/literal}{$module_id}{literal}(position){					if(position==0){ $('#dt_newsslider_prev{/literal}{$module_id}{literal}').hide() } else{ $('#dt_newsslider_prev{/literal}{$module_id}{literal}').show() }					if(position==numberOfSlides{/literal}{$module_id}{literal}-1){ $('#dt_newsslider_next{/literal}{$module_id}{literal}').hide() } else{ $('#dt_newsslider_next{/literal}{$module_id}{literal}').show() }				}					});		</script>	{/literal}{/if}