<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Account Settings'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('Change Password'); ?></h2>

            <div class="entry">
                <div class="form">
                    <form method="post" action="<?php echo $this->config->base_url; ?>settings"
                          id="password_change_form">
                        <table>
                            <tr>
                                <td style="width:150px;"><?php echo __('Old Password'); ?>:</td>
                                <td>
                                    <input class="validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]"
                                           type="password" name="old_password" id="old_password" value=""/></td>
                            </tr>
                            <tr>
                                <td><?php echo __('New Password'); ?>:</td>
                                <td>
                                    <input class="validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]"
                                           type="password" name="new_password" id="new_password" value=""/></td>
                            </tr>
                            <tr>
                                <td><?php echo __('Repeat New Password'); ?>:</td>
                                <td>
                                    <input class="validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>],equals[new_password]]"
                                           type="password" name="new_password2" id="new_password2" value=""/></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" class="button-style"><?php echo __('Submit'); ?></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <?php if($this->config->config_entry('account|allow_mail_change') == 1){ ?>
            <div class="box-style1" style="margin-bottom: 20px;">
                <h2 class="title"><?php echo __('Change Email'); ?></h2>

                <div class="entry">
                    <div class="form">
                        <form method="post" action="<?php echo $this->config->base_url; ?>settings"
                              id="email_change_form">
                            <table>
                                <tr>
                                    <td style="width:150px;"><?php echo __('Current Email'); ?>
                                        :
                                    </td>
                                    <td><input class="validate[required,custom[email],maxSize[50]]" type="email"
                                               name="email" id="email" value=""/></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit"
                                                class="button-style"><?php echo __('Submit'); ?></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if($this->config->config_entry('account|allow_recover_masterkey') == 1){ ?>
            <div class="box-style1" style="margin-bottom: 20px;">
                <h2 class="title"><?php echo __('Recover Master Key'); ?></h2>

                <div class="entry">
                    <?php
                        if(isset($error)){
                            echo '<div class="e_note">' . $error . '</div>';
                        }
                        if(isset($success)){
                            echo '<div class="s_note">' . $success . '</div>';
                        }
                    ?>
                    <div class="form">
                        <form method="post" action="<?php echo $this->config->base_url; ?>settings"
                              id="recover_master_key">
                            <table>
                                <tr>
                                    <td style="width:150px;"></td>
                                    <td><?php echo __('Recover your master key if you have forgotten it.'); ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button type="submit" class="button-style"
                                                name="recover_master_key"><?php echo __('Submit'); ?></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php if(isset($security_config['2fa']) && $security_config['2fa'] == 1){ ?>
		<div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('Two Factor Authentification'); ?></h2>

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
                <form method="post" action="" id="disable_2fa">
                    <p>Two factor authentication is enabled for your account.</p>
                    <input type="text" class="form-control" name="code" placeholder="6-digit authentication code" />
                    <button type="submit" name="disable_2fa" class="btn btn-primary">Disable</button>
                </form>	
                <?php	
                }
                else{
                ?>
                <p>To enable two factor authentication, follow the following steps carefully to make sure you're not locked out of your account.</p>
                <h3>Install app</h3>
                <p>Install one of the free available time based two factor authentication apps. We can recommend <em>Authy</em> or <em>Google Authenticator</em> for both Android and iOS.</p>
                <h3>Step 2 - Back-up code</h3>
                <p>Write down the back-up code below in a secure location. This back-up code is needed, in case you can't access your phone. For security reasons, the back-up code is only provided during the initial setup.</p>
                <p><big><strong><?php echo $backup_code;?></strong></big></p>
                <h3>Step 3 - Scan the QR code</h3>
                <p>Scan the QR code with your phone, using the installed authentication app. After this process two factor authentication will be enabled for your account. Every 30 seconds a new 6-digit code is generated in the authentication app. Use this code during log-in.</p>
                <p><img src="<?php echo $qr_image;?>" /></p>
                <h3>Enable two factor authentication</h3>
                <p>After scanning the QR code, the authenticator app will generate a new code every 30 seconds. Because the generated codes are very time sensitive, enter the current 6-digit code below and click on the enable button. This will ensure that everything is working as expected before enabling two factor authentication for your account.</p>
                <form method="post" action="" id="enable_2fa">
                    <input type="text" class="form-control" name="code" placeholder="6-digit authentication code" />
                    <button type="submit" name="enable_2fa" class="btn btn-primary">Enable</button>
                </form>
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
	