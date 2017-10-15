<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?php echo $title; ?>
    </h1>
    <ol class="breadcrumb">
      <li><i class="<?php echo $icon;?>"></i> Home</a></li>
      <li class="active"><?php echo $title; ?></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- alert -->
    <div class="row">
      <div class="col-md-12">
        <?php if($alert == ''){ 

        }
        else
        {
          ?> 
      
        <div class="alert <?php echo $alert; ?> alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?php echo $alert_text;?>
        </div>
        <?php
        }
        ?>
      </div>
    </div>
    <!-- button -->
    <div class="row">
      <div class="col-md-6">
        <div class="box-footer">
            <?php if($role == 'admin')
            {
            ?>
              <button type="button" class="btn btn-primary btn-href" href="<?php echo base_url('staff/pengajar/tambah');?>">
              <i class="fa fa-plus"></i>
              <span>&nbsp Tambah</span></a>
              </button>
            <?php
            }
            else
            {
            ?>
              <button type="button" class="btn disabled">
              <i class="fa fa-plus"></i>
              <span>&nbsp Tambah</span></a>
              </button>
            <?php
            }?>
        </div>
      </div>
    </div>
    <!-- table -->
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo 'Data '.$title;  ?></h3>
          </div>
          <!-- /.box-header -->
            
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>                
                <?php foreach($staffs as $staff) { ?> 
                  <tr>
                    <td><?php echo $staff['id'];?></td>
                    <td><?php echo $staff['name'];?></td>
                    <td><?php echo $staff['email'];?></td>
                    <td><?php echo $staff['phone'];?></td>
                    <td><?php echo $staff['role'];?></td>
                    <td>
                      <button type="button" class="btn btn-info btn-href" href="<?php echo base_url('staff/pengajar/detail/');echo $staff['id'];?>">
                        <i class="glyphicon glyphicon-eye-open"></i>
                        <span>&nbspLihat</span>
                      </button>
                <?php if($role == 'admin' && $staff['id'] != $id)
                      {
                ?>
                      <button type="button" class="btn btn-warning btn-href" href="<?php echo base_url('staff/pengajar/ubah/');echo $staff['id'];?>">
                        <i class="glyphicon glyphicon-pencil" ></i>
                        <span>&nbspUbah</span>
                      </button>
                      <button type="button" class="btn btn-danger btn-href" href="<?php echo base_url('staff/pengajar/delete/');echo $staff['id'];?>">
                        <i class="glyphicon glyphicon-remove"></i>
                        <span>&nbspHapus</span>
                      </button>
                <?php }
                      else
                      {
                ?>
                      <button type="button" class="btn disabled">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <span>&nbspUbah</span>
                      </button>
                      <button type="button" class="btn disabled">
                        <i class="glyphicon glyphicon-remove"></i>
                        <span>&nbspHapus</span>
                      </button>
                <?php }
                ?>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
            </div>
          </form>
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>