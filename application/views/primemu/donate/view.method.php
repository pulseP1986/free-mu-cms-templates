<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Donate'); ?></h1>
        </div>
            <div class="row" style="text-align:center;">
                <h1>Choose Donation Method</h1>
                <?php
                    if($donation_config != false){
                        echo '<div style="margin: 5px auto; text-align:center;display:flex;flex-wrap: wrap;align-items: center;justify-content: center;gap: 5px;">';
                        if(isset($donation_config['paypal']) && $donation_config['paypal']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paypal" class="mid-button-blue" style="line-height:50px;">' . __('PayPal') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['paymentwall']) && $donation_config['paymentwall']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paymentwall" class="mid-button-blue" style="line-height:50px;">' . __('PaymentWall') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['fortumo']) && $donation_config['fortumo']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/fortumo" class="mid-button-blue" style="line-height:50px;">' . __('Fortumo') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['paygol']) && $donation_config['paygol']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paygol" class="mid-button-blue" style="line-height:50px;">' . __('PayGol') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['2checkout']) && $donation_config['2checkout']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/two-checkout" class="mid-button-blue" style="line-height:50px;">' . __('2CheckOut') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['pagseguro']) && $donation_config['pagseguro']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/pagseguro" class="mid-button-blue" style="line-height:50px;">' . __('PagSeguro') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['superrewards']) && $donation_config['superrewards']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/superrewards" class="mid-button-blue" style="line-height:50px;">' . __('SuperRewars') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['paycall']) && $donation_config['paycall']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/paycall" class="mid-button-blue" style="line-height:50px;">' . __('Paycall') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['interkassa']) && $donation_config['interkassa']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/interkassa" class="mid-button-blue" style="line-height:50px;">' . __('Interkassa') . '</a>&nbsp;';
                        }
                        if(isset($donation_config['cuenta_digital']) && $donation_config['cuenta_digital']['active'] == 1){
                            echo '<a href="' . $this->config->base_url . 'donate/cuenta-digital" class="mid-button-blue" style="line-height:50px;">' . __('Cuenta Digital') . '</a>&nbsp;';
                        }
                        $plugins = $this->config->plugins();
                        $is_any = false;
                        if(!empty($plugins)):
                            foreach($plugins AS $plugin):
                                if($plugin['installed'] == 1 && $plugin['donation_panel_item'] == 1):
                                    $is_any = true;
                                    echo '<a href="' . $plugin['module_url'] . '" class="mid-button-blue" style="line-height:50px;">' . $plugin['about']['name'] . '</a>&nbsp;';
                                endif;
                            endforeach;
                        endif;
                        if((!isset($donation_config['paypal']) || $donation_config['paypal']['active'] == 0) && (!isset($donation_config['paymentwall']) || $donation_config['paymentwall']['active'] == 0) && (!isset($donation_config['fortumo']) || $donation_config['fortumo']['active'] == 0) && (!isset($donation_config['paygol']) || $donation_config['paygol']['active'] == 0) && (!isset($donation_config['2checkout']) || $donation_config['2checkout']['active'] == 0) && (!isset($donation_config['pagseguro']) || $donation_config['pagseguro']['active'] == 0) && (!isset($donation_config['paycall']) || $donation_config['paycall']['active'] == 0) && (!isset($donation_config['interkassa']) || $donation_config['interkassa']['active'] == 0) && (!isset($donation_config['cuenta_digital']) || $donation_config['cuenta_digital']['active'] == 0) && (!isset($donation_config['superrewards']) || $donation_config['superrewards']['active'] == 0) && ($is_any == false)){
                            echo '<div class="e_note">' . __('No Donation Methods Found.') . '</div>';
                        }
                        echo '</div>';
                    } else{
                        echo '<div class="e_note">' . __('Donation modules not configured for this server.') . '</div>';
                    }
                ?>
            </div>

    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	