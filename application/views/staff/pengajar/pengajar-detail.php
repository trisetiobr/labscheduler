<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><i class="<?php echo $icon;?>"></i> Home</a></li>
      <li><?php echo $title; ?></li>
      <li class="active">Detail</li>
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
              <h3 class="box-title"><?php echo $title; ?> Example</h3>
            </div>
              <!-- /.box-header -->
              <!-- form start -->
                <div class="box-body">
                  <div class="form-group">
                    <label for="Username">*Username</label> (maksimum 25 karakter)
                    <input id="username" name="username" type="text" class="form-control" placeholder="Username" maxlength="25" value="<?php echo $query['id']?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="name">*Nama</label> (maksimum 25 karakter)
                    <input id="name" name="name" type="text" class="form-control" placeholder="Nama" maxlength="25" value="<?php echo $query['name'];?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="nama">*Email</label> (example@example.com)
                    <input id="email" name="email" type="email" class="form-control" placeholder="email" maxlength="50" value="<?php echo $query['email'];?>" disabled>
                  </div>
                  <div class="form-group">
                    <label for="phone">Nomor handphone</label>
                    <input id="phone" name="phone" type="text" class="form-control" placeholder="Nomor handphone" maxlength="15" value="<?php echo $query['phone'];?>" disabled>
                  </div>
                  <div class="form-group">
                    <label>Roles</label>
                    <input name="role_id" class="form-control" value="<?php echo $query['role'];?>" disabled>
                  </div>
                </div>
              <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
    </div>
  </section>
  <!-- /.content -->
</div>