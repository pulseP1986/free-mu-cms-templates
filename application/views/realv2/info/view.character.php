<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<div class="col-lg-3">
		<div class="pt-15"></div>
		<aside class="sidebar-area sticky-top overflow-hidden">
			<div class="vs-sidebox bg-major-black" id="top_list">
				<?php 
				foreach($this->website->server_list() as $key => $servers){ 
					if($servers['visible'] == 1){
						$config = $this->config->values('rankings_config', $key);
				?>
				<h3 class="sidebox-title text-white h5"><?php echo $servers['title']; ?></h3>
				<div id="rankings_select_<?php echo $key; ?>">
					<ul class="vs-cat-list1">
						<?php if(isset($config['player']['count']) && $config['player']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="players_ranking_<?php echo $key; ?>"><?php echo __('Top Players'); ?></a></li>
						<?php } ?>
						<?php if(isset($config['guild']['count']) && $config['guild']['count'] > 0){ ?>
						<li><a href="javascript:;" class="select_option pr-10 pl-15" id="guilds_ranking_<?php echo $key; ?>"><?php echo __('Top Guilds'); ?></a></li>
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
		<div class="vs-blog mt-15" id="rankings_content">
			<div class="blog-meta has-border bg-major-black">
				<h2 class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<a><?php echo __('Character Information');?></a>
				</h2>
			</div> 
			<div class="blog-content bg-major-black">
				<div class="row">
					<?php if(isset($error)){ ?>
					<div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
					<?php } else { ?>
					<div class="col-lg-4 text-center">
						<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template');?>/images/class/big/<?php echo strtoupper($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png" alt="<?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?>">
						<br/>
						<?php if(!$hidden){ ?>
						<?php
							$stat = __('Offline');
							$buttton = '';
							if($status != false){
								if($status['ConnectStat'] == 1){
									$stat = __('Online');
									$buttton = '-sec';
								}
							}
						?>
						<button class="vs-btn gradient-btn<?php echo $buttton;?> w-100 fs-18"><?php echo $stat;?></button> 
						<?php } else { ?>
						<button class="vs-btn gradient-btn w-100 fs-18"><?php echo __('Hidden');?></button> 
						<?php } ?>
					</div>
					<div class="col-lg-8">
						<div class="row">
							<div class="col-lg-12">
								<div class="space-10"></div>
								<div class="space-20"></div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-white"><?php echo __('Name');?></label>
									<div class="form-control bg-light-dark text-white py-15 fs-20"><?php echo $this->Mcharacter->char_info['Name']; ?></div> 
									<i class="fa fa-user mt-25"></i>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-white"><?php echo __('Level');?></label>
									<div class="form-control bg-light-dark text-white py-15 fs-20">
									<?php
									$level = $this->Mcharacter->char_info['cLevel'];
									if($this->config->values('rankings_config', [$server, 'player', 'display_master_level']) == 1){
										$level += $this->Mcharacter->char_info['mlevel'];
									}
									?>
									<?php echo $level;?>  <b class="fs-14"><?php echo __('LVL');?></b>
									</div> 
									<i class="fas fa-sort-numeric-up-alt mt-25"></i>
								</div>
							</div>
							<?php if($this->config->values('rankings_config', [$server, 'player', 'display_resets']) == 1){ ?>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-white"><?php echo __('Resets');?></label>
									<div class="form-control bg-light-dark text-white py-15 fs-20">
									<?php echo $this->Mcharacter->char_info['resets']; ?>
									</div> 
									<i class="fas fa-sort-numeric-up-alt mt-25"></i>
								</div>
							</div>
							<?php } ?>
							<?php if($this->config->values('rankings_config', [$server, 'player', 'display_gresets']) == 1){ ?>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-white"><?php echo __('Grand Resets');?></label>
									<div class="form-control bg-light-dark text-white py-15 fs-20">
									<?php echo $this->Mcharacter->char_info['grand_resets']; ?>
									</div> 
									<i class="fas fa-sort-numeric-up-alt mt-25"></i>
								</div>
							</div>
							<?php } ?>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-white"><?php echo __('Class');?></label>
									<div class="form-control bg-light-dark text-white py-15 fs-20">
									<?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?>
									</div> 
									<i class="fa fa-magic mt-25"></i>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-white"><?php echo __('Gens');?></label>
									<?php
									$family = $this->website->gens_gens_family($this->Mcharacter->char_info['Name'], $server, $this->config->values('rankings_config', [$server, 'gens', 'type'])); 
									$gimg = '';
									$gtitle = __('None');
									if($family != false){
										if($family['family'] == 1){
											$gimg = 'duprian.png';
											$gtitle = __('Duprian');
										}
										else{
											$gimg = 'vanert.png';
											$gtitle = __('Vanert');
										}
									}
									?>
									<div class="form-control bg-light-dark text-white py-15 fs-20">
									<?php echo $gtitle;?>
									</div>
									<?php if($gimg != ''){ ?>
									<i>
									<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template');?>/images/<?php echo $gimg;?>" class="mt-20" alt="<?php echo $gtitle;?>">
									</i>
									<?php } ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<?php 
									$g_name = __('No Guild');
									$logo = '';
									if(!isset($no_guild)){
										$g_name = '<a href="'.$this->config->base_url.'guild/'.bin2hex($guild_check['G_Name']).'/'.$server.'">'.$guild_check['G_Name'].'</a>';
										$logo = '<img src="'.$this->config->base_url.'rankings/get_mark/'.bin2hex($guild_info['G_Mark']).'/34" class="mt-20" />';
									}										
									?>
									<label class="text-white"><?php echo __('Guild');?></label>
									<div class="form-control bg-light-dark text-white py-15 fs-20">
										<?php echo $g_name;?>
									</div>
									<?php if($logo != ''){ ?>
									<i><?php echo $logo;?></i>
									<?php } ?>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="text-white"><?php echo __('Location');?></label>
									<div class="form-control bg-light-dark text-white py-15 fs-20">
									<?php if(!$hidden){ echo $this->website->get_map_name($this->Mcharacter->char_info['MapNumber']); } else { echo __('Hidden'); } ?>
									</div> 
									<i class="fas fa-globe-americas mt-25"></i>
								</div>
							</div>
						</div>
					</div>
					<?php if(!$hidden){ ?>
					<div class="col-lg-12">
						<div class="space-30"></div>
						<span class="blog-title text-white font-theme mt-25-sm fs-20">
							<a><?php echo __('Equipment');?></a>
						</span>
						<hr class="border-bb-1" />
					</div>
					<div class="col-lg-12">
						<table class="bg-dark">
							<tr>
								<td>
									<div class="text-center mt-20-off mb-20">
										<script>
										$(document).ready(function () {
											$('#inventoryc div, #inventory div, div[id^="item-slot-occupied-"], .hover_inv div img').each(function () {
												App.initializeTooltip($(this), true, 'warehouse/item_info');
											});
										});
										</script>
										<div style="background-image:url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template');?>/images/class/inventories/<?php echo strtoupper($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png'); width: 522px; height: 421px; padding-top: 95px; margin-left: calc(50% - 260px);">
											<div id="inventoryc" style="background-image:none;">
												<?php if($equipment[0] != 0){ ?><div id="in_weapon" data-info="<?php echo $equipment[0]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[0]['item_id'], $equipment[0]['item_cat'], $equipment[0]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                        
												<?php if($equipment[1] != 0){ ?><div id="in_shield" data-info="<?php echo $equipment[1]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[1]['item_id'], $equipment[1]['item_cat'], $equipment[1]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                                
												<?php if($equipment[2] != 0){ ?><div id="in_helm" data-info="<?php echo $equipment[2]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[2]['item_id'], $equipment[2]['item_cat'], $equipment[2]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                               
												<?php if($equipment[3] != 0){ ?><div id="in_armor" data-info="<?php echo $equipment[3]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[3]['item_id'], $equipment[3]['item_cat'], $equipment[3]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                             
												<?php if($equipment[4] != 0){ ?><div id="in_pants" data-info="<?php echo $equipment[4]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[4]['item_id'], $equipment[4]['item_cat'], $equipment[4]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                                
												<?php if($equipment[5] != 0){ ?><div id="in_gloves" data-info="<?php echo $equipment[5]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[5]['item_id'], $equipment[5]['item_cat'], $equipment[5]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                             
												<?php if($equipment[6] != 0){ ?><div id="in_boots" data-info="<?php echo $equipment[6]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[6]['item_id'], $equipment[6]['item_cat'], $equipment[6]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>        
												<?php if($equipment[7] != 0){ ?><div id="in_wings" data-info="<?php echo $equipment[7]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[7]['item_id'], $equipment[7]['item_cat'], $equipment[7]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>      
												<?php if($equipment[9] != 0){ ?><div id="in_pendant" data-info="<?php echo $equipment[9]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[9]['item_id'], $equipment[9]['item_cat'], $equipment[9]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                            
												<?php if($equipment[10] != 0){ ?><div id="in_ring1" data-info="<?php echo $equipment[10]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[10]['item_id'], $equipment[10]['item_cat'], $equipment[10]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>          
												<?php if($equipment[11] != 0){ ?><div id="in_ring2" data-info="<?php echo $equipment[11]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[11]['item_id'], $equipment[11]['item_cat'], $equipment[11]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>      
												<?php if(isset($equipment[12]) && $equipment[12] != 0){ ?><div id="in_pentagram" data-info="<?php echo $equipment[12]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[12]['item_id'], $equipment[12]['item_cat'], $equipment[12]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>    
												<?php if(isset($equipment[13]) && $equipment[13] != 0){ ?><div id="in_ear1" data-info="<?php echo $equipment[13]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[13]['item_id'], $equipment[13]['item_cat'], $equipment[13]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>       
												<?php if(isset($equipment[14]) && $equipment[14] != 0){ ?><div id="in_ear2" data-info="<?php echo $equipment[14]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[14]['item_id'], $equipment[14]['item_cat'], $equipment[14]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>        
												<?php if($equipment[8] != 0){ ?><div id="in_zoo" data-info="<?php echo $equipment[8]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[8]['item_id'], $equipment[8]['item_cat'], $equipment[8]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>        			
											</div>
											<?php if($artifacts != false){ ?>
											<div style="position: relative; left: calc(50% - 40px); top: -160px; width: 82px; height: 61px;">
												<a href="#Artifact" class="openArtifactModal">
													<img src="<?php echo $this->config->base_url; ?>assets/default_assets/images/artifact/button-2.png">
												</a>
											</div>
											<style>
                                            .aOverlay{
                                                z-index:998;
                                                position:fixed;
                                                background-color:#070a11;
                                                opacity:.8;
                                                width:100%;
                                                height:100%;
                                                top:0;
                                                left:0;
                                                cursor:pointer;
                                                display:none
                                            }
                                            .aModal{
                                                top: 20%;
                                                left: 0; 
                                                right: 0; 
                                                margin-left: auto; 
                                                margin-right: auto; 
                                                width: 422px;
                                                height: 445px; 
                                                background-color:rgba(0,0,0,0);
                                                position:fixed;
                                                display:none;
                                                opacity:0;
                                                z-index:999;
                                                padding: 0px 60px;
                                            }
                                            .aBackground{
                                                height: 349px; 
                                                width: 305px; 
                                                border: 1px solid black; 
                                                margin-left: -2px; 
                                                margin-top: -2px; 
                                                padding: 0; 
                                                background: url('<?php echo $this->config->base_url;?>assets/default_assets/images/artifact/background.png'); 
                                                background-repeat: no-repeat; 
                                                background-position: top left; 
                                                float: left; 
                                                position: relative; 
                                                text-align: center; 
                                                color: gold; 
                                                padding-top: 15px;
                                            }
                                            .aTitle {
                                                color: #00e6e6;
                                                font-size: 12px;
                                            }
                                            .aDescription {
                                                color: #fff;
                                                font-size: 11px;
                                            }
                                            </style>
                                            <div class="aOverlay"></div>
                                            <div class="aModal">
                                                <div class="aBackground">
                                                <?php 
												echo __('Spider Artifact');
                                                if(!empty($artifacts)){
                                                    $aData = '';
                                                    foreach($artifacts AS $ak => $artifact){
                                                        $h = 0;
                                                        $w = 0;
                                                        if($artifact['ArtifactType'] == 2 || $artifact['ArtifactType'] == 4 || $artifact['ArtifactType'] == 5){
                                                            $w = 39;
                                                        }
                                                        if($artifact['ArtifactType'] == 3){
                                                            $w = 65;
                                                        }
                                                        if($artifact['ArtifactType'] == 1 || $artifact['ArtifactType'] == 2 || $artifact['ArtifactType'] == 3){
                                                            $h = 23;
                                                        }
                                                        if($artifact['ArtifactType'] == 4){
                                                            $h = 46;
                                                        }
                                                        if($artifact['ArtifactType'] == 5){
                                                            $h = 69;
                                                        }
                                                        if($artifact['ArtifactType'] == 6){
                                                            $h = 92;
                                                        }
                                                        $tooltip = '<div>
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png" />
                                                                    <br><br>
                                                                    <p class="aTitle">'.__('Spider Artifact Type').' '.($artifact['ArtifactType']+1).' +'.$artifact['ArtifactLevel'].' </p>
                                                                    <p class="aDescription">'.__('Minimum level required').': 800<br></p>
                                                                    </div>';
                                                        if($artifact['Position'] == 22){
                                                            $aData .= '<div class="artifactIcon" style="position: absolute;top: '.(92-$h).'px; left: '.(76-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 27){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(92-$h).'px; left: '.((76+(26*5))-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 32){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(115-$h).'px; left: '.(89-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 33){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(115-$h).'px; left: '.(115-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 34){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(115-$h).'px; left: '.(141-$w).'px;">
                                                            <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                            </div>';
                                                        }
                                                        if($artifact['Position'] == 35){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(115-$h).'px; left: '.(167-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 36){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(115-$h).'px; left: '.(193-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 44){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(138-$h).'px; left: '.(128-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 45){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(138-$h).'px; left: '.(154-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 52){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(161-$h).'px; left: '.(89-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 53){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(161-$h).'px; left: '.(115-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 54){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(161-$h).'px; left: '.(141-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 55){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(161-$h).'px; left: '.(167-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 56){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(161-$h).'px; left: '.(193-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 64){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(184-$h).'px; left: '.(128-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 65){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(184-$h).'px; left: '.(154-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 72){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(207-$h).'px; left: '.(89-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 73){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(207-$h).'px; left: '.(115-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 75){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(207-$h).'px; left: '.(167-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 76){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(207-$h).'px; left: '.(193-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 82){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(230-$h).'px; left: '.(76-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                        if($artifact['Position'] == 87){
                                                            $aData .= '<div class="artifactIcon" data-info=\''.$tooltip.'\' style="position: absolute;top: '.(230-$h).'px; left: '.(76+(26*5)-$w).'px;">
                                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                                    </div>';
                                                        }
                                                    }
                                                    echo $aData;
                                                } 
                                                ?>
                                                </div>
                                            </div>
                                            <script>
                                            $(document).ready(function() {
                                                $('.artifactIcon').each(function () {
                                                    App.initializeTooltip($(this), false);
                                                });
                                                
                                                $('.openArtifactModal').on('click', function(e){
                                                    e.preventDefault();
                                                    $('.aOverlay').fadeIn(400, function() {
                                                        $('.aModal').css('display', 'block').animate({
                                                            opacity: 1,
                                                            top: '20%'
                                                        }, 200);
                                                    });
                                                });
                                                $('.aOverlay').on('click', function(e){
                                                    $('.aModal').animate({
                                                        opacity: 0,
                                                        top: '25%'
                                                    }, 200, function() {
                                                        $(this).css('display', 'none');
                                                        $('.aOverlay').fadeOut(400);
                                                    });
                                                });
                                            });
                                            </script>
                                            <?php } ?>
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<?php } ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>	
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>