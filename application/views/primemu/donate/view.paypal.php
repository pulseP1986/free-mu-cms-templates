<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Donate'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('With PayPal'); ?></h2>

            <div class="entry">
                <?php
                    if(isset($error)){
                        echo '<div class="e_note">' . $error . '</div>';
                    } else{
                        if(!empty($paypal_packages)){
                            foreach($paypal_packages as $packages){
                               $price = $packages['price'];
								if(isset($donation_config['paypal_fee']) && $donation_config['paypal_fee'] != ''){
									$fee = ($donation_config['paypal_fee'] / 100) * $packages['price'];
									$price = $packages['price'] + $fee;
								}
								if(isset($donation_config['paypal_fixed_fee']) && $donation_config['paypal_fixed_fee'] != ''){
									$price += $donation_config['paypal_fixed_fee'];
								}
								echo '<div class="col-lg-4 col-md-6 col-sm-6" style="padding: 7px;">';
								echo '<div class="table-pack">';
								echo '<table><tr><td style="height: 170px!important;">';
								echo '<div class="title-wcoin flicker"><span>' . str_replace(',', '', number_format($packages['reward'] * 10, 0, '.', ',')) . ' WCoin</span></div>';

								echo '<title>' . $packages['package'] . '</title>';
								echo '<h3><span id="reward_' . $packages['id'] . '">' . $packages['reward'] . '</span> ';
								echo $this->website->translate_credits($donation_config['reward_type'], $this->session->userdata(['user' => 'server'])) . ' <span id="price_' . $packages['id'] . '" style="display: none;" data-price-tax="' . number_format($price, 2, '.', ',') . '">' . number_format($packages['price'], 2, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '" style="display: none;">' . $packages['currency'] . '</span></h3>';
								echo '<div class="bonus"><span id="price_' . $packages['id'] . '" data-price="' . number_format($packages['price'], 2, '.', ',') . '">' . number_format($packages['price'], 2, '.', ',') . '</span> <span id="currency_' . $packages['id'] . '">' . $packages['currency'] . '</span></div>';
								echo '<button class="button buttonsub" id="buy_paypal_' . $packages['id'] . '_' . $donation_config['sandbox'] . '" style="margin-top: 8px;" value="buy_paypal_' . $packages['id'] . '">' . __('Buy Now') . '</button>';
								echo '</td></tr></table>';
								echo '</div>';
								echo '</div>';
                            }
                        } else{
                            echo '<div class="i_note">' . __('No Paypal Packages Found.') . '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	