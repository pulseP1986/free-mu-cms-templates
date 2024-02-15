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
					<h2 class="title"><?php echo __('Set new password'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12">     
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
							<input type="password" class="form-control validate[required,minSize[<?php echo $rconfig['min_password']; ?>],maxSize[<?php echo $rconfig['max_password']; ?>]]" name="new_password" id="new_password" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Repeat New Password'); ?></label>
							<input type="password" class="form-control validate[required,minSize[<?php echo $rconfig['min_password']; ?>],maxSize[<?php echo $rconfig['max_password']; ?>],equals[new_password]]" name="new_password2" id="new_password2" value="">
						</div>
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
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