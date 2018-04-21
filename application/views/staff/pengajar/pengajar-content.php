<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?= $title; ?>
  </h1>
  <ol class="breadcrumb">
    <li><i class="<?= $icon;?>"></i> Home</a></li>
    <li class="active"><?= $title; ?></li>
  </ol>
</section>
<!-- /Content Header -->

<!-- Main content -->
<section class="content">

  <!-- alert -->
  <div class="row">
    <div class="col-md-12">
      <?php if($alert != ''):?> 
      <div class="alert <?= $alert; ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>
        <?= $alert_text;?>
      </div>
      <?php endif; ?>
    </div>
  </div>
  <!-- /alert -->

  <!-- control button -->
  <div class="row">
    <div class="col-md-6">
      <div class="box-footer">
          <?php if($role == 'admin'): ?>
            <button type="button" class="btn btn-primary btn-href" href="<?= base_url('staff/pengajar/create');?>">
              <i class="fa fa-plus"></i>
              <span> Tambah</span>
            </button>
          <?php else: ?>
            <button type="button" class="btn disabled">
              <i class="fa fa-plus"></i>
              <span> Tambah</span>
            </button>
          <?php endif; ?>
      </div>
    </div>
  </div>
  <!-- /control button -->

  <div class="row">
    <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">

        <!-- box header -->
        <div class="box-header with-border">
          <h3 class="box-title">Data <?= $title; ?></h3>
        </div>
        <!-- /.box-header -->
          
        <!-- box-body -->
        <div class="box-body">
          <!-- table -->
          <?php $this->load->view($page_url . 'table', $staffs);?>
          <!-- /table -->
        </div>
        <!-- /.box-body -->

        <!-- box-footer-->
        <div class="box-footer">

        </div>
        <!-- box-footer -->
      </div>

    </div>
  </div>
</section>
<!-- /.content -->
