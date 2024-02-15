<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Login'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('Account Login'); ?></h2>

            <div class="entry">
                <div style="text-align:center;margin:0 auto;">
										<div><?php echo $this->website->fb_login(); ?></div>
										<form id="login_form" method="post" action="<?php echo $this->config->base_url; ?>">
												<input type="text" name="username" id="login_input" maxlength="10" class="input-main"
															 style="width:182px;" placeholder="<?php echo __('Username'); ?>" value=""/>
												<input type="password" name="password" id="password_input" maxlength="20" class="input-main"
															 style="width:182px;" placeholder="<?php echo __('Password'); ?>" value=""/>
												<div style="margin-left:30%;text-align:center;">
														<input type="submit" id="submit" value="<?php echo __('Login'); ?>" class="button-style"
																	 style="border:none;cursor:pointer "/>
												</div>
										</form>
										<a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Lost Password'); ?>
												?</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a
														href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration'); ?></a><br/>
								</div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	