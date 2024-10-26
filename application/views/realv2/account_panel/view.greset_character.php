<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Grand Reset'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Grand Reset your character'); ?></h2>
						<div class="mb-5">
							<?php
							if(isset($error)){
								echo '<div class="alert alert-danger">' . $error . '</div>';
							} else{
								?>
								<script>
									$(document).ready(function () {
										$('a.view_reward').each(function () {
											App.initializeTooltip($(this), false);
										});
									});
								</script>
								<table class="table dmn-rankings-table table-striped">
									<thead>
									<tr>
										<th><?php echo __('Character'); ?></th>
										<th><?php echo __('Res / Req'); ?></th>
										<th><?php echo __('LvL / Req'); ?></th>
										<th><?php echo __('Zen / Req'); ?></th>
										<th><?php echo __('Reward'); ?></th>
										<th><?php echo __('Manage'); ?></th>
									</tr>
									</thead>
									<tbody>
									<?php
										foreach($chars AS $name => $data){
											?>
											<tr>
												<td>
													<a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($name); ?>/<?php echo $this->session->userdata(['user' => 'server']); ?>"><?php echo $name; ?></a>
												</td>
												<td>
													<?php if($data['gres_info'] != false){
														if($this->session->userdata('vip')){
															$data['gres_info']['bonus_credits'] += $this->session->userdata(['vip' => 'grand_reset_bonus_credits']);
															$data['gres_info']['bonus_gcredits'] += $this->session->userdata(['vip' => 'grand_reset_bonus_credits']);
														}
														?>
														<span id="resets-<?php echo bin2hex($name); ?>">
											<?php if($data['resets'] < $data['gres_info']['reset']){ ?>
												<span style="color: red;"><?php echo $data['resets']; ?></span>
											<?php } else{ ?>
												<?php echo $data['resets']; ?><?php } ?>
											</span> / <?php echo $data['gres_info']['reset']; ?>
													<?php } else{ ?>
														<span id="resets-<?php echo bin2hex($name); ?>"><?php echo $data['resets']; ?></span> / 0
													<?php } ?>
												</td>
												<td>
													<?php if($data['gres_info'] != false){ ?>
														<span id="lvl-<?php echo bin2hex($name); ?>">
										<?php if($data['level'] < $data['gres_info']['level']){ ?>
											<span style="color: red;"><?php echo $data['level']; ?></span>
										<?php } else{ ?>
											<?php echo $data['level']; ?><?php } ?>
									</span> / <?php echo $data['gres_info']['level']; ?>
													<?php } else{ ?>
														<span id="lvl-<?php echo bin2hex($name); ?>"><?php echo $data['level']; ?></span> / 0
													<?php } ?>
												</td>
												<td>
													<?php echo $this->website->zen_format($data['money']); ?> /
													<?php
														if($data['gres_info'] != false){
															if($data['gres_info']['money_x_reset'] == 1){
																echo $this->website->zen_format($data['gres_info']['money'] * ($data['resets'] + 1));
															} else{
																echo $this->website->zen_format($data['gres_info']['money']);
															}
														} else{
															echo 0;
														}
													?>
												</td>
												<td>
													<?php
														$reward = '';
														if($data['gres_info'] != false){
															if($data['gres_info']['bonus_credits'] > 0){
																$reward .= $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_1') . ' ' . __('Bonus') . ' + ' . $data['gres_info']['bonus_credits'] . '<br />';
															}
															if($data['gres_info']['bonus_gcredits'] > 0){
																$reward .= $this->config->config_entry('credits_' . $this->session->userdata(['user' => 'server']) . '|title_2') . ' ' . __('Bonus') . ' + ' . $data['gres_info']['bonus_gcredits'] . '<br />';
															}
															if($data['gres_info']['bonus_points_save'] == 1){
																$reward .= __('Stats Bonus') . ' + ' . $this->Mcharacter->bonus_points_by_class($data['Class'], 'gres_info', $data) * ($data['gresets'] + 1) . '<br />';
															} else{
																$reward .= __('Stats Bonus') . ' + ' . $this->Mcharacter->bonus_points_by_class($data['Class'], 'gres_info', $data) . '<br />';
															}
															if($data['gres_info']['bonus_reset_stats'] == 1 && $data['bonus_reset_stats'] > 0){
																$reward .= __('Bonus Stats For Resets') . ' + ' . $data['bonus_reset_stats'] . '<br />';
															}
														}
													?>
													<a class="view_reward" href="#" data-info="<?php echo $reward; ?>"><?php echo __('View Reward'); ?></a>
												</td>
												<td>
													<?php if($data['gres_info'] != false){ ?><a href="#"
																								id="greset-char-<?php echo bin2hex($name); ?>"><?php echo __('Grand Reset'); ?></a><?php } else{
														echo __('Grand Reset Disabled');
													} ?>
												</td>
											</tr>
											<?php 
											if(defined('CUSTOM_GRESET_REQ_ITEMS') && CUSTOM_GRESET_REQ_ITEMS == true){ 
												if(!empty($data['gres_info']['reqItems'])){
													$i = 0;
													echo '<tr><td colspan="6"><table style="width: 100%;" class="ranking-table">';
													foreach($data['gres_info']['reqItems'] AS $cat => $reqItems){
														
														foreach($reqItems AS $id => $reqItem){
															$status = $this->website->checkCompletedGResetItem($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), bin2hex($name), $id, $data['gres_info']['range'], $cat); 
															if($i == 0){
																echo '<tr class="main-tr"><td style="text-align:left;">'.__('Req Item').'</td><td>'.__('Skip').'</td><td>'.__('Status').'</td></tr>';
															}
															 $this->iteminfo->itemData($reqItem['hex']);
											?>
												<tr>
													<td style="text-align:left;"><span id="reset_item_<?php echo $id; ?>" data-info="<?php echo $reqItem['hex']; ?>"><?php echo $this->iteminfo->getNameStyle(true); ?></span></td>
													<td>
														<?php 
														if(isset($reqItem['priceType']) && $reqItem['priceType'] != 0){ 
															if($status['is_skipped'] == 0 && $status['is_completed'] == 0){
														?>
															<a id="skip_reset_item_<?php echo $id;?>_<?php echo bin2hex($name); ?>_<?php echo $data['gres_info']['range'];?>_<?php echo $cat;?>" data-action="<?php echo $this->config->base_url;?>account-panel/skip-greset-item" data-info="<?php echo __('Price');?>: <?php echo $reqItem['skipPrice'];?> <?php echo $this->website->translate_credits($reqItem['priceType'], $this->session->userdata(['user' => 'server']));?>" href=""><?php echo __('Skip');?></a> 
															<?php
															}
															else{
																if($status['is_skipped'] == 1){
																	echo 'Already skipped';
																}
																else{
																	echo 'Already completed.';
																}															
															?>
															
															<?php
															}
															} else { ?>
															<?php echo __('Cannot Skip');?>
														<?php } ?>
														</td>
													<td>
														<?php
														if($status['is_skipped'] == 0 && $status['is_completed'] == 0){
														?>
														<a id="check_completed_reset_item_<?php echo $id;?>_<?php echo bin2hex($name); ?>_<?php echo $data['gres_info']['range'];?>_<?php echo $cat;?>" data-action="<?php echo $this->config->base_url;?>account-panel/check-greset-item" data-info="Item should be located in Web Warehouse" href="" style="color: red;">Check</a>
														
														<?php
														}
														else{
														?>
															<span style="color: green;"><?php echo __('Completed');?></span>
														<?php	
														}
														?>
													</td>
												</tr>											
											<?php 
														$i++;
														}
													}
													echo '</table></td></tr>';
												}
											} 
											?>
											<?php
										}
									?>
									<?php if(defined('CUSTOM_GRESET_REQ_ITEMS') && CUSTOM_GRESET_REQ_ITEMS == true){  ?>
									<script type="text/javascript">
										$(document).ready(function () {
											$('a[id^="skip_reset_item_"], a[id^="check_completed_reset_item_"]').each(function () {
												App.initializeTooltip($(this), false);
											});
											$('span[id^="reset_item_"]').each(function () {
												App.initializeTooltip($(this), true, 'warehouse/item_info_image');
											});
											$('a[id^="skip_reset_item_"]').on('click', function (e) {
												e.preventDefault();
												if($(this).data('action') != ''){	
												 var id = $(this).attr('id').split('_')[3];
												 var cc = $(this).attr('id').split('_')[4];
												 var range = $(this).attr('id').split('_')[5];
												 var cat = $(this).attr('id').split('_')[6];
												 var that = $(this).attr('id');
												 var action = $(this).data('action');
												 $(this).data('action', '');	
												 
													 $.ajax({
														url: action,
														data: {id: id, Char: cc, range: range, cat: cat},
														success: function (data) {
															if (data.error) {
																$('#'+that).data('action', action);		
																App.notice(App.lc.translate('Error').fetch(), 'error', data.error);
															}
															else {
																$('#'+that).parent().html('Already skipped.');
																$('#check_completed_reset_item_'+id+'_'+cc+'_'+range).html('<span style="color: green;">Completed</span>');
																App.notice(App.lc.translate('Success').fetch(), 'success', data.success);
															}
														}
													});
												 }
											});
											
											$('a[id^="check_completed_reset_item_"]').on('click', function (e) {
												e.preventDefault();
												if($(this).data('action') != ''){	
													var id = $(this).attr('id').split('_')[4];
													var cc = $(this).attr('id').split('_')[5];
													var range = $(this).attr('id').split('_')[6];
													 var cat = $(this).attr('id').split('_')[7];
													var that = $(this).attr('id');
													var action = $(this).data('action');
													$(this).data('action', '');	

													$.ajax({
														url: action,
														data: {id: id, Char: cc, range: range, cat: cat},
														success: function (data) {
															if (data.error) {
																$('#'+that).data('action', action);		
																App.notice(App.lc.translate('Error').fetch(), 'error', data.error);
															}
															else {
																$('#'+that).parent().html('<span style="color: green;">Completed</span>');
																App.notice(App.lc.translate('Success').fetch(), 'success', data.success);
															}
														}
													});
												}
											});
										});
									</script>
									<?php } ?>	
									</tbody>
								</table>
								<?php
							}
						?>
						</div>
					</div>	
				</div>	
			</div>
		</div>
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>