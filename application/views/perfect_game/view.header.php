<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <meta name="author" content="dmncms.net"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>"/>
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:title" content="<?php echo $this->meta->request_meta_title(); ?>"/>
    <meta property="og:image" content="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cms_logo.png"/>
    <meta property="og:url" content="<?php echo $this->config->base_url; ?>"/>
    <meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:type" content="website">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css" type="text/css"/>
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
	<header>
		<div class="top-panel">
			<div class="container flex-s-c">
				<a href="<?php echo $this->config->base_url; ?>" class="logo bright">
					<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="">
				</a>
				<div class="button-btn buttonDrop" data-class="main-menu">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<nav class="main-menu flex">
					<li class="active">
						<a href="<?php echo $this->config->base_url; ?>" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a>
					</li>
					<li>
						<a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a>
					</li>
					<li>
						<a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a>
					</li>
					<li>
						<a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" title="<?php echo __('Forum'); ?>" target="_blank"><?php echo __('Forum'); ?></a>
					</li>
					<li>
						<a href="<?php echo $this->config->base_url; ?>shop" title="<?php echo __('Shop'); ?>"><?php echo __('Shop'); ?></a>
					</li>
					<li>
						<a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a>
					</li>
					<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
					<a href="#login" class="btnw user-account-btn-mobile"><?php echo __('Login');?></a>
					<?php } else { ?>
						<div class="account-block">
						<a href="javascript:;" class="btnw user-account-btn-mobile main-item-account"><?php echo __('Account');?></a>
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
				</nav>
				<div class="select-lang">
					<div class="lang-block">
						<a href="javascript:void(0);" class="main-item"><img class="img-lang" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/lang-icon.png" alt=""></a>
						<ul class="hidden-block">
							<?php
								$languages = $this->website->lang_list();
								krsort($languages);
								foreach($languages as $iso => $native){
									if(htmlspecialchars($_COOKIE['dmn_language']) != $iso){
										echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16"><span class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . ' (' . strtoupper($iso) . ')</a></li>' . "\n";
									}
								}
							?>
						</ul>
					</div>
				</div>
				<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
					<a href="#login" class="btnw user-account-btn open_modal"><?php echo __('Login');?></a>
				<?php } else { ?>
					<div class="account-block">
					<a href="javascript:;" class="btnw user-account-btn main-item-account"><?php echo __('Account');?></a>
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
			</div>
		</div>
		<div class="intro">
			<div class="container flex">
				<h1>
					IT'S TIME <br>
					<p>FOR THE <span>WINNERS</span></p>
				</h1>
				<p>
					There has been a lot of talk about some legacy servers lately.
					While this may be news to some.
					There has been a lot of talk and hype legacy servers lately.
				</p>
				<a href="<?php echo $this->config->base_url; ?>downloads" class="btnw start-game-btn">Start Game</a>
			</div>
		</div>
		<div class="periy">
			<div class="ani stone s1 on"></div>
			<div class="ani stone s2 on"></div>
			<div class="ani stone s3 on"></div>
		</div>
	</header>
	<main>
		<div class="container">
			<section class="games flex-s-c">
				<?php	
					$i = 1;
					foreach($this->website->check_server_status() as $key => $value){
						$status = __('Online');
						if($value['image'] == 'off'){
							$status = __('Offline');
						}
				?>
					<div class="game flex">
						<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/game-icon-<?php echo $i;?>.png" alt="">
						<div class="game-info">
							<h3 class="title-game">
								<?php echo $value['title'];?> <span class="x"><?php echo $status;?></span>
							</h3>
							<p class="players-in-game">
								<?php echo __('Players in game');?>: <span class="players-amount"><?php echo $value['players'];?></span>
							</p>
						</div>
					</div>
				<?php 
						if($i >= 3){
							$i = 1;
						}
						$i++;
					} 
				?>
			</section>
			<section class="last-news-n-discord flex-s-c">