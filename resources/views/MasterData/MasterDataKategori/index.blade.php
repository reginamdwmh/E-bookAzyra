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
                Data Kategori Makanan
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-success" href="{{route('tambahkategori')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            @foreach($kategori as $index => $k) 
            <tr>
                <td>{{$index + $kategori->firstItem()}}</td>
                <td>{{$k->kode_kategori}}</td>
                <td>{{$k->nama_kategori}}</td>
                <td>{{$k->keterangan_kategori}}</td>
                <td>
                <a href="/master-data/data-kategori/ubah/{{$k->id_kategori}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/master-data/data-kategori/hapus/{{$k->id_kategori}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
            </div>
            {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang berkaitan dengan paginasi  --}}
            Current Page: {{ $kategori->currentPage() }}<br>
            Jumlah Data: {{ $kategori->total() }}<br>
            Data perhalaman: {{ $kategori->perPage() }}<br>
            <br>
            {{ $kategori->links() }}

        </div>
    </div>
</section>
@endsection