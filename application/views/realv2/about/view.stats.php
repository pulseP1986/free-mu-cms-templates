<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title font-theme h4 mt-25-sm mb-5-off" style="display:flex;justify-content: space-between;">
				<h2><?php echo strtoupper($title); ?> <?php echo __('Server Statistics'); ?></h2>
				<span>
					<?php
						foreach($this->website->server_list() as $key => $srv){
							if($srv['visible'] == 1){
					?>
								<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>about/stats/<?php echo $key; ?>"><?php echo $srv['title']; ?> <?php echo __('Statistics'); ?></a>
					<?php
							}
						}
					?>
				</span>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row mt-1">
				<div class="col-lg-12">     
					<table class="table dmn-rankings-table table-striped">
                        <thead>
							<tr>
								<th colspan="2"><?php echo $title; ?> <?php echo __('Server Statistics'); ?></th>
							</tr>
                        </thead>
                        <tbody>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Total Accounts'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $stats['accounts']; ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Total Characters'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $stats['chars']; ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Total Guilds'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $stats['guilds']; ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Total Gms'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $stats['gms']; ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Total Online'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $stats['online']; ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Active In 24 Hours'); ?></td>
								<td style="width:50%;text-align: left;" class="end"><?php echo $stats['active']; ?></td>
							</tr>
                        </tbody>
                    </table>
				</div>	
			</div>
			<div class="row mt-1">
				<div class="col-lg-12">     
					<?php
					if($this->config->config_entry('market|module_status') == 1){
					?>
					<table class="table dmn-rankings-table table-striped">
						<thead>
						<tr>
							<th colspan="2"><?php echo $title; ?> <?php echo __('Server Market Statistics'); ?></th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td style="width:50%;text-align: left;"><?php echo __('Total Items'); ?></td>
							<td style="width:50%;text-align: left;"><?php echo $stats['market_items']; ?></td>
						</tr>
						<tr>
							<td style="width:50%;text-align: left;"><?php echo __('Active Items'); ?></td>
							<td style="width:50%;text-align: left;"><?php echo $stats['market_active']; ?></td>
						</tr>
						<tr>
							<td style="width:50%;text-align: left;"><?php echo __('Expired Items'); ?></td>
							<td style="width:50%;text-align: left;"><?php echo $stats['market_expired']; ?></td>
						</tr>
						<tr>
							<td style="width:50%;text-align: left;"><?php echo __('Total Sold'); ?></td>
							<td style="width:50%;text-align: left;"><?php echo $stats['total_sold']; ?></td>
						</tr>
						<tr>
							<td style="width:50%;text-align: left;"><?php echo __('Total Sales For'); ?><?php echo $this->config->config_entry('credits_' . $server . '|title_1'); ?></td>
							<td style="width:50%;text-align: left;"><?php echo $stats['sales_credits']; ?></td>
						</tr>
						<tr>
							<td style="width:50%;text-align: left;"><?php echo __('Total Sales For'); ?><?php echo $this->config->config_entry('credits_' . $server . '|title_2'); ?></td>
							<td style="width:50%;text-align: left;"><?php echo $stats['sales_gcredits']; ?></td>
						</tr>
						<tr>
							<td style="width:50%;text-align: left;"><?php echo __('Total Sales For'); ?><?php echo $this->config->config_entry('credits_' . $server . '|title_3'); ?></td>
							<td style="width:50%;text-align: left;"
								class="end"><?php echo $this->website->zen_format($stats['sales_zen']); ?></td>
						</tr>
						</tbody>
					</table>
					<?php } ?>
				</div>	
			</div>	
			<?php if(MU_VERSION >= 1){ ?>	
			<div class="row mt-1">
				<div class="col-lg-12">     
					<table class="table dmn-rankings-table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2"><?php echo __('CryWolf Info'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width:50%;text-align: left;"><?php echo __('Status Of The Fortress'); ?></td>
                            <td style="width:50%;text-align: left;" class="end"><?php echo $crywolf_state; ?></td>
                        </tr>
                        </tbody>
                    </table>
				</div>	
			</div>	
			<?php } ?>	
			<div class="row mt-1">
				<div class="col-lg-12">     
					<table class="table dmn-rankings-table table-striped">
                        <thead>
                        <tr>
                            <th colspan="2"><?php echo __('Castle Siege Info'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if($cs_info != false){ ?>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Owner Guild'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo ($cs_info['guild'] != null) ? $cs_info['guild'] : __('No Owner'); ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('State'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $cs_info['period']; ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Time'); ?></td>
								<td style="width:50%;text-align: left;"><span id="cs_countdown"></span>
									<script type="text/javascript">$(document).ready(function () {
											App.castleSiegeCountDown("cs_countdown", <?php echo $cs_info['battle_start'];?>, <?php echo time();?>);
										});</script>
								</td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Money'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $this->website->zen_format($cs_info['money']); ?> <?php echo __('Zen'); ?></td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Tax Chaos'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $cs_info['tax_chaos']; ?>%</td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Tax Store'); ?></td>
								<td style="width:50%;text-align: left;"><?php echo $cs_info['tax_store']; ?>%</td>
							</tr>
							<tr>
								<td style="width:50%;text-align: left;"><?php echo __('Tax Hunt Zone'); ?></td>
								<td style="width:50%;text-align: left;"
									class="end"><?php echo $cs_info['tax_hunt']; ?> <?php echo __('Zen'); ?></td>
							</tr>
						<?php } else{ ?>
							<tr>
								<td colspan="2">
									<div class="alert alert-primary" role="alert"><?php echo __('Castle Siege Not Active.'); ?></div>
								</td>
							</tr>
						<?php } ?>
                        </tbody>
                    </table>
                    <table class="table dmn-rankings-table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo __('Guild'); ?></th>
                            <th><?php echo __('Master'); ?></th>
                            <th><?php echo __('Reg Marks'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(!empty($cs_guild_list)){
                                foreach($cs_guild_list as $key => $guild){
                                    ?>
                                    <tr>
                                        <td><?php echo ($key + 1); ?></td>
                                        <td>
											<a href="<?php echo $this->config->base_url; ?>guild/<?php echo bin2hex($guild['REG_SIEGE_GUILD']); ?>/<?php echo $server; ?>"><?php echo $guild['REG_SIEGE_GUILD']; ?></a>
                                        </td>
                                        <td>
											<a style="font-size:12px; font-weight:bold; color:#555555;" href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($guild['G_Master']); ?>/<?php echo $server; ?>"><?php echo $guild['G_Master']; ?></a>
                                        </td>
                                        <td><?php echo $guild['REG_MARKS']; ?></td>
                                    </tr>
                                    <?php
                                }
                            } else{
                                echo '<tr><td colspan="4"><div class="alert alert-primary" role="alert">' . __('No Registered Guilds') . '</div></td></tr>';
                            }
                        ?>
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