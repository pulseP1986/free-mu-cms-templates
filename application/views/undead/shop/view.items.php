<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Shop'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('View Items'); ?></h2>
					 <?php if($this->config->config_entry('shop_' . $this->session->userdata(['user' => 'server']) . '|discount') == 1 && strtotime($this->config->config_entry('shop_' . $this->session->userdata(['user' => 'server']) . '|discount_time')) > time()){ ?>
						<div class="discount_notice">
							<div class="ribbon-discount-green">
								<div class="ribbon-green"><?php echo __('PROMO'); ?></div>
							</div>
							<div class="content"><?php echo $this->config->config_entry('shop_' . $this->session->userdata(['user' => 'server']) . '|discount_notice'); ?></div>
						</div>​
					 <?php } ?>
				</div>	
			</div>	
			<div class="row">
				<div class="col-3">     
					<div class="dmn-sidebar-box">
						<p class="dmn-sidebar-box-title"><?php echo __('Categories');?></p>
						<div class="dmn-sidebar-box-items">
							<?php 
							$cats = $this->webshop->full_category_data();
							foreach($cats AS $key => $cat){
								$data = explode('|', $cat);
								if($data[3] == 1){
							?>
								<a href="<?php echo $this->config->base_url;?>shop/category/<?php echo $data[2];?>"><i class="fas fa-arrow-right"></i> <?php echo __($data[1]);?></a>
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				<div class="col-9">  
				<?php
					if(isset($error)){
						echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
					} 
					else{
						if(isset($items) && !empty($items)){
							echo '<ul class="shop-product-list">';
							foreach($items as $item){
								echo '<li class="shop-product-list-item flex-c-c">
										 <div class="thumb text-center" id="shop_item_image_' . $item['id'] . '" data-info="' . $item['class'] . '">
											' . $item['image'] . '
										  </div>
										<div class="detail">
											<p class="item-name text-center" id="shop_item_title_' . $item['id'] . '" data-name="' . $item['name'] . '" data-info="' . $item['class'] . '">
												' . $item['name'] . '
											</p>
											<p class="price">
												'.__('From').' '.$item['price'].' '.__('Credits').'
											</p>
											
											<a class="item-buy btn btn-primary btn-block" id="shop_item_buy_' . $item['id'] . '" data-name="' . $item['name'] . '">
												'.__('Buy Item').'
											</a>
										</div>
									</li>';
							}
							echo '</ul>';
						} 
						else{
							echo '<div class="alert alert-warning" role="alert">' . __('Currently No Items In Webshop') . '</div>';
						}
						if(isset($pagination)){
							echo '<div class="row mb-4"><div class="col-12"><div class="d-flex justify-content-center align-items-center">'.$pagination.'</div></div></div>';
						}
					}
				?>
				<script type="text/javascript">
					$(document).ready(function () {
						$('p[id^="shop_item_title_"], div[id^="shop_item_image_"]').each(function () {
							App.initializeTooltip($(this), false);
						});
						$('a[id^="shop_item_buy_"]').on('click', function (e) {
							e.preventDefault();
							var buy_dialog = $('<div id="item_content" style="margin: 0 auto;"></div>');
							var item_name = $(this).attr('data-name');
							var id = $(this).attr('id').split('_')[3];
							$.ajax({
								url: DmNConfig.base_url + 'shop/get_item_data',
								data: {id: id},
								success: function (data) {
									if (data.error) {
										App.notice(App.locale.error, 'error', data.error);
									}
									else {
										EJS.config({cache: false});
										var html = new EJS({url: DmNConfig.base_url + 'assets/default_assets/js_templates/buy_item.ejs?v1'}).render(data);
										if ($('#item_content').dialog("isOpen") == true) {
											$('#item_content').dialog('destroy');
										}
										buy_dialog.dialog({
											width: 680,
											height: 'auto',
											title: "<?php echo __('Buy');?> " + item_name,
											dialogClass: 'fixed',
											show: {
												effect: "blind",
												duration: 500
											},
											hide: {
												effect: "blind",
												duration: 500
											},
											close: function () {
												$(this).dialog('destroy');
											}
										});
										buy_dialog.html(html);
										App.initializeModalBoxes();
									}
								}
							});
						});
					});
				</script>
				</div>
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>