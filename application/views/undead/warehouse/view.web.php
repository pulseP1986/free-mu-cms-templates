<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Web Warehouse'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('View & Move your items'); ?>
						<div class="float-right">
							<a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>warehouse"><?php echo __('Warehouse'); ?></a>
							<a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market'); ?></a>
							<a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>market/history"><?php echo __('History'); ?></a>
						</div>
					</h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12">   
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
									<td class="text-center">#</td>
									<td><?php echo __('Item'); ?></td>
									<td><?php echo __('Expires On'); ?></td>
									<td><?php echo __('Action'); ?></td>
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