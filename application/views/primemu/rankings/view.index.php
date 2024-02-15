<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <script>
            $(document).ready(function () {
                $('#top_list').show();
                <?php if (isset($config['player']['count']) && $config['player']['count'] > 0): ?>
                App.populateRanking('players', '<?php echo $server; ?>');
                <?php elseif (isset($config['guild']['count']) && $config['guild']['count'] > 0): ?>
                App.populateRanking('guilds', '<?php echo $server; ?>');
                <?php elseif (isset($config['killer']['count']) && $config['killer']['count'] > 0): ?>
                App.populateRanking('killer', '<?php echo $server; ?>');
                <?php elseif (isset($config['voter']['count']) && $config['voter']['count'] > 0): ?>
                App.populateRanking('votereward', '<?php echo $server; ?>');
                <?php elseif (isset($config['online']['count']) && $config['online']['count'] > 0): ?>
                App.populateRanking('online', '<?php echo $server; ?>');
                <?php elseif (isset($config['gens']['count']) && $config['gens']['count'] > 0): ?>
                App.populateRanking('gens', '<?php echo $server; ?>');
                <?php elseif (isset($config['bc']['count']) && $config['bc']['count'] > 0): ?>
                App.populateRanking('bc', '<?php echo $server; ?>');
                <?php elseif (isset($config['ds']['count']) && $config['ds']['count'] > 0): ?>
                App.populateRanking('ds', '<?php echo $server; ?>');
                <?php elseif (isset($config['cc']['count']) && $config['cc']['count'] > 0): ?>
                App.populateRanking('cc', '<?php echo $server; ?>');
                <?php elseif (isset($config['duels']['count']) && $config['duels']['count'] > 0): ?>
                App.populateRanking('duels', '<?php echo $server; ?>');
                <?php endif;?>
                
            });
        </script>
        <div class="h2-title h2-title-content flex-s-c">
        <span><?php echo __('Rankings'); ?></span>
        <div id="top_list" class="tabTable hidden-xs hidden-sm hidden-md">
        <div id="rankings_select_<?php echo $server; ?>">
        <a href="javascript:;" class="tab-button active" id="players_ranking_<?php echo $server; ?>">Players</a>
        <a href="javascript:;" class="tab-button" id="guilds_ranking_<?php echo $server; ?>">Guilds</a>
        <a href="javascript:;" class="tab-button" id="gens_ranking_<?php echo $server; ?>">Gens</a>
        <a href="javascript:;" class="tab-button" id="pvp_ranking_<?php echo $server; ?>">PvP</a>
        <a href="javascript:;" class="tab-button" id="hunt_ranking_<?php echo $server; ?>">Hunt Points</a>
        </div>
        </div>
        </div>
        <div class="hidden-lg" style="text-align: center">
        <div id="rankings_select_<?php echo $server; ?>">
        <a href="javascript:;" class="button" style="margin: 5px;" id="players_ranking_<?php echo $server; ?>">Players</a>
        <a href="javascript:;" class="button" style="margin: 5px;" id="guilds_ranking_<?php echo $server; ?>">Guilds</a>
        <a href="javascript:;" class="button" style="margin: 5px;" id="gens_ranking_<?php echo $server; ?>">Gens</a>
        <a href="javascript:;" class="button" style="margin: 5px;" id="pvp_ranking_<?php echo $server; ?>">PvP</a>
        <a href="javascript:;" class="button" style="margin: 5px;" id="hunt_ranking_<?php echo $server; ?>">Hunt Points</a>
        <br><br>
        <hr>
        <br>
        </div>
        </div>
         <div id="rankings_content_<?php echo $server; ?>" style="padding: 10px;"></div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	