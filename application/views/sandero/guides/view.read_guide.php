<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header', ['guides' => $guides]);
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php if(empty($error)){ echo $guide['title']; } else{ echo 'Undefined'; } ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<?php
					if(!empty($error)){
						echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
					}
					if(!empty($guide)){
					?>	
					<div class="row">
						<div class="col-12"><?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $guide['text']))); ?></div>
					</div>
					<div class="row">
						<div class="col-12">
							<div class="float-right"><?php echo __('Posted'); ?> <?php echo date(DATE_FORMAT, strtotime($guide['date'])); ?></div>
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