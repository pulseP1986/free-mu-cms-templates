<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="news">
	<div class="news-title">
		<?php echo __('Lattest');?> <span><?php echo __('News');?></span>
	</div>
        <?php
            if(empty($news)){
                echo '<div class="alert alert-info">' . __('No News Articles') . '</div>';
            } else {
        ?>
        <?php if(isset($news[0])) { ?>
		<div class="newsBlock" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/news-img-big.jpg);">
			<div class="newsBlock-date">
				<?php echo date("d", $news[0]['time']);?> <span><?php echo date("M", $news[0]['time']);?></span>
			</div>
			<div class="newsBlock-title">
				<a href="<?php echo $news[0]['url'];?>"><?php echo $news[0]['title'];?></a>
			</div>
			<div class="newsBlock-text">
				<?php echo str_replace('&quot;', '"', str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $news[0]['content'])))); ?>
			</div>
			<div class="newsBlock-button">
				<a href="<?php echo $news[0]['url'];?>" class="button button-white button-small"><?php echo __('Read More');?></a>
			</div>
		</div>
        <?php } ?>
        <div class="newsBlockFlex">
            <?php 
				$i = 0;
                foreach($news as $key => $article){
					if($key == 0){
						continue; 
					}
					$img = ($i++ % 2) ? 1 : 2;
            ?>
            <div class="newsBlock newsBlockSmall" style="background-image: url(<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/news-img-small_<?php echo $img;?>.jpg);">
                <div class="newsBlock-date">
                    <?php echo date("d", $article['time']);?> <span><?php echo date("M", $article['time']);?></span>
                </div>
                <div class="newsBlock-title">
                    <a href="<?php echo $article['url'];?>"><?php echo $article['title'];?></a>
                </div>
                <div class="newsBlock-button">
                    <a href="<?php echo $article['url'];?>" class="button button-white button-small">Read More</a>
                </div>
            </div>
        <?php
				}
			}
			if(isset($pagination)){
		?>
		<div class="d-flex justify-content-center align-items-center text-center col-12"><?php echo $pagination; ?></div>
		<?php		
			} 
		?>
    </div>
</div>	
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>