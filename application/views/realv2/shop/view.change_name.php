<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title font-theme h4 mt-25-sm mb-5-off d-flex justify-content-between">
					<h2><?php echo __('Change Name'); ?></h2>
					<span><a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>shop/change-name-history"><?php echo __('Change Name History'); ?></a></span>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
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
						<div class="mb-5">
							<?php
								if($char_list){
									$i = 0;
									foreach($char_list as $char){
										$i++;
							?>
							<div class="form-group row justify-content-center align-items-center">
								<div class="col-lg-9">
								  <input type="text" class="form-control bg-light-dark text-white" style="height: 50px;" name="charname" id="charname-<?php echo bin2hex($char['name']); ?>" value="<?php echo $char['name']; ?>" tabindex="<?php echo $i; ?>">
								</div>
								<div class="col-lg-3">
								  <button type="submit" class="vs-btn gradient-btn" id="changename-<?php echo bin2hex($char['name']); ?>"><?php echo __('Submit');?></button>
								</div>
							</div>		
							<?php
									}
								}
							?>
							<?php
								$price = $this->config->config_entry('changename|price');
								if($this->session->userdata('vip')){
									$price -= ($price / 100) * $this->session->userdata(['vip' => 'change_name_discount']);
								}
							?>
							<ul class="list-unstyled mb-4 p-2 bg-dark text-white">
								<li><span class="me-2"><i class="fas fa-check text-success "></i></span><?php echo __('Character Name Change Cost') . ' ' . vsprintf(__('<span style="color:red;">%d</span> %s'), [$price, $this->website->translate_credits($this->config->config_entry('changename|price_type'), $this->session->userdata(['user' => 'server']))]); ?></li>
								<li><span class="me-2"><i class="fas fa-check text-success "></i></span><?php echo sprintf(__('Character Name can be 4-%d chars long!'), $this->config->config_entry('changename|max_length')); ?></li>
								<li><span class="me-2"><i class="fas fa-check text-success "></i></span><?php echo sprintf(__('Character Name can contain the following chars: %s'), stripslashes($this->config->config_entry('changename|allowed_pattern'))); ?></li>
								<?php if($this->config->config_entry('changename|check_guild') == 1){ ?>
									<li><span class="me-2"><i class="fas fa-check text-success "></i></span><?php echo __('Character cannot be a part from a guild at this moment in order to change name.'); ?></li>
								<?php } ?>
							</ul>
						</div>
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