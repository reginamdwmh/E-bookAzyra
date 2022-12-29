@extends('layouts.backend-admin.app')
@section('title')


@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Kategori Makanan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahkategori')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                         @foreach($kategori as $k) 
                         <tr>
                             <td>{{$no++}}</td>
                             <td>{{$k->kode_kategori}}</td>
                             <td>{{$k->nama_kategori}}</td>
                             <td>{{$k->keterangan_kategori}}</td>
                             <td>
                             {{-- <a href="/master-data/data-kategori/lihat/{{$k->id_kategori}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                             <a href="/master-data/data-kategori/ubah/{{$k->id_kategori}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                             <a href="/master-data/data-kategori/hapus/{{$k->id_kategori}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             </td>
                         </tr>
                         @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>        
</section>
@endsection
