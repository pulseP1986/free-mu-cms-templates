<footer>
	<div class="footerTop">
		<div class="toTop"></div>
		<div class="container">
			<div class="footerMenu flex-c-c">
				<ul class="menu flex-c-c">
					<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>media/wallpapers"><?php echo __('Media');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
					<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><?php echo __('Forum');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
				</ul>
			</div>
			<div class="b-block flex-s-c">
				<div class="copyright flex-c">
					<div class="copy">
						<?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?> <br>
						<?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a>
					</div>
				</div>
				<div class="langBlock parent_block_theme">
					<?php 
						if(!isset($_COOKIE['dmn_template'])){
							$_COOKIE['dmn_template'] = $this->config->config_entry('main|template');
						}
						$themes = [
							'raven_light' => 'Light',
							'raven_dark' => 'Dark',
						]; 
						$currTheme = htmlspecialchars($_COOKIE['dmn_template']);
						if(isset($themes[$currTheme])){
					?>
						<div class="langBlock-active flex-c buttonDrop" data-class="langBlock-dropdown">
							<a href="javascript:void();" title="<?php echo $themes[$currTheme];?>"><?php echo $themes[$currTheme];?></a>
						</div>
					<?php
							unset($themes[$currTheme]);
						}
					?>	
					<ul class="langBlock-dropdown toggled_block_theme">
					<?php
						krsort($themes);
						foreach($themes as $iso => $native){
							echo '<li><a href="#" id="theme_' . $iso . '" title="' . $native . '">' . $native . '</a></li>';
						}
					?>
					</ul>
				</div><!--themeBlock-->
				<div class="langBlock parent_block">
					<?php 
						$languages = $this->website->lang_list(); 
						$currLang = htmlspecialchars($_COOKIE['dmn_language']);
						if(isset($languages[$currLang])){
					?>
						<div class="langBlock-active flex-c buttonDrop" data-class="langBlock-dropdown">
							<a href="javascript:void();" title="<?php echo $languages[$currLang];?>" class="f16"><span class="active flag <?php echo strtolower($currLang);?>"></span> <?php echo $languages[$currLang];?> (<?php echo strtoupper($currLang);?>)</a>
						</div>
					<?php
						unset($languages[$currLang]);
						}
					?>	
					<ul class="langBlock-dropdown toggled_block">
					<?php
						krsort($languages);
						foreach($languages as $iso => $native){
							echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16"><span class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . ' (' . strtoupper($iso) . ')</a></li>';
						}
					?>
					</ul>
				</div><!--langBlock-->
			</div>
		</div>
	</div><!--footerTop-->
	<div class="footerBottom">
		<div class="container">
			<div class="footerBottomFlex flex-s-c">
				<div class="footerBottom-left flex-c">
					<a href="#" class="b-links"><?php echo __('Terms of Service');?></a>
					<a href="#" class="b-links"><?php echo __('Privacy Policy');?></a>
					<div class="socBlock flex-c">
						<a href="#" class="i-f"></a>
						<a href="#" class="i-y"></a>
						<a href="#" class="i-d"></a>
					</div>
				</div>
				<div class="footerBottom-right">
					<a href="https://dkarts.studio" target="_blank" class="dk"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/dkarts-studio.png" alt="Dkarts Studio"></a>
				</div>
			</div>
		</div>
	</div><!--footerBottom-->
</footer> 
<?php if (!$this->session->userdata(array('user' => 'logged_in'))){ ?>       
<div id="login" class="modal_div"> 
	<span class="modal_close"></span>
	<div class="modalContentBlock">
		<div class="modalContent">
			<div class="modalContent-title">
				<span><?php echo __('LOGIN');?></span>
			</div>
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
					<input class="input" type="password" placeholder="<?php echo __('Captcha');?>" name="captcha" id="captcha_input">
				</div>
				<?php } ?>
				<div class="formGroup formGroup-button">
					<button class="button button-green" type="sumbit"><?php echo __('Confirm');?></button>
				</div>
			</form>
			<div class="or"><?php echo __('OR');?></div>
			<?php
			$fb = $this->config->values('social_config', 'providers');
			if($fb['Facebook']['enabled'] == true){
			?>
			<div class="text-center mb-2"><?php echo $this->website->fb_login('button', 'button button-green'); ?></div>
			<div class="or"><?php echo __('OR');?></div>
			<?php } ?>
			<div class="m-register">
				<a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('REGISTER');?></a>
			</div>
			<div class="forgot">
				<a href="<?php echo $this->config->base_url; ?>lost-password"><?php echo __('Forgot your password?');?></a>
			</div>
		</div>
	</div>
</div>
<?php } ?>
<?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
<div id="eventBlock-events" class="modal_div"> 
	<span class="modal_close"></span>
	<div class="modalContentBlock">
		<div class="modalContent">
			<div class="modalContent-title">
				<span><?php echo __('Events');?></span>
			</div>
			<div id="events"></div>
			<script type="text/javascript">
				$(document).ready(function () {
					App.getEventTimes();
				});
			</script>
		</div>
	</div>
</div>
<div id="eventBlock-castle" class="modal_div"> 
	<span class="modal_close"></span>
	<div class="modalContentBlock">
		<div class="modalContent">
			<div class="modalContent-title">
				<span><?php echo __('Castle Siege');?></span>
			</div>
			<?php 
			$cs_info = $this->website->get_cs_info();
			?>
			<div id="cs_time"></div>
			<script type="text/javascript">
				$(document).ready(function () {
					App.castleSiegeCountDown("cs_time", <?php echo $cs_info['battle_start'];?>, <?php echo time();?>);
				});
			</script>
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/circle-js.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/lightzoom.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/global.js?v=1"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url;?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template');?>',
        currenttime: '<?php echo date('M d, Y h:i:s', time());?>',
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