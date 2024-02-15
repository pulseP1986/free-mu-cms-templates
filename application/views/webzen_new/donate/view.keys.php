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
							<h4 class="float-left"><?php echo AMOUNT_OF_KEYS.' '.__('Keys');?></h4>
							<h3 class="float-left"><span id="reward_b1"><span id="price_k1" data-price-tax="<?php echo number_format(WHEEL_KEYS_PRICE, 2, '.', ',');?>"><?php echo number_format(WHEEL_KEYS_PRICE, 2, '.', ',');?></span> <span id="currency_k1"><?php echo WHEEL_KEYS_CURRENCY;?></span></h3>
							<button class="float-right btn btn-primary" id="buy_paypal_k1_<?php echo $donation_config['sandbox'];?>" style="margin-top: 8px;" value="buy_paypal_k1"><?php echo __('Buy Now');?></button>
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
