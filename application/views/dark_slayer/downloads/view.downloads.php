<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Files'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title"><?php echo __('Choose the best download option for you'); ?></h2>
					<?php 
					if(empty($downloads)){
						echo '<div class="alert alert-primary" role="alert">' . __('Currently no download links.') . '</div>';
					}
					else{
					?>
					<div class="card-group">
						<?php foreach($downloads as $download){ ?>
                        <div class="card ml-1 mr-1"><a href="<?php echo htmlspecialchars($download['link_url']); ?>" class="btn btn-primary dmn-download-button" role="button"><?php echo htmlspecialchars($download['link_name']); ?></a></div>
                        <?php } ?>
					</div>
					<?php
					}
					?>
					<div class="mb-5 mt-3">
                        <h2 class="title"><?php echo __('System Requirements');?></h2>
                        <div class="card-group">
                            <div class="card ml-1">
                                <ul class="list-group list-group-flush" style="border-top: 2px solid #ffd267;border-radius: 0px;">
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span style="font-weight: bold;">MINIMUM</span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>Windows 7</span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>CPU: Pentium 3 700 Mhz<br></span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>RAM: 512 MB<br></span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>GPU: 3D graphics processor, 32 MB<br></span></li>
                                    <li class="list-group-item" style="background: rgba(255,255,255,0);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>DX: DirectX 8.1a<br></span></li>
                                </ul>
                            </div>
                            <div class="card mr-1" style="height: 100%;background: #1A1D21;padding-right: 0px;">
                                <ul class="list-group list-group-flush" style="border-top: 2px solid #ffd267;border-radius: 0px;">
                                    <li class="list-group-item" style="background: rgba(126,95,73,0.09);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span style="font-weight: bold;">RECOMMENDED</span></li>
                                    <li class="list-group-item" style="background: rgba(126,95,73,0.09);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>Windows 7</span></li>
                                    <li class="list-group-item" style="background: rgba(126,95,73,0.09);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>CPU: Pentium 4 – 2.0 Ghz or higher<br></span></li>
                                    <li class="list-group-item" style="background: rgba(126,95,73,0.09);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>RAM: 1 GB or higher</span></li>
                                    <li class="list-group-item" style="background: rgba(126,95,73,0.09);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>GPU: 3D graphics processor, 128 MB or higher<br></span></li>
                                    <li class="list-group-item" style="background: rgba(126,95,73,0.09);height: 100%;width: 100%;padding-top: 25px;padding-bottom: 25px;border-bottom-style: solid;border-bottom-color: #ffd267;"><span>DX: DirectX 9.0c or higher<br></span></li>
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
