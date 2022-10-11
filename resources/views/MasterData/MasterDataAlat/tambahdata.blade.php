@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Alat
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanalat')}}">
              @csrf
              <div class="form-group">
                <label>Nama Alat</label>
                <input type="text" id="nama_alat" name="nama_alat" class="form-control" placeholder="Nama Alat" required="">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" required="">
              </div>

              <div class="form-group text-right">
                <a href="/master-data/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
    </div>
  </div>
</div>
</section>

@endsection

{{-- 
  <div class="modal-body">
      <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanalat')}}">
              @csrf
              <div class="form-group">
                <label>Nama Alat</label>
                <input type="text" id="nama_alat" name="nama_alat" class="form-control" placeholder="Nama Alat" required="">
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" required="">
              </div>

              <div class="form-group text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
      </div>
  </div> --}}


