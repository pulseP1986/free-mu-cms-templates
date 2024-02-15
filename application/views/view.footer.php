	<?php if(($this->request->get_controller() == 'home' && $this->request->get_method() != 'index') || $this->request->get_controller() != 'home') { ?>
		</div>
	<?php } ?>
	<div class="line"></div>
	<div class="to-the-top">
		<div class="button-to-the-top"></div>
	</div>
	</main>
	<footer class="footer">	
		 <div class="footer-block-t">
			<ul class="f-menu">
				<li class="active"><a href="<?php echo $this->config->base_url; ?>home" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo __('Files'); ?>"><?php echo __('Files'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>shop" title="<?php echo __('Shop'); ?>"><?php echo __('Shop'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>vote-reward" title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>guides" title="<?php echo __('Guides'); ?>"><?php echo __('Guides'); ?></a></li>
			</ul>
		</div>
		<div class="bottom-footer flex-s-c">
			<div class="info-copyright">
				<p><?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?></p>
				<p class="info"><?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a></p>
			</div>
			<a class="f-logo" href="<?php echo $this->config->base_url; ?>">
				<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-footer.png" alt="">
			</a>
			<div class="lang-block">
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
			</div>
			<div>
				<ul class="social-networks flex-s-c">
					<li class="facebook"><a href="#"></a></li>
					<li class="twitter"><a href="#"></a></li>
					<li class="twitch"><a href="#"></a></li>
					<li class="youtube"><a href="#"></a></li>
				</ul>
				<a href="https://templstock.com" class="designed"></a>
			</div>
		</div>
	</footer>
</div><!-- .wrapper -->	
<?php if (!$this->session->userdata(array('user' => 'logged_in'))): ?>
	<div class="modal_window icon-modal-login" id="signin_modal">
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/swiper.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/circle-js.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/slick.min.js"></script>
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
	
	var swiper = new Swiper('.swiper-news', {
		autoplay: {
			delay: 4000,
		},
		speed: 1000,
		pagination: {
			el: '.swiper-pagination',
			type: 'fraction',
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	});

	$('.center').slick({
	  centerMode: true,
	  centerPadding: '50px 30px',
	  slidesToShow: 3,
	  slidesToScroll: 3,
		responsive: [
			{
				breakpoint: 750,
				settings: {
					slidesToShow: 2,
					centerMode: false
				}
			},
			{
				breakpoint: 550,
				settings: {
					slidesToShow: 1,
					centerMode: true,
					centerPadding: '50px 30px'
				}
			}
		]
	});
</script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<?php if($this->request->get_method() == 'fortumo'){ ?>
<script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
<?php } ?>
</body>
</html>