<div class="discord">
	<div class="tabs tabsBlock">
		<ul class="tabs-caption tabs-button">
			<?php
				$ranking_config = $this->config->values('rankings_config');
				$i = 1;
				foreach($ranking_config AS $srv => $data){
					if($data['active'] == 1){
						if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
							echo '<li class="active">'.__('Players').'</li>';
						}
						if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
							echo '<li>'.__('Guilds').'</li>';
						}
					}
					
					if($i == 1){
						break;
					}
					$i++;
				}
				if($this->config->values('event_config', array('events', 'active')) == 1){
					echo '<li>'.__('Event').'</li>';
				}
			?>

		</ul>
		<div class="tabBlock">
		<?php
		$i = 1;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1) {
				if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
					echo '<div class="tabs-content active tabContent">
						<script>
							$(document).ready(function () {
								App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
							});
						</script>
						<div id="top_players" style="height: 440px;"></div>';
					foreach($this->website->server_list() as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['player'])){
							echo '<a href="#" id="switch_top_players_' . $key . '" data-count="' . $ranking_config[$key]['player']['count_in_sidebar'] . '" class="button" style="margin-top: 1rem;">' . $server['title'] . '</a> ';
						}
					}
					echo '</div>';
				}
				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
					echo '<div class="tabs-content tabContent">
						<script>
						$(document).ready(function () {
							App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
						});
						</script>
						<div id="top_guilds" style="height: 440px;"></div>';
					foreach($this->website->server_list() as $key => $server){
						if($server['visible'] == 1 && isset($ranking_config[$key]['guild'])){
							echo '<a href="#" id="switch_top_guilds_' . $key . '" data-count="' . $ranking_config[$key]['guild']['count_in_sidebar'] . '" class="button" style="margin-top: 1rem;">' . $server['title'] . '</a> ';
						}
					}
					echo '</div>';
				}
			
			if($i == 1){
				break;
			}
			$i++;
		}
	}
	if($this->config->values('event_config', array('events', 'active')) == 1){
	?>
		<div class="tabs-content tabContent">
			<div id="events"></div>
			<script type="text/javascript">
				$(document).ready(function() {
					App.getEventTimes();
				});
			</script>
		</div>
	<?php } ?>
		</div>
	</div>
</div>