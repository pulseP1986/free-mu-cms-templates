<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Donate'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Interkassa'); ?></h2>
					<div class="mb-5">
						<?php
							if(isset($error)){
								echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
							} else{
								if(!empty($interkassa_packages)){
									foreach($interkassa_packages as $packages){
										echo '<ul id="paypal-options">
											<li>
												<h4 class="float-left">' . $packages['package'] . '</h4>
												<h3 class="float-left"><span id="reward_' . $packages['id'] . '">' . $packages['reward'] . '</span> ' . $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(['user' => 'server'])) . ' (<span id="price_' . $packages['id'] . '">' . number_format($packages['price'], 0, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '">' . $packages['currency'] . '</span>)</h3>
												<a class="float-right vs-btn gradient-btn h4" href="' . $this->config->base_url . 'donate/interkassa/' . $packages['id'] . '">' . __('Buy Now') . '</a>
											</li>
									</ul>';
									}
								} else{
									echo '<div class="alert alert-primary" role="alert">' . __('No Interkassa Packages Found.') . '</div>';
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