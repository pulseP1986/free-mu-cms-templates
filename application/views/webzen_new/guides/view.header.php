<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <title><?php echo $this->meta->request_meta_title(); ?></title>
    <meta name="keywords" content="<?php echo $this->meta->request_meta_keywords(); ?>"/>
    <meta name="description" content="<?php echo $this->meta->request_meta_description(); ?>"/>
	<script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/js/jquery-1.12.4.min.js"></script>
    <link rel="shortcut icon" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/images/favicon.ico"/>
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/css/common.css">
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/css/ui.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/css/froala_style.min.css">
    <link rel="stylesheet" href="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/css/uii.min.css">   
    <style>
    em.keyword, strong.keyword {   
    }
    .nav__link {    
    }
    .sub-nav__link {   
    }
	 #contents {        
    }
    </style>
</head>
<body>
    <div id="wrap">  
		<header class="header">
			<h1 class="logo">
				<a href="<?php echo $this->config->base_url; ?>guides" class="logo__link">
					<img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/images/MUlogo.png" class="logo__img" alt="">
				</a>
				<em class="logo__text">GUIDE LIBRARY</em>
			</h1>
		</header>
		<?php
		$catConfig = $this->config->values('guides_category');
		?>
        <nav class="gnb">
            <div class="gnb__inner">
				<div class="nav">
					<ul class="nav__list">
					<?php
					
					foreach($catConfig as $key => $cat){ 
						$guides = $this->Mguides->load_guides_by_category($key);
						$currenOpen = '';
						if(isset($guideData) && $guideData['category'] == $key){
							$currenOpen = 'current open';
						}
					?>
						<li class="nav__item <?php echo $currenOpen;?>">
							<a href="javascript:;" class="nav__link"><?php echo $cat['name'];?></a>
							<?php if(!empty($guides)){ ?>
							<ul class="sub-nav">
								<?php 
									foreach($guides as $key => $article){ 
										$currenGuide = '';
										if(isset($guideData) && $guideData['id'] == $article['id']){
											$currenGuide = 'current';
										}
								?>
								<li class="sub-nav__item <?php echo $currenGuide;?>">
									<a href="<?php echo $this->config->base_url; ?>guides/read/<?php echo $this->website->seo_string($article['title']); ?>/<?php echo $article['id']; ?>" class="sub-nav__link "><?php echo $article['title']; ?></a>
								</li>
								<?php } ?>
							</ul>
							<?php } ?>
						</li>
					<?php } ?>
					</ul>
				</div>
				<div class="direct">
					<a href="<?php echo $this->config->base_url; ?>" class="direct__link">Go to Homepage</a>
				</div>
			</div>
        </nav>