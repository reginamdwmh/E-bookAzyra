@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Pemesanan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahpemesanan')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Keterangan</th>
                            <th>Biaya Admin</th>
                            <th>Ongkir</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                         @foreach($pemesanan as $p) 
                         <tr>
                             <td>{{$no++}}</td>
                             <td>{{$p->keterangan_pemesanan}}</td>
                             <td>{{$p->biaya_admin}}%</td>
                             <td>@currency($p->ongkir)</td>
                             <td>
                             {{-- <a href="/master-data/data-pemesanan/lihat/{{$p->id_pemesanan}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                             <a href="/master-data/data-pemesanan/ubah/{{$p->id_pemesanan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                             <a href="/master-data/data-pemesanan/hapus/{{$p->id_pemesanan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                             </td>
                         </tr>
             
                         @endforeach
                    </tbody>
                   
                </table>
            </div>
        </div>        
</section>
@endsection
