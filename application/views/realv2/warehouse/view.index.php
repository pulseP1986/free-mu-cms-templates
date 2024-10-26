<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title font-theme h4 mt-25-sm mb-5-off" style="display:flex;justify-content: space-between;">
				<h2><?php echo __('Warehouse'); ?></h2>
				<span>
					<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>warehouse/web"><?php echo __('Web Warehouse'); ?></a>
					<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>market"><?php echo __('Market'); ?></a>
					<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>market/history"><?php echo __('History'); ?></a>		
				</span>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<?php
					if(isset($error)){
                        echo '<div class="alert alert-danger">' . $error . '</div>';
                    }
					else{
					?>
					<script>
						$(document).ready(function () {
							$('.item-slot').each(function () {
								App.initializeTooltip($(this), true, 'warehouse/item_info');
							});
						});
						
						<?php if($this->config->config_entry('market|module_status') == 1){ ?>
						var total = 0;
						var tax = 0;
						
						function calculate_tax(val) {
							$(document).ready(function () {
								if ((val.toString().search(/^-?[0-9]+$/) != 0)) {
									$('#price').val('0');
									$('#price_tax').val('0');
								}
								else {
									method = $('#payment_method').val();
									total = (parseInt(val) / 100) * parseInt(<?php echo (int)$this->config->config_entry('market|sell_tax');?>);
									if(method == 1 && parseInt(val) < <?php echo (int)$this->config->config_entry('market|min_price_limit_credits');?>){
										$('#price').val('0');
										$('#price_tax').val('0');
										App.notice('<?php echo __('Info');?>', 'success', '<?php echo vsprintf(__('Min selling price %d %s.'), [$this->config->config_entry('market|min_price_limit_credits'), $this->website->translate_credits(1, $this->session->userdata(['user' => 'server']))]); ?>');
									}
									else if(method == 2 && parseInt(val) < <?php echo (int)$this->config->config_entry('market|min_price_limit_gcredits');?>){
										$('#price').val('0');
										$('#price_tax').val('0');
										App.notice('<?php echo __('Info');?>', 'success', '<?php echo vsprintf(__('Min selling price %d %s.'), [$this->config->config_entry('market|min_price_limit_gcredits'), $this->website->translate_credits(2, $this->session->userdata(['user' => 'server']))]); ?>');
									}
									else if(method == 3 && parseInt(val) < <?php echo (int)$this->config->config_entry('market|min_price_limit_zen');?>){
										$('#price').val('0');
										$('#price_tax').val('0');
										App.notice('<?php echo __('Info');?>', 'success', '<?php echo vsprintf(__('Min selling price %d %s.'), [$this->config->config_entry('market|min_price_limit_zen'), $this->website->translate_credits(3, $this->session->userdata(['user' => 'server']))]); ?>');
									}
									else{
										tax = Math.round((parseInt(val) + total));
										$('#price_tax').val(tax);
									}
								}
							});
						}

						$(document).ready(function () {
							$('#payment_method').on('change', function () {
								if ($.inArray($(this).val(), ['4', '5', '6', '7', '8', '9']) !== -1) {
									$('#price_with_tax').hide('slow');
								}
								else {
									$('#price_with_tax').show('slow');
								}
							});
							
							$('#highlight').on('click', function () {
								if (this.checked) {
									App.notice('<?php echo __('Info');?>', 'success', '<?php echo vsprintf(__('You Item Will Be Highlighted In Market. Price %d %s.'), [$this->config->config_entry('market|price_highlight'), $this->website->translate_credits($this->config->config_entry('market|price_highlight_type'), $this->session->userdata(['user' => 'server']))]); ?>', 1);
								}
								else {
									$('.message-box').hide();
								}
							});
						});
						<?php } ?>
					</script>
					<div class="row d-none m-1" id="option_buttons">
						<div class="col-lg-12"> 
							<div class="justify-content-center align-items-center text-center">
							<?php if($this->config->config_entry('market|module_status') == 1){ ?>
							<button type="submit" class="vs-btn gradient-btn h4" id="sell_item_show"><?php echo __('Sell Item'); ?></button>
							<?php } ?>	
                            <?php if($this->config->config_entry('warehouse|allow_move_to_web_warehouse') == 1){ ?>
                            <button type="submit" class="vs-btn gradient-btn h4" id="move_to_web_wh"><?php echo __('Move To Web'); ?></button>
							<?php } ?>	
							</div>
						</div>
					</div>	
					<?php if($this->config->config_entry('market|module_status') == 1){ ?>
					<div class="row mt-2 mb-2 ml-1 mr-1" id="sell_item">
						<div class="col-lg-12"> 
							<form method="post" action="<?php echo $this->config->base_url; ?>warehouse" id="sell_item_form">
                                <?php $this->csrf->writeToken(); ?>
								<div class="form-group">
									<label class="control-label"><?php echo __('Payment Type'); ?></label>
									<div>
										 <select class="form-control bg-light-dark text-white has-border py-18 register" name="payment_method" id="payment_method">
											<?php if($this->config->config_entry('warehouse|allow_sell_for_credits') == 1){ ?>
												<option value="1"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_1'); ?></option>
											<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_gcredits') == 1){ ?>
												<option value="2"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_2'); ?></option>
											<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_zen') == 1){ ?>
												<option value="3"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_3'); ?></option>
											<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_chaos') == 1){ ?>
												<option value="4"><?php echo __('Jewel Of Chaos'); ?></option>
											<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_bless') == 1){ ?>
												<option value="5"><?php echo __('Jewel Of Bless'); ?></option>
											<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_soul') == 1){ ?>
												<option value="6"><?php echo __('Jewel Of Soul'); ?></option>
											<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_life') == 1){ ?>
												<option value="7"><?php echo __('Jewel Of Life'); ?></option>
											<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_creation') == 1){ ?>
												<option value="8"><?php echo __('Jewel Of Creation'); ?></option>
												<?php } ?>
											<?php if($this->config->config_entry('warehouse|allow_sell_for_harmony') == 1){ ?>
												<option value="9"><?php echo __('Jewel Of Harmony'); ?></option>
											<?php } ?>
										</select>
									</div>
								</div>
                                <div class="form-group">
									<label class="control-label"><?php echo __('Price'); ?></label>
									<input class="form-control bg-light-dark text-white" type="text" name="price" id="price" value="0" onblur="calculate_tax($('#price').val());" onkeyup="calculate_tax($('#price').val());"/>
								</div>
                                <div class="form-group">
									<label class="control-label"><?php echo __('Price + Tax'); ?> (<?php echo $this->config->config_entry('market|sell_tax'); ?>%)</label>
									<input class="form-control bg-light-dark text-white" type="text" name="price_tax" id="price_tax" value="0" disabled />
								</div>    
                                <div class="form-group">
									<label class="control-label"><?php echo __('Selling Period'); ?></label>
									<div>
										 <select class="form-control bg-light-dark text-white has-border py-18 register" name="time" id="time">
											<option value="1">1 <?php echo __('Day'); ?></option>
											<option value="2">2 <?php echo __('Days'); ?></option>
											<option value="3">3 <?php echo __('Days'); ?></option>
											<option value="4">4 <?php echo __('Days'); ?></option>
											<option value="5">5 <?php echo __('Days'); ?></option>
											<option value="7">7 <?php echo __('Days'); ?></option>
											<option value="14">14 <?php echo __('Days'); ?></option>
										</select>
									</div>
								</div>     
								<?php if(isset($char_list) && $char_list != false){ ?>
								<div class="form-group">
									<label class="control-label"><?php echo __('Seller'); ?></label>
									<div>
										<select class="form-control bg-light-dark text-white has-border py-18 register" name="char" id="char">
											<?php foreach($char_list as $char){ ?>
												<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
											<?php } ?>
										</select>
									</div>
								</div>	
								<?php } ?>
								<div class="form-group">
									<input type="checkbox" name="highlight" id="highlight" value="1"/> <?php echo __('Highlight Item'); ?>
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button class="vs-btn gradient-btn h4" type="submit" id="sell_item_button"><?php echo __('Confirm'); ?></button></div>
								</div>
                            </form>
						</div>
					</div>	
					<?php } ?>	
					<?php if($this->config->config_entry('warehouse|allow_delete_item') == 1){ ?>
					<!--<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-primary" role="alert"><?php echo __('Right mouse click if you want to delete item.'); ?></div>
						</div>
					</div>	-->
                    <?php } ?>

					<div class="row">
						<div class="col text-center d-flex justify-content-center align-items-center">
							<div class="mt-2 mb-2">
							<div id="vault-grid-game" class="dmn-vault-grid-modern wh_items">
								<?php
								$wh_content = '';
								for($i = 1; $i <= 120; $i++){
									if(isset($items[$i])){
										$wh_content .= '<div class="dmn-grid-item-modern item-slot" id="item-slot-' . $i . '" data-slot="' . $i . '" data-info="' . $items[$i]['hex'] . '" data-title="'. $items[$i]['name'] . '" style="background-image: url(' . $this->itemimage->load($items[$i]['item_id'], $items[$i]['item_cat'], $items[$i]['level'], 0) . '), linear-gradient(rgba(4,4,2,0.6),rgba(4,4,2,0.6)); background-size: contain; width:' . ($items[$i]['x'] * 40) . 'px;height:' . ($items[$i]['y'] * 40) . 'px;top:' . ($items[$i]['yy'] * 40) . 'px;left:' . ($items[$i]['xx'] * 40) . 'px;cursor:pointer;"></div>';
									}
								}
								echo $wh_content;
								?>
							</div>
							</div>
						</div>
						<?php if($this->website->get_value_from_server($this->session->userdata(['user' => 'server']), 'wh_multiplier') > 120){ ?>
						<div class="col text-center d-flex justify-content-center align-items-center">
							<div class="mt-2 mb-2">
							<div id="vault-grid-game" class="dmn-vault-grid-modern wh_items">
								<?php
								$wh_content = '';
								for($i = 120; $i <= 240; $i++){
									if(isset($items[$i])){
										$wh_content .= '<div class="dmn-grid-item-modern item-slot" id="item-slot-' . $i . '" data-slot="' . $i . '" data-info="' . $items[$i]['hex'] . '" data-title="'. $items[$i]['name'] . '" style="background-image: url(' . $this->itemimage->load($items[$i]['item_id'], $items[$i]['item_cat'], $items[$i]['level'], 0) . '), linear-gradient(rgba(4,4,2,0.6),rgba(4,4,2,0.6)); background-size: contain; width:' . ($items[$i]['x'] * 40) . 'px;height:' . ($items[$i]['y'] * 40) . 'px;top:' . ($items[$i]['yy'] * 40) . 'px;left:' . ($items[$i]['xx'] * 40) . 'px;cursor:pointer;"></div>';
									}
								}
								echo $wh_content;
								?>
							</div>
							</div>
						</div>
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