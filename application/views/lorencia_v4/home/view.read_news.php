<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php if(empty($error)){ echo $news['title']; } else{ echo 'Undefined'; } ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<?php
					if(!empty($error)){
						echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
					}
					if(!empty($news)){
					?>	
					<div class="row">
						<div class="col-12"><?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $news['news_content_full']))); ?></div>
					</div>
					<div class="row">
						<div class="col-12">
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