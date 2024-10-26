<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<div class="col-lg-3">
		<div class="pt-15"></div>
		<aside class="sidebar-area sticky-top overflow-hidden">
			<div class="vs-sidebox bg-major-black">
				<h3 class="sidebox-title text-white h5"><?php echo __('Category'); ?></h3>
				<div>
					<?php $catConfig = $this->config->values('guides_category'); ?>
					<style>
					.dropdown { 
						display: none; 
					}
					
					</style>
					<script>
					$(function() {
						$('.dropdown-toggle').on('click', function(e){
							e.preventDefault();
							var gkey = $(this).data('guides');
							$('.dropdown').slideUp(); 
							if($('#guides_'+gkey).is(':visible')){
								$('#guides_'+gkey).slideUp();		
							}
							else{
								$('#guides_'+gkey).slideDown();	
							}
						});
						
						$("#search_form input").on( "keypress", function(event) {
							if (event.which == 13 && !event.shiftKey) {
								event.preventDefault();
								$("#search_form").submit();
							}
						});
						
						var url = decodeURIComponent(window.location.pathname.toLowerCase().replace(/^\//, ''));

						$('div[id^="guides_"] a').each(function(){
							var elem = decodeURIComponent($(this).attr('href'));
							if(elem.includes(url)){
								$(this).parent().parent().slideToggle();
								$(this).parent().parent().addClass('active');
								return false;
							}	
						});
					});
					</script>
					<ul class="vs-cat-list1">
						<?php foreach($catConfig as $key => $cat){ ?>
						<li>
							<a href="javascript:;" data-guides="<?php echo $key;?>" class="py-5 pl-20 fw-300 dropdown-toggle"><?php echo __($cat['name']);?></a>
						</li>
						<?php 
						$guidesl = $this->Mguides->load_guides_by_category($key);
						if(!empty($guidesl)){		
						?>
						<div class="dropdown" style="margin-left:10px;" id="guides_<?php echo $key;?>">
							<?php foreach($guidesl as $key => $article){ ?>
							<div class="display:flex;">
								<span class="text-default">-</span>
								<a href="<?php echo $this->config->base_url; ?>guides/read/<?php echo $this->website->seo_string($article['title']); ?>/<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
							</div>
							<?php } ?>
						</div>
						<?php } ?>	
						<?php } ?>
						
					</ul>
				</div>
				<br />
			</div>
		</aside>
	</div>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="row">
					<div class="col-lg-8">
						<h2 class="blog-title text-white font-theme h4 mt-10 mt-25-sm mb-10 mb-20-sm">
						&nbsp; <a><?php if(empty($error)){ echo $guide['title']; } else{ echo 'Undefined'; } ?></a>
						</h2>
					</div>
					<div class="col-lg-4">
						<form method="post" action="<?php echo $this->config->base_url;?>guides/search" id="search_form">
							<div class="form-group mb-20-off mb-10-sm mt-10-off">
								<input type="text" class="form-control bg-light-dark text-white has-border py-18 register" name="search" id="search_text" placeholder="<?php echo __('Search');?>"> <i class="fas fa-search"></i>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="blog-content bg-major-black" style="min-height: 800px;">
				<?php
                    if(!empty($error)){
                        echo '<div class="alert alert-danger">' . $error . '</div>';
					}
                    if(!empty($guide)){
						echo str_replace('&gt;', '>', str_replace('&lt;', '<', str_replace('Â', '&nbsp;', $guide['text'])));
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