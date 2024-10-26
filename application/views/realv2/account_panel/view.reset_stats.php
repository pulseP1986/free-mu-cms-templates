<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Reset Stats'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Reassign your stats'); ?></h2>
						<div class="mb-5">
							<?php
							if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|allow_reset_stats') == 1){
								if(isset($char_list) && $char_list != false){
									?>
									<table class="table dmn-rankings-table table-striped">
										<thead>
										<tr>
											<th><?php echo __('Character'); ?></th>
											<th><?php echo __('New LevelUp Points'); ?></th>
											<?php if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_price') > 0){ ?>
												<th><?php echo __('Price'); ?></th>
											<?php } ?>
											<th><?php echo __('Manage'); ?></th>
										</tr>
										</thead>
										<tbody>
										<?php
											foreach($char_list as $char){
												$char_info = $this->Mcharacter->check_char($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), $char['name']);
												$baseStats = $this->Mcharacter->getBaseStats($this->Mcharacter->char_info['Class'], $this->session->userdata(['user' => 'server']));
												$new_stats = 0;
												if($this->Mcharacter->char_info['Strength'] > $baseStats['Strength']){
													$new_stats += $this->Mcharacter->char_info['Strength'] - $baseStats['Strength'];
												}
												if($this->Mcharacter->char_info['Dexterity'] > $baseStats['Dexterity']){
													$new_stats += $this->Mcharacter->char_info['Dexterity'] - $baseStats['Dexterity'];
												}
												if($this->Mcharacter->char_info['Energy'] > $baseStats['Energy']){
													$new_stats += $this->Mcharacter->char_info['Energy'] - $baseStats['Energy'];
												}
												if($this->Mcharacter->char_info['Vitality'] > $baseStats['Vitality']){
													$new_stats += $this->Mcharacter->char_info['Vitality'] - $baseStats['Vitality'];
												}
												if(in_array($this->Mcharacter->char_info['Class'], [64, 65, 66]) && $this->Mcharacter->char_info['Leadership'] > $baseStats['Leadership']){
													$new_stats += $this->Mcharacter->char_info['Leadership'] - $baseStats['Leadership'];
												}
												?>
												<tr>
													<td>
														<a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($char['name']); ?>/<?php echo $this->session->userdata(['user' => 'server']); ?>"><?php echo $char['name']; ?></a>
													</td>
													<td><span id="new-stats-<?php echo bin2hex($char['name']); ?>"><?php echo $new_stats; ?></span></td>
													<?php if($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_price') > 0){ ?>
														<td><?php echo $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_price'); ?> <?php echo $this->website->translate_credits($this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|reset_stats_payment_type'), $this->session->userdata(['user' => 'server'])); ?></td>
													<?php } ?>
													<td><a href="#" id="reset-stats-char-<?php echo bin2hex($char['name']); ?>"><?php echo __('Reset Stats'); ?></a></td>
												</tr>
												<?php
											}
										?>
										</tbody>
									</table>
									<?php
								} else{
									?>
									<div class="alert alert-danger" role="alert"><?php echo __('Character not found.'); ?></div>
									<?php
								}
							} else{
								?>
								<div class="alert alert-danger" role="alert"><?php echo __('Reset Stats Disabled'); ?></div>
								<?php
							}
						?>
						</div>
					</div>	
				</div>	
			</div>	
		</div>
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>