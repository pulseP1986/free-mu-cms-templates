<?php if($this->request->get_controller() == 'home' &&  $this->request->get_method() == 'index'){ ?>
<?php } else { ?>
</div>
</section>
<?php } ?>
<section class="vs-newsletter-wrapper bg-dark z-index-step1 d-xs-none d-sm-none d-md-none d-lg-block">
	<div class="container ">
		<div class="position-relative">
			<div class="inner-wrapper bg-black position-absolute top-50 start-50 translate-middle w-100 px-60 py-40">
				<div class="row align-items-center justify-content-center">
					<div class="col-xl-6 text-center text-xl-start mb-3 mb-xl-0">
						<span class="sub-title2 mt-2"><?php echo __('Search'); ?></span>
						<h2 class="mb-0 text-white"><?php echo __('Get Game Stats'); ?></h2>
					</div>
					<div class="col-md-10 col-lg-8 col-xl-6">
						<form method="post" action="<?php echo $this->config->base_url; ?>rankings/search/<?php echo array_key_first($this->website->server_list());?>" class="newsletter-style1 d-md-flex">
							<input type="text" id="name" name="name" class="form-control" placeholder="<?php echo __('Enter player or guild name');?>">
							<button type="submit" class="vs-btn gradient-btn"><?php echo __('Submit'); ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<footer class="footer-wrapper footer-layout1 bg-fluid bg-dark position-relative">
	<div class="footer-widget-wrapper dark-style1 z-index-common">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 d-xs-none d-sm-none d-md-block d-lg-block">
					<div class="widget widget_categories footer-widget   ">
						<h3 class="widget_title ml-20 mt-20"><?php echo __('Information');?></h3>
						<ul>
							<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>about"><i class="fa fa-angle-right"></i> <?php echo __('About the Game');?></a></li>
							<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>rules"><i class="fa fa-angle-right"></i> <?php echo __('Terms of Services');?></a></li>
							<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>"><i class="fa fa-angle-right"></i> <?php echo __('Privacy Policy');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-md-block d-lg-block">
					<div class="widget widget_categories footer-widget   ">
						<h3 class="widget_title ml-20 mt-20"><?php echo __('How To Start');?></h3>
						<ul>
							<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>registration"><i class="fa fa-angle-right"></i> <?php echo __('Registration');?></a></li>
							<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>downloads"><i class="fa fa-angle-right"></i> <?php echo __('Downloads');?></a></li>
							<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>account-panel"><i class="fa fa-angle-right"></i> <?php echo __('Personal Area');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 d-md-block d-lg-block">
					<div class="widget widget_nav_menu footer-widget  ">
						<h3 class="widget_title ml-20 mt-20"><?php echo __('Community');?></h3>
						<div class="menu-all-pages-container">
							<ul class="menu">
								<li class="pl-10"><a href="<?php echo REALMU_V2_VARS['discord_link'];?>" target="_blank"><i class="fa fa-angle-right"></i> <?php echo __('Discord');?></a></li>
								<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>guides"><i class="fa fa-angle-right"></i> <?php echo __('Game Guides');?></a></li>
								<li class="pl-10"><a href="<?php echo $this->config->base_url; ?>rankings"><i class="fa fa-angle-right"></i> <?php echo __('Rankings');?></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 d-xs-none d-sm-none d-md-block d-lg-block">
					<div class="widget footer-widget">
						<h3 class="widget_title ml-20 mt-20"><?php echo __('Server');?></h3>
						<div class="vs-widget-about ml-20">
							<p class="contact-info"><i class="fas fa-clock text-white"></i><?php echo __('Server Time');?>: <span id="ServerTime"></span></p>
							<p class="contact-info"><i class="fas fa-clock text-white"></i><?php echo __('Local Time');?>: <span id="LocalTime"></span></p>
							<p class="contact-info">
								<ul class="social-links text-light fs-18 ">
									<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
									<li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-copyright bg-black z-index-step1">
		<div class="container">
			<div class="row">
				<div class="col-xl-7 d-none d-xl-block">
					<div class="footer-menu">
						<ul>
							<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About the Game');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo __('Terms of Services');?></a></li>
							<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('Privacy Policy');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-xl-5 align-self-center text-center py-3 py-xl-0 text-xl-end">
					<p class="text-light fw-bold text-bold mb-0">&copy; <?php echo date('Y'); ?> <a class="text-white" href="#"><?php echo $this->config->config_entry('main|servername'); ?></a>. <?php echo __('Powered By'); ?> <a class="text-white" href="https://github.com/pulseP1986/free-mu-cms" target="_blank">Free MuCMS</a></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<a href="#" class="scrollToTop icon-btn3"><i class="fas fa-angle-up"></i></a>
<div id="overlay"></div>
<div id="select_server">
	<div class="modal-header">
		<h2><?php echo __('Select Server'); ?></h2>
		<a class="close" href="javascript:;"></a>
	</div>
	<div style="margin: 20px;">
		<?php
		if(!$servers = $this->website->server_select_box('id="switch_server"', 'class="form-control bg-light-dark text-white has-border py-18 register"', false)){
			echo '<div class="alert alert-primary" role="alert">'. __('Currently this is only one server.').'</div>';
		} 
		else{
			echo $servers;
		}
		?>
	</div>
</div>
<a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading">
	<div class="lds-ellipsis">
		<div></div>
		<div></div>
		<div></div>
		<div></div>
	</div>
</div>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/layerslider.utils.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/layerslider.transitions.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/layerslider.kreaturamedia.jquery.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/slick.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/vscustom-carousel.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/vs-cursor.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/vsmenu.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/main.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script type="text/javascript">
    var DmNConfig = {
        base_url: '<?php echo $this->config->base_url;?>',
        tmp_dir: '<?php echo $this->config->config_entry('main|template');?>',
        currenttime: '<?php echo date('M d, Y H:i:s', time());?>',
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