<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.header');
?>

<?php
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.right_sidebar');
    $this->load->view($this->config->config_entry('main|template') . DS . 'view.footer');
?>