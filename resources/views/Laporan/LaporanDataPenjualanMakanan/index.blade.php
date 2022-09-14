@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    {{-- bootstrap  --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Laporan Data Transaksi Penjualan Makanan
            </h5>
        </div>


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
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Diskon</th>
                <th>Total</th>
                <th>Tanggal</th>
               
               
            </tr>
            @foreach($transaksi_penjualan_makanan as $index => $tpm) 
            <tr>
                <td>{{$index + $transaksi_penjualan_makanan->firstItem()}}</td>
                <td>{{$tpm->nama_makanan}}</td>
                <td>@currency($tpm->harga)</td>
                <td>{{$tpm->jumlah}}</td>
                <td>{{$tpm->diskon}}%</td>
                <td>@currency($tpm->total)</td>
                <td>{{$tpm->created_at}}</td>
                
            </tr>
            @endforeach
            </table>
        </div>
        {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang berkaitan dengan paginasi  --}}
        Current Page: {{ $transaksi_penjualan_makanan->currentPage() }}<br>
        Jumlah Data: {{ $transaksi_penjualan_makanan->total() }}<br>
        Data perhalaman: {{ $transaksi_penjualan_makanan->perPage() }}<br>
        <br>
        {{ $transaksi_penjualan_makanan->links() }}
    </div>
</section>
@endsection