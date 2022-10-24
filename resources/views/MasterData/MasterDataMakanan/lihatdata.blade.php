@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
  <div class="row">
  <div class="col-md-8">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Detail Data Makanan
            </h5>
        </div>
        <div class="card-body">
          <div class="card-body p-0">
          <table class="table table-bordered table-hover">
            @foreach($makanan as $m)
            <form>
              @csrf
              <input type="hidden" name="id_makanan" value="{{$m->id_makanan}}">
              <div class="form-group">
                <label>Kategori</label>
                <input type="text" id="nama_kategori" name="nama_kategori" class="form-control" value="{{$m->nama_kategori}}" readonly>
              </div>
              <div class="form-group">
                <label>Nama Makanan</label>
                <input type="text" id="nama_makanan" name="nama_makanan" class="form-control" value="{{$m->nama_makanan}}"  readonly>
              </div>  
              <div class="form-group">
                <label>Harga</label>
                <input type="text" id="harga" name="harga" class="form-control" value="{{$m->harga}}"  readonly>
              </div>    
              <div class="form-group text-right">
                <a href="/master-data/data-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              </div>
            </form>
          @endforeach
        </table>
          </div>
        </div>
    </div>
  </div>

<div class="col-md-4">
  <div class="card card-success">
    <div class="card-header">
      <center>
        <h3 class="card-title">
          Foto Makanan
        </h3>
      </center>

      <div class="card-tools">
      </div>
    </div>
    <div class="card-body">
      <div class="text-center">
        <img src="{{asset('storage/'. $m->image)}}" alt="" width="280px" > 
      </div>
      @foreach($makanan as $m)
      <h3 class="text-center">
        {{$m->nama_kategori}}
        -
        {{$m->nama_makanan}}
      </h3>
      @endforeach
    </div>
  </div>
</div>

</section>


@endsection