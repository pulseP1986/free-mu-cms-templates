<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Search Characters & Guilds'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Find any character, guild'); ?></h2>
					<?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
					?>
					<div class="row mb-5">
						<div class="col-12"> 
						<div class="mx-auto" style="width: 300px;">
							<form method="post" action="">
							  <div class="form-row align-items-center">
								<div class="col-auto">
								  <label class="sr-only" for="inlineFormInput">Name</label>
								  <input type="text" class="form-control" id="name" name="name" placeholder="">
								</div>

								<div class="col-auto">
								  <button type="submit" class="btn btn-primary"><?php echo __('Search'); ?></button>
								</div>
							  </div>
							</form>
						</div>
						</div>
					</div>
				</div>	
			</div>	
			<?php if(isset($list_players) && $list_players != false){ ?>
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Found Characters'); ?></h2>
					<table class="table dmn-rankings-table table-striped">
						<thead>
						<tr>
							<th class="text-center">#</th>
							<th><?php echo __('Name'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach($list_players as $result){
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td><a href="<?php echo $result['url']; ?>"><?php echo $result['name']; ?></a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>	
			</div>
			<?php } ?>
			<?php if(isset($list_guilds) && $list_guilds != false){ ?>
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Found Guilds'); ?></h2>
					<table class="table dmn-rankings-table table-striped">
						<thead>
						<tr>
							<th class="text-center">#</th>
							<th><?php echo __('Name'); ?></th>
						</tr>
						</thead>
						<tbody>
						<?php
						$i = 1;
						foreach($list_guilds as $gresult){
						?>
							<tr>
								<td class="text-center"><?php echo($i++); ?></td>
								<td><a href="<?php echo $gresult['url']; ?>"><?php echo $gresult['name']; ?></a></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>	
			</div>
			<?php } ?>
			<?php if(!isset($error) && (!isset($list_players) || $list_players == false) && (!isset($list_guilds) || $list_guilds == false)){ ?>
				<div class="alert alert-primary" role="alert"><?php echo __('Search result did not return any data');?></div>
			<?php } ?>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>