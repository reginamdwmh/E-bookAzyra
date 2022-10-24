@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Detail Data Pemesanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($pemesanan as $p)
            <form>
              @csrf
              <input type="hidden" name="id_pemesanan" value="{{$p->id_pemesanan}}">
              <div class="form-group">
                <label>Keterangan Pemesanan</label>
                <input type="text" id="keterangan_pemesanan" name="keterangan_pemesanan" class="form-control" value="{{$p->keterangan_pemesanan}}" readonly>
              </div>
              <div class="form-group">
                <label>Biaya Admin</label>
                <input type="number" id="biaya_admin" name="biaya_admin" class="form-control" value="{{$p->biaya_admin}}"  readonly>
              </div>  
              <div class="form-group">
                <label>Ongkir</label>
                <input type="number" id="ongkir" name="ongkir" class="form-control" value="{{$p->ongkir}}"  readonly>
              </div>    
              <div class="form-group text-right">
                <a href="/master-data/data-pemesanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              </div>
            </form>
          @endforeach
        </table>
    </div>
  </div>
</div>

</section>


@endsection