<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title font-theme h4 mt-25-sm mb-5-off d-flex justify-content-between">
				<h2><?php echo __('History'); ?></h2>
				<span>
					<?php
					foreach($this->website->server_list() as $key => $server){
						if($server['visible'] == 1 && $key != $def_server){
					?>
					<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>market/index/1/<?php echo $key; ?>"><?php echo $server['title']; ?> <?php echo __('Market'); ?></a>
					<?php
						}
					}
					?>
				</span>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12 d-flex justify-content-between">     
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
						<script>
							$(document).ready(function () {
								$('span[id^="market_item_"]').each(function () {
									App.initializeTooltip($(this), true, 'warehouse/item_info_image');
								});
							});
						</script>
						<?php if(isset($items) && !empty($items)){ ?>
							<table class="table dmn-rankings-table table-striped">
								<thead>
								<tr>
									<th class="text-center">#</th>
									<th><?php echo __('Item'); ?></th>
									<th><?php echo __('Price'); ?></th>
									<th><?php echo __('Status'); ?></th>
								</tr>
								</thead>
								<tbody>
								<?php
									foreach($items as $item){
										$status = '<a href="' . $this->config->base_url . 'market/remove/' . $item['id'] . '">' . __('Remove') . '</a>';
										if($item['sold'] == 1){
											$status = __('Sold');
										} 
										if($item['removed'] == 1){
											$status = __('Removed');
										} 
										?>
										<tr>
											<td class="text-center"><?php echo $item['pos']; ?></td>
											<td><span id="market_item_<?php echo $item['pos']; ?>" data-info="<?php echo $item['item']; ?>"><?php echo $item['name']; ?></span>
											</td>
											<td><?php echo $item['price']; ?></td>
											<td><?php echo $status; ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							<?php if(isset($pagination)){ ?>
							<div class="d-flex justify-content-center align-items-center"><?php echo $pagination; ?></div>
							<?php }?>
						<?php } else{ ?>
							<div class="alert alert-warning" role="alert"><?php echo __('No Items Found.'); ?></div>
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