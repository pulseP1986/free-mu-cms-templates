<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('History'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12" style="display:flex;justify-content: space-between;">     
					<h2 class="title">
						<?php echo __('Market History'); ?>
					</h2>
					<span>
						<a class="vs-btn2 gradient-btn" href="<?php echo $this->config->base_url; ?>warehouse"><?php echo __('Warehouse'); ?></a>
						<a class="vs-btn2 gradient-btn" href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market'); ?></a>
					</span>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="mb-5">
						<?php
							if(isset($error)){
								echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
							}
							if(isset($success)){
								echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
							}
						?>
					</div>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>