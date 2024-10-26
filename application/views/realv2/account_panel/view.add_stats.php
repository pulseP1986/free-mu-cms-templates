<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Add Stats'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Add level up points. Str. Agi. Vit. etc'); ?></h2>
						<div class="mb-5">
							<?php
							if(isset($not_found)){
								echo '<div class="alert alert-danger" role="alert">' . $not_found . '</div>';
							} else{
								?>
								<script type="text/javascript">
									$(document).ready(function () {
										$.extend(DmNConfig, {max_stats: <?php echo $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|max_stats');?>});
										App.calculateStats();
									});
								</script>
							<?php
								if(isset($error)){
									echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
								}
								if(isset($success)){
									echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
								}
							?>
									<form method="POST" action="" id="add_stats" name="add_stats">
										<div class="form-group row justify-content-center align-items-center">
											<label class="col-sm-4 col-form-label"><?php echo __('Level Up Points');?></label>
											<div class="col-sm-8">
											  <input type="text" class="form-control bg-light-dark text-white" id="lvlup" name="lvlup" value="<?php echo $this->Mcharacter->char_info['LevelUpPoint']; ?>" disabled>
											</div>
										</div>	
										<div class="form-group row justify-content-center align-items-center">
											<label class="col-sm-4 col-form-label"><?php echo __('Strength');?>[<span class="stats_now" id="str"><?php echo $this->Mcharacter->char_info['Strength']; ?></span>]</label>
											<div class="col-sm-8">
											  <input type="text" class="form-control bg-light-dark text-white validate[custom[integer]] stats_calc" id="str_stat" name="str_stat" value="">
											</div>
										</div>	
										<div class="form-group row justify-content-center align-items-center">
											<label class="col-sm-4 col-form-label"><?php echo __('Agility'); ?> [<span class="stats_now" id="agi"><?php echo $this->Mcharacter->char_info['Dexterity']; ?></span>]</label>
											<div class="col-sm-8">
											  <input type="text" class="form-control bg-light-dark text-white validate[custom[integer]] stats_calc" id="agi_stat" name="agi_stat" value="">
											</div>
										</div>	
										<div class="form-group row justify-content-center align-items-center">
											<label class="col-sm-4 col-form-label"><?php echo __('Vitality'); ?> [<span class="stats_now" id="vit"><?php echo $this->Mcharacter->char_info['Vitality']; ?></span>]</label>
											<div class="col-sm-8">
											  <input type="text" class="form-control bg-light-dark text-white validate[custom[integer]] stats_calc" id="vit_stat" name="vit_stat" value="">
											</div>
										</div>		
										<div class="form-group row justify-content-center align-items-center">
											<label class="col-sm-4 col-form-label"><?php echo __('Energy'); ?> [<span class="stats_now" id="ene"><?php echo $this->Mcharacter->char_info['Energy']; ?></span>]</label>
											<div class="col-sm-8">
											  <input type="text" class="form-control bg-light-dark text-white validate[custom[integer]] stats_calc" id="ene_stat" name="ene_stat" value="">
											</div>
										</div>	
										<?php if(in_array($this->Mcharacter->char_info['Class'], [64, 65, 66, 70])){ ?>
										<div class="form-group row justify-content-center align-items-center">
											<label class="col-sm-4 col-form-label"><?php echo __('Command'); ?> [<span class="stats_now" id="com"><?php echo $this->Mcharacter->char_info['Leadership']; ?></span>]</label>
											<div class="col-sm-8">
											  <input type="text" class="form-control bg-light-dark text-white validate[custom[integer]] stats_calc" id="com_stat" name="com_stat" value="">
											</div>
										</div>	
										<?php } ?>
										<div class="text-center form-group">
											<button type="submit" id="add_points" name="add_points" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button>
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