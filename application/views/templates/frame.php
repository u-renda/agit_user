<?php $this->load->view('templates/header'); ?>
<?php $this->load->view('templates/header_nav'); ?>

<!-- BEGIN CONTAINER -->
<div class="container">
    <div class="page-container">
        <?php $this->load->view('templates/left_menu'); ?>
        <?php $this->load->view($frame_content); ?>
    </div>
</div>
<!-- END CONTAINER -->
<?php $this->load->view('templates/footer'); ?>