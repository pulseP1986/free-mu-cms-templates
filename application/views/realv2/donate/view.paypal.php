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
								$images = [
									1 => 'https://images.realmu.net/uploads/20240425/16629e15fe20e9.png',
									2 => 'https://images.realmu.net/uploads/20240425/16629e15fe20e9.png',
								];
								echo '<div class="row justify-content-center">';
								foreach($paypal_packages as $packages){
									echo '<div class="col-lg-4 mb-4">';
									echo '<div class="table-pack text-center">';
									$price = $packages['price'];
									if(isset($donation_config['paypal_fee']) && $donation_config['paypal_fee'] != ''){
										$fee = ($donation_config['paypal_fee'] / 100) * $packages['price'];
										$price = $packages['price'] + $fee;
									}
									if(isset($donation_config['paypal_fixed_fee']) && $donation_config['paypal_fixed_fee'] != ''){
										$price += $donation_config['paypal_fixed_fee'];
									}
									if(isset($images[$packages['id']])){
										echo '<div class="pt-10 px-20 mt-30" style="height: 120px !important;">
												<img src=" ' . $images[$packages['id']] . '" />
											</div>';
									}
									echo '<div class="pb-10 mt-2">
											<span class="blog-title text-white font-theme h4 fs-20">
											<a>' . $packages['package'] . '</a>
										</div>
										<div class="px-10">
											<hr class="mt-20" />
										</div>
										<div class="pb-5 fs-16" id="reward_' . $packages['id'] . '">
											' . $packages['reward'] . ' ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(['user' => 'server'])) . '
										</div>
										<div class="py-0 fs-16 text-white" id="price_' . $packages['id'] . '" data-price-tax="' . number_format($price, 2, '.', ',') . '" data-currency="'.$packages['currency'].'">
											' . number_format($packages['price'], 2, '.', ',') . ' ' . $packages['currency'] . '
										</div>
										<div class="mt-2 text-white fs-20 gift">';
										if(isset($donation_config['type']) && $donation_config['type'] == 2){
											echo '<a class="vs-btn gradient-btn h4" href="' . $this->config->base_url . 'donate/paypal-checkout/' . $packages['id'] . '">' . __('Buy Now') . '</a>';
										} 
										else{
											echo '<button class="vs-btn gradient-btn h4" id="buy_paypal_' . $packages['id'] . '_' . $donation_config['sandbox'] . '" value="buy_paypal_' . $packages['id'] . '">' . __('Buy Now') . '</button>';
										}
									echo '</div></div></div>';
								}
								echo '</div>';
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
