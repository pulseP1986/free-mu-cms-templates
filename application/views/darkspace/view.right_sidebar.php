</div>
</div>
</section>
</main>
<aside class="right-sidebar">
	<div class="blockLogin">
		<?php
		if($this->session->userdata(['user' => 'logged_in'])):
		$credits = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 1, $this->session->userdata(['user' => 'id']));
		$credits2 = $this->website->get_user_credits_balance($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), 2, $this->session->userdata(['user' => 'id']));
		?>
		<div class="blockTitle">
			<p>ACCOUNT</p>
			<span><?php echo _('Welcome'); ?>, <?php echo $this->session->userdata(array('user' => 'username')); ?></span>
		</div>
				<form class="lk-form">
						<div class="lk-coins">
					<span class="coins" id="my_credits"><?php echo number_format($credits2['credits']); ?></span>
					<span class="username"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_2'); ?></span>
				</div>

				<div class="lk-coins">
					<span class="coins" id="my_wcoins"><?php echo number_format($credits['credits']); ?></span>
					<span class="username"><?php echo $this->config->config_entry('credits_' . $this->session->userdata(array('user' => 'server')) . '|title_1'); ?></span>
				</div>
						
				<?php

						if($this->config->values('wcoin_exchange_config', array($this->session->userdata(array('user' => 'server')), 'display_wcoins')) == 1):

				$wcoin = $this->website->get_account_wcoins_balance($this->session->userdata(array('user'=>'server')));

				?>
				
				<div class="lk-coins">
								<span class="coins" id="my_wcoins"><?php echo number_format($wcoin); ?></span>
								<span class="username"><?php echo _('WCoins'); ?>:</span>
						</div>

				<?php endif;?>
				
						<ul>
								<li><a href="<?php echo $this->config->base_url; ?>donate"><?php echo _('Buy Credits'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>shop"><?php echo _('Shop'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo _('My Cart'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>market"><?php echo _('Market'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>warehouse"><?php echo _('Warehouse'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>account-panel"><?php echo _('Account Panel'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>account-logs"><?php echo _('Account Logs'); ?></a></li>
					<li><a href="<?php echo $this->config->base_url; ?>settings"><?php echo _('Settings'); ?></a></li>
					<li><a style="text-decoration:underline" href="<?php echo $this->config->base_url;?>logout"><?php echo _('Logout');?></a></li>
						</ul>
				</form>
		<?php else: ?>
		<div class="blockTitle">
			<p>ACCOUNT</p>
			<span>Account/Character Services</span>
		</div>
		<form class="form-login" id="login_form" method="post" action="<?php echo $this->config->base_url; ?>">	
				<p><input type="text" name="username" id="login_input" class="nick" placeholder="Username"></p>
				<p><input type="password" name="password" id="password_input" class="pass" placeholder="Password"></p>
				<div style="text-align: center;margin-bottom:10px;"><button class="button">Continue</button></div>
				<p class="flex-c-c"><a href="<?php echo $this->config->base_url; ?>lost-password" class="forgot">Lost Password?</a> <a href="<?php echo $this->config->base_url; ?>registration" class="registration">Registration</a></p> 
		</form>
		<?php endif; ?>
	</div><!--block-->
	<?php
		$ranking_config = $this->config->values('rankings_config');
		$i = 0;
		foreach($ranking_config AS $srv => $data){
			if($data['active'] == 1){
				if(isset($data['guild']) && $data['guild']['is_sidebar_module'] == 1){
					echo '<div class="block">
									<div class="blockTitle">
										<p>TOP GUILDS</p>
										<span>The best guilds of our project!</span>
									</div>
							<script>
								$(document).ready(function () {
									App.populateSidebarRanking(\'guilds\', \''.$srv.'\', '.$data['guild']['count_in_sidebar'].');
								});
								</script>
								<div id="top_guilds"></div>
								<br/>
							<span style="margin: 0 auto; display: block; text-align: center; margin-bottom: 1rem;">';
							foreach ($this->website->server_list() as $key => $server){
								if ($server['visible'] == 1  && isset($ranking_config[$key]['guild'])){
										echo '<a href="#" class="custom_button" id="switch_top_players_'.$key.'" data-count="'.$ranking_config[$key]['guild']['count_in_sidebar'].'">'.$server['title'].'</a> ';
								}
							}
					echo '</span></div>';
					
				}			
				$i++;
				if($i == 1){
					break;
				}
			}
		}
		?>
		<?php if($this->config->config_entry('modules|last_market_items_module') == 1): ?>
		<div class="block">
			<div class="blockTitle">
				<p>MARKET</p>
				<span>Latest Market Items</span>
			</div>
			<div class="tableBlock table-event">
				<div class="tableBlock-body">
					<?php
					if($this->session->userdata(['user' => 'logged_in'])):
						$server = $this->session->userdata(['user' => 'server']);
					else:
						$server = array_keys($this->website->server_list())[0];
					endif;
					?>
					<script>
						$(document).ready(function () {
							App.loadLatestItems('<?php echo $server;?>', <?php echo $this->config->config_entry('modules|last_market_items_count');?>, 20);
						});
					</script>
					<div id="lattest_items"></div>
					<br/>
					<span style="margin: 0 auto; display: block; text-align: center; margin-bottom: 1rem;">
					<?php
					foreach($this->website->server_list() as $key => $server):
						if($server['visible'] == 1):
							?>
							<a href="#" class="custom_button" id="switch_items_<?php echo $key; ?>"
							   data-count="<?php echo $this->config->config_entry('modules|last_market_items_count'); ?>"
							   data-limit="20"><?php echo $server['title']; ?></a>
						<?php
						endif;
					endforeach;
					?>
					</span>
				</div>
			</div>		
		</div><!--block-->
		 <?php endif; ?>

</aside>
<!-- right-sidebar -->