<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Donate'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
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
													<button class="btn btn-primary" type="submit"><?php echo __('Buy Now'); ?></button>
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