<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'guides' . DS . 'view.header', ['guideData' => $guide]);
?>

        <div id="container">
            <section id="contents" class="view">
				<?php
				if(!empty($error)){
					echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
				}
				if(!empty($guide)){
				?>	
				<h2 class="view__category" style="border-bottom: 1px solid #e0e0e0;"><?php echo $guide['title']; ?></h2>
				<article class="article">
					<div class="fr-view">
						<?php echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $guide['text']))); ?>
					</div>
				</article>	
				<div class="view__button">
					<a href="#" class="view__btn-guide"><?php echo __('Posted'); ?> <?php echo date(DATE_FORMAT, strtotime($guide['date'])); ?></a>
				</div>
				<?php } ?>
			</section>
        </div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'guides' . DS . 'view.footer');
?>		
