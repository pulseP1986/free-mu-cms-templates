<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Lost Password'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Find out your password in case you have lost it.'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12">     
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
								<select name="server" id="server" class="form-control validate[required]">
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
							<input type="text" class="form-control validate[required,minSize[<?php echo $rconfig['min_username']; ?>]]" name="lost_info" id="lost_info" value="">
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
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
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
								<select name="fpas_ques" id="fpas_ques" class="form-control validate[required]">
									<?php foreach($secret_question_list as $key => $value){ ?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Secret Answer'); ?></label>
							<input type="text" class="form-control validate[required,minSize[4],maxSize[50]]" name="fpas_answ" id="fpas_answ" value="">
						</div>
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
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