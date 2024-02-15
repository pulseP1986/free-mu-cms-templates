<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="headerdiv" class="bg1" style="margin-top: -86px;padding-bottom: 5px;">
	<div id="maindiv" style="margin-top: 0px;margin-bottom: 33px;">
		<div class="text-center" style="margin-bottom: 65px;"><img id="logo" src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/logo.png"></div>
		<div>
			<h1 style="font-family: Teko, sans-serif;color: rgb(255,255,255);margin-bottom: 40px;width: 100%;margin-top: 23px;"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/title-icon.png" style="margin-top: -4px;">&nbsp; NEWS</h1>
		</div>
		<div style="height: 100%;width: 100%;">
			<div class="card-group justify-content-center" style="width: 100%;">
				<?php 
				if(!empty($news)){
					foreach($news as $key => $article){ 
						$id = 'newsnotice';
						$color = '#b58245';
						if($article['type'] == 'Announcement'){
							$id = 'annonotice';
							$color = '#b541ab';
						}
						if($article['type'] == 'Update'){
							$id = 'updatenotice';
							$color = '#4373b5';
						}
				?>
					<div class="card" style="width: 100%;height: 100%;background: rgba(255,255,255,0);margin-right: 30px;">
						<div id="<?php echo $id;?>" style="width: 100%;height: 100%;">
							<div style="width: 100%;height: 219px;background: url('<?php echo $article['icon']; ?>') top / cover no-repeat;"></div>
							<div class="text-center" style="margin: 0;width: 100%;height: 100%;margin-right: 0px;margin-bottom: 0px;margin-left: 0px;margin-top: -13px;">
								<span style="background: <?php echo $color;?>;color: rgb(255,255,255);padding-right: 25px;padding-left: 25px;padding-bottom: 8px;padding-top: 8px;font-family: 'Source Sans Pro', sans-serif;"><?php echo $article['type']; ?></span>
							</div>
							<div style="margin-top: 35px;margin-bottom: 20px;margin-right: 20px;margin-left: 20px;">
								<a href="<?php echo $article['url']; ?>" class="btn btn-primary" role="button" id="text" style="width: 100%;height: 100%;background: rgba(0,123,255,0);border-style: none;font-family: 'Source Sans Pro', sans-serif;font-size: 17px;color: rgb(179,179,179);">[<?php echo date('m-d', $article['time']); ?>] <?php echo $article['title']; ?></a></div>
						</div>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div id="about-game" class="bg2" style="padding-bottom: 30px;">
        <div id="maindiv" style="margin-top: 0px;margin-bottom: 0px;">
            <div style="height: 100%;width: 100%;padding-bottom: 40px;">
                <h1 data-aos="fade-up" data-aos-duration="1750" data-aos-delay="250" id="text-middle" style="margin-bottom: 0px;font-family: Teko, sans-serif;font-size: 85px;letter-spacing: -1px;line-height: 80px;color: #6c4f27;">THE REMASTER OF A CLASSIC MMORPG</h1>
                <p data-aos="fade-up" data-aos-duration="1750" data-aos-delay="250" id="text-middle" style="margin-bottom: 0px;font-family: 'Teko', sans-serif;font-size: 31px;font-weight: 100;margin-top: 30px;color: rgb(82,82,82);line-height: 55px;">Enter a world fullfilled with adventures and battles. Choose your favorite class from the Classic's and join the Battle to defeat Kundum and conquer everything on the World of MU Online.<br></p>
            </div>
            <div id="slide" style="padding-bottom: 0px;width: 100%;height: 100%;margin-bottom: 53px;">
                <div class="carousel slide" data-ride="carousel" data-aos="fade-up" data-aos-duration="1750" data-aos-delay="250" id="carousel-1">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="width: 100%;height: 100%;">
                            <div class="card-group">
                                <div class="card" style="background: rgba(255,255,255,0);width: 100%;height: 359px;border-style: none;border-radius: 0px;">
                                    <div style="background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slide1.gif') top / cover no-repeat;width: 100%;height: 100%;box-shadow: 0px 0px;"></div>
                                </div>
                                <div class="card" id="slide-text" style="background: rgba(255,255,255,0);border-style: none;border-radius: 0px;padding-right: 0px;padding-top: 0px;width: 100%;height: 100%;">
                                    <h1 id="text2" style="font-family: Teko, sans-serif;font-size: 65px;margin-bottom: 0px;line-height: 65px;color: #6c4f27;">NEXT GEN OF GRAPHICS FOR PC AND MOBILE</h1>
                                    <div class="d-flex flex-grow-1 justify-content-end" id="storebuttons" style="padding-top: 0px;height: 100%;width: 100%;"><a class="btn btn-primary" role="button" id="playbutton2" href="<?php echo $this->config->base_url;?>downloads" style="padding-top: 23px;padding-bottom: 17px;padding-left: 19px;padding-right: 19px;margin-left: 0px;width: 100%;margin-top: 0px;height: 70.5px;border-radius: 0px;border-width: 0px;border-style: none;border-left-style: solid;border-left-color: rgb(79,79,79);"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp;<?php echo __('Windows');?></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="width: 100%;height: 100%;">
                            <div class="card-group">
                                <div class="card" style="background: rgba(255,255,255,0);width: 100%;height: 359px;border-style: none;border-radius: 0px;">
                                    <div style="background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slide2.gif') top / cover no-repeat;width: 100%;height: 100%;box-shadow: 0px 0px;"></div>
                                </div>
                                <div class="card" id="slide-text" style="background: rgba(255,255,255,0);border-style: none;border-radius: 0px;padding-right: 0px;padding-top: 0px;width: 100%;height: 100%;">
                                    <h1 id="text2" style="font-family: Teko, sans-serif;font-size: 65px;margin-bottom: 0px;line-height: 65px;color: #6c4f27;">START WITH YOUR FAVORITE CLASS IN MU</h1>
                                    <div class="d-flex flex-grow-1 justify-content-end" id="storebuttons" style="padding-top: 0px;height: 100%;width: 100%;"><a class="btn btn-primary" role="button" href="<?php echo $this->config->base_url;?>downloads" style="background: rgb(0,0,0);padding-top: 23px;padding-bottom: 17px;padding-left: 19px;padding-right: 19px;margin-left: 0px;width: 100%;margin-top: 0px;height: 70.5px;border-radius: 0px;border-style: none;border-left-style: solid;border-left-color: rgb(79,79,79);"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp;<?php echo __('Windows');?></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="width: 100%;height: 100%;">
                            <div class="card-group">
                                <div class="card" style="background: rgba(255,255,255,0);width: 100%;height: 359px;border-style: none;border-radius: 0px;">
                                    <div style="background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/slide3.gif') top / cover no-repeat;width: 100%;height: 100%;box-shadow: 0px 0px;"></div>
                                </div>
                                <div class="card" id="slide-text" style="background: rgba(255,255,255,0);border-style: none;border-radius: 0px;padding-right: 0px;padding-top: 0px;width: 100%;height: 100%;">
                                    <h1 id="text2" style="font-family: Teko, sans-serif;font-size: 65px;margin-bottom: 0px;line-height: 65px;color: #6c4f27;">BECOME THE STRONGEST AND CLAIM YOUR PLACE ON TOP</h1>
                                    <div class="d-flex flex-grow-1 justify-content-end" id="storebuttons" style="padding-top: 0px;height: 100%;width: 100%;"><a class="btn btn-primary" role="button" href="<?php echo $this->config->base_url;?>downloads" style="background: rgb(0,0,0);padding-top: 23px;padding-bottom: 17px;padding-left: 19px;padding-right: 19px;margin-left: 0px;width: 100%;margin-top: 0px;height: 70.5px;border-radius: 0px;border-style: none;border-left-style: solid;border-left-color: rgb(79,79,79);"><i class="fa fa-download" aria-hidden="true"></i>&nbsp; &nbsp; &nbsp;<?php echo __('Windows');?></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="margin-top: 0px;padding-top: 0px;"><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev" id="previous"><span class="carousel-control-prev-icon" style="background: #000000;border-radius: 0px;border-width: 0px;border-top-color: rgb(255,;border-right-color: 255,;border-bottom-color: 255);border-left-color: 255,;width: 60px;height: 50px;padding-top: 5px;"><i class="icon ion-ios-arrow-back" style="margin-top: 0px;padding-top: 0px;font-size: 25px;"></i></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next" id="next"><span class="carousel-control-next-icon" style="width: 60px;height: 50px;background: #000000;border-radius: 0px;padding-top: 5px;"><i class="icon ion-ios-arrow-forward" style="margin-top: 0px;padding-top: 0px;font-size: 25px;"></i></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators" style="height: 0px;width: 0px;">
                        <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-1" data-slide-to="1"></li>
                        <li data-target="#carousel-1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>
            
        </div>
    </div>
	<div style="padding-bottom: 56px;background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/bg3.png') top no-repeat;">
        <div id="maindiv" style="margin-top: 0px;margin-bottom: 0px;">
            <h1 data-aos="fade-up" data-aos-duration="1750" data-aos-delay="250" style="font-family: Teko, sans-serif;color: rgb(108,79,39);text-align: center;font-size: 57px;padding-top: 82px;margin-top: 25px;"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/title-icon.png" style="margin-top: -7px;">&nbsp; <?php echo __('EXPLORE MORE');?></h1>
            <div data-aos="fade-up" data-aos-duration="1750" data-aos-delay="250" style="margin-top: 58px;margin-bottom: 43px;">
                <div class="card-group">
                    <div class="card" style="background: rgba(255,255,255,0);border-style: none;">
                        <div class="text-center"><a href="<?php echo $this->config->base_url;?>guides" class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="border-style: none;border-radius: 260px;background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/explore-guides.png') top no-repeat;width: 100%;height: 260px;padding-top: 190px;font-family: 'Source Sans Pro', sans-serif;font-size: 22px;"><?php echo __('Guides');?></a></div>
                    </div>
                    <div class="card" style="background: rgba(255,255,255,0);border-style: none;">
                        <div class="text-center"><a href="<?php echo $this->config->base_url;?>market" class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="border-style: none;border-radius: 0px;background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/explore-items.png') top no-repeat;width: 100%;height: 260px;padding-top: 190px;font-family: 'Source Sans Pro', sans-serif;font-size: 22px;"><?php echo __('Market');?></a></div>
                    </div>
                    <div class="card" style="background: rgba(255,255,255,0);border-style: none;">
                        <div class="text-center"><a href="<?php echo $this->config->base_url;?>donate" class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="border-style: none;border-radius: 0px;background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/explore-boss.png') top no-repeat;width: 100%;height: 260px;padding-top: 190px;font-family: 'Source Sans Pro', sans-serif;font-size: 22px;"><?php echo __('Donate');?></a></div>
                    </div>
                    <div class="card" style="background: rgba(255,255,255,0);border-style: none;">
                        <div class="text-center"><a href="<?php echo $this->config->base_url;?>support" class="btn btn-primary" role="button" data-bss-hover-animate="pulse" style="border-style: none;border-radius: 0px;background: url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/explore-maps.png') top no-repeat;width: 100%;height: 260px;padding-top: 190px;font-family: 'Source Sans Pro', sans-serif;font-size: 22px;"><?php echo __('Support');?></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>