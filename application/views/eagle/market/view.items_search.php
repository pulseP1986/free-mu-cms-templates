<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Market'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('Sell And Buy Items'); ?>
						<nav class="nav nav-pills justify-content-center float-right">
						<?php
						foreach($this->website->server_list() as $key => $server){
							if($server['visible'] == 1 && $key != $def_server){
						?>
						<a class="nav-item nav-link" href="<?php echo $this->config->base_url; ?>market/index/1/<?php echo $key; ?>"><?php echo $server['title']; ?> <?php echo __('Market'); ?></a>
						<?php
							}
						}
						?>
						</nav>
					</h2>
				</div>	
			</div>
			<div class="row">
				<div class="col-12">     
					<div class="float-right">
						<a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>warehouse"><?php echo __('Warehouse'); ?></a>
						<a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>market/history"><?php echo __('History'); ?></a>
					</div>
				</div>	
			</div>	
			<div class="row mt-1">
				<div class="col-3">
					<script>
					$(document).ready(function () {
						$('span[id^="market_item_"]').each(function () {
							App.initializeTooltip($(this), true, 'warehouse/item_info_image');
						});

						<?php
						$names = [];
						if(!empty($item_title_list)){
							foreach($item_title_list AS $key => $value){
								$names[] = $value['item_name'];
							}
						}
						?>

						var availableItems = <?php echo json_encode($names);?>;
						$("#item").autocomplete({
							source: availableItems
						});
					});
					</script>	
					<div class="dmn-sidebar-box">
						<?php if(!empty($item_title_list)){ ?>
							<form method="post" action="">
								<div class="form-group row justify-content-center align-items-center">
									<div class="col-sm-8">
									  <input type="text" class="form-control" name="item" id="item" placeholder="<?php echo __('Search Item'); ?>">
									</div>
									<div class="col-auto">
									  <button type="submit" class="btn btn-primary" name="search_item"><i class="fa fa-search" aria-hidden="true"></i></button>
									</div>
								</div>
							</form>
						<?php } ?>
						<form method="post" action="">
							<label style="font-weight: bold;margin:3px;font-size:12px;"><?php echo __('Items Level'); ?></label>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<?php for($i = 0; $i <= 15; $i++){ ?>
								<input type="checkbox" name="lvl[]"
									   value="<?php echo $i; ?>" <?php if(isset($_SESSION['filter']['lvl'])){
									foreach($_SESSION['filter']['lvl'] as $level){
										if($level == $i){
											echo 'checked="checked"';
										}
									}
								} ?>/> <?php echo $i; ?> <?php echo __('LVL');?><br/>
							<?php } ?>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<label style="font-weight: bold;margin:3px;font-size:12px;"><?php echo __('Items Options'); ?></label>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<input type="checkbox" name="luck" value="1" <?php if(isset($_SESSION['filter']['luck'])){ echo 'checked="checked"';
							} ?>/> <?php echo __('Item Luck'); ?><br/>
							<input type="checkbox" name="skill" value="1" <?php if(isset($_SESSION['filter']['skill'])){ echo 'checked="checked"'; } ?>/> <?php echo __('Item Skill'); ?><br/>
							<input type="checkbox" name="ancient" value="1" <?php if(isset($_SESSION['filter']['ancient'])){ echo 'checked="checked"'; } ?>/> <?php echo __('Item Ancient'); ?><br/>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<label style="font-weight: bold;margin:3px;font-size:12px;"><?php echo __('Items Excellent'); ?></label>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<?php
							$exe_count = (defined('MU_VERSION') && MU_VERSION >= 5) ? 9 : 6;
							for($i = 1; $i <= $exe_count; $i++){
							?>
								<input type="checkbox" name="excellent[]"  value="<?php echo $i; ?>" <?php if(isset($_SESSION['filter']['excellent'])){
										foreach($_SESSION['filter']['excellent'] as $exe){
											if($exe == $i){
												echo 'checked="checked"';
											}
										}
									} ?>/> <?php echo __('Excellent'); ?><?php echo $i; ?>
									<br/>
							<?php } ?>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<label style="font-weight: bold;margin:3px;font-size:12px;"><?php echo __('Items Category'); ?></label>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<?php if(isset($_SESSION['filter']['cat'])){
								echo $this->webshop->load_cat_list_table($_SESSION['filter']['cat']);
							} else{
								echo $this->webshop->load_cat_list_table();
							} ?>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<label style="font-weight: bold;margin:3px;font-size:12px;"><?php echo __('Items For Class'); ?></label>
							<div style="border-bottom:1px solid gray;width: 90%;margin:5px;display:block;"></div>
							<input type="radio" name="class" value="sm" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'sm'){ echo 'checked="checked"'; } ?>/> <?php echo __('Wizards');?><br/>
							<input type="radio" name="class" value="bk" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'bk'){ echo 'checked="checked"'; } ?>/> <?php echo __('Knights');?><br/>
							<input type="radio" name="class" value="me" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'me'){ echo 'checked="checked"'; } ?>/> <?php echo __('Elfs');?><br/>
							<input type="radio" name="class" value="mg" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'mg'){ echo 'checked="checked"'; } ?>/> <?php echo __('Gladiators');?><br/>
							<input type="radio" name="class" value="dl" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'dl'){ echo 'checked="checked"'; } ?>/> <?php echo __('Lords');?><br/>
							<input type="radio" name="class" value="bs" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'bs'){ echo 'checked="checked"'; } ?>/> <?php echo __('Summoners');?><br/>
							<input type="radio" name="class" value="rf" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'rf'){ echo 'checked="checked"'; } ?>/> <?php echo __('Fighters');?><br/>
							<?php if(defined('MU_VERSION') && MU_VERSION >= 5){ ?>
								<input type="radio" name="class" value="gl" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'gl'){ echo 'checked="checked"'; } ?>/> <?php echo __('Lancers');?><br/>
							<?php } ?>
							<?php if(defined('MU_VERSION') && MU_VERSION >= 9){ ?>
								<input type="radio" name="class" value="rw" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'rw'){ echo 'checked="checked"'; } ?>/> <?php echo __('RuneWizards');?><br/>
							<?php } ?>
							<?php if(defined('MU_VERSION') && MU_VERSION >= 10){ ?>
								<input type="radio" name="class" value="sl" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'sl'){ echo 'checked="checked"'; } ?>/> <?php echo __('Slayers');?><br/>
							<?php } ?>
							<?php if(defined('MU_VERSION') && MU_VERSION >= 11){ ?>
								<input type="radio" name="class" value="gc" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'gc'){ echo 'checked="checked"'; } ?>/> <?php echo __('Crushers');?><br/>
							<?php } ?>
							<?php if(defined('MU_VERSION') && MU_VERSION >= 12){ ?>
								<input type="radio" name="class" value="km" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'km'){ echo 'checked="checked"'; } ?>/> <?php echo __('Light Wizards');?><br/>
								<input type="radio" name="class" value="lm" <?php if(isset($_SESSION['filter']['class']) && $_SESSION['filter']['class'] == 'lm'){ echo 'checked="checked"'; } ?>/> <?php echo __('Lemuria Mages');?><br/>
							<?php } ?>
							<div class="form-group mt-3">
								<button class="btn btn-primary" type="submit" value="filter_items" name="filter_items"><?php echo __('Filter Items'); ?></button>
								<button class="btn btn-primary" type="submit" value="reset_filter" name="reset_filter"><?php echo __('Reset Filter'); ?></button>
							</div>
						</form>
					</div>
				</div>
				<div class="col-9">     
					<?php if(isset($items) && !empty($items)){ ?>
						<table class="table dmn-rankings-table table-striped">
							<thead>
							<tr>
								<th class="text-center">#</td>
								<th><?php echo __('Item'); ?></td>
								<th><?php echo __('Merchant'); ?></td>
								<th><?php echo __('Price + Tax'); ?>(<?php echo $this->config->config_entry('market|sell_tax'); ?>%)</th>
							</tr>
							</thead>
							<tbody>
							<?php
							foreach($items as $item){
								$color = ($item['highlighted'] == 1) ? '#FF3333' : '';
							?>
								<tr style="background-color:<?php echo $color; ?>;">
									<td class="text-center"><?php echo $item['icon']; ?></td>
									<td style="background-color:<?php echo $color; ?>;">
										<span id="market_item_<?php echo $item['pos']; ?>" data-info="<?php echo $item['item']; ?>"><a href="<?php echo $this->config->base_url; ?>market/buy/<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></span>
									</td>
									<td><?php echo htmlspecialchars($item['seller']); ?></td>
									<td><?php echo $item['price']; ?></td>
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
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>