<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Registration'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<?php
						if($config['email_validation'] == 1){
							echo '<div class="alert alert-success" role="alert">' . __('Your account has been successfully created.') . ' <br />' . __('Please check your email for account activation link.') . '</div>';
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