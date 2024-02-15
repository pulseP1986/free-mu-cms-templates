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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.min.css" type="text/css"/>
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/slick.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/dmncms.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style-mobile.css" rel="stylesheet">
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
	$class = ['header-page', 'main-page'];
	if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
		$class = ['', ''];
	}
?>
<body>
	<div id="exception"></div>
	<div class="topPanel">
		<div class="btn-button btn-drop mobile-block" data-class="topPanel-wrapper">
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="small-logo-mobile mobile-block">
			<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-small.png" alt="Small Logo"></a>
		</div>
		<div class="topPanel-wrapper flex-s-c">
			<div class="topPanel-wrapper_l flex-c">
				<div class="small-logo">
					<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-small.png" alt="Small Logo"></a>
				</div>
				<nav>
					<ul class="menu">
						<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>support"><?php echo __('Support');?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
					</ul>
				</nav>
				<div class="discordBlock">
					<a href="#" class="discord bright"></a>
				</div>
			</div>
			<div class="topPanel-wrapper_r flex-c">
				<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
					<div class="profileButtons">
						<a href="javascript: void(0);" class="modal-link button small-button" data-modal-id="login"><?php echo __('Login');?></a>
						<a href="<?php echo $this->config->base_url; ?>registration" class="reg"><?php echo __('Registration');?></a>
					</div>
				<?php } else { ?>
					<div class="profile">
					<div class="profileAva">
						<span><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/ava-profile.png" alt="Ava"></span>
					</div>
					<div class="profileBlock">
						<div class="profileBlock-top">
							<div class="nickname"><?php echo $this->session->userdata(['user' => 'username']);?></div> <a href="javascript:;" class="login accPanel"><?php echo __('Account Panel');?></a>
							<ul class="hidden-block account_panel" id="account_panel">
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
						<?php
							$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
							$credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
						?>
						<div class="profileBlock-bottom">
							<div class="dream b-block"><?php echo $this->website->translate_credits(1, $this->session->userdata(['user' => 'server'])); ?>: <span class="sch" id="my_currency_1"><?php echo number_format($credits['credits']); ?></span></div>
							<div class="zen b-block"><?php echo $this->website->translate_credits(2, $this->session->userdata(['user' => 'server'])); ?>: <span class="sch" id="my_currency_2"><?php echo number_format($credits2['credits']); ?></span></div>
							<span class="exit"></span>
						</div>
					</div>
				</div><!--profile-->
					
				<?php } ?>	
			</div>
		</div>
	</div><!--topPanel-->
	<header class="header <?php echo $class[0];?>">
		<div class="container">
			<div class="logo">
				<a href="<?php echo $this->config->base_url; ?>" class="bright"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="Logo"></a>
			</div><!--logo-->
			<div class="server flex-c">
				<?php
				$s = 1;
				foreach($this->website->check_server_status() as $key => $value){
					if($value['visible'] == 1){
				?>	
				<div class="serverBlock serverBlock_<?php echo $s;?>">
					<div class="serverBlock-name"><?php echo $value['title']; ?></div>
					<div class="serverBlock-online"><?php echo $value['players']; ?></div>
					<div class="serverBlock-rate"><?php echo $value['status_with_style']; ?></div>
				</div>
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
			</div>
			<div class="start-button">
				<a href="<?php echo $this->config->base_url; ?>downloads" class="button"><span><?php echo __('Start Game');?></span></a>
			</div>	
		</div>
	</header>
	<main class="main <?php echo $class[1];?>">