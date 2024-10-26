<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Buy GM'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Buy GameMaster status for your character'); ?></h2>
					<?php
					if(isset($not_found)){
						echo '<div class="alert alert-danger" role="alert">' . $not_found . '</div>';
					} 
					else{
						if(isset($error)){
							echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
						}
						if(isset($success)){
							echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
						}
						?>
						<form method="POST" action="" id="buy_gm_form" name="buy_gm_form">
							<div class="form-group">
								<label class="control-label"><?php echo __('Character'); ?></label>
								<div>
									<select name="character" id="character" class="form-control bg-light-dark text-white">
										<option value=""><?php echo __('--SELECT--'); ?></option>
										<?php
											if($char_list){
												foreach($char_list as $char){
													if($char['CtlCode'] != $this->config->config_entry('buygm|gm_ctlcode')){
										?>
										<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
										<?php
													}
												}
											}
										?>
									</select>	
								</div>
							</div>
							<div><?php echo __('Price'); ?>: <?php echo $this->config->config_entry('buygm|price'); ?> <?php echo $this->website->translate_credits($this->config->config_entry('buygm|price_t')); ?></div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center"><button type="submit" id="buy_gm_button" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
							</div>
						</form>
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