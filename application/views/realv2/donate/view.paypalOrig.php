<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('With PayPal'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<div class="mb-5">
					<?php
						if(isset($error)){
							echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
						} 
						else{
							if(!empty($paypal_packages)){
								echo '<ul class="list-group" id="paypal-options">';
								foreach($paypal_packages as $packages){
									$price = $packages['price'];
									if(isset($donation_config['paypal_fee']) && $donation_config['paypal_fee'] != ''){
										$fee = ($donation_config['paypal_fee'] / 100) * $packages['price'];
										$price = $packages['price'] + $fee;
									}
									if(isset($donation_config['paypal_fixed_fee']) && $donation_config['paypal_fixed_fee'] != ''){
										$price += $donation_config['paypal_fixed_fee'];
									}
									echo '<li class="list-group-item">
													<div style="display: flex;align-items: center;">
													<h4>' . $packages['package'] . '</h4>
													<h3><span id="reward_' . $packages['id'] . '">' . $packages['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(['user' => 'server'])) . ' (<span id="price_' . $packages['id'] . '" data-price-tax="' . number_format($price, 2, '.', ',') . '">' . number_format($packages['price'], 2, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '">' . $packages['currency'] . '</span>)</h3>';
													if(isset($donation_config['type']) && $donation_config['type'] == 2){
														echo '<a class="vs-btn gradient-btn h4" style="margin-left: auto;" href="' . $this->config->base_url . 'donate/paypal-checkout/' . $packages['id'] . '">' . __('Buy Now') . '</a>';
													} 
													else{
														echo '<button class="vs-btn gradient-btn h4" style="margin-left: auto;" id="buy_paypal_' . $packages['id'] . '_' . $donation_config['sandbox'] . '" value="buy_paypal_' . $packages['id'] . '">' . __('Buy Now') . '</button>';
													}
													echo '</div>';
									echo '</li>';
								}
								echo '</ul>';
							} 
							else{
								echo '<div class="alert alert-primary" role="alert">' . __('No Paypal Packages Found.') . '</div>';
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
