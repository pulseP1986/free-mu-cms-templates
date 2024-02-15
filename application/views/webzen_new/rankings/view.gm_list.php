<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Gm List'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('List GameMasters'); ?>
						<nav class="nav nav-pills justify-content-center float-right">
						<?php
							foreach($this->website->server_list() as $key => $servers){
								if($servers['visible'] == 1){
									$selectd = ($def_server == $key) ? 'active' : '';
						?>
									<a class="nav-item nav-link <?php echo $selectd;?>" href="<?php echo $this->config->base_url . 'rankings/gm-list/' . $key; ?>"><?php echo $servers['title']; ?></a>
						<?php
								}
							}
						?>			
						</nav>
					</h2>
					<?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    } 
					else{
						if(isset($gm_list) && $gm_list != false){
						?>
							<table class="table dmn-rankings-table table-striped">
								<thead>
								<tr>
									<th class="text-center">#</th>
									<th><?php echo __('Name'); ?></th>
									<th><?php echo __('Contact'); ?></th>
								</tr>
								</thead>
								<tbody>
								<?php
									$i = 1;
									foreach($gm_list as $players){
								?>
										<tr>
											<td class="text-center"><?php echo($i++); ?></td>
											<td><a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($players['name']); ?>/<?php echo $def_server; ?>"><?php echo $players['name']; ?></a></td>
											<td><?php echo $players['contact']; ?></td>
										</tr>
								<?php } ?>
								</tbody>
							</table>
						<?php
						} 
						else{
							echo '<div class="alert alert-primary" role="alert">' . __('No GMs Found') . '</div>';
						}
					}
					?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>