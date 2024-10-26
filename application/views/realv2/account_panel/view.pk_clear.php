<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('PK Clear'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Clear player kills.'); ?></h2>
						<div class="mb-5">
							<?php
							if(isset($char_list) && $char_list != false){
								?>
								<table class="table dmn-rankings-table table-striped">
									<thead>
									<tr>
										<th><?php echo __('Character'); ?></th>
										<th><?php echo __('Price'); ?></th>
										<th><?php echo __('Kills'); ?></th>
										<th><?php echo __('PK Level'); ?></th>
										<th><?php echo __('Manage'); ?></th>
									</tr>
									</thead>
									<tbody>
									<?php
									foreach($char_list as $char){
									?>
										<tr>
											<td>
												<a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($char['name']); ?>/<?php echo $this->session->userdata(['user' => 'server']); ?>"><?php echo $char['name']; ?></a>
											</td>
											<td>
												<?php
													$price = $this->config->config_entry('character_' . $this->session->userdata(['user' => 'server']) . '|pk_clear_price');
													if($this->session->userdata('vip')){
														$price -= $this->session->userdata(['vip' => 'pk_clear_discount']);
													}
													echo $this->website->zen_format($price);
												?>
											</td>
											<td><?php echo $char['pkcount']; ?></td>
											<td><?php echo $this->website->pk_level($char['pklevel']); ?></td>
											<td><a href="#"
												   id="pkclear-char-<?php echo bin2hex($char['name']); ?>"><?php echo __('PK Clear'); ?></a>
											</td>
										</tr>
									<?php
									}
									?>
									</tbody>
								</table>
								<?php
							} else{
								?>
								<div class="alert alert-danger" role="alert"><?php echo __('Character not found.'); ?></div>
								<?php
							}
						?>
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