<div class="block-widget-1 d-none d-sm-none d-ml-block d-lg-block  d-xl-block" <?php if($this->request->get_controller() == 'wheel_of_fortune'){ ?>style="display:none !important;"<?php } ?>>
	<?php if($this->request->get_controller() == 'guides'){ ?>
	<div class="widget-fon-discussions block-players-1"><!--block-TOP PLAYERS-->
				<div class="block-widget-title discussions-title">
					<?php echo __('Categories');?>
				</div>	
				<?php
				$catConfig = $this->config->values('guides_category');
				?>
				<table class="sidebar_rank" style="position: relative; z-index: 999999;">
				<tbody>
				<?php if($this->request->get_method() == 'category' && !empty($guides)){ ?>
				<?php foreach($guides as $key => $article){ ?>
				<tr>
					<td style="font-size: 14px; text-align: left; padding: 15px 0px 15px 40px;">
					<b style="color: #c99a41;"><i class="fas fa-angle-double-right"></i></b> <a href="<?php echo $this->config->base_url;?>guides">Main Category</a>
					</td>
				</tr>
				<tr>
					<td style="font-size: 14px; text-align: left; padding: 15px 0px 15px 40px;">
					<b style="color: #c99a41;"><i class="fas fa-angle-double-right"></i></b> <a href="<?php echo $this->config->base_url; ?>guides/read/<?php echo $this->website->seo_string($article['title']); ?>/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
					</td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<?php if($this->request->get_method() == 'read' && !empty($guides)){ ?>
				<?php foreach($guides as $key => $article){ ?>
				<tr>
					<td style="font-size: 14px; text-align: left; padding: 15px 0px 15px 40px;">
					<b style="color: #c99a41;"><i class="fas fa-angle-double-right"></i></b> <a href="<?php echo $this->config->base_url;?>guides">Main Category</a>
					</td>
				</tr>
				<tr>
					<td style="font-size: 14px; text-align: left; padding: 15px 0px 15px 40px;">
					<b style="color: #c99a41;"><i class="fas fa-angle-double-right"></i></b> <a href="<?php echo $this->config->base_url; ?>guides/read/<?php echo $this->website->seo_string($article['title']); ?>/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
					</td>
				</tr>
				<?php } ?>
				<?php } else { ?>
				<?php foreach($catConfig as $key => $cat){ ?>
				<tr>
					<td style="font-size: 14px; text-align: left; padding: 15px 0px 15px 40px;">
					<b style="color: #c99a41;"><i class="fas fa-angle-double-right"></i></b> <a href="<?php echo $this->config->base_url;?>guides/category/<?php echo $key;?>"><?php echo $cat['name'];?></a>
					</td>
				</tr>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				</tbody>
				</table>
			</div>
	<?php } else { ?>
	<?php $ranking_config = $this->config->values('rankings_config');?>
	<?php 
	foreach($ranking_config AS $srv => $data){
		if($data['active'] == 1){
			if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
	?>
			<div class="widget-fon-discussions block-players-1"><!--block-TOP PLAYERS-->
				<div class="block-widget-title discussions-title">
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
			<?php } ?>
			<div class="block-left"></div>
			<?php if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){ ?>
			<div class="widget-fon-discussions block-players-2"><!--block-TOP GUILDS-->
				<div class="block-widget-title discussions-title">
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
			<?php } ?>
		<?php } ?>
	<?php 
		break;
	} 
	?>	
	<?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
	<div class="block-left"></div>
	<div class="widget-fon-discussions fon-event"><!--block-EVENT-->
		<div class="block-widget-title discussions-title">
			<?php echo __('Events');?>
		</div>
		<div class="discussions-content-top"  style="max-height: 450px;overflow-y: auto;">
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
	<div class="block-left"></div>
	<div class="widget-fon-discussions fon-market"><!--block-MARKET-->
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
	<?php } ?>
</div>