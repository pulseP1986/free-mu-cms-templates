	</div>
	<footer class="footer">
		<div class="footerInfo">
			<div class="footerInfo-title">
				<?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?>
			</div>
			<div class="footerInfo-text">
				<?php echo __('MUONLINE ARE TRADEMARKS OR REGISTERED TRADEMARKS OF WEBZEN, INC. IN THE U.S. AND/OR OTHER COUNTRIES. THIS SITE IS IN NO WAY ASSOCIATED WITH WEBZEN.');?>
			</div>
			<div class="footerInfo-buttons">
				<a href="">Privacy Policy</a>
				<a href="">Refund Policy</a>
				<a href="">Terms of Service</a>
			</div>
		</div><!--footerInfo-->
		<div class="footerMenu flex">
			<ul>
				<li>
					<a href="<?php echo $this->config->base_url; ?>home" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a>
				</li>
				<li>
					<a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a>
				</li>
				<li><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo __('Files'); ?>"><?php echo __('Files'); ?></a>
				</li>
				<li><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a>
				</li>
			</ul>
			<ul>
				<li>
					<a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" title="<?php echo __('Forum'); ?>" target="_blank"><?php echo __('Forum'); ?></a>
				</li>
				<li>
				<a href="<?php echo $this->config->base_url; ?>shop" title="<?php echo __('Shop'); ?>"><?php echo __('Shop'); ?></a>
				</li>
				<li>
					<a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a>
				</li>
				<li>
					<a href="<?php echo $this->config->base_url; ?>guides" title="<?php echo __('Guides'); ?>"><?php echo __('Guides'); ?></a>
				</li>
			</ul>
		</div>
		<div class="footerRight">
			<div class="socBlock">
				<a href="#" class="dc"></a>
				<a href="#" class="fb"></a>
				<a href="#" class="yt"></a>
			</div>
			<div class="dis-logo">
				<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/mex-vision.png" alt="">
			</div>
		</div>
	</footer>
</div><!--wrapper-->
<?php	if (!$this->session->userdata(array('user' => 'logged_in'))): ?>
	<div id="enter" class="modal_div"> 
		<span class="modal_close"></span>
		<div class="modalContent">
			<div class="modal-title flex-s-c">
				<span><?php echo __('Sign In');?></span>
				<a href="<?php echo $this->config->base_url; ?>registration" class="button button-white button-small"><?php echo __('Registration'); ?></a>
			</div>
			<form id="login_form" method="POST" action="<?php echo $this->config->base_url; ?>">
				<div class="formGroup">
					<p><?php echo __('Username');?></p>
					<input type="text" name="username" id="login_input" placeholder="username" required>
				</div>
				<div class="formGroup">
					<p><?php echo __('Password');?></p>
					<input type="password" name="password" id="password_input" placeholder="password" required>
				</div>
				<?php if($this->config->values('security_config', 'captcha_on_login') == 1){ ?>
				<div class="text-center mb-2"><img src="<?php echo $this->config->base_url; ?>ajax/captcha" alt="CAPTCHA" id="captcha_image" /></div>
				<div class="formGroup formGroup-input">
					<input class="input" type="password" placeholder="<?php echo __('Captcha');?>" name="captcha" id="captcha_input">
				</div>
				<?php } ?>
				<div class="formButtons text-center">
					<button name="sumbit" type="sumbit"><?php echo __('Login');?></button>
					<a class="d-block mt-4" href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Forget your password');?>?</a>
				</div>
			</form>
		</div><!--modalContent-->
	</div>
<?php endif; ?>
<div id="overlay"></div>
<div id="select_server">
	<div class="modal-header">
		<h2><?php echo __('Select Server'); ?></h2>
		<a class="close" href="javascript:;"></a>
	</div>
	<div style="margin: 20px;">
		<?php
			if(!$servers = $this->website->server_select_box('id="switch_server"', 'class="form-control"', false)){
				echo '<b style="color: red;">' . __('Currently this is only one server.') . '</b>';
			} else{
				echo $servers;
			}
		?>

	</div>
</div>
<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif" alt=""/> <?php echo __('Loading...'); ?></div>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/global.js?v=1"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url;?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template');?>',
        currenttime: '<?php echo date('M d, Y H:i:s', time());?>',
        ajax_page_load: <?php echo $this->config->config_entry('main|use_ajax_page_load');?>,
		timers: <?php echo json_encode($this->website->load_event_timers());?>
    };

    $(document).ready(
        App.initialize,
        <?php if($this->session->userdata(['user' => 'logged_in'])): ?>
        App.checkSupportTickets(),
        <?php endif;?>
        App.locale = <?php echo $this->translations;?>
        <?php if(strtotime($this->config->config_entry("main|grand_open_timer")) >= time()): ?>
        , App.count_down('<?php echo $this->config->config_entry("main|grand_open_timer");?>')
        <?php endif; ?>
        , App.initLocalization()
    );
</script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<?php if($this->request->get_method() == 'fortumo'){ ?>
<script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
<?php } ?>
</body>
</html>