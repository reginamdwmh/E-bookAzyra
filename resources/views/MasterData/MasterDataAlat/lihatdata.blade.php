@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Detail Data Alat
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($alat as $a)
            <form>
              @csrf
              <input type="hidden" name="id_alat" value="{{$a->id_alat}}">
              <div class="form-group">
                <label>Nama Alat</label>
                <input type="text" id="nama_alat" name="nama_alat" class="form-control" value="{{$a->nama_alat}}" readonly>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" id="harga" name="harga" class="form-control" value="{{$a->harga}}"  readonly>
              </div>   
              <div class="form-group text-right">
                <a href="/master-data/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              </div>
            </form>
          @endforeach
        </table>
    </div>
  </div>
</div>

</section>


@endsection