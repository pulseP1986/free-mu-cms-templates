<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Info'); ?></h1>
        </div>
        <div class="box-style1">
             <?php $args = $this->request->get_args(); ?>
            <div>
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
                        
                    <div class="hero flex-s">
                    <div class="row-ranking">
                    <div class="heroLeft block-6">
                    <div class="heroLeft-img flex-c-c-c">
                    <img src="<?php echo $this->config->base_url; ?>assets/default_assets/images/char_images/<?php echo strtoupper($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png" alt="">
                    </div>
                    <div class="heroLeft-button">
                    <?php
                        $stat = __('Offline');
                        $buttton = 'red';
                        if($status != false){
                            if($status['ConnectStat'] == 1){
                                $stat = __('Online');
                                $buttton = 'green';
                            }
                        }
                    ?>
                    <button class="big-button-<?php echo $buttton;?>"><?php echo $stat;?></button> </div>
                    </div>
                    <div class="heroRight block-6">
                    <div class="heroName">
                    <?php echo $this->Mcharacter->char_info['Name'];?>
                    </div>
                    <div class="heroflex">
                    <?php
                    $level = $this->Mcharacter->char_info['cLevel'];
                    if($this->config->values('rankings_config', [$args[1], 'player', 'display_master_level']) == 1){
                        $level += $this->Mcharacter->char_info['mlevel'];
                    }
                    ?>
                    <div class="flexBlock flexBlock-lvl">
                    <?php echo $level;?> <b><?php echo __('LVL');?></b>
                    </div>
                    <div class="flexBlock flexBlock-flag">
                    <?php 
                    $family = $this->website->gens_gens_family($this->Mcharacter->char_info['Name'], $args[1], 'igcn'); 
                    $img = 'flag-null.webp';
                    if($family != false){
                        if($family['family'] == 1){
                            $img = 'flag-duprian.webp';
                        }
                        else{
                            $img = 'flag-vanert.webp';
                        }
                    }
                    ?>
                    <img src="<?php echo $this->config->base_url; ?>assets/default_assets/images/<?php echo $img;?>" alt="">
                    </div>
                    </div>
                    <div class="heroflex">
                    <div class="flexBlock">
                    <?php echo $this->website->get_char_class($this->Mcharacter->char_info['Class']); ?> <span class="flexBlock-sp"><span><?php echo __('Class');?></span></span>
                    </div>
                    </div>
                    <div class="heroflex">
                    <div class="flexBlock">
                    <?php echo $this->website->get_map_name($this->Mcharacter->char_info['MapNumber']); ?>  <span class="flexBlock-sp"><span><?php echo __('Location');?></span></span>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <?php if(!isset($no_guild)){ ?>
                        <style>
                        .heroInfo table td {
                            border-collapse: collapse;
                            padding: 15px 18px;
                            border-top: 1px solid #12141e;
                            border-bottom: 1px solid #12141e;
                            color: #fff;
                            font-size: 14px;
                            vertical-align: middle;
                        }
                        .heroInfo table tr{
                            border: none;
                        }
                        </style>
                        <div class="heroInfo">
                            <div class="h2-title">
                                <span style="text-transform: uppercase;"><?php echo __('Guild Info'); ?></span>
                            </div>
                            <table class="gblock" style="margin-left: auto; margin-right: auto;">
                                <tbody>
                                    <tr>
                                        <td style="padding: 0px; width: 200px;">
                                            <img src="<?php echo $this->config->base_url; ?>rankings/get_mark/<?php echo bin2hex($guild_info['G_Mark']); ?>/128" style="padding: 5px; border: 1px solid rgba(255, 255, 255, 0.1) !important;">
                                        </td>
                                        <td style="padding: 0px; width: 300px;">
                                            <div class="heroInfo-row">
                                                <span><?php echo __('Guild'); ?>:</span> <span> <a href="<?php echo $this->config->base_url; ?>guild/<?php echo bin2hex($guild_check['G_Name']); ?>/<?php echo $args[1]; ?>"><?php echo $guild_check['G_Name']; ?></a></span>
                                            </div>
                                            <div class="heroInfo-row">
                                                <span><?php echo __('Master'); ?>:</span> <span><?php echo '<a href="' . $this->config->base_url . 'character/' . bin2hex($guild_info['G_Master']) . '/' . $args[1] . '">' . $guild_info['G_Master'] . '</a>'; ?></span>
                                            </div>
                                            <div class="heroInfo-row">
                                                <span><?php echo __('Members'); ?>:</span> <span><?php echo $member_count['count']; ?>/40</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }	
                    if($this->config->config_entry('character_' . $args[1] . '|show_equipment') == 1){
                    ?>
     <div class="heroInfo">
     <div class="h2-title">
           <span style="text-transform: uppercase;"><?php echo __('Equipment');?></span>
     </div>
	 <table>
	 <tbody><tr>
	 <td style="padding: 0px; background: rgba(0, 0, 0, 0.3);">
	 <div style="width: 100%;text-align: center;margin-top:15px; padding-bottom: 15px;">
                    <?php if(!$hidden){ ?>		
                    <div style="width: 100%;text-align: center;margin-top:30px; padding-bottom: 30px;">
                        <div style="background-image:url('<?php echo $this->config->base_url; ?>assets/default_assets/images/invent/<?php echo strtoupper($this->website->get_char_class($this->Mcharacter->char_info['Class'], true)); ?>.png'); width: 522px; height: 421px; padding-top: 95px; margin-left: calc(50% - 260px);">
                            <div id="inventoryc">
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
                            <?php if($artifacts != false){ ?>
                            <div style="position: relative; left: calc(50% - 40px); top: -160px; width: 82px; height: 61px;">
                                <a href="#Artifact" class="open_modal_two">
                                    <img src="<?php echo $this->config->base_url; ?>assets/default_assets/images/artifact/button-2.png">
                                </a>
                            </div>
                            <style>
                            .modal_div_two .modal_close_two:hover{
                                filter:brightness(120%)
                            }
                            #overlay_two{
                                z-index:998;
                                position:fixed;
                                background-color:#070a11;
                                opacity:.8;
                                width:100%;
                                height:100%;
                                top:0;
                                left:0;
                                cursor:pointer;
                                display:none
                            }
                            .modal_div_two{
                                width:100%;
                                min-height:400px;
                                max-width:480px;
                                background-color:rgba(0,0,0,0);
                                position:fixed;
                                top:15%;
                                left:50%;
                                margin-left:-240px;
                                display:none;
                                opacity:0;
                                z-index:999;
                                padding:50px 60px;
                            }
                            .modal_div_two .modal_close{
                                display: none;
                            }
                            .modal_div_two .modal_close:hover{
                                filter:brightness(120%)
                            }
                            .absolute {
                                position: absolute;
                            }
                            .artifact-title {
                                color: #00e6e6 !important;
                                font-size: 12px;
                            }
                            .artifact-description {
                                color: #fff;
                                font-size: 11px;
                            }
                            </style>
                            <div id="overlay_two"></div>
                            <div id="Artifact" class="modal_div_two">
                                <div style="height: 349px; width: 305px; border: 1px solid black; margin-left: -2px; margin-top: -2px; padding: 0; background: url(<?php echo $this->config->base_url;?>assets/default_assets/images/artifact/background.png); background-repeat: no-repeat; background-position: top left; float: left; position: relative; text-align: center; color: gold; padding-top: 20px;">
                                Spider Artifact
                                <?php 
                                if(!empty($artifacts)){
                                    $aData = '';
                                    foreach($artifacts AS $ak => $artifact){
                                        $h = 0;
                                        $w = 0;
                                        if($artifact['ArtifactType'] == 2 || $artifact['ArtifactType'] == 4 || $artifact['ArtifactType'] == 5){
                                            $w = 39;
                                        }
                                        if($artifact['ArtifactType'] == 3){
                                            $w = 65;
                                        }
                                        if($artifact['ArtifactType'] == 1 || $artifact['ArtifactType'] == 2 || $artifact['ArtifactType'] == 3){
                                            $h = 23;
                                        }
                                        if($artifact['ArtifactType'] == 4){
                                            $h = 46;
                                        }
                                        if($artifact['ArtifactType'] == 5){
                                            $h = 69;
                                        }
                                        if($artifact['ArtifactType'] == 6){
                                            $h = 92;
                                        }
                                        $tooltip = '<div>
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png" />
                                                    <br><br>
                                                    <p class="artifact-title">Spider Artifact Type '.($artifact['ArtifactType']+1).' +'.$artifact['ArtifactLevel'].' </p>
                                                    <p class="artifact-description">Minimum level required: 800<br></p>
                                                    </div>';
                                        if($artifact['Position'] == 22){
                                            $aData .= '<div class="absolute" style="top: '.(92-$h).'px; left: '.(76-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 27){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(92-$h).'px; left: '.((76+(26*5))-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 32){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(115-$h).'px; left: '.(89-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 33){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(115-$h).'px; left: '.(115-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 34){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(115-$h).'px; left: '.(141-$w).'px;">
                                            <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                            </div>';
                                        }
                                        if($artifact['Position'] == 35){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(115-$h).'px; left: '.(167-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 36){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(115-$h).'px; left: '.(193-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 44){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(138-$h).'px; left: '.(128-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 45){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(138-$h).'px; left: '.(154-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 52){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(161-$h).'px; left: '.(89-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 53){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(161-$h).'px; left: '.(115-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 54){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(161-$h).'px; left: '.(141-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 55){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(161-$h).'px; left: '.(167-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 56){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(161-$h).'px; left: '.(193-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 64){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(184-$h).'px; left: '.(128-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 65){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(184-$h).'px; left: '.(154-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 72){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(207-$h).'px; left: '.(89-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 73){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(207-$h).'px; left: '.(115-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 75){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(207-$h).'px; left: '.(167-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 76){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(207-$h).'px; left: '.(193-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 82){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(230-$h).'px; left: '.(76-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                        if($artifact['Position'] == 87){
                                            $aData .= '<div class="absolute" data-info=\''.$tooltip.'\' style="top: '.(230-$h).'px; left: '.(76+(26*5)-$w).'px;">
                                                    <img src="'.$this->config->base_url.'assets/default_assets/images/artifact/'.$artifact['ArtifactType'].'.png">
                                                    </div>';
                                        }
                                    }
                                    echo $aData;
                                } 
                                ?>
                                </div>
                            </div>
                            <script>
                            $(document).ready(function() {
                                $('.absolute').each(function () {
                                    App.initializeTooltip($(this), false);
                                });
                                var overlay_two = $('#overlay_two');
                                var open_modal_two = $('.open_modal_two');
                                var close_two = $('.modal_close_two, #overlay_two');
                                var modal_two = $('.modal_div_two');
                                open_modal_two.click(function(event) {
                                    event.preventDefault();
                                    var div_two = $(this).attr('href');
                                    overlay_two.fadeIn(400, function() {
                                        $(div_two).css('display', 'block').animate({
                                            opacity: 1,
                                            top: '20%'
                                        }, 200);
                                    });
                                });
                                close_two.click(function() {
                                    modal_two.animate({
                                        opacity: 0,
                                        top: '25%'
                                    }, 200, function() {
                                        $(this).css('display', 'none');
                                        overlay_two.fadeOut(400);
                                    });
                                });
                            });
                            </script>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } else{ ?>
                        <div class="i_note"><?php echo __('Equipment Hidden'); ?></div>
                    <?php } ?>
                    </div>    
                        <?php
                    }
                    }
                ?>
		</td>
		</tr>
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
	