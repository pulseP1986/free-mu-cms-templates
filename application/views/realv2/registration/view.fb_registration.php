<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Facebook Login'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Facebook Account Register'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-lg-12"> 
					<?php
						if(isset($errors)){
							foreach($errors as $error){
								echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
							}
						}
					?>
					<form method="post" action="" id="fb_register_form" name="fb_register_form">
						<div class="form-group">
							<label class="control-label"><?php echo __('Username'); ?></label>
							<input type="text" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $config['min_username']; ?>],maxSize[<?php echo $config['max_username']; ?>]]" name="user" id="user" value="">
						</div>
						<?php if($config['req_secret'] == 1){ ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Secret Questions'); ?></label>
							<div>
								<select name="fpas_ques" id="fpas_ques" class="form-control bg-light-dark text-white validate[required]">
									<?php foreach($this->website->secret_questions() as $key => $value){ ?>
										<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Secret Answer'); ?></label>
							<input type="text" class="form-control bg-light-dark text-white validate[required,minSize[4],maxSize[50]]" name="fpas_answ" id="fpas_answ" value="">
						</div>
						<?php } ?>
						<div class="form-group">
							<label class="control-label"><?php echo __('Password'); ?></label>
							<input type="password" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]" name="pass" id="pass" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Repeat Password'); ?></label>
							<input type="password" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>],equals[pass]]" name="rpass" id="rpass" value="">
						</div>
						<div class="form-group mb-5">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4" name="add_fb_account"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
					<script type="text/javascript">
						$(document).ready(function () {
							$("#fb_register_form").validationEngine();
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