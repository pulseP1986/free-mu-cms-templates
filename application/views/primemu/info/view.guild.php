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
                        <div class="hero flex-s">
                        <div class="row-ranking">
                        <div class="heroLeft block-6">
                        <div class="heroLeft-img flex-c-c" style="padding-top: 3px; background: transparent;">
                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/guild-focus.png" style="z-index: 2;" alt="">
                        <img src="<?php echo $this->config->base_url; ?>rankings/get_mark/<?php echo $guild_info['G_Mark']; ?>/250" alt="" style="z-index: 1; margin-top: -310px;">
                        </div>
                        </div>
                        <div class="heroRight block-6" style="padding-top: 10px;">
                        <style type="text/css">
                            .flexBlock {
                                white-space: normal;
                            }
                            .flexBlock a {
                                font-size: 20px; color: #ffa07f;
                            }
                        </style>
                        <div class="heroName">
                        <?php echo $guild_info['G_Name']; ?> </div>
                        <div class="heroflex">
                        <div class="flexBlock flexBlock-sp" style="width: calc(50% - 1px);">
                        <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($guild_info['G_Master']); ?>/<?php echo $args[1]; ?>"><?php echo $guild_info['G_Master']; ?></a>
                        <span class="flexBlock-sp"><span>Master</span></span>
                        </div>
                        <div class="flexBlock flexBlock-sp" style="width: calc(50% - 1px);">
                        <?php echo $guild_info['G_Score']; ?> <span class="flexBlock-sp"><span>Score</span></span>
                        </div>
                        </div>
                        <div class="heroflex">
                        <div class="flexBlock flexBlock-sp" style="width: calc(50% - 1px);">
                        <?php echo $guild_info['MemberCount']; ?> <span class="flexBlock-sp"><span>Member Count</span></span>
                        </div>
                        <div class="flexBlock flexBlock-sp" style="width: calc(50% - 1px);">
                        <?php echo $guild_info['aliance_guilds']; ?> <span class="flexBlock-sp"><span>Alliance</span></span>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        <div class="heroInfo">
                        <div class="h2-title">
                        <span><?php echo __('Members Guild'); ?></span>
                        </div>
                        <div class="top-header">
                        <table class="table-responsive">
                        <thead>
                        <tr>
                        <th>#</td>
                        <th><?php echo __('Name'); ?></th>
                        <th><?php echo __('Class'); ?></th>
                        <th><?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_resets']) == 1){ ?><?php echo __('Resets'); ?><?php } ?> <?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_gresets']) == 1){ ?>
                                <sup style="color: red;"><?php echo __('GR'); ?></sup><?php } ?>
                        </th>
                        <th><?php echo __('LvL'); ?></th>
                        <th><?php echo __('Position'); ?></th>
                        <th><?php echo __('Status'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(!empty($guild_members)){
                                foreach($guild_members as $key => $member){
                                    ?>
                                    <tr>
                                        <td style="text-align: center;"><?php echo($key + 1); ?></td>
                                        <td>
                                            <a href="<?php echo $this->config->base_url; ?>character/<?php echo bin2hex($member['name']); ?>/<?php echo $args[1]; ?>"><?php echo $member['name']; ?></a>
                                        </td>
                                        <td style="text-align: center;"><?php echo $member['class']; ?></td>
                                        <td style="text-align: center;"><?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_resets']) == 1){ ?><?php echo $member['resets']; ?><?php } ?> <?php if($this->config->values('rankings_config', [$args[1], 'player', 'display_gresets']) == 1){ ?>
                                            <sup style="color: red;"><?php echo $member['gresets']; ?></sup><?php } ?>
                                        </td>
                                        <td style="text-align: center;"><?php echo $member['level']; ?></td>
                                        <td style="text-align: center;"><?php echo $member['position']; ?></td>
                                        <td style="text-align: center;">
                                        <?php if($member['status'] == 1){ ?>
                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template');?>/images/online.png" title="Online" />
                                        <?php  } else { ?>
                                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry('main|template');?>/images/offline.png" title="Offline" />
                                        <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else{
                                echo '<tr><td colspan="6"><div class="alert alert-primary">' . __('No Members') . '</div></td></tr>';
                            }
                        ?>
                        </tbody>
                        </table>
                        </div>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	