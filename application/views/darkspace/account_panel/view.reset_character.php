<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Reset'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('Reset your character level'); ?></h2>

            <div class="entry">
                <?php
                    if(isset($error)){
                        echo '<div class="e_note">' . $error . '</div>';
                    } else{
                        ?>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th><?php echo __('Character'); ?></th>
                                <th><?php echo __('Res'); ?></th>
                                <th><?php echo __('LvL / Req'); ?></th>
                                <th><?php echo __('Zen / Req'); ?></th>
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
                                        <td><span
                                                    id="resets-<?php echo bin2hex($name); ?>"><?php echo $data['resets']; ?></span>
                                        </td>
                                        <td>
                                            <?php if($data['res_info'] != false){
                                                if($this->session->userdata('vip')){
                                                    $data['res_info']['money'] -= $this->session->userdata(['vip' => 'reset_price_decrease']);
                                                    $data['res_info']['level'] -= $this->session->userdata(['vip' => 'reset_level_decrease']);
                                                }
                                                ?>
                                                <span id="lvl-<?php echo bin2hex($name); ?>">
								        <?php if($data['level'] < $data['res_info']['level']){ ?>
                                            <span style="color: red;"><?php echo $data['level']; ?></span>
                                        <?php } else{ ?>
                                            <?php echo $data['level']; ?><?php } ?>
							            </span> / <?php echo $data['res_info']['level']; ?>
                                            <?php } else{ ?>
                                                <span
                                                        id="lvl-<?php echo bin2hex($name); ?>"><?php echo $data['level']; ?></span> / 0

                                            <?php } ?>
                                        </td>
                                        <td>
                                            <?php echo $this->website->zen_format($data['money']); ?> /
                                            <?php
                                                if($data['res_info'] != false){
                                                    if($data['res_info']['money_x_reset'] == 1){
                                                        $money = $data['res_info']['money'] * ($data['resets'] + 1);
                                                    } else{
                                                        $money = $data['res_info']['money'];
                                                    }
                                                    echo $this->website->zen_format($money);
                                                } else{
                                                    echo 0;
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php if($data['res_info'] != false){ ?>
                                                <a href="#"
                                                   id="reset-char-<?php echo bin2hex($name); ?>"><?php echo __('Reset'); ?></a>
                                            <?php } else{
                                                echo __('Reset Disabled');
                                            } ?>
                                        </td>
                                    </tr>
									<?php 
									if(defined('CUSTOM_RESET_REQ_ITEMS') && CUSTOM_RESET_REQ_ITEMS == true){ 
										if(!empty($data['res_info']['reqItems'])){
											$i = 0;
											echo '<tr><td colspan="5"><table style="width: 100%;" class="ranking-table">';
											foreach($data['res_info']['reqItems'] AS $cat => $reqItems){
												
												foreach($reqItems AS $id => $reqItem){
													$status = $this->website->checkCompletedResetItem($this->session->userdata(['user' => 'username']), $this->session->userdata(['user' => 'server']), bin2hex($name), $id, $data['res_info']['range'], $cat); 
													if($i == 0){
														echo '<tr class="main-tr"><td style="text-align:left;">Req Item</td><td>Skip</td><td>Status</td></tr>';
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
													<a id="skip_reset_item_<?php echo $id;?>_<?php echo bin2hex($name); ?>_<?php echo $data['res_info']['range'];?>_<?php echo $cat;?>" data-action="<?php echo $this->config->base_url;?>account-panel/skip-reset-item" data-info="Price: <?php echo $reqItem['skipPrice'];?> <?php echo $this->website->translate_credits($reqItem['priceType'], $this->session->userdata(['user' => 'server']));?>" href="">Skip</a> 
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
													Cannot Skip
												<?php } ?>
												</td>
											<td>
												<?php
												if($status['is_skipped'] == 0 && $status['is_completed'] == 0){
												?>
												<a id="check_completed_reset_item_<?php echo $id;?>_<?php echo bin2hex($name); ?>_<?php echo $data['res_info']['range'];?>_<?php echo $cat;?>" data-action="<?php echo $this->config->base_url;?>account-panel/check-reset-item" data-info="Item should be located in Web Warehouse" href="" style="color: red;">Check</a>
												
												<?php
												}
												else{
												?>
													<span style="color: green;">Completed</span>
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
							<?php if(defined('CUSTOM_RESET_REQ_ITEMS') && CUSTOM_RESET_REQ_ITEMS == true){  ?>
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
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	