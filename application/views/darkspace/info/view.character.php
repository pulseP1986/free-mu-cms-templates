<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Info'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title">
                <?php $args = $this->request->get_args(); ?>
                <?php echo sprintf(__('Character %s Info'), $this->website->hex2bin($args[0])); ?>
            </h2>

            <div class="entry">
                <?php
                    if(isset($error)){
                        echo '<div class="e_note">' . $error . '</div>';
                    } else{
                        ?>
                        <?php
                    if(!$hidden){
                        ?>
                        <script>
                            $(document).ready(function () {
                                $('#inventoryc div, #inventory div').each(function () {
                                    App.initializeTooltip($(this), true, 'warehouse/item_info');
                                });
								$('div[id^="item-slot-occupied-"]').each(function(){
									App.initializeTooltip($(this), true, 'warehouse/item_info');
								});
								$('.hover_inv div img').each(function(){
									App.initializeTooltip($(this), true, 'warehouse/item_info');
								});
                            });
							
                        </script>
                    <?php
                        }
                    ?>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th colspan="2"
                                    style="padding-left: 15px;"><?php echo __('Information'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="width: 70px;">
                                    <img
                                            src="<?php echo $this->config->base_url; ?>assets/default_assets/images/c_class/<?php echo strtolower($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png"
                                            alt="<?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?>"/>
                                </td>
                                <td style="width: 240px;">
                                    <table style="width:100%;margin: 0 auto;">
                                        <tr>
                                            <td style="width:50%;text-align: left;"><?php echo __('Character'); ?></td>
                                            <td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['Name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:50%;text-align: left;"><?php echo __('Class'); ?></td>
                                            <td style="width:50%;text-align: left;"><?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?></td>
                                        </tr>
                                        <tr>
                                            <td style="width:50%;text-align: left;"><?php echo __('Level'); ?></td>
                                            <td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['cLevel']; ?></td>
                                        </tr>
                                        <?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_master_level']) == 1): ?>
                                            <tr>
                                                <td style="width:50%;text-align: left;"><?php echo __('MasterLevel'); ?></td>
                                                <td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['mlevel']; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_resets']) == 1): ?>
                                            <tr>
                                                <td style="width:50%;text-align: left;"><?php echo __('Resets'); ?></td>
                                                <td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['resets']; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_gresets']) == 1): ?>
                                            <tr>
                                                <td style="width:50%;text-align: left;"><?php echo __('Grand Reset'); ?></td>
                                                <td style="width:50%;text-align: left;"><?php echo $this->Mcharacter->char_info['grand_resets']; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <tr>
                                            <td style="width:50%;text-align: left;"><?php echo __('PK Level'); ?></td>
                                            <td style="width:50%;text-align: left;"><?php echo $this->website->pk_level($this->Mcharacter->char_info['PkLevel']); ?>
                                                (<?php echo $this->Mcharacter->char_info['PkCount']; ?>)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:50%;text-align: left;"><?php echo __('Location'); ?></td>
                                            <td style="width:50%;text-align: left;">
                                                <?php
                                                    if($hidden){
                                                        echo __('Hidden');
                                                    } else{
                                                        ?>
                                                        <?php echo $this->website->get_map_name($this->Mcharacter->char_info['MapNumber']); ?> (<?php echo $this->Mcharacter->char_info['MapPosX']; ?>x<?php echo $this->Mcharacter->char_info['MapPosY']; ?>)
                                                        <?php
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:50%;text-align: left;"><?php echo __('Status'); ?></td>
                                            <td style="width:50%;text-align: left;">
                                                <?php
                                                    if($status != false){
                                                        if($status['ConnectStat'] == 1){
                                                            echo '<img src="' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/online.png" alt="' . __('Online') . '" /> ' . __('Online') . '';
                                                        } else{
                                                            echo '<img src="' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/offline.png" alt="' . __('Offline') . '" /> ' . __('Offline') . '';
                                                        }
                                                    } else{
                                                        echo '<img src="' . $this->config->base_url . 'assets/' . $this->config->config_entry('main|template') . '/images/offline.png" alt="' . __('Offline') . '" /> ' . __('Offline') . '';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="margin-top:10px;"></div>
                        <table class="ranking-table">
                            <thead>
                            <tr class="main-tr">
                                <th style="padding-left: 15px;"><?php echo __('Account Information'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <table style="width:100%;text-align: center;margin: 0 auto;" cellpadding="0"
                                           cellspacing="0">
                                        <?php if($hidden == false){ ?>
                                            <tr>
                                                <td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Characters'); ?>
                                                    :
                                                </td>
                                                <td style="width:60%;text-align: left;padding-left: 15px;">
                                                    <?php
                                                        if(!empty($char_list)){
                                                            $chars = '';
                                                            foreach($char_list as $key => $value){
                                                                $chars .= ', <a href="' . $this->config->base_url . 'character/' . bin2hex($char_list[$key]['Name']) . '/' . $args[1] . '">' . $char_list[$key]['Name'] . '</a>';
                                                            }
                                                            echo substr($chars, 1);
                                                        } else{
                                                            echo __('No Characters');
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Last Login'); ?>
                                                :
                                            </td>
                                            <td style="width:60%;text-align: left;padding-left: 15px;">
                                                <?php
                                                    if($status != false){
                                                        echo date(DATETIME_FORMAT, strtotime($status['ConnectTM']));
                                                    } else{
                                                        echo __('Undefined');
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Last Logout'); ?></td>
                                            <td style="width:60%;text-align: left;padding-left: 15px;">
                                                <?php
                                                    if($status != false){
                                                        echo date(DATETIME_FORMAT, strtotime($status['DisConnectTM']));
                                                    } else{
                                                        echo __('Undefined');
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    <?php if(!isset($no_guild)){ ?>
                        <div style="margin-top:10px;"></div>
                        <table class="ranking-table" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr class="main-tr">
                                <th style="padding-left: 15px;"><?php echo __('Guild Info'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <table style="width: 100%;text-align: center;margin: 0 auto;" cellpadding="0"
                                           cellspacing="0">
                                        <tr>
                                            <td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Guild'); ?>
                                                :
                                            </td>
                                            <td style="width:60%;text-align: left;padding-left: 15px;">
                                                <img
                                                        src="<?php echo $this->config->base_url; ?>rankings/get_mark/<?php echo bin2hex($guild_info['G_Mark']); ?>/16"
                                                        border="0"/> <a
                                                        href="<?php echo $this->config->base_url; ?>guild/<?php echo bin2hex($guild_check['G_Name']); ?>/<?php echo $args[1]; ?>"><?php echo $guild_check['G_Name']; ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Master'); ?>
                                                :
                                            </td>
                                            <td style="width:60%;text-align: left;padding-left: 15px;">
                                                <?php echo '<a href="' . $this->config->base_url . 'character/' . bin2hex($guild_info['G_Master']) . '/' . $args[1] . '">' . $guild_info['G_Master'] . '</a>'; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width:40%;text-align: left;padding-left: 15px;"><?php echo __('Members'); ?>
                                                :
                                            </td>
                                            <td style="width:60%;text-align: left;padding-left: 15px;border: 0;"><?php echo $member_count['count']; ?></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    <?php
                        }
                        if($this->config->config_entry('character_' . $args[1] . '|show_equipment') == 1){
                    ?>
                        <div style="margin-top:10px;"></div>
                        <table class="ranking-table" cellpadding="0" cellspacing="0">
                            <thead>
                            <tr class="main-tr">
                                <th style="padding-left: 15px;"><?php echo __('Equipment'); ?></th>
                            </tr>
                            </thead>
                            <tr>
                                <td style="padding:5px;">
                                    <?php if(!$hidden){ ?>		
                                        <div style="width: 100%;text-align: center;margin-top:10px;">
											<?php if(MU_VERSION >= 4){ ?>
                                            <div id="inventoryc">
												<img src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_icons/<?php echo strtolower($this->website->get_char_class($this->Mcharacter->char_info['Class'], true));?>.jpg" title="<?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']);?>" alt="" />
												<?php if($equipment[0] != 0){ ?><div id="in_weapon" data-info="<?php echo $equipment[0]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[0]['item_id'], $equipment[0]['item_cat'], $equipment[0]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                        
												<?php if($equipment[1] != 0){ ?><div id="in_shield" data-info="<?php echo $equipment[1]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[1]['item_id'], $equipment[1]['item_cat'], $equipment[1]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                                
												<?php if($equipment[2] != 0){ ?><div id="in_helm" data-info="<?php echo $equipment[2]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[2]['item_id'], $equipment[2]['item_cat'], $equipment[2]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                               
												<?php if($equipment[3] != 0){ ?><div id="in_armor" data-info="<?php echo $equipment[3]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[3]['item_id'], $equipment[3]['item_cat'], $equipment[3]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                             
												<?php if($equipment[4] != 0){ ?><div id="in_pants" data-info="<?php echo $equipment[4]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[4]['item_id'], $equipment[4]['item_cat'], $equipment[4]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                                
												<?php if($equipment[5] != 0){ ?><div id="in_gloves" data-info="<?php echo $equipment[5]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[5]['item_id'], $equipment[5]['item_cat'], $equipment[5]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                             
												<?php if($equipment[6] != 0){ ?><div id="in_boots" data-info="<?php echo $equipment[6]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[6]['item_id'], $equipment[6]['item_cat'], $equipment[6]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>        
												<?php if($equipment[7] != 0){ ?><div id="in_wings" data-info="<?php echo $equipment[7]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[7]['item_id'], $equipment[7]['item_cat'], $equipment[7]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>      
												<?php if($equipment[9] != 0){ ?><div id="in_pendant" data-info="<?php echo $equipment[9]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[9]['item_id'], $equipment[9]['item_cat'], $equipment[9]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>                            
												<?php if($equipment[10] != 0){ ?><div id="in_ring1" data-info="<?php echo $equipment[10]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[10]['item_id'], $equipment[10]['item_cat'], $equipment[10]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>          
												<?php if($equipment[11] != 0){ ?><div id="in_ring2" data-info="<?php echo $equipment[11]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[11]['item_id'], $equipment[11]['item_cat'], $equipment[11]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>      
												<?php if(isset($equipment[12]) && $equipment[12] != 0){ ?><div id="in_pentagram" data-info="<?php echo $equipment[12]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[12]['item_id'], $equipment[12]['item_cat'], $equipment[12]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>    
												<?php if(isset($equipment[13]) && $equipment[13] != 0){ ?><div id="in_ear1" data-info="<?php echo $equipment[13]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[13]['item_id'], $equipment[13]['item_cat'], $equipment[13]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>       
												<?php if(isset($equipment[14]) && $equipment[14] != 0){ ?><div id="in_ear2" data-info="<?php echo $equipment[14]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[14]['item_id'], $equipment[14]['item_cat'], $equipment[14]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>        
												<?php if($equipment[8] != 0){ ?><div id="in_zoo" data-info="<?php echo $equipment[8]['hex']; ?>" style="background: url(<?php echo $this->itemimage->load($equipment[8]['item_id'], $equipment[8]['item_cat'], $equipment[8]['level'], 0); ?>) no-repeat center center;background-size:contain;"></div><?php } ?>        			
											</div> 
											<?php } else { ?>
											<div id="inventory"
                                                 style="display: inline-block;position:relative; height:407px;width:400px; background:url(<?php echo $this->config->base_url; ?>assets/default_assets/images/inventories/inv_<?php echo strtolower($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png) no-repeat left top;">
                                                <?php if($equipment[7] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[7]['hex']; ?>" id="wings"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[7]['item_id'], $equipment[7]['item_cat'], $equipment[7]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[2] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[2]['hex']; ?>" id="helm"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[2]['item_id'], $equipment[2]['item_cat'], $equipment[2]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[9] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[9]['hex']; ?>" id="pendant"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[9]['item_id'], $equipment[9]['item_cat'], $equipment[9]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[0] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[0]['hex']; ?>" id="sword"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[0]['item_id'], $equipment[0]['item_cat'], $equipment[0]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[1] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[1]['hex']; ?>" id="shield"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[1]['item_id'], $equipment[1]['item_cat'], $equipment[1]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[3] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[3]['hex']; ?>" id="armor"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[3]['item_id'], $equipment[3]['item_cat'], $equipment[3]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[4] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[4]['hex']; ?>" id="pants"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[4]['item_id'], $equipment[4]['item_cat'], $equipment[4]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[5] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[5]['hex']; ?>" id="gloves"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[5]['item_id'], $equipment[5]['item_cat'], $equipment[5]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[6] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[6]['hex']; ?>" id="boots"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[6]['item_id'], $equipment[6]['item_cat'], $equipment[6]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[10] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[10]['hex']; ?>" id="ring_left"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[10]['item_id'], $equipment[10]['item_cat'], $equipment[10]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                                <?php if($equipment[11] != 0){ ?>
                                                    <div data-info="<?php echo $equipment[11]['hex']; ?>"
                                                         id="ring_right"
                                                         style="background: url(<?php echo $this->itemimage->load($equipment[11]['item_id'], $equipment[11]['item_cat'], $equipment[11]['level'], 0); ?>) no-repeat center center;background-size:contain;">
                                                        &nbsp;
                                                    </div>
                                                <?php } ?>
                                            </div>
											<?php } ?>
                                        </div>
                                    <?php } else{ ?>
                                        <div
                                                class="i_note"><?php echo __('Equipment Hidden'); ?></div>
                                    <?php } ?>
                                </td>
                            </tr>
                        </table>
                        <?php
                    }
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
	