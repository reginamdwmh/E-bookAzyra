@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Pemesanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanpemesanan')}}">
              @csrf
              <div class="form-group">
                <label>Keterangan Pemesanan</label>
                <input type="text" id="keterangan_pemesanan" name="keterangan_pemesanan" class="form-control" placeholder="Keterangan Pemesanan" required="">
              </div>
              <div class="form-group">
                <label>Biaya Admin</label><span style="color: red">*tanpa %</span>
                <input type="text" id="biaya_admin" name="biaya_admin" class="form-control" value="0" required="">
              </div>
              <div class="form-group">
                <label>Ongkir</label>
                <input type="text" id="ongkir" name="ongkir" class="form-control" value="0" required="">
              </div>
              <div class="form-group text-right">
                <a href="/master-data/data-pemesanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
    </div>
  </div>
</div>
</section>
@endsection