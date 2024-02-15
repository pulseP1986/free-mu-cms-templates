<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Two Factor Authentification'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title mb-2"><?php echo __('Two factor authentication is enabled for your account.'); ?></h2>
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
					<form method="post" action="" id="check_2fa">
						<div class="form-group">
							<label class="control-label"><?php echo __('6-digit authentication code'); ?></label>
							<input type="text" class="form-control" name="code" id="code" value="">
						</div>
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" name="check_2fa" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
						</div>
						<div class="form-group">
							
						</div>
					</form>   
					<div class="list-group mb-4 additional-links">
						<div class="list-group-item-action"><a href="<?php echo $this->config->base_url; ?>account-panel/reset-two-factor-auth"><?php echo __('Reset two factor authentification'); ?>?</div>
					</div>
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
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>	