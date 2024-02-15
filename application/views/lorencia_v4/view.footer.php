<div style="padding-bottom: 0px;background: #0f0f0f;height: 100%;">
	<div id="maindiv" style="margin-top: 0px;margin-bottom: 47px;height: 100%;">
		<div class="text-center" style="padding-top: 54px;"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-footer.png"></div>
		<div style="text-align: center;margin-top: 38px;">
			<div class="dropup">
				<?php 
					$languages = $this->website->lang_list(); 
					$currLang = htmlspecialchars($_COOKIE['dmn_language']);
					if(isset($languages[$currLang])){
				?>
					<a class="btn btn-primary" aria-expanded="false" data-toggle="dropdown" role="button" id="normalbutton" style="width: 257px;text-align: center;height: 52px;padding-top: 14px;padding-left: 23px;border-style: none;background: rgb(0,0,0);font-family: 'Source Sans Pro', sans-serif;font-size: 17px;color: rgb(89,89,89);"><?php echo $languages[$currLang];?>&nbsp; &nbsp;&nbsp;<i class="icon ion-ios-arrow-down"></i></a>
				<?php
					unset($languages[$currLang]);
					}
				?>	
				<div class="dropdown-menu" style="width: 257px;background: rgb(0,0,0);">
				<?php
					krsort($languages);
					foreach($languages as $iso => $native){
						echo '<div style="padding-top: 11px;padding-bottom: 11px;"><a class="btn btn-primary" role="button" id="lang_' . $iso . '" title="' . $native . '" style="border-style: none;border-radius: 0px;background: rgba(0,123,255,0);padding-left: 23px;padding-bottom: 0px;padding-top: 0px;color: rgb(89,89,89);">' . $native . '<br></a></div>';	
					}
				?>
				</div>
			</div>
		</div>
	</div>
	<div class="text-center" style="background: #0a0a0a;padding-top: 46px;padding-bottom: 39px;margin-top: 0px;">
		<a class="btn btn-primary" role="button" id="normalbutton" style="border-style: none;border-radius: 0px;background: rgba(0,123,255,0);color: rgb(149,149,149);">Terms of Service</a>
		<a class="btn btn-primary" role="button" id="normalbutton" style="border-style: none;border-radius: 0px;background: rgba(0,123,255,0);color: rgb(149,149,149);margin-right: 0px;margin-left: 25px;">Privacy Policy</a>
		<p style="margin-bottom: 0px;padding-right: 30px;padding-left: 31px;"><br><?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?> <br>
						<?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a><br><br></p>
	</div>
</div>
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/bs-init.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
<script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
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