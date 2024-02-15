<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>

	<div class="container">
		<div class="topBlock">
			<div class="sliderHome">
				<div class="slick-slider">
					<div class="slide">
						<a href="#" class="slide-link bright">
							<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/video-img.jpg" alt="">
						</a>
					</div>
					<div class="slide">
						<a href="#" class="slide-link bright">
							<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/video-img.jpg" alt="">
						</a>
					</div>
					<div class="slide">
						<a href="#" class="slide-link bright">
							<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/video-img.jpg" alt="">
						</a>
					</div>
					<div class="slide">
						<a href="#" class="slide-link bright">
							<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/video-img.jpg" alt="">
						</a>
					</div>
				</div>
			</div><!--sliderHome-->
			<div class="lastTopicks tabs">
				<div class="lastTopicks-title flex-s-c">
					<span class="lastTopicks-title_t"><?php echo __('Last News');?></span>
					<ul class="tabs-caption lastTopicks-tab flex-c">
						<li class="active"><?php echo __('News');?></li>
						<li><?php echo __('Announcement');?></li>
						<li><?php echo __('Updates');?></li>
						<li><?php echo __('Events');?></li>
					</ul>
				</div><!--lastTopicks-->
				<div class="lastTopicks-content tabs-content active">
					<ul class="lastNews">
						<?php 
						foreach($this->Mhome->load_news_by_type(1) as $key => $article){ 
						?>
							<li><span class="news-tag color-yellow">[<?php echo __('News');?>]</span> <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></li>
						<?php
						}
						?>
					</ul>
				</div><!--tabs-content-->
				<div class="lastTopicks-content tabs-content">
					<ul class="lastNews">
						<?php 
						foreach($this->Mhome->load_news_by_type(2) as $key => $article){ 
						?>
							<li><span class="news-tag color-yellow">[<?php echo __('Announcement');?>]</span> <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></li>
						<?php
						}
						?>
					</ul>
				</div><!--tabs-content-->
				<div class="lastTopicks-content tabs-content">
					<ul class="lastNews">
						<?php 
						foreach($this->Mhome->load_news_by_type(3) as $key => $article){ 
						?>
							<li><span class="news-tag color-green">[<?php echo __('Event');?>]</span> <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></li>
						<?php
						}
						?>
					</ul>
				</div><!--tabs-content-->
				<div class="lastTopicks-content tabs-content">
					<ul class="lastNews">
						<?php 
						foreach($this->Mhome->load_news_by_type(4) as $key => $article){ 
						?>
							<li><span class="news-tag color-orange">[<?php echo __('Update');?>]</span> <a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a></li>
						<?php
						}
						?>
					</ul>
				</div><!--tabs-content-->
			</div>
		</div><!--topBlock-->
	</div><!--container-->
	<div class="newBlock">
		<div class="container container-new">
			<div class="newBlock">
				<div class="hero"></div>
				<div class="newBlock-info">
					<div class="newBlock-title">
						NEW ERA <span>BEGIN...</span>
					</div>
					<div class="newBlock-text">
						Collect the Elemental Symbols from the elemental monsters in Gray Aida And combine them into Superior Pentagram and Mastery Parts.
					</div>
				</div>
				<div class="buttonPlay">
					<a href="<?php echo $this->config->base_url; ?>registration" class="button button-blue"><span><?php echo __('Play Now');?></span></a>
				</div>
			</div><!--newBlock-->
		</div><!--container-->
		<div class="dark-fon"></div>
	</div><!--newBlock-->
	<div class="mediaBlock">
		<div class="container">
			<div class="mediaBlock-title"><span><?php echo __('Media');?></span></div>
			<?php 
				$media = $this->website->load_wallpapers_shoots(3);
				$imgPos = 0;
				if($media != false){
				?>
				<div class="mediaBlock-images">
					<?php 
					foreach($media AS $image){ 
						$class = ($imgPos % 2) ? 'media-img media-img-center' : 'media-img';
					?>
					<a href="<?php echo $this->config->base_url . 'assets/uploads/normal/' . $image['name']; ?>" class="<?php echo $class;?>"><img src="<?php echo $this->config->base_url . 'assets/uploads/thumb/' . $this->website->strstr_alt($image['name'], '.', true) . '_thumb' . $this->website->strstr_alt($image['name'], '.', false); ?>" alt=""></a>
					<?php 
						$imgPos++;
					} 
					?>
				</div>
				<?php
				}
				else{
				?>
				<div class="alert alert-warning" role="alert" style="margin-top:10px;"><?php echo __('No media images.');?></div>
				<?php
				}
				?>
		</div><!--container-->
	</div><!--mediaBlock-->
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>