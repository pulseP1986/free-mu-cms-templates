<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('All News'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">   
					<?php if(!empty($news)){ ?>
						<ul class="vs-cat-list1">
						<?php foreach($news as $key => $article){ ?>
						<li>
							<a href="<?php echo $article['url']; ?>"><?php echo $article['title']; ?> <span class="cat-number text-white"><?php echo date('d M, Y', $article['time']); ?></span></a>
						</li>
						<?php } ?>
						</ul>
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