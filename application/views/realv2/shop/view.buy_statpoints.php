<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Buy Stats'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Buy StatPoints for your character'); ?></h2>
					<?php
                    if(isset($not_found)){
                        echo '<div class="alert alert-danger" role="alert">' . $not_found . '</div>';
                    } 
					else{
                        if(isset($error)){
                            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                        }
                        if(isset($success)){
                            echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
                        }
                        ?>
						<script type="text/javascript">
                            var price = 0;

                            function calculateStatPoints(val) {
                                if ((val.toString().search(/^-?[0-9]+$/) != 0)) {
                                    $('#points').val('0');
                                    $('#price').val('0');
                                    if (typeof $('#buy_points_button').attr("disabled") == 'undefined' || $('#buy_points_button').attr("disabled") == false) {
                                        $('#buy_points_button').attr("disabled", "disabled");
                                    }
                                }
                                else {
                                    price = Math.ceil((parseInt(val) * <?php echo $this->config->config_entry('buypoints|price');?>) / <?php echo $this->config->config_entry('buypoints|points');?>);
                                    $('#price').val(price);
                                    if (($('#price').val() != 0)) {
                                        $('#buy_points_button').removeAttr("disabled");
                                    }
                                }
                            }
                        </script>
						<div class="alert alert-info" role="alert"><span><?php echo __('INFO'); ?>:</span>
                            <b><?php echo $this->config->config_entry('buypoints|points'); ?></b> <?php echo __('point(s) price '); ?>
                            <b><?php echo $this->config->config_entry('buypoints|price'); ?> <?php echo $this->website->translate_credits($this->config->config_entry('buypoints|price_type')); ?></b>
                        </div>
						<form method="POST" action="" id="buy_stats_form" name="buy_stats_form">
							<div class="form-group">
								<label class="control-label"><?php echo __('Character'); ?></label>
								<div>
									<select name="character" id="character" class="form-control bg-light-dark text-white">
										<option value=""><?php echo __('--SELECT--'); ?></option>
										<?php
											if($char_list){
												foreach($char_list as $char){
										?>
										<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
										<?php
												}
											}
										?>
									</select>	
								</div>
							</div>
							<div class="form-group">
								<label class="control-label"><?php echo __('Amount Of Points'); ?></label>
								<input type="text" class="form-control bg-light-dark text-white" name="points" id="points" value="" onblur="calculateStatPoints($('#points').val());" onkeyup="calculateStatPoints($('#points').val());">
							</div>
							<div class="form-group">
								<label class="control-label"><?php echo __('Price'); ?></label>
								<input type="text" class="form-control bg-light-dark text-white" name="price" id="price" value="" readonly>
							</div>
							<div class="form-group mb-5">
								<div class="d-flex justify-content-center align-items-center"><button type="submit" id="buy_points_button" class="vs-btn gradient-btn h4"><?php echo __('Submit'); ?></button></div>
							</div>
						</form>
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