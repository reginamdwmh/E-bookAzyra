@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Laporan Data Transaksi Alat
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            
                
                <form action="#" method="GET" class="card">
                
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control"><br>
                    </div>
                    <div class="col-md-4">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                        
                    </div>
                    {{-- <div class="col-md-4">
                        <label for="label">Nama Alat</label>
                        <select id="filter-nama-alat" class="form-control filter">
                            <option value="">-Pilih Nama Alat-</option>
                            @foreach ($transaksi_alat as $ta)
                                <option value="{{ $ta->nama_alat }}">{{ $ta->nama_alat }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="#" onclick="this.href='/admin/laporan/data-alat/cetak/'+document.getElementById('tglawal').value +
                        '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary">
                        <i class="fa fa-print"></i>Cetak</a>
                    </div>
                </div>
                </div>
                
                </form>

                <div class="table-responsive">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                          @foreach($transaksi_alat as $tb) 
                          <tr>
                              <td>{{$no++}}</td>
                              <td>{{$tb->nama_alat}}</td>
                              <td>@currency($tb->harga)</td>
                              <td>{{$tb->jumlah}}</td>
                              <td>@currency($tb->total)</td>
                              <td>{{$tb->created_at->format('d F Y')}}</td>
                              
                          </tr>
                          @endforeach
                 
                </table>
            </div>
        </div> 



        {{-- <script src="{{ asset ('assets/AdminLTE/plugins/jQuery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
        <script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
        <script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
        <script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
        <script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
        <script src="{{ asset ('assets/AdminLTE/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        
        <script type="text/javascript">
        let nama_alat = $("#filter-nama-alat").val()
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              ajax:{
                url:"{{ route('index') }}",
                type: "POST",
                data: function (d) {
                    d.nama_alat = nama_alat;
                    return d
                }
              }
            });
          });



        $(".filter").on('change', function(){
                nama_alat = $("#filter-nama-alat").val()
                table.ajax.reload(null,false)
            })
        </script> --}} 
                  
</section>
@endsection