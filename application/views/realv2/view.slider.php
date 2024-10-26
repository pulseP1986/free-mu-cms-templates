<?php if(!empty(REALMU_V2_VARS['side_promotion'])){ ?>
<div class="side-promotion dh-md-none">
	<div class="slider-container text-center">
		<?php 
		$i = 0;
		foreach(REALMU_V2_VARS['side_promotion'] AS $promotion){ 
		?>
		<div class="slide image-scale-hover <?php if($i == 0){ ?>active<?php } ?>">
			<a href="<?php echo $promotion['link'];?>">
				<img src="<?php echo $promotion['image'];?>" />
				<div class="caption lh-120">
					<span class="fs-20 text-white mt-5-off" style="text-shadow: 0px 0px 5px #000;"><?php echo __('Promotion');?></span><br/>
					<span class="text-white-50 lh-150"><?php echo __($promotion['name']);?></span>
					<p class="fs-12 text-info mt-0 mb-0"><?php echo __('Ends in');?>:</p>
					<script type="text/javascript">
					<?php $presale_time = new DateTime($promotion['end_time']); ?>
					$(document).ready(function () {
						App.promotionSiegeCountDown("presale_<?php echo $i;?>", <?php echo $presale_time->getTimestamp(); ?>, <?php echo time();?>);
					});
					</script>
					<span class="vs-btn2 outline3" style="width: 90%!important;" id="presale_<?php echo $i;?>"></span>
				</div>
			</a>
		</div>
		<?php 
			$i++;
		} 
		?>
		<div class="slider-navigation">
			<?php 
			$i = 0;
			foreach(REALMU_V2_VARS['side_promotion'] AS $promotion){ 
			?>
			<span class="nav-dot <?php if($i == 0){ ?>active<?php } ?>" data-slide="<?php echo $i;?>"></span>
			<?php 
				$i++;
			} 
			?>
		</div>
	</div>
	<div class="w-100 slide-social">
		<a href="<?php echo REALMU_V2_VARS['discord_link'];?>" target="_blank"><i class="fab fa-discord discord"></i></a>
		<a href="<?php echo REALMU_V2_VARS['instagram_link'];?>" target="_blank"><i class="fab fa-instagram instagram"></i></a>
		<a href="<?php echo REALMU_V2_VARS['facebook_link'];?>" target="_blank"><i class="fab fa-facebook facebook"></i></a>
		<a href="<?php echo REALMU_V2_VARS['youtube_link'];?>" target="_blank"><i class="fab fa-youtube youtube"></i></a>
	</div>
</div>
<?php } ?>