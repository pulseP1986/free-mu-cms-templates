<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Buy vip'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Buy vip status.'); ?></h2>
				</div>	
			</div>	
			<?php if(!empty($vip_packages)){ ?>
			<div class="row">
				<?php
				$i = 0;
				foreach($vip_packages AS $vip_data){
					$i++;
				?>
				<div class="col-4 mb-1">  
					<div class="card bg-success mb-5 mb-lg-0" style="border-radius: 0px !important;">
						<div class="card-header">
							<h5 class="card-title text-white-50 text-uppercase text-center"><?php echo $vip_data['package_title']; ?></h5>
							<h6 class="h1 text-white text-center"><?php echo $vip_data['price']; ?><span class="h6 text-white-50"> <?php echo $this->website->translate_credits($vip_data['payment_type'], $vip_data['server']); ?></span></h6>
						</div>
						<div class="card-body bg-light">
							<ul class="list-unstyled mb-4">
								<li class="mb-3"><span class="mr-3"><i class="fas fa-check text-success"></i></span><?php echo $this->website->seconds2days($vip_data['vip_time']); ?></li>
								<li class="mb-3<?php if($vip_data['reset_price_decrease'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['reset_price_decrease'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Reset Zen Discount'); ?></li>
								<li class="mb-3<?php if($vip_data['reset_level_decrease'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['reset_level_decrease'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Reset Level Decrease'); ?></li>
								<li class="mb-3<?php if($vip_data['reset_bonus_points'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['reset_bonus_points'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Reset Bonus Points'); ?></li>
								<li class="mb-3<?php if($vip_data['grand_reset_bonus_credits'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['grand_reset_bonus_credits'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Grand Reset Bonus Credits'); ?></li>
								<li class="mb-3<?php if($vip_data['hide_info_discount'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['hide_info_discount'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Hide Character Info Discount'); ?></li>
								<li class="mb-3<?php if($vip_data['pk_clear_discount'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['pk_clear_discount'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('PK Clear Discount'); ?></li>
								<li class="mb-3<?php if($vip_data['clear_skilltree_discount'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['clear_skilltree_discount'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Clear SkillTree Discount'); ?></li>
								<li class="mb-3<?php if($vip_data['online_hour_exchange_bonus'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['online_hour_exchange_bonus'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Online Hours Exchange Bonus Credits'); ?></li>
								<li class="mb-3<?php if($vip_data['change_name_discount'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['change_name_discount'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Change Character Name Discount'); ?></li>
								<li class="mb-3<?php if($vip_data['change_class_discount'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['change_class_discount'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Change Character Class Discount'); ?></li>
								<li class="mb-3<?php if($vip_data['bonus_credits_for_donate'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['bonus_credits_for_donate'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Bonus Credits For Donation'); ?></li>
								<li class="mb-3<?php if($vip_data['shop_discount'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['shop_discount'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Shop Discount'); ?></li>
								<li class="mb-3<?php if($vip_data['wcoins'] <= 0){ ?> text-muted<?php } ?>"><span class="mr-3"><i class="fas <?php if($vip_data['wcoins'] <= 0){ ?>fa-times<?php } else { ?>fa-check text-success <?php } ?>"></i></span><?php echo __('Bonus WCoins'); ?></li>
							</ul>
							<a href="<?php echo $this->config->base_url . 'shop/buy-vip/' . $vip_data['id']; ?>" class="btn btn-block btn-primary text-uppercase rounded-lg py-3"><?php echo __('Buy now');?></a>
						</div>
					</div>
				</div>	
				<?php } ?>
			</div>
			<?php } ?>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>