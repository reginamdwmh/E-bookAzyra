@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Kategori
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($kategori as $k)
              <form method="post" action="{{route('updatekategori')}}">
                @csrf
                <input type="hidden" name="id_kategori" value="{{$k->id_kategori}}">
                <div class="form-group">
                  <label>Kode Kategori</label>
                  <input type="text" id="kode_kategori" name="kode_kategori" value="{{$k->kode_kategori}}" class="form-control" placeholder="Kode" required="">
                </div>
                <div class="form-group">
                  <label>Nama Kategori</label>
                  <input type="text" id="nama_kategori" name="nama_kategori" value="{{$k->nama_kategori}}" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <input type="text" id="keterangan_kategori" name="keterangan_kategori" value="{{$k->keterangan_kategori}}" class="form-control" placeholder="Keterangan" required="">
                </div>

                <div class="form-group text-right">
                  <a href="/master-data/data-kategori" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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