<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Ban List'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('List Banned Players & Accounts'); ?>
						<nav class="nav nav-pills justify-content-center float-right">
						<?php
							foreach($this->website->server_list() as $key => $servers){
								if($servers['visible'] == 1){
									$selectd = ($def_server == $key) ? 'active' : '';
						?>
									<a class="nav-item nav-link <?php echo $selectd;?>" href="<?php echo $this->config->base_url . 'rankings/ban-list/chars/' . $key; ?>"><?php echo $servers['title']; ?></a>
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
                    ?>
						<nav class="nav nav-pills justify-content-center mb-1">
						<?php
						$selectChars = '';
						if($def_type == 'chars'){
							$selectChars = 'active';
						}
						?>
							<a class="nav-item nav-link <?php echo $selectChars;?>" href="<?php echo $this->config->base_url; ?>rankings/ban-list/chars/<?php echo $def_server; ?>"><?php echo __('Banned Chars'); ?></a>
						<?php
						$selectAccounts = '';
						if($def_type == 'accounts'){
							$selectAccounts = 'active';
						}
						?>
							<a class="nav-item nav-link <?php echo $selectAccounts;?>" href="<?php echo $this->config->base_url; ?>rankings/ban-list/accounts/<?php echo $def_server; ?>"><?php echo __('Banned Accounts'); ?></a>
						</nav>
						<?php
						if(isset($ban_list) && $ban_list != false){
						?>
							<table class="table dmn-rankings-table table-striped">
								<thead>
								<tr>
									<th class="text-center">#</th>
                                    <th><?php echo __('Name'); ?></th>
                                    <th><?php echo __('Ban Time'); ?></th>
                                    <th><?php echo __('Ban Reason'); ?></th>
								</tr>
								</thead>
								<tbody>
								<?php
                                    $i = 1;
                                    foreach($ban_list as $players){
                                ?>
                                        <tr>
                                            <td class="text-center"><?php echo($i++); ?></td>
                                            <td><?php echo $players['name']; ?></td>
                                            <td><?php echo $players['time']; ?></td>
                                            <td><?php echo $players['reason']; ?></td>
                                        </tr>
								<?php } ?>
								</tbody>
							</table>
						<?php
						} 
						else{
							echo '<div class="alert alert-primary" role="alert">' . __('No Bans Found') . '</div>';
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