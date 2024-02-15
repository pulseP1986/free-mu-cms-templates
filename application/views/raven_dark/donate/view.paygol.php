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
					<h2 class="title"><?php echo __('With PayGol'); ?></h2>
					<div class="mb-5">
						<div style="padding: 5px; text-align: center;">
							<form name="pg_frm" method="post" action="http://www.paygol.com/micropayment/paynow">
								<input type="hidden" name="pg_serviceid" value="<?php echo $donation_config['service_id']; ?>">
								<input type="hidden" name="pg_currency" value="<?php echo $donation_config['currency_code']; ?>">
								<input type="hidden" name="pg_name" value="Buy <?php echo $donation_config['reward']; ?> <?php echo $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(['user' => 'server'])); ?>">
								<input type="hidden" name="pg_custom" value="<?php echo $this->session->userdata(['user' => 'username']); ?>-server-<?php echo $this->session->userdata(['user' => 'server']); ?>">
								<input type="hidden" name="pg_price" value="<?php echo $donation_config['service_price']; ?>">
								<input type="hidden" name="pg_return_url" value="<?php echo $this->config->base_url; ?>donate/paygol">
								<input type="hidden" name="pg_cancel_url" value="<?php echo $this->config->base_url; ?>donate/paygol">
								<input type="image" name="pg_button" src="http://www.paygol.com/micropayment/img/buttons/150/red_en_pbm.png" border="0" alt="Make payments with PayGol: the easiest way!" title="Make payments with PayGol: the easiest way!">
							</form>
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