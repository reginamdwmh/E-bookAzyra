@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Transaksi Penjualan Makanan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahpenjualanmakanan')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Diskon</th>
                            <th>Pendapatan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                        @foreach($transaksi_penjualan_makanan as $index => $tpm) 
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$tpm->nama_makanan}}</td>
                            <td>@currency($tpm->harga)</td>
                            <td>{{$tpm->jumlah}}</td>
                            <td>{{$tpm->diskon}}%</td>
                            <td>@currency($tpm->total)</td>
                            <td>{{$tpm->created_at->format('d F Y')}}</td>
                            <td>
                            {{-- <a href="/transaksi/data-penjualan-makanan/lihat/{{$tpm->id_penjualan}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                            <a href="/transaksi/data-penjualan-makanan/ubah/{{$tpm->id_penjualan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/transaksi/data-penjualan-makanan/hapus/{{$tpm->id_penjualan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>        
</section>

@endsection
{{-- @section('content')
<section class="content">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Transaksi Penjualan Makanan
            </h5>
        </div>


        <div class="card-body">
            <div class="table-responsive">     
            
            <form action="/transaksi/data-penjualan-makanan/cari" method="GET" class="row">
                  <div class="col">
                    <a class="btn btn-success" href="{{route('tambahpenjualanmakanan')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
                  </div>
                  <div class="col">
                   
                  </div>
                  <div class="col">

                  </div>
                  <div class="col">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}" placeholder="Cari Nama Makanan ..." value="{{ old('cari') }}">
                  </div>
                  <div class="col">
                     <input type="submit" value="Cari" class="btn btn-secondary btn-sm">
                     <a href="/transaksi/data-penjualan-makanan"  class="btn btn-secondary btn-sm">Refresh</a>
                  </div>
            </form>
           
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Bahan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Diskon</th>
                <th>Pendapatan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
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
                <td>
                <a href="/transaksi/data-penjualan-makanan/ubah/{{$tpm->id_penjualan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/transaksi/data-penjualan-makanan/hapus/{{$tpm->id_penjualan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        Current Page: {{ $transaksi_penjualan_makanan->currentPage() }}<br>
        Jumlah Data: {{ $transaksi_penjualan_makanan->total() }}<br>
        Data perhalaman: {{ $transaksi_penjualan_makanan->perPage() }}<br>
        <br>
        {{ $transaksi_penjualan_makanan->links() }}
    </div> 
    
</section>
@endsection --}}