@extends('layouts.backend-dashboard.app')
@section('title')

{{-- @section('content')
<section class="content">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    

    
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Transaksi Penjualan Makanan
            </h5>
        </div>


        <div class="card-body">
            <div class="table-responsive">     
            
            <form action="/transaksi/data-penjualan-makanan/cari" method="GET" class="row">
                  <div class="col">
                    <a class="btn btn-success" href="{{route('tambahpenjualanmakanan')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
                  </div>
            </form>


        <table class="table table-bordered" id="table-bahan">
            <thead>
                <tr>
                    <th>Nama Bahan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
 

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#table-bahan').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('indextransaksibahan') !!}', // memanggil route yang menampilkan data json
                columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                       data: 'nama_bahan',
                        name: 'nama_bahan'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    }
                ]
            });
        });
    </script>
</body>

</html>
@endsection --}}

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Transaksi Bahan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahtransaksibahan')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Bahan</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                        @foreach($transaksi_bahan as $index => $tb) 
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$tb->nama_bahan}}</td>
                            <td>@currency($tb->harga)</td>
                            <td>{{$tb->jumlah}}</td>
                            <td>@currency($tb->total)</td>
                            <td>{{$tb->created_at->format('d F Y')}}</td>
                            <td>
                            {{-- <a href="/transaksi/data-bahan/lihat/{{$tb->id_transaksibahan}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                            <a href="/transaksi/data-bahan/ubah/{{$tb->id_transaksibahan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/transaksi/data-bahan/hapus/{{$tb->id_transaksibahan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
        </div>        
</section>

@endsection




{{-- @section('content')
<section class="content">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Transaksi Bahan
            </h5>
        </div>


        <div class="card-body">
            <div class="table-responsive">     
            
           
            
            <form action="/transaksi/data-bahan/cari" method="GET" class="row">
                  <div class="col">
                    <a class="btn btn-success" href="{{route('tambahtransaksibahan')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
                  </div>
                  <div class="col">
                   
                  </div>
                  <div class="col">

                  </div>
                  <div class="col">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}" placeholder="Cari Nama Bahan ..." value="{{ old('cari') }}">
                  </div>
                  <div class="col">
                     <input type="submit" value="Cari" class="btn btn-secondary btn-sm">
                     <a href="/transaksi/data-bahan"  class="btn btn-secondary btn-sm">Refresh</a>
                  </div>
            </form>
           
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Bahan</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            @foreach($transaksi_bahan as $index => $tb) 
            <tr>
                <td>{{$index + $transaksi_bahan->firstItem()}}</td>
                <td>{{$tb->nama_bahan}}</td>
                <td>@currency($tb->harga)</td>
                <td>{{$tb->jumlah}}</td>
                <td>@currency($tb->total)</td>
                <td>{{$tb->created_at}}</td>
                <td>
                <a href="/transaksi/data-bahan/ubah/{{$tb->id_transaksibahan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/transaksi/data-bahan/hapus/{{$tb->id_transaksibahan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        Current Page: {{ $transaksi_bahan->currentPage() }}<br>
        Jumlah Data: {{ $transaksi_bahan->total() }}<br>
        Data perhalaman: {{ $transaksi_bahan->perPage() }}<br>
        <br>
        {{ $transaksi_bahan->links() }}
    </div> 
</section>
@endsection --}}