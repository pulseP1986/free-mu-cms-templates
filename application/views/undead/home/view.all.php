<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('NEWS');?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">   
					<?php if(!empty($news)){ ?>
						<?php foreach($news as $key => $article){ ?>
						<div class="pNewsBlock flex">
							<div class="pNewsBlock-img">
								<a href="<?php echo $article['url']; ?>" style="max-height:262px;overflow:hidden;"><img src="<?php echo $article['icon']; ?>" alt=""></a>
							</div>
							<div class="pNewsBlock-block">
								<div class="full-news_title pNewsBlock-block-title">
									<a href="<?php echo $article['url']; ?>" style="color:#f9b001"><?php echo $article['title']; ?></a>
								</div>
								<div class="pNewsBlock-block_text">
									<?php echo strip_tags(str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content'])))));?>
								</div>
								<div class="pNewsBlock-block_info flex-s-c">
									<div class="pNewsBlock-block_info-date">
										<span><?php echo date('d', $article['time']); ?></span> <?php echo date('M Y', $article['time']); ?>
									</div> 
									<div class="pNewsBlock-block_info-button">
										<a href="<?php echo $article['url']; ?>" class="button"><?php echo __('More');?></a>
									</div>
								</div>
							</div>
						</div><!--pNewsBlock-->
						<?php } ?>
					<?php } ?>
					<?php if(isset($pagination)){ ?>
					<div class="d-flex justify-content-center align-items-center text-center col-12 mt-2"><?php echo $pagination; ?></div>
					<?php } ?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>