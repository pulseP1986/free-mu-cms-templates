<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Account Panel'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Account Login'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12"> 
					<?php
					$fb = $this->config->values('social_config', 'providers');
					if($fb['Facebook']['enabled'] == true){
					?>
					<div class="d-flex justify-content-center align-items-center"><?php echo $this->website->fb_login('button', 'btn btn-primary mb-2'); ?></div>
					<div class="or" style="color:#2c3844;"><?php echo __('OR');?></div>
					<?php } ?>
					<form id="login_form_page" class="login_form" method="post" action="<?php echo $this->config->base_url; ?>">
						<div class="form-group">
							<label class="control-label"><?php echo __('Username'); ?></label>
							<input type="text" class="form-control" name="username" id="login_input_page" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Password'); ?></label>
							<input type="password" class="form-control" name="password" id="password_input_page" value="">
						</div>
						<?php if($this->config->values('security_config', 'captcha_on_login') == 1){ ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Security'); ?></label>
							<input type="text" class="form-control" name="captcha" id="captcha_input_page" value="">
						</div>	   
						 <img src="<?php echo $this->config->base_url; ?>ajax/captcha" alt="CAPTCHA" id="captcha_image" />
						<?php } ?>	
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
						</div>
						<div class="form-group">
							<a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Lost Password'); ?>?</a>
							<a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration'); ?></a>
						</div>
					</form>
				</div>	
			</div>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>