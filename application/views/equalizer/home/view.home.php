<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="news-panel flex-s">
	<div class="slider">
		<div class="newsBlockLeft">
			<div class="swiper-container swiper-news">
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
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
					<!-- Add Arrows -->
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
				</div>
			</div><!-- swiper-news -->
		</div>
	</div>
	<div class="events-block">
		<div class="top-event-block flex-s-c">
			<div class="news-top-title">
				<span class="tab-button active" data-tab="news"><?php echo __('News');?></span><p class="pp">/</p>
			   <span class="tab-button" data-tab="announcement"><?php echo __('Announcement');?></span><p class="pp">/</p>
			   <span class="tab-button" data-tab="event"><?php echo __('Events');?></span><p class="pp">/</p>
			   <span class="tab-button" data-tab="update"><?php echo __('Update');?></span>
			</div>
		</div>
		<ul class="tab-block active" id="news">
			<?php foreach($this->Mhome->load_news_by_type(1, 5) as $key => $article){ ?>
			<li class="flex-s-c">
				<p class="info"><span class="news-1">[<?php echo __('News');?>]</span> <?php echo $article['title'];?></p>
				<span class="date"><?php echo date('d.m', $article['time']); ?></span>
				<a href="<?php echo $article['url']; ?>" class="button-more"><?php echo __('more');?></a>
			</li>
			<?php } ?>
		</ul>	
		<ul class="tab-block" id="announcement">
			<?php foreach($this->Mhome->load_news_by_type(2, 5) as $key => $article){ ?>
			<li class="flex-s-c">
				<p class="info"><span class="news-1">[<?php echo __('Announcement');?>]</span> <?php echo $article['title'];?></p>
				<span class="date"><?php echo date('d.m', $article['time']); ?></span>
				<a href="<?php echo $article['url']; ?>" class="button-more"><?php echo __('more');?></a>
			</li>
			<?php } ?>
		</ul>	
		<ul class="tab-block" id="event">
			<?php foreach($this->Mhome->load_news_by_type(3, 5) as $key => $article){ ?>
			<li class="flex-s-c">
				<p class="info"><span class="news-1">[<?php echo __('Event');?>]</span> <?php echo $article['title'];?></p>
				<span class="date"><?php echo date('d.m', $article['time']); ?></span>
				<a href="<?php echo $article['url']; ?>" class="button-more"><?php echo __('more');?></a>
			</li>
			<?php } ?>
		</ul>	
		<ul class="tab-block" id="update">
			<?php foreach($this->Mhome->load_news_by_type(4, 5) as $key => $article){ ?>
			<li class="flex-s-c">
				<p class="info"><span class="news-1">[<?php echo __('Update');?>]</span> <?php echo $article['title'];?></p>
				<span class="date"><?php echo date('d.m', $article['time']); ?></span>
				<a href="<?php echo $article['url']; ?>" class="button-more"><?php echo __('more');?></a>
			</li>
			<?php } ?>
		</ul>			
	</div>
</div>
<?php $ranking_config = $this->config->values('rankings_config');?>
<div class="widget-panel flex-s">
	<?php 
	foreach($ranking_config AS $srv => $data){
		if($data['active'] == 1){
			if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
	?>
			<div class="widget-block">
				<div class="info-widget-block top-players flex-s">
					<h2 class="title-widget-block"><?php echo __('Top Players');?></h2>
				</div>
				<script>
					$(document).ready(function () {
						App.populateSidebarRanking('players', '<?php echo $srv;?>', <?php echo $data['player']['count_in_sidebar'];?>);
					});
				</script>
				<div id="top_players"></div>
				 <div class="x-buttons flex-c-c">
					<div class="list-buttons">
					<?php 
					foreach($this->website->server_list() as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
							echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '">' . $server['title'] . '</a>';
						}
					}
					?>
					</div>
				</div>
			</div>
			<?php } if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){ ?>
			<div class="widget-block">
				<div class="info-widget-block top-guilds flex-s">
					<h2 class="title-widget-block"><?php echo __('Top Guilds');?></h2>
				</div>
				<script>
					$(document).ready(function () {
						App.populateSidebarRanking('guilds', '<?php echo $srv;?>', <?php echo $data['guild']['count_in_sidebar'];?>);
					});
				</script>
				<div id="top_guilds"></div>
				 <div class="x-buttons flex-c-c">
					<div class="list-buttons">
					<?php 
					foreach($this->website->server_list() as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
							echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a>';
						}
					}
					?>
					</div>
				</div>
			</div>
			<?php } ?>
		<?php 
			break;
		} 
	} if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
	<div class="widget-block">
		 <div class="info-widget-block top-event flex-s">
			<h2 class="title-widget-block"><?php echo __('Events');?></h2>
		</div>
		<div style="max-height: 480px;overflow-y: auto;">
			<ul class="event-timers" id="events"></ul>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				App.getEventTimes();
			});
		</script>
	</div>
	<?php } ?>
</div>
<h2 class="title-video-panel"><?php echo __('Video');?></h2>
<div class="video-pannel flex-s">
	<div class="video-block">
		<div class="video-player flex-s-c">
			<input type="button" class="start-video" value="&#9650;">
			<p class="title-video">New video - welcome!</p>
		</div>
		<div class="media-fon">
			<section class="center slick-slider">
				<div class="slick-slider-slide">
					<a href=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img-1.jpg" alt=""></a>
				</div>
				<div class="slick-slider-slide">
					<a href=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img-2.jpg" alt=""></a>
				</div>
				<div class="slick-slider-slide">
					<a href=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img-3.jpg" alt=""></a>
				</div>
				<div class="slick-slider-slide">
					<a href=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img-3.jpg" alt=""></a>
				</div>
			</section>
		</div>
	</div>
	<div class="fast-links">
		<a class="fast-link" href="<?php echo $this->config->base_url; ?>donate">
			<div class="info-link">
				<h3 class="title-link"><?php echo __('DONATE');?></h3>
				<p class="text-link"><?php echo __('Help in he development<br>of the server');?></p>
			</div>
		</a>
		<a class="fast-link" href="<?php echo $this->config->base_url; ?>registration">
			<div class="info-link">
				<h3 class="title-link"><?php echo __('START GAME');?></h3>
				<p class="text-link"><?php echo __('Start the gema in<br>a few clicks');?></p>
			</div>
		</a>
		<a class="fast-link" href="<?php echo $this->config->base_url; ?>about">
			<div class="info-link">
				<h3 class="title-link"><?php echo __('STATISTICS');?></h3>
				<p class="text-link"><?php echo __('Detailed statistics of<br>game server');?></p>
			</div>
		</a>
	</div>
</div>
<?php 
if($this->config->config_entry('modules|last_market_items_module') == 1){
	if($this->session->userdata(['user' => 'logged_in'])){
		$server = $this->session->userdata(['user' => 'server']);
	} else {
		$server = array_keys($this->website->server_list())[0];
	}
?>
<div class="market-panel">
	<h2><?php echo __('Market');?></h2>
	<script>
		$(document).ready(function () {
			App.loadLatestItems('<?php echo $server;?>', <?php echo $this->config->config_entry('modules|last_market_items_count');?>, 20);
		});
	</script>
	<div id="lattest_items"></div>
	<div class="flex-c-c">
	<?php
	foreach($this->website->server_list() as $key => $server){
		if($server['visible'] == 1){
	?>
		<a href="#" id="switch_items_<?php echo $key; ?>" data-count="<?php echo $this->config->config_entry('modules|last_market_items_count'); ?>" data-limit="20" class="button-market" style="margin-left: 5px;"><?php echo $server['title']; ?></a>
	<?php
		}
	}
	?>
	</div>
</div>	
<?php } ?>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>