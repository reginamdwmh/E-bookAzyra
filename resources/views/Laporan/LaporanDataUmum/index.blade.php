@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Laporan Data Transaksi Umum
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
                        <a href="#" onclick="this.href='/laporan/data-umum/cetak/'+document.getElementById('tglawal').value +
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
                            <th>Penjualan</th>
                            <th>Mitra</th>
                            <th>Total Penjualan</th>
                            <th>Tanggal</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                          @foreach($transaksi_umum as $tu) 
                          <tr>
                              <td>{{$no++}}</td>
                              <td>{{$tu->nama_makanan}}</td>
                              <td>@currency($tu->harga)</td>
                              <td>{{$tu->jumlah_penjualan}}</td>
                              <td>
                                <ul>
                                    @foreach ( $tu->get_transaksiumumdetail as $tud)
                                        <li>{{$tud->keterangan_pemesanan}} : {{$tud->jumlah_pemesanan}}</li>
                                    @endforeach
                                    
                            
                                </ul>
                            </td>
                              <td>@currency($tu->total)</td>
                              <td>{{$tu->created_at->format('d F Y')}}</td>
                              
                          </tr>
                          @endforeach
              
                </table>
            </div>
        </div>        
</section>
@endsection