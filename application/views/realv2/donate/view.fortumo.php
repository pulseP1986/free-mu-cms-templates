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
	