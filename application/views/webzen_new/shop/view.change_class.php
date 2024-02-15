<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Change Class'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Change character class.'); ?></h2>
					<div class="mb-5">
						<?php
						if(isset($not_found)){
							echo '<div class="alert alert-danger" role="alert">' . $not_found . '</div>';
						} else{
							if(isset($error)){
								echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
							}
							if(isset($success)){
								echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
							}
							?>
							<form method="POST" action="" id="buy_class_form" name="buy_class_form">
								<div class="form-group">
									<label class="control-label"><?php echo __('Character'); ?></label>
									<div>
										<select name="character" id="select_char" class="form-control">
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
									<label class="control-label"><?php echo __('Class'); ?></label>
									<div>
										<select name="class_select" id="class_select" class="form-control">
											<option value="" disabled="disabled" selected="selected"><?php echo __('--SELECT--'); ?></option>
										</select>	
									</div>
								</div>
								
								<div><?php echo __('Price'); ?>: <span id="class_change_price">Select Character</span></div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button type="submit" id="buy_class_button" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
								</div>
							</form>
							<?php
						}
					?>
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