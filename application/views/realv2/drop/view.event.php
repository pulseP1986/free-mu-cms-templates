<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Drops'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">   
					<?php 
					if(!empty($error)){
						echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
					} 
					?>	
					<h2 class="title"><?php echo __('List available drops'); ?></h2>
					<div class="mb-5">
						<div class="text-center">
						<?php if($config['drop_by_map'] == 1){ ?>
						<script>
						$(document).ready( function() {
						   $('#mapdrop').on('change', function(){
								location.href = $(this).val();
						   });							   
						});
						</script>
						<select class="form-control bg-light-dark text-white has-border py-18 register" style="display: inline-block;width: 180px;" id="mapdrop">
							<option><?php echo __('Map Drops');?></option>
							<?php $maps = $this->website->get_map_name(0, true);?>
							<?php foreach($maps AS $id => $map){ ?>
							<option value="<?php echo $this->config->base_url;?>drop/location/<?php echo urlencode($map);?>"><?php echo __($map);?></option>
							<?php } ?>
						</select>	
						<?php } ?>
						<?php if($config['drop_by_monster'] == 1){ ?>
						<script>
						$(document).ready( function() {
						   $('#monsterdrop').on('change', function(){
								location.href = $(this).val();
						   });							   
						});
						</script>
						<select class="form-control bg-light-dark text-white has-border py-18 register" style="display: inline-block;width: 180px;" id="monsterdrop">
							<option><?php echo __('Monster Drops');?></option>
							<?php foreach($monsters AS $id => $info){ ?>
							<option value="<?php echo $this->config->base_url;?>drop/monster/<?php echo $id;?>-<?php echo $this->website->seo_string($info);?>"><?php echo __($info);?></option>
							<?php } ?>
						</select>		
						<?php } ?>
						<?php if($config['drop_by_event'] == 1){ ?>
						<script>
						$(document).ready( function() {
						   $('#eventdrop').on('change', function(){
								location.href = $(this).val();
						   });							   
						});
						</script>
						<select class="form-control bg-light-dark text-white has-border py-18 register" style="display: inline-block;width: 180px;" id="eventdrop">
							<option><?php echo __('Event Drops');?></option>
							<?php foreach($events AS $id => $info){ ?>
							<option value="<?php echo $this->config->base_url;?>drop/event/<?php echo $id;?>-<?php echo $this->website->seo_string($info);?>"><?php echo __($info);?></option>
							<?php } ?>
						</select>	
						<?php } ?>
						</div>
						<div class="mb-2"></div>
						<?php if(isset($drop_data)){ ?>
							<?php foreach($drop_data AS $monster => $drop){ ?>
							<div class="panel panel-default">
								<?php $info = explode('-', $monster); ?>
								<div class="panel-heading"><?php echo __('Rate');?>: <?php echo $info[0];?>%, <?php echo __('Item Count');?>: <?php echo $info[1];?></div>
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table dmn-rankings-table table-striped">
										<?php foreach($drop AS $key => $item){ ?>
											<tr>
												<td><a href="<?php echo $this->config->base_url;?>drop/item/<?php echo urlencode($item['name']);?>-c<?php echo $item['cat'];?>-i<?php echo $item['id'];?>"><?php echo $item['name'];?></a></td>
											</tr>
										<?php  } ?>
										</table>
									</div>
								</div>
							</div>
							<?php  } ?>
						<?php } else { ?>
						<div class="alert alert-danger">
							<?php echo __('Nothing found');?>
						</div>
						<?php } ?>
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