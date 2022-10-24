@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Detail Data Bahan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($bahan as $b)
            <form>
              @csrf
              <input type="hidden" name="id_bahan" value="{{$b->id_bahan}}">
              <div class="form-group">
                <label>Nama Bahan</label>
                <input type="text" id="nama_bahan" name="nama_bahan" class="form-control" value="{{$b->nama_bahan}}" readonly>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" id="harga" name="harga" class="form-control" value="{{$b->harga}}"  readonly>
              </div>     
              <div class="form-group text-right">
                <a href="/master-data/data-bahan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              </div>
            </form>
          @endforeach
        </table>
    </div>
  </div>
</div>

</section>


@endsection