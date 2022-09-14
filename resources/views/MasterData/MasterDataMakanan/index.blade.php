@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    {{-- bootstrap  --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Makanan
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-success" href="{{route('tambahmakanan')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            @foreach($makanan as $index => $m) 
            <tr>
                <td>{{$index + $makanan->firstItem()}}</td>
                <td>{{$m->nama_kategori}}</td>
                <td>{{$m->nama_makanan}}</td>
                <td>@currency($m->harga)</td>
                <td>
                    <img src="{{asset('storage/'. $m->image)}}" width="150px">
                </td>
                <td>
                <a href="/master-data/data-makanan/ubah/{{$m->id_makanan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/master-data/data-makanan/hapus/{{$m->id_makanan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang berkaitan dengan paginasi  --}}
        Current Page: {{ $makanan->currentPage() }}<br>
        Jumlah Data: {{ $makanan->total() }}<br>
        Data perhalaman: {{ $makanan->perPage() }}<br>
        <br>
        {{ $makanan->links() }}
    </div>
</section>
@endsection