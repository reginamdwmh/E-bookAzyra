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
                Data Pemesanan
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-success" href="{{route('tambahpemesanan')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            @foreach($pemesanan as $index => $p) 
            <tr>
                <td>{{$index + $pemesanan->firstItem()}}</td>
                <td>{{$p->keterangan_pemesanan}}</td>
                <td>
                <a href="/master-data/data-pemesanan/ubah/{{$p->id_pemesanan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/master-data/data-pemesanan/hapus/{{$p->id_pemesanan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

            @endforeach
            </table>
        </div>
        {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang berkaitan dengan paginasi  --}}
        Current Page: {{ $pemesanan->currentPage() }}<br>
        Jumlah Data: {{ $pemesanan->total() }}<br>
        Data perhalaman: {{ $pemesanan->perPage() }}<br>
        <br>
        {{ $pemesanan->links() }}
    </div>
</section>

@endsection