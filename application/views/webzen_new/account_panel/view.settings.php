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
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Two Factor Authentification'); ?></h2>
					 <?php
                        if(isset($tfa_error)){
                            echo '<div class="alert alert-danger">' . $tfa_error . '</div>';
                        }
                        if(isset($tfa_success)){
                            echo '<div class="alert alert-success">' . $tfa_success . '</div>';
                        }
                    ?>
					<?php
					if($is_auth_enabled != false){
					?>
					<p class="mb-2 mt-2">Two factor authentication is enabled for your account.</p>
					<form method="post" action="">
						<div class="form-group">
							<label class="control-label"><?php echo __('6-digit authentication code'); ?></label>
							<input type="text" class="form-control" name="code" id="code" value="">
						</div>
						<div class="form-group mb-5">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" name="disable_2fa" class="btn btn-primary"><?php echo __('Disable'); ?></button></div>
						</div>
					</form>
					<?php	
					}
					else{
					?>
					<p class="mb-1 mt-1">To enable two factor authentication, follow the following steps carefully to make sure you're not locked out of your account.</p>
                    <h3>Install app</h3>
                    <p class="mt-1 mb-1">Install one of the free available time based two factor authentication apps. We can recommend <em>Authy</em> or <em>Google Authenticator</em> for both Android and iOS.</p>
                    <h3>Step 2 - Back-up code</h3>
                    <p class="mt-1">Write down the back-up code below in a secure location. This back-up code is needed, in case you can't access your phone. For security reasons, the back-up code is only provided during the initial setup.</p>
                    <p class="mb-1 mt-1"><big><strong><?php echo $backup_code;?></strong></big></p>
                    <h3>Step 3 - Scan the QR code</h3>
                    <p class="mt-1">Scan the QR code with your phone, using the installed authentication app. After this process two factor authentication will be enabled for your account. Every 30 seconds a new 6-digit code is generated in the authentication app. Use this code during log-in.</p>
                    <p class="mb-1 mt-1"><img src="<?php echo $qr_image;?>" /></p>
                    <h3>Enable two factor authentication</h3>
                    <p class="mt-1 mb-2">After scanning the QR code, the authenticator app will generate a new code every 30 seconds. Because the generated codes are very time sensitive, enter the current 6-digit code below and click on the enable button. This will ensure that everything is working as expected before enabling two factor authentication for your account.</p>
                    <form method="post" action="">
						<div class="form-group">
							<label class="control-label"><?php echo __('6-digit authentication code'); ?></label>
							<input type="text" class="form-control" name="code" id="code" value="">
						</div>
						<div class="form-group mb-5">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" name="enable_2fa" class="btn btn-primary"><?php echo __('Enable'); ?></button></div>
						</div>
					</form>
					<?php } ?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>