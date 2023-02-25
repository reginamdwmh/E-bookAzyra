@extends('layouts.backend-admin.app')
@section('title')

{{-- @section('content')
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
                <div>
                    <a class="btn btn-success" href="{{route('tambahusers')}}"><i class="fa fa-edit"></i>Tambah User</a>
                </div>
            <br>
            <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Password</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
            </thead>

            @foreach($users as $u) 
            <tr>
            <tbody>
                <td>{{$u->id}}</td>
                <td>{{$u->name}}</td>
                <td>{{$u->email}}</td>
                <td>{{$u->password}}</td>
                <td>{{$u->role}}</td>
                <td>
                <a href="/admin/users/ubah/{{$u->id}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/admin/users/hapus/{{$u->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
</section>
@endsection --}}

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Pengguna
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahusers')}}" class="btn-btn-secondary" >  
                        <i class="fa fa-edit"></i> Tambah User</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($users as $u) 
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$u->name}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->role}}</td>
                            <td>
                            <a href="/admin/users/ubah/{{$u->id}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/admin/users/hapus/{{$u->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
</section>
@endsection