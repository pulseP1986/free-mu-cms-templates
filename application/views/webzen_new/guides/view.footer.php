		<footer class="footer">
            <p class="footer__copyright"><?php echo __('Copyright'); ?> <?php echo date('Y'); ?> &copy; <?php echo $this->config->config_entry('main|servername'); ?></p>
        </footer>
        <button type="button" class="btn-top">TOP</button>
    </div>
    <script src="<?php echo $this->config->base_url; ?>assets/<?php echo $this->config->config_entry("main|template"); ?>/guides/js/ui.min.js"></script>
</body>
</html>