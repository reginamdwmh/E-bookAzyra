@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-8">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Detail Transaksi Pemesanan Online
            </h5>
        </div>
        <div class="card-body">
          <div class="card-body p-0">
          <table class="table table-bordered table-hover">
            @foreach($transaksi_pemesanan_online as $tpo)
            <form>
              @csrf
              <input type="hidden" name="id_online" value="{{$tpo->id_online}}">
              <div class="form-group">
                <label>Keterangan Pemesanan</label>
                <label>Kode Pemesanan</label>
                <input type="text" id="keterangan_pemesanan" name="keterangan_pemesanan" class="form-control"  value="{{$tpo->keterangan_pemesanan}}" readonly>
              </div>
              <div class="form-group">
                <label>Kode Pemesanan</label>
                <input type="text" id="kode_pemesanan" name="kode_pemesanan" class="form-control"  value="{{$tpo->kode_pemesanan}}" readonly>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" id="jumlah_harga" name="jumlah" class="form-control"  value="{{$tpo->jumlah}}"  readonly>
              </div>
 
              <div class="form-group text-right">
                <a href="/transaksi/data-pemesanan-online" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              </div>
            </form>
          @endforeach
        </table>
    </div>
  </div>
</div>
</div>
<div class="col-md-4">
  <div class="card card-danger">
    <div class="card-header">
      <center>
        <h3 class="card-title">
          ---Komisi Pemesanan Melalui Aplikasi---
        </h3>
      </center>

      <div class="card-tools">
      </div>
    </div>
    <div class="card-body">
      
        <div class="form-group">
          <label>Biaya Admin</label>
          <input type="number" id="admin" name="biaya_admin" class="form-control" value="{{$tpo->biaya_admin}}"  readonly>
        </div>
        <div class="form-group">
          <label>Ongkir</label>
          <input type="number" id="biaya_ongkir" name="ongkir" class="form-control" value="{{$tpo->ongkir}}"  readonly>
        </div>
        <div class="form-group">
          <label>Komisi</label>
          <input type="number" id="komisi" name="komisi" class="form-control" value="{{$tpo->komisi}}" readonly>
        </div>
        <div class="form-group">
          <label>Pendapatan</label>
          <input type="number" id="hasil" name="total" class="form-control" value="{{$tpo->total}}"  readonly>
        </div>   
          
    </div>
  </div>
</div>

</section>

@endsection