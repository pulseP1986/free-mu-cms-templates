<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<span class="h1"><?php echo _('News'); ?></span>
	<?php
	if (empty($news)):
		echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . _('No News Articles') . '</div></div>';
	else:
		foreach ($news as $key => $article):
	?>
	<div class="news">
	<div class="news-title">
		<a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?></a>
	</div>
	<div class="news-img">
		<a href="<?php echo $article['url']; ?>"><img src="<?php echo $article['icon'];?>" alt=""></a>
	</div>
	<div class="news-content">
		<?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $article['content']))); ?>
	</div>
	<div class="news-info flex-s-c">
		<div class="news-date">
			<span class="icon"><?php echo date('d', $article['time']); ?></span> <?php echo date('m / Y', $article['time']); ?>
		</div>
		<a href="<?php echo $article['url']; ?>" class="button button-medium">more</a>
	</div>
	</div>
	<?php
		endforeach;
	endif;
	if(isset($pagination)){
			echo $pagination;
	}

$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>