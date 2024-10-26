<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Account Settings'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Change Password'); ?></h2>
						<form method="post" action="" id="password_change_form">
							<div class="form-group">
								<label class="control-label"><?php echo __('Old Password'); ?></label>
								<input type="password" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]" name="old_password" id="old_password" value="">
							</div>
							<div class="form-group">
								<label class="control-label"><?php echo __('New Password'); ?></label>
								<input type="password" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]" name="new_password" id="new_password" value="">
							</div>
							<div class="form-group">
								<label class="control-label"><?php echo __('Repeat New Password'); ?></label>
								<input type="password" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>],equals[new_password]]" name="new_password2" id="new_password2" value="">
							</div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
							</div>
						</form>
					</div>	
				</div>
				<?php if(isset($security_config['allow_mail_change']) && $security_config['allow_mail_change'] == 1){ ?>
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Change Email'); ?></h2>
						<form method="post" action="<?php echo $this->config->base_url; ?>settings" id="email_change_form">
							<div class="form-group">
								<label class="control-label"><?php echo __('Current Email'); ?></label>
								<input type="email" class="form-control bg-light-dark text-white validate[required,custom[email],maxSize[50]]" name="email" id="email" value="">
							</div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
							</div>
						</form>
					</div>	
				</div>	
				<?php } ?>	
				<?php if(isset($security_config['allow_recover_masterkey']) && $security_config['allow_recover_masterkey'] == 1){ ?>
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Recover Master Key'); ?></h2>
						<?php
							if(isset($error)){
								echo '<div class="alert alert-danger">' . $error . '</div>';
							}
							if(isset($success)){
								echo '<div class="alert alert-success">' . $success . '</div>';
							}
						?>
						<form method="post" action="<?php echo $this->config->base_url; ?>settings" id="recover_master_key">
							<div class="alert alert-primary"><?php echo __('Recover your master key if you have forgotten it.'); ?></div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center"><button type="submit" name="recover_master_key" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
							</div>
						</form>
					</div>	
				</div>	
				<?php } ?>
				<?php if(isset($security_config['2fa']) && $security_config['2fa'] == 1){ ?>
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Two Factor Authentification'); ?></h2>
						<?php
						if(isset($tfa_error)){
							echo '<div class="alert alert-danger">' . $tfa_error . '</div>';
						}
						if(isset($tfa_success)){
							echo '<div class="alert alert-success">' . $tfa_success . '</div>';
						}
						if($is_auth_enabled != false){
						?>
						<form method="post" action="" id="disable_2fa">
							<div class="form-group">
								<label class="control-label"><?php echo __('Two factor authentication is enabled for your account.'); ?></label>
								<input type="text" class="form-control bg-light-dark text-white" name="code" placeholder="<?php echo __('6-digit authentication code');?>" />
							</div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center">
									<button type="submit" name="disable_2fa" class="vs-btn gradient-btn h4"><?php echo __('Disable');?></button>
								</div>
							</div>
						</form>	
						<?php	
						}
						else{
						?>
						<p><?php echo __('To enable two factor authentication, follow the following steps carefully to make sure you\'re not locked out of your account.');?></p>
						<h5><?php echo __('Install app');?></h5>
						<p><?php echo __('Install one of the free available time based two factor authentication apps. We can recommend <em>Authy</em> or <em>Google Authenticator</em> for both Android and iOS.');?></p>
						<h5><?php echo __('Step 2 - Back-up code');?></h5>
						<p><?php echo __('Write down the back-up code below in a secure location. This back-up code is needed, in case you can\'t access your phone. For security reasons, the back-up code is only provided during the initial setup.');?></p>
						<p><big><strong><?php echo $backup_code;?></strong></big></p>
						<h5><?php echo __('Step 3 - Scan the QR code');?></h5>
						<p><?php echo __('Scan the QR code with your phone, using the installed authentication app. After this process two factor authentication will be enabled for your account. Every 30 seconds a new 6-digit code is generated in the authentication app. Use this code during log-in.');?></p>
						<p class="text-center"><img src="<?php echo $qr_image;?>" /></p>
						<h5><?php echo __('Enable two factor authentication');?></h5>
						<p><?php echo __('After scanning the QR code, the authenticator app will generate a new code every 30 seconds. Because the generated codes are very time sensitive, enter the current 6-digit code below and click on the enable button. This will ensure that everything is working as expected before enabling two factor authentication for your account.');?></p>
						<form method="post" action="" id="enable_2fa">
							<div class="form-group">
								<input type="text" class="form-control bg-light-dark text-white" name="code" placeholder="<?php echo __('6-digit authentication code');?>" />
							</div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center">
									<button type="submit" name="enable_2fa" class="vs-btn gradient-btn h4"><?php echo __('Enable');?></button>
								</div>
							</div>
						</form>
						<?php } ?>
					</div>	
				</div>	
				<?php } ?>	
			</div>
		</div>
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>