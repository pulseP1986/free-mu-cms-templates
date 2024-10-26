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