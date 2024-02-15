<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
    <div id="content">
        <div id="box1">
            <div class="news-block">
                <h3><?php if(empty($error)){
                            echo $news['title'];
                        } else{
                            echo 'Undefined';
                        } ?></h3>
                <div class="news">
                    <?php
                        if(!empty($error)):
                            echo '<div style="padding: 0 30px 0px 50px;"><div class="e_note">' . $error . '</div></div>';
                        endif;
                        if(!empty($news)):
                            ?>
                            
                        <?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $news['news_content_full']))); ?>
                        
                        <?php endif; ?>
                    <span class="date"><?php echo date("d.m.Y", $news['time']);?></span>
                </div>
            </div>
        </div>
    </div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>