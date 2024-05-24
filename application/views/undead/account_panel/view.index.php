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
					<div class="account-setting">
						<div class="account-setting_block">
							<i class="account-icon account-icon-user"></i>
							<span class="account-setting_f"><?php echo __('Account'); ?>:</span>
							<span class="account-setting_f"><?php echo $this->session->userdata(['user' => 'username']); ?></span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-member"></i>
							<span class="account-setting_f"><?php echo __('Member Since'); ?>:</span>
							<span class="account-setting_f">
								<?php 
								$dt = DateTime::createFromFormat(DATE_FORMAT, $this->session->userdata(['user' => 'joined']));
								if($dt != false){
									$ts = $dt->getTimestamp();
									echo date(DATE_FORMAT, $ts); 
								}
								?>
							</span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-email"></i>
							<span class="account-setting_f"><?php echo __('Email'); ?>:</span>
							<span class="account-setting_f"><?php echo $this->session->userdata(['user' => 'email']); ?></span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-last-login"></i>
							<span class="account-setting_f"><?php echo __('Last Login'); ?>:</span>
							<span class="account-setting_f">
								<?php
									$dateLogin = DateTime::createFromFormat(DATETIME_FORMAT, $this->session->userdata(['user' => 'last_login']));
									if($dateLogin != false){
										$timeStamp = $dateLogin->getTimestamp();
									
										if(date(DATE_FORMAT, $timeStamp) == date(DATE_FORMAT, time())):
											echo __('Today') . ' ' . date('H:i', $timeStamp);
										else:
											echo date(DATE_FORMAT, $timeStamp);
										endif;
									}
								?>
							</span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-rank"></i>
							<span class="account-setting_f"><?php echo __('Rank'); ?>:</span>
							<span class="account-setting_f"><?php echo __('User'); ?></span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-ip"></i>
							<span class="account-setting_f"><?php echo __('Last login IP'); ?>:</span>
							<span class="account-setting_f"><?php echo $this->session->userdata(['user' => 'last_ip']); ?></span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-server"></i>
							<span class="account-setting_f"><?php echo __('Server'); ?>:</span>
							<span class="account-setting_f"><?php echo $this->session->userdata(['user' => 'server_t']); ?></span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-current-ip"></i>
							<span class="account-setting_f"><?php echo __('Current IP'); ?>:</span>
							<span class="account-setting_f"><?php echo $this->website->ip(); ?></span>
						</div>
						<?php if($this->config->values('vip_config', 'active') == 1){ ?>
						<div class="account-setting_block">
							<i class="account-icon account-icon-current-vip"></i>
							<span class="account-setting_f"><?php echo __('Vip'); ?>:</span>
							<span class="account-setting_f"><?php echo ($this->session->userdata('vip')) ? $this->session->userdata(['vip' => 'title']) . ' (<a class="color-green" href="' . $this->config->base_url . 'shop/vip">' . __('Extend Now') . '</a>)' : __('None') . ' (<a class="color-green" href="' . $this->config->base_url . 'shop/vip">' . __('Buy Now') . '</a>)'; ?></span>
						</div>
						<div class="account-setting_block">
							<i class="account-icon account-icon-current-vip-exp"></i>
							<span class="account-setting_f"><?php echo __('Vip Expires'); ?>:</span>
							<span class="account-setting_f"><?php echo ($this->session->userdata('vip')) ? date(DATETIME_FORMAT, $this->session->userdata(['vip' => 'time'])) : __('Expired'); ?></span>
						</div>
						<?php } ?>
					</div>
					<div class="charOptions">
						<div class="charOptions-title">
							<?php echo __('Character Options'); ?>
						</div>
						<div class="charOptions-flex flex-c-c">
							<div class="charOptions-col">
							<a href="<?php echo $this->config->base_url; ?>account-panel/reset" class="charOptions-block">
								<p><?php echo __('Reset'); ?></p>
								<span><?php echo __('Reset your character level'); ?></span>
							</a>
						</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>grand-reset-character" class="charOptions-block">
									<p><?php echo __('Grand Reset'); ?></p>
									<span><?php echo __('Grand reset your character'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>add-stats" class="charOptions-block">
									<p><?php echo __('Add Stats'); ?></p>
									<span><?php echo __('Add level up points. Str.Agi.Vit etc'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>reset-stats" class="charOptions-block">
									<p><?php echo __('Reset Stats'); ?></p>
									<span><?php echo __('Reassign your stats'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>exchange-wcoins" class="charOptions-block">
									<p><?php echo __('Exchange Wcoins'); ?></p>
									<span><?php echo __('Exchange credits to Wcoins'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>pk-clear" class="charOptions-block">
									<p><?php echo __('PK Clear'); ?></p>
									<span><?php echo __('Clear player kills.<br />Receive normal status'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>warp-char" class="charOptions-block">
									<p><?php echo __('Warp Character'); ?></p>
									<span><?php echo __('Move to another location.<br> use to unstuck character'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>clear-inventory" class="charOptions-block">
									<p><?php echo __('Clear Inventory'); ?></p>
									<span> <?php echo __('Remove items from inventory'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>zen-wallet" class="charOptions-block">
									<p><?php echo __('Zen Wallet'); ?></p>
									<span><?php echo __('Transfer zen between characters and other places.'); ?></span>
								</a>
							</div>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>clear-skilltree" class="charOptions-block">
									<p><?php echo __('Clear SkillTree'); ?></p>
									<span><?php echo __('Reset character skilltree.'); ?></span>
								</a>
							</div>
							<?php if($this->config->values('referral_config', 'active') == 1){ ?>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>account-panel/my-referral-list" class="charOptions-block">
									<p><?php echo __('Referral System'); ?></p>
									<span><?php echo __('Invite friends and get rewards.'); ?></span>
								</a>
							</div>
							<?php } ?>
							<?php if(defined('PARTNER_SYSTEM') && PARTNER_SYSTEM == true && $this->session->userdata(['user' => 'partner']) == 1){ ?>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>partner/panel" class="charOptions-block">
									<p><?php echo __('Partner'); ?></p>
									<span><?php echo __('Partner Panel.'); ?></span>
								</a>
							</div>
							<?php } ?>
							<?php if(defined('PARTNER_SYSTEM') && PARTNER_SYSTEM == true ){ ?>
							<div class="charOptions-col">
								<a href="<?php echo $this->config->base_url; ?>account-panel/coupons" class="charOptions-block">
									<p><?php echo __('Coupons'); ?></p>
									<span><?php echo __('Redeem Streamer Coupon.'); ?></span>
								</a>
							</div>
							<?php } ?>
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
											<div class="charOptions-col">
												<a href="<?php echo $plugin['module_url']; ?>" class="charOptions-block">
													<p><?php echo __($plugin['about']['name']); ?></p>
													<span><?php echo __($plugin['description']); ?></span>
												</a>
											</div>
                                        <?php
                                        }
                                    }
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