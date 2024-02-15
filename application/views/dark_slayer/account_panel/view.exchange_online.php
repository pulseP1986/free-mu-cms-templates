<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Trade Online Time'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('More online more can exchange and receive nice rewards'); ?></h2>
					<div class="mb-5">
						<?php
							if(isset($error)){
								echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
							}
							if(isset($success)){
								echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
							}
						?>
						<form method="post" action="">
							<table class="table dmn-rankings-table table-striped">
								<thead>
								<tr>
									<th style="text-align: left;padding-left: 15px;" colspan="3"><?php echo __('Details'); ?></th>
								</tr>
								</thead>
								<tbody>
								<tr>
									<td style="width:30%;text-align: left;padding-left: 15px;"><?php echo __('Online Hours'); ?></td>
									<td style="width:70%;text-align: left;padding-left: 15px;"><?php echo $online_time; ?></td>
								</tr>
								<tr>
									<td style="width:30%;text-align: left;padding-left: 15px;"><?php echo __('Reward'); ?></td>
									<td style="width:70%;text-align: left;padding-left: 15px;">
										<?php
											$reward = (int)$this->config->config_entry('account|online_trade_reward');
											if($this->session->userdata('vip')){
												$reward += $this->session->userdata(['vip' => 'online_hour_exchange_bonus']);
											}
											echo (int)$reward * $online_time; ?> <?php echo $this->website->translate_credits($this->config->config_entry('account|online_trade_reward_type'), $this->session->userdata(['user' => 'server'])); ?>
									</td>
								</tr>
								</tbody>
							</table>
							<div class="text-center">
								<button type="submit" id="trade_hours" name="trade_hours" class="btn btn-primary"><?php echo __('Trade Now'); ?></button>
							</div>
						</form>
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