<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
    <meta name="author" content="https://discord.com/invite/mTXUFx4hnZ"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>"/>
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:title" content="<?php echo $this->meta->request_meta_title(); ?>"/>
    <meta property="og:image" content="<?php echo $this->config->base_url; ?>assets/default_assets/images/cms_logo.png"/>
    <meta property="og:url" content="<?php echo $this->config->base_url; ?>"/>
    <meta property="og:description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
    <meta property="og:type" content="website">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/layerslider.min.css" />
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/magnific-popup.min.css" />
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/slick.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/default_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/v1.css" rel="stylesheet">
	<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/freemucms.css" rel="stylesheet">
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
<body class="bg-light-dark">
	<div id="exception"></div>
	<div class="preloader">
		<button class="vs-btn preloaderCls"><?php echo __('Cancel Preloader');?> </button>
		<div class="preloader-inner">
			<div class="loader-logo">
				<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-header.png" class="w-75">
			</div>
			<div class="loader-wrap">
				<span class="loader"></span>
			</div>
		</div>
	</div>
	<div class="sticky-header-wrap sticky-header bg-light-dark py-1 py-sm-2 py-lg-1">
		<div class="container position-relative">
			<div class="row align-items-center">
				<div class="col-5 col-md-3">
					<div class="logo">
						<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo_mobile.png" class="w-60" style="max-height: 70px!important; max-width: 100px!important;"></a>
					</div>
				</div>
				<div class="col-7 col-md-9 text-end position-static">
					<nav class="main-menu menu-sticky1 d-none d-lg-block link-inherit">
						<ul>
							<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('Home Page');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Download');?></a></li>
							<li class="mega-menu-wrap">
								<a href="javascript:void(0)"><?php echo __('About Game');?> <i class="fas fa-chevron-down fs-12 text-white-50"></i></a>
								<ul class="mega-menu">
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('About Game');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('Information');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>guides"><?php echo __('Game Guides');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo __('Rules');?></a></li>
										</ul>
									</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('How To Start');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo __('Personal Area');?></a></li>
										</ul>
									</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('Community');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
											<li><a href="<?php echo REALMU_V2_VARS['discord_link'];?>" target="_blank"><?php echo __('Discord');?></a></li>
										</ul>
									</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('Systems');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo __('Shop');?></a></li>
										</ul>
									</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('Support');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>support" target="_blank"><?php echo __('Open Ticket');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Recover Password');?></a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li><a href="<?php echo $this->config->base_url; ?>vote-reward"><?php echo __('Vote Reward');?></a></li>
							<ul class="header-list1 list-style-none ml-30 mt-20 float-right">
								<li>
									<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
										<img src="data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20data-name%3D%22%E5%9B%BE%E5%B1%82%201%22%20viewBox%3D%220%200%20150%20150%22%3E%3Cg%20data-name%3D%22%26lt%3B%E7%BC%96%E7%BB%84%26gt%3B%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h150v150H0z%22%20data-name%3D%22%26lt%3B%E7%9F%A9%E5%BD%A2%26gt%3B%22%20opacity%3D%22.1%22%2F%3E%3Cg%20data-name%3D%22%26lt%3B%E7%BC%96%E7%BB%84%26gt%3B%22%3E%3Ccircle%20cx%3D%2275%22%20cy%3D%2275%22%20r%3D%2250%22%20fill%3D%22none%22%20stroke%3D%22%23898989%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%226.82%22%20data-name%3D%22%26lt%3B%E8%B7%AF%E5%BE%84%26gt%3B%22%2F%3E%3Cellipse%20cx%3D%2275%22%20cy%3D%2275%22%20fill%3D%22none%22%20stroke%3D%22%23898989%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%226.82%22%20data-name%3D%22%26lt%3B%E8%B7%AF%E5%BE%84%26gt%3B%22%20rx%3D%2218.06%22%20ry%3D%2250%22%2F%3E%3Cg%20data-name%3D%22%26lt%3B%E7%BC%96%E7%BB%84%26gt%3B%22%3E%3Cpath%20fill%3D%22none%22%20stroke%3D%22%23898989%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%226.82%22%20d%3D%22M28.18%2058.98h93.41M28.18%2091.02h93.41%22%20data-name%3D%22%26lt%3B%E8%B7%AF%E5%BE%84%26gt%3B%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="frcms-langIcon" />
									</button>
									<?php 
									$languages = $this->website->lang_list(); 
									$currLang = htmlspecialchars($_COOKIE['dmn_language']);
									if(isset($languages[$currLang])){
										unset($languages[$currLang]);
									}
									if(!empty($languages)){
									?>	
										<ul class="dropdown-menu">
										<?php
											krsort($languages);
											foreach($languages as $iso => $native){
												echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16"><span class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . ' (' . strtoupper($iso) . ')</a></li>';
											}
										?>
										</ul>
									<?php } ?>
								</li>
							</ul>
						</ul>
					</nav>
					<button class="vs-menu-toggle text-light-white border-theme d-inline-block d-lg-none"><i class="fas fa-bars"></i></button>
				</div>
			</div>
		</div>
	</div>
	<div class="vs-menu-wrapper">
		<div class="vs-menu-area bg-dark">
			<button class="vs-menu-toggle"><i class="fas fa-times"></i></button>
			<div class="mobile-logo">
				<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/bg_bi_season19.png" class="w-75 mr-10"></a>
			</div>
			<div class="vs-mobile-menu link-inherit"></div>
		</div>
	</div>
	<header class="header-wrapper header-layout4">
		<div class="animate-line py-10" data-bg-src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/header-bg-top.png">
			<div class="container vs-container">
				<div class="row justify-content-between">
					<div class="col-auto d-none d-sm-block">
						<p class="mb-0 pl-0 fs-xs text-mist-blue">
							<?php echo __('Welcome to');?> <span class="fs-16"><?php echo $this->config->config_entry("main|servername"); ?></span>
						</p>
					</div>
					<div class="col-auto">
						<a href="<?php echo $this->config->base_url; ?>donate" class="link-secondary"> <span class="fs-xs me-2"><?php echo __('Recharge');?></span></a>
						<a href="<?php echo $this->config->base_url; ?>registration" class="vs-btn2 outline3"><?php echo __('Registration');?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-light-gray py-2 py-sm-3 py-lg-0">
			<div class="container vs-container position-relative">
				<div class="row gx-0">
					<div class="col-auto">
						<div>
							<a class="d-none d-lg-inline-block" href="<?php echo $this->config->base_url; ?>">
								<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/bg_bi_season19.png" class="w-75 pt-15 pb-15">
							</a>
								<a class="d-inline-block d-lg-none" href="<?php echo $this->config->base_url; ?>">
							<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/bg_bi_season19.png" class="w-50 pt-0 ml-0">
							</a>
						</div>
					</div>
					<div class="col-auto py-10 dh-xs-none dh-sm-none dh-md-block dh-lg-block dh-xl-block">
						<div class="header-info-box has-right-border text-center">
							<span class="has-border fs-12 text-white-50 text-center"><?php echo __('Players Online');?></span>
							<p class="fs-xs text-center">
								<?php $online = $this->website->total_online(60); ?>
								<h4 class="text-white text-shadow mb-5-off mt-5-off"><?php echo $online['online']+31;?></h4>
							</p>
							<span class="fs-10 small"><?php echo date('M d, Y h:i:s A', time());?></span>
						</div>
					</div>
					<div class="col-auto dh-xs-block dh-sm-block dh-md-none dh-lg-none dh-xl-none">
						<div class="header-info-box has-left-border text-center ml-40-off">
							<p class="fs-xs text-center">
								<h4 class="text-white text-shadow mb-5-off"><?php echo $online['online']+31;?></h4>
							</p>
							<span class="fs-12 text-white-50 text-center"><?php echo __('Players Online');?></span>
						</div>
					</div>
					<div class="col text-end text-lg-center align-self-center">
						<nav class="main-menu menu-style3 mobile-menu-active" data-expand="992">
							<div class="dh-xl-none dh-lg-none dh-md-none dh-sm-block dh-xs-block ml-10 mr-10">
								<?php if($this->session->userdata(['user' => 'logged_in'])){ ?>
								<?php
								$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
								$credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
								?>
								<div class="header-info-box">
									<span class="has-border fs-12 text-mist-blue"><?php echo __('Welcome');?> <strong><?php echo $this->session->userdata(['user' => 'username']); ?></strong>!<br/>
										<a href="<?php echo $this->config->base_url; ?>logout" class="link-secondary"><i class="fas fa-sign-out-alt"></i> <?php echo __('Logout');?></a> 
										<span>&nbsp;|&nbsp;</span> 
										<a href="<?php echo $this->config->base_url; ?>account-panel" class="link-secondary"><i class="fas fa-user"></i> <?php echo __('My Account');?></a> 
										<span>&nbsp;|&nbsp;</span>
										<a href="" data-modal-div="select_server" class="link-secondary"><?php echo $this->session->userdata(['user' => 'server_t']); ?></a>
									</span>
									<table class="text-white">
										<tr>
											<td class="py-0 px-0 w-50"><?php echo $this->website->translate_credits(1, $this->session->userdata(['user' => 'server'])); ?></td>
											<td class="py-0 px-0 w-50"><span class="vurses"><?php echo number_format($credits['credits']); ?>&nbsp;&nbsp;&nbsp;</span></td>
										</tr>
										<tr>
											<td class="py-0 px-0 w-50"><?php echo $this->website->translate_credits(2, $this->session->userdata(['user' => 'server'])); ?></td>
											<td class="py-0 px-0 w-50"><span class="vurses"><?php echo number_format($credits2['credits']); ?>&nbsp;&nbsp;&nbsp;</span></td>
										</tr>
									</table>
								</div>
								<?php } else { ?>
								<form id="login_form_mobile" method="post" class="form-dark mb-30 ml-5" action="">
									<div class="row form-login-content px-20">
										<div class="col-12 form-group mb-0 fs-14 space-bottom-5">
											<input type="text" name="username" id="login_input_mobile" class="form-control form-login fs-14" maxlength="10" placeholder="<?php echo __('Username');?>" value="" />
											<i class="fa fa-user form-login-icon"></i>
										</div>
										<div class="col-9 form-group mb-0 fs-14 pr-0">
											<input type="password" name="password" id="password_input_mobile" class="form-control form-login fs-14 mr-0" maxlength="20" placeholder="<?php echo __('Password');?>" value="" />
											<i class="fa fa-lock form-login-icon"></i>
										</div>
										<div class="col-3">
											<button class="vs-btn2 gradient-btn form-login-button" id="submit"><?php echo __('Login');?></button>
										</div>
									</div>
								</form>
								<?php } ?>
							</div>
							<ul>
								<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('Home Page');?></a></li>
								<li class="hidden-md"><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Download');?></a></li>
								<li class="mega-menu-wrap">
									<a href="javascript:void(0)"><?php echo __('About Game');?> <i class="fas fa-chevron-down fs-12 text-white-50"></i></a>
									<ul class="mega-menu">
										<li>
											<a class="sidebox-title" href="javascript:void(0)"><?php echo __('About Game');?></a>
											<ul>
												<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('Information');?></a></li>
												<li><a href="<?php echo $this->config->base_url; ?>guides"><?php echo __('Game Guides');?></a></li>
												<li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo __('Rules');?></a></li>
											</ul>
										</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('How To Start');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo __('Personal Area');?></a></li>
										</ul>
									</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('Community');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
											<li><a href="<?php echo REALMU_V2_VARS['discord_link'];?>" target="_blank"><?php echo __('Discord');?></a></li>
										</ul>
									</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('Systems');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo __('Shop');?></a></li>
										</ul>
									</li>
									<li>
										<a class="sidebox-title" href="javascript:void(0)"><?php echo __('Support');?></a>
										<ul>
											<li><a href="<?php echo $this->config->base_url; ?>support"><?php echo __('Open Ticket');?></a></li>
											<li><a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Recover Password');?></a></li>
										</ul>
										</li>
									</ul>
								</li>
								<li class="hidden-md"><a href="<?php echo $this->config->base_url; ?>vote-reward"><?php echo __('Vote Reward');?></a></li>
							</ul>
						</nav>
						<button type="button" class="vs-menu-toggle text-white d-inline-block d-lg-none">
							<i class="fas fa-bars"></i>
						</button>
					</div>
					<div class="col-auto d-none d-lg-flex align-items-center justify-content-end dh-md-none dh-sm-none dh-xs-none">
						<ul class="header-list1 list-style-none ml-30">
							<li>
								<button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
									<img src="data:image/svg+xml;utf8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20data-name%3D%22%E5%9B%BE%E5%B1%82%201%22%20viewBox%3D%220%200%20150%20150%22%3E%3Cg%20data-name%3D%22%26lt%3B%E7%BC%96%E7%BB%84%26gt%3B%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h150v150H0z%22%20data-name%3D%22%26lt%3B%E7%9F%A9%E5%BD%A2%26gt%3B%22%20opacity%3D%22.1%22%2F%3E%3Cg%20data-name%3D%22%26lt%3B%E7%BC%96%E7%BB%84%26gt%3B%22%3E%3Ccircle%20cx%3D%2275%22%20cy%3D%2275%22%20r%3D%2250%22%20fill%3D%22none%22%20stroke%3D%22%23898989%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%226.82%22%20data-name%3D%22%26lt%3B%E8%B7%AF%E5%BE%84%26gt%3B%22%2F%3E%3Cellipse%20cx%3D%2275%22%20cy%3D%2275%22%20fill%3D%22none%22%20stroke%3D%22%23898989%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%226.82%22%20data-name%3D%22%26lt%3B%E8%B7%AF%E5%BE%84%26gt%3B%22%20rx%3D%2218.06%22%20ry%3D%2250%22%2F%3E%3Cg%20data-name%3D%22%26lt%3B%E7%BC%96%E7%BB%84%26gt%3B%22%3E%3Cpath%20fill%3D%22none%22%20stroke%3D%22%23898989%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%20stroke-width%3D%226.82%22%20d%3D%22M28.18%2058.98h93.41M28.18%2091.02h93.41%22%20data-name%3D%22%26lt%3B%E8%B7%AF%E5%BE%84%26gt%3B%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" class="frcms-langIcon" />
								</button>
								<?php 
								if(!empty($languages)){
								?>	
									<ul class="dropdown-menu">
									<?php
										krsort($languages);
										foreach($languages as $iso => $native){
											echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16"><span class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . ' (' . strtoupper($iso) . ')</a></li>';
										}
									?>
									</ul>
								<?php } ?>
							</li>
						</ul>
					</div>
					<div class="col-auto py-10 dh-sm-none dh-md-block">
						<div class="header-info-box has-left-border d-ml-none dh-md-block dh-sm-none pl-20">
							<?php if($this->session->userdata(['user' => 'logged_in'])){ ?>
							<span class="has-border fs-12 text-mist-blue">
								<?php echo __('Welcome');?> <strong><?php echo $this->session->userdata(['user' => 'username']); ?></strong>!&nbsp;&nbsp;&nbsp;&nbsp;
								<a href="<?php echo $this->config->base_url; ?>logout" class="float-right link-secondary"><i class="fas fa-sign-out-alt"></i></a> 
								<span class="float-right">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span> 
								<a href="<?php echo $this->config->base_url; ?>account-panel" class="float-right link-secondary"><?php echo __('My Account');?></a> 
							</span>
							<p class="fs-xs text-white">
							<strong><?php echo $this->website->translate_credits(1, $this->session->userdata(['user' => 'server'])); ?><span class="vurses"><b class="spanpos"><?php echo number_format($credits['credits']); ?>&nbsp;&nbsp;&nbsp;</b></span></strong> &nbsp;&nbsp;
							<strong><?php echo $this->website->translate_credits(2, $this->session->userdata(['user' => 'server'])); ?> <span class="vurses"><?php echo number_format($credits2['credits']); ?>&nbsp;&nbsp;&nbsp;</span></strong>
							</p>
							<span class="fs-12">
							<span class="text-default"><?php echo ($this->session->userdata('vip')) ? $this->session->userdata(['vip' => 'title']) . ' (<a class="color-green" href="' . $this->config->base_url . 'shop/vip">' . __('Extend Now') . '</a>)' : __('None') . ' (<a class="color-green" href="' . $this->config->base_url . 'shop/vip">' . __('Buy Now') . '</a>)'; ?></span> 
							<span class="text-dark-light"> &nbsp;&nbsp;| &nbsp;&nbsp;</span>
							<a href="" data-modal-div="select_server" class="link-secondary"><?php echo $this->session->userdata(['user' => 'server_t']); ?></a>
							</span>
							<?php } else { ?>
							<form id="login_form" method="post" class="form-dark" action="">
								<div class="row form-login-content px-20">
									<div class="col-12 form-group mb-0 fs-14 space-bottom-5">
										<input type="text" name="username" id="login_input" class="form-control form-login fs-14" maxlength="10" placeholder="<?php echo __('Username'); ?>" value="" />
										<i class="fa fa-user form-login-icon"></i>
									</div>
									<div class="col-9 form-group mb-0 fs-14 pr-0">
										<input type="password" name="password" id="password_input" class="form-control form-login fs-14 mr-0" maxlength="20" placeholder="<?php echo __('Password'); ?>" value="" />
										<i class="fa fa-lock form-login-icon"></i>
									</div>
									<div class="col-3">
										<button class="vs-btn2 gradient-btn form-login-button" id="submit"><?php echo __('Login'); ?></button>
									</div>
								</div>
							</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<?php 
	$ctrl = $this->request->get_controller();
	$method = $this->request->get_method();
	if($ctrl == 'home' && $method == 'index'){} else {
	if($ctrl != 'battle_pass' && $ctrl != 'mystery_box'){
		$title = str_replace('_', ' ', $ctrl);
	?>
	<section class="breadcumb-wrapper space-secpages" data-bg-src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cover_page.jpg" data-overlay>
		<div class="container z-index-common">
			<div class="breadcumb-content text-center">
				<?php 
				if($ctrl == 'home' && in_array($method, ['read_news', 'all'])){
					$title = __('News');
				}
				if($ctrl == 'info' && in_array($method, ['character'])){
					$title = __('Character Info');
				}
				if($ctrl == 'info' && in_array($method, ['guild'])){
					$title = __('Guild Info');
				}
				if($ctrl == 'shop' && in_array($method, ['vip', 'buy_vip'])){
					$title = __('Vip');
				}
				if($ctrl == 'shop' && in_array($method, ['buy_level'])){
					$title = __('Buy Level');
				}
				if($ctrl == 'shop' && in_array($method, ['change_name', 'change_name_history'])){
					$title = __('Change Name');
				}
				if($ctrl == 'shop' && in_array($method, ['change_class'])){
					$title = __('Change Class');
				}
				if($ctrl == 'about' && in_array($method, ['stats'])){
					$title = __('Stats');
				}
				if($ctrl == 'partner'){
					$title = __('Streamer Panel');
				}
				?>
				<h1 class="breadcumb-title h1 text-white my-0 text-uppercase"><?php echo $title;?></h1>
				<h2 class="breadcumb-bg-title font-theme4 text-uppercase"><?php echo $title;?></h2>
				<ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
					<li><a href="<?php echo $this->config->base_url; ?>"><i class="fa fa-home"></i><?php echo __('Home');?></a></li>
					<li class="active"><?php echo ucfirst($title);?></li>
				</ul>
			</div>
		</div>
	</section>
	<?php } ?>
	<?php if($ctrl == 'mystery_box'){ ?>
	<section class="breadcumb-wrapper space-secpages" data-bg-src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cover_page.jpg" data-overlay>
		<div class="container z-index-common">
			<div class="breadcumb-content text-center">
				<h1 class="breadcumb-title h1 text-white my-0 text-uppercase"><?php echo __('Mystery Box');?></h1>
				<h2 class="breadcumb-bg-title font-theme4 text-uppercase"><?php echo __('Premium');?></h2>
				<ul class="breadcumb-menu-style1 text-white mx-auto fs-xs">
					<li><a href="<?php echo $this->config->base_url; ?>"><i class="fa fa-home"></i><?php echo __('Home');?></a></li>
					<li class="active"><?php echo __('Mystery Box');?></li>
				</ul>
			</div>
		</div>
	<?php } else { ?>
	<section class="vs-blog-wrapper blog-single-layout1 mt-50 mb-100">
	<?php } ?>
		<div class="container">
		<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.slider'); ?>	
	<?php } ?>

	