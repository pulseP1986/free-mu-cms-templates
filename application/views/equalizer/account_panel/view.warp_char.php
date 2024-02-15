<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Warp Character'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Teleport your character to another location'); ?></h2>
					<div class="mb-5">
						<?php
						 if(isset($disabled)){
							echo '<div class="alert alert-danger" role="alert">' . __('This module has been disabled.') . '</div>';
						} 
						else{
							if(isset($error)){
								echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
							}
							if(isset($success)){
								echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
							}
							if(isset($char_list) && $char_list != false){
						?>
							<form method="POST" action="" id="zen_wallet_form">
								<div class="form-group">
									<label class="control-label"><?php echo __('Character'); ?></label>
									<div>
										<select name="character" class="form-control">
											<?php foreach($char_list as $char){ ?>
												<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label"><?php echo __('Location'); ?></label>
									<div>
										<select name="world" class="form-control">
											<option value="0">Lorencia</option>
											<option value="1">Dungeon</option>
											<option value="2">Devias</option>
											<option value="3">Noria</option>
											<option value="4">Losttower</option>
											<option value="6">Arena</option>
											<option value="7">Atlans</option>
											<option value="8">Tarkan</option>
											<option value="10">Icarus</option>
											<option value="30">Valley Of Loren</option>
											<option value="33">Aida</option>
											<option value="34">CryWolf</option>
										</select>
									</div>
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Warp'); ?></button></div>
								</div>								
							</form>
							<?php } ?>
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