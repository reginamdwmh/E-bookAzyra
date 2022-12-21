<!-- jQuery UI 1.11.4 -->
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- ChartJS -->
<script src="{{ asset ('assets/AdminLTE/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset ('assets/AdminLTE/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset ('assets/AdminLTE/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('assets/AdminLTE/plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset ('assets/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ asset ('assets/AdminLTE/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset ('assets/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
{{-- <!-- AdminLTE for demo purposes -->
<script src="{{ asset ('assets/AdminLTE/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset ('assets/AdminLTE/dist/js/pages/dashboard.js')}}"></script> --}}
</body>

<!-- Alert -->
<script src="{{ asset('assets/AdminLTE/plugins/alert.js')}}"></script>

<!-- jQuery -->
<script src="{{ asset ('assets/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset ('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select2 -->
<script src="{{ asset ('assets/AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset ('assets/AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset ('assets/AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset ('assets/AdminLTE/dist/js/demo.js')}}"></script> --}}
<!-- page script -->
<script src="{{ asset ('assets/AdminLTE/plugins/jQuery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

<script>
  $(function() {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<script>
  $(function(){
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>