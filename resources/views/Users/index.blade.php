@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Pengguna
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-success" href="{{route('tambahusers')}}"><i class="fa fa-edit"></i>Tambah User</a><br><br>
            <table class="table table-bordered table-hover">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
            @foreach($users as $u) 
            <tr>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->password}}</td>
                <td>
                <a href="/users/ubah/{{$u->id}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/users/hapus/{{$u->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
    </div>
</section>
@endsection