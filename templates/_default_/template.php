<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/
    /*
     * Доступны объекты $inCore $inUser $inPage($this) $inConf $inDB
     */

    // Получаем количество модулей на нужные позиции
    $mod_count['top']     = $this->countModules('top');
    $mod_count['topmenu'] = $this->countModules('topmenu');
    $mod_count['sidebar'] = $this->countModules('sidebar');

    // подключаем jQuery и js ядра в самое начало
    $this->prependHeadJS('core/js/common.js');
    $this->prependHeadJS('includes/jquery/jquery.js');
    // Подключаем стили шаблона
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/reset.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/text.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/960.css');
    $this->addHeadCSS('templates/'.TEMPLATE.'/css/styles.css');
    // Подключаем colorbox (просмотр фото)
    $this->addHeadJS('includes/jquery/colorbox/jquery.colorbox.js');
    $this->addHeadCSS('includes/jquery/colorbox/colorbox.css');
    $this->addHeadJS('includes/jquery/colorbox/init_colorbox.js');
    // LANG фразы для colorbox
    $this->addHeadJsLang(array('CBOX_IMAGE','CBOX_FROM','CBOX_PREVIOUS','CBOX_NEXT','CBOX_CLOSE','CBOX_XHR_ERROR','CBOX_IMG_ERROR', 'CBOX_SLIDESHOWSTOP', 'CBOX_SLIDESHOWSTART'));

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns# video: http://ogp.me/ns/video# music: http://ogp.me/ns/music# ya: http://webmaster.yandex.ru/vocabularies/">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!--link type="image/x-icon" rel="shortcut icon" href="/templates/_default_/images/vadyus.png"-->
	<link type="image/ico" rel="icon" href="/templates/_default_/images/dobrin/ico.ico">
    <?php $this->printHead(); ?>
    <?php if($inUser->is_admin){ ?>
        <script src="/admin/js/modconfig.js" type="text/javascript"></script>
        <link href="/templates/<?php echo TEMPLATE; ?>/css/modconfig.css" rel="stylesheet" type="text/css" />
    <?php } ?>
<script>
	$(document).ready(function(){
		$('.news-sub-module p img').unwrap();
		$('.module .news_content').wrapAll('<div class="wrap">');
		$('.news-sub-module img').addClass('news_img');
		//$(".news-sub-module img").prependTo(".mod_img");
		$(".filelink a").attr("target", "_blank");
	});
</script>
	<?php 
	cmsCore::loadModel('content');
	$model = new cms_model_content(); 
	$slider = $model->getArticlesList2(true,'18');
	$slider_count = count($slider);
	?>
<script>
	$(document).ready(function(){
		$('#dt_newsslider89').append('<ul id="slider-dots"></ul>');
		for(i = 0; i < "<?= $slider_count ?>"; i++)
			$('#dt_newsslider89 #slider-dots').append('<li class="slider-dot-'+i+' dot"></li>');
		$('li.dot:first-child').addClass('current_dot');
		$('#slider-dots li').bind('click', function(){
			//var current_index = $('#dt_newsslider89 div.active').index();
			//alert(current_index);
			var index = $(this).index();
			$('#dt_newsslider89 div.active').removeClass('active').fadeOut(500);
			$('#dt_newsslider89 div.active').removeClass('active').hide();
			$('#newsslider_slide_89_'+index).fadeIn(500);
			$('#newsslider_slide_89_'+index).addClass('active').show(500);
			//alert(index);
			$('.dot').removeClass('current_dot');
			$('.slider-dot-'+index).addClass('current_dot');
		});
	});
</script>
<script>
	$(document).ready(function(){
		$('.-sub-module p img').unwrap();
	});
</script>
<?php if($_SESSION['lang']) { ?>
<script>
	$(document).ready(function(){
		$('ul#lang li a.current').removeClass('current');
		$('ul#lang li a#<?php echo $_SESSION['lang']; ?>').addClass('current');
	});
</script>
<?php }  else { ?>
<script>
	$(document).ready(function(){
		$('ul#lang li a.current').removeClass('current');
		$('ul#lang li a#ru').addClass('current');
	});
</script>
<?php } ?>
<?php if($_SERVER['REQUEST_URI'] != '/') { ?>
<script>
	$(document).ready(function(){
		$('#topmenu .menu-background').addClass('shadow');
	});
</script>
<?php } ?>
<?php if($_SERVER['REQUEST_URI'] == '/praisy.html') { ?>
<script>
	$(document).ready(function(){
		var p_tags = document.getElementById('price').getElementsByTagName('p').length;
		//alert(p_tags);
		//$('#price p span').unwrap();
		for(i=0; i<p_tags; i+=3)
		{
			//alert(i);
			$('#price p').slice(i, i+3).wrapAll('<div style="display: table-row" class="row"></div>');
		}
		$('#price .row p').css('display', 'table-cell');
	});
</script>
<?php } ?>

</head>
<?php
	/* ===================================HOME=URL========================================================= */
	/* ==================================================================================================== */
	function url() {
		$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != "off") ? "https" : "http";
		return $protocol . "://" . $_SERVER['HTTP_HOST'] . '/';
	}

	define("BASE_URL", url());
?>
<body>
<?php if ($inConf->siteoff && $inUser->is_admin) { ?>
<div style="margin:4px; padding:5px; border:solid 1px red; background:#FFF; position: fixed;opacity: 0.8; z-index:999"><?php echo $_LANG['SITE_IS_DISABLE']; ?></div>
<?php } ?>
    <div id="wrapper" class="inner_wrap">

        <div id="header">
            <div class="container_12">
                <div class="grid_2">
                    <div id="sitename"><a href="/"></a></div>
                </div>
                <div class="grid_10 admin_panel">
                    <?php /* if ($inConf->is_change_lang){

                        $langs = cmsCore::getDirsList('/languages'); ?>
                        <div onclick="$('#langs-select').toggle().toggleClass('active_lang');$(this).toggleClass('active_lang'); return false;" title="<?php echo $_LANG['TEMPLATE_INTERFACE_LANG']; ?>" id="langs" style="background-image:  url(/templates/_default_/images/icons/langs/<?php echo $inConf->lang; ?>.png);">
                            <span>&#9660;</span>
                            <ul id="langs-select">
                                <?php foreach ($langs as $lng) { ?>
                                <li onclick="setLang('<?php echo $lng; ?>'); return false;" style="background-image:  url(/templates/<?php echo TEMPLATE; ?>/images/icons/langs/<?php echo $lng; ?>.png);"><?php echo $lng; ?></li>
                                <?php } ?>
                            </ul>
                        </div>

                    <?php }  */?>
                    <?php if($inUser->is_admin){ $this->printModules('header'); } else { ?>
						<script>
							$(document).ready(function(){
								$('#header').css('display', 'none');
							});
						</script>
					<?php } ?>
                </div>
            </div>
        </div>
		<?php $config = cmsConfig::getDefaultConfig(); ?>
        <div id="page" class="inner_wrap">
            <?php if($mod_count['topmenu']) { ?>
            <div class="container_12" id="topmenu">
                <div class="grid_12 menu-background">
					<div>
						<?php
							$langs = cmsCore::getDirsList('/languages');
							$langs_mas = $langs; //unset($langs_mas[0]); $langs_mas[] = $langs[0]; // перестановка языков в массиве местами
							$langs_mas[1] = $langs_mas[0]; $langs_mas[0] = $langs[1];
						?>
						<ul id="lang">
							<?php foreach($langs_mas as $lang){ ?>
								<li onclick="setLang('<?php echo $lang; ?>'); return false;"><a href="#" id="<?php echo $lang; ?>"><?php echo $lang; ?></a></li>
							<?php } ?>
							<?/*php <li onclick="setLang('ru'); return false;"><a href="#" id="ru">ru</a></li>
							<li onclick="setLang('ua'); return false;"><a href="#" id="ua">ua</a></li>
							<li onclick="setLang('en'); return false;"><a href="#" id="en">en</a></li>*/?>
						</ul>
						
						<?php
							$replace = array('(', ')', ' ', '-');
							$replaced1 = str_replace($replace , '', $config['phone1']);
							$replaced2 = str_replace($replace , '', $config['phone2']);
						?>
						<ul id="phones">
							<li><a href="skype:<?php echo $replaced1; ?>?call"><?php echo htmlspecialchars($config['phone1']); ?></a></li>
							<li><a href="skype:<?php echo $replaced2; ?>?call"><?php echo htmlspecialchars($config['phone2']); ?></a></li>
						</ul>
					</div>
                    <?php $this->printModules('topmenu'); ?>
                </div><?php if($_SESSION['lang']) { $logo = "logo_{$_SESSION['lang']}.png";  } else { $logo = "logo_ru.png"; } ?>
				<?php 
					$text_logo['ru'] = "Изделия из гранита";
					$text_logo['ua'] = "Вироби з граніту";
					$text_logo['en'] = "Products from a granite";
					$text_logo['no_lang'] = "Изделия из гранита";
				?>
				
				<div id="<?php if($_SERVER['REQUEST_URI'] != '/') { ?>logo1<?php } else { ?>logo<?php } ?>"><a href="<?php echo BASE_URL; ?>"><img src="<?php if($_SERVER['REQUEST_URI'] == '/') { echo "templates/".TEMPLATE."/images/dobrin/{$logo}"; } else { echo BASE_URL."templates/".TEMPLATE."/images/dobrin/{$logo}"; } ?>" alt="<?php echo ($config['slogan'] ? $config['slogan'] : $config['sitename']); ?>"/><?php if($_SERVER['REQUEST_URI'] == '/') { echo ($config['slogan'] ? $config['slogan'] : $config['sitename']); } ?></a></div>
            </div>
            <?php } ?>
			
            <?php if ($mod_count['top']){ ?>
            <div class="clear"></div>

            <div id="topwide" class="container_12">
                <div class="grid_12" id="topmod"><?php $this->printModules('top'); ?></div>
            </div>
            <?php } ?>

            <div id="pathway" class="container_12">
                <div class="grid_12"><?php $this->printPathway('&rarr;'); ?></div>
            </div>

            <div class="clear"></div>

            <div id="mainbody" class="container_12">
                <div id="main" class="<?php if ($mod_count['sidebar']) { ?>grid_8<?php } else { ?>grid_12<?php } ?>">
                    <?php $this->printModules('maintop'); ?>
					<?php $messages = cmsCore::getSessionMessages(); ?>
                    <?php if ($messages) { ?>
                    <div class="sess_messages" id="sess_messages">
                        <?php foreach($messages as $message){ ?>
                            <?php echo $message; ?>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <?php if($this->page_body){ ?>
                        <div class="component">
                             <?php $this->printBody(); ?>
                        </div>
                    <?php } ?>
                    <?php $this->printModules('mainbottom'); ?>
                </div>
                <?php if ($mod_count['sidebar']) { ?>
                    <div class="grid_4" id="sidebar"><?php $this->printModules('sidebar'); ?></div>
                <?php } ?>
            </div>

        </div>

    </div>

    <div id="footer">
        <div class="container_12 inner_wrap">
            <div class="grid_8 foot_left">
                <div id="copyright">&copy; <?php echo date('Y'); ?> WEB Studio <a href="http://vadyus.com.ua/" target="_blank">Vadyus</a></div>
			</div>
            <div class="grid_4 foot_right">
                <a href="<?php echo htmlspecialchars($config['google']); ?>" target="_blank" id="google"></a>
                <a href="<?php echo htmlspecialchars($config['facebook']); ?>" target="_blank" id="facebook"></a>
                <a href="<?php echo htmlspecialchars($config['vk']); ?>" target="_blank" id="vk"></a>
            </div>
			<img src="<?php echo BASE_URL ?>templates/_default_/images/dobrin/footer_logo.png" alt="Футер" class="footer_logo"/>
        </div>
    </div>

    <script type="text/javascript">
        $(function(){
            $('#sess_messages').hide().fadeIn();
            $('#topmenu .menu li, #usermenu li').hover(
                function() {
                    $(this).find('ul:first').fadeIn('fast');
                    $(this).find('a:first').addClass("hover");
                },
                function() {
                    $(this).find('ul:first').hide();
                    $(this).find('a:first').removeClass("hover");
                }
            );
        });
    </script>
    <?php if($inConf->debug && $inUser->is_admin){
            $time = $inCore->getGenTime(); ?>
        <div class="debug_info">
            <div class="debug_time">
                <?php echo $_LANG['DEBUG_TIME_GEN_PAGE'].' '.number_format($time, 4).' '.$_LANG['DEBUG_SEC']; ?>
            </div>
            <div class="debug_memory">
                <?php echo $_LANG['DEBUG_MEMORY'].' '.round(@memory_get_usage()/1024/1024, 2).' '.$_LANG['SIZE_MB']; ?>
            </div>
            <div class="debug_query_count">
                <a href="#debug_query_dump" class="ajaxlink" onclick="$('#debug_query_dump').toggle();return false;"><?php echo $_LANG['DEBUG_QUERY_DB'].' '.$inDB->q_count; ?></a>
            </div>
            <div id="debug_query_dump">
                <?php echo $inDB->q_dump; ?>
            </div>
        </div>
    <?php } ?>
</body>
</html>