<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Buy Level'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Buy level for your character'); ?></h2>
					<?php
					if($level_config != false && $level_config['active'] == 1){
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
							<form method="POST" action="" id="buy_level_form" name="buy_level_form">
								<div class="form-group">
									<label class="control-label"><?php echo __('Character'); ?></label>
									<div>
										<select name="character" id="character" class="form-control">
											<option value=""><?php echo __('--SELECT--'); ?></option>
											<?php
												if($char_list){
													foreach($char_list as $char){
											?>
											<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
											<?php
													}
												}
											?>
										</select>	
									</div>
								</div>
								<div class="form-group">
									<label class="control-label"><?php echo __('Level'); ?></label>
									<div>
										<?php if(!empty($level_config['levels'])){ ?>
											<select name="level" id="level" class="form-control">
												<option value=""><?php echo __('--SELECT--'); ?></option>
												<?php
													foreach($level_config['levels'] as $level => $data){
														echo '<option value="' . $level . '">' . $level . ' lvl price ' . $data['price'] . ' ' . $this->website->translate_credits($data['payment_type'], $this->session->userdata(['user' => 'server'])) . '</option>';
													}
												?>
											</select>
										<?php } else{ ?>
											<?php echo __('No levels to select'); ?>
										<?php } ?>										
									</div>
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button type="submit" id="buy_level_button" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
								</div>
							</form>
						<?php } ?>
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