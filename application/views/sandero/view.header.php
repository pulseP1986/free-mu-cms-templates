<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <meta name="author" content="dmncms.net"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>"/>
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:title" content="<?php echo $this->meta->request_meta_title(); ?>"/>
    <meta property="og:image" content="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cms_logo.png"/>
    <meta property="og:url" content="<?php echo $this->config->base_url; ?>"/>
    <meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:type" content="website">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/swiper.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/fonts.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/dmncms.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/mobile.css" rel="stylesheet">
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
<body>
	<div id="exception"></div>
	<div class="topPanel top-panel">
		<div class="topPanel-wrapper top-panel-block flex-s-c">
			<div class="button-btn buttonDrop" data-class="menuContent">
				<span></span>
				<span></span>
				<span></span>
				</div>
			<div class="topPanel-wrapper_left menuContent flex-c">
				<a href="<?php echo $this->config->base_url; ?>" class="logo-mini bright"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-mini.png" alt="logo"></a>
				
				<ul class="menu flex-c-c">
					<li <?php if($this->request->get_controller() == 'home') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News'); ?></a></li>
					<li <?php if($this->request->get_controller() == 'registration') { echo 'class="active d-lg-none d-xl-none"'; } else { echo 'class="d-lg-none d-xl-none"'; } ?>><a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration'); ?></a></li>
					<li <?php if($this->request->get_controller() == 'downloads') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads'); ?></a></li>
					<li <?php if($this->request->get_controller() == 'rankings') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings'); ?></a></li>
					<li <?php if($this->request->get_controller() == 'shop') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>shop"><?php echo __('Shop'); ?></a></li>
					<li <?php if($this->request->get_controller() == 'guides') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>guides"><?php echo __('Guides'); ?></a></li>
					<li <?php if($this->request->get_controller() == 'about') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About'); ?></a></li>
				</ul>
			</div>
			<div class="topPanel-wrapper_right flex-c">
				<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
				<a href="<?php echo $this->config->base_url; ?>registration" class="sign-in d-none d-sm-block d-md-block d-lg-block d-xml-block"><?php echo __('Sign up');?></a> <span class="d-none d-sm-block d-md-block d-lg-block d-xml-block"><?php echo __('or');?></span>
				<a href="" class="button" onclick="new modal('#signin_modal');return false"><?php echo __('Log In');?></a>
				
				<?php } else { ?>
				<div class="account-block">
					<a href="javascript:;" class="button main-item-account"><?php echo __('Account');?></a>
					<ul class="hidden-block-account account_panel" id="account_panel">
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
				</div>
				
				<?php } ?>
				<div class="lang-block d-block d-sm-block d-md-block d-lg-none d-xml-none">
					<a href="javascript:void(0);" class="main-item"> <img class="img-lang" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/united-states.png" alt=""></a>
					<ul class="hidden-block">
						<?php
							$languages = $this->website->lang_list();
							krsort($languages);
							foreach($languages as $iso => $native){
								if(htmlspecialchars($_COOKIE['dmn_language']) != $iso){
									echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16 main-item"><span style="margin-top: 0px;" class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . '</a></li>' . "\n";
								}
							}
						?>
					</ul>
				</div><!-- lang-block -->
			</div>
		</div><!--topPanel-wrapper-->
	</div><!--topPanel-->
    <div class="wrapper">
		<header>
			<div class="ani stone s1 on"></div>
			<div class="ani stone s2 on"></div>
			<div class="ani stone s3 on"></div>
			<div class="ani stone s4 on"></div>
			<div class="logo">
				<a href="<?php echo $this->config->base_url; ?>" class="bright"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="Logo"></a>
			</div><!--logo-->
			<div class="headerBlock flex-s-c">
				<div class="headerButtons radial">
					<?php	
					foreach($this->website->check_server_status() as $key => $value){
						$block = 'online';
						$color = '#4bcdb6';
						$status = __('Online');
						if($value['image'] == 'off'){
							$block = 'offline';
							$color = '#ed1f24';
							$status = __('Offline');
						}
					?>
					<div class="radial-stat ">
						<div class="circle-online">
							<div class="serverInfo">
                                <span class="serverInfo__name"><?php echo $value['title'];?></span>
                                <span class="serverInfo__<?php echo $block;?>"><?php echo $value['players'];?><br><?php echo $status;?></span>
                                </div>
							<div class="circlestat" data-dimension="124" data-width="3.5" data-fontsize="12" data-percent="<?php echo $value['load'];?>" data-fgcolor="<?php echo $color;?>" data-bgcolor="rgba(192, 209, 7, 0.2)"></div>
						</div><!-- circle-online -->
					</div><!-- radial-stat -->
					<?php } ?>
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
				</div><!--headerButtons-->
				
				<div class="download-buttons flex-s-c">
					<a href="<?php echo $this->config->base_url; ?>downloads" class="h-button download">
						<p><?php echo __('Download');?></p>
					</a>
				</div>	
			</div><!--headerBlock-->
			<!-- animations -->
				<div class="sparks2">
					<div class="spark_11"></div>
					<div class="spark_22"></div>
					<div class="spark_33"></div>
					<div class="spark_44 spark-big2"></div>
					<div class="spark_55 spark-big2"></div>
				</div>
		</header>
		<main class="content">
		<?php if(($this->request->get_controller() == 'home' && $this->request->get_method() != 'index') || $this->request->get_controller() != 'home') { ?>
			<div class="block-widget-2">
			<?php 
			if(isset($guides)){ 
				$this->load->view($this->config->config_entry('main|template') . DS . 'view.left_sidebar', ['guides' => $guides]);
			} else {
				$this->load->view($this->config->config_entry('main|template') . DS . 'view.left_sidebar');
			}
		} 
		?>