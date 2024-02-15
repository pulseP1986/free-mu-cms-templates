<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="last-news">
	<h2 class="title-block">
		<?php echo __('Lattest');?> <span><?php echo __('News');?></span>
	</h2>
	<div class="last-news-block flex-s-c">
		<?php
		if(empty($news)){
			echo '<div class="alert alert-info">' . __('No News Articles') . '</div>';
		} else {
			if(isset($news[0])) { 
		?>
		<div class="main-news">
			<p class="datetime"><?php echo date("d.m.Y", $news[0]['time']);?> <?php echo __('at');?> <?php echo date("H:i", $news[0]['time']);?></p>
			<h3 class="news-title">
				<?php echo $news[0]['title'];?>
			</h3>
			<p class="news-content">
				<?php echo $this->website->set_limit(strip_tags(str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $news[0]['content']))))), 200, '...'); ?>
			</p>
			<a href="<?php echo $news[0]['url'];?>" class="btnw read-more-btn"><?php echo __('Read More');?></a>
		</div>
        <?php 
			}
		?>
		<div class="side-news-block flex-s-c">	
		<?php
			$i = 1;
			foreach($news as $key => $article){
				if($key == 0){
					continue; 
				}
		?>
			<div class="side-news flex">
				<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/side-news-image-<?php echo $i;?>.jpg" alt="">
				<div class="side-news-info">
					<p class="datetime"><?php echo date("d.m.Y", $article['time']);?> <?php echo __('at');?> <?php echo date("H:i", $article['time']);?></p>
					<h3 class="news-title">
						<?php echo $article['title'];?>
					</h3>
					<p class="news-content">
						<?php echo $this->website->set_limit(strip_tags(str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content']))))), 100, '...'); ?>
					</p>
					<a href="<?php echo $article['url'];?>" class="btnw read-more-btn"><?php echo __('Read More');?></a>
				</div>
			</div>
        <?php
				if($i >= 3){
					break;
				}
				$i++;
			}
		?>
		</div>
		<?php } ?>
	</div>
	<?php
	if(isset($pagination)){
	?>
	<div class="d-flex justify-content-center align-items-center text-center col-12 mt-2"><?php echo $pagination; ?></div>
	<?php		
	} 
	?>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>