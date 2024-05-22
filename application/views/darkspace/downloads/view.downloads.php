<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<span class="h1">DOWNLOAD</span>
<div class="news">
<div class="news-content">
<?php
if (empty($downloads)):
		echo '<div style="padding: 0 30px 0px 50px;"><div class="i_note">' . __('Currently no download links.') . '</div></div>';
else:
?>
<div class="downloadBlock">
	<?php
	foreach ($downloads as $download):
	?>
	<div class="download-block-1 flex-c-s">
		<div class="client-text flex-c-c">
			<?php echo htmlspecialchars($download['link_name']); ?>
			<span><?php echo htmlspecialchars($download['link_desc']); ?></span>
		</div>
		<div class="button-download"><a href="<?php echo htmlspecialchars($download['link_url']); ?>" class="button">Download</a></div>
	</div>
	<?php endforeach; ?>
</div>
<?php endif; ?>
</div>
</div>
<?php
$this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
$this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>
	