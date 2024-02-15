<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <meta name="author" content="https://dmncms.net"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Teko:300,400,500,600,700&amp;display=swap">
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/fonts/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/fonts/simple-line-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" rel="stylesheet">
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
<body>
	<div id="nav1" class="nav1"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/webzen.png">
        <div class="dropdown float-right" style="padding-top: 2px;height: 100%;">
			<a class="btn btn-primary user-button" aria-expanded="false" data-toggle="dropdown" role="button" id="normalbutton">
				<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/user-icon.png" style="width: 17px;padding-top: 0px;margin-top: -3px;">&nbsp; &nbsp;<?php echo __('My Account');?>&nbsp; &nbsp;&nbsp;<i class="icon-arrow-down" style="font-size: 10px;color: rgb(231,39,39);"></i>
			</a>
			<?php if($this->session->userdata(['user' => 'logged_in'])){ ?>
			<div class="dropdown-menu user-dropdown">
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
			</div>
			<?php } else { ?>
			<div class="dropdown-menu user-dropdown">
				<div class="dropdown-item user-dropdown-item">
					<a href="<?php echo $this->config->base_url; ?>login" class="btn btn-primary" role="button" id="normalbutton2" style="width: 100%;margin-top: 0px;background: rgb(166,37,29);border-style: none;height: 50px;border-radius: 2px;padding-top: 11px;"><?php echo __('Login');?></a>
				</div>
				<div class="dropdown-item user-dropdown-item">
					<a href="<?php echo $this->config->base_url; ?>registration" class="btn btn-primary" role="button" id="normalbutton2" style="width: 100%;margin-top: 0px;background: rgba(166,37,29,0);border: 1px solid rgb(171,42,42) !important;color: rgb(204,45,45);height: 50px;padding-top: 11px;border-radius: 2px;"><?php echo __('Create Account');?></a>
				</div>
			</div>
			<?php } ?>
		</div>
    </div>
	<nav class="navbar navbar-dark navbar-expand-xl sticky-top" style="background: rgba(0,0,0,0.85);padding-left: 14px;padding-bottom: 12px;padding-right: 0px;padding-top: 14px;margin-right: 0px;height: 86px;">
        <div class="container-fluid"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2" style="padding-top: 14px;padding-bottom: 14px;border-radius: 9px;padding-right: 17px;padding-left: 17px;"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2" style="width: 100%;margin: 0px;margin-right: 0px;margin-left: 0px;">
                <ul class="navbar-nav" style="width: 100%;">
                    <li class="nav-item" style="margin-right: 55px;"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/L-icon.png" style="margin-top: 6px;"></li>
                    <li class="nav-item"><a class="nav-link active" href="<?php echo $this->config->base_url; ?>" style="font-family: Teko, sans-serif;font-size: 24px;width: 100%;height: 100%;margin-right: 55px;"><?php echo __('News');?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $this->config->base_url; ?>rankings" style="font-family: Teko, sans-serif;font-size: 24px;width: 100%;height: 100%;margin-right: 55px;"><?php echo __('Rankings');?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $this->config->base_url; ?>shop" style="font-family: Teko, sans-serif;font-size: 24px;width: 100%;height: 100%;margin-right: 55px;"><?php echo __('Shop');?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $this->config->config_entry('main|forum_url'); ?>" style="font-family: Teko, sans-serif;font-size: 24px;width: 100%;height: 100%;margin-right: 55px;"><?php echo __('Forum');?></a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo $this->config->base_url; ?>about" style="font-family: Teko, sans-serif;font-size: 24px;width: 100%;height: 100%;margin-right: 55px;"><?php echo __('About');?></a></li>
                </ul>
            </div>
            <ul class="navbar-nav" style="margin-right: 14px;">
                <li class="nav-item text-center d-flex flex-grow-1" style="width: 100%;height: 100%;margin-right: 0px;margin-left: 0px;">
                    <div style="width: 90px;padding-top: 16px;"></div>
                    <div style="width: 60px;height: 100%;margin-right: 10px;"><a href="<?php echo $this->config->base_url; ?>downloads" class="btn" role="button" id="playbutton" style="margin-top: 0px;padding-bottom: 14px;padding-top: 14px;padding-left: 17px;padding-right: 17px;border-radius: 9px;border: 1px solid rgba(255,255,255,0.1) ;color: rgba(255,255,255,.5);"><i class="fas fa-download" aria-hidden="true"></i></a></div>
                  </li>
            </ul>
        </div>
    </nav>
