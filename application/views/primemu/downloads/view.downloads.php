<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>
<div id="content">
    <div id="box1">
        <div class="title1">
            <h1><?php echo __('Files'); ?></h1>
        </div>
        <div id="content_center">
            <div class="downloadBlock-content">
            <div class="row">
            <div class="col-lg-6 col-md-6">
            <div class="downloadBlock">
            <div class="downloadBlock-title">
            Cliente: <span>Season 18 1~3 [FULL]</span>
            </div>
            <div class="flex-c-c downloadBlock-buttons">
            <a href="" target="_blank" class="googleButton d-button" style="margin: 5px;">Google Drive</a>
            <a href="" target="_blank" class="megaButton d-button" style="margin: 5px;">Mega</a>
            </div>
            </div>
            </div>
            <div class="col-lg-6 col-md-6">
            <div class="downloadBlock">
            <div class="downloadBlock-title">
            Client: <span>Season 18 1~3 [LITE]</span>
            </div>
            <div class="flex-c-c downloadBlock-buttons">
            <a href="" target="_blank" class="googleButton d-button" style="margin: 5px;">Google Drive</a>
            <a href="" target="_blank" class="megaButton d-button" style="margin: 5px;">Mega</a>
            </div>
            </div>
            </div>
            </div>
            </div>
            <div class="downloadBlock-content">
            <div class="downloadBlock">
            <div class="downloadBlock-title">
            Bug Fix </div>
            <div class="downloadBlock-text">
            <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/bugfix.png"><br><br>
            If you have a bug in the game font, download the fix it from the link below and install it to fix the problem. </div>
            <div class="downloadBlock-button">
            <a href="https://mega.nz/file/nFUSERaD#W5RcOtEX9kVz4mwlHtrUV7GVUHLAPaz5ZfqMOiEZULs" target="_blank" class="button">Download</a>
            </div>
            </div>
            </div>
            <div class="row">
<div class="col-lg-12 col-md-12">
<div class="space-20"></div>
<div class="h2-title">
<span>Ping Reducers</span>
</div>
<div class="row">
<div class="col-lg-6 col-md-6" style="text-align: center;">
<a href="https://nopi.ng/RealGames" target="_blank"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/no-ping-en.png" alt="NoPing"></a>
</div>
<div class="col-lg-6 col-md-6" style="text-align: center;">
<a href="https://www.exitlag.com/aff.php?aff=10079523" target="_blank"><img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/exit-lag-en.png" alt="ExitLag"></a>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12 col-md-12">
<div class="space-60"></div>
<div class="h2-title">
<span>SYSTEM REQUIREMENTS</span>
</div>
<div class="table-scroll">
<table class="top-header">
<thead>
<tr>
<th>Component</th>
<th>Minimum / Recommended Requirements</th>
</tr>
</thead>
<tbody>
<tr>
<td>OS</td>
<td><em>Windows 7 or higher</em></td>
</tr>
<tr>
<td>CPU</td>
<td><em>Atom 1.6Ghz / Core 2 Ghz</em></td>
</tr>
<tr>
<td>RAM</td>
<td><em>1GB / 2GB</em></td>
</tr>
<tr>
<td>GPU</td>
<td><em>Intel IGP / Geforce 8600</em></td>
</tr>
<tr>
<td>DirectX</td>
<td><em>Direct X Integrated version</em></td>
</tr>
<tr>
<td>HDD</td>
<td><em>2GB or higher(Client 500MB)</em></td>
</tr>
</tbody>
</table>
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
	