<section class="content-header">
  <div class="row">

      <ol class="breadcrumb">
        <li><i class="<?= $icon;?>"></i> Home</a></li>
        <li><?= $title; ?></li>
        <li class="active">Tambah</li>
      </ol>

  </div>
</section>

<div class="row">
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah <?= $title; ?> </h3>
          </div>

          <!-- form start -->
            <?= form_open('staff/subject/create', array('id'=>'subject-form')); ?>
              <div class="box-body">
                
                <div class="form-group">
                  <label class="control-label">*Kode</label> (maksimum 15 karakter)
                  <input id="test" name="Subject[code]" type="text" class="form-control" placeholder="Kode pelajaran" maxlength="25">
                  <span class="help-block"></span>
                </div>
                
                <div class="form-group">
                  <label class="control-label">Nama</label> (maksimum 50 karakter)
                  <input name="Subject[name]" type="text" class="form-control" placeholder="Nama" maxlength="25">
                  <span class="help-block"></span>
                </div>

                <div class="form-group">
                  <label class="control-label">Deskripsi</label> (maksimum 150 karakter)
                  <textarea name="Subject[description]" class="form-control" placeholder="Deskripsi" maxlength="25"></textarea>
                  <span class="help-block"></span>
                </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a type="button" class="btn btn-secondary" href="javascript:window.history.go(-1)">
                  <i class="glyphicon glyphicon-triangle-left"></i>
                  <span> Back</span></a>
                </a>
                <button id="submit" type="submit" class="btn btn-success">Submit</button>
              </div>
              <!-- /.box-footer -->
            <?= form_close(); ?>
          <!-- /form -->
        <!-- /.box -->
      </div>
    </div>
  </section>
</div>