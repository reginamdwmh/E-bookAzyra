@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
    
   

    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Transaksi Bahan
            </h5>
        </div>


        <div class="card-body">
            <div class="table-responsive">     
            
           
            
            <form action="/transaksi/data-bahan/cari" method="GET" class="row">
                  <div class="col">
                    <a class="btn btn-success" href="{{route('tambahtransaksibahan')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
                  </div>
                  <div class="col">
                   
                  </div>
                  <div class="col">

                  </div>
                  <div class="col">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}" placeholder="Cari Nama Bahan ..." value="{{ old('cari') }}">
                  </div>
                  <div class="col">
                     <input type="submit" value="Cari" class="btn btn-secondary btn-sm">
                     <a href="/transaksi/data-bahan"  class="btn btn-secondary btn-sm">Refresh</a>
                  </div>
            </form>
           
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Bahan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            @foreach($transaksi_bahan as $index => $tb) 
            <tr>
                <td>{{$index + $transaksi_bahan->firstItem()}}</td>
                <td>{{$tb->nama_bahan}}</td>
                <td>@currency($tb->harga)</td>
                <td>{{$tb->jumlah}}</td>
                <td>@currency($tb->total)</td>
                <td>{{$tb->created_at}}</td>
                <td>
                <a href="/transaksi/data-bahan/ubah/{{$tb->id_transaksibahan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/transaksi/data-bahan/hapus/{{$tb->id_transaksibahan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        Current Page: {{ $transaksi_bahan->currentPage() }}<br>
        Jumlah Data: {{ $transaksi_bahan->total() }}<br>
        Data perhalaman: {{ $transaksi_bahan->perPage() }}<br>
        <br>
        {{ $transaksi_bahan->links() }}
    </div> 
</section>
@endsection