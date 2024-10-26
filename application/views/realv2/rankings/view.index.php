<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<div class="col-lg-3">
		<div class="pt-15"></div>
		<aside class="sidebar-area sticky-top overflow-hidden">
			<div class="vs-sidebox bg-major-black">
				<?php 
				foreach($this->website->server_list() as $key => $servers){ 
					if($servers['visible'] == 1){
				?>
				<h3 class="sidebox-title text-white h5"><?php echo $servers['title']; ?></h3>
				<div id="rankings_select_<?php echo $key; ?>">
					<ul class="vs-cat-list1">
						<?php if(isset($config['player']['count']) && $config['player']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="players_ranking_<?php echo $key; ?>"><?php echo __('Top Players'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['guild']['count']) && $config['guild']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="guilds_ranking_<?php echo $key; ?>"><?php echo __('Top Guilds'); ?></a></li>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="gw_ranking_<?php echo $key; ?>"><?php echo __('Top Guild War'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['killer']['count']) && $config['killer']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="killer_ranking_<?php echo $key; ?>"><?php echo __('Top Killers'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['voter']['count']) && $config['voter']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="votereward_ranking_<?php echo $key; ?>"><?php echo __('Top Voters'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['online']['count']) && $config['online']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="online_ranking_<?php echo $key; ?>"><?php echo __('Top Online'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['gens']['count']) && $config['gens']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="gens_ranking_<?php echo $key; ?>"><?php echo __('Top Gens'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['bc']['count']) && $config['bc']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="bc_ranking_<?php echo $key; ?>"><?php echo __('Top BC'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['ds']['count']) && $config['ds']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="ds_ranking_<?php echo $key; ?>"><?php echo __('Top DS'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['cc']['count']) && $config['cc']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="cc_ranking_<?php echo $key; ?>"><?php echo __('Top CC'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['duels']['count']) && $config['duels']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="duels_ranking_<?php echo $key; ?>"><?php echo __('Top Duels'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['active']) && $config['active'] == 1){ ?>
						<li><a class="select_option pr-10 pl-15" href="<?php echo $this->config->base_url; ?>rankings/online-players/<?php echo $key; ?>"><?php echo __('Online Players'); ?></a></li>
						<?php } ?>
						<?php
						$plugins = $this->config->plugins();
						if(!empty($plugins)){
							foreach($plugins AS $plugin){
								if($plugin['installed'] == 1 && isset($plugin['rankings_panel_item']) && $plugin['rankings_panel_item'] == 1){
									if(mb_substr($plugin['module_url'], 0, 4) !== "http"){
										$plugin['module_url'] = $this->config->base_url . $plugin['module_url'];
									}
									?>
									<li><a class="select_option pr-10 pl-15" href="<?php echo $plugin['module_url']; ?>"><?php echo __($plugin['about']['name']); ?></a></li>
								<?php
								}
							}
						}
						?>
					</ul>
				</div>
				<br />
				<?php }} ?>
			</div>
		</aside>
	</div>
	<div class="col-lg-9">
		<script>
		$(document).ready(function () {
			$('#top_list').show();
			<?php if (isset($config['player']['count']) && $config['player']['count'] > 0): ?>
			App.populateRanking('players', '<?php echo $server; ?>');
			<?php elseif (isset($config['guild']['count']) && $config['guild']['count'] > 0): ?>
			App.populateRanking('guilds', '<?php echo $server; ?>');
			<?php elseif (isset($config['killer']['count']) && $config['killer']['count'] > 0): ?>
			App.populateRanking('killer', '<?php echo $server; ?>');
			<?php elseif (isset($config['voter']['count']) && $config['voter']['count'] > 0): ?>
			App.populateRanking('votereward', '<?php echo $server; ?>');
			<?php elseif (isset($config['online']['count']) && $config['online']['count'] > 0): ?>
			App.populateRanking('online', '<?php echo $server; ?>');
			<?php elseif (isset($config['gens']['count']) && $config['gens']['count'] > 0): ?>
			App.populateRanking('gens', '<?php echo $server; ?>');
			<?php elseif (isset($config['bc']['count']) && $config['bc']['count'] > 0): ?>
			App.populateRanking('bc', '<?php echo $server; ?>');
			<?php elseif (isset($config['ds']['count']) && $config['ds']['count'] > 0): ?>
			App.populateRanking('ds', '<?php echo $server; ?>');
			<?php elseif (isset($config['cc']['count']) && $config['cc']['count'] > 0): ?>
			App.populateRanking('cc', '<?php echo $server; ?>');
			<?php elseif (isset($config['duels']['count']) && $config['duels']['count'] > 0): ?>
			App.populateRanking('duels', '<?php echo $server; ?>');
			<?php endif;?>
		});
		</script>
		<div class="vs-blog mt-15" id="rankings_content"></div>
	</div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	