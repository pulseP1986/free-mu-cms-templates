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
					<h2 class="title"><?php echo __('Choose Donation Method'); ?></h2>
					<div class="row justify-content-center align-items-center">
						<?php if(isset($donation_config['paypal']) && $donation_config['paypal']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/paypal" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('PayPal'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['paymentwall']) && $donation_config['paymentwall']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/paymentwall" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('PaymentWall'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['fortumo']) && $donation_config['fortumo']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/fortumo" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('Fortumo'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['paygol']) && $donation_config['paygol']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/paygol" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('Paygol'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['2checkout']) && $donation_config['2checkout']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/two-checkout" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('2CheckOut'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['pagseguro']) && $donation_config['pagseguro']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/pagseguro" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('PagSeguro'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['paycall']) && $donation_config['paycall']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/paycall" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('PayCall'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['interkassa']) && $donation_config['interkassa']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/interkassa" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('Interkassa'); ?></a>
						<?php } ?>
						<?php if(isset($donation_config['cuenta_digital']) && $donation_config['cuenta_digital']['active'] == 1){ ?>
						<a href="<?php echo $this->config->base_url; ?>donate/cuenta_digital" class="btn btn-primary dmn-donate-button" role="button"><?php echo __('CuentaDigital'); ?></a>
						<?php } ?>
						<?php
						$plugins = $this->config->plugins();
						$is_any = false;
						if(!empty($plugins)):
							foreach($plugins AS $plugin):
								if($plugin['installed'] == 1 && $plugin['donation_panel_item'] == 1):
									$is_any = true;
									echo '<a href="' . $plugin['module_url'] . '" class="btn btn-primary dmn-donate-button" role="button">' . $plugin['about']['name'] . '</a>';
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