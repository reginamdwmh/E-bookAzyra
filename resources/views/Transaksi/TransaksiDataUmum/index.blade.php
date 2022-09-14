@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
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


        <table class="table table-bordered" id="table-umum">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Makanan</th>
                    <th>Jumlah Penjualan</th>
                    <th>Keterangan Pemesanan</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
        </table>
 

    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>
        $(function() {
            $('#table-umum').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('indexumum') !!}', // memanggil route yang menampilkan data json
                columns: [{ // mengambil & menampilkan kolom sesuai tabel database
                        data: 'id_umum',
                        name: 'id_umum'
                    },
                    {
                        data: 'nama_makanan',
                        name: 'nama_makanan'
                    },
                    {
                        data: 'jumlah_penjualan',
                        name: 'jumlah_penjualan'
                    },
                    {
                        data: 'keterangan_pemesanan',
                        name: 'keterangan_pemesanan'
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
@endsection