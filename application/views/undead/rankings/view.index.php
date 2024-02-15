<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Rankings'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('List top players, guilds and others');?>
					</h2>
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
				</div>
			</div>	
			<div class="mt-2"></div>
			<div id="top_list" class="rankings">
				<div class="row">
					<div class="col-12">  
						
						<div class="selectTop">
							<?php
								$active = __('Server');
								$items = '';
								foreach($this->website->server_list() as $key => $servers){
									if($servers['visible'] == 1){
										if($active == __('Server')){
											$active = ($server == $key) ? $servers['title'] : __('Server');
										}
										$items .= ' <li class="select_option"><a href="'.$this->config->base_url . 'rankings/index/' . $key.'">'.$servers['title'].'</a></li>';
									}
								}
							?>	
							<div class="select" tabindex="1" style="margin-right: 5px;">
								<span class="select_value"><?php echo $active;?></span>
								<ul class="select_dropdown" id="rankings_select_<?php echo $server; ?>">
								  <?php echo $items;?>
								</ul>
							</div>
							<div class="select" tabindex="2" style="margin-right: 5px;">
								<span class="select_value">Select the type of rank</span>
								<ul class="select_dropdown" id="rankings_select_<?php echo $server; ?>">
								  <?php if(isset($config['player']['count']) && $config['player']['count'] > 0){ ?>
								  <li class="select_option" id="players_ranking_<?php echo $server; ?>"><?php echo __('Top Players'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['guild']['count']) && $config['guild']['count'] > 0){ ?>
								  <li class="select_option" id="guilds_ranking_<?php echo $server; ?>"><?php echo __('Top Guilds'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['killer']['count']) && $config['killer']['count'] > 0){ ?>
								  <li class="select_option" id="killer_ranking_<?php echo $server; ?>"><?php echo __('Top Killers'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['voter']['count']) && $config['voter']['count'] > 0){ ?>
								  <li class="select_option" id="votereward_ranking_<?php echo $server; ?>"><?php echo __('Top Voters'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['online']['count']) && $config['online']['count'] > 0){ ?>
								  <li class="select_option" id="online_ranking_<?php echo $server; ?>"><?php echo __('Top Online'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['gens']['count']) && $config['gens']['count'] > 0){ ?>
								  <li class="select_option" id="gens_ranking_<?php echo $server; ?>"><?php echo __('Top Gens'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['bc']['count']) && $config['bc']['count'] > 0){ ?>
								  <li class="select_option" id="bc_ranking_<?php echo $server; ?>"><?php echo __('Top BC'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['ds']['count']) && $config['ds']['count'] > 0){ ?>
								  <li class="select_option" id="ds_ranking_<?php echo $server; ?>"><?php echo __('Top DS'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['cc']['count']) && $config['cc']['count'] > 0){ ?>
								  <li class="select_option" id="cc_ranking_<?php echo $server; ?>"><?php echo __('Top CC'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['duels']['count']) && $config['duels']['count'] > 0){ ?>
								  <li class="select_option" id="duels_ranking_<?php echo $server; ?>"><?php echo __('Top Duels'); ?></li>
								  <?php } ?>
								  <?php if(isset($config['active']) && $config['active'] == 1){ ?>
								  <li class="select_option"><a href="<?php echo $this->config->base_url; ?>rankings/online-players/<?php echo $server; ?>"><?php echo __('Online Players'); ?></a></li>
								  <?php } ?>
								  <?php
									$plugins = $this->config->plugins();
									if(!empty($plugins)){
										foreach($plugins AS $plugin){
											if($plugin['installed'] == 1 && isset($plugin['rankings_panel_item']) && $plugin['rankings_panel_item'] == 1){
												?>
												<li class="select_option"><a href="<?php echo $plugin['module_url']; ?>"><?php echo __($plugin['about']['name']); ?></a></li>
											<?php
											}
										}
									}
								  ?>
								</ul>
							</div>
							<div class="select by_class" tabindex="2" style="margin-right: 5px;">
								<span class="select_value"><?php echo __('By Class');?></span>
								<ul class="select_dropdown" id="rankings_select_<?php echo $server; ?>">
									<li class="select_option" id="class_rankings_dw_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/dw.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Wizards'); ?>
									</li>
									<li class="select_option" id="class_rankings_dk_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/dk.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Knights'); ?>

									</li>	
									<li class="select_option" id="class_rankings_fe_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/fe.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Elfs'); ?>

									</li>	
									<li class="select_option" id="class_rankings_mg_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/mg.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Gladiators'); ?>

									</li>
									<li class="select_option" id="class_rankings_dl_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/dl.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Lords'); ?>

									</li>
									<li class="select_option" id="class_rankings_su_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/su.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Summoners'); ?>

									</li>
									<?php if(MU_VERSION >= 2){ ?>
									<li class="select_option" id="class_rankings_rf_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/rf.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Fighters'); ?>

									</li>
									<?php } ?>
									<?php if(MU_VERSION >= 5){ ?>
									<li class="select_option" id="class_rankings_gl_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/gl.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Lancers'); ?>

									</li>
									<?php } ?>
									<?php if(MU_VERSION >= 9){ ?>
									<li class="select_option" id="class_rankings_rw_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/rw.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('RuneWizards'); ?>

									</li>
									<?php } ?>
									<?php if(MU_VERSION >= 10){ ?>
									<li class="select_option" id="class_rankings_sl_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/sl.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Slayers'); ?>

									</li>
									<?php } ?>
									<?php if(MU_VERSION >= 11){ ?>
									<li class="select_option" id="class_rankings_gc_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/gc.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Crushers'); ?>
									</li>
									<?php } ?>
									<?php if(MU_VERSION >= 12){ ?>
									<li class="select_option" id="class_rankings_wm_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/wm.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Light Wizards'); ?>
									</li>
									<li class="select_option" id="class_rankings_lr_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/lr.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Lemuria Mages'); ?>
									</li>
									<?php } ?>
									<?php if(MU_VERSION >= 13){ ?>
									<li class="select_option" id="class_rankings_ik_<?php echo $server; ?>">
										<img style="border:1px solid #071e2c;  width:20px;" src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/ik.jpg" class="rankings-player-class-img rounded-image-corners">&nbsp;&nbsp;<?php echo __('Illusion Knight'); ?>
									</li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
				</div>		
				<div id="rankings_content_<?php echo $server; ?>"></div>
			</div>
		</div>
	</div>
</div>	
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	