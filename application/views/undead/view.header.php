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
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
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
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-3.5.1.min.js"></script>
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
	$bodyClass = ' class="page-body"';
	if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
		$bodyClass = '';
	}
?>
<body<?php echo $bodyClass;?>>
	<div id="exception"></div>
	<header class="header">
		<div class="header-wrapper">
			<div class="burger-menu btn-drop" data-class="header-wrapper-menu_h">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="header-wrapper-menu_h">
				<div class="header-wrapper-menu">
					<div class="header-wrapper_left">
						<ul class="header-menu" style="margin-right:20px;">
							<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads');?></a></li>
						</ul>
					</div>
					<div class="header-wrapper_right">
						<ul class="header-menu" style="margin-left:20px;">
							<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
							<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><?php echo __('Info');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo __('Rules');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="header-wrapper_right-flex">
				<div class="langBlock">
					<?php 
						$languages = $this->website->lang_list(); 
						$currLang = htmlspecialchars($_COOKIE['dmn_language']);
						if(isset($languages[$currLang])){
					?>
						<div class="langBlock-active buttonDrop f16" data-class="langBlock-select">
							<span class="flag <?php echo strtolower($currLang);?>"></span></i> <?php echo $languages[$currLang];?>
						</div>
					<?php
						unset($languages[$currLang]);
						}
					?>	
					<div class="langBlock-select">
						<ul>
						<?php
							krsort($languages);
							foreach($languages as $iso => $native){
								echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16"><span class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . ' (' . strtoupper($iso) . ')</a></li>';
							}
						?>
						</ul>
					</div>
				</div>
				<div class="lkBlock">
					<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
					<div class="lkBlock-login">
						<a href="<?php echo $this->config->base_url; ?>login" class="button"><?php echo __('Login');?></a>
					</div>
					<?php } else { ?>
					<div class="panel">
						<div class="panel-active buttonDrop flex-c" data-class="panel-dropdown">
							<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/ava.png" alt="">
							<?php echo __('Panel');?>
						</div>
						<div class="panel-dropdown">
							<div class="panel-dropdown_title">
								<a href="" data-modal-div="select_server"><?php echo $this->session->userdata(['user' => 'server_t']); ?></a>
							</div>
							<div class="panel-dropdown_my">
								<?php
									$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
									$credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
								?>
								<div class="panel-dropdown_my-block">
									<?php echo $this->website->translate_credits(1, $this->session->userdata(['user' => 'server'])); ?>: <span><?php echo number_format($credits['credits']); ?></span>
								</div>
								<div class="panel-dropdown_my-block">
									<?php echo $this->website->translate_credits(2, $this->session->userdata(['user' => 'server'])); ?>: <span><?php echo number_format($credits2['credits']); ?></span>
								</div>
								<?php
								if($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1){
									$wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
								?>
								<div class="panel-dropdown_my-block">
									<?php echo __('WCoins'); ?>: <span><?php echo number_format($wcoin); ?></span>
								</div>
								<?php } ?>
							</div>
							<ul class="panel-dropdown_list">
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
							</ul>
							<div class="panel-dropdown_button">
								<a href="<?php echo $this->config->base_url; ?>logout" class="button"><?php echo __('Logout'); ?></a>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>
	<div class="radial-stat">
		<div class="circle-online">
			<div class="serverInfo">
				<span class="serverInfo__name"><?php echo __('online');?></span>
				<span class="serverInfo__x">
					<?php 
					$online = $this->website->total_online(60); 
					echo $online['online'];
					?>
				</span>
			</div>
			<div class="circlestat" data-dimension="125" data-width="4" data-fontsize="12" data-percent="<?php echo $online['percentage']; ?>" data-fgcolor="#bee61f" data-bgcolor="#201f1f"></div>
		</div><!-- circle-online -->
	</div><!-- radial-stat -->
	<div class="containerWeb">
		<div class="logo">
			<a href="<?php echo $this->config->base_url; ?>" class="bright"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="Logo"></a>
		</div>
		<div class="topButtons">
			<div class="row">
				<div class="col">
					<a href="<?php echo $this->config->base_url; ?>registration" class="top-button top-reg">
						<span><?php echo __('Registration');?></span>	<?php echo __('let’s do it!  righit now!');?>
					</a>
				</div>
				<div class="col">
					<a href="<?php echo $this->config->base_url; ?>downloads" class="top-button top-download">
						<span><?php echo __('Download');?></span>	<?php echo __('complete version');?>
					</a>
				</div>
			</div>
		</div>
	</div>
	<span class="clouds"></span>
	<main class="main">
		<div class="containerWeb">