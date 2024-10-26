<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title><?php echo $this->meta->request_meta_title(); ?></title>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
<link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/layerslider.min.css" />
<link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/magnific-popup.min.css" />
<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/slick.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url; ?>assets/default_assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/v1.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/css/freemucms.css" rel="stylesheet">
<?php
	if(isset($css)):
		foreach($css as $style):
			echo $style;
		endforeach;
	endif;
?>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/js/jquery-ui.min.js"></script>
<?php
	if(isset($scripts)):
		foreach($scripts as $script):
			echo $script;
		endforeach;
	endif;
?>	
<script type="text/javascript">
jQuery(document).ready(function ($) {
	setInterval(function () {
		moveRight();
	}, 4000);
	var slideCount = $('#slider ul li').length;
	var slideWidth = $('#slider ul li').width();
	var slideHeight = $('#slider ul li').height();
	var sliderUlWidth = slideCount * slideWidth;
	$('#slider').css({ width: slideWidth, height: slideHeight });
	$('#slider ul').css({ width: sliderUlWidth, marginLeft: - slideWidth });
	$('#slider ul li:last-child').prependTo('#slider ul');
	function moveLeft() {
		$('#slider ul').animate({
			left: + slideWidth
		}, 200, function () {
			$('#slider ul li:last-child').prependTo('#slider ul');
			$('#slider ul').css('left', '');
		});
	};
	function moveRight() {
		$('#slider ul').animate({
			left: - slideWidth
		}, 200, function () {
			$('#slider ul li:first-child').appendTo('#slider ul');
			$('#slider ul').css('left', '');
		});
	};
	$('a.control_prev').click(function () {
		moveLeft();
	});
	$('a.control_next').click(function () {
		moveRight();
	});
});
</script>
<style>
body {
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	font-family: 'GothamSSm-Light', sans-serif;
	-webkit-touch-callout: none;
	-webkit-user-select: none;
	-khtml-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
	cursor: default;
	background: #000000 url('<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/launcher/bg-launcher.png') top left no-repeat;
}
a {
	color: #ffffff!important;
}
a:hover {
	color: #f56b58 !important;
}
.container {
	margin: 0px;
	padding: 0px;
	border: 1px solid rgba(255, 255, 255, 0);
	position: absolute;
	width: 870px;
	min-width: 870px;
	height: 338px;
}
.top-bar {
	height: 82px;
	width: 100%;
}
.top-bar .time {
	text-align: center;
	height: 82px;
	padding-top: 15px;
	line-height: 140%;
	color: rgba(255, 255, 255, 0.5);
}
.top-bar .time span {
	color: #ffffff;
	font-size: 22px;
}
.top-bar .menu {
	float: left;
	width: 184px;
	height: 82px;
	/*border-right: 1px solid #282b34;
	padding-left: 70px;*/
}
.top-bar .menu button {
	background: transparent;
	font-size: 12px;
	color: #686d7c;
	border: 0px solid!important;
	height: 82px!important;
	width: 85px!important;
	font-weight: 700;
	border-bottom: 3px solid #0f121a!important;
}
.top-bar .menu button.active {
	background: #161b24;
	font-size: 12px;
	color: #686d7c;
	border: 0px solid!important;
	border-bottom: 3px solid #bb3c2a!important;
	height: 82px!important;
	width: 85px!important;
	font-weight: 700;
}
.top-bar .menu button:hover {
	background: #161b24;
	font-size: 12px;
	color: #686d7c;
	border: 0px solid!important;
	border-bottom: 3px solid #bb3c2a!important;
	height: 82px!important;
	width: 85px!important;
	font-weight: 700;
}
.top-bar .sub-menu {
	float: left;
	height: 82px;
	padding-top: 15px;
	/*border-right: 1px solid #282b34;
	padding-left: 30px;*/
	text-align: right;
}
.top-bar .sub-menu a {
	opacity: 0.5;
}
.top-bar .sub-menu a:hover {
	opacity: 1;
	transition: 0.3s;
}

.content-news {
	width: 406px;
	height: 255px;
}
.content-news .banner {
	width: 407px;
	height: 170px;
}
.content-news .banner img {
	width: 406px;
	height: 170px;
}
.content-news .news {
	float:left;
	width: 201.5px;
	height: 165px;
	margin-left: 1px;
	background: rgba(18, 20, 42, 0.4);
}
.content-news .patch {
	float:left;
	margin-right: 2px;
	width: 201.5px;
	height: 165px;
	background: rgba(18, 20, 42, 0.4);
}
table {
	width: 201.5px;
	font-size: 11px!important;
	line-height: 100%;
}
table tr td.news-title {
	padding: 0px!important;
	padding-top: 8px!important;
	padding-left: 10px!important;
	padding-right: 0px!important;
	text-align: left;
	color: #686d7c;
}
table tr td.news-title a {
	color: #686d7c!important;
}
table tr td.news-title a:hover {
	color: #fff!important;
}
table tr td.date {
	text-align: right;
	color: #686d7c;
	padding: 0px!important;
	padding-top: 8px!important;
	padding-right: 10px!important;
	padding-left: 0px!important;
}
table tr td.title {
	text-align: center;
	color: #fff;
	font-size: 13px;
	padding-bottom: 5px;
	padding-top: 13px;
}
table tr td .text-news {
	color: #b75f52;
	font-weight: 700;
}
.dropbtn {
	border: none;
	cursor: pointer;
}
.dropdown {
	position: relative;
	display: inline-block;
}
.dropdown-content {
	display: none;
	position: absolute;
	background-color: transparent;
	min-width: 140px;
	margin-left: -88px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 999999;
}
.dropdown-content .links {
	background-color: #0f121a;
	margin-top: 17px;
	text-align: left;
	padding: 5px 15px;
	padding-bottom: 15px;
	border-radius: 0px 0px 5px 5px;
	opacity: 0.95;
}
.dropdown-content .text-news {
	color: #bb3c2a;
	font-weight: 700;
	text-shadow: none!important;
}
.dropdown-content a {
	color: black;
	text-decoration: none;
	display: block;
}
.dropdown-content a:hover {
	color: #fff!important;
	text-shadow: 0px 0px 10px #ccc;
}
.dropdown:hover .dropdown-content {
	display: block;
}
#slider {
	position: relative;
	overflow: hidden;
	margin: 0px;
	border: 1px solid rgba(255, 255, 255, 0.03);
}
#slider ul {
	position: relative;
	margin: 0;
	padding: 0;
	height: 170px;
	list-style: none;
}
#slider ul li {
	position: relative;
	display: block;
	float: left;
	margin: 0px!important;
	padding: 0px!important;
	width: 406px;
	height: 170px;
	text-align: center;
}
#slider ul li a img {
	margin: 0px;
	width: 406px;
	height: 170px;
}
a.control_prev, a.control_next {
	position: absolute;
	top: calc(50% - 14px);
	z-index: 999;
	display: block;
	background: #2a2a2a;
	padding: 5px;
	padding-top: 1px;
	color: #fff;
	text-decoration: none;
	font-weight: 600;
	font-size: 14px;
	opacity: 0.8;
	cursor: pointer;
}
a.control_prev:hover, a.control_next:hover {
	opacity: 1;
	-webkit-transition: all 0.4s ease;
}
a.control_prev {
	left: -2px;
	background: rgba(0, 0, 0, 0.9);
	width: 24px;
	height: 28px;
	border-radius: 0 2px 2px 0;
}
a.control_next {
	right: -2px;
	background: rgba(0, 0, 0, 0.9);
	width: 24px;
	height: 28px;
	border-radius: 2px 0 0 2px;
}
</style>
</head>
<body>
<?php
$serverList = $this->website->server_list();
$key = array_key_first($serverList);
$instance = controller::get_instance();
$instance->load->model('rankings'); 
$pvp = $instance->Mrankings->get_ranking_data('killer', $key, $this->config->values('rankings_config', $key), $this->config->values('table_config', $key), 5);
?>
<div class="container d-flex">
<div class="left_side" style="width: 210.5px;">
	<div class="top-bar">
		<div class="time">
			<span>
				<strong>
				<?php $online = $this->website->total_online(60); ?>
				<span>
				<?php echo $online['online'];?>
				</span>
				</strong>
			</span><br/>
			Players Online<br/>
			<span style="font-size:12px;">Server Time: <?php echo date('H:i', time());?></span>
		</div>
	</div>
	<div style="padding-top:25px;padding-left:15px;padding-right:15px;">
		<div class="text-center" style="margin-top:10px;margin-bottom:20px;">
			<strong><span style="font-size:16px;">Top PvP</span></strong><br/>
		</div>
		<?php 
		if($pvp != false){
		$i = 1;
		foreach($pvp AS $killer){ 
		?>
		<div class="d-flex" style="justify-content: space-between;background: rgba(18, 20, 42, 0.4);margin-bottom:2px;">
			<span><?php echo $i;?></span>
			<span><?php echo $killer['name'];?></span>
			<span><?php echo $killer['PkCount'];?></span>
		</div>
		<?php
		$i++;
		}} else { ?>
		<div class="alert-danger">
			<div class="content-danger">
				<div><strong>Error!</strong> No Players Found</div>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<div class="container_center" style="width: 407px;">
	<div class="content-news">
<div class="banner">
<div id="slider">
<a href="#" class="control_next">
<i class="fas fa-arrow-right" aria-hidden="true"></i>
</a>
<a href="#" class="control_prev" style="padding-left: 6px;">
<i class="fas fa-arrow-left" aria-hidden="true"></i>
</a>
<ul>
<?php if(isset(REALMU_V2_VARS['launcher_slides'])){ ?>
 <?php foreach(REALMU_V2_VARS['launcher_slides'] AS $slide){ ?>
<li>
<a href="<?php echo $slide['url'];?>" target="_blank">
<img src="<?php echo $slide['image'];?>">
</a>
</li>
<?php }} ?>
</ul>
</div>
</div>
<div class="news">
<table>
<tr>
<td colspan="2" class="title">
<span class="text-news">--</span> NEWS <span class="text-news">--</span>
</td>
</tr>
<?php
if(!empty($news)){
foreach($news as $key => $article){
	if($article['type'] == 'Update')
		continue;
?>
<tr>
<td class="news-title">
<a href="<?php echo $article['url']; ?>" target="_blank"><span style="color: #e45050 !important;">[<?php echo $article['type'];?>]</span> <?php echo $article['title']; ?></a>
</td>
<td class="date">
<?php echo date('d M', $article['time']); ?> 
 </td>
</tr>
<?php }} ?>
</table>
</div>
<?php
$patchNotes = $this->Mhome->load_news_by_type(4, 5);
?>
<div class="patch">
<table>
<tr>
<td colspan="2" class="title">
<span class="text-news">--</span> PATCH NOTES <span class="text-news">--</span>
</td>
</tr>
<div id="news-list">
<?php if(!empty($patchNotes)){ ?>
<?php foreach($patchNotes as $patch){ ?>
<tr>
<td class="news-title">
<a href="<?php echo $patch['url']; ?>" target="_blank"><span style="color: #fbffbf !important;">[Patch]</span> <?php echo $patch['title']; ?></a>
</td>
<td class="date">
<?php echo date('d M', $patch['time']); ?> 
</td>
</tr>
<?php }} ?>
</div>
</table>
</div>
</div>
</div>
<div class="right_side" style="width: 252.5px;">
	<div class="top-bar">
		<div class="menu">
			<a href="<?php echo $this->config->base_url; ?>" target="_blank">
			<button>Website</button>
			</a>
			<a href="<?php echo REALMU_V2_VARS['discord_link'];?>" target="_blank">
			<button>Discord</button>
			</a>
		</div>
		<div class="sub-menu">
		<div class="dropdown">
		<a href="#" class="dropbtn">
		<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/launcher/menu.png" />
		</a>
		<div class="dropdown-content">
		<div class="links">
		<a href="<?php echo $this->config->base_url; ?>about" target="_blank"><span class="text-news">--</span> Information</a>
		<a href="<?php echo $this->config->base_url; ?>about#journey" target="_blank"><span class="text-news">--</span> Journey</a>
		<a href="<?php echo $this->config->base_url; ?>battle-pass" target="_blank"><span class="text-news">--</span> Battle Pass</a>
		<a href="<?php echo $this->config->base_url; ?>character-market" target="_blank"><span class="text-news">--</span> Market</a>
		</div>
		</div>
		</div>
		</div>
		
	</div>
	<?php
	$key = array_key_first($serverList);
	$cs_info = $this->website->get_cs_info($key);
	$csMark = str_repeat('1', 64);
	if($cs_info['guild'] != '' && $cs_info['guild'] != null){
		$csMark = $cs_info['mark'];
	}
	$ice_info = $this->website->getIceWindWinners($key);
	$iceMark = str_repeat('1', 64);
	if($ice_info != false){
		if($ice_info['G_Name'] != '' && $ice_info['G_Name'] != null){
			$iceMark = urlencode(bin2hex($ice_info['G_Mark']));
		}
	}
	$arca_info = $this->website->getArcaWinners($key, 2);
	$arcaMark = str_repeat('1', 64);
	if($arca_info != false){
		if($arca_info['G_Name'] != '' && $arca_info['G_Name'] != null){
			$arcaMark = urlencode(bin2hex($arca_info['G_Mark']));
		}
	}
	$arca_info2 = $this->website->getArcaWinners($key, 3);
	$arcaMark2 = str_repeat('1', 64);
	if($arca_info2 != false){
		if($arca_info2['G_Name'] != '' && $arca_info2['G_Name'] != null){
			$arcaMark2 = urlencode(bin2hex($arca_info2['G_Mark']));
		}
	}
	?>
	<div class="d-flex" style="padding-top:25px;padding-left:30px;">
		<div class="text-center">
		Castle Siege<br/>
		<img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $csMark;?>/16">
		<strong><?php if($cs_info['guild'] != '' && $cs_info['guild'] != null){ echo '<a href="'.$this->config->base_url.'guild/'.bin2hex($cs_info['guild']).'/'.$key.'" target="_blank">'.$cs_info['guild'].'</a>'; } else { echo __('None'); } ?></strong>
		<br/><br/><br/><br/>
		Throne<br/>
		<img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $iceMark;?>/16">
		<strong><?php if($ice_info != false && $ice_info['G_Name'] != null){ echo '<a href="'.$this->config->base_url.'guild/'.bin2hex($ice_info['G_Name']).'/'.$key.'" target="_blank">'.$ice_info['G_Name'].'</a>'; } else { echo __('None'); } ?></strong>
		</div>
		<div class="text-center" style="margin-left:35px;">
		Arca 1<br/>
		<img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $arcaMark;?>/16" />
		<strong><?php if($arca_info != false && $arca_info['G_Name'] != null){ echo '<a href="'.$this->config->base_url.'guild/'.bin2hex($arca_info['G_Name']).'/'.$key.'" target="_blank">'.$arca_info['G_Name'].'</a>'; } else { echo __('None'); } ?></strong>
		<br/><br/><br/><br/>
		Arca 2<br/>
		<img src="<?php echo $this->config->base_url;?>rankings/get_mark/<?php echo $arcaMark2;?>/16" />
		<strong><?php if($arca_info2 != false && $arca_info2['G_Name'] != null){ echo '<a href="'.$this->config->base_url.'guild/'.bin2hex($arca_info2['G_Name']).'/'.$key.'" target="_blank">'.$arca_info2['G_Name'].'</a>'; } else { echo __('None'); } ?></strong>
		<br/><br/>
		</div>
	</div>
</div>
</div>
</body>
<script type="text/javascript">
	/*document.onselectstart = new Function("return false")
	document.oncontextmenu = new Function("return false")
	if (window.sidebar) {
		document.onmousedown = disableselect
		document.onclick = reEnable
	}*/
</script>
</html>