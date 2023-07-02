@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Omzet Pertahun
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
           
                
                <form action="#" method="GET" class="card">
                    <div class="table-responsive">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                        <label for="label">Tahun</label>
                        {{-- <input type="date" name="tglawal" id="tglawal" class="form-control"><br> --}}
                        <select name="tahun" id="tahun" class="form-control"></select>

                    </div>
                </div>
                <br>
                <a href="#" onclick="this.href='/admin/laporan/omzet-pertahun/cetak/'+document.getElementById('tahun').value" target="_blank" class="btn btn-primary">
                <i class="fa fa-print"></i>Cetak</a>
                
                </form>

            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>        
<script type="text/javascript">
$(document).ready(function(){
    let startYear = 2020;
    let endYear = new Date().getFullYear();
    for (i = endYear; i > startYear; i--)
    {
        $('#tahun').append($('<option />').val(i).html(i));
        // document.getElementById('tahun').value = i;
    }

})
    </script>
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
                Data Transaksi Alat
            </h5>
        </div>


        <div class="card-body">
            <div class="table-responsive">     
            
           
            
            <form action="/transaksi/data-alat/cari" method="GET" class="row">
                  <div class="col">
                    <a class="btn btn-success" href="{{route('tambahtransaksialat')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
                  </div>
                  <div class="col">
                   
                  </div>
                  <div class="col">

                  </div>
                  <div class="col">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}" placeholder="Cari Nama Alat..." value="{{ old('cari') }}">
                  </div>
                  <div class="col">
                     <input type="submit" value="Cari" class="btn btn-secondary btn-sm">
                     <a href="/transaksi/data-alat"  class="btn btn-secondary btn-sm">Refresh</a>
                  </div>
            </form>
           
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama Alat</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            @foreach($transaksi_alat as $index => $tb) 
            <tr>
                <td>{{$index + $transaksi_alat->firstItem()}}</td>
                <td>{{$tb->nama_alat}}</td>
                <td>@currency($tb->harga)</td>
                <td>{{$tb->jumlah}}</td>
                <td>@currency($tb->total)</td>
                <td>{{$tb->created_at}}</td>
                <td>
                <a href="/transaksi/data-alat/ubah/{{$tb->id_transaksialat}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/transaksi/data-alat/hapus/{{$tb->id_transaksialat}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        Current Page: {{ $transaksi_alat->currentPage() }}<br>
        Jumlah Data: {{ $transaksi_alat->total() }}<br>
        Data perhalaman: {{ $transaksi_alat->perPage() }}<br>
        <br>
        {{ $transaksi_alat->links() }}
    </div> 
</section>
@endsection --}}