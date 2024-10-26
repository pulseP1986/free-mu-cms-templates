<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php if(empty($error)){ echo $news['title']; } else{ echo 'Undefined'; } ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row" style="margin-left: 0px;margin-right:0px;">
				<div class="col-lg-12">   
					<div class="mt-2"></div>
					<?php
					if(!empty($error)){
						echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
					}
					if(!empty($news)){
					?>	
					<div class="row">
						<div class="col-lg-12"><?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $news['news_content_full']))); ?></div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="float-right"><?php echo __('Posted'); ?> <?php echo date(DATE_FORMAT, $news['time']);?></div>
						</div>
					</div>
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