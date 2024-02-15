<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="lastNews">
	<span class="titleWeb"><?php echo __('Last News'); ?></span>
	<div class="news flex-s">
		<?php 
		if(!empty($news)){
			$i = 1;
			$ii = 1;
			foreach($news as $key => $article){
				if($i >= 4){
					$i = 1;	
				}
				
		?>
		<div class="newsBlock" style="margin-top: 20px;">
			<span class="corner corner-left-top"></span>
			<span class="corner corner-right-top"></span>
			<span class="corner corner-right-bottom"></span>
			<span class="corner corner-left-bottom"></span>
			<div class="newsBlock-img">
				<a href="<?php echo $article['url']; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/news-img_<?php echo $i;?>.jpg" alt=""></a>
			</div>
			<div class="newsBlock-bottom">
				<div class="newsBlock-title">
					<a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
				</div>
				<div class="newsBlock-text">
					<?php echo str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content'])))); ?>
				</div>
				<div class="newsBlock-info flex-s-c">
					<div class="newsBlock-button">
						<a href="<?php echo $article['url']; ?>" class="button button-small"><?php echo __('more'); ?></a>
					</div>
					<div class="newsBlock-date">
						<span><?php echo date('d', $article['time']); ?></span><?php echo date('/m/Y', $article['time']); ?>
					</div>
				</div>
			</div>
		</div><!--newsBlock-->
		<?php
				
				$i++;
				$ii++;
				
			}
		}
		else{
			echo '<div class="alert alert-primary">'.__('No news articles.').'</div>';
		}
		?>
	</div>
</div><!--lastNews-->
<?php
$ranking_config = $this->config->values('rankings_config');
$serverList = $this->website->server_list();
?>
<div class="middleBlock flex-s">
	<div class="middleBlock-top">
		<span class="titleWeb"><?php echo __('Top Players');?></span>
		<div class="block">
			<span class="corner corner-left-top"></span>
			<span class="corner corner-right-top"></span>
			<span class="corner corner-right-bottom"></span>
			<span class="corner corner-left-bottom"></span>
			<?php
				foreach($ranking_config AS $srv => $data){
					if($data['active'] == 1){
						if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
							echo '<div class="topTable">';
							echo '<script>
									$(document).ready(function () {
										App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
									});
									</script>
									<div id="top_players"></div></div>';
							if(count($serverList) >= 1){	
								echo '<div class="topButton">';
								foreach($serverList as $key => $server){
									if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
										echo '<a class="button button-small" href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
									}
								}
								echo '</div>';
							}
						}
						break;
					}
				}
				?>	
		</div><!--block-->
	</div>
	<div class="middleBlock-top">
		<span class="titleWeb"><?php echo __('Top Guilds');?></span>
		<div class="block">
			<span class="corner corner-left-top"></span>
			<span class="corner corner-right-top"></span>
			<span class="corner corner-right-bottom"></span>
			<span class="corner corner-left-bottom"></span>
			<?php
				foreach($ranking_config AS $srv => $data){
					if($data['active'] == 1){
						if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
							echo '<div class="topTable">';
							echo '<script>
									$(document).ready(function () {
										App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
									});
									</script>
									<div id="top_guilds"></div></div>';
							if(count($serverList) >= 1){	
								echo '<div class="topButton">';
								foreach($serverList as $key => $server){
									if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
										echo '<a class="button button-small" href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
									}
								}
								echo '</div>';
							}
						}
						break;
					}
				}
				?>	
		</div><!--block-->
	</div>
	<div class="middleBlock-top">
		<span class="titleWeb"><?php echo __('Events');?></span>
		<div class="block">
			<span class="corner corner-left-top"></span>
			<span class="corner corner-right-top"></span>
			<span class="corner corner-right-bottom"></span>
			<span class="corner corner-left-bottom"></span>
			<?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
			<div id="events"></div>
			<script type="text/javascript">
				$(document).ready(function () {
					App.getEventTimes();
				});
			</script>
			<?php } else { ?>
			<div class="alert alert-primary"><?php echo __('Event timers not configured.');?></div>
			<?php } ?>
			
		</div><!--block-->
	</div>
</div><!--middleBlock-->
<div class="mediaWeb">
	<span class="titleWeb"><?php echo __('Media');?></span>
	<div class="block">
		<span class="corner corner-left-top"></span>
		<span class="corner corner-right-top"></span>
		<span class="corner corner-right-bottom"></span>
		<span class="corner corner-left-bottom"></span>
		<div class="mediaBlock">
			<div class="media-slider">
				<div><a href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_1.jpg" class="lightzoom"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_1.jpg" alt=""></a></div>
				<div><a href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_2.jpg" class="lightzoom"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_2.jpg" alt=""></a></div>
				<div><a href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_3.jpg" class="lightzoom"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_3.jpg" alt=""></a></div>
				<div><a href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_4.jpg" class="lightzoom"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_4.jpg" alt=""></a></div>
				<div><a href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_5.jpg" class="lightzoom"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-img_5.jpg" alt=""></a></div>
			</div>
		</div>
	</div>
</div><!--media-->
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>