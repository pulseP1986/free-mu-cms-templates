</div>
<!-- .container-->
<footer class="footer">
		<div class="toTop"></div>
				<ul class="f-menu flex-c-c">
						<li><a href="<?php echo $this->config->base_url; ?>home" title="<?php echo _('News'); ?>"><?php echo _('News'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>registration" title="<?php echo _('Registration'); ?>"><?php echo _('Registration'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>downloads" title="<?php echo _('Files'); ?>"><?php echo _('Downloads'); ?></a></li>
						<li><a href="<?php echo $this->config->base_url; ?>rankings" title="<?php echo _('Rankings'); ?>"><?php echo _('Rankings'); ?></a></li>
				</ul>
				<div class="footer-end flex-s-c">
				<div class="footer-block-coperite">
					<span class="copyright">Copyright <?php echo date('Y'); ?> © <a href="<?php echo $this->config->base_url; ?>"><?php echo $this->config->config_entry('main|servername'); ?></a></span><br><br>
					<span>This site is in no way associated with <br>or endorsed by Webzen Inc.</span>
				</div>
				<div class="footer-logo"><a href="/"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/logo-footer.png" alt=""></a></div>
				<div class="footer-block-r">
					<div class="templstock"><a href="https://templstock.com/" title="Game Site Templates - High quality PSD Templates, WordPress themes, HTML templates and Free game templates." class="templstock a"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/templ-logo.png" alt=""></a>
					</div>
				</div>
			</div></footer>
<!-- .footer -->
</div>
<div id="select_server">
	<div class="modal-header">
		<h2><?php echo _('Select Server'); ?></h2>
		<a class="close" href="javascript:;"></a>
	</div>
	<div style="margin: 20px;" class="form">
		<?php
			if (!$servers = $this->website->server_select_box('id="switch_server"')) {
				echo '<b style="color: red;">' . _('Currently this is only one server.') . '</b>';
			} else {
				echo $servers;
			}
		?>
	</div>
</div>
<div id="overlay"></div>
<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif" alt=""/> <?php echo _('Loading...'); ?></div>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js?v=1"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/swiper.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/global.js"></script>
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