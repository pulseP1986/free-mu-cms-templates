<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title font-theme h4 mt-25-sm mb-5-off" style="display:flex;justify-content: space-between;">
				<h2><?php echo __('Web Warehouse'); ?></h2>
				<span>
					<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>warehouse"><?php echo __('Warehouse'); ?></a>
					<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market'); ?></a>
					<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>market/history"><?php echo __('History'); ?></a>		
				</span>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">   
					<div class="alert alert-info"><?php echo __('Here are stored items moved from game and items earned in market.');?></div>
					<div class="alert alert-info"><?php echo __('Items which expire will be deleted permanently');?></div>					
					<?php
					if(isset($error)){
						echo '<div class="alert alert-danger">' . $error . '</div>';
					} else{
					?>
					<script>
						$(document).ready(function () {
							$('span[id^="web_wh_item_"]').each(function () {
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
									<th><?php echo __('Expires On'); ?></th>
									<th><?php echo __('Action'); ?></th>
								</tr>
							</thead>
							<tbody>
							<?php
							foreach($items as $item){
							?>
								<tr id="wh_items_<?php echo $item['id']; ?>">
									<td class="text-center"><?php echo $item['pos']; ?></td>
									<td><span id="web_wh_item_<?php echo $item['pos']; ?>" data-info="<?php echo $item['item']; ?>"><a href="#"><?php echo $item['name']; ?></a></span></td>
									<td><?php echo date(DATETIME_FORMAT, $item['expires_on']); ?></td>
									<td><a href="javascript:;" id="move_to_game_wh_<?php echo $item['id']; ?>" data-id="<?php echo $item['id']; ?>"><?php echo __('Move To Warehouse'); ?></a> </td>
								</tr>
							<?php
							}
							?>
							</tbody>
						</table>
						<?php
						if(isset($pagination)){
							echo $pagination;
						}
					}
					else{
					?>
						<div class="alert alert-warning" role="alert"><?php echo __('No Items Found.'); ?></div>
					<?php
					}
				}
				?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>