<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title font-theme h4 mt-25-sm mb-5-off" style="display:flex;justify-content: space-between;">
				<h2><?php echo __('About Server'); ?></h2>
				<span>
					<?php
						foreach($this->website->server_list() as $key => $server){
							if($server['visible'] == 1){
					?>
								<a class="vs-btn2 gradient-btn text-white" href="<?php echo $this->config->base_url; ?>about/stats/<?php echo $key; ?>"><?php echo $server['title']; ?> <?php echo __('Statistics'); ?></a>
					<?php
							}
						}
					?>
				</span>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row mt-4">
				<div class="col-lg-12">     
				<?php echo __('MU Online was created in December 2001 by the Korean gaming company Webzen.. Like in most MMORPGs, players have to create a character among seven different classes and to set their foot on the MU Continent. In order to gain experience and thus to level up, a players needs to fight monsters (mobs). MU is populated by a large variety of monsters, from simple ones like goblins and golems, to frightening ones such as the Gorgon, Kundun or Selupan. Each monster-type is unique, has different spawn points, and drops different items.'); ?>
				</div>
			</div>
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>