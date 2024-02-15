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
					<h2 class="title"><?php echo __('Set New Email'); ?></h2>
					<?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
                    if(isset($success)){
                        echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                    }
                    if($set_new_email == true){
					?>
					<div class="row">
						<div class="col-12">     
							<h2 class="title"><?php echo __('Change Email'); ?></h2>
							<form method="post" action="<?php echo $this->config->base_url; ?>settings" id="set_new_email_form">
								<div class="form-group">
									<label class="control-label"><?php echo __('New Email'); ?></label>
									<input type="email" class="form-control validate[required,custom[email],maxSize[50]]" name="email" id="email" value="">
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
								</div>
							</form>
						</div>	
					</div>	
					<?php
                    }
					?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>