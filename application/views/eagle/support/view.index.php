<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="dmn-content">
	<div class="dmn-page-box">
		<div class="dmn-page-title">
			<h1><?php echo __('Support'); ?></h1>
		</div>
		<div class="dmn-page-content">
			<div class="row">
				<div class="col-12">     
					<h2 class="title">
						<?php echo __('Send support ticket'); ?>
						<div class="float-right"><a class="btn btn-primary" href="<?php echo $this->config->base_url; ?>support/my-tickets"><?php echo __('View My Tickets'); ?></a></div>
					</h2>
				</div>	
			</div>	
			<div class="row">
				<div class="col-12">   
					<?php
					if(empty($department_list)){
                        echo '<div class="alert alert-primary" role="alert">' . __('Currently no active support departments.') . '</div>';
                    } 
					else{ 
						echo $css;
                        echo $js;
						if(isset($error)){
							echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
						}
						if(isset($success)){
							echo '<div class="alert alert-success" role="alert">' . $success . '</div>';
						}
					?>
					<form method="post" action="<?php echo $this->config->base_url; ?>support" id="support_form" class="mb-5" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label"><?php echo __('Subject'); ?></label>
							<input type="text" class="form-control validate[required,minSize[3],maxSize[50]]" name="title" id="title" value="">
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Department'); ?></label>
							<div>
								<select name="department" id="department" class="form-control validate[required] " title="<?php echo __('Select Department'); ?>">
									<?php
									foreach($department_list as $key => $department){
										if($department['pay_per_incident']){
											$payment = ' (' . $department['pay_per_incident'] . ' ' . $this->website->translate_credits($department['payment_type'], $this->session->userdata(['user' => 'server'])) . ')';
										} 
										else{
											$payment = '';
										}
									?>
									<option value="<?php echo $department['id']; ?>"><?php echo $department['department_name'] . $payment; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Priority'); ?></label>
							<div>
								<select name="priority" id="priority" class="form-control validate[required] " title="<?php echo __('Select Priority'); ?>">
									<?php foreach($priority_list as $key => $priority){ ?>
									<option value="<?php echo $key; ?>"><?php echo $priority[1]; ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Character'); ?></label>
							<div>
								<select name="character" id="character" class="form-control validate[required]" title="<?php echo __('Select Character'); ?>">
									<?php
									if($char_list){
										foreach($char_list as $char){
									?>
										<option value="<?php echo $char['name']; ?>"><?php echo $char['name']; ?></option>
									<?php
										}
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label"><?php echo __('Attachment'); ?></label>
							<div>
								<input name="files[]" id="files" type="file" multiple/>
								<div id="fileList"></div>
							</div>
						</div>
						<div class="form-group">
							<label for="text"><?php echo __('Message'); ?></label>
							<div class="d-flex justify-content-center align-items-center"><textarea id="text" name="text"></textarea></div>
						</div> 
						<div class="form-group">
							<div class="d-flex justify-content-center align-items-center"><button type="submit" name="submit_ticket" class="btn btn-primary"><?php echo __('Submit'); ?></button></div>
						</div>
					</form>
					<script>
						$(document).ready(function () {
							$('#files').on('change', function () {
								var fileList = $("#fileList");
								var files_attached = '<ul class="style3">';
								fileList.empty();

								for (var i = 0; i < this.files.length; i++) {
									var file = this.files[i];
									files_attached += '<li>' + file.name + '</li>';
								}
								files_attached += '</ul>';
								fileList.append(files_attached);
							});

							$("#support_form").validationEngine();
							$("#text").cleditor({
								width: "99%",
								controls: "bold italic underline strikethrough subscript superscript | font size " +
								"style | color highlight removeformat | bullets numbering | " +
								"alignleft center alignright justify | undo redo ",
								colors: "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " +
								"CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " +
								"BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " +
								"999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " +
								"666 900 C60 C93 990 090 399 33F 60C 939 " +
								"333 600 930 963 660 060 366 009 339 636 " +
								"000 300 630 633 330 030 033 006 309 303",
								fonts: "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," +
								"Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",
								sizes: "1,2,3,4,5,6,7",
								styles: [["Paragraph", "<p>"], ["Header 1", "<h1>"], ["Header 2", "<h2>"],
									["Header 3", "<h3>"], ["Header 4", "<h4>"], ["Header 5", "<h5>"],
									["Header 6", "<h6>"]],
								useCSS: false
							});
						});
					</script>
					<?php } ?>
				</div>	
			</div>	
		</div>	
	</div>	
</div>		
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>