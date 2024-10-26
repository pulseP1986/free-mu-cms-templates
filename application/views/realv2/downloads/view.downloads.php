<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Files'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('Choose the best download option for you'); ?></h2>
					<?php 
					if(empty($downloads)){
						echo '<div class="alert alert-primary" role="alert">' . __('Currently no download links.') . '</div>';
					}
					else{
					?>
					<?php foreach($downloads as $download){ ?>
					<div class="row">
						<div class="col-lg-7 pt-10">
							<span class="text-white fs-18"><?php echo $download['link_name'];?></span>
							<p><?php echo $download['link_desc'];?><br/><?php echo __('Size');?>: <?php echo $download['link_size'];?></p>
						</div>
						<div class="col-lg-5 text-center">
							<a href="<?php echo htmlspecialchars($download['link_url']); ?>" target="_blank" class="vs-btn gradient-btn h4">
								<span><i class="fa fa-download"></i></span> <?php echo __('Download'); ?>
							</a>
						</div>
					</div>
					<hr/>
					<?php } ?>
					<?php
					}
					?>
					<div class="mb-5 mt-3">
                        <h2 class="title"><?php echo __('System Requirements');?></h2>
                        <div class="card-group">
                            <div class="card ml-1">
                                <ul class="list-group list-group-flush" style="border-top: 2px solid rgba(var(--theme-color), 1);border-radius: 0px;">
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span style="font-weight: bold;">MINIMUM</span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>Windows 7</span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>CPU: Pentium 3 700 Mhz<br></span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>RAM: 512 MB<br></span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>GPU: 3D graphics processor, 32 MB<br></span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>DX: DirectX 8.1a<br></span></li>
                                </ul>
                            </div>
                            <div class="card mr-1" style="height: 100%;background: #1A1D21;padding-right: 0px;">
                                <ul class="list-group list-group-flush" style="border-top: 2px solid rgba(var(--theme-color), 1);border-radius: 0px;">
                                    <li class="list-group-item" style="background: var(--light-dark-color);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span style="font-weight: bold;">RECOMMENDED</span></li>
                                    <li class="list-group-item" style="background: var(--light-dark-color);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>Windows 7</span></li>
                                    <li class="list-group-item" style="background: var(--light-dark-color);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>CPU: Pentium 4 – 2.0 Ghz or higher<br></span></li>
                                    <li class="list-group-item" style="background: var(--light-dark-color);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>RAM: 1 GB or higher</span></li>
                                    <li class="list-group-item" style="background: var(--light-dark-color);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>GPU: 3D graphics processor, 128 MB or higher<br></span></li>
                                    <li class="list-group-item" style="background: var(--light-dark-color);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: rgba(var(--theme-color), 1);"><span>DX: DirectX 9.0c or higher<br></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>	
		</div>	
	</div>
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
