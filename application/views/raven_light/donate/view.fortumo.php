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
					<h2 class="title"><?php echo __('With Fortumo'); ?></h2>
					<div class="mb-5">
						<script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
						<div style="padding: 5px; text-align: center;">
							 <a id="fmp-button" href="#" rel="http://pay.fortumo.com/mobile_payments/<?php echo $donation_config['service_id']; ?>?cuid=<?php echo $this->session->userdata(['user' => 'username']); ?>-server-<?php echo $this->session->userdata(['user' => 'server']); ?>?callback_url=<?php echo $this->config->base_url; ?>payment/fortumo<?php if($donation_config['sandbox'] == 1){ ?>?test=ok<?php } ?>">
								<img src="https://assets.fortumo.com/fmp/fortumopay_96x47.png" width="96" height="47" alt="Mobile Payments by Fortumo" border="0"/>
							</a>
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
	