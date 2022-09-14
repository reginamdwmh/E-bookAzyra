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
                Data Bahan
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-success" href="{{route('tambahbahan')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            @foreach($bahan as $index => $b) 
            <tr>
                <td>{{ $index + $bahan->firstItem()}}</td>             
                <td>{{$b->nama_bahan}}</td>
                <td>@currency($b->harga) </td>
                <td>
                <a href="/master-data/data-bahan/ubah/{{$b->id_bahan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/master-data/data-bahan/hapus/{{$b->id_bahan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

            @endforeach
            </table>
        </div>
        {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang berkaitan dengan paginasi  --}}
        Current Page: {{ $bahan->currentPage() }}<br>
        Jumlah Data: {{ $bahan->total() }}<br>
        Data perhalaman: {{ $bahan->perPage() }}<br>
        <br>
        {{ $bahan->links() }}
    </div>
</section>

@endsection