<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<section class="vs-hero-wrapper bg-header">
    <video autoplay loop muted class="ls-bg">
        <source src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/background_new.mp4" type="video/mp4">
        <?php echo __('Your browser does not support video.');?>
    </video>
    <div class="vs-hero-carousel dh-xs-block dh-sm-none dh-md-none dh-lg-none dh-xl-none w-100" data-height="1550" data-slidertype="fullwidth">
        <div class="dh-top-header">
            <div class="mt-50-off mb-30-off"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-h2.png" class="ml-10 mt-0" /></div>
            <div class="fs-16 text-white pb-10" style="text-transform: uppercase;"><?php echo __('Register and start playing for free!');?></div>
            <div>
                <a href="<?php echo $this->config->base_url; ?>registration" class="vs-btn gradient-btn"><?php echo __('Registration');?></a>
                <a href="<?php echo REALMU_V2_VARS['discord_link'];?>" class="vs-btn black-skew"><i class="fab fa-discord"></i><?php echo __('Discord');?></a>
            </div>
        </div>
        <div class="ls-slide"></div>
    </div>
    <div class="vs-hero-carousel dh-xs-none dh-sm-block dh-md-none dh-lg-none dh-xl-none" data-height="650" data-slidertype="fullwidth">
        <div class="ls-slide">
            <div class="ls-l ls-responsive" style="left: 10px; top: 100px; text-transform: uppercase; font-weight: 700; padding: 5px 11px;" data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                <span class="vs-btn2 gradient-btn fs-14 text-white"><?php echo __(REALMU_V2_VARS['season']);?></span>
            </div>
            <div class="ls-l ls-responsive" style="left: -50px; top: 105px;">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-h2.png" class="w-100 ml-10 mt-0" />
            </div>
            <div class="ls-l ls-responsive" style="left: 15px; top: 350px; font-size: 16px; color: #e2e2e2; text-transform: uppercase;" data-ls="minfontsize: 12px; durationin: 1000; delayin: 1100; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;"><?php echo __('Register and start playing for free!');?></div>
            <div class="ls-l ls-responsive" style="left: 15px; top: 380px;" data-ls="durationin: 1000; delayin: 1200; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                <div class="ls-btn-group">
                    <a href="<?php echo $this->config->base_url; ?>registration" class="vs-btn gradient-btn"><?php echo __('Registration');?></a>
                    <a href="<?php echo REALMU_V2_VARS['discord_link'];?>" class="vs-btn black-skew"><i class="fab fa-discord"></i><?php echo __('Discord');?></a>
                </div>
            </div>
            <div class="ls-l ls-responsive" style="left: 85%; top: 39%;" data-ls="durationin: 1000; fadein: true; delayin: 1200; scalexin: 0.5; scaleyin: 0.5; transitionout: true; durationout: 1000; fadeout: true; scalexout: 1.5; scaleyout: 1.5;">
                <a href="<?php echo REALMU_V2_VARS['main_trailer'];?>" class="popup-video play-btn outline"><i class="fas fa-play"></i></a>
            </div>
        </div>
    </div>
    <div class="vs-hero-carousel dh-xs-none dh-sm-none dh-md-block dh-lg-none dh-xl-none" data-height="650" data-slidertype="fullwidth">
        <div class="ls-slide">
            <div class="ls-l ls-responsive" style="left: 20px; top: 90px; text-transform: uppercase; font-weight: 700; padding: 5px 11px;" data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                <span class="vs-btn2 gradient-btn fs-14 text-white"><?php echo __('Season 19');?></span>
            </div>
            <div class="ls-l ls-responsive" style="left: -30px; top: 85px;">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-h2.png" class="w-100" />
            </div>
            <div class="ls-l ls-responsive" style="left: 35px; top: 330px; font-size: 16px; color: #e2e2e2; text-transform: uppercase;" data-ls="minfontsize: 12px; durationin: 1000; delayin: 1100; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;"><?php echo __('Register and start playing for free!');?></div>
            <div class="ls-l ls-responsive" style="left: 35px; top: 360px;" data-ls="durationin: 1000; delayin: 1200; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                <div class="ls-btn-group">
                    <a href="<?php echo $this->config->base_url; ?>registration" class="vs-btn gradient-btn"><?php echo __('Registration');?></a>
                    <a href="<?php echo REALMU_V2_VARS['discord_link'];?>" class="vs-btn black-skew"><i class="fab fa-discord"></i><?php echo __('Discord');?></a>
                </div>
            </div>
            <div class="ls-l ls-responsive" style="left: 85%; top: 39%;" data-ls="durationin: 1000; fadein: true; delayin: 1200; scalexin: 0.5; scaleyin: 0.5; transitionout: true; durationout: 1000; fadeout: true; scalexout: 1.5; scaleyout: 1.5;">
                <a href="<?php echo REALMU_V2_VARS['main_trailer'];?>" class="popup-video play-btn outline"><i class="fas fa-play"></i></a>
            </div>
        </div>
    </div>
    <div class="vs-hero-carousel dh-xs-none dh-sm-none dh-md-none dh-lg-block dh-xl-none" data-height="650" data-slidertype="fullwidth">
        <div class="ls-slide">
            <div class="ls-l ls-responsive" style="left: 5px; top: 110px; text-transform: uppercase; font-weight: 700; padding: 5px 11px;" data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                <span class="vs-btn2 gradient-btn fs-14 text-white"><?php echo __('Season 19');?></span>
            </div>
            <div class="ls-l ls-responsive" style="left: -50px; top: 105px;">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-h2.png" />
            </div>
            <div class="ls-l ls-responsive" style="left: 15px; top: 350px; font-size: 16px; color: #e2e2e2; text-transform: uppercase;" data-ls="minfontsize: 12px; durationin: 1000; delayin: 1100; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;"><?php echo __('Register and start playing for free!');?></div>
            <div class="ls-l ls-responsive" style="left: 15px; top: 380px;" data-ls="durationin: 1000; delayin: 1200; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                <div class="ls-btn-group">
                    <a href="<?php echo $this->config->base_url; ?>registration" class="vs-btn gradient-btn"><?php echo __('Registration');?></a>
                    <a href="<?php echo REALMU_V2_VARS['discord_link'];?>" class="vs-btn black-skew"><i class="fab fa-discord"></i><?php echo __('Discord');?></a>
                </div>
            </div>
            <div class="ls-l ls-responsive" style="left: 85%; top: 42%;" data-ls="durationin: 1000; fadein: true; delayin: 1200; scalexin: 0.5; scaleyin: 0.5; transitionout: true; durationout: 1000; fadeout: true; scalexout: 1.5; scaleyout: 1.5;">
                <a href="<?php echo REALMU_V2_VARS['main_trailer'];?>" class="popup-video play-btn outline"><i class="fas fa-play"></i></a>
            </div>
        </div>
    </div>
    <div class="vs-hero-carousel dh-xs-none dh-sm-none dh-md-none dh-lg-none dh-xl-block" data-height="650" data-slidertype="fullwidth">
        <div class="ls-slide">
            <div class="ls-l ls-responsive" style="left: 5px; top: 160px; text-transform: uppercase; font-weight: 700; padding: 5px 11px;" data-ls="offsetxin: -100; durationin: 1000; delayin: 0; easingin:easeOutQuint;  transitionout: true; offsetxout: 600; durationout: 3000; fadeout: true; skewxout: 10;">
                <span class="vs-btn2 gradient-btn fs-14 text-white"><?php echo __('Season 19');?></span>
            </div>
            <div class="ls-l ls-responsive" style="left: -50px; top: 155px;">
                <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo-h2.png" />
            </div>
            <div class="ls-l ls-responsive" style="left: 15px; top: 400px; font-size: 16px; color: #e2e2e2; text-transform: uppercase;" data-ls="minfontsize: 12px; durationin: 1000; delayin: 1100; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;"><?php echo __('Register and start playing for free!');?></div>
            <div class="ls-l ls-responsive" style="left: 15px; top: 430px;" data-ls="durationin: 1000; delayin: 1200; easingin:easeOutQuint; offsetyin: 50; transitionout: true; offsetxout: 300; durationout: 3000; fadeout: true; skewxout: 10;">
                <div class="ls-btn-group">
                    <a href="<?php echo $this->config->base_url; ?>registration" class="vs-btn gradient-btn"><?php echo __('Registration');?></a>
                    <a href="<?php echo REALMU_V2_VARS['discord_link'];?>" class="vs-btn black-skew"><i class="fab fa-discord"></i><?php echo __('Discord');?></a>
                </div>
            </div>
            <div class="ls-l ls-responsive" style="left: 92.5%; top: 50%;" data-ls="durationin: 1000; fadein: true; delayin: 1200; scalexin: 0.5; scaleyin: 0.5; transitionout: true; durationout: 1000; fadeout: true; scalexout: 1.5; scaleyout: 1.5;">
                <a href="<?php echo REALMU_V2_VARS['main_trailer'];?>" class="popup-video play-btn outline"><i class="fas fa-play"></i></a>
            </div>
        </div>
    </div>
</section>
<section class="vs-blog-wrapper blog-single-layout1 space-top-3 bg-light-dark">
    <div class="container pb-20">
        <?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.slider'); ?>	
        <div class="row">
            <div class="col-lg-8">
                <div class="row justify-content-between">
                    <div class="col-md-auto text-center text-md-start">
                        <div class="section-title2">
                            <span class="sub-title3 text-default"><?php echo __('Last News');?></span>
                            <h2 class="sec-title2 text-white font-theme3"><?php echo __('News');?></h2>
                        </div>
                    </div>
                    <div class="col-auto mt-3 d-none d-md-block">
                        <a href="<?php echo $this->config->base_url; ?>home/all" class="vs-btn2 gradient-btn"><?php echo __('See All');?></a>
                    </div>
                </div>
                <?php
                $patchNotes = $this->Mhome->load_news_by_type(4, 5);
                if(!empty($news)){
                foreach($news as $key => $article){
                ?>
                <div class="vs-blog">
                    <div class="blog-meta has-border bg-major-black">
                        <div class="cat-list">
                            <i class="fas fa-tags"></i>
                            <a><?php echo $article['type'];?></a>
                        </div>&nbsp;
                        <a><i class="fas fa-calendar-alt"></i><?php echo date(DATE_FORMAT, $article['time']); ?></a>
                    </div>
                    <div class="blog-content bg-major-black">
                        <div class="row">
                            <?php 
                            $imageLen = strlen($article['icon']);
                            $col = 'col-md-12';
                            if($imageLen > 7){
                                $col = 'col-md-9';
                            ?>
                            <div class="col-md-3">
                                <a href="<?php echo $article['url']; ?>" class="image-container">
                                    <img class="w-100 dh-xs-block dh-sm-none dh-md-none dh-lg-none dh-xl-none img2" src="<?php echo $article['icon'];?>" alt="<?php echo $article['title']; ?>">
                                    <img class="w-100 dh-xs-none dh-sm-block dh-md-block dh-lg-block dh-xl-block img1" style="min-height: 100px;" src="<?php echo $article['icon'];?>" alt="<?php echo $article['title']; ?>">
                                </a>
                            </div>
                            <?php } ?>
                            <div class="<?php echo $col;?>">
                                <h2 class="blog-title text-white font-theme h5 mt-25-sm">
                                    <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
                                </h2>
                                <p><?php echo str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content'])))); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }} ?>
            </div>
            <div class="col-lg-4">
            <div class="pt-15"></div>
                <aside class="sidebar-area overflow-hidden">
                    <?php if(strtotime($this->config->config_entry("main|grand_open_timer")) >= time()){ ?>                    
                    <div id="timers" class="vs-sidebox bg-major-black">
                        <div id="timer_div_title"><?php echo $this->config->config_entry("main|grand_open_timer_text"); ?></div>
                        <div id="timer_div_time">
                            <div class="timmer_inner_block">
                                <div class="title"><?php echo __('Days'); ?></div>
                                <div id="days" class="count"></div>
                            </div>
                            <div class="timmer_inner_block">
                                <div class="title"><?php echo __('Hours'); ?></div>
                                <div id="hours" class="count"></div>
                            </div>
                            <div class="timmer_inner_block">
                                <div class="title"><?php echo __('Minutes'); ?></div>
                                <div id="minutes" class="count"></div>
                            </div>
                            <div class="timmer_inner_block">
                                <div class="title"><?php echo __('Seconds'); ?></div>
                                <div id="seconds" class="count"></div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>	
                    <div class="vs-sidebox bg-major-black">
                        <h3 class="sidebox-title text-white h5"><?php echo __('Patch Notes');?></h3>
                        <?php if(!empty($patchNotes)){ ?>
                        <ul class="vs-cat-list1">
                        <?php foreach($patchNotes as $patch){ ?>
                        <li>
                            <a href="<?php echo $patch['url']; ?>"><?php echo $patch['title']; ?> <span class="cat-number text-white"><?php echo date('d M', $patch['time']); ?></span></a>
                        </li>
                        <?php } ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <?php if($this->config->values('event_config', ['events', 'active']) == 1){ ?>
                    <div class="vs-sidebox-v2 vs-blog-layout2 bg-major-black">
                        <div class="row arrow-margin mb-0">
                            <div class="col-xl-12">
                                <ul class="events-table" id="events"></ul>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        App.getEventTimes();
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </aside>
            </div>
        </div>
    </div>
</section>
<div class="vs-video-area bg-dark pt-60 pb-70 bg-fixed" data-bg-src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cover_page.jpg">
    <?php
    $serverList = $this->website->server_list();
    ?>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-auto text-center text-md-start">
                <div class="section-title2">
                    <span class="sub-title3 text-default"><?php echo __('Events'); ?></span>
                    <h2 class="sec-title2 text-white font-theme3"><?php echo __('Guild Wars');?></h2>
                </div>
            </div>
        </div>
        <div class="row vs-carousel z-index-common arrow-margin arrow-white" data-slide-show="3" data-md-slide-show="2" data-sm-slide-show="1" data-xs-slide-show="1" data-arrows="true" data-speed="2000" data-infinite="false">
            <div class="col-lg-4 col-md-6 col-sm-12 mb-20">
                <div class="w-100 bg-light-dark">
                    <div class="py-20 px-20 w-100 pb-0">
                        <h5 class="sidebox-title text-white h5 mb-0" style="display:flex;">
                            <span><?php echo __('Castle Siege');?></span>
                            <?php if(count($serverList) > 1){ ?>
                            <select id="cs-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-gray">
                            <?php foreach($serverList as $key => $server){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
                            <?php } ?>
                            </select>
                            <?php } ?>
                        </h5>
                    </div>
                    <div class="vs-events d-lg-flex pb-0 mb-15-off mt-15-off">
                        <div class="media-body align-self-center py-20 px-20">
                            <?php
                            $i = 0;
                            foreach($serverList as $key => $server){
                                if($server['visible'] == 1){
                                $cs_info = $this->website->get_cs_info($key);
                                $csGuilds = $this->website->get_cs_guild_list($key);
                                $csMark = str_repeat('1', 64);
                                if($cs_info['guild'] != '' && $cs_info['guild'] != null){
                                    $csMark = $cs_info['mark'];
                                }

                            ?>
                            <div id="cs-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>
                                <table class="mb-0">
                                    <tr>
                                        <td rowspan="10" class="border-0 w-max-160 w-160px">
                                            <img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $csMark;?>/140" class="contour" alt="Guild Image">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Status');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($cs_info['guild'] != '' && $cs_info['guild'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Guild');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($cs_info['guild'] != '' && $cs_info['guild'] != null){ echo $cs_info['guild']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Master');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($cs_info['guild'] != '' && $cs_info['guild'] != null){ echo $cs_info['owner']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-center pt-10" colspan="2">
                                            <span class="text-white"><?php echo __('Registered');?>:<br/></span>
                                            <?php 
                                            if(!empty($csGuilds)){ 
                                                foreach($csGuilds AS $cguild){
                                            ?>
                                            <a><?php echo $cguild['REG_SIEGE_GUILD'];?></a>
                                            <?php }} else{ ?>
                                            <a><?php echo __('No guilds registered');?></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <script type="text/javascript">
                                $(document).ready(function () {
                                    App.castleSiegeCountDown("cs_time_<?php echo $key;?>", <?php echo $cs_info['battle_start'];?>, <?php echo time();?>);
                                });
                            </script>
                            <?php
                                $i++;
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="fs-17 text-center text-white-50 px-20 pb-20 pt-0 w-100">
                        <hr/>
                        <?php 
                        $i = 0;
                        foreach($serverList as $key => $server){ 
                        if($server['visible'] == 1){
                        ?>
                        <div id="next-cs-<?php echo $key;?>" class="fs-17 text-center mt-0 pb-0 text-white-50" <?php if($i != 0){ echo 'style="display:none;"'; } ?>><?php echo __('Next Battle');?>: <span id="cs_time_<?php echo $key;?>"></span></div>
                        <?php 
                            $i++;
                        }
                        } 
                        ?>
                    </div>
                    <script>
                    $(document).ready(function () {
                        $("#cs-server-switch").on('change', function (e) {
                            e.preventDefault();
                            var serv =  $(this).find(":selected").val();
                            $('[id^="cs-details-"]').hide();
                            $('[id^="next-cs-"]').hide();
                            $('#cs-details-'+serv).show();
                            $('#next-cs-'+serv).show();	
                        });
                    });
                    </script>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-20">
                <div class="w-100 bg-light-dark">
                    <div class="py-20 px-20 w-100 pb-0">
                        <h5 class="sidebox-title text-white h5 mb-0" style="display:flex;">
                            <span><?php echo __('Throne Conquest');?></span>
                            <?php if(count($serverList) > 1){ ?>
                            <select id="throne-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-gray">
                            <?php foreach($serverList as $key => $server){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
                            <?php } ?>
                            </select>
                            <?php } ?>
                        </h5>
                    </div>
                    <div class="vs-events d-lg-flex pb-0 mb-15-off mt-15-off">
                        <div class="media-body align-self-center py-20 px-20">
                            <?php
                            $i = 0;
                            foreach($serverList as $key => $server){
                            if($server['visible'] == 1){    
                                $ice_info = $this->website->getIceWindWinners($key);
                                $iceGuilds = $this->website->iceWindGuildList($key);
                                $iceMark = str_repeat('1', 64);
                                if($ice_info != false){
                                    if($ice_info != false && $ice_info['G_Name'] != null){
                                        $iceMark = urlencode(bin2hex($ice_info['G_Mark']));
                                    }
                                }

                            ?>
                            <div id="throne-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>
                                <table class="mb-0">
                                    <tr>
                                        <td rowspan="10" class="border-0 w-max-160 w-160px">
                                            <img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $iceMark;?>/140" class="contour" alt="Guild Image">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Status');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($ice_info != false && $ice_info['G_Name'] != '' && $ice_info['G_Name'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Guild');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($ice_info != false && $ice_info['G_Name'] != '' && $ice_info['G_Name'] != null){ echo $ice_info['G_Name']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Master');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($ice_info != false && $ice_info['G_Name'] != '' && $ice_info['G_Name'] != null){ echo $ice_info['G_Master']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-center pt-10" colspan="2">
                                            <span class="text-white"><?php echo __('Registered');?>:<br/></span>
                                            <?php 
                                            if(!empty($iceGuilds)){ 
                                                foreach($iceGuilds AS $iguild){
                                            ?>
                                            <a><?php echo $iguild['G_Name'];?></a>
                                            <?php }} else{ ?>
                                            <a><?php echo __('No guilds registered');?></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <script type="text/javascript">
                                <?php $icetime = new DateTime(REALMU_V2_VARS['ice_day']); ?>
                                $(document).ready(function () {
                                    App.castleSiegeCountDown("throne_time_<?php echo $key;?>", <?php echo $icetime->modify(REALMU_V2_VARS['ice_add_hours'])->getTimestamp(); ?>, <?php echo time();?>);
                                });
                            </script>
                            <?php
                                $i++;
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="fs-17 text-center text-white-50 px-20 pb-20 pt-0 w-100">
                        <hr/>
                        <?php 
                        $i = 0;
                        foreach($serverList as $key => $server){
                        if($server['visible'] == 1){
                        ?>
                        <div id="next-throne-<?php echo $key;?>" class="fs-17 text-center mt-0 pb-0 text-white-50" <?php if($i != 0){ echo 'style="display:none;"'; } ?>><?php echo __('Next Battle');?>: <span id="throne_time_<?php echo $key;?>"></span></div>
                        <?php 
                            $i++;
                        }
                        } 
                        ?>
                    </div>
                    <script>
                    $(document).ready(function () {
                        $("#throne-server-switch").on('change', function (e) {
                            e.preventDefault();
                            var serv =  $(this).find(":selected").val();
                            $('[id^="throne-details-"]').hide();
                            $('[id^="next-throne-"]').hide();
                            $('#throne-details-'+serv).show();
                            $('#next-throne-'+serv).show();	
                        });
                    });
                    </script>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-20">
                <div class="w-100 bg-light-dark">
                    <div class="py-20 px-20 w-100 pb-0">
                        <h5 class="sidebox-title text-white h5 mb-0" style="display:flex;">
                            <span><?php echo __('Arka War');?> <sup class="text-light font-theme">(<?php echo __('Obelisk');?> 1)</sup></span>
                            <?php if(count($serverList) > 1){ ?>
                            <select id="arca-1-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-gray">
                            <?php foreach($serverList as $key => $server){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
                            <?php } ?>
                            </select>
                            <?php } ?>
                        </h5>
                    </div>
                    <div class="vs-events d-lg-flex pb-0 mb-15-off mt-15-off">
                        <div class="media-body align-self-center py-20 px-20">
                            <?php
                            $i = 0;
                            foreach($serverList as $key => $server){
                            if($server['visible'] == 1){
                                $this->website->registry()->load->model('stats');
                                $arca_info = $this->website->registry()->Mstats->get_arca_winner_1($key);
                                $arcaGuilds = $this->website->arcaGuildList($key);
                                $arcaMark = str_repeat('1', 64);
                                if($arca_info != false){
                                    if($arca_info != false && $arca_info['G_Name'] != null){
                                        $arcaMark = urlencode(bin2hex($arca_info['G_Mark']));
                                    }
                                }

                            ?>
                            <div id="arca-1-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>
                                <table class="mb-0">
                                    <tr>
                                        <td rowspan="10" class="border-0 w-max-160 w-160px">
                                            <img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $arcaMark;?>/140" class="contour" alt="Guild Image">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Status');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($arca_info != false && $arca_info['G_Name'] != '' && $arca_info['G_Name'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Guild');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($arca_info != false && $arca_info['G_Name'] != '' && $arca_info['G_Name'] != null){ echo $arca_info['G_Name']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Master');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($arca_info != false && $arca_info['G_Name'] != '' && $arca_info['G_Name'] != null){ echo $arca_info['G_Master']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-center pt-10" colspan="2">
                                            <span class="text-white"><?php echo __('Registered');?>:<br/></span>
                                            <?php 
                                            if(!empty($arcaGuilds)){ 
                                                foreach($arcaGuilds AS $aguild){
                                            ?>
                                            <a><?php echo $aguild['G_Name'];?></a>
                                            <?php }} else{ ?>
                                            <a><?php echo __('No guilds registered');?></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <script type="text/javascript">
                                <?php $arcatime = new DateTime(REALMU_V2_VARS['arca_day']); ?>
                                $(document).ready(function () {
                                    App.castleSiegeCountDown("arca_1_time_<?php echo $key;?>", <?php echo $arcatime->modify(REALMU_V2_VARS['arca_add_hours'])->getTimestamp(); ?>, <?php echo time();?>);
                                });
                            </script>
                            <?php
                                $i++;
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="fs-17 text-center text-white-50 px-20 pb-20 pt-0 w-100">
                        <hr/>
                        <?php 
                        $i = 0;
                        foreach($serverList as $key => $server){ 
                        if($server['visible'] == 1){
                        ?>
                        <div id="next-arca-1-<?php echo $key;?>" class="fs-17 text-center mt-0 pb-0 text-white-50" <?php if($i != 0){ echo 'style="display:none;"'; } ?>><?php echo __('Next Battle');?>: <span id="arca_1_time_<?php echo $key;?>"></span></div>
                        <?php 
                            $i++;
                        }
                        } 
                        ?>
                    </div>
                    <script>
                    $(document).ready(function () {
                        $("#arca-1-server-switch").on('change', function (e) {
                            e.preventDefault();
                            var serv =  $(this).find(":selected").val();
                            $('[id^="arca-1-details-"]').hide();
                            $('[id^="next-arca-1-"]').hide();
                            $('#arca-1-details-'+serv).show();
                            $('#next-arca-1-'+serv).show();	
                        });
                    });
                    </script>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 mb-20">
                <div class="w-100 bg-light-dark">
                    <div class="py-20 px-20 w-100 pb-0">
                        <h5 class="sidebox-title text-white h5 mb-0" style="display:flex;">
                            <span><?php echo __('Arka War');?> <sup class="text-light font-theme">(<?php echo __('Obelisk');?> 2)</sup></span>
                            <?php if(count($serverList) > 1){ ?>
                            <select id="arca-2-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-gray">
                            <?php foreach($serverList as $key => $server){ ?>
                                <option value="<?php echo $key; ?>"><?php echo $server['title']; ?></option>
                            <?php } ?>
                            </select>
                            <?php } ?>
                        </h5>
                    </div>
                    <div class="vs-events d-lg-flex pb-0 mb-15-off mt-15-off">
                        <div class="media-body align-self-center py-20 px-20">
                            <?php
                            $i = 0;
                            foreach($serverList as $key => $server){
                            if($server['visible'] == 1){
                                $this->website->registry()->load->model('stats');
                                $arca_info = $this->website->registry()->Mstats->get_arca_winner_2($key);
                                $arcaGuilds = $this->website->arcaGuildList($key);
                                $arcaMark = str_repeat('1', 64);
                                if($arca_info != false){
                                    if($arca_info != false && $arca_info['G_Name'] != null){
                                        $arcaMark = urlencode(bin2hex($arca_info['G_Mark']));
                                    }
                                }

                            ?>
                            <div id="arca-2-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>
                                <table class="mb-0">
                                    <tr>
                                        <td rowspan="10" class="border-0 w-max-160 w-160px">
                                            <img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $arcaMark;?>/140" class="contour" alt="Guild Image">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Status');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($arca_info != false && $arca_info['G_Name'] != '' && $arca_info['G_Name'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Guild');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($arca_info != false && $arca_info['G_Name'] != '' && $arca_info['G_Name'] != null){ echo $arca_info['G_Name']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="py-0 border-0"><span class="text-white"><?php echo __('Master');?>:</span></td>
                                        <td class="px-0 py-0 border-0"><?php if($arca_info != false && $arca_info['G_Name'] != '' && $arca_info['G_Name'] != null){ echo $arca_info['G_Master']; } else { echo __('None'); } ?></td>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-center pt-10" colspan="2">
                                            <span class="text-white"><?php echo __('Registered');?>:<br/></span>
                                            <?php 
                                            if(!empty($arcaGuilds)){ 
                                                foreach($arcaGuilds AS $aguild){
                                            ?>
                                            <a><?php echo $aguild['G_Name'];?></a>
                                            <?php }} else{ ?>
                                            <a><?php echo __('No guilds registered');?></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <script type="text/javascript">
                                <?php $arcatime = new DateTime(REALMU_V2_VARS['arca_day']); ?>
                                $(document).ready(function () {
                                    App.castleSiegeCountDown("arca_2_time_<?php echo $key;?>", <?php echo $arcatime->modify(REALMU_V2_VARS['arca_add_hours'])->getTimestamp(); ?>, <?php echo time();?>);
                                });
                            </script>
                            <?php
                                $i++;
                            }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="fs-17 text-center text-white-50 px-20 pb-20 pt-0 w-100">
                        <hr/>
                        <?php 
                        $i = 0;
                        foreach($serverList as $key => $server){
                        if($server['visible'] == 1){                            
                        ?>
                        <div id="next-arca-2-<?php echo $key;?>" class="fs-17 text-center mt-0 pb-0 text-white-50" <?php if($i != 0){ echo 'style="display:none;"'; } ?>><?php echo __('Next Battle');?>: <span id="arca_2_time_<?php echo $key;?>"></span></div>
                        <?php 
                            $i++;
                        }
                        } 
                        ?>
                    </div>
                    <script>
                    $(document).ready(function () {
                        $("#arca-2-server-switch").on('change', function (e) {
                            e.preventDefault();
                            var serv =  $(this).find(":selected").val();
                            $('[id^="arca-2-details-"]').hide();
                            $('[id^="next-arca-2-"]').hide();
                            $('#arca-2-details-'+serv).show();
                            $('#next-arca-2-'+serv).show();	
                        });
                    });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="vs-streams-wrapper bg-light-dark">
    <div class="container pt-60 pb-40">
        <div class="row align-items-center mb-25-off">
            <div class="col-lg-5 col-xl-6 text-center text-lg-start">
                <div class="section-title">
                    <h2 class="sec-title2 text-white font-theme3"><?php echo __('Rankings');?></h2>
                </div>
            </div>
        </div>
        <div class="position-relative arrow-wrap">
            <div id="slideStrem" class="vs-carousel z-index-common arrow-margin arrow-white" data-slide-show="1" data-arrows="true" data-speed="2000" data-infinite="false">
                <?php $ranking_config = $this->config->values('rankings_config'); ?>
                <div class="position-relative">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-25">
                            <div class="vs-sidebox bg-major-black">
                                <h3 class="sidebox-title text-white h5 mt-10-sm" style="display:flex;">
                                    <span><?php echo __('Top Players');?></span>
                                    <?php if(count($serverList) > 1){ ?>
                                    <select id="players-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-dark">
                                    <?php foreach($serverList as $key => $server){ ?>
                                        <option value="<?php echo $key; ?>" data-count="40"><?php echo $server['title']; ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php } ?>
                                </h3>
                                <?php
                                foreach($ranking_config AS $srv => $data){
                                    if($data['active'] == 1){
                                        if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
                                            echo '<script>
                                                    $(document).ready(function () {
                                                        App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
                                                    });
                                                </script>
                                                <div id="top_players"></div>';
                                        }
                                    }
                                    break;
                                }
                                ?>
                                <script>
                                $(document).ready(function () {
                                    $("#players-server-switch").on('change', function (e) {
                                        e.preventDefault();
                                        var serv =  $(this).find(":selected").val();
                                        var count_in_sidebar = $(this).find(":selected").data('count');
                                        App.populateSidebarRanking('players', serv, count_in_sidebar);	
                                    });
                                });
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-25 d-xs-none d-sm-block">
                            <div class="vs-sidebox bg-major-black">
                                <h3 class="sidebox-title text-white h5 mt-10-sm" style="display:flex;">
                                    <span><?php echo __('Top Duels');?></span>
                                    <?php if(count($serverList) > 1){ ?>
                                    <select id="duels-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-dark">
                                    <?php foreach($serverList as $key => $server){ ?>
                                        <option value="<?php echo $key; ?>" data-count="40"><?php echo $server['title']; ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php } ?>
                                </h3>
                                <?php
                                foreach($ranking_config AS $srv => $data){
                                    if($data['active'] == 1){
                                        if(isset($data['duels']) && $data['duels']['is_sidebar_module'] == 1){
                                            echo '<script>
                                                    $(document).ready(function () {
                                                        App.populateSidebarRanking(\'duels\', \'' . $srv . '\', ' . $data['duels']['count_in_sidebar'] . ');
                                                    });
                                                </script>
                                                <div id="top_duels"></div>';
                                        }
                                    }
                                    break;
                                }
                                ?>
                                <script>
                                $(document).ready(function () {
                                    $("#duels-server-switch").on('change', function (e) {
                                        e.preventDefault();
                                        var serv =  $(this).find(":selected").val();
                                        var count_in_sidebar = $(this).find(":selected").data('count');
                                        App.populateSidebarRanking('duels', serv, count_in_sidebar);	
                                    });
                                });
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-25 d-xs-none d-sm-none d-md-none d-lg-block">
                            <div class="vs-sidebox bg-major-black">
                                <h3 class="sidebox-title text-white h5 mt-10-sm" style="display:flex;">
                                    <span><?php echo __('Top Killers');?></span>
                                    <?php if(count($serverList) > 1){ ?>
                                    <select id="killer-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-dark">
                                    <?php foreach($serverList as $key => $server){ ?>
                                        <option value="<?php echo $key; ?>" data-count="40"><?php echo $server['title']; ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php } ?>
                                </h3>
                                <?php
                                foreach($ranking_config AS $srv => $data){
                                    if($data['active'] == 1){
                                        if(isset($data['killer']) && $data['killer']['is_sidebar_module'] == 1){
                                            echo '<script>
                                                    $(document).ready(function () {
                                                        App.populateSidebarRanking(\'killer\', \'' . $srv . '\', ' . $data['killer']['count_in_sidebar'] . ');
                                                    });
                                                </script>
                                                <div id="top_killer"></div>';
                                        }
                                    }
                                    break;
                                }
                                ?>
                                <script>
                                $(document).ready(function () {
                                    $("#killer-server-switch").on('change', function (e) {
                                        e.preventDefault();
                                        var serv =  $(this).find(":selected").val();
                                        var count_in_sidebar = $(this).find(":selected").data('count');
                                        App.populateSidebarRanking('killer', serv, count_in_sidebar);	
                                    });
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="position-relative">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-25">
                            <div class="vs-sidebox bg-major-black">
                                <h3 class="sidebox-title text-white h5 mt-10-sm" style="display:flex;">
                                    <span><?php echo __('Top Gens');?></span>
                                    <?php if(count($serverList) > 1){ ?>
                                    <select id="gens-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-dark">
                                    <?php foreach($serverList as $key => $server){ ?>
                                        <option value="<?php echo $key; ?>" data-count="40"><?php echo $server['title']; ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php } ?>
                                </h3>
                                <?php
                                foreach($ranking_config AS $srv => $data){
                                    if($data['active'] == 1){
                                        if(isset($data['gens'])){
                                            echo '<script>
                                                    $(document).ready(function () {
                                                        App.populateSidebarRanking(\'gens\', \'' . $srv . '\', 40);
                                                    });
                                                </script>
                                                <div id="top_gens"></div>';
                                        }
                                    }
                                    break;
                                }
                                ?>
                                <script>
                                $(document).ready(function () {
                                    $("#gens-server-switch").on('change', function (e) {
                                        e.preventDefault();
                                        var serv =  $(this).find(":selected").val();
                                        var count_in_sidebar = $(this).find(":selected").data('count');
                                        App.populateSidebarRanking('gens', serv, count_in_sidebar);	
                                    });
                                });
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-25 d-xs-none d-sm-block">
                            <div class="vs-sidebox bg-major-black">
                                <h3 class="sidebox-title text-white h5 mt-10-sm" style="display:flex;">
                                    <span><?php echo __('Top Guilds');?></span>
                                    <?php if(count($serverList) > 1){ ?>
                                    <select id="guilds-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-dark">
                                    <?php foreach($serverList as $key => $server){ ?>
                                        <option value="<?php echo $key; ?>" data-count="40"><?php echo $server['title']; ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php } ?>
                                </h3>
                                <?php
                                foreach($ranking_config AS $srv => $data){
                                    if($data['active'] == 1){
                                        if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                                            echo '<script>
                                                    $(document).ready(function () {
                                                        App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
                                                    });
                                                </script>
                                                <div id="top_guilds"></div>';
                                        }
                                    }
                                    break;
                                }
                                ?>
                                <script>
                                $(document).ready(function () {
                                    $("#guilds-server-switch").on('change', function (e) {
                                        e.preventDefault();
                                        var serv =  $(this).find(":selected").val();
                                        var count_in_sidebar = $(this).find(":selected").data('count');
                                        App.populateSidebarRanking('guilds', serv, count_in_sidebar);	
                                    });
                                });
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-25 d-xs-none d-sm-none d-md-none d-lg-block">
                            <div class="vs-sidebox bg-major-black">
                                <h3 class="sidebox-title text-white h5 mt-10-sm" style="display:flex;">
                                    <span><?php echo __('Top Guild War');?></span>
                                    <?php if(count($serverList) > 1){ ?>
                                    <select id="gw-server-switch" style="margin-left: auto;width: auto;border-radius: 0;" class="form-control text-white has-border register bg-light-dark">
                                    <?php foreach($serverList as $key => $server){ ?>
                                        <option value="<?php echo $key; ?>" data-count="40"><?php echo $server['title']; ?></option>
                                    <?php } ?>
                                    </select>
                                    <?php } ?>
                                </h3>
                                <?php
                                foreach($ranking_config AS $srv => $data){
                                    if($data['active'] == 1){
                                        if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                                            echo '<script>
                                                    $(document).ready(function () {
                                                        App.populateSidebarRanking(\'gw\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
                                                    });
                                                </script>
                                                <div id="top_gw"></div>';
                                        }
                                    }
                                    break;
                                }
                                ?>
                                <script>
                                $(document).ready(function () {
                                    $("#gw-server-switch").on('change', function (e) {
                                        e.preventDefault();
                                        var serv =  $(this).find(":selected").val();
                                        var count_in_sidebar = $(this).find(":selected").data('count');
                                        App.populateSidebarRanking('gw', serv, count_in_sidebar);	
                                    });
                                });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php if(isset(REALMU_V2_VARS['guides'])){ ?>
<div class="vs-video-area bg-dark pt-60 newsletter-medium-pb" data-bg-src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/cover_page.jpg">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-auto text-center text-md-start">
                <div class="section-title2">
                    <span class="sub-title3 text-default"><?php echo __('Tutorials');?></span>
                    <h2 class="sec-title2 text-white font-theme3"><?php echo __('Game Guides');?></h2>
                </div>
            </div>
            <div class="col-auto mt-3 d-none d-md-block">
                <a href="<?php echo $this->config->base_url; ?>guides" class="vs-btn2 gradient-btn"><?php echo __('See All'); ?></a>
            </div>
        </div>
        <div class="row vs-carousel z-index-common arrow-margin arrow-white" data-slide-show="3" data-md-slide-show="2" data-sm-slide-show="2" data-xs-slide-show="1" data-arrows="true">
            <?php foreach(REALMU_V2_VARS['guides'] AS $guides){ ?>
            <div class="col-lg-4">
                <div class="vs-blog position-relative mb-25 pl-25">
                    <div class="blog-image image-scale-hover">
                        <a><img src="<?php echo $guides['thumb_image'];?>"></a>
                        <div class="position-absolute top-0 end-0 pt-20 pr-20"><a href="<?php echo $guides['video_url'];?>" class="popup-video play-btn style-white"><i class="fas fa-play"></i></a></div>
                    </div>
                    <div class="blog-content mt-15">
                        <h5 class="blog-title text-white font-theme h5">
                            <a href="#"><?php echo $guides['title'];?></a>
                        </h5>
                        <div class="blog-meta text-light2 fs-xs">
                            <a href="#"><i class="fas fa-calendar-alt"></i><?php echo $guides['date'];?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php } ?>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>