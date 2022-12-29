@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Makanan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahmakanan')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                         @foreach($makanan as $m) 
                         <tr>
                             <td>{{$no++}}</td>
                             <td>{{$m->nama_kategori}}</td>
                             <td>{{$m->nama_makanan}}</td>
                             <td>@currency($m->harga)</td>
                             <td>
                                 <img src="{{asset('storage/'. $m->image)}}" width="150px">
                             </td>
                             <td>
                             {{-- <a href="/master-data/data-makanan/lihat/{{$m->id_makanan}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                             <a href="/master-data/data-makanan/ubah/{{$m->id_makanan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                             <a href="/master-data/data-makanan/hapus/{{$m->id_makanan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             </td>
                         </tr>
                         @endforeach
                    </tbody>
                  
                </table>
            </div>
        </div>        
</section>
@endsection