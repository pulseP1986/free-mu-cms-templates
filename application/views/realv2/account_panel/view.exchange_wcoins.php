<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Exchange Wcoins'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Exchange'); ?> <?php echo $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server'])); ?> <?php echo __('To Wcoins'); ?></h2>
						<div class="mb-5">
							<?php
								if(isset($error)){
									echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
								}
								if(isset($success)){
									echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
								}
							?>
							<script type="text/javascript">
								var total = 0,
									price_credits = parseInt(<?php echo $wcoin_config['reward_coin'];?>);
								var amountof = ['<?php echo $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server']));?>', '<?php echo __('WCoins');?>'],
									willreceive = ['<?php echo __('WCoins');?>', '<?php echo $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server']));?>'];

								function calculateWCoins(val) {
									if ((val.toString().search(/^-?[0-9]+$/) != 0)) {
										$('#credits').val('0');
										$('#wcoins').val('0');
										if (typeof $('#exchange_wcoins').attr("disabled") == 'undefined' || $('#exchange_wcoins').attr("disabled") == false) {
											$('#exchange_wcoins').attr("disabled", "disabled");
										}
									}
									else {
										if (val >=  <?php echo $wcoin_config['min_rate'];?>) {
											if (price_credits < 0) {
												total = parseInt(val) * Math.abs(price_credits);
											}
											else {
												total = parseInt(val) / price_credits;
											}
											$('#wcoins').val(Math.floor(total));
											if (($('#wcoins').val() != 0)) {
												$('#exchange_wcoins').removeAttr("disabled");
											}
										}
										else {
											$('#wcoins').val(0);
											$('#exchange_wcoins').attr("disabled", "disabled");
										}
									}
								}

								$(document).ready(function () {
									$('#exchange_type').on('change', function () {
										if ($(this).val() == 1) {
											$('#amountof').html(amountof[0]);
											$('#willreceive').html(willreceive[0])
										}
										else {
											$('#amountof').html(amountof[1]);
											$('#willreceive').html(willreceive[1])
										}
									});
								});
							</script>
							<div class="alert alert-info" role="alert"><?php echo vsprintf(__('Minimal exchange rate is %d %s'), [$wcoin_config['min_rate'], $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server']))]); ?></div>
							<div class="alert alert-info" role="alert"><?php echo __('Exchange rate forumula'); ?>:
								<?php
									if($wcoin_config['reward_coin'] > 0){
										echo '1 ' . $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server'])) . ' / ' . $wcoin_config['reward_coin'].' '.__('Wcoins');
									} else{
										echo '1 ' . $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server'])) . ' * ' . abs($wcoin_config['reward_coin']).' '.__('Wcoins');
									}
								?>
							</div>
							<form method="POST" action="" id="wcoin_form" name="wcoin_form">
								<?php if($wcoin_config['change_back'] == 1){ ?>
								<div class="form-group">
									<label class="control-label"><?php echo __('Exchange Type'); ?></label>
									<div>
										<select name="exchange_type" id="exchange_type" class="form-control bg-light-dark text-white">
											<option value="1"><?php echo $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server'])); ?> <?php echo __('To'); ?> <?php echo __('WCoins'); ?></option>
											<option value="2"><?php echo __('WCoins'); ?> <?php echo __('To'); ?> <?php echo $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server'])); ?></option>
												
										</select>
									</div>
								</div>
								<?php } ?>
								<div class="form-group">
									<label class="control-label"><?php echo __('Amount of'); ?> <span id="amountof"><?php echo $this->website->translate_credits($wcoin_config['credits_type'], $this->session->userdata(['user' => 'server'])); ?></span></label>
									<input type="text" class="form-control bg-light-dark text-white" type="text" name="credits" id="credits" value="" onblur="calculateWCoins($('#credits').val());" onkeyup="calculateWCoins($('#credits').val());">
								</div>
								<div class="form-group">
									<label class="control-label"><?php echo __('Will Receive'); ?> <span id="willreceive"><?php echo __('WCoins'); ?></label>
									<input type="text" class="form-control bg-light-dark text-white" type="text" id="wcoins" name="wcoins" value="" disabled>
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button type="submit" id="exchange_wcoins" name="exchange_wcoins" class="vs-btn gradient-btn h4" disabled><?php echo __('Submit'); ?></button></div>
								</div>								
							</form>
						</div>
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