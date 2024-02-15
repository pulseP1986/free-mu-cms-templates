<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <meta name="author" content="https://dmncms.net"/>
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
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-2.1.4.min.js"></script>
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
	$bodyClass = 'content side-page';
	if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
		$bodyClass = 'content';
	}
?>
<body>
	<div id="exception"></div>
	<div class="wrapper-bg">
		<div class="wrapper">	
			<header class="header">
				<div class="top-panel-block flex-s-c">
					<div class="button-btn buttonDrop" data-class="menuContent">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<div class="menuContent">
						<ul class="menu flex-c-c">
							<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>media/wallpapers"><?php echo __('Media');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
							<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><?php echo __('Forum');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
						</ul>
					</div>
					<div class="top-panel_right flex-c">
						<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?><a href="<?php echo $this->config->base_url; ?>registration" class="sign-in"><?php echo __('Sign Up');?></a><span><?php echo __('or');?></span><?php } ?>
						<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
							<a href="<?php echo $this->config->base_url; ?>account-panel/login" class="button"><?php echo __('Login');?></a>
						<?php } else { ?>
							<a href="javascript:;" class="button accPanel"><?php echo __('Account');?></a>
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
					<div class="logo">
						<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-1.png" alt=""></a>
					</div>
				</div><!--topPanel-->
				<div class="animations"> 
					<div class="ray"></div>
					<div class="rainbow"></div>
				</div>
				<div class="highlight-highlight">
					<div class="highlight">
						<div class="highlight-3"></div>
						<div class="highlight-4"></div>
					</div>
				</div>
				<div class="sparks sparks_2">
					<div class="spark_1"></div>
					<div class="spark_2"></div>
					<div class="spark_3"></div>
					<div class="spark_4 spark-big"></div>
					<div class="spark_5 spark-big"></div>
				</div>
			</header>	
			
			<main class="<?php echo $bodyClass;?>">
				<?php if($bodyClass == 'content'){ ?>
				<div class="server flex-s-c">
					<?php
					foreach($this->website->check_server_status() as $key => $value){
						if($value['visible'] == 1){
					?>
					<div class="server-1">
						<div class="server-title"><?php echo $value['title']; ?></div>
						<div class="server-progress"><span style="max-width: <?php echo $value['load']; ?>%;"></span></div>
						<div class="server-online"><?php echo __('Online');?>: <span><?php echo $value['players']; ?></span></div>
					</div>
					<?php 
						}
					} 
					?>
					<div class="server-1">
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
					</div>
				</div>
				<div class="fast-button flex-s-c">
					<div class="download-block fast-link">
						<a href="<?php echo $this->config->base_url; ?>downloads"><span>DOWNLOAD</span><br><p>Game client</p></a>
					</div>
					<div class="donation-block fast-link">
						<a href="<?php echo $this->config->base_url; ?>donate"><span>Donation</span><br><p>more golds</p></a>
					</div>
					<div class="registration-block fast-link">
						<a href="<?php echo $this->config->base_url; ?>registration"><span>REGISTRATION</span><br><p>join to us</p></a>
					</div>
				</div>
				<?php } ?>
