<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Info'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title">
						<?php $args = $this->request->get_args(); ?>
						<?php echo sprintf(__('Guild %s Info'), $this->website->hex2bin($args[0])); ?>
					</h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-lg-12">     
					<?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    } 
					else{
                    ?>
					<table class="table dmn-rankings-table table-striped">
						<thead>
						<tr>
							<th colspan="2"
								style="padding-left: 15px;"><?php echo __('Information'); ?></th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td style="width: 30%;" class="text-center">
								<img src="<?php echo $this->config->base_url; ?>rankings/get_mark/<?php echo $guild_info['G_Mark']; ?>/132" style="border: 0;"/>
							</td>
							<td style="width: 70%;">
								<table style="width:100%;margin: 0 auto;">
									<tr>
										<td style="width:50%;text-align: left;"><?php echo __('Guild'); ?></td>
										<td style="width:50%;text-align: left;">
											<a href="<?php echo $this->config->base_url; ?>guild/<?php echo bin2hex($guild_info['G_Name']); ?>/<?php echo $args[1]; ?>"><?php echo $guild_info['G_Name']; ?></a>
										</td>
									</tr>
									<tr style="height:15px;">
										<td style="width:50%;text-align: left;"><?php echo __('Master'); ?></td>
										<td style="width:50%;text-align: left;">
											<a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($guild_info['G_Master']); ?>/<?php echo $args[1]; ?>"><?php echo $guild_info['G_Master']; ?></a>
										</td>
									</tr>
									<tr>
										<td style="width:50%;text-align: left;"><?php echo __('Score'); ?></td>
										<td style="width:50%;text-align: left;"><?php echo $guild_info['G_Score']; ?></td>
									</tr>
									<tr>
										<td style="width:50%;text-align: left;"><?php echo __('Member Count'); ?></td>
										<td style="width:50%;text-align: left;"><?php echo $guild_info['MemberCount']; ?></td>
									</tr>
									<tr>
										<td style="width:50%;text-align: left;"><?php echo __('Alliance'); ?></td>
										<td style="width:50%;text-align: left;"><?php echo $guild_info['aliance_guilds']; ?></td>
									</tr>
								</table>
							</td>
						</tr>
						</tbody>
					</table>
					<table class="table dmn-rankings-table table-striped">
						<thead>
						<tr>
							<th>#</td>
							<th><?php echo __('Name'); ?></th>
							<th class="text-center"><?php echo __('Class'); ?></th>
							<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_resets']) == 1){ ?>
							<th class="text-center">
								<?php echo __('Resets'); ?>
								<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_gresets']) == 1){ ?><sup style="color: red;"><?php echo __('GR'); ?></sup><?php } ?>
							</th>
							<?php } ?> 
							<th class="text-center"><?php echo __('LvL'); ?></th>
							<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_master_level']) == 1){ ?>
							<th class="text-center"><?php echo __('ML'); ?></th>
							<?php } ?> 
							<th><?php echo __('Position'); ?></th>
							<th class="text-center"><?php echo __('Status'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
							if(!empty($guild_members)){
								foreach($guild_members as $key => $member){
									?>
									<tr>
										<td style="text-align: center;"><?php echo ($key + 1); ?></td>
										<td>
											<a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($member['name']); ?>/<?php echo $args[1]; ?>"><?php echo $member['name']; ?></a>
											<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_country']) == 1){ ?><span class="f16"><span class="flag <?php echo $member['country'];?>"></span></span><?php } ?>
										</td>
										<td style="text-align: center;"><?php echo $member['class']; ?></td>
										<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_resets']) == 1){ ?>
										<td style="text-align: center;">
											<?php echo $member['resets']; ?>
											<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_gresets']) == 1){ ?><sup style="color: red;"><?php echo $member['gresets']; ?></sup><?php } ?>
										</td>
										<?php } ?> 
										<td style="text-align: center;"><?php echo $member['level']; ?></td>
										<?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_master_level']) == 1){ ?>
										<td style="text-align: center;"><?php echo $member['mlevel']; ?></td>
										<?php } ?> 
										<td><?php echo $member['position']; ?></td>
										<td style="text-align: center;">
										<?php if($member['status'] == 1){ ?>
										<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template');?>/images/online.png" title="Online" />
										<?php  } else { ?>
										<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template');?>/images/offline.png" title="Offline" />
										<?php } ?>
										</td>
									</tr>
									<?php
								}
							} else{
								echo '<tr><td colspan="6"><div class="alert alert-primary" role="alert">' . __('No Members') . '</div></td></tr>';
							}
						?>
						</tbody>
					</table>
					<?php } ?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>