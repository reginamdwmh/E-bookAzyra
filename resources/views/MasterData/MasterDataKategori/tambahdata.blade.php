@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Kategori
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpankategori')}}">
              @csrf
              <div class="form-group">
                <label>Kode Kategori</label>
                <input type="text" id="kode_kategori" name="kode_kategori" class="form-control @error('kode') is-invalid @enderror" placeholder="Kode" required="">
              </div>
              @error('kode')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
              <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" placeholder="Nama" required="">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <input type="text" id="keterangan_kategori" name="keterangan_kategori" class="form-control" placeholder="Keterangan" required="">
              </div>
              <div class="form-group text-right">
                <a href="/master-data/data-kategori" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
    </div>
  </div>
</div>
</section>
@endsection