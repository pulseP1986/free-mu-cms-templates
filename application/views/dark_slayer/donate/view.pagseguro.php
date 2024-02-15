<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Donate'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('With PagSeguro'); ?></h2>
					<div class="mb-5">
						<?php
							if(isset($error)){
								echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
							} else{
								if(!empty($packages)){
									foreach($packages as $package){
										if($this->session->userdata('vip')){
											$package['reward'] += ($package['reward'] / 100) * $this->session->userdata(['vip' => 'bonus_credits_for_donate']);
										}
										echo '<ul id="paypal-options">
											<li>
												<h4 class="float-left">' . $package['package'] . '</h4>
												<h3 class="float-left"><span id="reward_' . $package['id'] . '">' . $package['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(['user' => 'server'])) . ' (<span id="price_' . $package['id'] . '">' . number_format($package['price'], 0, '.', ',') . '</span> <span id="currency_' . $package['id'] . '">' . $package['currency'] . '</span>)</h3>
												<a class="float-right btn btn-primary" style="margin-top: 8px;" href="' . $this->config->base_url . 'donate/pagseguro/' . $package['id'] . '">' . __('Buy Now') . '</a>
											</li>
									</ul>';
									}
								} else{
									echo '<div class="alert alert-primary" role="alert">' . __('No PagSeguro Packages Found.') . '</div>';
								}
							}
						?>
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