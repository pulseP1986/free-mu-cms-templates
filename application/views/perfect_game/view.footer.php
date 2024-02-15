	</section>
	</div>
</main>
<footer>
	<div class="container flex-s-c">
		<div class="copy-n-info">
			<p class="copy">
				<?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?>
			</p>
			<p class="info">
				<?php echo __('MUONLINE ARE TRADEMARKS OR REGISTERED TRADEMARKS OF WEBZEN, INC. IN THE U.S. AND/OR OTHER COUNTRIES. THIS SITE IS IN NO WAY ASSOCIATED WITH WEBZEN.');?>
			</p>
			<div class="rules-links flex">
				<a href="#">Privacy Policy</a>
				<a href="#">Refund Policy</a>
				<a href="#">Terms of Service</a>
			</div>
		</div>
		<div class="footer-menu flex">
			<nav>
				<li><a href="<?php echo $this->config->base_url; ?>home" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo __('Files'); ?>"><?php echo __('Files'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a></li>
			</nav>
			<nav>
				<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>" title="<?php echo __('Forum'); ?>" target="_blank"><?php echo __('Forum'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>shop" title="<?php echo __('Shop'); ?>"><?php echo __('Shop'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>guides" title="<?php echo __('Guides'); ?>"><?php echo __('Guides'); ?></a></li>
			</nav>
		</div>
		<div class="site-links flex-s-c">
			<ul class="social-networks flex">
				<li class="ds"><a href="#"></a></li>
				<li class="fb"><a href="#"></a></li>
				<li class="yt"><a href="#"></a></li>
			</ul>
			<span class="separator"></span>
			<a href="#"><img src="images/mv.png" alt=""></a>
		</div>
	</div>
</footer>
<?php if (!$this->session->userdata(array('user' => 'logged_in'))): ?>
	<div id="login" class="modal-div flex-c-c"> 
		<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/regsiter-image.jpg" alt="">
		<div class="modalContent">
			<div class="modal_close"></div>
			<div class="modalTitle">
				<h2><?php echo __('Sign In');?></h2>
				<a href="<?php echo $this->config->base_url; ?>registration" class="button button-white button-small"><?php echo __('Registration'); ?></a>
			</div>
			<form id="login_form" method="POST" action="<?php echo $this->config->base_url; ?>" class="modal-form">
				<input type="text" name="username" id="login_input" class="form-input" placeholder="<?php echo __('Username');?>" required>
				<input type="password" name="password" id="password_input" class="form-input" placeholder="<?php echo __('Password');?>" required>
				<?php if($this->config->values('security_config', 'captcha_on_login') == 1){ ?>
				<div class="text-center mb-2"><img src="<?php echo $this->config->base_url; ?>ajax/captcha" alt="CAPTCHA" id="captcha_image" /></div>
				<input class="form-input" type="password" placeholder="<?php echo __('Captcha');?>" name="captcha" id="captcha_input">
				<?php } ?>
				<div class="enter-button flex-s-c">
					<input class="form-submit" type="submit" value="<?php echo __('Login');?>">
					<a href="<?php echo $this->config->base_url; ?>lost-password" style="color:#0fa8ab;text-decoration:none;"><span><?php echo __('Forget your password');?>?</span></a>
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