<div class="col-lg-3">
	<div class="pt-15"></div>
	<aside class="sidebar-area sticky-top overflow-hidden">
		<div class="vs-sidebox bg-major-black">
			<h3 class="sidebox-title text-white h5"><?php echo __('Menu'); ?></h3>
			<div>
				<ul class="vs-cat-list1">
					<?php if($this->request->get_method() != 'index' || $this->request->get_controller() != 'account_panel'){ ?>
					<li><a class="pr-10 pl-15" href="<?php echo $this->config->base_url; ?>account-panel"><?php echo __('Account Panel'); ?></a></li>
					<?php } ?>
					<li><a class="pr-10 pl-15" href="<?php echo $this->config->base_url; ?>donate"><?php echo __('Buy Credits'); ?></a></li>
					<li><a class="pr-10 pl-15" href="<?php echo $this->config->base_url; ?>shop"><?php echo __('Shop'); ?></a></li>
					<li><a class="pr-10 pl-15" href="<?php echo $this->config->base_url; ?>shop/cart"><?php echo __('My Cart'); ?></a></li>
					<li><a class="pr-10 pl-15" href="<?php echo $this->config->base_url; ?>warehouse"><?php echo __('Warehouse'); ?></a></li> 						
					<li><a class="pr-10 pl-15" href="<?php echo $this->config->base_url; ?>account-logs"><?php echo __('Account Logs'); ?></a></li>
					<li><a class="pr-10 pl-15" href="<?php echo $this->config->base_url; ?>settings"><?php echo __('Settings'); ?></a></li>
					<?php
						$plugins = $this->config->plugins();
						if(!empty($plugins)){
							if(array_key_exists('merchant', $plugins)){
								if($this->session->userdata(['user' => 'is_merchant']) != 1){
									unset($plugins['merchant']);
								}
							}

							foreach($plugins AS $key => $plugin){
								if($plugin['installed'] == 1 && $plugin['sidebar_user_item'] == 1){
									if(mb_substr($plugin['module_url'], 0, 4) !== "http"){
										$plugin['module_url'] = $this->config->base_url . $plugin['module_url'];
									}
					?>
					<li><a class="pr-10 pl-15" href="<?php echo $plugin['module_url']; ?>"><?php echo __($plugin['about']['name']); ?></a></li>
					<?php
								}
							}
						}
					?>
				</ul>
			</div>
		</div>
	</aside>
</div>