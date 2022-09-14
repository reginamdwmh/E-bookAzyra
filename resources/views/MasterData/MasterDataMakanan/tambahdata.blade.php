@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Makanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanmakanan')}}" enctype="multipart/form-data" >
              @csrf
              <div class="form-group">
                <label>Kategori Makanan</label>
                <select name="nama_kategori" class="form-control" >
                  <option value="">-Pilih-</option>
                  @foreach ($kategori as $k)
                  <option value="{{ $k->nama_kategori }}">{{$k->nama_kategori}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Makanan</label>
                <input type="text" id="nama_makanan" name="nama_makanan" class="form-control" placeholder="Makanan" required="">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" required="">
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="image" required="">
                <p class="help-block">
                  <font color="red">"Format file Jpg/Png"</font>
                </p>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
    </div>
  </div>
</div>
</section>
@endsection