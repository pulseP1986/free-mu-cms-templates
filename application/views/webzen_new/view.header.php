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
	<script>
		var baseUrl = '<?php echo $this->config->base_url; ?>';
	</script>
</head>
<body class="wz">
    <div id="exception"></div>
	<header style="" class="global-header-container">
         <div class="global-header clearFix">
			<h1><a href="<?php echo $this->config->base_url; ?>" class="nav-caller" rel="">WEBZEN</a></h1>
            <nav>
               <div class="nav-container">
                  <div class="nav-contents">
					<h1><a href="<?php echo $this->config->base_url; ?>" rel="">Webzen.com Portal</a></h1>
					<menu>
						<li class="main"><a href="<?php echo $this->config->base_url; ?>" rel=""><span>MAIN</span></a></li>					
						<li class="wcoin"><a href="<?php echo $this->config->base_url; ?>donate" rel=""><span>TOP UP</span></a></li>
					</menu>
                  </div>
               </div>
            </nav>
			<?php if(!$this->session->userdata(['user' => 'logged_in'])){ ?>
            <article> 	
				<a href="<?php echo $this->config->base_url; ?>login" class="log" rel="">Log In</a>
				<a href="<?php echo $this->config->base_url; ?>registration" class="register" rel="">REGISTER</a> 
            </article>  
			<?php } else { ?>
			<article> 
			<div class="dropdown">
               <button type="button" class="dropdown-toggle nickname show" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               My Account
               </button>
               <ul class="dropdown-menu my-contents list">
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
				<li><a class="dropdown-item" href="" data-modal-div="select_server"><i class="fa fa-angle-right"></i> <?php echo __('Server'); ?>: <span><?php echo $this->session->userdata(['user' => 'server_t']); ?></a></li>
				<li><a class="dropdown-item" href="<?php echo $this->config->base_url; ?>account-panel"><i class="fa fa-angle-right"></i> <?php echo __('Account Panel'); ?></a></li>
				<li><a class="dropdown-item" href="<?php echo $this->config->base_url; ?>donate"><i class="fa fa-angle-right"></i> <?php echo __('Buy Credits'); ?></a></li>
				<li><a class="dropdown-item" href="<?php echo $this->config->base_url; ?>shop"><i class="fa fa-angle-right"></i> <?php echo __('Shop'); ?></a></li>
				<li><a class="dropdown-item" href="<?php echo $this->config->base_url; ?>shop/cart"><i class="fa fa-angle-right"></i> <?php echo __('My Cart'); ?></a></li>
				<li><a class="dropdown-item" href="<?php echo $this->config->base_url; ?>warehouse"><i class="fa fa-angle-right"></i> <?php echo __('Warehouse'); ?></a></li> 						
				<li><a class="dropdown-item" href="<?php echo $this->config->base_url; ?>account-logs"><i class="fa fa-angle-right"></i> <?php echo __('Account Logs'); ?></a></li>
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
				<li><a class="dropdown-item" href="<?php echo $plugin['module_url']; ?>"><i class="fa fa-angle-right"></i> <?php echo __($plugin['about']['name']); ?></a></li>
				<?php
							}
						}
					}
				?>
				<li><a class="dropdown-item" href="<?php echo $this->config->base_url; ?>logout"><i class="fa fa-angle-right"></i> <?php echo __('Logout'); ?></a></li>
			</ul>
            </div>
			 </article>  
			<?php } ?>	
         </div>
      </header>
	  <h1 class="wz-skip">MU Online Official</h1>
      <div id="container" class="wz-container">
		 <nav id="nav" class="wz-nav" style="margin-left: 0px; height: 80px;">
            <div class="wz-nav-content">
               <a class="wz-nav--main" href="<?php echo $this->config->base_url; ?>" rel=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/img_globalnav_bi.png" alt="MU SEASON" class="wz__bi--nav"></a>
               <ul class="wz-gnb__list" id="gnb">
                  <li class="wz-gnb__item wz-gnb__item--news">
                     <a class="wz-gnb__link " href="<?php echo $this->config->base_url; ?>" rel=""><span class="wz-gnb__text"> Home</span></a>
                     <ul class="wz-lnb__list">
                        <li class="wz-lnb__item"><a class="wz-lnb__link " href="<?php echo $this->config->base_url; ?>about" rel=""><span class="wz-lnb__text"> Information</span></a></li>
                     </ul>
                  </li>
				  <li class="wz-gnb__item wz-gnb__item--guide">
                     <a href="<?php echo $this->config->base_url; ?>guides" class="wz-gnb__link" rel=""><span class="wz-gnb__text" target="_blank"> Guides</span></a>
                  </li>
                  <li class="wz-gnb__item wz-gnb__item--guide">
                     <a href="<?php echo $this->config->base_url; ?>account-panel" class="wz-gnb__link" rel=""><span class="wz-gnb__text" target="_blank"> Account</span></a>
                     <ul class="wz-lnb__list">
                        <li class="wz-lnb__item"><a href="<?php echo $this->config->base_url; ?>registration" class="wz-lnb__link" target="_blank" rel=""><span class="wz-lnb__text"> Register</span></a></li>
                        <li class="wz-lnb__item"><a href="<?php echo $this->config->base_url; ?>login" class="wz-lnb__link" target="_blank" rel=""><span class="wz-lnb__text"> Sign In</span></a></li>
            
                     </ul>
                  </li>
                  <li class="wz-gnb__item wz-gnb__item--reader-board">
                     <a class="wz-gnb__link " href="<?php echo $this->config->base_url; ?>rankings" rel=""><span class="wz-gnb__text"> Rankings</span></a>
                    
                  </li>
                  <li class="wz-gnb__item wz-gnb__item--community">
                     <a href="#" class="wz-gnb__link " rel=""><span class="wz-gnb__text"> Community</span></a>
                     <ul class="wz-lnb__list">
                        <li class="wz-lnb__item"><a href="" class="wz-lnb__link" rel=""><span class="wz-lnb__text"> Discord</span></a></li>
                        <li class="wz-lnb__item"><a class="wz-lnb__link " href="" rel=""><span class="wz-lnb__text"> Facebook</span></a></li>
                        <li class="wz-lnb__item"><a class="wz-lnb__link " href="" rel=""> Youtube</span></a></li>
                     </ul>
                  </li>
               </ul>
               <a class="wz-nav--download" href="<?php echo $this->config->base_url; ?>downloads" rel=""><span class="wz-text">DOWNLOAD</span></a>
            </div>
         </nav>
		 <div id="contents" class="wz-contents">
			<main class="main">
				<?php $online = $this->website->total_online(120);?>
				<section class="main-promotion">
					<div class="main-promotion__slider slider" id="slideMainPromotion">
						<ul class="slider__list">
							<li class="slider__item selected" style="display: list-item;">
								<a href="https://muonline.webzen.com/events/season17part1/pre-event/" target="_blank" class="slider__link" rel="">
									<div class="main-promotion__info">
										<h3 class="main-promotion__title">Season 17 Pre-Event</h3>
										<span class="main-promotion__date">7/12/2022 ~ 8/2/2022</span>
										<p class="main-promotion__desc">Two New characters are on board, be Prepared for the Speed server. It is the fastest way to meet the new characters.</p>
										<p class="main-promotion__desc">Total Online: <?php echo $online['online'];?></p>
									</div>
									<img class="main-promotion__banner" src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/s17premainre.jpg" alt="">
								</a>
							</li>
							<li class="slider__item" style="display: none;">
								<a href="https://muonline.webzen.com/news/events/31819/egg-of-monsters-july-5th-2022" target="_blank" class="slider__link" rel="">
									<div class="main-promotion__info">
										<h3 class="main-promotion__title">[Event] Egg of Monsters</h3>
										<span class="main-promotion__date">7/5/2022 ~ 7/19/2022</span>
										<p class="main-promotion__desc">Let's collect new Muun eggs with Egg of Monsters Event!</p>
										<p class="main-promotion__desc">Total Online: <?php echo $online['online'];?></p>
									</div>
									<img class="main-promotion__banner" src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/egg20220208main.jpg" alt="">
								</a>
							</li>
							<li class="slider__item" style="display: none;">
								<a href="https://muonline.webzen.com/en/news/notices/all/31498/mu-online-mu-online-game-guide-collection-in-th" target="_blank" class="slider__link" rel="">
									<div class="main-promotion__info">
										<h3 class="main-promotion__title"> MU Online (MU Online Game Guide Collection in TH)</h3>
										<span class="main-promotion__date">4/13/2022 ~ 12/31/2029</span>
										<p class="main-promotion__desc">Total Online: <?php echo $online['online'];?></p>
									</div>
									<img class="main-promotion__banner" src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/s1622upmain.jpg" alt="">
								</a>
							</li>
						</ul>
						<div class="slider__paging">
							<ol class="slider__paging__list" style="width: 822px; margin-left: 0px;">
								<li class="slider__paging__item selected">
									<h3 class="slider__paging__title">Season 17 Pre-Event</h3>
									<img src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/s17premainth.png" alt="" class="slider__paging__thumb">
								</li>
								<li class="slider__paging__item">
									<h3 class="slider__paging__title">[Event] Egg of Monsters</h3>
									<img src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/egg20220208mainbottom.png" alt="" class="slider__paging__thumb">
								</li>
								<li class="slider__paging__item">
									<h3 class="slider__paging__title">MU Online (MU Online Game Guide Collection in TH)</h3>
									<img src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/s1622mainth.png" alt="" class="slider__paging__thumb">
								</li>
							</ol>
						</div>
						<div class="slider__controls">
							<button type="button" role="button" class="slider__controls__button slider__controls--prev">prev</button><button type="button" role="button" class="slider__controls__button slider__controls--next">next</button>
						</div>
						<div class="slider__counter"><span class="slider__counter--current">1</span><span class="slider__counter--total">3</span></div>
					</div>
				</section>
				<?php if($this->request->get_controller() == 'home' && $this->request->get_method() == 'index') { ?>
				<section class="main__latest">
                  <article class="main__latest-news">
                     <h4 class="latest-title">Latest News</h4>
					 <?php if(empty($news)){
						echo '<div class="alert alert-info">' . __('No News Articles') . '</div>';
					} else { ?>	
                     <ul class="board-list">
						<?php foreach($news as $key => $article){ ?>
                        <li class="board-list__item">
							<a class="board-list__link" rel="" href="<?php echo $article['url'];?>">
								<span class="category"><?php echo $article['type'];?></span>
								<div class="preview">
									<h3 class="title"><?php echo $article['title'];?></h3>
								</div>
								<span class="datetime"><?php echo date("d/m/y", $article['time']);?></span>
							</a>
						</li>  
						<?php } ?>	
					</ul>
				    <?php } ?>	
                  </article>
				  <?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
                  <article class="main__latest-shop">
					   <h4 class="latest-title">Event Timers</h4>
					   <div class="ranking-list" style="padding-top: 20px;">
							<ul class="event-timers" id="events"></ul>
								<script type="text/javascript">
									$(document).ready(function () {
										App.getEventTimes();
									});
								</script>
					   </div>
                     </article>
               </section>
			   <?php } ?>
				<section class="main__info">
                  <div class="main__info__box">
                     <div class="main_ranking">
                        <article class="main__info-ranking">
                           <h4 class="latest-title">Top Players</h4>
                           <a class="latest-more" href="<?php echo $this->config->base_url; ?>rankings" rel="">More</a>
                           <header class="ranking-info">
                              <div class="ranking__select">
                               <h4 class="select-items">Top players</h4>
                              </div>
                           </header>
                           <div class="ranking-list">
							  <?php
							  $ranking_config = $this->config->values('rankings_config');
							  $i = 1;
							  foreach($ranking_config AS $srv => $data){
									if($data['active'] == 1) {
										if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
											echo '
												<script>
													$(document).ready(function () {
														App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
													});
												</script>
												<div id="top_players" class="ranking-list"></div>';
											foreach($this->website->server_list() as $key => $server){
												if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
													echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '" class="btn btn-primary" style="padding: 6px 20px;">' . $server['title'] . '</a> ';
												}
											}
										}
									
									if($i == 1){
										break;
									}
									$i++;
								}
							  }
							  ?>		
                              
                           </div>
                        </article>
                     </div>
                     <div class="main_hall_of_fame">
                        <article class="main__info-ranking hall-of">
                           <h4 class="latest-title">Top Guilds</h4>
                           <a class="latest-more" href="<?php echo $this->config->base_url; ?>rankings" rel="">More</a>
                           <header class="ranking-info">
                              <h4 class="ranking__items">Category</h4>
                              <div class="ranking__select">
                                   <h4 class="select-items">Top Guilds</h4>
                              </div>
                           </header>
						  <?php
						  $i = 1;
						  foreach($ranking_config AS $srv => $data){
								if($data['active'] == 1) {
									if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
										echo '
											<script>
												$(document).ready(function () {
													App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
												});
											</script>
											<div id="top_guilds" class="ranking-list"></div>';
										foreach($this->website->server_list() as $key => $server){
											if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
												echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '" class="btn btn-primary" style="padding: 6px 20px;">' . $server['title'] . '</a> ';
											}
										}
									}
								
								if($i == 1){
									break;
								}
								$i++;
							}
						  }
						  ?>
                        </article>
                     </div>
                     <article class="main__info-guide">
						<ul class="guide-list">
							<li class="guide__item guide__item--update">
								<a href="https://muonline.webzen.com/en/gameinfo/guide/update" class="guide__link" target="_blank" rel="">
									<h4 class="latest-title">
										<sup>MU ONLINE</sup>
										Update Guides
									</h4>
									<aside class="guide--more">GO</aside>
								</a>
							</li>
							<li class="guide__item guide__item--beginner">
								<a href="https://muonline.webzen.com/en/gameinfo/guide/detail/26" class="guide__link" target="_blank" rel="">
									<h4 class="latest-title">
										<sup>MU ONLINE</sup>
										Beginner’s Guide
									</h4>
									<aside class="guide--more">GO</aside>
								</a>
							</li>
						</ul>
					</article>
                  </div>
               </section>
			   <?php } ?>