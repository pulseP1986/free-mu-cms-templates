<aside class="left-sidebar">
		<a href="<?php echo $this->config->base_url; ?>downloads" class="download-button bright">
			<span>Game client 3,45 Gb</span>
		</a>
		<?php	
		foreach($this->website->check_server_status() as $key => $value){
			if($value['visible'] == 1){
		?>
		<div class="serverBlock flex-c">
			<div>
				<div class="server-title">
					<?php echo $value['title']; ?>
				</div>
				<div class="server-progress">
					<span class="progress-bar" style="width: <?php echo intval($value['players']*100/1000); ?>%;"></span>
				</div>
				<div class="server-online flex-s">
					Online: <span><?php echo $value['players']; ?></span>
				</div>
			</div>
		</div><!--serverBlock-->
		<?php
			}
		}
		?>	
		<div class="socBlock flex">
			<a href="" class="flex-c">
				<div class="icon">
					<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/fb-icon.png" alt="facebook">
				</div>
				facebook
			</a>
			<a href="" class="flex-c">
				<div class="icon">
					<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/yt-icon.png" alt="youtube">
				</div>
				youtube
			</a>
			<a href="" class="flex-c">
				<div class="icon">
					<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/twr-icon.png" alt="twitter">
				</div>
				twitter
			</a>
			<a href="" class="flex-c">
				<div class="icon">
					<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/twh-icon.png" alt="twitch">
				</div>
				twitch
			</a>
		</div>
		<?php
		$ranking_config = $this->config->values('rankings_config');
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo '<div class="block">
									<div class="blockTitle">
										<p>TOP PLAYERS</p>
										<span>The best players of our project!</span>
									</div>
							<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'players\', \''.$srv.'\', '.$data['player']['count_in_sidebar'].');
								});
								</script>
								<div id="top_players"></div>
								<br/>
							<span style="margin: 0 auto; display: block; text-align: center; margin-bottom: 1rem;">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['player'])){
										echo '<a href="#" class="custom_button" id="switch_top_players_'.$key.'" data-count="'.$ranking_config[$key]['player']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span></div>';
					
				}			
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?>
		<?php if ($this->config->values('event_config', array('events', 'active')) == 1) { ?>
		<div class="block">
			<div class="blockTitle">
				<p>EVENTS</p>
				<span>Server Events</span>
			</div>
			<div class="tableBlock table-event">
				<div class="tableBlock-body">
						<div id="events"></div>
						<script type="text/javascript">
							$(document).ready(function() {
								App.getEventTimes();
							});
						</script>	
				</div>
			</div>	
		</div>	
		<?php } ?>	
		<div class="block">
			<div class="blockTitle">
				<p>FAST LINK</p>
			</div>
			<ul class="fast-links">
				<li>
					<a href="">Item Shop </a>
				</li>
				<li>
					<a href="">Media Wallpapers</a>
				</li>
				<li>
					<a href="">Download Fiels</a>
				</li>
				<li>
					<a href="">Forum Community</a>
				</li>
				<li>
					<a href="">News and Events</a>
				</li>
				<li>
					<a href="">Guilds and Info</a>
				</li>
			</ul>
		</div><!--block-->
</aside>
<!-- left-sidebar -->