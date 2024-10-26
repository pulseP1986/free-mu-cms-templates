<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Account Settings'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
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
							<div class="col-lg-12">     
								<h2 class="title"><?php echo __('Change Email'); ?></h2>
								<form method="post" action="<?php echo $this->config->base_url; ?>settings" id="set_new_email_form">
									<div class="form-group">
										<label class="control-label"><?php echo __('New Email'); ?></label>
										<input type="email" class="form-control bg-light-dark text-white validate[required,custom[email],maxSize[50]]" name="email" id="email" value="">
									</div>
									<div class="form-group mb-5">
										<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
									</div>
								</form>
							</div>	
						</div>	
						<?php } ?>
					</div>	
				</div>	
			</div>
		</div>
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>