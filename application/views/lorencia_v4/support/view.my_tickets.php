<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Support'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('My Support Requests'); ?>
                        <div class="float-right"><a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>support"><?php echo __('New Request'); ?></a></div>
					</h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12">     
					<table class="table dmn-rankings-table table-striped">
						<thead>
						<tr>
							<th><?php echo __('Title'); ?></th>
							<th><?php echo __('Last Reply'); ?></th>
							<th><?php echo __('Status'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
							if(!empty($ticket_list)):
								foreach($ticket_list AS $key => $ticket):
									$last_reply = $this->Msupport->get_last_reply_time($ticket['id']);
									if($last_reply != false){
										$lreply = date('d/m/Y g:i:s a', $last_reply['reply_time']);
									} else{
										$lreply = 'None';
									}
									$has_new_reply = '';
									if($ticket['replied_by_user'] == 0){
										$has_new_reply = ' (' . __('New Reply') . ')';
									}
									?>
									<tr>
										<td>
											<a href="<?php echo $this->config->base_url; ?>support/read-ticket/<?php echo $ticket['id']; ?>"><?php echo $ticket['subject'] . $has_new_reply; ?></a>
										</td>
										<td><?php echo $lreply; ?></td>
										<td><?php echo $this->Msupport->readable_status($ticket['status']); ?></td>
									</tr>
								<?php
								endforeach;
							else:
								?>
								<div
										class="alert alert-danger" role="alert"><?php echo __('You have no support requests.'); ?></div>
							<?php endif; ?>
						</tbody>
					</table>
				</div>	
			</div>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>