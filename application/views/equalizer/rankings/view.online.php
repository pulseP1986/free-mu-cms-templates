<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Online Players'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('List online players');?>
						<nav class="nav nav-pills justify-content-center float-right">
						<?php
						$args = $this->request->get_args();
						$i = 0;
						foreach($this->website->server_list() as $key => $servers){
							if($servers['visible'] == 1){
								$i++;
								$selectd = (!empty($args) && ($args[0] == $key)) ? 'active' : '';
						?>
								<a class="nav-item nav-link <?php echo $selectd;?>" href="<?php echo $this->config->base_url; ?>rankings/online-players/<?php echo $key; ?>"><?php echo $servers['title']; ?></a>
						<?php
							}
						}
						?>	
						</nav>
					</h2>
					<?php
					if(isset($error)){
                        echo '<div class="alert alert-primary" role="alert">' . $error . '</div>';
                    } 
					else{
						if(isset($online) && $online != false){
						?>
                        <table class="table dmn-rankings-table table-striped">
                            <thead>
								<tr>
									<th class="text-center">#</th>
									<th><?php echo __('Name'); ?></th>
									<th class="text-center"><?php echo __('Class'); ?></th>
									<th class="text-center"><?php echo __('Level'); ?></th>
									<?php if($config['online_list']['display_resets'] == 1){ ?>
									<th class="text-center"><?php echo __('Resets'); ?></th>
									<?php } ?>
									<?php if($config['online_list']['display_gresets'] == 1){ ?>
									<th class="text-center"><?php echo __('Grand Reset'); ?></th>
									<?php } ?>
									<th class="text-center"><?php echo __('Connect Time'); ?></th>
									<th class="text-center"><?php echo __('Connected Since'); ?></th>
								</tr>
                            </thead>
                            <tbody>
                            <?php
							$i = 1;
							foreach($online as $players){
                            ?>
								<tr>
									<td class="text-center"><?php echo $i++; ?></td>
									<td>
										<?php if($config['online_list']['display_country'] == 1){ ?><span class="f16"><span class="flag <?php echo $players['country']; ?>"></span></span><?php } ?> <a  href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($players['name']); ?>/<?php echo $server; ?>"><?php echo $players['name']; ?></a>
									</td>
									<td class="text-center"><?php echo $players['class']; ?></td>
									<td class="text-center"><?php echo $players['level']; ?></td>
									<?php if($config['online_list']['display_resets'] == 1){ ?>
									<td class="text-center"><?php echo $players['resets']; ?></td>
									<?php } ?>
									<?php if($config['online_list']['display_gresets'] == 1){ ?>
									<td class="text-center"><?php echo $players['gresets']; ?></td>
									<?php } ?>
									<td class="text-center"><?php echo $players['h']; ?> <?php echo __('Hours'); ?> <?php echo $players['m']; ?> <?php echo __('Minutes'); ?></td>
									<td class="text-center"><?php echo $players['connecttime']; ?></td>
								</tr>
							<?php } ?>
                            </tbody>
                        </table>
                    <?php
						} 
						else{
							echo '<div class="alert alert-primary" role="alert">' . __('No Players Found') . '</div>';
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
	