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
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style-mobile.css" type="text/css"/>
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/swiper.min.css" rel="stylesheet">
	<link href="https://allfont.ru/allfont.css?fonts=cinzel-decorative-bold" rel="stylesheet" type="text/css" />
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/slick-theme.css" rel="stylesheet">
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
<body>
	<div id="exception"></div>
	<div class="smoke"></div>
	<div class="top-panel">
		<div class="top-panel-block flex-c-c">
			<div class="logo-icon">
                <a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-icon.png" alt=""></a>
            </div>
			<div class="button-btn buttonDrop" data-class="menuContent">
                <span></span>
                <span></span>
                <span></span>
            </div>
			<div class="menuContent">
				<ul class="menu flex-c-c">
					<li class="active"><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo __('Shop'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>guides"><?php echo __('Guides'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About'); ?></a></li>
				</ul>
			</div>
			<div class="top_panel-right flex">
				<div class="top_panel-soc-block flex-c-c">
                    <a href="" class="fb"></a>
                    <a href="" class="tw"></a>
                    <a href="" class="twch"></a>
                    <a href="" class="yt"></a>
                </div>
				<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
				<div class="topPanel-wrapper_right flex-c">
					<a href="<?php echo $this->config->base_url; ?>registration" class="sign-in"><?php echo __('Sign up');?></a> <span><?php echo __('or');?></span>
					<a href="" class="button" onclick="new modal('#signin_modal');return false"><?php echo __('Log In');?></a>
				</div>
				<?php } else { ?>
				 <div class="log-in flex-s-c">
                    <ul class="menulog-in flex-s-c" >
                        <li class="log-in-menu-1">
                            <a href="javascript:void(0);" class="main-item-log-in"><?php echo __('Account');?></a>
                            <ul class="hidden-block-log-in">
                                <div class="icon-login-big flex-s-c">
                                    <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icon-login.jpg" alt="">
                                    <p class="icon-text"><?php echo $this->session->userdata(['user' => 'username']);?><br><span><?php echo $this->session->userdata(['user' => 'email']);?></span></p>
                                </div>
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
                                <a href="<?php echo $this->config->base_url; ?>logout" class="log-out"><?php echo __('Logout'); ?></a>
                            </ul>
                        </li>
                    <ul>
                    <div class="icon-log-in"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icon-login.jpg" alt=""></div>
                </div>
				<?php } ?>
			</div>
		</div>
	</div><!--topPanel-->
    <div class="wrapper">
		<header class="header flex-s">
			<div class="logo">
				<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-1.png" alt=""></a>
            </div>
			<div class="server-time"><?php echo __('Server Time');?> <span id="ServerTime"></span></div>
            <div class="sparks sparks_2">
                <div class="spark_1"></div>
                <div class="spark_2"></div>
                <div class="spark_3"></div>
                <div class="spark_4 spark-big"></div>
                <div class="spark_5 spark-big"></div>
            </div>
            <div class="ray"></div>	
		</header>
		<main class="content">
			<div class="fast-button flex-s">
                <a href="<?php echo $this->config->base_url; ?>downloads" class="btn-download"><span><?php echo __('Game client');?></span></a>
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
                <div class="status-block">
					<?php	
					$i = 1;
					foreach($this->website->check_server_status() as $key => $value){
						$block = 'online';
						$color = '#bbcb08';
						$bg = 'rgba(192, 209, 7, 0.2)';
						$status = __('Online');
						if($value['image'] == 'off'){
							$block = 'offline';
							$color = '#e22024';
							$bg = 'rgba(226, 32, 36, 0.2)';
							$status = __('Offline');
						}
					?>
					<div class="server-<?php echo $i;?> flex-c-c">
					<div class="radial-stat">
						<div class="circle-online">
							<div class="serverInfo">
                                <span class="serverInfo__name"><?php echo $value['title'];?></span>
                                <span class="serverInfo__<?php echo $block;?>"><?php echo $value['players'];?><br><span class="serverInfo__i"><?php echo $status;?></span></span>
                                </div>
							<div class="circlestat" data-dimension="120" data-width="3.5" data-fontsize="12" data-percent="<?php echo $value['load'];?>" data-fgcolor="<?php echo $color;?>" data-bgcolor="<?php echo $bg;?>"></div>
						</div>
					</div>
					</div>
					<?php 
						$i++;
					} 
					?>
                </div>
            </div>
			<?php if(($this->request->get_controller() == 'home' && $this->request->get_method() != 'index') || $this->request->get_controller() != 'home') { ?>
				<div class="widgets_news flex-s">
				<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.left_sidebar'); ?>
			<?php } ?>