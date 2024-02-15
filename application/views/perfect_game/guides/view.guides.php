<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Guides'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Server Guides List'); ?></h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12">     
					<?php
                    if(empty($guides)){
                        echo '<div class="alert alert-primary" role="alert">' . __('No Guides Articles') . '</div>';
                    } else{
                    ?>
					<div class="list-group mb-4 additional-links">
					<?php foreach($guides as $key => $article){ ?>
					<div class="list-group-item-action"><a href="<?php echo $this->config->base_url; ?>guides/read/<?php echo $this->website->seo_string($article['title']); ?>/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></div>
					<?php } ?>
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