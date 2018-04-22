<section class="content-header">
  <div class="row">
    <ol class="breadcrumb">
      <li><i class="<?= $icon;?>"></i> Home</a></li>
      <li><?= $title; ?></li>
    </ol>
  </div>
</section>

<!-- control button -->
<div class="row">
  <div class="col-md-6">
    <a class="btn btn-primary btn-href" href="<?= base_url('staff/subject/create');?>">
      <i class="fa fa-plus"></i>
      <span> Tambah</span>
    </a>
  </div>
</div>
<!-- /control button -->

<!-- Main content -->
<div class="row">
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Data <?= $title; ?></h3>
          </div>

          <div class="box-body">
            <!-- table -->
            <?php $this->load->view($page_url . '/table', $Subjects);?>
            <!-- /table -->
          </div>
          <div class="box-footer">

          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.content -->

<!-- edit-modal -->
<div class="modal fade" id="modal-edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit modal confirmation</h4>
      </div>
      <div class="modal-body">
        <p>One fine body&hellip;</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary"  data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->

<!-- delete-modal -->
<div id="modal-delete" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Delete modal confirmation</h4>
      </div>
      <div class="modal-body">
        <div class="_content_">
          <!-- template -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button> 
        <button type="submit" class="btn btn-danger" data-dismiss="modal" data-id="" data-model="">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- /delete-modal -->