	<?php if(($this->request->get_controller() == 'home' && $this->request->get_method() != 'index') || $this->request->get_controller() != 'home') { ?>
		</div>
	<?php } ?>
	</main>
	<footer class="footer">	
		<div class="toTop-fon">
			<div class="toTop" id="toTop"></div>
		</div>
		<div class="footer-block-t flex-s-c">
			<ul class="f-menu">
				<li <?php if($this->request->get_controller() == 'home') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>home" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a></li>
				<li <?php if($this->request->get_controller() == 'registration') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a></li>
				<li <?php if($this->request->get_controller() == 'downloads') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo __('Files'); ?>"><?php echo __('Files'); ?></a></li>
				<li <?php if($this->request->get_controller() == 'rankings') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a></li>
				<li <?php if($this->request->get_controller() == 'shop') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>shop" title="<?php echo __('Shop'); ?>"><?php echo __('Shop'); ?></a></li>
				<li <?php if($this->request->get_controller() == 'vote-reward') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a></li>
				<li <?php if($this->request->get_controller() == 'guides') { echo 'class="active"'; } ?>><a href="<?php echo $this->config->base_url; ?>guides" title="<?php echo __('Guides'); ?>"><?php echo __('Guides'); ?></a></li>
			</ul>
			<div class="lang-block d-none d-sm-none d-md-none d-lg-block d-xml-block">
				<a href="javascript:void(0);" class="main-item"> <?php echo __('Language');?> <img class="img-lang" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/united-states.png" alt=""></a>
				<ul class="hidden-block">
					<?php
						$languages = $this->website->lang_list();
						krsort($languages);
						foreach($languages as $iso => $native){
							if(htmlspecialchars($_COOKIE['dmn_language']) != $iso){
								echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16 main-item"><span class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . '</a></li>' . "\n";
							}
						}
					?>
				</ul>
			</div><!-- lang-block -->
		</div><!-- footer-block-t -->
		<div class="footer-end flex-s-c">
			<div class="footer-block-coperite">
				<span class="copyright"><?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?></span><br><br>
				<span><?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a></span>
			</div>
			<div class="footer-logo"><a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-footer.png" alt=""></a></div>
			<div class="footer-block-r">
				<div class="soc-block">
					<a href="" class="facebook"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/soc-icons_f.png" alt=""></a>
					<a href="" class="twitter"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/soc-icons_t.png" alt=""></a>
					<a href="" class="youtube"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/soc-icons_y.png" alt=""></a>
				</div>
				<div class="templstock"><a href="https://templstock.com/" title="Game Site Templates - High quality PSD Templates, WordPress themes, HTML templates and Free game templates." class="templstock a"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/templ-logo.png" alt=""></a>
				</div>
			</div>			
		</div>
	</footer>
</div><!-- .wrapper -->	
<?php if (!$this->session->userdata(array('user' => 'logged_in'))): ?>
	<div class="modal_window" id="signin_modal">
		<a href="#" id="close_modal" class="close_mw"></a>
		<h3><?php echo __('Sign In');?></h3>
		<div class="modal_form">
			<form id="login_form" method="POST" action="<?php echo $this->config->base_url; ?>">
				<div class="formGroup">
					<span  class="formGroup-name"><?php echo __('Username');?></span>
					<input type="text" name="username" id="login_input">
				</div>
				<div class="formGroup">
					<span class="formGroup-name"><?php echo __('Password');?></span>
					<input type="password" name="password" id="password_input">
				</div>
				<?php if($this->config->values('security_config', 'captcha_on_login') == 1){ ?>
				<div class="text-center mb-2"><img src="<?php echo $this->config->base_url; ?>ajax/captcha" alt="CAPTCHA" id="captcha_image" /></div>
				<div class="formGroup">
					<input class="input" type="text" name="captcha" id="captcha_input">
				</div>
				<?php } ?>
				<div class="formGroup-button text-center">
					<button type="submit"><?php echo __('Login');?></button>
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/swiper.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/modalx.js"></script>
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