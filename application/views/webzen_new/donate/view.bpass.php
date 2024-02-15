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
					<h2 class="title"><?php echo __('With PayPal'); ?></h2>
					<div class="mb-5">
					<?php
					if(isset($error)){
						echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
					} 
					else{
					?>
					<ul id="paypal-options">
						<?php if(in_array($pass['pass_type'], [0])){ ?>
						<li>
							<h4 class="float-left"><?php echo __('Battle Pass Silver');?></h4>
							<h3 class="float-left"><span id="reward_b1">+ silver rewards</span> (<span id="price_b1" data-price-tax="<?php echo number_format(BPASS_SILVER_PRICE, 2, '.', ',');?>"><?php echo number_format(BPASS_SILVER_PRICE, 2, '.', ',');?></span> <span id="currency_b1"><?php echo BPASS_CURRENCY;?></span>)</h3>
							<button class="float-right btn btn-primary" id="buy_paypal_b1_<?php echo $donation_config['sandbox'];?>" style="margin-top: 8px;" value="buy_paypal_b1"><?php echo __('Buy Now');?></button>
						</li>
						<?php } ?>
						<?php if(in_array($pass['pass_type'], [0, 1])){ ?>
						<li>
							<h4 class="float-left"><?php echo __('Battle Pass Platinum');?></h4>
							<h3 class="float-left"><span id="reward_b1">+ platinum rewards</span> (<span id="price_b2" data-price-tax="<?php echo number_format(BPASS_PLATINUM_PRICE, 2, '.', ',');?>"><?php echo number_format(BPASS_PLATINUM_PRICE, 2, '.', ',');?></span> <span id="currency_b2"><?php echo BPASS_CURRENCY;?></span>)</h3>
							<button class="float-right btn btn-primary" id="buy_paypal_b2_<?php echo $donation_config['sandbox'];?>" style="margin-top: 8px;" value="buy_paypal_b2"><?php echo __('Buy Now');?></button>
						</li>
						<?php } ?>
					</ul>					
					<?php
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
