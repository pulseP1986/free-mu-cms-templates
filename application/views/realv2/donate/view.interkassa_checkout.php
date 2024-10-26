<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row vs-blog">
	<div class="col-lg-12">
		<div class="blog-meta has-border bg-major-black">
			<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
				<h2><?php echo __('Donate'); ?></h2>
			</div>
		</div>
		<div class="blog-content bg-major-black">
			<div class="row">
				<div class="col-lg-12">     
					<h2 class="title"><?php echo __('With Interkassa'); ?></h2>
					<div class="mb-5">
						<div style="padding: 5px; text-align: center;">
							<?php
								if(isset($error)){
									echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
								} else{
									?>
									<div class="box-style1" style="margin-bottom: 20px;">
										<h2 class="title"><?php echo $desc; ?></h2>
										<div class="entry">
											<form action="<?php echo $payment->getFormAction(); ?>" method="post">
												<?php foreach($payment->getFormValues() as $field => $value): ?>
													<input type="hidden" name="<?php echo $field; ?>" value="<?php echo $value; ?>"/>
												<?php endforeach; ?>
												<input type="hidden" name="ik_x_userinfo"
													   value="<?php echo $this->session->userdata(['user' => 'username']); ?>-server-<?php echo $this->session->userdata(['user' => 'server']); ?>"/>
												<div class="text-center">
													<button class="vs-btn gradient-btn h4" type="submit"><?php echo __('Buy Now'); ?></button>
												</div>
											</form>
										</div>
									</div>
									<?php
								}
							?>
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