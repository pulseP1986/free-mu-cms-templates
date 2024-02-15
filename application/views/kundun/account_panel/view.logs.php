<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Logs'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('Account Credits History'); ?>
					</h2>
					<div class="mb-5">
						<table class="table dmn-rankings-table table-striped">
							<thead>
							<tr>
								<th class="text-center">#</th>
								<th><?php echo __('Info'); ?></th>
								<th><?php echo __('Amount'); ?></th>
								<th><?php echo __('Date'); ?></th>
								<th><?php echo __('Ip Address'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php
								foreach($logs as $log):
									if($log['amount'] >= 0){
										$amount = '<span style="color: green;">' . $log['amount'] . '</span>';
									} else{
										$amount = '<span style="color: red;">' . $log['amount'] . '</span>';
									}
									?>
									<tr>
										<td class="text-center"><?php echo $log['pos']; ?></td>
										<td><?php echo $log['text']; ?></td>
										<td><?php echo $amount; ?></td>
										<td><?php echo date('d/m/Y, H:i', $log['date']); ?></td>
										<td><?php echo $log['ip']; ?></td>
									</tr>
								<?php
								endforeach;
							?>
							</tbody>
						</table>
						<?php if(isset($pagination)){ ?>
						<div class="d-flex justify-content-center align-items-center"><?php echo $pagination; ?></div>
						<?php }?>
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