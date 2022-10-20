@extends('layouts.backend-dashboard.app')
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
            <div class="table-responsive">
                
                <form action="#" method="GET" class="row">
                    <div class="col">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control"><br>
                      
                        <a href="#" onclick="this.href='/laporan/data-penjualan-makanan/cetak/'+document.getElementById('tglawal').value +
                        '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary">
                        <i class="fa fa-print"></i>Cetak</a>
                    </div>
                    <div class="col">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                        
                    </div>
                    <div class="col"><br>
                        
                    </div>
                    <div class="col">
                       
                    </div>
              </form>

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
                              <td>{{$tb->created_at->format('d/m/Y')}}</td>
                              
                          </tr>
                          @endforeach
                    </tfoot>
                </table>
            </div>
        </div>        
</section>
@endsection