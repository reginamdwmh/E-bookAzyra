@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Laporan Data Transaksi Pemesanan Online
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
                        <a href="#" onclick="this.href='/laporan/data-pemesanan-online/cetak/'+document.getElementById('tglawal').value +
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
                            <th>Kode Pemesanan</th>
                            <th>Keterangan Pemesanan</th>
                            <th>Komisi</th>
                            <th>Pendapatan</th>
                            <th>Tanggal</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                           @foreach($transaksi_pemesanan_online as $tpo) 
                           <tr>
                               <td>{{$no++}}</td>
                               <td>{{$tpo->kode_pemesanan}}</td>
                               <td>{{$tpo->keterangan_pemesanan}}</td>
                               <td>@currency($tpo->komisi)</td>
                               <td>@currency($tpo->total)</td>
                               <td>{{$tpo->created_at->format('d F Y')}}</td>
                               
                           </tr>
                           @endforeach
                  
                </table>
            </div>
        </div>        
</section>
@endsection
