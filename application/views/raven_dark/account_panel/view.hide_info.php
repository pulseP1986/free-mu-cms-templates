<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Hide Info'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Hide inventory / location from others'); ?></h2>
					<div class="mb-5">
						<table class="table dmn-rankings-table table-striped">
							<thead>
							<tr>
								<th style="text-align: left;padding-left: 15px;"
									colspan="3"><?php echo __('Details'); ?></th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td style="width:30%;text-align: left;padding-left: 15px;"><?php echo __('Hide Till'); ?></td>
								<td style="width:70%;text-align: left;padding-left: 15px;"><?php echo $hide_time; ?></td>
							</tr>
							<tr>
								<td style="width:30%;text-align: left;padding-left: 15px;"><?php echo __('Hide Info'); ?></td>
								<td style="width:70%;text-align: left;padding-left: 15px;"><?php echo __('Everyone can\'t see location or inventory items on all chars'); ?></td>
							</tr>
							<tr>
								<td style="width:30%;text-align: left;padding-left: 15px;"><?php echo __('Hide Price'); ?></td>
								<td style="width:70%;text-align: left;padding-left: 15px;">
									<?php
										$price = $this->config->config_entry('account|hide_char_price');
										if($this->session->userdata('vip')){
											$price -= ($price / 100) * $this->session->userdata(['vip' => 'hide_info_discount']);
										}
										echo $price; ?> <?php echo $this->website->translate_credits($this->config->config_entry('account|hide_char_price_type'), $this->session->userdata(['user' => 'server'])); ?>
									, <?php echo $this->config->config_entry('account|hide_char_days'); ?> <?php echo __('days'); ?>
								</td>
							</tr>
							</tbody>
						</table>
						<div class="text-center">
							<button type="submit" id="hide_chars" class="btn btn-primary"><?php echo __('Buy Now'); ?></button>
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