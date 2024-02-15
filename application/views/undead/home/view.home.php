<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="topBlocksNews">
	<div class="row">
		<div class="col">
			<div class="topNews home-block">
				<span class="corner-top-left corner-top-left-yellow"></span>
				<div class="home-block-title flex-s">
					<?php echo __('Last news');?> <a href="<?php echo $this->config->base_url; ?>home/all"><?php echo __('all news');?></a>
				</div>
				<?php if(!empty($news)){ ?>
				<ul class="last-news-list">
					<?php foreach($news as $key => $article){ ?>
					<li>
						<a href="<?php echo $article['url']; ?>" class="last-news-list_link"><?php echo $article['title']; ?></a>
						<div class="last-news-list_date">
							<span><?php echo date('d', $article['time']); ?></span> <?php echo date('M Y', $article['time']); ?>
						</div>
						<a href="<?php echo $article['url']; ?>" class="button last-news-list_button"><?php echo __('More');?></a>
					</li>
					<?php } ?>
				</ul>
				<?php } ?>
			</div>
		</div>
		<div class="col">
			<div class="topSlider home-block">
				<span class="corner-top-left corner-top-left-purple"></span>
				<div class="top-slider">
					<div class="top-slide">
						<a href="#"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/banner.jpg" alt=""></a>
					</div>
					<div class="top-slide">
						<a href="#"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/banner.jpg" alt=""></a>
					</div>
					<div class="top-slide">
						<a href="#"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/banner.jpg" alt=""></a>
					</div>
				</div>
			</div>
			<script>
			$(document).ready(function(){
				$('.top-slider').slick({
					infinite: true,
					dots: true
				});
			});
			</script>
		</div>
	</div>
</div><!--topBlocksNews-->
<?php
$ranking_config = $this->config->values('rankings_config');
$serverList = $this->website->server_list();
?>
<div class="homeTop">
	<div class="row">
		<div class="col">
			<div class="home-block home-block-top">
				<span class="corner-top-left corner-top-left-blue"></span>
				<div class="home-block-title">
					<?php echo __('Top Players');?>
				</div>
				<div class="table-top-scroll">
					<?php
					foreach($ranking_config AS $srv => $data){
						if($data['active'] == 1){
							if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
								echo '<script>
										$(document).ready(function () {
											App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
										});
										</script>
										<div id="top_players"></div>';
							}
						}
						break;
					}
					?>	
				</div>
				<?php
				if(count($serverList) > 1){	
					echo '<div class="more">';
					foreach($serverList as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
							echo ' <a class="more-button button" href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '">' . $server['title'] . '</a>';
						}
					}
					echo '</div>';
				}
				else{
				?>
				<div class="more">
					<a href="<?php echo $this->config->base_url; ?>rankings" class="more-button button"><?php echo __('More');?></a>
				</div>
				<?php } ?>
			</div>
		</div>
		<div class="col">
			<div class="home-block home-block-top">
				<span class="corner-top-left corner-top-left-purple"></span>
				<div class="home-block-title">
					<?php echo __('Top Guilds');?>
				</div>
				<div class="table-top-scroll">
					<?php
					foreach($ranking_config AS $srv => $data){
						if($data['active'] == 1){
							if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
								echo '<script>
										$(document).ready(function () {
											App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
										});
										</script>
										<div id="top_guilds"></div>';
							}
						}
						break;
					}
					?>
				</div>
				<?php
				if(count($serverList) > 1){	
					echo '<div class="more">';
					foreach($serverList as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
							echo ' <a class="more-button button" href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a>';
						}
					}
					echo '</div>';
				}
				else{
				?>
				<div class="more">
					<a href="<?php echo $this->config->base_url; ?>rankings" class="more-button button"><?php echo __('More');?></a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div><!--homeTop-->
<div class="midBlock">
	<div class="row">
		<div class="col">
			<div class="mid-block mid-block-forum">
				<div class="mid-block_text">
					<p><?php echo __('Forum');?></p>
					<span><?php echo __('Detailed information');?></span>
				</div>
				<a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" class="button mid-block_button"><?php echo __('More');?></a>
			</div>
			<div class="mid-block mid-block-donation">
				<div class="mid-block_text">
					<p><?php echo __('Donation');?></p>
					<span><?php echo __('Detailed information');?></span>
				</div>
				<a href="<?php echo $this->config->base_url; ?>donate" class="button mid-block_button"><?php echo __('More');?></a>
			</div>
			<div class="mid-block mid-block-statistics">
				<div class="mid-block_text">
					<p><?php echo __('Statistics');?></p>
					<span><?php echo __('Detailed information');?></span>
				</div>
				<a href="<?php echo $this->config->base_url; ?>" class="button mid-block_button"><?php echo __('More');?></a>
			</div>
			<div class="social flex-s">
				<a href="#" class="socBlock socBlock-facebook">
					<i class="soc-icon soc-icon-facebook"></i>
					<div class="socBlock-text">
						<p><?php echo __('Facebook');?></p>
						<span><?php echo __('Right now!');?></span>
					</div>
				</a>
				<a href="#" class="socBlock socBlock-twitch">
					<i class="soc-icon soc-icon-twitch"></i>
					<div class="socBlock-text">
						<p><?php echo __('Twitch');?></p>
						<span><?php echo __('Right now!');?></span>
					</div>
				</a>
				<a href="#" class="socBlock socBlock-discord">
					<i class="soc-icon soc-icon-discord"></i>
					<div class="socBlock-text">
						<p><?php echo __('Discord');?></p>
						<span><?php echo __('Right now!');?></span>
					</div>
				</a>
			</div>
		</div>
		<div class="col">
			<div class="home-block home-block-top">
				<span class="corner-top-left corner-top-left-purple"></span>
				<div class="home-block-title">
					<?php echo __('Events');?>
				</div>
				<?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?> 
				<div style="max-height: 450px;overflow-y: auto;">
					<ul class="events-table" id="events"></ul>
				</div>
				<script type="text/javascript">
					$(document).ready(function () {
						App.getEventTimes();
					});
				</script>
				<?php } ?>
				
			</div>
		</div>
	</div>
</div><!--midBlock-->
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>