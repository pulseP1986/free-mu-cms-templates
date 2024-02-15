	<?php if($this->request->get_controller() == 'home' && $this->request->get_method() == 'index') { ?>

	<section class="main__intro">
	  <h3 class="main__intro--title">MU Introduction</h3>
	  <p class="main__intro--desc">
		 MU Online, is a full 3D MMORPG which is one of
		 the leading online games developed in Korea.<br>
		 MU is a highly involved fantasy RPG based on the legendary Continent of MU.<br>
		 This server is bringing a new spin on the classic MU we all enjoy.
	  </p>
   </section>
	<?php } ?>
	</main>
</div>
<div class="side-promotion" style="position: fixed; top: 80px;">
	<div class="side-promotion__slider slider" id="slideSidePromotion">
	   <ul class="slider__list">
		<li class="slider__item selected" style="display: list-item;">
			<a href="https://muonline.webzen.com/events/season17part1/pre-event/" target="_blank" class="slider__link" rel="">
				<div class="side-promotion__info">
					<h3 class="side-promotion__title">Season 17 Pre-Event</h3>
				</div>
				<img class="side-promotion__banner" src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/s17preslide.png" alt="">
			</a>
		</li>
		<li class="slider__item" style="display: none;">
			<a href="https://muonline.webzen.com/news/events/31819/egg-of-monsters-july-5th-2022" target="_blank" class="slider__link" rel="">
				<div class="side-promotion__info">
					<h3 class="side-promotion__title">[Event] Egg of Monsters</h3>
				</div>
				<img class="side-promotion__banner" src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/egg20220208slide.png" alt="">
			</a>
		</li>
		<li class="slider__item" style="display: none;">
			<a href="https://muonline.webzen.com/en/news/notices/all/31498/mu-online-mu-online-game-guide-collection-in-th" target="_blank" class="slider__link" rel="">
				<div class="side-promotion__info">
					<h3 class="side-promotion__title">MU Online (MU Online Game Guide Collection in TH)</h3>
				</div>
				<img class="side-promotion__banner" src="https://uploadcdn.webzen.com/Files/Clara/WebzenGP/webmanager/SVR002/s1622slide.png" alt="">
			</a>
		</li>
		</ul>
	   <div class="slider__paging">
		  <ol class="slider__paging__list"></ol>
	   </div>
	</div>
	<div class="wz-nav__quick">
	   <a href="" class="wz-nav__quick--facebook" target="_blank" rel="nofollow">facebook</a>
	   <a href="" class="wz-nav__quick--youtube" target="_blank" rel="nofollow">youtube</a>
	</div>
 </div>
<footer id="footer" class="footer">
	<div class="footer-content">
	   <div class="footer-menu">
		  <a href="<?php echo $this->config->base_url; ?>" role="link" class="link" rel="">Home</a>
		  <a href="<?php echo $this->config->base_url; ?>rankings" role="link" class="link" rel="">Rankings</a>
		  <a href="<?php echo $this->config->base_url; ?>donate" role="link" class="link" rel="">Donation</a>
		  <a href="<?php echo $this->config->base_url; ?>tos" role="link" class="link" rel="">Terms of Service</a>

	   </div>
	   <div class="copyright">
		  <a href="https://www.webzen.com" target="_blank" class="ci" rel="">webzen</a>	
		  <span><?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?></span>
	   </div>
	   <div class="language selectbox">
			<?php 
				$languages = $this->website->lang_list(); 
				$currLang = htmlspecialchars($_COOKIE['dmn_language']);
				if(isset($languages[$currLang])){
			?>
				<a href="javascript:void();" class="selected" title="<?php echo $languages[$currLang];?>" ><span><?php echo $languages[$currLang];?> (<?php echo strtoupper($currLang);?>)</span></a>
			<?php
				unset($languages[$currLang]);
				}
			?>	
		  <ul class="list">
			<?php
				krsort($languages);
				foreach($languages as $iso => $native){
					echo '<li><a href="#" id="lang_' . $iso . '" title="' . $native . '">&nbsp;' . $native . ' (' . strtoupper($iso) . ')</a></li>';
				}
			?>
		  </ul>
	   </div>
	   <div class="time">
			<p> <strong>Server Time:</strong> <time id="tServerTime">&nbsp;</time> <span id="ServerTime">&nbsp;</span> </p>
			<p> <strong>Your Time:</strong> <time id="tLocalTime">&nbsp;</time> <span id="LocalTime">&nbsp;</span> </p>
		</div>
	</div>
</footer>
<?php
if(defined('STREAM_BOX') && STREAM_BOX == true ){
$streams = $this->website->findTwitchStreamers();

?>
<script src="<?php echo $this->config->base_url; ?>assets/plugins/js/streambox.js"></script>
<link href="<?php echo $this->config->base_url; ?>assets/plugins/css/streambox.css" rel="stylesheet">
<div class="stream-box">
  <div class="streams" style="display: none;">
	<?php
		if(!empty($streams)){
		foreach($streams AS $key => $data){
			if(!empty($data)){
	?>
	<div class="stream" style="padding-top:5px;border: 1px solid;border-color:#009ef7;">
		<div style="background-color:rgba(0, 0, 0, 1);color:#EEE;height:20px;text-align:right;">
			<span></span> 
			<span style="padding-right:3px"><?php echo $data['user'];?></span>
		</div>
		<img style="z-index: 0; display: inline;" class="frame-image " src="<?php echo $data['profile_image'];?>" width="<?php echo STREAM_BOX_THUMBNAIL_SIZE_W;?>" height="<?php echo STREAM_BOX_THUMBNAIL_SIZE_H;?>">
		<iframe style="z-index: 0; display: none;" class="frame-video" src="https://player.twitch.tv/?channel=<?php echo $data['user'];?>&parent=<?php echo parse_url($this->config->base_url, PHP_URL_HOST);?>&autoplay=false&muted=true" scrolling="no" allowfullscreen="" width="<?php echo STREAM_BOX_THUMBNAIL_SIZE_W;?>" height="<?php echo STREAM_BOX_THUMBNAIL_SIZE_H;?>" frameborder="0"></iframe>
	</div>
	<?php 
	}}} 

	?>	
  </div>
  <div class="alerter noselect">
    <span style="padding-right:33px;padding-top:4px;float:left;">&nbsp;<?php echo __('Stream Box');?></span>

    <img class="alert-up" style="vertical-align: middle; display: inline;" src="<?php echo $this->config->base_url; ?>assets/plugins/images/arrow.png">
    <img class="alert-down" style="vertical-align: middle; transform: rotate(180deg); display: none;" src="<?php echo $this->config->base_url; ?>assets/plugins/images/arrow.png">

    <span class="live" style="padding-top:4px;">
      <span class="dot blink_dot"></span>
      &nbsp;<?php echo __('LIVE');?>&nbsp;
    </span>
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
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ui.min.js?v=1"></script>
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
	function openNav() {
		document.getElementById("eventsSidenav").style.width = "340px";
	};

	function closeNav() {
		document.getElementById("eventsSidenav").style.width = "0";
	};
</script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js" type="text/javascript"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js" type="text/javascript"></script>
<?php if($this->request->get_method() == 'fortumo'){ ?>
<script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
<?php } ?>
</body>
</html>