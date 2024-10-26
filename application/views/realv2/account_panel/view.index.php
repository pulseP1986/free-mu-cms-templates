<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<h2 class="blog-title text-white font-theme h4 mt-25-sm mb-5-off"><a><?php echo __('Account Panel'); ?></a></h2>
				<?php echo __('View general account options'); ?>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row contact-form form-dark px-20 py-20">
					<?php
					$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
					$credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
					?>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="text-white"><?php echo $this->website->translate_credits(1, $this->session->userdata(['user' => 'server'])); ?></label>
							<div class="form-control bg-light-dark text-white py-15">
							<?php echo number_format($credits['credits']); ?> <a class="vs-btn2 gradient-btn mt-0 mr-45-off pt-5 float-right" style="min-width: 80px;!important; height: 25px!important;" href="<?php echo $this->config->base_url; ?>donate"><?php echo __('Buy');?></a>
							</div>
							<i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/wc-icon.png" class="mt-18-off" /> </i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label class="text-white"><?php echo __('Server');?></label>
						<div class="form-control bg-light-dark text-white py-15">
							<?php echo $this->session->userdata(['user' => 'server_t']); ?>
						</div> 
						<i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/server.png" class="mt-18-off" /> </i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label class="text-white"><?php echo $this->website->translate_credits(2, $this->session->userdata(['user' => 'server'])); ?></label>
						<div class="form-control bg-light-dark text-white py-15"><?php echo number_format($credits2['credits']); ?></div> <i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/gp-icon.png" class="mt-18-off" /> </i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label class="text-white"><?php echo __('Email'); ?></label>
						<div class="form-control bg-light-dark text-white py-15">
							<?php echo $this->session->userdata(['user' => 'email']); ?>
						</div> 
						<i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/email.png" class="mt-18-off" /> </i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label class="text-white"><?php echo __('Account'); ?></label>
						<div class="form-control bg-light-dark text-white py-15">
							<?php echo $this->session->userdata(['user' => 'username']); ?>
						</div> 
						<i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/user.png" class="mt-18-off" /> </i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="text-white"><?php echo __('Last Login');?></label>
							<div class="form-control bg-light-dark text-white py-15">
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
							</div>
							<i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/cn-icon.png" class="mt-18-off" /> </i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label class="text-white"><?php echo __('Rank');?></label>
							<div class="form-control bg-light-dark text-white py-15" style="height: 57px;">
								<span style="color: red; float: left;"><?php echo ($this->session->userdata('vip')) ? $this->session->userdata(['vip' => 'title']) : __('None'); ?></span> 
								<a href="<?php echo $this->config->base_url;?>shop/vip" class="vs-btn2 outline3 float-right fs-14 py-5 mr-30-off"><?php echo __('Benefits Vips');?></a> 
							</div>
							<i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/award_star_bronze_1.png" class="mt-18-off" /> </i>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						<label class="text-white"><?php echo __('Member Since'); ?></label>
						<div class="form-control bg-light-dark text-white py-15">
							<?php 
							$dt = DateTime::createFromFormat(DATE_FORMAT, $this->session->userdata(['user' => 'joined']));
							if($dt != false){
								$ts = $dt->getTimestamp();
								echo date(DATE_FORMAT, $ts); 
							}
							?>
						</div>
						<i><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/icons/shield.png" class="mt-18-off" /> </i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<h2 class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<a><?php echo __('Account Options');?></a>
				</h2>
			</div>
			<div class="blog-content bg-major-black journey">
				<div class="row contact-form form-dark px-20 py-20">
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>account-panel/reset" class="font-normal"><?php echo __('Reset'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Reset your character level'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>grand-reset-character" class="font-normal"><?php echo __('Grand Reset'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Grand reset your character'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>add-stats" class="font-normal"><?php echo __('Add Stats'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Add level up points. Str.Agi.Vit etc'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>reset-stats" class="font-normal"><?php echo __('Reset Stats'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Reassign your stats'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>exchange-wcoins" class="font-normal"><?php echo __('Exchange Wcoins'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Exchange credits to Wcoins'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>pk-clear" class="font-normal"><?php echo __('PK Clear'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Clear player kills.<br />Receive normal status'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>clear-inventory" class="font-normal"><?php echo __('Clear Inventory'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Remove items from inventory'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>warp-char" class="font-normal"><?php echo __('Warp Character'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Move to another location.<br> use to unstuck character'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>clear-skilltree" class="font-normal"><?php echo __('Clear SkillTree'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Reset character skilltree.'); ?></span>
						</blockquote>
					</div>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>zen-wallet" class="font-normal"><?php echo __('Zen Wallet'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Transfer zen between characters and other places.'); ?></span>
						</blockquote>
					</div>
					<?php if($this->config->values('referral_config', 'active') == 1){ ?>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>account-panel/my-referral-list" class="font-normal"><?php echo __('Referral System'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Invite friends and get rewards.'); ?></span>
						</blockquote>
					</div>
					<?php } ?>
					<?php if($this->config->config_entry('changename|module_status') == 1){ ?>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>shop/change-name" class="font-normal"><?php echo __('Change Name'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Change character name.'); ?></span>
						</blockquote>
					</div> 
					<?php } ?>
					<?php if($this->config->values('change_class_config', 'active') == 1){ ?>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>shop/change-class" class="font-normal"><?php echo __('Change Class'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Change character class.'); ?></span>
						</blockquote>
					</div> 
					<?php } ?>
					<?php if($this->config->values('buylevel_config', [$this->session->userdata(['user' => 'server']), 'active']) == 1){ ?>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>shop/buy-level" class="font-normal"><?php echo __('Buy Level'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Buy level for your character.'); ?></span>
						</blockquote>
					</div>
					<?php } ?>
					<?php if(defined('PARTNER_SYSTEM') && PARTNER_SYSTEM == true ){ ?>
					<div class="col-lg-4 py-10">
						<blockquote class="text-center pt-20">
							<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
								<a href="<?php echo $this->config->base_url; ?>account-panel/coupons" class="font-normal"><?php echo __('Coupon'); ?></a>
							</span>
							<br/>
							<span class="text-white-50"><?php echo __('Receive rewards from Streamers.'); ?></span>
						</blockquote>
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
								<div class="col-lg-4 py-10">
									<blockquote class="text-center pt-20">
										<span class="blog-title text-white fs-20 font-theme py-0 mb-0">
											<a href="<?php echo $plugin['module_url']; ?>" class="font-normal"><?php echo __($plugin['about']['name']); ?></a>
										</span>
										<br/>
										<span class="text-white-50"><?php echo __($plugin['description']); ?></span>
									</blockquote>
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
	<div class="col-lg-12 space-20">&nbsp;</div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>