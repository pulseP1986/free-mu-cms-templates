<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title font-theme h4 mt-25-sm mb-5-off" style="display:flex;justify-content: space-between;">
					<h2><?php echo __('Change Name History'); ?></h2>
					<span><a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>shop/change-name"><?php echo __('Change Name'); ?></a></span>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<?php
						if(isset($error)){
							echo '<div class="alert alert-primary" role="alert">' . $error . '</div>';
						} 
						else{
							if(isset($change_history) && $change_history != false){
						?>
							<table class="table dmn-rankings-table table-striped">
								<thead>
								<tr>
									<th class="text-center">#</th>
									<th><?php echo __('Old Name'); ?></th>
									<th><?php echo __('New Name'); ?></th>
									<th><?php echo __('Date'); ?></th>
								</tr>
								</thead>
								<tbody>
								<?php
									$i = 1;
									foreach($change_history as $history){
										?>
										<tr>
											<td class="text-center"><?php echo($i++); ?></td>
											<td><?php echo $history['old_name']; ?></td>
											<td><?php echo $history['new_name']; ?></td>
											<td ><?php echo date(DATETIME_FORMAT, strtotime($history['change_date'])); ?></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
					 <?php
						} 
						else{
							echo '<div class="alert alert-primary" role="alert">' . __('You have not changed any character name') . '</div>';
						}
					}
					?>
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