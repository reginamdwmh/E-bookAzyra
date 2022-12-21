@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Transaksi Alat
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahtransaksialat')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
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
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                        @foreach($transaksi_alat as $index => $a) 
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$a->nama_alat}}</td>
                            <td>@currency($a->harga)</td>
                            <td>{{$a->jumlah}}</td>
                            <td>@currency($a->total)</td>
                            <td>{{$a->created_at->format('d F Y')}}</td>
                            <td>
                            {{-- <a href="/transaksi/data-alat/lihat/{{$a->id_transaksialat}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                            <a href="/transaksi/data-alat/ubah/{{$a->id_transaksialat}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/transaksi/data-alat/hapus/{{$a->id_transaksialat}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                Data Transaksi Alat
            </h5>
        </div>


        <div class="card-body">
            <div class="table-responsive">     
            
           
            
            <form action="/transaksi/data-alat/cari" method="GET" class="row">
                  <div class="col">
                    <a class="btn btn-success" href="{{route('tambahtransaksialat')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
                  </div>
                  <div class="col">
                   
                  </div>
                  <div class="col">

                  </div>
                  <div class="col">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}" placeholder="Cari Nama Alat..." value="{{ old('cari') }}">
                  </div>
                  <div class="col">
                     <input type="submit" value="Cari" class="btn btn-secondary btn-sm">
                     <a href="/transaksi/data-alat"  class="btn btn-secondary btn-sm">Refresh</a>
                  </div>
            </form>
           
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Alat</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            @foreach($transaksi_alat as $index => $tb) 
            <tr>
                <td>{{$index + $transaksi_alat->firstItem()}}</td>
                <td>{{$tb->nama_alat}}</td>
                <td>@currency($tb->harga)</td>
                <td>{{$tb->jumlah}}</td>
                <td>@currency($tb->total)</td>
                <td>{{$tb->created_at}}</td>
                <td>
                <a href="/transaksi/data-alat/ubah/{{$tb->id_transaksialat}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/transaksi/data-alat/hapus/{{$tb->id_transaksialat}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        Current Page: {{ $transaksi_alat->currentPage() }}<br>
        Jumlah Data: {{ $transaksi_alat->total() }}<br>
        Data perhalaman: {{ $transaksi_alat->perPage() }}<br>
        <br>
        {{ $transaksi_alat->links() }}
    </div> 
</section>
@endsection --}}