<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
    $wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(['user' => 'server']));
    $goblin = $this->website->get_account_goblinpoint_balance($this->session->userdata(['user' => 'server']));
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Account Panel'); ?></h1>
        </div>
        <div id="content_center">
            <div class="acc" style="border-bottom: 0px; padding-bottom: 0px;">
<div class="acc-title"><h2>View account and character options</h2></div>
<div class="accBlock flex-s">
<div class="accBlock-content">
<div class="formGroup">
<span>
<img src="<?php echo $this->config->base_url; ?>assets/primemu/images/wc-icon.png">
WCoins </span>
<div class="fieldGroup-input">
<?php echo $wcoin;?> <a href="<?php echo $this->config->base_url; ?>donate"><font style="float:right; color: #ebb643; border: 1px solid #ebb643; padding: 4px 10px; font-size: 9px; text-transform: uppercase; font-weight: bold; box-shadow: 0px 0px 5px #ebb643;">Buy Wcoins</font></a>
</div>
</div>
<div class="formGroup">
<span>
<img src="<?php echo $this->config->base_url; ?>assets/primemu/images/user.png">
Account </span>
<div class="fieldGroup-input">
<?php echo $this->session->userdata(['user' => 'username']); ?> </div>
</div>
<div class="formGroup">
<span>
<img src="<?php echo $this->config->base_url; ?>assets/primemu/images/award_star_bronze_1.png">
Rank </span>
<div class="fieldGroup-input" style="min-height: 49px;">
<font style="color: red; float: left;">Free</font> <a href="<?php echo $this->config->base_url; ?>vip"><font style="float:right; color: #999; border: 1px solid #999; padding: 4px 10px; font-size: 9px; text-transform: uppercase; font-weight: bold;">Benefits Vips</font></a> </div>
</div>
</div>
<div class="accBlock-content">
<div class="formGroup">
<span>
<img src="<?php echo $this->config->base_url; ?>assets/primemu/images/gp-icon.png">
Goblin Points </span>
<div class="fieldGroup-input">
<?php echo $goblin;?> </div>
</div>
<div class="formGroup">
<span>
<img src="<?php echo $this->config->base_url; ?>assets/primemu/images/email.png">
Email </span>
<div class="fieldGroup-input">
<?php echo $this->session->userdata(['user' => 'email']); ?> </div>
</div>
<div class="formGroup">
<span>
<img src="<?php echo $this->config->base_url; ?>assets/primemu/images/shield.png">
Discord Sync </span>
<div class="fieldGroup-input">
Not linked<a href="#discord" class="open_modal"><font style="float:right; color: #ebb643; border: 1px solid #ebb643; padding: 4px 10px; font-size: 9px; text-transform: uppercase; font-weight: bold; box-shadow: 0px 0px 5px #ebb643;">Sync Discord</font></a> </div>
</div>
</div>
</div>
<div class="space-40"></div>
<div class="acc" style="border-bottom: 0px; padding-bottom: 0px;">
<div class="acc-title"><h2>General Options</h2></div>
<div class="space-20"></div>
<div class="accBlock flex-s">
<div class="accBlock-content">
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>account-panel">
<button onclick="openLayer()" class="mid-button-blue">
ACCOUNT PANEL <br>
<small class="color-gray"><i>GENERAL OPTIONS</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>battle-pass">
<button class="mid-button-blue">
Battle Pass <br>
<small class="color-gray"><i>Redeem amazing rewards</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>character-market">
<button class="mid-button-blue">
Character Market <br>
<small class="color-gray"><i>Sell &amp; Buy Characters</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>account-logs">
<button class="mid-button-blue">
Account Logs <br>
<small class="color-gray"><i>Account Activity Records</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>account-panel/coupons">
<button class="mid-button-blue">
Coupons <br>
<small class="color-gray"><i>Redeem Coupon</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>account-panel/logs-coupons-donates">
<button class="mid-button-blue">
Tickets <br>
<small class="color-gray"><i>Tickets for Sweepstakes</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>account-panel/guild-recruit">
<button class="mid-button-blue">
Guild Recruit <br>
<small class="color-gray"><i>Recruitment Information</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>account-panel/items-view">
<button class="mid-button-blue">
Itens View <br>
<small class="color-gray"><i>View all account items</i></small>
</button>
</a>
</div>
</div>
<div class="accBlock-content">
<div class="change-button m-top-less-50">
<a href="#discord" class="open_modal">
<button class="mid-button-blue">
DISCORD SYNC <br>
<small class="color-gray"><i>LINK YOUR ACCOUNT</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>donate">
<button class="mid-button-blue">
WCOINS <br>
<small class="color-gray"><i>Donate and receive Wcoins</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>donate?pass=show">
<button class="mid-button-blue">
Battle Pass <br>
<small class="color-gray"><i>More benefits on Battle Pass</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>shop/change-name">
<button class="mid-button-blue">
Change Name <br>
<small class="color-gray"><i>Change character name</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>reset-stats">
<button class="mid-button-blue">
Reset Stats <br>
<small class="color-gray"><i>Reassign your stats</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>add-stats">
<button class="mid-button-blue">
Distribute Points <br>
<small class="color-gray"><i>Distribute your points</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>settings">
<button class="mid-button-blue">
Change Password <br>
<small class="color-gray"><i>Change Password</i></small>
</button>
</a>
</div>
<div class="change-button m-top-less-50">
<a href="<?php echo $this->config->base_url; ?>account-panel/switch-tag">
<button class="mid-button-blue">
Switch Tag <br>
<small class="color-gray"><i>VIP tag display</i></small>
</button>
</a>
</div>
</div>
</div>
</div> </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	