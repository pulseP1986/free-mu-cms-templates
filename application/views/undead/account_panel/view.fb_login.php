<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Facebook Login'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Facebook Account Login'); ?></h2>
					<div class="mb-5">
						<?php if($this->website->is_multiple_accounts() == true){ ?>
						<form method="post" action="" id="fb_login_form">
							<div class="form-group">
								<label class="control-label"><?php echo __('Server'); ?></label>
								<div>
									<select name="server" id="server" class="form-control">
										<option value=""><?php echo __('Select Server'); ?></option>
										<?php foreach($this->website->server_list() as $key => $server){ ?>
												<option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center"><button type="submit" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
							</div>	
						</form>
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