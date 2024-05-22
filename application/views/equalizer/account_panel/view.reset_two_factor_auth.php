<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Two Factor Authentification'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<?php if(isset($security_config['2fa']) && $security_config['2fa'] == 1){ ?>
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Reset two factor authentification'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12"> 
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
						<form method="post" action="" id="check_backup_code">
							<div class="form-group">
								<input type="text" class="form-control" name="code" placeholder="Enter Backup Code" />
							</div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center">
									<button type="submit" name="check_backup_code" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</form>	
					<?php	
					}
					else{
					?>
					Two factor authentification not enabled
					<?php
					}
					?>
				</div>	
			</div>
			<?php } ?>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>