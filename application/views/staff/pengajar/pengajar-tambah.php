<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah <?php echo $title; ?> 
    </h1>
    <ol class="breadcrumb">
      <li><i class="<?php echo $icon;?>"></i> Home</a></li>
      <li><?php echo $title; ?></li>
      <li class="active">Tambah</li>
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
                  <label for="Username">*Username</label> (maksimum 25 karakter)
                  <input type="text" class="form-control form-required" placeholder="Username" maxlength="25">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="name">*Nama</label> (maksimum 25 karakter)
                  <input type="text" class="form-control form-required" placeholder="Nama" maxlength="25">
                  <span class="help-block"></span>
                </div>
                

                <div class="form-group">
                  <label for="nama">Password</label>
                  <input type="password" class="form-control form-required" value="staff" maxlength="25">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="nama">Email</label> (example@example.com)
                  <input type="email" class="form-control form-required" placeholder="email" maxlength="50">
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label for="phone">Nomor handphone</label>
                  <input type="text" class="form-control txt-number form-required" placeholder="Nomor handphone" maxlength="15">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="role">Role</label>
                  <input type="email" class="form-control" placeholder="Role" maxlength="50">
                  <span class="help-block"></span>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>