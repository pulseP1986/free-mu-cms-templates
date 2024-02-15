<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Change Name'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('Change Name History'); ?>
						<div class="float-right"><a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>shop/change-name"><?php echo __('Change Name'); ?></a></div>
					</h2>
					<?php
                    if(isset($error)){
                        echo '<div class="alert alert-primary" role="alert">' . $error . '</div>';
                    } 
					else{
                        if(isset($change_history) && $change_history != false){
                    ?>
						<table class="table dmn-rankings-table table-striped">
							<thead>
							<tr>
								<th class="text-center">#</th>
								<th><?php echo __('Old Name'); ?></th>
								<th><?php echo __('New Name'); ?></th>
								<th><?php echo __('Date'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php
								$i = 1;
								foreach($change_history as $history){
									?>
									<tr>
										<td class="text-center"><?php echo($i++); ?></td>
										<td><?php echo $history['old_name']; ?></td>
										<td><?php echo $history['new_name']; ?></td>
										<td ><?php echo date(DATETIME_FORMAT, strtotime($history['change_date'])); ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
                 <?php
					} 
					else{
						echo '<div class="alert alert-primary" role="alert">' . __('You have not changed any character name') . '</div>';
					}
				}
                ?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>

<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Change Name'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('Change Name History'); ?></h2>

            <div class="entry">
                <?php
                    if(isset($error)){
                        echo '<div class="alert alert-primary" role="alert">' . $error . '</div>';
                    } else{
                        ?>
                        <?php
                        if(isset($change_history) && $change_history != false){
                            ?>
                            <table class="table dmn-rankings-table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center"><?php echo __('Old Name'); ?></th>
                                    <th class="text-center"><?php echo __('New Name'); ?></th>
                                    <th class="text-center"><?php echo __('Date'); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i = 1;
                                    foreach($change_history as $history):
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo($i++); ?></td>
                                            <td><?php echo $history['old_name']; ?></td>
                                            <td><?php echo $history['new_name']; ?></td>
                                            <td class="end"><?php echo date('d/m/Y, H:i', strtotime($history['change_date'])); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php
                        } else{
                            echo '<div class="alert alert-primary" role="alert">' . __('You have not changed any character name') . '</div>';
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
	