<!-- stylesheet config -->
<?php $this->load->view('config/header'); ?>
<!-- /stylesheet config -->

<!-- header -->
<?php $this->load->view('staff/main/main-header');?>
<!-- /header -->

<!-- sidebar -->
<?php $this->load->view('staff/main/main-sidebar'); ?>
<!-- /sidebar -->

<!-- content -->
<div class="content-wrapper">
  <section class="content">
		<?php $this->load->view($content); ?>
  </section>
</div>
<!-- /content -->

<!-- footer -->
<?php $this->load->view('staff/main/main-footer');?>
<!-- /footer -->

<!-- script config -->
<?php $this->load->view('config/footer'); ?>
<!-- /script config -->

<!-- client script -->
<?php if(isset($client_script)): ?>
	<script src="<?= $client_script;?>"></script>
<?php endif; ?>
<!-- /client script -->