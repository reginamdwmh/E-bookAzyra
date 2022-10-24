@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Pemesanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($pemesanan as $p)
              <form method="post" action="{{route('updatepemesanan')}}">
                @csrf
                <input type="hidden" name="id_pemesanan" value="{{$p->id_pemesanan}}">
                <div class="form-group">
                  <label>keterangan Pemesanan</label>
                  <input type="text" id="keterangan_pemesanan" name="keterangan_pemesanan" value="{{$p->keterangan_pemesanan}}" class="form-control" placeholder="Keterangan Pemesanan" required="">
                </div>
                <div class="form-group">
                  <label>Biaya Admin</label><span style="color: red">*tanpa %</span>
                  <input type="text" id="biaya_admin" name="biaya_admin" value="{{$p->biaya_admin}}" class="form-control" placeholder="Biaya Admin" required="">
                </div>
                <div class="form-group">
                  <label>Ongkir</label>
                  <input type="text" id="ongkir" name="ongkir" value="{{$p->ongkir}}" class="form-control" placeholder="Ongkir" required="">
                </div>
                <div class="form-group text-right">
                  <a href="/master-data/data-pemesanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Data</button>
                </div>
              </form>
            @endforeach
          </table>
          </div>
        </div>
    </div>
 </section>
@endsection