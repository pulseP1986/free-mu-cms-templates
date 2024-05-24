<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Account Panel'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12"> 
					<script>
					$(document).ready(function(){
						$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
							localStorage.setItem('acc-panel-tab', $(e.target).attr('href'));
						});
						var activeTab = localStorage.getItem('acc-panel-tab');
						if(activeTab){
							$('#acc-panel-tabs a[href="' + activeTab + '"]').tab('show');
						}
					});
					</script>
					<ul class="nav nav-tabs" id="acc-panel-tabs" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="acc-info-tab" data-toggle="tab" href="#acc-info" role="tab" aria-controls="acc-info" aria-selected="true"><?php echo __('Account Information');?></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="user-services-tab" data-toggle="tab" href="#user-services" role="tab" aria-controls="user-services" aria-selected="false"><?php echo __('User Services');?></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="character-services-tab" data-toggle="tab" href="#character-services" role="tab" aria-controls="character-services" aria-selected="false"><?php echo __('Character Services');?></a>
					  </li>
					  <li class="nav-item">
						<a class="nav-link" id="other-services-tab" data-toggle="tab" href="#other-services" role="tab" aria-controls="other-services" aria-selected="false"><?php echo __('Other Services');?></a>
					  </li>
					  <?php if(defined('PARTNER_SYSTEM') && PARTNER_SYSTEM == true && $this->session->userdata(['user' => 'partner']) == 1){ ?>
					   <li class="nav-item">
						<a class="nav-link" id="partner-services-tab" data-toggle="tab" href="#partner-services" role="tab" aria-controls="partner-services" aria-selected="false"><?php echo __('Partner');?></a>
					  </li>
					  <?php } ?>
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active p-2" id="acc-info" role="tabpanel" aria-labelledby="acc-info-tab">
						<table class="table dmn-account-table table-bordered">
							<tr>
								<th><?php echo __('Username');?></th>
								<td><?php echo $this->session->userdata(['user' => 'username']); ?></td>
							</tr>
							<tr>
								<th><?php echo __('Email address');?></th>
								<td><?php echo $this->session->userdata(['user' => 'email']); ?><a href="<?php echo $this->config->base_url; ?>settings" class="btn btn-sm btn-primary float-right"><?php echo __('Change');?></a></td>
							</tr>
							<tr>
								<th><?php echo __('Password');?></th>
								<td>******<a href="<?php echo $this->config->base_url; ?>settings" class="btn btn-sm btn-primary float-right"><?php echo __('Change');?></a></td>
							</tr>
							<tr>
								<th><?php echo __('Server'); ?></th>
								<td><?php echo $this->session->userdata(['user' => 'server_t']); ?><a href="<?php echo $this->config->base_url; ?>settings" class="btn btn-sm btn-primary float-right" data-modal-div="select_server"><?php echo __('Change');?></a></td>
							</tr>
							<?php
								$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
								$credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
							?>
							<tr>
								<th><?php echo $this->website->translate_credits(1, $this->session->userdata(['user' => 'server']));?></th>
								<td><?php echo number_format($credits['credits']); ?></td>
							</tr>
							<tr>
								<th><?php echo $this->website->translate_credits(2, $this->session->userdata(['user' => 'server']));?></th>
								<td><?php echo number_format($credits2['credits']); ?></td>
							</tr>
							<?php
							if($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1){
								$wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
							?>
							<tr>
								<th><?php echo __('WCoins'); ?></th>
								<td><?php echo number_format($wcoin); ?></td>
							</tr>
							<?php } ?>
							<tr>
								<th><?php echo __('Member Since'); ?></th>
								<td>
									<?php 
									$dt = DateTime::createFromFormat(DATE_FORMAT, $this->session->userdata(['user' => 'joined']));
									$ts = $dt->getTimestamp();
									echo date(DATE_FORMAT, $ts); 
									?>
								</td>
							</tr>
							<tr>
								<th><?php echo __('Last Login'); ?></th>
								<td>
									<?php
										$dateLogin = DateTime::createFromFormat(DATETIME_FORMAT, $this->session->userdata(['user' => 'last_login']));
										$timeStamp = $dateLogin->getTimestamp();
									
										if(date(DATE_FORMAT, $timeStamp) == date(DATE_FORMAT, time())){
											echo __('Today') . ' ' . date('H:i', $timeStamp);
										}
										else{
											echo date(DATE_FORMAT, $timeStamp);
										}
									?>
								</td>
							</tr>
							<tr>
								<th><?php echo __('Last Login Ip'); ?></th>
								<td><?php echo $this->session->userdata(['user' => 'last_ip']); ?></td>
							</tr>
							<tr>
								<th><?php echo __('Current Ip'); ?></th>
								<td><?php echo ip(); ?></td>
							</tr>
							<?php if($this->config->values('vip_config', 'active') == 1){ ?>
							<tr>
								<th><?php echo __('Vip'); ?></th>
								<td><?php echo ($this->session->userdata('vip')) ? date(DATETIME_FORMAT, $this->session->userdata(['vip' => 'time'])) : __('Expired'); ?><span class="float-right"><?php echo ($this->session->userdata('vip')) ? $this->session->userdata(['vip' => 'title']) . ' <a class="btn btn-sm btn-primary" href="' . $this->config->base_url . 'shop/vip">' . __('Extend Now') . '</a>' : __('None') . ' <a class="btn btn-sm btn-primary" href="' . $this->config->base_url . 'shop/vip">' . __('Buy Now') . '</a>'; ?></span></td>
							</tr>
							<?php } ?>
						</table> 
					  </div>
					  <div class="tab-pane fade p-2" id="user-services" role="tabpanel" aria-labelledby="user-services-tab">
						<table class="table dmn-account-table table-condensed table-bordered table-striped">
							<tr>
								<th><?php echo __('Name');?></th>
								<th><?php echo __('Description');?></th>
								<th></th>
							</tr>
							<?php if($this->config->values('referral_config', 'active') == 1){ ?>
							<tr>
								<td><?php echo __('Referral System'); ?></td>
								<td><?php echo __('Invite friends and get rewards.'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>account-panel/my-referral-list"><?php echo __('Use service');?></a></td>
							</tr>	
							<?php } ?>
							<?php if($this->config->values('wcoin_exchange_config', [$this->session->userdata(['user' => 'server']), 'display_wcoins']) == 1){ ?>
							<tr>
								<td><?php echo __('Exchange Wcoins'); ?></td>
								<td><?php echo __('Exchange credits to Wcoins'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>exchange-wcoins"><?php echo __('Use service');?></a></td>
							</tr>
							<?php } ?>
							<tr>
								<td><?php echo __('Zen Wallet'); ?></td>
								<td><?php echo __('Transfer zen between characters and other places.'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>zen-wallet"><?php echo __('Use service');?></a></td>
							</tr>
						</table>
					  </div>
					  <div class="tab-pane fade p-2" id="character-services" role="tabpanel" aria-labelledby="character-services-tab">
						<table class="table dmn-account-table table-condensed table-bordered table-striped">
							<tr>
								<th><?php echo __('Name');?></th>
								<th><?php echo __('Description');?></th>
								<th></th>
							</tr>
							<tr>
								<td><?php echo __('Reset'); ?></td>
								<td><?php echo __('Reset your character level'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>account-panel/reset"><?php echo __('Use service');?></a></td>
							</tr>
							<tr>
								<td><?php echo __('Grand Reset'); ?></td>
								<td><?php echo __('Grand Reset your character'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>grand-reset-character"><?php echo __('Use service');?></a></td>
							</tr>
							<tr>
								<td><?php echo __('Add Stats'); ?></td>
								<td><?php echo __('Add level up points. Str. Agi. Vit. etc'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>add-stats"><?php echo __('Use service');?></a></td>
							</tr>
							<tr>
								<td><?php echo __('Reset Stats'); ?></td>
								<td><?php echo __('Reassign your character stats'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>reset-stats"><?php echo __('Use service');?></a></td>
							</tr>
							<tr>
								<td><?php echo __('Warp Character'); ?></td>
								<td><?php echo __('Move to another location.<br />Use to unstuck character!'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>warp-char"><?php echo __('Use service');?></a></td>
							</tr>
							<tr>
								<td><?php echo __('PK Clear'); ?></td>
								<td><?php echo __('Clear player kills.<br />Receive normal status'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>pk-clear"><?php echo __('Use service');?></a></td>
							</tr>
							<tr>
								<td><?php echo __('Clear Inventory'); ?></td>
								<td><?php echo __('Remove items from inventory'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>clear-inventory"><?php echo __('Use service');?></a></td>
							</tr>
							<tr>
								<td><?php echo __('Clear SkillTree'); ?></td>
								<td><?php echo __('Reset character skilltree.'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>clear-skilltree"><?php echo __('Use service');?></a></td>
							</tr>
							<?php if($this->config->config_entry('changename|module_status') == 1){ ?>
							<tr>
								<td><?php echo __('Change Name'); ?></td>
								<td><?php echo __('Change character name.'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>shop/change-name"><?php echo __('Use service');?></a></td>
							</tr>
							<?php } ?>
							<?php if($this->config->values('change_class_config', 'active') == 1){ ?>
							<tr>
								<td><?php echo __('Change Class'); ?></td>
								<td><?php echo __('Change character class.'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>shop/change-class"><?php echo __('Use service');?></a></td>
							</tr>
							<?php } ?>
						</table> 
					  </div>
					  <div class="tab-pane fade p-2" id="other-services" role="tabpanel" aria-labelledby="other-services-tab">
						<table class="table dmn-account-table table-condensed table-bordered table-striped">
							<tr>
								<th><?php echo __('Name');?></th>
								<th><?php echo __('Description');?></th>
								<th></th>
							</tr>
							<?php
							$plugins = $this->config->plugins();
							if(!empty($plugins)){
								if(array_key_exists('merchant', $plugins)){
									if($this->session->userdata(['user' => 'is_merchant']) != 1){
										unset($plugins['merchant']);
									}
								}
								foreach($plugins AS $plugin){
									if($plugin['installed'] == 1 && $plugin['account_panel_item'] == 1){
										if(mb_substr($plugin['module_url'], 0, 4) !== "http"){
											$plugin['module_url'] = $this->config->base_url . $plugin['module_url'];
										}
										?>
										<tr>
											<td><?php echo __($plugin['about']['name']); ?></td>
											<td><?php echo __($plugin['description']); ?></td>
											<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $plugin['module_url']; ?>"><?php echo __('Use service');?></a></td>
										</tr>
									<?php
									}
								}
							}
							?>
							<?php if($this->config->values('buylevel_config', [$this->session->userdata(['user' => 'server']), 'active']) == 1){ ?>
							<tr>
								<td><?php echo __('Buy Level'); ?></td>
								<td><?php echo __('Buy level for your character.'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>shop/buy-level"><?php echo __('Use service');?></a></td>
							</tr>
							<?php } ?>
							<?php if($this->config->config_entry('buypoints|module_status') == 1){ ?>
							<tr>
								<td><?php echo __('Buy Stats'); ?></td>
								<td><?php echo __('Buy StatPoints for your character'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>shop/buy-stats"><?php echo __('Use service');?></a></td>
							</tr>
							<?php } ?>
							<?php if($this->config->config_entry('buygm|module_status') == 1){ ?>
							<tr>
								<td><?php echo __('Buy GM'); ?></td>
								<td><?php echo __('Buy GameMaster status for your character'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>shop/buy-gm"><?php echo __('Use service');?></a></td>
							</tr>
							<?php } ?>
						</table>
					  </div>
					  <?php if(defined('PARTNER_SYSTEM') && PARTNER_SYSTEM == true && $this->session->userdata(['user' => 'partner']) == 1){ ?>
					  <div class="tab-pane fade p-2" id="partner-services" role="tabpanel" aria-labelledby="partner-services-tab">
						<table class="table dmn-account-table table-condensed table-bordered table-striped">
							<tr>
								<th><?php echo __('Name');?></th>
								<th><?php echo __('Description');?></th>
								<th></th>
							</tr>
							<tr>
								<td><?php echo __('Partner'); ?></td>
								<td><?php echo __('Partner Panel'); ?></td>
								<td class="text-center"><a class="btn btn-primary text-uppercase" href="<?php echo $this->config->base_url; ?>partner/panel"><?php echo __('Use service');?></a></td>
							</tr>
						</table>
					  </div>
					  <?php } ?>
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
	