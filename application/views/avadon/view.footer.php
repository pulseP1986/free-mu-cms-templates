</main>
<footer class="footer">
	<div class="container">
	<div class="footerTop">
		<div class="footerTop-l">
			<div class="footerTop-title">
				<?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?>
			</div>
			<div class="copy">
				<?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a>
			</div>
		</div>
		<div class="footerTop-c">
			<div class="footerTop-c_block">
				<div class="footerTop-title">
					<?php echo __('Main'); ?>
				</div>
				<ul class="f-menu">
					<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About server'); ?></a></li>
				</ul>
			</div>
			<div class="footerTop-c_block">
				<div class="footerTop-title">
					<?php echo __('Community'); ?>
				</div>
				<ul class="f-menu">
					<li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration'); ?></a></li>
					<li><a href="#"><?php echo __('Forum'); ?></a></li>
					<li><a href="#">Facebook.com</a></li>
				</ul>
			</div>
			<div class="footerTop-c_block">
				<div class="footerTop-title">
					<?php echo __('Support'); ?>
				</div>
				<ul class="f-menu">
					<li><a href="<?php echo $this->config->base_url; ?>support"><?php echo __('Online Support'); ?></a></li>
					<li><a href="#"><?php echo __('Contact Us'); ?></a></li>
				</ul>
			</div>
		</div>
		<div class="footerTop-r">
			<div class="dn">
				<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/digital-nox.png" alt="Digital Nox">
			</div>
			<div class="dn-design">
				Design and stylized decor <br> site from <a href="https://templstock.com/en/seller/DigitalNox" target="_blank">DigitalNox</a>
			</div>
		</div>
		</div><!--footerTop-->
		<div class="footerBottom">
			<div class="footerBottom-l">
				<div class="socBlock">
					<span><?php echo __('Follow us'); ?>: </span>
					<a href="#" class="tw"></a>
					<a href="#" class="fb"></a>
					<a href="#" class="dc"></a>
				</div>
			</div>
			<div class="footerBottom-c">
				<div class="toTop-block">
					<div class="toTop">
						<span><?php echo __('Go to top'); ?></span>
					</div>
				</div>
			</div>
			<div class="footerBottom-r">
				<div class="voteBlock">
					<span><?php echo __('Language'); ?>:</span>
					<?php
						$languages = $this->website->lang_list();
						krsort($languages);
						$i = 0;
						foreach($languages as $iso => $native):
							$i++;
							$padding = ($i == 1) ? '' : 'style="padding-left:5px"';
							if($_COOKIE['dmn_language'] == $iso){
								echo '<a href="#" title="' . $native . '" ' . $padding . ' class="f16"><span class="active flag ' . strtolower($iso) . '"></span></a>' . "\n";
							} else{
								echo '<a href="#" id="lang_' . $iso . '" title="' . $native . '" ' . $padding . ' class="f16"><span class="nonactive flag ' . strtolower($iso) . '"></span></a>' . "\n";
							}
						endforeach;
					?>
				</div>
			</div>
		</div>
		
	

	</div>
</footer> 
<?php if (!$this->session->userdata(array('user' => 'logged_in'))){ ?>       
<div class="modal-overlay" data-modal-id="login">
	<div class="modal-table">
		<div class="modal-table-cell">
			<form class="modal" id="login_form" method="POST">
				<div class="modal__close"></div>
				<div class="modalTitle">
					<?php echo __('Sign In');?>
				</div>
				<?php
				$fb = $this->config->values('social_config', 'providers');
				if($fb['Facebook']['enabled'] == true){
				?>
				<div class="soc-buttons">
					<div class="soc-button">
						<?php echo preg_replace("/<img[^>]+\>/i", __('Connect with Facebook'), $this->website->fb_login('', 'fb-button bright')); ?>
					</div>
				</div>
				<?php } ?>
				<div class="formGroups">
					<div class="formGroup">
						<span><?php echo __('Username');?></span>
						<input class="input" type="text" name="username" id="login_input">
					</div>
					<div class="formGroup">
						<span><?php echo __('Password');?></span>
						<input class="input" type="password" name="password" id="password_input">
					</div>
					<?php if($this->config->values('security_config', 'captcha_on_login') == 1){ ?>
					<div class="text-center mb-2"><img src="<?php echo $this->config->base_url; ?>ajax/captcha" alt="CAPTCHA" id="captcha_image" /></div>
					<div class="formGroup">
						<span><?php echo __('Captcha');?></span>
						<input class="input" type="password" name="captcha" id="captcha_input">
					</div>
					<?php } ?>
				</div>
				<div class="formInfo">
					<div class="formInfo-left">
						<div class="forgot-password">
							<a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Forgot password');?>?</a>
						</div>
						<div class="sign-up">
							<a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Sign Up');?></a>
						</div>
					</div>
					<div class="formInfo-right">
						<div class="sign-button">
							<button class="button button-medium" type="sumbit"><?php echo __('Sign in Now');?></button>
						</div>
					</div>
				</div>
			</form>
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