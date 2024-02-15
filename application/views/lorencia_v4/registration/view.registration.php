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
					<h2 class="title"><?php echo __('Create your account in just few clicks'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12">     
					<div class="list-group mb-4 additional-links">
						<div class="list-group-item-action"><?php echo __('Not Received activation email');?>? <a href="<?php echo $this->config->base_url;?>registration/resend-activation"><?php echo __('Click Here');?></a></div>
						<div class="list-group-item-action"><?php echo __('Lost Password');?>? <a href="<?php echo $this->config->base_url;?>lost-password"><?php echo __('Click Here');?></a></div>
					</div>
				</div>	
			</div>	
			
			<div class="row">
				<div class="col-12"> 
					<form method="post" class="registration_form" action="<?php echo $this->config->base_url; ?>registration" id="registration_form">
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
							<input type="text" class="form-control validate[required,minSize[<?php echo $config['min_username']; ?>],maxSize[<?php echo $config['max_username']; ?>]]" name="user" id="user" value="">
						</div>
						<?php if($config['req_email'] == 1){ ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Email'); ?></label>
							<input type="email" class="form-control validate[required,custom[email],maxSize[50]]" name="email" id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
						</div>
						<?php } ?>
						<?php if($config['req_secret'] == 1){ ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Secret Questions'); ?></label>
							<div>
								<select name="fpas_ques" id="fpas_ques" class="form-control validate[required]">
									<?php foreach($this->website->secret_questions() as $key => $value){ ?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Secret Answer'); ?></label>
							<input type="text" class="form-control validate[required,minSize[4],maxSize[50]]" name="fpas_answ" id="fpas_answ" value="">
						</div>
						<?php } ?>
						<?php if($config['email_validation'] == 0 || $config['generate_password'] == 0){ ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Password'); ?></label>
							<input type="password" class="form-control validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]" name="pass" id="pass" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Repeat Password'); ?></label>
							<input type="password" class="form-control validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>],equals[pass]]" name="rpass" id="rpass" value="">
						</div>
						<?php } ?>
						<?php if(isset($show_ref) && $show_ref == true){ ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Referrer'); ?></label>
							<input type="text" class="form-control" name="referrer" id="referrer" value="<?php echo $ref; ?>" readonly>
							<input type="hidden" name="ref_server" id="ref_server" value="<?php echo $server; ?>" readonly/>
						</div>
						<?php } ?>
						<div class="form-group">
							<input class="validate[required]" type="checkbox" name="rules" id="rules"/> <?php echo __('I have read and agree to the <a href="" id="rules_dialog"><b>game rules.</b></a>'); ?>
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
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
					<script type="text/javascript">
						$(document).ready(function () {
							<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1): ?>
							App.buildCaptcha('.QapTcha');
							<?php endif; ?>
							<?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 3): ?>
							$.extend(DmNConfig, {use_recaptcha_v2: 1});
							<?php endif; ?>
							$("#registration_form").validationEngine('attach', {
								scroll: false,
								onValidationComplete: function (form, status) {
									if (status == true) {
										App.registerAccount(form);
									}
								}
							});
							$("#rules_dialog").on('click', function (e) {
								e.preventDefault();
								App.initializeRulesDialog('<?php echo __('Server Rules'); ?>');
							});
						});
					</script>
				</div>	
			</div>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>