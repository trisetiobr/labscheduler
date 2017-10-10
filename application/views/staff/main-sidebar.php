<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="treeview" sidebar="button" id="btn-dashboard">
        <a class="click-menu" href="<?php echo base_url('staff/dashboard');?>">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span></a>
      </li>
      <li class="treeview" id="btn-pengajar">
        <a class="click-menu" href="<?php echo base_url('staff/pengajar');?>">
        <i class="glyphicon glyphicon-briefcase"></i>
        <span>Pengajar</span></a>
      </li>
      <li class="treeview" id="btn-matakuliah">
         <a class="click-menu" href="<?php echo base_url('staff/matakuliah');?>">
        <i class="fa fa-sticky-note-o"></i>
        <span>Matakuliah</span></a>
      </li>
      <li class="treeview" id="btn-laboratorium">
         <a class="click-menu" href="<?php echo base_url('staff/laboratorium');?>">
        <i class="fa fa-building"></i>
        <span>Laboratorium</span></a>
      </li>

      <li class="treeview" id="btn-jadwal">
         <a class="click-menu" href="<?php echo base_url('staff/jadwal');?>">
        <i class="fa fa-book"></i>
        <span>Jadwal</span></a>
      </li>

      <li class="treeview" id="btn-peminjaman">
         <a class="click-menu" href="<?php echo base_url('staff/peminjaman');?>">
        <i class="fa fa-calendar"></i>
        <span>Peminjaman</span></a>
      </li>

      <li class="treeview" id="btn-daftar-pengguna">
         <a class="click-menu" href="<?php echo base_url('staff/daftar-pengguna');?>">
        <i class="glyphicon glyphicon-user"></i>
        <span>Daftar Pengguna</span></a>
      </li>
  </section>
  <!-- /.sidebar -->
</aside>