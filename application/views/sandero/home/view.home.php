<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="news-panel flex-s">
	<div class="slider">
		<div class="newsBlockLeft">
			<!--<div class="swiper-container swiper-news">
				<div class="swiper-wrapper">
					<div class="swiper-slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/image-for-slider.jpg);">
						<h2 class="slider-title">THE COUNTRY EXPERIENCED</h2>
						<p class="slider-info">
							A long time ago there was only a single empire that existed on the continent.
							 The country experienced tranquility and peace and did not know the conflating.
						</p>
						<a href="#" class="button-more">more</a>
					</div>
					<div class="swiper-slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/image-for-slider.jpg);">
						<h2 class="slider-title">THE COUNTRY EXPERIENCED</h2>
						<p class="slider-info">
							A long time ago there was only a single empire that existed on the continent.
							 The country experienced tranquility and peace and did not know the conflating.
						</p>
						<a href="#" class="button-more">more</a>
					</div>
					<div class="swiper-slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/image-for-slider.jpg);">
						<h2 class="slider-title">THE COUNTRY EXPERIENCED</h2>
						<p class="slider-info">
							A long time ago there was only a single empire that existed on the continent.
							 The country experienced tranquility and peace and did not know the conflating.
						</p>
						<a href="#" class="button-more">more</a>
					</div>
					<div class="swiper-slide" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/image-for-slider.jpg);">
						<h2 class="slider-title">THE COUNTRY EXPERIENCED</h2>
						<p class="slider-info">
							A long time ago there was only a single empire that existed on the continent.
							 The country experienced tranquility and peace and did not know the conflating.
						</p>
						<a href="#" class="button-more">more</a>
					</div>
				</div>
				<div class="newsPagination">

					<div class="swiper-pagination"></div>

					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div><!-- swiper-news -->
			<iframe width="590" height="380" src="https://www.youtube.com/embed/owp_y_ZC518" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
	</div>
	<div class="events-block">
		<div class="news-top-title">
		   <span class="tab-button active" data-tab="news"><?php echo __('News');?></span><p class="pp">/</p>
		   <span class="tab-button" data-tab="announcement"><?php echo __('Announcement');?></span><p class="pp">/</p>
		   <span class="tab-button" data-tab="event"><?php echo __('Events');?></span><p class="pp">/</p>
		   <span class="tab-button" data-tab="update"><?php echo __('Update');?></span>
		</div>
		<div class="news-top-text tab-block active" id="news">
			<div class="news-content-top">
				<?php foreach($this->Mhome->load_news_by_type(1, 3) as $key => $article){ ?>
				<div class="newsContent flex-s-c">
					<div class="newsContent_img">
						<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icon-news.png" alt="">
					</div>
					<div class="newsContent_info">
						<a href="<?php echo $article['url']; ?>" class="newsContent_info-link" title="<?php echo $article['title'];?>"><span>[<?php echo __('News');?>]</span> <?php echo $article['title'];?></a>
						<div class="newsContent_info-text">
							<?php echo date(DATE_FORMAT, $article['time']); ?>
						</div>
						<a href="<?php echo $article['url']; ?>" class="blue-a read-more-news d-none d-lg-block"><?php echo __('more');?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="news-top-text tab-block" id="announcement">
			<div class="news-content-top">
				<?php foreach($this->Mhome->load_news_by_type(2, 3) as $key => $article){ ?>
				<div class="newsContent flex-s-c">
					<div class="newsContent_img">
						<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icon-news.png" alt="">
					</div>
					<div class="newsContent_info">
						<a href="<?php echo $article['url']; ?>" class="newsContent_info-link" title="Welcome to our new site. There are site"><span>[<?php echo __('Announcement');?>]</span> <?php echo $article['title'];?></a>
						<div class="newsContent_info-text">
							<?php echo date(DATE_FORMAT, $article['time']); ?>
						</div>
						<a href="<?php echo $article['url']; ?>" class="blue-a read-more-news d-none d-lg-block"><?php echo __('more');?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>	
		<div class="news-top-text tab-block" id="event">
			<div class="news-content-top">
				<?php foreach($this->Mhome->load_news_by_type(3, 3) as $key => $article){ ?>
				<div class="newsContent flex-s-c">
					<div class="newsContent_img">
						<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icon-news.png" alt="">
					</div>
					<div class="newsContent_info">
						<a href="<?php echo $article['url']; ?>" class="newsContent_info-link" title="<?php echo $article['title'];?>"><span>[<?php echo __('Events');?>]</span> <?php echo $article['title'];?></a>
						<div class="newsContent_info-text">
							<?php echo date(DATE_FORMAT, $article['time']); ?>
						</div>
						<a href="<?php echo $article['url']; ?>" class="blue-a read-more-news d-none d-lg-block"><?php echo __('more');?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>		
		<div class="news-top-text tab-block" id="update">
			<div class="news-content-top">
				<?php foreach($this->Mhome->load_news_by_type(4, 3) as $key => $article){ ?>
				<div class="newsContent flex-s-c">
					<div class="newsContent_img">
						<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icon-news.png" alt="">
					</div>
					<div class="newsContent_info">
						<a href="<?php echo $article['url']; ?>" class="newsContent_info-link" title="<?php echo $article['title'];?>"><span>[<?php echo __('Update');?>]</span> <?php echo $article['title'];?></a>
						<div class="newsContent_info-text">
							<?php echo date(DATE_FORMAT, $article['time']); ?>
						</div>
						<a href="<?php echo $article['url']; ?>" class="blue-a read-more-news d-none d-lg-block"><?php echo __('more');?></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>		
	</div>
</div>
<?php $ranking_config = $this->config->values('rankings_config');?>
<div class="d-nonee d-lg-blocke">
<div class="block-widget flex-s-c widget-panel"><!--block-TOP PAGE-->
	<?php 
	foreach($ranking_config AS $srv => $data){
		if($data['active'] == 1){
			if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
	?>
			<div class="widget-fon"><!--block-TOP PLAYERS-->
				<div class="block-widget-title">
					<?php echo __('Top Players');?>
				</div>	
				<script>
					$(document).ready(function () {
						App.populateSidebarRanking('players', '<?php echo $srv;?>', <?php echo $data['player']['count_in_sidebar'];?>);
					});
				</script>
				<div id="top_players"></div>
				<div class="buttons-block-1">
					<?php 
					foreach($this->website->server_list() as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
							echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '" class="button-small">' . $server['title'] . '</a>';
						}
					}
					?>
				</div>
			</div><!--block-TOP PLAYERS-->
			<?php 
				break;
			}
		}
	}
	?>
	<div class="widget-fon-guilds"><!--block-TOP GUILDS-->
		<div class="block-widget-title">
			<?php echo __('Castle Siege');?>
		</div>	
		<div>
			<?php
			$i = 0;
			foreach($this->website->server_list() as $key => $server){
				$cs_info = $this->website->get_cs_info($key);
			?>
			<div class="table" id="cs-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>
				<div class="tableBlock">
					<div style="width: 100%;text-align:center;"><img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $cs_info['mark'];?>/70" width="70" height="70"></div>
					<ul class="top-block-cs guild">
						<li class="top-list-cs">
							<div style="float: left; width: 60%; text-align: left; padding-left: 20px;color:#fff;"><?php echo __('Castle Owner');?></div>
							<div style="float: right; padding-right: 20px;color:#ff8a56;"><?php echo $cs_info['guild'];?></div>
						</li>
						<li class="top-list-cs"><div style="float: left; width: 60%; text-align: left; padding-left: 20px;color:#fff;"><?php echo __('Guild Master');?></div>
							<div style="float: right; padding-right: 20px;color:#ff8a56;"><?php echo $cs_info['owner'];?></div>
						</li>
						<li class="top-list-cs2">
							<div style="float: left; width: 60%; text-align: left; padding-left: 20px;color:#fff;"><?php echo __('Until siege');?></div>
							<div style="float: right; padding-right: 20px;color:#ff8a56;" id="cs_time_<?php echo $key;?>"></div>
							<script type="text/javascript">
								$(document).ready(function () {
									App.castleSiegeCountDown("cs_time_<?php echo $key;?>", <?php echo $cs_info['battle_start'];?>, <?php echo time();?>);
								});
							</script>
						</li>
					</ul>
				</div>
			</div>
			<?php
			$i++;
			}
			?>
			<div class="buttons-block-1">
			<?php
				foreach($this->website->server_list() as $key => $server){
					if($server['visible'] == 1){
						echo '<a href="#" id="switch_cs_' . $key . '" class="button-small">' . $server['title'] . '</a> ';
					}
				}
			?>
			<script>
				$(document).ready(function () {
					$('a[id^="switch_cs_"]').on("click", function (e) {
						e.preventDefault();
						var server = $(this).attr('id').split('_').slice(2).join('_');
						$('[id^="cs-details-"]').hide();
						$('#cs-details-'+server).show();
					});
				});
			</script>
			</div>
		</div>
	</div>
	<?php
	foreach($ranking_config AS $srv => $data){
		if($data['active'] == 1){
			if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
			?>
			<div class="widget-fon-guilds"><!--block-TOP GUILDS-->
				<div class="block-widget-title">
					<?php echo __('Top Guilds');?>
				</div>	
				<script>
					$(document).ready(function () {
						App.populateSidebarRanking('guilds', '<?php echo $srv;?>', <?php echo $data['guild']['count_in_sidebar'];?>);
					});
				</script>
				<div id="top_guilds"></div>
				<div class="buttons-block-1">
					<?php 
					foreach($this->website->server_list() as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
							echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '" class="button-small">' . $server['title'] . '</a>';
						}
					}
					?>
				</div>
			</div><!--block-TOP GUILDS-->
			<?php 
				break;
			}
		}
	}
	?>
</div><!--block-TOP PAGE-->
</div>
<div class="fast-links widget-panel row"><!--fast-links-->
	<a href="<?php echo $this->config->base_url; ?>donate" class="fast-links-left">
		<span><?php echo __('DONATE');?></span><br><p><?php echo __('Help in he development<br>of the server');?></p>
	</a>
	<span></span>
	<a href="<?php echo $this->config->base_url; ?>registration" class="fast-links-center">
		<span><?php echo __('START GAME');?></span><br><p><?php echo __('Start the gema in<br>a few clicks');?></p>
	</a>
	<span></span>
	<a href="<?php echo $this->config->base_url; ?>about" class="fast-links-right">
		<span><?php echo __('STATISTICS');?></span><br><p><?php echo __('Detailed statistics of<br>game server');?></p>
	</a>
</div>
<div class="bottom-block widget-panel row ">
	<?php if($this->config->config_entry('modules|recent_forum_module') == 1){ ?>
	<div class="block-players widget-fon-discussions fon-discussions"><!--block-GUILDS-->
		<div class="block-widget-title discussions-title">
			<?php echo __('Discussions');?>
		</div>
		<div class="discussions-content-top dis-1">
			<?php if($load_rss = $this->website->load_rss($this->config->config_entry('modules|recent_forum_rss_url'), $this->config->config_entry('modules|recent_forum_rss_count'), $this->config->config_entry('modules|recent_forum_rss_cache_time'))){ ?>
			<?php foreach($load_rss as $key => $rss){ ?>
			<div class="discussionsContent flex-s-c">
				<div class="discussionsContent_img">
					<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icon_1.jpg" alt="">
				</div>
				<div class="discussionsContent_info">
					<a href="<?php echo $rss['link']; ?>" class="discussionsContent_info-link" title="<?php echo $rss['title']; ?>"><?php echo $rss['title']; ?></a>
					<div class="discussionsContent_info-text">
						<?php echo date(DATE_FORMAT, $rss['timestamp']);?>
					</div>
				</div>
			</div>
			<?php 
				}	
			} 
			else{
				echo '<div class="alert alert-info">' . __('No Data') . '</div>';
			}
			?>
		</div>
		<div class="buttons-block">
			<a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" class="button-small">FORUM</a>
		</div>
	</div><!--block-GUILDS-->
	<?php } ?>
	<?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
	<span class="bottom-block-span"></span>
	<div class="block-players widget-fon-discussions fon-event"><!--block-EVENT-->
		<div class="block-widget-title discussions-title">
			<?php echo __('Events');?>
		</div>
		<div class="discussions-content-top" style="max-height: 450px;overflow-y: auto;">
			<ul class="event-timers" id="events"></ul>
			<script type="text/javascript">
				$(document).ready(function () {
					App.getEventTimes();
				});
			</script>
		</div>
	</div>
	<?php } ?>
	<?php if($this->config->config_entry('modules|last_market_items_module') == 1){ ?>
	<?php
		if($this->session->userdata(['user' => 'logged_in'])){
			$server = $this->session->userdata(['user' => 'server']);
		} else {
			$server = array_keys($this->website->server_list())[0];
		}
	?>
	<span class="bottom-block-span"></span>
	<div class="block-players widget-fon-discussions fon-market"><!--block-MARKET-->
		<div class="block-widget-title discussions-title">
			<?php echo __('Market');?>
		</div>
		<div class="discussions-content-top">
			<script>
				$(document).ready(function () {
					App.loadLatestItems('<?php echo $server;?>', <?php echo $this->config->config_entry('modules|last_market_items_count');?>, 20);
				});
			</script>
			<div id="lattest_items"></div>
		</div>
		<div class="buttons-block-1 mt-3">
			<?php
                foreach($this->website->server_list() as $key => $server):
                    if($server['visible'] == 1):
                        ?>
                        <a href="#" id="switch_items_<?php echo $key; ?>" data-count="<?php echo $this->config->config_entry('modules|last_market_items_count'); ?>" data-limit="20" class="button-small"><?php echo $server['title']; ?></a>
                    <?php
                    endif;
                endforeach;
            ?>
		</div>
	</div>	
	<?php } ?>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>