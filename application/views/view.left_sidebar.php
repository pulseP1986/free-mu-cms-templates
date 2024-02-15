<div class="widget-panel-left">
	<?php $ranking_config = $this->config->values('rankings_config');?>
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
			 <div class="widget-block-span"></div>
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
			 <div class="widget-block-span"></div>
			<?php } ?>
		<?php 
			break;
		} 
	} if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
	<div class="widget-block">
		 <div class="info-widget-block top-event flex-s">
			<h2 class="title-widget-block"><?php echo __('Events');?></h2>
		</div>
		<div style="max-height: 500px;overflow-y: auto;">
			<ul class="event-timers" id="events"></ul>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				App.getEventTimes();
			});
		</script>
	</div>
	 <div class="widget-block-span"></div>
	<?php } ?>
</div>