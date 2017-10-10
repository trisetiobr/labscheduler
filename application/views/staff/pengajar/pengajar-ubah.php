<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Ubah <?php echo $title; ?> 
    </h1>
    <ol class="breadcrumb">
      <li><i class="<?php echo $icon;?>"></i> Home</a></li>
      <li><?php echo $title; ?></li>
      <li class="active">Ubah</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- button -->
    <div class="row">
      <div class="col-md-6">
        <div class="box-footer">
            <a type="button" class="btn btn-primary" href="javascript:window.history.go(-1)">
            <i class="glyphicon glyphicon-triangle-left"></i>
            <span>&nbsp Back</span></a>
            </a>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
                <div class="form-group">
                  <label for="Username">Username</label>
                  <input type="email" class="form-control" id="#todo" placeholder="Username" disabled>
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="email" class="form-control" id="#todo" placeholder="Name">
                </div>
                <div class="form-group">
                  <label for="role">Role</label>
                  <input type="email" class="form-control" id="#todo" placeholder="Role">
                </div>
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>