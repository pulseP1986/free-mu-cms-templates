<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Info'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php $args = $this->request->get_args(); ?>
						<?php echo sprintf(__('Character %s Info'), $this->website->hex2bin($args[0])); ?>
					</h2>
				</div>	
			</div>
			<div class="row">
				<div class="col-12">     
					<?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    } 
					else{
						if(!$hidden){	
                    ?>
						<script>
						$(document).ready(function () {
							$('#inventoryc div, div[id^="item-slot-occupied-"], .hover_inv div').each(function () {
								App.initializeTooltip($(this), true, 'warehouse/item_info');
							});
						});
                        </script>
						<?php } ?>
						<table class="table dmn-rankings-table table-striped">
                            <thead>
								<tr>
									<th colspan="2" style="padding-left: 15px;"><?php echo __('Information'); ?></th>
								</tr>
                            </thead>
                            <tbody>
								<tr>
									<td style="width: 70px;" class="text-center">
										<img src="<?php echo $this->config->base_url; ?>assets/default_assets/images/c_class/<?php echo strtolower($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png" alt="<?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?>"/>
									</td>
									<td style="width: 240px;">
										<?php if(!$hidden){ ?>
										<div class="cworkshop">
											<div class="equipment">
												<div class="item" style="display: block;">
													<div id="main_inventory">
														<?php if($equipment[0] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 76px; position: absolute; left: 19px; top:116px;">
																<div data-info="<?php echo $equipment[0]['hex']; ?>" style="width: 50px; height: 76px; line-height: 76px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[0]['item_id'], $equipment[0]['item_cat'], $equipment[0]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[7] != 0){ ?>
															<div class="hover_inv" style="width: 87px; height: 48px; position: absolute; left: 201px; top:54px;">
																<div data-info="<?php echo $equipment[7]['hex']; ?>" style="width: 87px; height: 48px; line-height: 48px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[7]['item_id'], $equipment[7]['item_cat'], $equipment[7]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[9] != 0){ ?>
															<div class="hover_inv" style="width: 32px; height: 32px; position: absolute; left: 83px; top:72px;">
																<div data-info="<?php echo $equipment[9]['hex']; ?>" style="width: 32px; height: 32px; line-height: 32px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[9]['item_id'], $equipment[9]['item_cat'], $equipment[9]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[1] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 76px; position: absolute; left: 237px; top:116px;">
																<div data-info="<?php echo $equipment[1]['hex']; ?>" style="width: 50px; height: 76px; line-height: 76px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[1]['item_id'], $equipment[1]['item_cat'], $equipment[1]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[2] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 50px; position: absolute; left: 129px; top:54px;">
																<div data-info="<?php echo $equipment[2]['hex']; ?>" style="width: 50px; height: 50px; line-height: 50px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[2]['item_id'], $equipment[2]['item_cat'], $equipment[2]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[3] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 76px; position: absolute; left: 129px; top:116px;">
																<div data-info="<?php echo $equipment[3]['hex']; ?>" style="width: 50px; height: 76px; line-height: 76px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[3]['item_id'], $equipment[3]['item_cat'], $equipment[3]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[4] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 50px; position: absolute; left: 129px; top:204px;">
																<div data-info="<?php echo $equipment[4]['hex']; ?>" style="width: 50px; height: 50px; line-height: 52px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[4]['item_id'], $equipment[4]['item_cat'], $equipment[4]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														
														<?php if($equipment[5] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 50px; position: absolute; left: 19px; top:204px;">
																<div data-info="<?php echo $equipment[5]['hex']; ?>" style="width: 50px; height: 50px; line-height: 50px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[5]['item_id'], $equipment[5]['item_cat'], $equipment[5]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[6] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 50px; position: absolute; left: 238px; top:204px;">
																<div data-info="<?php echo $equipment[6]['hex']; ?>" style="width: 50px; height: 50px; line-height: 50px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[6]['item_id'], $equipment[6]['item_cat'], $equipment[6]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[10] != 0){ ?>
															<div class="hover_inv" style="width: 32px; height: 32px; position: absolute; left: 83px; top:223px;">
																<div data-info="<?php echo $equipment[10]['hex']; ?>" style="width: 32px; height: 32px; line-height: 32px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[10]['item_id'], $equipment[10]['item_cat'], $equipment[10]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if($equipment[11] != 0){ ?>
															<div class="hover_inv" style="width: 32px; height: 32px; position: absolute; left: 193px; top:223px;">
																<div data-info="<?php echo $equipment[11]['hex']; ?>" style="width: 32px; height: 32px; line-height: 32px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[11]['item_id'], $equipment[11]['item_cat'], $equipment[11]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if(isset($equipment[13]) && $equipment[13] != 0){ ?>
															<div class="hover_inv" style="width: 32px; height: 32px; position: absolute; left: 83px; top:148px;">
																<div data-info="<?php echo $equipment[13]['hex']; ?>" style="width: 32px; height: 32px; line-height: 32px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[13]['item_id'], $equipment[13]['item_cat'], $equipment[13]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if(isset($equipment[14]) && $equipment[14] != 0){ ?>
															<div class="hover_inv" style="width: 32px; height: 32px; position: absolute; left: 193px; top:148px;">
																<div data-info="<?php echo $equipment[14]['hex']; ?>" style="width: 32px; height: 32px; line-height: 32px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[14]['item_id'], $equipment[14]['item_cat'], $equipment[14]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if(isset($equipment[12]) && $equipment[12] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 50px; position: absolute; left: 238px; top:266px;">
																<div data-info="<?php echo $equipment[12]['hex']; ?>" style="width: 50px; height: 50px; line-height: 50px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[12]['item_id'], $equipment[12]['item_cat'], $equipment[12]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<?php if(isset($equipment[8]) && $equipment[8] != 0){ ?>
															<div class="hover_inv" style="width: 50px; height: 50px; position: absolute; left: 19px; top:54px;">
																<div data-info="<?php echo $equipment[8]['hex']; ?>" style="width: 50px; height: 50px; line-height: 50px; position: absolute; vertical-align: middle; text-align: center;background: url(<?php echo $this->itemimage->load($equipment[8]['item_id'], $equipment[8]['item_cat'], $equipment[8]['level'], 0); ?>) no-repeat center center;background-size:contain;">
																</div>
															</div>
														<?php } ?>
														<div class="hover_inv openArtifactModal" style="width: 50px; height: 50px; position: absolute; left: 19px; top:266px;">
														</div>
														<div class="aOverlay"></div>
														<div class="aModal">
															<div class="aBackground">
															Spider Artifact
															<?php 
															if($artifacts != false){
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
													</div>
												</div>
											</div>
										</div>
										<?php } else{ ?>
                                         <div class="alert alert-info" role="alert"><?php echo __('Equipment Hidden'); ?></div>
										<?php } ?>
									</td>
								</tr>
                            </tbody>
                        </table>
						<table class="table dmn-rankings-table table-striped">
                            <thead>
								<tr>
									<th style="padding-left: 15px;"><?php echo __('Information'); ?></th>
								</tr>
                            </thead>
                            <tbody>
								<tr>
									<td>
										<table style="width:100%;text-align: center;margin: 0 auto;">
											<tr>
												<td style="width:50%;text-align: left;"><?php echo __('Character'); ?></td>
												<td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['Name']; ?></td>
											</tr>
											<tr>
												<td style="width:50%;text-align: left;"><?php echo __('Class'); ?></td>
												<td style="width:50%;text-align: left;"><?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?></td>
											</tr>
											<tr>
												<td style="width:50%;text-align: left;"><?php echo __('Level'); ?></td>
												<td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['cLevel']; ?></td>
											</tr>
											<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_master_level']) == 1): ?>
												<tr>
													<td style="width:50%;text-align: left;"><?php echo __('MasterLevel'); ?></td>
													<td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['mlevel']; ?></td>
												</tr>
											<?php endif; ?>
											<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_resets']) == 1): ?>
												<tr>
													<td style="width:50%;text-align: left;"><?php echo __('Resets'); ?></td>
													<td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['resets']; ?></td>
												</tr>
											<?php endif; ?>
											<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_gresets']) == 1): ?>
												<tr>
													<td style="width:50%;text-align: left;"><?php echo __('Grand Reset'); ?></td>
													<td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['grand_resets']; ?></td>
												</tr>
											<?php endif; ?>
											<tr>
												<td style="width:50%;text-align: left;"><?php echo __('PK Level'); ?></td>
												<td style="width:50%;text-align: left;"><?php echo $this->website->pk_level($this->Mcharacter->char_info['PkLevel']); ?>
													(<?php echo $this->Mcharacter->char_info['PkCount']; ?>)
												</td>
											</tr>
											<tr>
												<td style="width:50%;text-align: left;"><?php echo __('Location'); ?></td>
												<td style="width:50%;text-align: left;">
													<?php
													if($hidden){
														echo __('Hidden');
													} else{
													?>
													<?php echo $this->website->get_map_name($this->Mcharacter->char_info['MapNumber']); ?> (<?php echo $this->Mcharacter->char_info['MapPosX']; ?>x<?php echo $this->Mcharacter->char_info['MapPosY']; ?>)
													<?php } ?>
												</td>
											</tr>
											<tr>
												<td style="width:50%;text-align: left;"><?php echo __('Status'); ?></td>
												<td style="width:50%;text-align: left;">
													<?php
													if($status != false){
														if($status['ConnectStat'] == 1){
															echo '<img src="' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/online.png" alt="' . __('Online') . '" /> ' . __('Online') . '';
														} else{
															echo '<img src="' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/offline.png" alt="' . __('Offline') . '" /> ' . __('Offline') . '';
														}
													} else{
														echo '<img src="' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/offline.png" alt="' . __('Offline') . '" /> ' . __('Offline') . '';
													}
													?>
												</td>
											</tr>
										</table>
									</td>
								</tr>
                            </tbody>
                        </table>
						<?php if(!isset($no_guild)){ ?>
                        <div style="margin-top:10px;"></div>
                        <table class="table dmn-rankings-table table-striped">
                            <thead>
								<tr>
									<th style="padding-left: 15px;"><?php echo __('Guild Info'); ?></th>
								</tr>
                            </thead>
                            <tbody>
								<tr>
									<td>
										<table style="width: 100%;text-align: center;margin: 0 auto;" cellpadding="0"
											   cellspacing="0">
											<tr>
												<td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Guild'); ?>:</td>
												<td style="width:60%;text-align: left;padding-left: 15px;">
													<img src="<?php echo $this->config->base_url; ?>rankings/get_mark/<?php echo bin2hex($guild_info['G_Mark']); ?>/16" border="0" /> <a href="<?php echo $this->config->base_url; ?>guild/<?php echo bin2hex($guild_check['G_Name']); ?>/<?php echo $args[1]; ?>"><?php echo $guild_check['G_Name']; ?></a>
												</td>
											</tr>
											<tr>
												<td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Master'); ?>:</td>
												<td style="width:60%;text-align: left;padding-left: 15px;">
													<?php echo '<a href="' . $this->config->base_url . 'character/' . bin2hex($guild_info['G_Master']) . '/' . $args[1] . '">' . $guild_info['G_Master'] . '</a>'; ?>
												</td>
											</tr>
											<tr>
												<td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Members'); ?>:</td>
												<td style="width:60%;text-align: left;padding-left: 15px;border: 0;"><?php echo $member_count['count']; ?></td>
											</tr>
										</table>
									</td>
								</tr>
                            </tbody>
                        </table>
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