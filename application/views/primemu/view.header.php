<?php
    $body = 'main';
    if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
        $body = 'home';
    }
    $user_status = ($this->session->userdata(array('user' => 'logged_in'))) ? true: false;
    $page_name = str_replace("_", " ", $this->request->get_controller());
    if($page_name == 'home'){
        $page_name = 'news';
    }
?>
<!DOCTYPE html>
<!--[if lt IE 8]>
<html class="ie7" lang="en"><![endif]-->
<!--[if IE 8]>
<html lang="en"><![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en"><!--<![endif]-->
<head>
    <meta charset="UTF-8">
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
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/slick.css?v=0.12" type="text/css"/>
    <link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/swiper-bundle.min.css?v=0.12" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/dmn.css?v=3" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/style.css?v=54" type="text/css"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/mobile-style.css?v=2" type="text/css"/>
    <?php
        if(isset($css)):
            foreach($css as $style):
                echo $style;
            endforeach;
        endif;
    ?>
    <script
            src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-1.8.3.min.js"></script>
    <script
            src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
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
    <?php if (strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
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
    <?php endif; ?>
    <div class="wrapper">
		<header>
			<div class="topPanel">
				<div class="btn btn-drop" data-class="topPanel-left">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="topPanel-wrapper flex-c">
					<div class="topPanel-left flex-c">
						<a href="<?php echo $this->config->base_url; ?>" class="logo-mini bright"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-mini.png" alt="Logo"></a>
						<?php if($user_status) { ?>
                            <table class="table-null hidden-md hidden-lg">
							<tbody>
								<tr>
									<td rowspan="2">
										<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/user-icon2.png">
										</td>
										<td>
										<b><?php echo $this->session->userdata(['user' => 'username']); ?></b> <span class="hidden-md">|</span> <a href="<?php echo $this->config->base_url; ?>account-panel" class="hidden-md"><?php echo __('Account Panel'); ?></a> <span>|</span> <a href="<?php echo $this->config->base_url; ?>logout" class="logout"><i class="fas fa-sign-out-alt"></i></a>
										</td>
										</tr>
										<tr>
										<td>
										<b class="coin-one hidden-md"><?php echo __('Server'); ?>: </b>
										<span class="coin-one hidden-md"><?php echo $this->session->userdata(['user' => 'server_t']); ?></span>
										<span class="hidden-md">|</span>
									<?php
                                    if($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1):
                                        $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
										$goblin = $this->website->get_account_goblinpoint_balance($this->session->userdata(['user' => 'server']));
                                        ?>
										<b class="coin-two hidden-md"><?php echo __('WCoin'); ?>: </b>
										<span class="coin-two hidden-md"><?php echo number_format($wcoin); ?></span>
										<b class="coin-two hidden-md"><?php echo __('Goblin'); ?>: </b>
										<span class="coin-two hidden-md"><?php echo number_format($goblin); ?></span>
									</td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
                        <?php } ?>
                        <ul class="nav">
						    <li><a href="<?php echo $this->config->base_url; ?>home"
                            title="<?php echo __('Registration'); ?>"><?php echo __('Home'); ?></a>
                            </li>
                            <li><a href="<?php echo $this->config->base_url; ?>guides"
                            title="<?php echo __('Registration'); ?>"><?php echo __('Info'); ?></a>
                            </li>
                            <li><a href="<?php echo $this->config->base_url; ?>registration"
                                title="<?php echo __('Info'); ?>"><?php echo __('Registration'); ?></a>
                            </li>
                            <li><a href="<?php echo $this->config->base_url; ?>rankings"
                                title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a>
                            </li>
        
                    
                            <li><a href="<?php echo $this->config->base_url; ?>vote-reward"
                                title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a>
                            </li>
						</ul>
					</div><!--topPanel-left-->
					<div class="topPanel-right">
						<?php if($user_status) { ?>
                            <table class="table-null hidden-xs hidden-sm">
							<tbody>
								<tr>
									<td rowspan="2">
										<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/user-icon2.png">
										</td>
										<td>
										<b><?php echo $this->session->userdata(['user' => 'username']); ?></b> <span class="hidden-md">|</span> <a href="<?php echo $this->config->base_url; ?>account-panel" class="hidden-md"><?php echo __('Account Panel'); ?></a> <span>|</span> <a href="<?php echo $this->config->base_url; ?>logout" class="logout"><i class="fas fa-sign-out-alt"></i></a>
										</td>
										</tr>
										<tr>
										<td>
										
										<b class="coin-one hidden-md"><?php echo __('Server'); ?>: </b>
										<span class="coin-one hidden-md"><?php echo $this->session->userdata(['user' => 'server_t']); ?></span>
										<span class="hidden-md">|</span>
									<?php
                                    if($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1):
                                        $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
										$goblin = $this->website->get_account_goblinpoint_balance($this->session->userdata(['user' => 'server']));
                                        ?>
										<b class="coin-two hidden-md"><?php echo __('WCoin'); ?>: </b>
										<span class="coin-two hidden-md"><?php echo number_format($wcoin); ?></span>
										<b class="coin-two hidden-md"><?php echo __('Goblin'); ?>: </b>
										<span class="coin-two hidden-md"><?php echo number_format($goblin); ?></span>
									</td>
									<?php endif; ?>
								</tr>
							</tbody>
						</table>
						<table class="table-null hidden-md hidden-lg" style="margin-top: -1px;">
							<tbody>
								<tr>
									<td>
										<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/user-icon2.png" style="margin-bottom: -5px;">
										</td>
										<td style="padding-top: 0px; padding-bottom: 0px; vertical-align: bottom;">
											<div style="line-height: 80%; min-width: 80px; margin-top: -45px!important; position: relative;">
											<b><?php echo $this->session->userdata(['user' => 'username']); ?></b> <span>|</span> <a href="<?php echo $this->config->base_url; ?>logout" class="logout"><i class="fas fa-sign-out-alt"></i></a>
											<br>
											<a href="<?php echo $this->config->base_url; ?>account-panel" class="hidden-lg"><?php echo __('Account Panel'); ?></a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
                        <?php } else { ?>
                            <a href="#register" class="sign-in open_modal">
                                <?php echo __('Sign In');?>
                            </a>
                        <?php } ?>
					</div><!--topPanel-right-->
				</div>
			</div><!--topPanel-->
			<div class="hand-animation hidden-md hidden-sm hidden-xs">
				<div class="light-hand"></div>
				<div class="rune-hand"></div>
			</div>
			<div class="sparks">
				<div class="spark_1"></div>
				<div class="spark_2"></div>
				<div class="spark_3"></div>
				<div class="spark_4 spark-big"></div>
			</div>
            <div class="logo">
                <div class="row">
                <div class="col-sm-12 col-md-12 hidden-md hidden-lg">
                <div style="margin-top: 40px; height: 160px; width: 100%; text-align: left;">
                <a href="<?php echo $this->config->base_url; ?>">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-mobile.png" style="width: 150px;" alt="Logo">
                </a>
                <span style="float: right; margin-right: 4px;">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/game-pc.png">
                </span>
                </div>
                </div>
                <div class="col-md-8 hidden-xs hidden-sm" style="padding-left: 20px;">
                <a href="<?php echo $this->config->base_url; ?>" class="bright">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="Logo">
                </a>
                </div>
                <div class="col-sm-3 col-xs-3 hidden-md hidden-lg"></div>
                <div class="col-lg-2 col-md-2 col-sm-6 tableBlock-server">
                <div class="online only">
                <table style="width: 400px; margin-left: 50% - 200px);" class="simple">
                <tbody><tr>
                <td style="padding: 0px;">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/brasao-prime.png" style="margin-left: -20px; margin-top: 10px;">
                </td>
                <td style="padding: 0px; padding-bottom: 30px; text-align: center;">
                <h1 style="text-shadow: 1px 1px black; font-size: 35px!important; margin-bottom: -7px; margin-top: 10px;">
                <?php echo $this->website->total_online()['online']; ?> </h1>
                Players Online <br><br>
                <div onclick="location.href='<?php echo $this->config->base_url; ?>registration'" style="border: 2px solid orange; padding: 5px 45px; height: 30px; background: rgba(0, 0, 0, 0.3); box-shadow: 0px 0px 10px #111; margin: 0px; z-index: 99;">
                Register </div>
                <br>
                <div onclick="location.href='https://'" style="border: 2px solid orange; padding: 5px 45px; height: 30px; background: rgba(0, 0, 0, 0.3); box-shadow: 0px 0px 10px #111; margin: 0px; z-index: 99;">
                Discord </div>
                </td>
                </tr>
                </tbody></table>
                </div>
                </div>
                </div>
            </div>
            
		</header>
        <main class="<?php echo $body;?>">
            <?php if($body == 'home') { ?>
                <div class="topHomeBlocks flex-s">
                    <div class="newsSlider block-50">
                        <div class="swiper-container swiper-news">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-1.jpg" alt="Slide">
                                        <div class="swiper-news_info">
                                            <span>Join Now!</span>
                                            <p>Best server, awesome battles with your friends!</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-2.jpg" alt="Slide">
                                        <div class="swiper-news_info">
                                            <span>Join Now!</span>
                                        <p>Best server, awesome battles with your friends!</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-1.jpg" alt="Slide">
                                        <div class="swiper-news_info">
                                            <span>Join Now!</span>
                                            <p>Best server, awesome battles with your friends!</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a href="#">
                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slider-2.jpg" alt="Slide">
                                        <div class="swiper-news_info">
                                            <span>Join Now!</span>
                                            <p>Best server, awesome battles with your friends!</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="swiper-news-pagination">
                                <!-- Add Pagination -->
                                <div class="swiper-pagination"></div>
                                <!-- Add Arrows -->
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div><!--newsSlider-->
                    <div class="newsBlock block-50">
                        <div class="h2-title">
                            <span>Last News</span>
                           
                        </div>
                        <?php 
                        $instance = controller::get_instance();
                        $instance->load->model('home'); 
                        $news = $instance->Mhome->load_news(1, true);
                        if(!empty($news)){
                            foreach($news as $key => $article){ 
                                $type = 'news';
                                $color = 'color: blue !important;';
                                if($article['type_key'] == 2){
                                    $type = 'maintenance';
                                    $color = 'color: #f35dbe !important;';
                                }
                                if($article['type_key'] == 3){
                                    $type = 'events';
                                    $color = 'color: #f35dbe !important;';
                                }
                                if($article['type_key'] == 4){
                                    $type = 'patch-notes';
                                    $color = 'color: #fbffbf !important;';
                                }
                            ?>					
                            <div class="newsLink newsLink-<?php echo $type;?> flex-s-c">
                                <div class="newsLink-info">
                                    <a href="<?php echo $article['url']; ?>"><span style="<?php echo $color;?>">[<?php echo $article['type'];?>]</span> <?php echo $article['title']; ?></a>
                                        <span><?php echo date('d', $article['time']); ?> <?php echo date('M Y', $article['time']); ?></span>
                                </div>
                                <a href="<?php echo $article['url']; ?>" class="newsLink-more"><span><?php echo __('View');?></span></a>						
                            </div>	
                        <?php } ?>
                    <?php } ?>
                    </div>
            <?php 
            } else { 
                if($this->request->get_method() == 'index' && $this->request->get_controller() == 'registration') {} else {
            ?>
                <aside>
                    <div class="rankings blockHome">
                        <div class="h2-title h2-title-table flex-s-c">
                            <span>Rankings</span>
                            <div class="tabTable">
                                <?php
                                    $ranking_config = $this->config->values('rankings_config');
                                    $i = 0;
                                    foreach($ranking_config AS $srv => $data){
                                        if($data['active'] == 1){
                                            if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
                                                echo '<a class="tabTable-button active" data-tab="players">'.__('Players').'</a> ';
                                            }
                                            if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                                                echo '<a class="tabTable-button" data-tab="guilds">'.__('Guilds').'</a> ';
                                            }
                                            echo '<a class="tabTable-button" data-tab="pvp">'.__('PvP').'</a> ';
                                        }
                                        $i++;
                                        if($i == 1){
                                            break;
                                        }
                                    }
                                ?>
                            </div>
                        </div><!--h2-title-->
                        <?php
                            $ranking_config = $this->config->values('rankings_config');
                            $i = 0;
                            foreach($ranking_config AS $srv => $data){
                                if($data['active'] == 1) {
                                    if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
                                        echo '
                                        <div class="table tabTable-block active" id="players">
                                            <div class="tableBlock">
                                                <script>
                                                    $(document).ready(function () {
                                                        App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
                                                    });
                                                </script>
                                                <div id="top_players"></div>';
                                        echo '</div></div>';
                                    }
                                    if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                                        echo '
                                        <div class="table tabTable-block" id="guilds">
                                            <div class="tableBlock">
                                            <script>
                                            $(document).ready(function () {
                                                App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
                                            });
                                            </script>
                                            <div id="top_guilds"></div>';
                                        echo '</div></div>';
                                    }
                                    if(isset($data['duels']) && $data['duels']['is_sidebar_module'] == 1){
                                        echo '
                                        <div class="table tabTable-block" id="pvp">
                                            <div class="tableBlock">
                                            <script>
                                            $(document).ready(function () {
                                                App.populateSidebarRanking(\'pvp\', \'' . $srv . '\', ' . $data['duels']['count_in_sidebar'] . ');
                                            });
                                            </script>
                                            <div id="top_pvp"></div>';
                                        echo '</div></div>';
                                    }
                                    $i++;
                                    if($i == 1){
                                        break;
                                    }
                                }
                            }
                        ?>
                    </div><!--rankings-->
                    <div class="rankings blockHome">
                        <div class="h2-title h2-title-table flex-s-c">
                            <span>Castle Siege</span>
                            <div class="tabTable">
                                <a class="tabTable-button active" data-tab="cs-owner">Owner</a> 
                                <a class="tabTable-button" data-tab="cs-info">Info</a> 
                            </div>
                        </div><!--h2-title-->
                        <?php
                            $cs_info = $this->website->get_cs_info();
                        ?>
                        <div class="table tabTable-block active" id="cs-owner">
                            <div class="tableBlock">
                                <?php if($cs_info != false){ ?>
                                <table>
                                <tbody><tr>
                                <td>
                                <table>
                                <tbody><tr>
                                <td style="width: 10%!important;"></td>
                                <td style="width: 30%!important;">
                                <img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $cs_info['mark'];?>/60">
                                </td>
                                <td>
                                <br>
                                <span>Status:</span> Occupied<br>
                                <span>Guild:</span> <?php echo $cs_info['guild'];?><br>
                                <span>Master:</span> <?php echo $cs_info['owner'];?> </td>
                                 </tr>
                                </tbody></table>
                                </td>
                                </tr>
                                </tbody></table>
                                <?php } else { ?>
                                <h3 style="margin-top: -5px;">Not Occupied</h3>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="table tabTable-block" id="cs-info">
                            <div class="tableBlock">
                            <h3 style="margin-top: -5px;">Guilds Registered for Battle</h3>
                            <ul>
                                <?php 
                                $csGuilds = $this->website->csGuildList(false, 180); 
                                if(!empty($csGuilds)){ 
                                    foreach($csGuilds AS $cguild){
                                ?>
                                    <li><?php echo $cguild['REG_SIEGE_GUILD'];?></li>
                                <?php 
                                    }
                                } 
                                else 
                                { 
                                ?>
                                <a>No guilds registered</a>
                                <?php } ?>
                            </ul>
                            <br>
                            <p style="color: #cc7954; font-size: 12px; font-style: italic; margin-top: 10px;">Next Battle Starts In: <span id="cs_time"></span>
                            <script type="text/javascript">
                               <?php $time = ($cs_info != false) ? $cs_info['battle_start'] : time() - 3600; ?>
                                $(document).ready(function () {
                                    App.castleSiegeCountDown("cs_time", <?php echo $time;?>, <?php echo time();?>);
                                });
                            </script>
                            </p>
                            </div>
                    </div>
                    </div><!--rankings-->
                    
                    <div class="socHome">   
                        <a href="#" class="socButton socDiscord">
                            Discord
                            <span>Discussion Chat</span>
                        </a>
                        <a href="#" class="socButton socFacebook">
                            Facebook
                            <span>Official Group</span>
                        </a>
                        <div class="socBlock flex-c-c">
                            <a href="<?php echo $this->config->base_url; ?>guides" class="socBlock-guides socBlock-button">
                                <?php echo __('Guides');?>
                                <span>Info center</span>
                            </a>
                           
                        </div>
                    </div><!--socBlockHome-->
                </aside>
                <div class="content">
                    <?php if($this->request->get_controller() != 'rankings') { ?>
                    <div class="h2-title h2-title-content flex-s-c">
                        <span><?php echo htmlspecialchars(ucfirst($page_name));?></span>
                    </div>
                    <?php } ?>
                <?php }} ?>