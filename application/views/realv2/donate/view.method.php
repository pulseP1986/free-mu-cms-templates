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
					<h2 class="title"><?php echo __('Choose Donation Method'); ?></h2>
					<div class="row justify-content-center align-items-center">
						<?php if(isset($donation_config['paypal']) && $donation_config['paypal']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/paypal" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('PayPal'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['paymentwall']) && $donation_config['paymentwall']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/paymentwall" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('PaymentWall'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['fortumo']) && $donation_config['fortumo']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/fortumo" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('Fortumo'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['paygol']) && $donation_config['paygol']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/paygol" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('Paygol'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['2checkout']) && $donation_config['2checkout']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/two-checkout" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('2CheckOut'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['pagseguro']) && $donation_config['pagseguro']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/pagseguro" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('PagSeguro'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['paycall']) && $donation_config['paycall']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/paycall" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('PayCall'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['interkassa']) && $donation_config['interkassa']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/interkassa" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('Interkassa'); ?></a></div>
						<?php } ?>
						<?php if(isset($donation_config['cuenta_digital']) && $donation_config['cuenta_digital']['active'] == 1){ ?>
						<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="<?php echo $this->config->base_url; ?>donate/cuenta_digital" class="vs-btn gradient-btn h4 dmn-donate-button" role="button"><?php echo __('CuentaDigital'); ?></a></div>
						<?php } ?>
						<?php
						$plugins = $this->config->plugins();
						$is_any = false;
						if(!empty($plugins)):
							foreach($plugins AS $plugin):
								if($plugin['installed'] == 1 && $plugin['donation_panel_item'] == 1):
									$is_any = true;
									echo '<div class="col-lg-3 ml-1 mr-1 mb-1"><a href="' . $plugin['module_url'] . '" class="vs-btn gradient-btn h4 dmn-donate-button" role="button">' . $plugin['about']['name'] . '</a></div>';
								endif;
							endforeach;
						endif;
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