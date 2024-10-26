<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Zen Wallet'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Transfer zen between characters and other places.'); ?></h2>
						<div class="mb-5">
							<?php
								if(isset($error)){
									echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
								}
								if(isset($success)){
									echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
								}
							?>
							<form method="POST" action="" id="zen_wallet_form">
								<div class="form-group">
									<label class="control-label"><?php echo __('Transfer From'); ?></label>
									<div>
										<select name="from" id="from" class="form-control bg-light-dark text-white has-border py-18 register">
											<?php
												if(isset($char_list) && $char_list != false){
													foreach($char_list as $char){ ?>
														<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?>
															(<?php echo $this->website->zen_format($char['money']); ?>)
														</option>
													<?php
													}
												}
												if(isset($wh_zen) && $wh_zen !== false){
													?>
													<option value="warehouse"><?php echo __('Warehouse'); ?>
														(<?php echo $this->website->zen_format($wh_zen); ?>)
													</option>
													<?php
												}
												if(isset($wallet_zen) && $wallet_zen !== false){
													?>
													<option value="webwallet"><?php echo __('Zen Wallet'); ?>
														(<?php echo $this->website->zen_format($wallet_zen['credits3']); ?>)
													</option>
													<?php
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label"><?php echo __('Transfer To'); ?></label>
									<div>
										<select name="to" id="to" class="form-control bg-light-dark text-white has-border py-18 register">
											<?php
												if(isset($char_list) && $char_list != false){
													foreach($char_list as $char){ ?>
														<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?>
															(<?php echo $this->website->zen_format($char['money']); ?>)
														</option>
													<?php
													}
												}
												if(isset($wh_zen) && $wh_zen !== false){
													?>
													<option value="warehouse"><?php echo __('Warehouse'); ?>
														(<?php echo $this->website->zen_format($wh_zen); ?>)
													</option>
													<?php
												}
												if(isset($wallet_zen) && $wallet_zen !== false){
													?>
													<option value="webwallet"><?php echo __('Zen Wallet'); ?>
														(<?php echo $this->website->zen_format($wallet_zen['credits3']); ?>)
													</option>
													<?php
												}
											?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label"><?php echo __('Enter Amount'); ?></label>
									<input type="text" class="form-control bg-light-dark text-white" type="text" id="zen" name="zen" value="">
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button type="submit" id="transfer_zen" name="transfer_zen" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
								</div>								
							</form>
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