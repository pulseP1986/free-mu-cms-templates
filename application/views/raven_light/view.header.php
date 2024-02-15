<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <meta name="author" content="https://dmncms.net"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>"/>
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:title" content="<?php echo $this->meta->request_meta_title(); ?>"/>
    <meta property="og:image" content="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cms_logo.png"/>
    <meta property="og:url" content="<?php echo $this->config->base_url; ?>"/>
    <meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:type" content="website">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.min.css" type="text/css"/>
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/slick.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/mobile-style.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/dmncms.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/default_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <?php
        if(isset($css)):
            foreach($css as $style):
                echo $style;
            endforeach;
        endif;
    ?>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
    <?php
        if(isset($scripts)):
            foreach($scripts as $script):
                echo $script;
            endforeach;
        endif;
    ?>
</head>
<?php
	$bodyClass = ' class="body-page"';
	if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
		$bodyClass = '';
	}
?>
<body<?php echo $bodyClass;?>>
	<div id="exception"></div>
	<div class="topPanel flex-s-c">
		<div class="btn-mobile btn-drop" data-class="topPanel-left">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="topPanel-left flex-c">
			<div class="logoMini flex-c-c"><a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-mini.png" alt="Logo"></a></div>
			<ul class="menu flex-c">
				<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>media/wallpapers"><?php echo __('Media');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
				<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><?php echo __('Forum');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
			</ul>
		</div>
		<div class="topPanel-right flex-c">
			<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?><a href="<?php echo $this->config->base_url; ?>registration" class="sign-up"><?php echo __('Sign Up');?></a><?php } ?>
			<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
				<a href="#login" class="button button-small login open_modal"><?php echo __('Login');?></a>
			<?php } else { ?>
				<a href="javascript:;" class="button button-small login accPanel"><?php echo __('Account');?></a>
				<ul class="hidden-block account_panel" id="account_panel">
					<?php
						$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
						$credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
					?>
					<div class="acp-coins">
						<span class="coins-title" id="my_currency_1"><?php echo $this->website->translate_credits(1, $this->session->userdata(['user' => 'server'])); ?></span>
						<span class="coins"><?php echo number_format($credits['credits']); ?></span>
					</div>
					<div style="clear:both;"></div>
					<div class="acp-coins">
						<span class="coins-title" id="my_currency_2"><?php echo $this->website->translate_credits(2, $this->session->userdata(['user' => 'server'])); ?></span>
						<span class="coins"><?php echo number_format($credits2['credits']); ?></span>
					</div>
					<div style="clear:both;"></div>
					<?php
					if($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1){
						$wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
					?>
					<div class="acp-coins">
						<span class="coins-title" id="my_currency_3"><?php echo __('WCoins'); ?></span>
						<span class="coins"><?php echo number_format($wcoin); ?></span>
					</div>
					<div style="clear:both;"></div>
					<?php } ?>
					<li><a href="" data-modal-div="select_server"><?php echo __('Server'); ?>: <span><?php echo $this->session->userdata(['user' => 'server_t']); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo __('Account Panel'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo __('Buy Credits'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo __('Shop'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo __('My Cart'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo __('Warehouse'); ?></a></li> 						
					<li><a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo __('Account Logs'); ?></a></li>
					<?php
						$plugins = $this->config->plugins();
						if(!empty($plugins)){
							if(array_key_exists('merchant', $plugins)){
								if($this->session->userdata(['user' => 'is_merchant']) != 1){
									unset($plugins['merchant']);
								}
							}

							foreach($plugins AS $key => $plugin){
								if($plugin['installed'] == 1 && $plugin['sidebar_user_item'] == 1){
									if(mb_substr($plugin['module_url'], 0, 4) !== "http"){
										$plugin['module_url'] = $this->config->base_url . $plugin['module_url'];
									}
					?>
					<li><a href="<?php echo $plugin['module_url']; ?>"><?php echo __($plugin['about']['name']); ?></a></li>
					<?php
								}
							}
						}
					?>
					<li><a href="<?php echo $this->config->base_url; ?>logout"><?php echo __('Logout'); ?></a></li>
				</ul>
			<?php } ?>	
		</div>
	</div><!--topPanel-->
	<div class="container">
		<header class="header">
			<div class="sparks">
				<div class="spark_1"></div>
				<div class="spark_2"></div>
				<div class="spark_3"></div>
				<div class="spark_4 spark-big"></div>
			</div>
			<div class="logo">
				<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="Logo"></a>
			</div><!--logo-->
			<div class="online flex-c">
				<?php
				$s = 0;
				foreach($this->website->check_server_status() as $key => $value){
					if($value['visible'] == 1){
						$class = ($s % 2) ? 'blue' : 'green';
				?>		
				<div class="onlineBlock onlineBlock-<?php echo $class;?>">
					<div class="oBlock">
						<div class="online-text">
							<?php echo $value['players']; ?>
						</div>
						<div class="online-rait">
							<?php echo $value['title']; ?>
						</div>
					</div>
					<div class="circle">
						<div class="circlestat" data-dimension="205" data-width="10" data-fontsize="12" data-percent="<?php echo round($value['load']/2); ?>" data-fgcolor="#50ebcc" data-bgcolor="rgba(0, 0, 0, 0.3)"></div>
					</div>
				</div><!--onlineBlock-->
				<?php 
						$s++;
					}
				} 
				?>	
				<?php if(strtotime($this->config->config_entry("main|grand_open_timer")) >= time()){ ?>
				<div id="timers">
						<div id="timer_div_title"><?php echo $this->config->config_entry("main|grand_open_timer_text"); ?></div>
						<div id="timer_div_time">
								<div class="timmer_inner_block">
										<div class="title"><?php echo __('Days'); ?></div>
										<div id="days" class="count"></div>
								</div>
								<div class="timmer_inner_block">
										<div class="title"><?php echo __('Hours'); ?></div>
										<div id="hours" class="count"></div>
								</div>
								<div class="timmer_inner_block">
										<div class="title"><?php echo __('Minutes'); ?></div>
										<div id="minutes" class="count"></div>
								</div>
								<div class="timmer_inner_block">
										<div class="title"><?php echo __('Seconds'); ?></div>
										<div id="seconds" class="count"></div>
								</div>
						</div>
				</div>
				<?php } ?>	
			</div><!--online-->
			<?php if($bodyClass == ''){ ?>
			<div class="headerInfo flex-s">
				<div class="headerSlider flex">
					<div class="header-slider">
						<div class="slide">
							<div class="slide-img">
								<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img.jpg" alt="">
							</div>
							<div class="slideText">
								<a href="#" target="_blank" class="slidePlay"></a>
								<div class="slideText-title">
									NEW REALITY
								</div>
								<div class="slideText-text">
									Beautiful isometric fantasy MMORPG Game. More and more servers are opening every day!
								</div>
							</div>
						</div>
						<div class="slide">
							<div class="slide-img">
								<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img.jpg" alt="">
							</div>
							<div class="slideText">
								<a href="#" target="_blank" class="slidePlay"></a>
								<div class="slideText-title">
									NEW REALITY
								</div>
								<div class="slideText-text">
									Beautiful isometric fantasy MMORPG Game. More and more servers are opening every day!
								</div>
							</div>
						</div>
						<div class="slide">
							<div class="slide-img">
								<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img.jpg" alt="">
							</div>
							<div class="slideText">
								<a href="#" target="_blank" class="slidePlay"></a>
								<div class="slideText-title">
									NEW REALITY
								</div>
								<div class="slideText-text">
									Beautiful isometric fantasy MMORPG Game. More and more servers are opening every day!
								</div>
							</div>
						</div>
						<div class="slide">
							<div class="slide-img">
								<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-img.jpg" alt="">
							</div>
							<div class="slideText">
								<a href="#" target="_blank" class="slidePlay"></a>
								<div class="slideText-title">
									NEW REALITY
								</div>
								<div class="slideText-text">
									Beautiful isometric fantasy MMORPG Game. More and more servers are opening every day!
								</div>
							</div>
						</div>
					</div>
					<div class="headerSoc">
						<a href="#" target="_blank" class="headerSoc-block">
							<i class="socIcon f-socIcon"></i>
						</a>
						<a href="#" target="_blank" class="headerSoc-block">
							<i class="socIcon d-socIcon"></i>
						</a>
						<a href="#" target="_blank" class="headerSoc-block">
							<i class="socIcon y-socIcon"></i>
						</a>
					</div>
				</div>
				<div class="game">
					<div class="gameClient">
						<div class="gameClient-title">
							<?php echo __('GAME CLIENT');?>
						</div>
						<div class="gameClient-button">
							<a href="<?php echo $this->config->base_url; ?>downloads" class="button button-green"><?php echo __('Download');?> 1.64 Gb</a>
						</div>
						
					</div>
					<div class="gamePl flex-c-c">
						<a href="<?php echo $this->config->base_url; ?>downloads" class="download-pl download-pl-windows"><?php echo __('Windows');?></a>
					</div>
				</div>
			</div>
			<?php } ?>
		</header>
	<?php if($bodyClass != ''){ ?>
	</div>
	<?php } ?>