<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Change character class.'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
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
											<select name="character" id="select_char" class="form-control bg-light-dark text-white has-border py-18 register">
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
											<select name="class_select" id="class_select" class="form-control bg-light-dark text-white has-border py-18 register">
												<option value="" disabled="disabled" selected="selected"><?php echo __('--SELECT--'); ?></option>
											</select>	
										</div>
									</div>
									<?php
										$price = $changeclass_config['price'];
										if($this->session->userdata('vip')){
											$price -= ($price / 100) * $this->session->userdata(['vip' => 'change_class_discount']);
										}
									?>
									<div><?php echo __('Price'); ?>: <?php echo $price; ?> <?php echo $this->website->translate_credits($changeclass_config['payment_type'], $this->session->userdata(['user' => 'server'])); ?></div>
									<div class="form-group mb-5">
										<div class="d-flex justify-content-center align-items-center"><button type="submit" id="buy_class_button" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
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
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>