<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Market'); ?></h1>
        </div>
        <div class="box-style1" style="margin-bottom: 20px;">
            <h2 class="title"><?php echo __('Buy Slots'); ?></h2>

            <div class="entry">
                <?php
				if (isset($error)):
					echo '<div class="e_note">' . $error . '</div>';
				endif;
				if (isset($success)):
					echo '<div class="s_note">' . $success . '</div>';
				endif;
				?>
				<table class="ranking-table">
					<thead>
					<tr class="main-tr">
						<th style="text-align: left;padding-left: 15px;"
							colspan="3"><?php echo __('Details'); ?></th>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td style="width:30%;text-align: left;padding-left: 15px;"><?php echo __('Slots Count'); ?></td>
						<td style="width:70%;text-align: left;padding-left: 15px;">+10</td>
					</tr>
					<tr>
						<td style="width:30%;text-align: left;padding-left: 15px;"><?php echo __('Price'); ?></td>
						<td style="width:70%;text-align: left;padding-left: 15px;">
							<?php
							$price = $this->config->config_entry('market|additionalslots_price');
							echo $price; ?> <?php echo $this->website->translate_credits($this->config->config_entry('market|additionalslots_price_type'), $this->session->userdata(array('user' => 'server'))); ?>
						</td>
					</tr>
					</tbody>
				</table>
				<div style="text-align:center;">
					<form method="post" action="">
						<button type="submit" class="custom_button" name="buy_slots" id="buy_slots" value="buy_slots"><?php echo __('Buy Now'); ?></button>
					</form>
				</div>
            </div>
        </div>
    </div>
</div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>