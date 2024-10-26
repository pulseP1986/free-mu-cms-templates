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
					<h2 class="title"><?php echo __('Set new password'); ?></h2>
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
						} else{
							echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
						}
					}
					if(isset($success)){
						echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
					}
					?>
					<?php if(isset($valid) && $valid == 1){ ?>
					<form method="post" action="" id="change_lost_password" name="change_lost_password">
						<div class="form-group">
							<label class="control-label"><?php echo __('Enter New Password'); ?></label>
							<input type="password" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $rconfig['min_password']; ?>],maxSize[<?php echo $rconfig['max_password']; ?>]]" name="new_password" id="new_password" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Repeat New Password'); ?></label>
							<input type="password" class="form-control bg-light-dark text-white validate[required,minSize[<?php echo $rconfig['min_password']; ?>],maxSize[<?php echo $rconfig['max_password']; ?>],equals[new_password]]" name="new_password2" id="new_password2" value="">
						</div>
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
					<script type="text/javascript">
					$(document).ready(function () {
						$("#change_lost_password").validationEngine();
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