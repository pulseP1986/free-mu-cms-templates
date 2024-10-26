<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Search Characters & Guilds'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Find any character, guild'); ?></h2>
					<?php
                    if(isset($error)){
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
					?>
					<div class="row mb-5">
						<div class="col-lg-12"> 
							<form method="post" action="">
								<div class="form-group">
									<label class="sr-only" for="inlineFormInput">Name</label>
									<input type="text" class="form-control bg-light-dark text-white" id="name" name="name" placeholder="">
								</div>
								<div class="form-group mb-5">
									<div class="d-flex justify-content-center align-items-center"><button type="submit" class="vs-btn gradient-btn h4"><?php echo __('Search'); ?></button></div>
								</div>
							</form>
						</div>
					</div>
				</div>	
			</div>	
			<?php  ?>
			<div class="row">
				<div class="col-6">     
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
						if(isset($list_players) && $list_players != false){
						$i = 1;
						foreach($list_players as $result){
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td><a href="<?php echo $result['url']; ?>"><?php echo $result['name']; ?></a></td>
							</tr>
						<?php }} ?>
						</tbody>
					</table>
				</div>	
				<div class="col-6">     
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
						if(isset($list_guilds) && $list_guilds != false){
						$i = 1;
						foreach($list_guilds as $gresult){
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td><a href="<?php echo $gresult['url']; ?>"><?php echo $gresult['name']; ?></a></td>
							</tr>
						<?php }} ?>
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