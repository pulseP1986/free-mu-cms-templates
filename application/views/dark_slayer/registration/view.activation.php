<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Registration'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12"> 
					<?php if(isset($error)){ ?>
					<div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
					<?php } ?>
					<?php if(isset($success)){ ?>
					<div class="alert alert-success" role="alert"><?php echo $success; ?></div>
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