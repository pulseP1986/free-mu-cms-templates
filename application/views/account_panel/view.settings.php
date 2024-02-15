<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Account Settings'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Change Password'); ?></h2>
					<form method="post" action="<?php echo $this->config->base_url; ?>settings" id="password_change_form">
						<div class="form-group">
							<label class="control-label"><?php echo __('Old Password'); ?></label>
							<input type="password" class="form-control validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]" name="old_password" id="old_password" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('New Password'); ?></label>
							<input type="password" class="form-control validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]" name="new_password" id="new_password" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Repeat New Password'); ?></label>
							<input type="password" class="form-control validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>],equals[new_password]]" name="new_password2" id="new_password2" value="">
						</div>
						<div class="form-group mb-5">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
				</div>	
			</div>
			<?php if($this->config->config_entry('account|allow_mail_change') == 1){ ?>
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Change Email'); ?></h2>
					<form method="post" action="<?php echo $this->config->base_url; ?>settings" id="email_change_form">
						<div class="form-group">
							<label class="control-label"><?php echo __('Current Email'); ?></label>
							<input type="email" class="form-control validate[required,custom[email],maxSize[50]]" name="email" id="email" value="">
						</div>
						<div class="form-group mb-5">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
				</div>	
			</div>	
			<?php } ?>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>