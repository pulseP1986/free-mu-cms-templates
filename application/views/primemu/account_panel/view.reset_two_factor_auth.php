<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Two Factor Authentification'); ?></h1>
        </div>
		<?php if(isset($security_config['2fa']) && $security_config['2fa'] == 1){ ?>
		<div class="box-style1" style="margin-bottom: 20px;">
                <h2 class="title"><?php echo __('Reset two factor authentification'); ?></h2>

                <div class="entry">
                    <?php
                        if(isset($tfa_error)){
                            echo '<div class="e_note">' . $tfa_error . '</div>';
                        }
                        if(isset($tfa_success)){
                            echo '<div class="s_note">' . $tfa_success . '</div>';
                        }
                    ?>
					<?php
					if($is_auth_enabled != false){
					?>
					<div style="text-align:center;margin:0 auto;">
					<form method="post" action="" id="check_backup_code">
						<input type="text" class="form-control" name="code" placeholder="Enter Backup Code" />
						<button type="submit" name="check_backup_code" class="btn btn-primary">Submit</button>
					</form>	
					</div>
					<?php	
					}
					else{
					?>
					Two factor authentification not enabled
					<?php
					}
					?>
                </div>
            </div>
		<?php } ?>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	