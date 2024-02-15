<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Change Name'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('Change character name.'); ?>
						<div class="float-right"><a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>shop/change-name-history"><?php echo __('Change Name History'); ?></a></div>
					</h2>
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
							<label class="col-sm-2 col-form-label"><?php echo __('Name');?></label>
							<div class="col-sm-8">
							  <input type="text" class="form-control" name="charname" id="charname-<?php echo bin2hex($char['name']); ?>" value="<?php echo $char['name']; ?>" tabindex="<?php echo $i; ?>">
							</div>
							<div class="col-auto">
							  <button type="submit" class="btn btn-primary" id="changename-<?php echo bin2hex($char['name']); ?>"><?php echo __('Submit');?></button>
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
						<ul class="list-group mb-4 additional-links">
							<li class="list-group-item-action"><?php echo __('Character Name Change Cost') . ' ' . vsprintf(__('<span style="color:red;">%d</span> %s'), [$price, $this->website->translate_credits($this->config->config_entry('changename|price_type'), $this->session->userdata(['user' => 'server']))]); ?></li>
							<li class="list-group-item-action"><?php echo sprintf(__('Character Name can be 4-%d chars long!'), $this->config->config_entry('changename|max_length')); ?></li>
							<li class="list-group-item-action"><?php echo sprintf(__('Character Name can contain the following chars: %s'), stripslashes($this->config->config_entry('changename|allowed_pattern'))); ?></li>
							<?php if($this->config->config_entry('changename|check_guild') == 1){ ?>
								<li class="list-group-item-action"><?php echo __('Character cannot be a part from a guild at this moment in order to change name.'); ?></li>
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
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>