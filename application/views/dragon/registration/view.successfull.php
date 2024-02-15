<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Registration'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<?php
						if($config['email_validation'] == 1){
							echo '<div class="alert alert-success" role="alert">' . __('Your account has been successfully created.') . ' <br />' . __('Please check your email for account activation link.') . '</div><';
						} else {
							echo '<div class="alert alert-success" role="alert">' . __('Your account has been successfully created.') . ' <br />' . __('You can now login.') . '</div>';
						}
					?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>