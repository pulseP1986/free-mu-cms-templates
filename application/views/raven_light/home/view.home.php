<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<main class="main">
	<?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
	<div class="events">
		<div class="b-title">
			<span>Events</span>
		</div>
		<div class="eventBlocks flex">
			<a href="#eventBlock-events" class="eventBlock eventBlock-events open_modal">
				EVENTS <br> COUNTDOWN
			</a>
			<a href="#eventBlock-castle" class="eventBlock eventBlock-bosses open_modal">
				CASTLE SIEGE <br> COUNTDOWN
			</a>
		</div>
		
	</div><!--events-->
	<?php } ?>
	<div class="mainTable flex-s">
		<div class="tableRank">
			<span class="borderTop"></span>
			<div class="tabs tabdBlocks">
				<div class="table-t">
					<div class="table-title"><?php echo __('Rankings');?></div>
					<ul class="tabs-caption tabs-buttons">
						<li class="active"><?php echo __('Players');?></li>
						<li><?php echo __('Guilds');?></li>
					</ul>
				</div>
				<?php
				$ranking_config = $this->config->values('rankings_config');
				$serverList = $this->website->server_list();
				foreach($ranking_config AS $srv => $data){
					if($data['active'] == 1){
						if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
							echo '<div class="tabs-content tabContent active">';
							echo '<script>
									$(document).ready(function () {
										App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
									});
									</script>
									<div id="top_players"></div>';
							if(count($serverList) > 1){			
								echo '<span style="float:right;margin-right:28px">';
								foreach($serverList as $key => $server){
									if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
										echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
									}
								}
								echo '</span>';
							}
							echo '</div>';
						}
						if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
							echo '<div class="tabs-content tabContent">';
							echo '<script>
									$(document).ready(function () {
										App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
									});
									</script>
									<div id="top_guilds"></div>';
							if(count($serverList) > 1){			
								echo '<span style="float:right;margin-right:28px">';
								foreach($serverList as $key => $server){
									if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
										echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
									}
								}
								echo '</span>';
							}
							echo '</div>';
						}
					}
				}
				?>		
			</div>
		</div>
		<div class="tableRank">
			<span class="borderTop"></span>
			<div class="tabs tabdBlocks">
				<div class="table-t">
					<div class="table-title"><?php echo __('News');?></div>
					<ul class="tabs-caption tabs-buttons">
						<li class="active"><?php echo __('News');?></li>
						<li><?php echo __('Announcement');?></li>
						<li><?php echo __('Event');?></li>
						<li><?php echo __('Update');?></li>
					</ul>
				</div>
				<div class="tabs-content tabContent active">
					<div class="newsBlock">
					<?php 
					foreach($this->Mhome->load_news_by_type(1) as $key => $article){ 
					?>
					<a href="<?php echo $article['url']; ?>" class="news">
						<div class="news-title"><?php echo $article['title']; ?></div>
						<div class="news-date"><?php echo date(DATE_FORMAT, $article['time']); ?></div>
					</a>
					<?php
					}
					?>
					</div>
					
				</div>
				<div class="tabs-content tabContent">
					<div class="newsBlock">
					<?php 
					foreach($this->Mhome->load_news_by_type(2) as $key => $article){ 
					?>
					<a href="<?php echo $article['url']; ?>" class="news">
						<div class="news-title"><?php echo $article['title']; ?></div>
						<div class="news-date"><?php echo date(DATE_FORMAT, $article['time']); ?></div>
					</a>
					<?php
					}
					?>
					</div>
				</div>
				<div class="tabs-content tabContent">
					<div class="newsBlock">
					<?php 
					foreach($this->Mhome->load_news_by_type(3) as $key => $article){ 
					?>
					<a href="<?php echo $article['url']; ?>" class="news">
						<div class="news-title"><?php echo $article['title']; ?></div>
						<div class="news-date"><?php echo date(DATE_FORMAT, $article['time']); ?></div>
					</a>
					<?php
					}
					?>
					</div>
				</div>
				<div class="tabs-content tabContent">
					<div class="newsBlock">
					<?php 
					foreach($this->Mhome->load_news_by_type(4) as $key => $article){ 
					?>
					<a href="<?php echo $article['url']; ?>" class="news">
						<div class="news-title"><?php echo $article['title']; ?></div>
						<div class="news-date"><?php echo date(DATE_FORMAT, $article['time']); ?></div>
					</a>
					<?php
					}
					?>
					</div>
				</div>
			</div><!--tabdBlocks-->
			<div class="blockMore">
				<div class="blockMore-container flex-c-c">
					<a href="<?php echo $this->config->base_url;?>guides" class="block-more block-more-guides">
						<p><?php echo __('Guides');?></p>
						<span><?php echo __('Center');?></span>
					</a>
					<a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" class="block-more block-more-forum">
						<p><?php echo __('Forum');?></p>
						<span><?php echo __('Community');?></span>
					</a>
				</div>
			</div>
		</div>
	</div><!--mainTable-->
</main>
</div>
<div class="newBlock">
	<div class="container">
		<div class="new">
			<div class="new-title">
				<p>New Era</p>
				<span>Begins...</span>
			</div>
			<div class="new-text">
				Perfect balanced world, epic battles and rich players and guilds community are waiting for you now!
			</div>
		</div>
		<a href="<?php echo $this->config->base_url;?>registration" class="button play-now">Play Now!</a>
	</div>
</div><!--newBlock-->
<div class="mediaMain">
	<div class="container">
		<span class="borderTop borderTop-big"></span>
		<div class="mediaWeb">
			<div class="media-title flex-s-c">
				<span><?php echo __('Media');?></span>
				<a href="<?php echo $this->config->base_url;?>media/wallpapers" class="more"><?php echo __('All Media');?> <i class="icon icon-plus"></i></a>
			</div>
			<?php 
			$media = $this->website->load_wallpapers_shoots(6);
			if($media != false){
			?>
			<div class="media-slider">	
			<?php
				foreach($media AS $image){
			?>
			<div class="mediaSlide">
				<a href="<?php echo $this->config->base_url . 'assets/uploads/normal/' . $image['name']; ?>" class="lightzoom media-img"><img src="<?php echo $this->config->base_url . 'assets/uploads/thumb/' . $this->website->strstr_alt($image['name'], '.', true) . '_thumb' . $this->website->strstr_alt($image['name'], '.', false); ?>" alt=""></a>
			</div>
			<?php
				}
			?>
			</div>
			<?php
			}
			else{
			?>
			<div class="alert alert-warning" role="alert" style="margin-top:10px;"><?php echo __('No media images.');?></div>
			<?php
			}
			?>
		</div>
	</div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>