<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Clear Inventory'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Clear character inventory, equipment etc..'); ?></h2>
						<div class="mb-5">
							<?php
							if(isset($char_list) && $char_list != false){
								?>
								<form method="post" action="" id="clear_inventory_form">
									<div class="form-group">
										<label class="control-label"><?php echo __('Character'); ?></label>
										<div>
											<select name="character" id="character" class="form-control bg-light-dark text-white has-border py-18 register">
												<?php foreach($char_list as $char){ ?>
													<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group">
										<input type="checkbox" name="inventory" value="1"/> <?php echo __('Inventory'); ?>
										<br/>
										<?php if($this->website->get_value_from_server($this->session->userdata(['user' => 'server']), 'wh_size') > 1920): ?>
											<input type="checkbox" id="exp_inv_1" name="exp_inv_1" value="1"/> <?php echo __('Expanded Inventory'); ?> 1
											<br/>
											<input type="checkbox" id="exp_inv_2" name="exp_inv_2" value="1"/> <?php echo __('Expanded Inventory'); ?> 2
											<br/>
										<?php endif; ?>
										<input type="checkbox" id="equipment" name="equipment" value="1"/> <?php echo __('Equipment'); ?>
										<br/>
										<input type="checkbox" id="store" name="store" value="1"/> <?php echo __('Personal Store'); ?>
									</div>
									<div class="form-group mb-5">
										<div class="d-flex justify-content-center align-items-center"><button type="submit" id="clear_inv_button" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
									</div>			
								</form>
							<?php
							} else{
							?>
								<div class="alert alert-danger" role="alert"><?php echo __('Character not found.'); ?></div>
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