<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Media'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Wallpapers'); ?></h2>
				</div>	
			</div>	
			<?php if(isset($error)){ ?>
			<div class="row">
				<div class="col-lg-12">     
					<div class="alert alert-primary"><?php echo $error; ?></div>
				</div>	
			</div>		
			<?php } ?>
			<div class="row">
				<div class="col-lg-12">     
					 <script type="text/javascript">
						$(document).ready(function () {
							$('.thumbnail a').colorbox({
								rel: 'thumbnail a',
								transition: "elastic",
								maxWidth: "95%",
								maxHeight: "95%"
							});
						});
					</script>
					<div class="d-flex justify-content-center align-items-center">
						<ul class="thumbnails wallpapers">
						<?php
							if(isset($gallery)){
								foreach($gallery as $key => $value){
									echo '<li id="image-' . $value['id'] . '" class="thumbnail">
											<a style="background:url(' . $this->config->base_url . 'assets/uploads/thumb/' . $this->website->strstr_alt($value['name'], '.', true) . '_thumb' . $this->website->strstr_alt($value['name'], '.', false) . ');" href="' . $this->config->base_url . 'assets/uploads/normal/' . $value['name'] . '"><img class="grayscale" src="' . $this->config->base_url . 'assets/uploads/thumb/' . $this->website->strstr_alt($value['name'], '.', true) . '_thumb' . $this->website->strstr_alt($value['name'], '.', false) . '" alt=""></a>
										  </li>';
								}
							}
						?>
						</ul>
					</div>
				</div>	
			</div>
			 <?php if(isset($pagination)){ ?>
			<div class="row mb-4">
				<div class="col-lg-12">     
					 <div class="d-flex justify-content-center align-items-center"><?php echo $pagination; ?></div>
				</div>	
			</div>
			<?php } ?>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>