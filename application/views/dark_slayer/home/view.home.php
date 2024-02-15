<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="block-news carousel-block">
	<div class="block-title">
		<h1><?php echo __('NEWS');?></h1>
	</div> 
	<div class="block-news-content">
		<section class="regular">
			<?php 
			if(!empty($news)){ 
			foreach($news as $key => $article){
			?>
			<div class="carousel-s">
			<div class="news">
				<div class="news-img">
					<?php if(mb_strlen($article['icon']) > 6){ ?>
					<a href="<?php echo $article['url']; ?>"><img src="<?php echo $article['icon']; ?>" alt=""></a>
					<?php } ?>
					<div class="news-info">
						<h3><?php echo $article['title']; ?></h3>
						<p><?php echo strip_tags($article['content']); ?></p>
						<div class="date">
							<span><?php echo date('d', $article['time']); ?></span><?php echo date('.m.Y', $article['time']); ?>
						</div>
					</div>
				</div>
				<div class="read-more">
					<div class="button"><a href="<?php echo $article['url']; ?>"><?php echo __('More');?></a></div>
				</div>
			</div><!-- news-->
			</div>
			<?php }} ?>
		</section>   
	</div>       		
</div>
<div class="block-top-page">
	<div class="block-title">
		<h1><?php echo __('TOP PAGE');?></h1>
	</div>
	<?php
	$ranking_config = $this->config->values('rankings_config');
	$serverList = $this->website->server_list();
	?>
	<div class="top-page flex-s-c">
		<div class="widget players-pvp">
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
					if(count($serverList) > 1){			
						echo '<span style="float:right;margin-right:28px">';
						foreach($serverList as $key => $server){
							if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
								echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
							}
						}
						echo '</span>';
					}
				}
			}
			break;
		}
		?>	
		<div class="read-more">
			<div class="button"><a href="<?php echo $this->config->base_url;?>rankings"><?php echo __('More');?></a></div>
		</div>
	</div>
	<div class="widget players-pk">
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
					if(count($serverList) > 1){			
						echo '<span style="float:right;margin-right:28px">';
						foreach($serverList as $key => $server){
							if($server['visible'] == 1 && isset($ranking_config[$key]['guild'])){
								echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '">' . $server['title'] . '</a> ';
							}
						}
						echo '</span>';
					}
				}
			}
			break;
		}
		?>
		<div class="read-more">
			<div class="button"><a href="<?php echo $this->config->base_url;?>rankings"><?php echo __('More');?></a></div>
		</div>
	</div>
	<div class="widget forum">
			<div class="widget-title flex-s-c">
				<h2><?php echo __('Events');?></h2>
			</div>
		<div class="discussions-content" style="max-height: 470px;overflow-y: auto;">
			<?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
			<ul class="event-timers" id="events"></ul>
			<script type="text/javascript">
				$(document).ready(function () {
					App.getEventTimes();
				});
			</script>
			<?php } ?>

		</div>
	</div>
	</div>
</div>
<div class="block-media">
	<div class="block-title">
		<h1>media</h1>
	</div>
	<div class="block-media-content flex-s-c">
		<div class="block-media-left">
			<a href="" class="video video-big" style="background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-big.jpg') center no-repeat">
				<div class="videoTitle">
					New video - Welcome! 
				</div>
			</a>
		</div>
		<div class="block-media-right">
			<a href="" class="video video-small" style="background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-small-1.jpg') center no-repeat">
				<div class="videoTitle">
					New video - Welcome! 
				</div>
			</a>
			<div class="block-media-bottom"></div>
			<a href="" class="video video-small" style="background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/media-small-2.jpg') center no-repeat">
				<div class="videoTitle">
					New video - Welcome! 
				</div>
			</a>
		</div>
	</div>	
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>