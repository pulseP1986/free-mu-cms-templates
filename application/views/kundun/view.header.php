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
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/dmncms.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/mobile-style.css" rel="stylesheet">
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
<body>
	<div id="exception"></div>
	<div class="wrapper">
		<header class="header">
			<div class="header-top">
				<div class="button-btn btn-drop" data-class="topPanel">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="logo-mini-mobile">
					<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/kundun.png" alt="Logo"></a>
				</div>
				<span class="leaves-left-top"></span>
				<span class="leaves-left-bottom"></span>
				<span class="leaves-right-top"></span>
				<span class="leaves-right-bottom"></span>
				<span class="leaves-left-more leaves-left-more_1"></span>
				<span class="leaves-left-more leaves-left-more_2"></span>
				<span class="leaves-left-more leaves-left-more_3"></span>
				<span class="leaves-right-more leaves-right-more_1"></span>
				<span class="leaves-right-more leaves-right-more_2"></span>
				<span class="leaves-right-more leaves-right-more_3"></span>
				<div class="topPanel flex-s-c">
					<div class="topPanel-left flex-c">
						<div class="logo-mini">
							<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/kundun.png" alt="Logo"></a>
						</div>
						<nav class="menu">
							<ul>
								<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
								<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads');?></a></li>
								<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
								<li><a href="<?php echo $this->config->base_url; ?>support"><?php echo __('Support');?></a></li>
								<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
							</ul>
						</nav>
					</div>
					<div class="topPanel-right flex-c">
						<div class="langBlock">
							<?php 
								$languages = $this->website->lang_list(); 
								$currLang = htmlspecialchars($_COOKIE['dmn_language']);
								if(isset($languages[$currLang])){
							?>
							<div class="langBlock-active buttonDrop" data-class="langBlock-drop">
								<span><a href="javascript:void();" title="<?php echo $languages[$currLang];?>" class="f16"><span class="active flag <?php echo strtolower($currLang);?>"></span></a></span>
							</div>
							<?php
								}
							?>	
							<div class="langBlock-drop">
								<ul>
									<?php
										krsort($languages);
										foreach($languages as $iso => $native){
											echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" >' . $native . ' (' . strtoupper($iso) . ')</a></li>';
										}
									?>
								</ul>
							</div>
						</div>
						<div class="lk">
							<?php if (!$this->session->userdata(array('user' => 'logged_in'))){ ?>    
							<a href="#" class="pa button modal-link" data-modal-id="login"><?php echo __('Sign In');?></a>
							<?php } else { ?>
							<a href="#" class="pa button login accPanel"><?php echo __('Personal Area');?></a>
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
					</div>
				</div><!--topPanel-->
			</div>
			<div class="logo">
				<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="Logo"></a>
			</div>
			<div class="header-flex">
				<div class="sonline">
					<?php echo __('online');?>
					<span><?php echo $this->website->total_online()['online'];?></span>
				</div>
				<div class="time-server">
					<span><?php echo __('Time Server');?></span>
					<div class="time-node" id="ServerTime"></div>
				</div>
			</div>
			<div class="sg">
				<a href="<?php echo $this->config->base_url; ?>registration" class="sg-button bright" data-modal-id="login"><?php echo __('Start Game');?></a>
			</div>
		</header>
		<main class="main">