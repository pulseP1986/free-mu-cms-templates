<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
    <div  class="mainRegister">
        <div class="regBlock blockR">
            <span class="modalTitle"><?php echo __('Registration'); ?></span>
                        <div class="fields">
                            <form method="post" action="<?php echo $this->config->base_url; ?>registration" id="registration_form">
                                <?php if($this->website->is_multiple_accounts() == true): ?>
                                    <div class="fieldGroup">
                                    <span><?php echo __('Server'); ?></span>
                                    <select name="server" id="server" class="validate[required] register">
                                    <option value=""><?php echo __('Select Server'); ?></option>
                                    <?php
                                        foreach($this->website->server_list() as $key => $server):
                                            ?>
                                            <option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
                                        <?php
                                        endforeach;
                                    ?>
                                    </select>
                                    </div>
                                <?php endif; ?>
                                <div class="fieldGroup m-top-less-30">
                                <span><?php echo __('Username'); ?></span>
                                <input class="validate[required,minSize[<?php echo $config['min_username']; ?>],maxSize[<?php echo $config['max_username']; ?>]]"
                                               type="text" name="user" id="user" value=""/></div>
                                

                                <?php if($config['req_email'] == 1): ?>
                                    <div class="fieldGroup m-top-less-30">
                                    <span><?php echo __('Email'); ?></span>
                                    <input class="validate[required,custom[email],maxSize[50]]" type="text"
                                                   name="email" id="email"
                                                   value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>"/>
                                    </div>
                                <?php endif; ?>
                                <?php if($config['req_secret'] == 1): ?>
                                    <div class="fieldGroup m-top-less-30">
                                    <span>Secret Questions</span>
                                    <select name="fpas_ques" id="fpas_ques" class="validate[required] register">
                                    <?php
                                        foreach($this->website->secret_questions() as $key => $value):
                                            ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                        <?php
                                        endforeach;
                                    ?>
                                    </select>
                                    </div>
                                    <div class="fieldGroup m-top-less-30">
                                    <span><?php echo __('Secret Answer'); ?></span>
                                    <input class="validate[required,minSize[4],maxSize[50]]" type="text"
                                                   name="fpas_answ" id="fpas_answ" value=""/></div>
                                <?php endif; ?>
                                <?php if($config['email_validation'] == 0 || $config['generate_password'] == 0): ?>
                                    <div class="fieldGroup m-top-less-30">
                                    <span><?php echo __('Password'); ?></span>
                                    <input class="validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>]]"
                                                   type="password" name="pass" id="pass" value=""/></div>
                                    <div class="fieldGroup m-top-less-30">
                                    <span><?php echo __('Repeat Password'); ?></span>
                                    <input class="validate[required,minSize[<?php echo $config['min_password']; ?>],maxSize[<?php echo $config['max_password']; ?>],equals[pass]]"
                                                   type="password" name="rpass" id="rpass" value=""/></div>               

                                <?php endif; ?>
                                <?php if(isset($show_ref) && $show_ref == true): ?>
                                    <tr>
                                        <td><?php echo __('Referrer'); ?>:</td>
                                        <td>
                                            <input type="text" name="referrer" id="referrer"
                                                   value="<?php echo $ref; ?>" readonly/>
                                            <input type="hidden" name="ref_server" id="ref_server"
                                                   value="<?php echo $server; ?>" readonly/>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <div class="select-acc m-top-less-30">
                                <div class="select-acc_title">
                                 <?php echo __('I have read and agree to the <a href="" id="rules_dialog"><b>game rules.</b></a>'); ?></div>
                                <div class="select-acc_check">
                                <label class="check-container">
                                <input class="validate[required] register" type="checkbox" name="rules" id="rules"/>
                                <span class="checkmark"></span>
                                </label>
                                </div>
                                </div>
                                <?php if(isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1): ?>
                                    <tr>
                                        <td><?php echo __('Security'); ?>:</td>
                                        <td>
                                            <div class="QapTcha"></div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if(isset($security_config['captcha_type']) && $security_config['captcha_type'] == 3): ?>
                                    <br />
                                    <script src="https://www.google.com/recaptcha/api.js"></script>
                                    <center>
                                    <div class="fieldGroup">
                                     <div class="g-recaptcha"
                                                 data-sitekey="<?php echo $security_config['recaptcha_pub_key']; ?>"></div></div>
                                    </center>
                                <?php endif; ?>
                                <center>
                                <button type="submit" class="big-button-blue"><?php echo __('Sign Up Now'); ?></button>
                                </center>
                            </form>
                        </div>
                <script type="text/javascript">
                    $(document).ready(function () {
                        <?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 1): ?>
                        App.buildCaptcha('.QapTcha');
                        <?php endif; ?>
                        <?php if (isset($security_config['captcha_type']) && $security_config['captcha_type'] == 3): ?>
                        $.extend(DmNConfig, {use_recaptcha_v2: 1});
                        <?php endif; ?>
                        $("#registration_form").validationEngine('attach', {
                            scroll: false,
                            onValidationComplete: function (form, status) {
                                if (status == true) {
                                    App.registerAccount(form);
                                }
                            }
                        });
                        $("#rules_dialog").on('click', function (e) {
                            e.preventDefault();
                            App.initializeRulesDialog('<?php echo __('Server Rules'); ?>');
                        });
                    });
                </script>
        </div>
    </div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>