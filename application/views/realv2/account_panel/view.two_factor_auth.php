<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Two Factor Authentification'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<?php if(isset($security_config['2fa']) && $security_config['2fa'] == 1){ ?>
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Two factor authentication is enabled for your account.'); ?></h2>
					</div>	
				</div>	
				<div class="row">
					<div class="col-lg-12"> 
						<?php
						if(isset($tfa_error)){
							echo '<div class="alert alert-danger">' . $tfa_error . '</div>';
						}
						if(isset($tfa_success)){
							echo '<div class="alert alert-success">' . $tfa_success . '</div>';
						}
						if($is_auth_enabled != false){
						?>
							<form method="post" action="" id="check_2fa">
								<div class="form-group">
									<input type="text" class="form-control bg-light-dark text-white" name="code" placeholder="<?php echo __('6-digit authentication code'); ?>" />
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center">
										<button type="submit" name="check_2fa" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button>
									</div>
								</div>
							</form>	
							<div class="mt-2"><a href="<?php echo $this->config->base_url; ?>account-panel/reset-two-factor-auth"><?php echo __('Reset two factor authentification'); ?>?</div>
						<?php	
						}
						else{
							echo __('Two factor authentification not enabled');
						}
						?>
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