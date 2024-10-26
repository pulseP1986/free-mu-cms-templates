<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Logs'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
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
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>