@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Transaksi Umum
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahtransaksiumum')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Makanan</th>
                            <th>Harga</th>
                            <th>Penjualan</th>
                            <th>Mitra</th>
                            <th>Total Penjualan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                        @foreach( $transaksi_umum as $tu) 
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$tu->nama_makanan}}</td>
                            <td>@currency($tu->harga)</td>
                            <td>{{$tu->jumlah_penjualan}}</td>
            

                            {{-- <td>{{ $tu->mitra }}</td> --}}
                            <td>
                                <ul>
                                    @foreach ( $tu->get_transaksiumumdetail as $tud)
                                        <li>{{$tud->keterangan_pemesanan}} : {{$tud->jumlah_pemesanan}}</li>
                                    @endforeach
                                    
                                    
                                </ul>
                            </td>
                            
                            
                            <td>@currency($tu->total)</td>
                            <td>{{$tu->created_at->format('d F Y')}}</td>
                            <td>
                            {{-- <a href="/transaksi/data-umum/lihat/{{$tu->id_umum}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>         --}}
                            <a href="/transaksi/data-umum/ubah/{{$tu->id_umum}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/transaksi/data-umum/hapus/{{$tu->id_umum}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
            </div>
        </div>        
</section>
@endsection