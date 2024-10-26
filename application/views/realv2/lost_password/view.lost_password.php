<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Lost Password'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Find out your password in case you have lost it.'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-lg-12">     
					<?php
					if(isset($error)){
						echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
					}
					if(isset($success)){
						echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
					}
					?>
					<?php if(!isset($secret_question_list)){ ?>
					<form method="post" action="<?php echo $this->config->base_url; ?>lost-password" id="lostpassword_form" name="lostpassword_form">
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
							<label class="control-label"><?php echo __('Username'); ?></label>
							<input type="text" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $rconfig['min_username']; ?>]]" name="lost_info" id="lost_info" value="">
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
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
					<script type="text/javascript">
					$(document).ready(function () {
						<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1): ?>
						App.buildCaptcha('.QapTcha');
						<?php endif; ?>
						$("#lostpassword_form").validationEngine();
					});
					</script>
					<?php } ?>
					<?php if(isset($secret_question_list)){ ?>
					<form method="post" action="<?php echo $this->config->base_url; ?>lost-password/by-question/" id="lostpassword_secret_form" name="lostpassword_secret_form">
						<div class="form-group">
							<label class="control-label"><?php echo __('Secret Questions'); ?></label>
							<div>
								<select name="fpas_ques" id="fpas_ques" class="form-control bg-light-dark text-white validate[required]">
									<?php foreach($secret_question_list as $key => $value){ ?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Secret Answer'); ?></label>
							<input type="text" class="form-control bg-light-dark text-white validate[required,minSize[4],maxSize[50]]" name="fpas_answ" id="fpas_answ" value="">
						</div>
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
					<script type="text/javascript">
					$(document).ready(function () {
						$("#lostpassword_secret_form").validationEngine();
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