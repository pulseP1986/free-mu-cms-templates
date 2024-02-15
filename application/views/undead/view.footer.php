</div>
<?php
if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
	$this->load->view($this->config->config_entry('main|template') . DS . 'view.characters');
}
?>
<div class="container">
	<?php if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') { ?>
	<div class="about home-block">
		<span class="corner-top-left corner-top-left-purple"></span>
		<div class="home-block-title home-title">
			<?php echo __('About Server');?>
		</div>
		<div class="about-img">
			<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/about-img.jpg" alt="">
		</div>
		<div class="about-text">
			<?php echo __('New changes to Castle Siege come into effect this week. Now, in addition to the winner of the castle, will be determined and the second place - the guild with the most points during the siege. Owners of the castle will receive 60% of the treasury of the castle, the second place will receive 40% of the treasury. In addition to the treasury on the server Mega, we assign a prize fund from the administration in the amount of $ 5000.');?>
		</div>
		<div class="about-button">
			<a href="<?php echo $this->config->base_url; ?>about" class="button"><?php echo __('More');?></a>
		</div>
	</div><!--about-->
	<?php } ?>
	<div class="to-top">
		<span class="toTop"></span>
	</div>
	<div class="footerMenu flex">
		<div class="footerMenu-block">
			<ul class="f-menu">
				<li><a href="<?php echo $this->config->base_url; ?>"><?php echo __('News');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>registration"><?php echo __('Registration');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>rankings"><?php echo __('Rankings');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>downloads"><?php echo __('Downloads');?></a></li>
			</ul>
		</div>
		<div class="footerMenu-block">
			<ul class="f-menu">
				<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market');?></a></li>
				<li><a href="<?php echo $this->config->config_entry('main|forum_url'); ?>"><?php echo __('Forum');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>rules"><?php echo __('Rules');?></a></li>
				<li><a href="<?php echo $this->config->base_url; ?>about"><?php echo __('About');?></a></li>
			</ul>
		</div>
		<div class="footerMenu-block">
			<ul class="f-menu">
				<li><a href=""><?php echo __('TOS');?></a></li>
				<li><a href=""><?php echo __('Privacy Policy');?></a></li>
			</ul>
		</div>
	</div>
</div>
</main>
<footer class="footer">
	<div class="container">
		<div class="footerBottom flex-c">
			<div class="footerBottom-block footerBottom-block-20">
				<div class="f-info">
					<p><?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?></p>
					<span><?php echo __('Powered By'); ?> <a href="https://dmncms.net" target="_blank">DmN MuCMS</a></span>
				</div>
			</div>
			<div class="footerBottom-block footerBottom-block-60">
				<div class="f-logo">
					<a href="<?php echo $this->config->base_url; ?>"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-footer.png"alt=""></a>
				</div>
			</div>
			<div class="footerBottom-block footerBottom-block-20">
				<div class="templ flex-c-c">
					<i class="templ-icon"></i>
					<span>Designed by <a href="https://dkarts.studio/" target="_blank">DKarts.Studio</a> <br>
						for <a href="https://templstock.com/en/" target="_blank">Templstock.com</a></span>
				</div>
			</div>
		</div>
	</div>
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
<?php if(defined('PARTNER_SYSTEM') && PARTNER_SYSTEM == true ){ ?>
<script src="<?php echo $this->config->base_url; ?>assets/plugins/js/streamers.js"></script>
<link href="<?php echo $this->config->base_url; ?>assets/plugins/css/streamers.css" rel="stylesheet">
<div class="live-viewer hidden-xs" id="stream-view">
	<table>
		<tr>
			<td class="fist" id="extend-stream">
				<i class="fa fa-chevron-right" aria-hidden="true" id="icon-status"></i>
			</td>
			<?php
				$streams = $this->website->findTwitchStreamers();
				if(!empty($streams)){
				foreach($streams AS $key => $data){
					if(!empty($data)){
			?>
			<td style="padding: 0px; padding-top: 8px; ">
				<a href="<?php echo $data['url'];?>" target="_blank">
					<img src="<?php echo $data['image'];?>" class="img-live">
					<br>
					<img src="<?php echo $data['profile_image'];?>" class="img-profile">
				</a>
			</td>
			<?php }}} ?>		
		</tr>
	</table>
</div>
<?php } ?>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/slick.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/circle-js.js"></script>
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