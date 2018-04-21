
<!-- Content Header (Page header) -->
<section class="content-header">
  <ol class="breadcrumb">
    <li><i class="<?= $icon;?>"></i> Home</a></li>
    <li><?= $title; ?></li>
    <li class="active">Tambah</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">

  <div class="row">
    <!-- left column -->
      <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah <?= $title; ?> </h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
            <?= form_open('staff/pengajar/create'); ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="Username">*Username</label> (maksimum 25 karakter)
                  <input id="username" name="User[id]" type="text" class="form-control field-required" placeholder="Username" maxlength="25" onBlur="checkFieldAvailability(id=this.id, target='username-help-block', controller='ajax_check_username');">
                  <span id="username-help-block" class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="name">*Nama</label> (maksimum 25 karakter)
                  <input id="name" name="User[name]" type="text" class="form-control field-required" placeholder="Nama" maxlength="25">
                  <span class="help-block"></span>
                </div>
                

                <div class="form-group">
                  <label for="nama">*Password</label>
                  <input id="password" name="User[password]" type="password" class="form-control field-required" placeholder="Password" maxlength="25" onKeyDown="checkPasswordStrength();">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label for="nama">*Email</label> (example@example.com)
                  <input id="email" name="User[email]" type="email" class="form-control field-required" placeholder="email" maxlength="50">
                  <p class="help-block"></p>
                </div>

                <div class="form-group">
                  <label for="phone">Nomor handphone</label>
                  <input id="phone" name="User[phone]" type="text" class="form-control txt-number field-required" placeholder="Nomor handphone" maxlength="15">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label>Roles</label>
                  <select name="User[role]" class="form-control">
                    <?php foreach($roles as $key=>$val) : ?>
                      <option value="<?= $key;?>"><?= $val;?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="button" class="btn btn-secondary" href="javascript:window.history.go(-1)">
                  <i class="glyphicon glyphicon-triangle-left"></i>
                  <span>&nbsp Back</span></a>
                </a>

                <button id="submit" type="submit" class="btn btn-success">Submit</button>
              </div>
              <!-- /.box-footer -->
            <?= form_close(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
</section>
<!-- /.content -->
