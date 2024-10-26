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
					<h2 class="title"><?php echo __('Resend activation code.'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-lg-12">   
					<?php
					if(isset($error)){
						if(is_array($error)){
							foreach($error as $er){
								echo '<div class="alert alert-danger" role="alert">' . $er . '</div>';
							}
						} 
						else {
							echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
						}
					}
					if(isset($success)){
						echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
					}
					if(isset($not_required)){
						echo '<div class="alert alert-danger" role="alert">' . $not_required . '</div>';
					} 
					else{
                    ?>
					<form method="post" action="" id="resend_activation_form" name="resend_activation_form">
						<?php if($this->website->is_multiple_accounts() == true){ ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Server'); ?></label>
							<div>
								<select name="server" id="server" class="form-control bg-light-dark text-white validate[required]">
									<option value=""><?php echo __('Select Server'); ?></option>
									<?php foreach($this->website->server_list() as $key => $server){ ?>
											<option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php } ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Email'); ?></label>
							<input type="email" class="form-control bg-light-dark text-white validate[required,custom[email],maxSize[50]]" name="email" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
						</div>
						<?php if(isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1){ ?>
							<div class="form-group">
								<label class="control-label"><?php echo __('Security'); ?></label>
								<div class="QapTcha"></div>
							</div>
						<?php } ?>
						<?php if(isset($security_config['captcha_type']) && $security_config['captcha_type'] == 3){ ?>
							<div class="form-group">
								<label class="control-label"><?php echo __('Security'); ?></label>
								<script src="https://www.google.com/recaptcha/api.js"></script>
								<div class="g-recaptcha" data-sitekey="<?php echo $security_config['recaptcha_pub_key']; ?>"></div>
							</div>
						<?php } ?>
						<div class="form-group mb-5">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
					<script type="text/javascript">
						$(document).ready(function () {
							<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1): ?>
							App.buildCaptcha('.QapTcha');
							<?php endif; ?>
							$("#resend_activation_form").validationEngine();
						});
					</script>
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