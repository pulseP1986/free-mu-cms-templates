<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'guides' . DS . 'view.header');
?>

        <div id="container">
            <section id="contents" class="main">
    <div class="main__cover">
        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/images/guidmain.jpg" alt="">
    </div>
    <div class="main__recommend">
		<h3 class="main__title">Recommended Guide</h3>
        <div class="main-slide">
            <div class="main-slide__list">
                <div class="main-slide__item">
                    <a href="" class="main-slide__link">
                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/images/02.jpg" class="main-slide__img" alt="Maps&amp;Monsters">
                        <span class="main-slide__text">Maps&amp;Monsters</span>
                    </a>
                </div>
                <div class="main-slide__item">
                    <a href="" class="main-slide__link">
                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/images/03.jpg" class="main-slide__img" alt="Characters">
                        <span class="main-slide__text">Characters</span>
                    </a>
                </div>
                <div class="main-slide__item">
                    <a href="" class="main-slide__link">
                        <img src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/images/04.jpg" class="main-slide__img" alt="Mastery Items">
                        <span class="main-slide__text">Mastery Items</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'guides' . DS . 'view.footer');
?>		
        