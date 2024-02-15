<?php
    $body = '';
    if($this->request->get_method() == 'index' && $this->request->get_controller() == 'home') {
        $body = 'home';
    }
?>
        </div><!--topHomeBlocks-->
        <?php if($body == 'home') { ?>
            <br>
            <br>
            <div class="flex-s">
<div class="row" style="width: 100%;">
<div class="col-xl-4 col-md-4 col-sm-6">
<a href="<?php echo $this->config->base_url; ?>free-rewards" class="socButton socYoutube" style="margin-left: calc(50% - 183px);">
Rewards <span>Check and claim all your<br>free rewards now!</span>
<div class="reward-light"></div>
<div class="reward-light-icon"></div>
</a>
</div>
<div class="col-xl-4 col-md-4 col-sm-6">
<a href="<?php echo $this->config->base_url; ?>guides" class="socButton socDiscord" style="margin-left: calc(50% - 183px);">
Guides <span>Starter guides,<br>droplist &amp; tutorials</span>
</a>
</div>
<div class="col-xl-4 col-md-4 col-sm-6">
<a href="https://" target="_blank" class="socButton socFacebook" style="margin-left: calc(50% - 183px);">
Discord
<span>Free WCoin, giveaways,<br>market &amp; more!</span>
</a>
</div>
</div>
</div>
<?php

$ranking_config = $this->config->values('rankings_config');

$serverList = $this->website->server_list();

?>
	<div class="mainHomeBlockPlugin flex-s">
		<div class="blockHomePlugin ">
			<div class="h2-title h2-title-table flex-s-c">
				<span class="colorfull"><?php echo __('Castle Seige');?></span>
				<div class="tabTable">
					<a class="tabTable-button-cs active" data-tab="castle-owner"><?php echo __('Owner');?></a> 
					<a class="tabTable-button-cs" data-tab="castle-info"><?php echo __('Info');?></a>
				</div>
			</div>
			<div class="table tabTable-block-cs active" id="castle-owner">
				<div class="tableBlock">
				<?php

				$i = 0;

				foreach($this->website->server_list() as $key => $server){

					$cs_info = $this->website->get_cs_info($key);

				?>
				<div id="cs-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>
					<table>
						<tbody>
							<tr>
								<td>
									<table>
										<tbody>
											<tr>
												<td style="width: 20%!important;"></td>
												<td style="width: 30%!important;">
												<img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $cs_info['mark'];?>/60">					
												</td>
												<td>
												<br>
												<span><?php echo __('Status');?>: </span><?php if($cs_info['guild'] != '' && $cs_info['guild'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?><br>
												<span><?php echo __('Castle Owner');?>: </span> <?php echo $cs_info['guild'];?><br>
												<span><?php echo __('Guild Master');?>: </span> <?php echo $cs_info['owner'];?>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php
				$i++;
				}
				?>
				</div>				
			</div>		
			<div class="table tabTable-block-cs" id="castle-info">
				<div class="tableBlock">
				<?php
				$i = 0;
				foreach($this->website->server_list() as $key => $server){
				?>
					<div id="cs-info-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>
					<h3 style="margin-top: -5px;"><?php echo __('Guilds Registered for Battle');?></h3>
					<ul style="margin: 5px;">
					<?php
					
						$csGuilds = $this->website->get_cs_guild_list($key);

					?>
						<?php 
						if(!empty($csGuilds)){ 
							foreach($csGuilds AS $cguild){
						?>
							<a><?php echo $cguild['REG_SIEGE_GUILD'];?></a>
						<?php 
							}
						} 
						else 
						{ 
						?>
						<ul><a><?php echo __('No guilds registered');?></a></ul> 
						<?php } ?>
					</ul>
					<br>
					<p style="color: #cc7954; font-size: 12px; font-style: italic; margin-top: 10px;"><?php echo __('Until Siege');?>:
					<span id="cs_time_<?php echo $key;?>"></span>
					<script type="text/javascript">
						$(document).ready(function () {
							App.castleSiegeCountDown("cs_time_<?php echo $key;?>", <?php echo $cs_info['battle_start'];?>, <?php echo time();?>);
						});
					</script>
					</p>
					</div>
				<?php
					$i++;
				}

				?>	
				</div>
			</div>
			<script>
			$(document).ready(function () {
				$('.tabTable-button-cs').on('click', function(){
					$('.tabTable-button-cs').removeClass('active');
					$(this).addClass('active');
					$('.tabTable-block-cs').removeClass('active');
					$('#' + $(this).attr('data-tab')).addClass('active');
				});
				$(".cstab li").on('click', function (e) {
					$(this).addClass("selected").siblings().removeClass("selected");
					e.preventDefault();
					var server = $(this).children('a').data('server');
					$('[id^="cs-details-"]').hide();
					$('[id^="cs-info-"]').hide();
					$('#cs-details-'+server).show();
					$('#cs-info-'+server).show();
				});
			});
			</script>
				<?php if(count($serverList) > 1){ ?>
                <div class="float-right" style="margin-top: 15px;">
                    <?php
						$i = 0;
						foreach($serverList as $key => $server){
                            if($server['visible'] == 1){
                                $selectd = ($i == 0) ? 'class="selected"' : '';
                                ?>
									<a style="border: 1px solid #5e2f18; padding: 1px 15px; height: 10px; color: #c76b28; " href="#" data-server="<?php echo $key;?>"><?php echo $server['title']; ?></a>
                                <?php
                            }
							$i++;
                        }
                    ?>
                </div>	
				<?php } ?>
			
		</div>	
		<div class="blockHomePlugin">
				<div class="h2-title h2-title-table flex-s-c">
					<span class="colorfull"><?php echo __('Arka');?></span>
					<div class="tabTable">
						<a class="tabTable-button-arca active" data-tab="arca-conqueror"><?php echo __('Conqueror');?></a> 
						<a class="tabTable-button-arca" data-tab="arca-info"><?php echo __('Info');?></a>
					</div>
				</div>
				<div class="table tabTable-block-arca active" id="arca-conqueror">
					<div class="tableBlock">
					<?php

					$i = 0;

					foreach($this->website->server_list() as $key => $server){

						$arca_info = $this->website->getArcaWinners($key);

					?>
					<div id="arca-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>

						<div>

							<?php

							if(!empty($arca_info)){

								foreach($arca_info AS $arca){

							?>
					<table>
				<tbody><tr>
					<td>
					<h3><?php echo $arca['OuccupyObelisk'];?></h3>
				<table>
						<tbody>
							<tr>
						<td><img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $arca_info['mark'];?>/60"></td>
					<td>
						<span><?php echo __('Status');?>: </span><span style="color: yellow ;"><?php if($arca['G_Name'] != '' && $arca['G_Name'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?></span><br>
						<span><?php echo __('Guild');?>: </span><?php echo $arca['G_Name'];?><br>
						<span><?php echo __('Guild Master');?>: </span><?php echo $arca['G_Master'];?>
					</td>
							</tr>
						</tbody>
				</table>
					</td>
					<td>
					<h3><?php echo $arca['OuccupyObelisk'];?></h3>
				<table>
				<tbody>
						<tr>
						<td><img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $arca_info['mark'];?>/60"></td>
					<td>
						<span><?php echo __('Status');?>: </span><span style="color: yellow ;"><?php if($arca['G_Name'] != '' && $arca['G_Name'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?></span><br>
						<span><?php echo __('Guild');?>: </span><?php echo $arca['G_Name'];?><br>
						<span><?php echo __('Guild Master');?>: </span><?php echo $arca['G_Master'];?>
					</td>
						</tr>
				</tbody>		
				</table>
					</td>
						</tr>
				</tbody></table>
							<?php
								}
							}
							else{
								echo '<div style="margin:5px;"><div class="alert alert-primary" role="alert">Not active</div></div>';
							}
							?>				
						</div>
					</div>
						<?php
							$i++;
						}
						?>
					</div>
					
				</div>	
					<div class="table tabTable-block-arca" id="arca-info">
						<div class="tableBlock">
						<h3 style="margin-top: -5px;"><?php echo __('Guilds Registered for Battle');?></h3>
						<ul>
						<?php
							$arcaGuilds = $this->website->arcaGuildList($key);

						?>
							<?php 
							if(!empty($arcaGuilds)){ 
								foreach($arcaGuilds AS $aguild){
							?>
								<a><?php echo $aguild['G_Name'];?>, </a>
							<?php 
								}
							} 
							else 
							{ 
							?>
							<a><?php echo __('No guilds registered');?></a> 
							<?php } ?>
						
						</ul>
							<br>
							
									<p style="color: #cc7954; font-size: 12px; font-style: italic; margin-top: 10px;"><?php echo __('Next War');?>:
									<span id="arca_time_<?php echo $key;?>"></span>

									<?php $arcatime = new DateTime('next Wednesday'); ?>

									<script type="text/javascript">

										$(document).ready(function () {

											App.castleSiegeCountDown("arca_time_<?php echo $key;?>", <?php echo $arcatime->modify('+ 21 hour')->getTimestamp(); ?>, <?php echo time();?>);

										});

									</script>
									</p>
						</div>
					</div>
				<script>
				$(document).ready(function () {
					$('.tabTable-button-arca').on('click', function(){
						$('.tabTable-button-arca').removeClass('active');
						$(this).addClass('active');
						$('.tabTable-block-arca').removeClass('active');
						$('#' + $(this).attr('data-tab')).addClass('active');
					});
					$(".awtab li").on('click', function (e) {
						$(this).addClass("selected").siblings().removeClass("selected");
						e.preventDefault();
						var server = $(this).children('a').data('server');
						$('[id^="arca-details-"]').hide();
						$('[id^="arcaw-info-"]').show();
						$('#arca-details-'+server).hide();
						$('#arcaw-info-'+server).show();
					});
				});
				</script>
				<?php if(count($serverList) > 1){ ?>
                <div class="float-right" style="margin-top: 15px;">
                    <?php
						$i = 0;
						foreach($serverList as $key => $server){
                            if($server['visible'] == 1){
                                $selectd = ($i == 0) ? 'class="selected"' : '';
                                ?>
									<a style="border: 1px solid #5e2f18; padding: 1px 15px; height: 10px; color: #c76b28; " href="#" data-server="<?php echo $key;?>"><?php echo $server['title']; ?></a>
                                <?php
                            }
							$i++;
                        }
                    ?>
                </div>	
				<?php } ?>
		</div>	
		<div class="blockHomePlugin">
				<div class="h2-title h2-title-table text-shadow flex-s-c">
					<span class="colorfull"><?php echo __('Ice Valley Lord');?></span>
					<div class="tabTable">
						<a class="tabTable-button-ice active" data-tab="ice-owner"><?php echo __('Owner');?></a> 
						<a class="tabTable-button-ice" data-tab="ice-info"><?php echo __('Info');?></a>
					</div>
				</div>	
				<div class="table tabTable-block-ice active" id="ice-owner">
					<div class="tableBlock">

					<?php

					$i = 0;

					foreach($this->website->server_list() as $key => $server){

						$ice_info = $this->website->getIceWindWinners($key);

					?>
					<div id="ice-details-<?php echo $key;?>" <?php if($i != 0){ echo 'style="display:none;"'; } ?>>					
					<table>
					<tbody><tr>
					<td>
					<table>
					<tbody><tr>		
					<td style="width: 20%!important;"></td>
					<td style="width: 30%!important;">
							<img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo urlencode(bin2hex($ice_info['G_Mark']));?>/60">
					</td>
					<td>
					<br>
						<span><?php echo __('Status');?>: </span><span style="color: yellow ;"><?php if($ice_info['G_Name'] != '' && $ice_info['G_Name'] != null){ echo __('Occupied'); } else { echo __('Unoccupied'); } ?></span><br>
						<span><?php echo __('Guild');?>:</span> <?php echo $ice_info['G_Name'];?><br>
						<span><?php echo __('Guild Master');?>:</span> <?php echo $ice_info['G_Master'];?></td>
					</tr>
					</tbody></table>
					</td>
					</tr>
					</tbody></table>
					</div>
					<?php

					$i++;

					}

					?>
					</div>
				</div>
				<div class="table tabTable-block-ice" id="ice-info">
					<div class="tableBlock">
						<h3 style="margin-top: -5px;"><?php echo __('Guilds Registered for Battle');?></h3>
						<ul>
						<?php
	
							$iceGuilds = $this->website->iceWindGuildList($key);

						?>
							<?php 
							if(!empty($iceGuilds)){ 
								foreach($iceGuilds AS $iguild){
							?>
								<a><?php echo $iguild['G_Name'];?></a>
							<?php 
								}
							} 
							else 
							{ 
							?>
							<a><?php echo __('No guilds registered');?></a> 
							<?php } ?>
						</ul>
						<br>
								<p style="color: #cc7954; font-size: 12px; font-style: italic; margin-top: 10px;"><?php echo __('Next Battle');?>:
								<span id="ice_time_<?php echo $key;?>"></span>
								<?php $icetime = new DateTime('next Saturday'); ?>

									<script type="text/javascript">

										$(document).ready(function () {

											App.castleSiegeCountDown("ice_time_<?php echo $key;?>", <?php echo $icetime->modify('+ 21 hour')->getTimestamp(); ?>, <?php echo time();?>);

										});

									</script>
								</p>
						</div>
					</div>
			<script>
			$(document).ready(function () {
				$('.tabTable-button-ice').on('click', function(){
					$('.tabTable-button-ice').removeClass('active');
					$(this).addClass('active');
					$('.tabTable-block-ice').removeClass('active');
					$('#' + $(this).attr('data-tab')).addClass('active');
				});
				$(".icetab li").on('click', function (e) {
					$(this).addClass("selected").siblings().removeClass("selected");
					e.preventDefault();
					var server = $(this).children('a').data('server');
					$('[id^="ice-details-"]').hide();
					$('[id^="icew-info-"]').hide();
					$('#ice-details-'+server).show();
					$('#icew-info-'+server).show();
				});
			});
			</script>
				<?php if(count($serverList) > 1){ ?>
                <div class="float-right" style="margin-top: 15px;">
                    <?php
						$i = 0;
						foreach($serverList as $key => $server){
                            if($server['visible'] == 1){
                                $selectd = ($i == 0) ? 'class="selected"' : '';
                                ?>
									<a style="border: 1px solid #5e2f18; padding: 1px 15px; height: 10px; color: #c76b28; " href="#" data-server="<?php echo $key;?>"><?php echo $server['title']; ?></a>
                                <?php
                            }
							$i++;
                        }
                    ?>
                </div>	
				<?php } ?>
				</div>
</div>
            <span class="line"></span>
            <div class="mainHomeBlock flex-s">
                <div class="rankings blockHome">
                    <div class="h2-title h2-title-table flex-s-c">
                        <span>Top Players</span>
                    </div><!--h2-title-->
                    <?php
                        
                        $i = 0;
                        foreach($ranking_config AS $srv => $data){
                            if($data['active'] == 1) {
                                if(isset($data['player']) && $data['player']['is_sidebar_module'] == 1){
                                    echo '
                                    <div class="table tabTable-block active" id="players">
                                        <div class="tableBlock">
                                            <script>
                                                $(document).ready(function () {
                                                    App.populateSidebarRanking(\'players\', \'' . $srv . '\', ' . $data['player']['count_in_sidebar'] . ');
                                                });
                                            </script>
                                            <div id="top_players"></div> ';
                                    echo '<div style="clear:both;"></div></div></div>';
                                }

                                $i++;
                                if($i == 1){
                                    break;
                                }
                            }
                        }
                    ?>
					<?php if(count($serverList) > 1){ ?>
					<div class="float-right" style="margin-top: 15px;">
						<?php
							$i = 0;
							foreach($serverList as $key => $server){
								if($server['visible'] == 1){
									?>
										<a class="switchPlayers" style="border: 1px solid #5e2f18; padding: 1px 15px; height: 10px; color: #c76b28; " href="#" data-server="<?php echo $key;?>" data-count="10"><?php echo $server['title']; ?></a>
									<?php
								}
								$i++;
							}
						?>
					</div>	
					<script>
					$(document).ready(function () {
						$(".switchPlayers").on('click', function (e) {
							e.preventDefault();
							var server = $(this).data('server');
							var count_in_sidebar = $(this).data('count');
							App.populateSidebarRanking('players', server, count_in_sidebar);
						});
					});
					</script>
					<?php } ?>
                </div><!--rankings-->
                <div class="rankings blockHome">
                    <div class="h2-title h2-title-table flex-s-c">
                        <span>Top Guilds</span>
                    </div><!--h2-title-->
                    <?php
                        
                        $i = 0;
                        foreach($ranking_config AS $srv => $data){
                            if($data['active'] == 1) {
                                if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
                                    echo '
                                    <div class="table tabTable-block active" id="guilds">
                                        <div class="tableBlock">
                                        <script>
                                        $(document).ready(function () {
                                            App.populateSidebarRanking(\'guilds\', \'' . $srv . '\', ' . $data['guild']['count_in_sidebar'] . ');
                                        });
                                        </script>
                                        <div id="top_guilds"></div> ';
                                    echo '<div style="clear:both;"></div></div></div>';
                                }
                                $i++;
                                if($i == 1){
                                    break;
                                }
                            }
                        }
                    ?>
					<?php if(count($serverList) > 1){ ?>
					<div class="float-right" style="margin-top: 15px;">
						<?php
							$i = 0;
							foreach($serverList as $key => $server){
								if($server['visible'] == 1){
									?>
										<a class="switchGuilds" style="border: 1px solid #5e2f18; padding: 1px 15px; height: 10px; color: #c76b28; " href="#" data-server="<?php echo $key;?>" data-count="10"><?php echo $server['title']; ?></a>
									<?php
								}
								$i++;
							}
						?>
					</div>	
					<script>
					$(document).ready(function () {
						$(".switchGuilds").on('click', function (e) {
							e.preventDefault();
							var server = $(this).data('server');
							var count_in_sidebar = $(this).data('count');
							App.populateSidebarRanking('guilds', server, count_in_sidebar);
						});
					});
					</script>
					<?php } ?>
                </div><!--rankings-->
                <div class="rankings blockHome">
                    <div class="h2-title h2-title-table flex-s-c">
                        <span><?php echo __('Top PvP');?></span>
                    </div><!--h2-title-->
                    <div class="tableBlock">

					<?php

					foreach($ranking_config AS $srv => $data){

						if($data['active'] == 1){

							if(isset($data['duels']) && $data['duels']['is_sidebar_module'] == 1){

								echo '<script>

										$(document).ready(function () {

											App.populateSidebarRanking(\'pvp\', \'' . $srv . '\', ' . $data['duels']['count_in_sidebar'] . ');

										});

										</script>

										<div id="top_pvp"></div>';

							}

						}

						break;

					}

					?>	
					<?php if(count($serverList) > 1){ ?>
					<div class="float-right" style="margin-top: 15px;">
						<?php
							$i = 0;
							foreach($serverList as $key => $server){
								if($server['visible'] == 1){
									?>
										<a class="switchPvp" style="border: 1px solid #5e2f18; padding: 1px 15px; height: 10px; color: #c76b28; " href="#" data-server="<?php echo $key;?>" data-count="10"><?php echo $server['title']; ?></a>
									<?php
								}
								$i++;
							}
						?>
					</div>	
					<script>
					$(document).ready(function () {
						$(".switchPvp").on('click', function (e) {
							e.preventDefault();
							var server = $(this).data('server');
							var count_in_sidebar = $(this).data('count');
							App.populateSidebarRanking('pvp', server, count_in_sidebar);
						});
					});
					</script>
					<?php } ?>
				</div>
                    </div>
                </div><!--rankings-->
            </div><!--mainHomeBlock-->
        <?php } ?>

    </main>
</div><!--wrapper-->