@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Laporan Data Transaksi Penjualan Makanan
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
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="#" onclick="this.href='/laporan/data-penjualan-makanan/cetak/'+document.getElementById('tglawal').value +
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
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                          @foreach($transaksi_penjualan_makanan as $tpm) 
                          <tr>
                              <td>{{$no++}}</td>
                              <td>{{$tpm->nama_makanan}}</td>
                              <td>@currency($tpm->harga)</td>
                              <td>{{$tpm->jumlah}}</td>
                              <td>{{$tpm->diskon}}%</td>
                              <td>@currency($tpm->total)</td>
                              <td>{{$tpm->created_at->format('d F Y')}}</td>
                              
                          </tr>
                          @endforeach
                 
                </table>
            </div>
        </div>        
</section>
@endsection