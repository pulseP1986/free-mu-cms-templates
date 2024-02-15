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
    <div class="smoke"></div>
    <div id="exception"></div>
    <div class="wrapper">
		<div class="topPanel flex-s-c">
			<div class="btn-mobile btn-drop" data-class="topPanel-left">
				<span></span>
				<span></span>
				<span></span>
			</div>
            <div class="topPanel-left">
				<div class="mobile-menu">
					<ul>
						<li>
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
					</ul>
				</div>
                <nav class="menu-wrapper">
					<ul class="menu menu-main">
						<li class="menu__item">
							<a class="menu__link" href="<?php echo $this->config->base_url; ?>" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a>
                        </li>
                        <li class="menu__item">
							<a class="menu__link" href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a>
                        </li>
                        <li class="menu__item">
							<a class="menu__link" href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a>
                        </li>
                        <li class="menu__item">
							<a class="menu__link" href="<?php echo $this->config->config_entry('main|forum_url'); ?>" title="<?php echo __('Forum'); ?>" target="_blank"><?php echo __('Forum'); ?></a>
                        </li>
                        <li class="menu__item">
							<a class="menu__link" href="<?php echo $this->config->base_url; ?>shop" title="<?php echo __('Shop'); ?>"><?php echo __('Shop'); ?></a>
                        </li>
                        <li class="menu__item">
							<a class="menu__link" href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a>
                        </li>
					</ul>
					<div class="menu-more">
						<span class="dots">...</span>
						<ul class="menu-sub menu"></ul>
					</div>
				</nav>
                <div class="langBlock parent_block">
					<div class="langBlock-active flex-c buttonDrop" data-class="langBlock-dropdown">
						<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/english.png" alt="English"> <span></span>
					</div>
					<ul class="langBlock-dropdown toggled_block">
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
				</div><!--langBlock-->
			</div><!--topPanel-left-->
			<div class="topPanel-right">
                <?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
				    <a href="#enter" class="user-enter open_modal"><i class="icon icon-enter"></i> <?php echo __('Login');?></a>
                <?php } else { ?>
					<div class="accountBlock parent_block_account">
						<div class="flex-c buttonDrop" data-class="accountBlock-dropdown">
							<a href="#" class="user-enter main-item"><?php echo __('Account');?></a> <span></span>
						</div>
						<ul class="accountBlock-dropdown toggled_block_account hidden-block">
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
							<hr></hr>
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
				<div class="online">
					<?php	
						foreach($this->website->check_server_status() as $key => $value){
							$block = ' online-block-active';
							$color = 'green';
							$status = __('Online');
							if($value['image'] == 'off'){
								$block = '';
								$color = 'red';
								$status = __('Offline');
							}
					?>
						<div class="online-flex flex-c-c">
							<div class="online-block<?php echo $block;?>">
								<?php echo $value['title'];?>
								<span class="color-<?php echo $color;?>"><?php echo $value['players'];?></span>
								<span class="color-<?php echo $color;?>"><?php echo $status;?></span>
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div><!--topPanel-->
        <header class="header flex-s-c">
			<div class="hero hero_1"></div>
			<div class="logo">
                <a href="<?php echo $this->config->base_url; ?>">
                    <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="">
                </a>
			</div>
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
			<div class="headerInfo">
				<div class="headerInfo-title">
					IT'S TIME<br> FOR THE <span>WINNERS</span>
				</div>
				<div class="headerInfo-text">
					There has been a lot of talk about some legacy servers lately. While this may be news to some...
				</div>
				<div class="headerInfo-button">
					<a href="<?php echo $this->config->base_url; ?>downloads" class="button"><i class="fas fa-download" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo __('Downloads'); ?></a>
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
        <div class="main">
			<div class="sidebar">
				<div class="top">
					<div class="tabs tabsBlock">
						<ul class="tabs-caption tabs-button">
                            <?php
                                $ranking_config = $this->config->values('rankings_config');
                                $i = 1;
                                foreach($ranking_config AS $srv => $data){
                                    if($data['active'] == 1){
                                        if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
                                            echo '<li class="active">'.__('Players').'</li>';
                                        }
                                        if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                                            echo '<li>'.__('Guilds').'</li>';
                                        }
                                    }
                                    
                                    if($i == 1){
                                        break;
                                    }
									$i++;
                                }
                                if($this->config->values('event_config', array('events', 'active')) == 1){
                                    echo '<li>'.__('Event').'</li>';
                                }
                            ?>

						</ul>
						<div class="tabBlock">
                        <?php
						$i = 1;
						foreach($ranking_config AS $srv => $data){
							if($data['active'] == 1) {
								if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
									echo '<div class="tabs-content active tabContent">
										<script>
											$(document).ready(function () {
												App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
											});
										</script>
										<div id="top_players" style="height: 440px;"></div>';
									foreach($this->website->server_list() as $key => $server){
										if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
											echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '" class="button" style="margin-top: 1rem;">' . $server['title'] . '</a> ';
										}
									}
									echo '</div>';
								}
								if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
									echo '<div class="tabs-content tabContent">
										<script>
										$(document).ready(function () {
											App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
										});
										</script>
										<div id="top_guilds" style="height: 440px;"></div>';
									foreach($this->website->server_list() as $key => $server){
										if($server['visible'] == 1 && isset($ranking_config[$key]['guild'])){
											echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '" class="button" style="margin-top: 1rem;">' . $server['title'] . '</a> ';
										}
									}
									echo '</div>';
								}
							
							if($i == 1){
								break;
							}
							$i++;
						}
					}
					if($this->config->values('event_config', array('events', 'active')) == 1){
                    ?>
						<div class="tabs-content tabContent">
							<div id="events"></div>
							<script type="text/javascript">
								$(document).ready(function() {
									App.getEventTimes();
								});
							</script>
						</div>
					<?php } ?>
						</div>
					</div>
				</div><!--top-->
			</div>