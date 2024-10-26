<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div class="row">
	<?php $this->load->view($this->config->config_entry('main|template') . DS . 'view.user_menu'); ?>
	<div class="col-lg-9">
		<div class="vs-blog mt-15">
			<div class="blog-meta has-border bg-major-black">
				<div class="blog-title text-white font-theme h4 mt-25-sm mb-5-off">
					<h2><?php echo __('Vote'); ?></h2>
				</div>
			</div>
			<div class="blog-content bg-major-black">
				<div class="row">
					<div class="col-lg-12">     
						<h2 class="title"><?php echo __('Vote and get reward'); ?></h2>
						<div class="mb-5">
							<?php
							if(isset($has_char) && $has_char == false){
								echo '<div class="alert alert-danger" role="alert">' . __('VoteReward require character.') . '</div>';
							} else{
								$show_links = true;
								if(isset($has_char)){
									$lvl_total = 0;
									$res_total = 0;
									foreach($has_char as $key => $value){
										$lvl_total += $value['level'];
										$res_total += $value['resets'];
									}
									if($votereward_config['req_lvl'] > $lvl_total){
										echo '<div class="alert alert-danger" role="alert">' . __('Your character total level sum need to be atleast') . ' ' . $votereward_config['req_lvl'] . '.</div>';
										$show_links = false;
									}
									if($votereward_config['req_res'] > $res_total){
										echo '<div class="alert alert-danger" role="alert">' . __('Your character total resets sum need to be atleast') . ' ' . $votereward_config['req_res'] . '.</div>';
										$show_links = false;
									}
								}
								if($show_links){
									$html = '';
									if(!empty($content)){
										foreach($content as $links){
											if($links['api'] == 2){
												$reward_sms = '<br />' . __('Reward SMS Vote') . ': ' . $links['reward_sms'] . ' ' . $this->website->translate_credits($links['reward_type'], $this->session->userdata(['user' => 'server']));
											} else{
												$reward_sms = '';
											}
											if($links['voted'] == 1){
												$html .= '<ul id="vote-options">
																<li>
																	<img id="vote_image_' . $links['id'] . '" src="' . $links['image'] . '" alt="' . $links['name'] . '" class="float-left" data-info="' . __('Reward') . ': ' . $links['reward'] . ' ' . $this->website->translate_credits($links['reward_type'], $this->session->userdata(['user' => 'server'])) . $reward_sms . '" />
																	<h5 class="float-left">' . $links['name'] . '</h5>
																	<button class="float-right vs-btn gradient-btn h4" style="border:0px;" id="vote-' . $links['id'] . '-' . $links['reward_type'] . '" value="' . $links['next_vote'] . '" disabled="disabled" data-api="' . $links['api'] . '" data-info="voted">' . $links['next_vote'] . '</button>
																</li>
															</ul>';
											} else{
												$html .= '<ul id="vote-options">
																<li>
																	<img id="vote_image_' . $links['id'] . '" src="' . $links['image'] . '" alt="' . $links['name'] . '" class="float-left" data-info="' . __('Reward') . ': ' . $links['reward'] . ' ' . $this->website->translate_credits($links['reward_type'], $this->session->userdata(['user' => 'server'])) . $reward_sms . '" />
																	<h5 class="float-left">' . $links['name'] . '</h5>
																	<h5 id="counter-' . $links['id'] . '" class="float-left" style="display:none;">' . $links['countdown'] . '</h5>
																	<button class="float-right vs-btn gradient-btn h4" style="border:0px;" id="vote-' . $links['id'] . '-' . $links['reward_type'] . '" data-link="' . $links['link'] . '" data-info="nvoted" value="vote-' . $links['id'] . '">' . __('Vote Now!') . '</button>
																</li>
															</ul>';
											}
										}
										echo $html;
									} else{
										echo '<div class="alert alert-primary" role="alert">' . __('No Voting Links Currently To Display') . '.</div>';
									}
								}
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