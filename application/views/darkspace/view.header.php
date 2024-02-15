<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="neo6 - Salvis87@inbox.lv" />
	<meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>" />
	<meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>" />
	<meta property="og:title" content="<?php echo $this->meta->request_meta_title(); ?>" />
	<meta property="og:image" content="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cms_logo.png"/>
	<meta property="og:url" content="<?php echo $this->config->base_url; ?>" />
	<meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>" />
	<meta property="og:type" content="website">
	<title><?php echo $this->meta->request_meta_title(); ?></title>
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/swiper.min.css" rel="stylesheet">
  <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style-mobile.css" rel="stylesheet">
  <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-1.8.3.min.js"></script>
  <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>	
</head>
<body>
	<div class="topPanel">
		<div class="topPanel-wrapper flex-s-c">
			<div class="btn buttonDrop" data-class="topMenu">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="topMenu">
				<ul class="menu">
					<li class="active"><a href="<?php echo $this->config->base_url; ?>home"><?php echo _('News'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo _('Registration'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo _('Files'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo _('Rankings'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>guides"><?php echo _('Guides'); ?></a></li>
					<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><?php echo _('Forum'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo _('About'); ?></a></li>
				</ul><!--menu-->
			</div>
		</div>
	</div>
    <div class="wrapper_web">
        <header class="header_web">
			<?php if (strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
					<div class="countdown-block">
						<div id="timer_div_title"><?php echo $this->config->config_entry("main|grand_open_timer_text"); ?></div>
						<div id="timer_div_time">
							<div class="timmer_inner_block">
								<div class="title"><?php echo _('Days'); ?></div>
								<div id="days" class="count"></div>
							</div>
							<div class="timmer_inner_block">
								<div class="title"><?php echo _('Hours'); ?></div>
								<div id="hours" class="count"></div>
							</div>
							<div class="timmer_inner_block">
								<div class="title"><?php echo _('Minutes'); ?></div>
								<div id="minutes" class="count"></div>
							</div>
							<div class="timmer_inner_block">
								<div class="title"><?php echo _('Seconds'); ?></div>
								<div id="seconds" class="count"></div>
							</div>
						</div>
					</div>
				<?php endif; ?>
				<div class="logo">
						<a href="<?php echo $this->config->base_url; ?>home"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt=""></a>
				</div>
				<div class="smog">
						<i class="num1"></i>
						<i class="num2"></i>
						<i class="num3"></i>
				</div>
				<div class="sparks sparks_1">
					<div class="spark_1"></div>
					<div class="spark_2"></div>
					<div class="spark_3"></div>
					<div class="spark_4 spark-big"></div>
					<div class="spark_5 spark-big"></div>
				</div>
				<div class="sparks sparks_2">
					<div class="spark_1"></div>
					<div class="spark_2"></div>
					<div class="spark_3"></div>
					<div class="spark_4 spark-big"></div>
					<div class="spark_5 spark-big"></div>
				</div>
        </header>
        <!-- .header-->
        <div class="container_web">
            <?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.left_sidebar'); ?>
            <main class="content">
							<div class="swiper-container">
								<div class="swiper-wrapper">
									<div class="swiper-slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img.jpg);">
										<a href="" class="slide-more button button-small">more</a>
									</div>
									<div class="swiper-slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img.jpg);">
										<a href="" class="slide-more button button-small">more</a>
									</div>
									<div class="swiper-slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img.jpg);">
										<a href="" class="slide-more button button-small">more</a>
									</div>
								</div>
								<!-- Add Arrows -->
								<div class="swiper-button-next"></div>
								<div class="swiper-button-prev"></div>
								<!-- Add Pagination -->
								<div class="swiper-pagination"></div>
							</div><!--swiper-container-->
                <section class="content-wrapper">
                    <div class="row">
                        <div class="col-sm-12">