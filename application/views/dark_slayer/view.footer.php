</main>
</div>
</div>
<div class="toTop-fon">
	<div class="toTop" id="toTop"></div>
</div>
<footer class="footer">
	<div class="footer-top-bg">
		<div class="footer-top flex-s-c">
			<div class="footer-top-left">
				<div class="footer-block-coperite">
					<span class="ct">&copy; <?php echo date('Y'); ?> <?php echo $this->config->config_entry('main|servername'); ?></span><br>
					<span class="copyright-text"><?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a></span>
				</div>
				<div class="footer-logo"><a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/logo-footer.png" alt=""></a></div>
				<div class="ct-text"><?php echo __('All rights reserved');?>.</div>
			</div>
			<div class="footer-menu">
				<div class="footer-menu-title">
					user links
				</div>
				<ul class="f-menu">
					<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>media/wallpapers"><?php echo __('Media');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
					<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><?php echo __('Forum');?></a></li>
					
				</ul>
			</div>
			<div class="footer-menu">
				<div class="footer-menu-title">
					SERVER
				</div>
				<ul class="f-menu">
					<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo __('Rules');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads');?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo __('Donate');?></a></li>
					<li><a href="">support / contacts</a></li>
				</ul>
			</div><!-- footer-menu -->
		</div>
	</div><!--footerTop-->
	<div class="footer-bottom">
		<div class="footer-bottom-bg flex-s-c">
			<div class="footer-bottom-left flex-s-c">
				<a href=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/icon-visa.png" alt=""></a>
				<a href=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/icon-master.png" alt=""></a>
				<a href=""><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/icon-gt2.png" alt=""></a>
			</div>
			<div class="templstock"><a href="https://templstock.com/" title="Game Site Templates - High quality PSD Templates, WordPress themes, HTML templates and Free game templates." class="templstock a"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/templ-logo.png" alt=""></a>
			</div>
			<div class="soc-block-lang-block flex-s-c">
				<div class="soc-block flex-s-c">
					<a href="" class="tw"></a>
					<a href="" class="yt"></a>
					<a href="" class="fb"></a>
					<a href="" class="ds"></a>
				</div>
				<div class="lang-block">
					<?php 
						$languages = $this->website->lang_list(); 
						$currLang = htmlspecialchars($_COOKIE['dmn_language']);
						if(isset($languages[$currLang])){
					?>
							<a href="javascript:;" title="<?php echo $languages[$currLang];?>" class="main-item f16"><span class="active flag <?php echo strtolower($currLang);?>"></span> <?php echo $languages[$currLang];?> (<?php echo strtoupper($currLang);?>)</a>

					<?php
						unset($languages[$currLang]);
						}
					?>	
					<ul class="hidden-block-l flex-s-c">
					<?php
						krsort($languages);
						foreach($languages as $iso => $native){
							echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '" class="f16"><span class="nonactive flag ' . strtolower($iso) . '"></span>&nbsp;' . $native . ' (' . strtoupper($iso) . ')</a></li>';
						}
					?>
				</div>
			</div>	
		</div>
	</div><!--footerBottom-->
</footer> 
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