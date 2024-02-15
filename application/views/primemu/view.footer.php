<?php
    $body = '';
    if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
        $body = 'home';
    }
?>
        <footer>
            <div class="wrapper">
                <div class="footerMenu flex">
                    <div class="footerMenu-block">
                        <div class="h2-title flex-s-c">
                            <span>Information</span>
                        </div>
                       <ul class="f-menu">
                           <li><a href="<?php echo $this->config->base_url; ?>guides"
                                title="<?php echo __('Vote'); ?>"><?php echo __('Server Info'); ?></a>
                            </li> 
                            <li><a href="<?php echo $this->config->base_url; ?>vote-reward"
                                title="<?php echo __('Vote'); ?>"><?php echo __('Vote'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footerMenu-block">
                        <div class="h2-title flex-s-c">
                            <span>How to Start</span>
                        </div>
                        <ul class="f-menu">
                            <li><a href="<?php echo $this->config->base_url; ?>registration"
                                title="<?php echo __('Registration'); ?>"><?php echo __('Registration'); ?></a>
                            </li>
                            <li><a href="<?php echo $this->config->base_url; ?>downloads"
                                title="<?php echo __('Files'); ?>"><?php echo __('Files'); ?></a>
                            </li>
                            <li><a href="<?php echo $this->config->base_url; ?>rankings"
                                title="<?php echo __('Rankings'); ?>"><?php echo __('Rankings'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footerMenu-block">
                        <div class="h2-title flex-s-c">
                            <span>Community</span>
                        </div>
                        <ul class="f-menu">
                            <li><a href=""
                                title="<?php echo __('Discord'); ?>"
                                target="_blank"><?php echo __('Discord'); ?></a>
                            </li>
                            <li><a href=""
                                title="<?php echo __('Facebook'); ?>"
                                target="_blank"><?php echo __('Facebook'); ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footerMenu-block">
                        <div class="h2-title flex-s-c">
                            <span>Support</span>
                        </div>
                        <div class="e-mail">
                            <p>E-mail support:</p>
                            <a href="#">no-reply@dmncms.net</a>
                        </div>
                       
                    </div>
                </div><!--footerMenu-->
                <span class="line"></span>
                <div class="footerInfo">
                    <div class="footerInfo-block flex-s">
                        <div class="playments"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/payments-icon.png" alt="Payments"></div>
                        <div class="copy">
                            <?php echo __('Copyright'); ?> <?php echo date('Y'); ?>
                            &copy; <?php echo $this->config->config_entry('main|servername'); ?>
                        </div>
                    </div>
                   
                </div>
            </div>
        </footer>
        <div class="rightBodyLinks hidden-xs hidden-sm">
            <?php if ($this->config->values('event_config', array('events', 'active')) == 1) { ?>
                <a href="#timers" class="r-wiki open_modal"><span><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/forum-img.png" alt=""></span><?php echo ('Events');?></a>
            <?php } ?>
                       <a href="<?php echo $this->config->base_url; ?>donate" class="r-shop"><span><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/shop-img.png" alt=""></span><?php echo __('Buy Coins');?></a>
            <a href="" class="r-shop"><span><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/wiki-img.png" alt=""></span><?php echo __('Contact');?></a>
        </div>
        <div class="toTop">
            <span>Go to Top</span>
        </div>
        <?php	if (!$this->session->userdata(array('user' => 'logged_in'))): ?>
          <div id="register" class="modal_div">
            <span class="modal_close"></span>
            <form id="login_form" method="POST" action="<?php echo $this->config->base_url; ?>">
                <div class="modalContent">
                    <span class="modalTitle"><?php echo __('Sign In');?></span>
                    <div class="fields">
                        <div class="fieldGroup">
                            <span><?php echo __('Username');?></span>
                            <input type="text" name="username" id="login_input" placeholder="username" required>
                        </div>
                        <div class="fieldGroup">
                            <span><?php echo __('Password');?></span>
                            <input type="password" name="password" id="password_input" placeholder="password" required>
                        </div>
                    </div><!--fields-->
                    <div class="enter flex-s-c">
                        <div class="enterLinks">
                            <p><a href="<?php echo $this->config->base_url; ?>lost_password" class="forgot"><?php echo __('Forgot Password?');?></a></p>
                        </div>
                        <button class="button-blue"><?php echo __('Login');?></button>
                    </div>
                </div><!--modalContent-->
            </form>
        </div>
    <?php endif;?>
    <?php if ($this->config->values('event_config', array('events', 'active')) == 1) { ?>
        <div id="timers" class="modal_div">
            <span class="modal_close"></span>
            <div class="modalContent">
                <span class="modalTitle"><?php echo __('Event Timers');?></span>
                <div id="events"></div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        App.getEventTimes();
                    });
                </script>
            </div>
        </div>
    <?php } ?>
    <div id="overlay"></div>
    <div id="select_server">
        <div class="modal-header">
            <h2><?php echo __('Select Server'); ?></h2>
            <a class="close" href="javascript:;"></a>
        </div>
        <div style="margin: 20px;" class="form">
            <?php
                if(!$servers = $this->website->server_select_box('id="switch_server"')){
                    echo '<b style="color: red;">' . __('Currently this is only one server.') . '</b>';
                } else{
                    echo $servers;
                }
            ?>

        </div>
    </div>
    <a data-modal-div="select_server" href="#" id="server_click" style="display: hidden;"></a>
<div id="loading"><img
            src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/images/ajax-loader.gif"
            alt=""/> <?php echo __('Loading...'); ?></div>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jed.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.leanModal.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/jquery.tooltip.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/ejs.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/helpers.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/app.js?v1"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/swiper-bundle.min.js?v=1"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/slick.min.js?v=1"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/<?php echo ($body == 'home' ? 'global.index' : 'global');?>.js?v=8"></script>
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
<script
        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine-en.js"
        type="text/javascript"></script>
<script
        src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template'); ?>/js/validation/jquery.validationEngine.js"
        type="text/javascript"></script>
<?php
    if($this->request->get_method() == 'fortumo'){
        ?>
        <script src="https://assets.fortumo.com/fmp/fortumopay.js" type="text/javascript"></script>
        <?php
    }
?>
</body>
</html>