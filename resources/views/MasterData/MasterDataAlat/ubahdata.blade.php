@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Alat
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($alat as $a)
              <form method="post" action="{{route('updatealat')}}">
                @csrf
                <input type="hidden" name="id_alat" value="{{$a->id_alat}}">
                <div class="form-group">
                  <label>Nama Alat</label>
                  <input type="text" id="nama_alat" name="nama_alat" value="{{$a->nama_alat}}" class="form-control" placeholder="Nama Alat" required="">
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="text" id="harga" name="harga" value="{{$a->harga}}" class="form-control" placeholder="Haraga" required="">
                </div>
                <div class="form-group text-right">
                  <a href="/master-data/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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

{{-- <div class="modal-body">
  <div class="table-responsive">
    <table class="table table-bordered table-hover">
      @foreach($alat as $a)
        <form method="post" action="{{route('updatealat')}}">
          @csrf
          <input type="hidden" name="id_alat" value="{{$a->id_alat}}">
          <div class="form-group">
            <label>Nama Alat</label>
            <input type="text" id="nama_alat" name="nama_alat" value="{{$a->nama_alat}}" class="form-control" placeholder="Nama Alat" required="">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" id="harga" name="harga" value="{{$a->harga}}" class="form-control" placeholder="Haraga" required="">
          </div>
          <div class="form-group text-right">
            <a href="/master-data/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Data</button>
          </div>
        </form>
      @endforeach
    </table>
  </div>
</div> --}}
