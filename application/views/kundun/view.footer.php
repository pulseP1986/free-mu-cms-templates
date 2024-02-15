</main>
<footer class="footer">
	<div class="topTopBlock">
		<span class="toTop"></span>
	</div><!--topTopBlock-->
	<div class="footerBlock flex-c">
		<div class="footerBlock-left">
			<div class="footerBlock-info">
				<ul>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy Policy</a></li>
				</ul>
				<span class="copy"><?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?><br />
				<?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a>
				</span>
			</div>
		</div>
		<div class="footerBlock-center">
			<div class="footerBlock-logo">
				<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png" alt="Logo"></a>
			</div>
		</div>
		<div class="footerBlock-right">
			<div class="socBlock">
				<a href="#" class="tg bright"></a>
				<a href="#" class="dc bright"></a>
			</div>
		</div>
	</div>
</footer> 
<?php if (!$this->session->userdata(array('user' => 'logged_in'))){ ?>       
<div class="modal-overlay" data-modal-id="login">
	<div class="modal-table">
		<div class="modal-table-cell">
			<div class="modal">
				<div class="modal__close"></div>
				<div class="modalTitle"><span><?php echo __('LOGIN');?></span></div>
				<div class="block">
					<span class="corner corner-left-top"></span>
					<span class="corner corner-right-top"></span>
					<span class="corner corner-right-bottom"></span>
					<span class="corner corner-left-bottom"></span>
					<div class="modalContent">
						<form id="login_form" method="POST">
							<div class="formGroup formGroup-input">
								<input class="input" type="text" placeholder="<?php echo __('Username');?>" name="username" id="login_input">
							</div>
							<div class="formGroup formGroup-input">
								<input class="input" type="password" placeholder="<?php echo __('Password');?>" name="password" id="password_input">
							</div>
							<?php if($this->config->values('security_config', 'captcha_on_login') == 1){ ?>
							<div class="text-center mb-2"><img src="<?php echo $this->config->base_url; ?>ajax/captcha" alt="CAPTCHA" id="captcha_image" /></div>
							<div class="formGroup formGroup-input">
								<input class="input" type="text" placeholder="<?php echo __('Captcha');?>" name="captcha" id="captcha_input">
							</div>
							<?php } ?>
							<div class="modal-button">
								<button type="sumbit"><?php echo __('Sign In');?></button>
							</div>
						</form>
						<div class="rules">
							<a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Register Now!');?></a> | 
							<a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Forgot your password?');?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<div id="overlay"></div>
<div id="select_server">
	<div class="modal-header">
		<h2><?php echo __('Select Server'); ?></h2>
		<a class="close" href="javascript:;"></a>
	</div>
	<div style="margin: 20px;">
		<?php
		if(!$servers = $this->website->server_select_box('id="switch_server"', 'class="form-control"', false)){
			echo '<div class="alert alert-primary" role="alert">'. __('Currently this is only one server.').'</div>';
		} 
		else{
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/slick.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/lightzoom.js"></script>
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
</body>
</html>