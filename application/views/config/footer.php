<!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?= base_url('assets/bower_components/jquery/dist/jquery.min.js')?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/bower_components/jquery-ui/jquery-ui.min.js')?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<!-- Morris.js charts -->
<script src="<?= base_url('assets/bower_components/raphael/raphael.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/morris.js/morris.min.js')?>"></script>
<!-- Sparkline -->
<script src="<?= base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
<!-- jvectormap -->
<script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
<script src="<?= base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/bower_components/moment/min/moment.min.js')?>"></script>
<script src="<?= base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
<!-- datepicker -->
<script src="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<!-- Slimscroll -->
<script src="<?= base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
<!-- FastClick -->
<script src="<?= base_url('assets/bower_components/fastclick/lib/fastclick.js')?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.min.js')?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('assets/dist/js/pages/dashboard.js')?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js')?>"></script>
<!-- iCheck -->
<script src="<?= base_url('assets/plugins/iCheck/icheck.min.js')?>"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js');?>"></script>

<!-- jquery.min.js -->
<!-- script src="<?php //echo base_url('webscript/3.2.1.jquery.min.js');?>"></script -->

<!-- jquery form validation
			documentation: https://jqueryvalidation.org/documentation/
 -->
 <script src="<?= base_url('assets/plugins/jquery-validate/jquery.validate.1.17.0.min.js');?>"></script>

<!-- jquery utility script factorize @tsbr -->
<script src="<?= base_url('webscript/utility-script.js');?>"></script>

<!-- jquery form factorize @tsbr -->
<script src="<?= base_url('webscript/form-jquery.js');?>"></script>

<!-- jquery ajax script factorize @tsbr -->
<script src="<?= base_url('webscript/ajax-script.js');?>"></script>

<!-- jquery template script factorize @tsbr -->
<script src="<?= base_url('webscript/template-script.js');?>"></script>

<!-- jquery modal script factorize @tsbr -->
<script src="<?= base_url('webscript/modal-script.js');?>"></script>

<!-- staf-script.js -->
<script src="<?= base_url('webscript/staff-script.js');?>"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
