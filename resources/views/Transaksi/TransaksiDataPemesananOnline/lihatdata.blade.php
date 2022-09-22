@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Detail Transaksi Pemesanan Online
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($transaksi_pemesanan_online as $tpo)
            <form>
              @csrf
              <input type="hidden" name="id_online" value="{{$tpo->id_online}}">
              <div class="form-group">
                <label>Keterangan_Pemesanan</label>
                <select name="keterangan_pemesanan" id="keterangan_pemesanan" class="form-control">
                  <option value="">-Pilih-</option>
                  @foreach($online as $o)
                  @if(old('keterangan_pemesanan', $tpo->keterangan_pemesanan == $o->keterangan_pemesanan))
                  <option value="{{ $o->keterangan_pemesanan }}" selected>{{$o->keterangan_pemesanan}}</option>
                  @else
                   <option value="{{ $o->keterangan_pemesanan }}" >{{$o->keterangan_pemesanan}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Kode Pemesanan</label>
                <input type="text" id="kode_pemesanan" name="kode_pemesanan" class="form-control" placeholder="Kode Pemesanan" value="{{$tpo->kode_pemesanan}}" readonly>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" id="jumlah_harga" name="jumlah" class="form-control" placeholder="Jumlah" value="{{$tpo->jumlah}}"  readonly>
              </div>
              <div class="form-group">
                <label>---Komisi Pemesanan Melalui Aplikasi---</label>
              </div>
              <div class="form-group">
                <label>Biaya Admin</label>
                <input type="number" id="admin" name="biaya_admin" class="form-control" value="{{$tpo->biaya_admin}}"  readonly>
              </div>
              <div class="form-group">
                <label>Ongkir</label>
                <input type="number" id="biaya_ongkir" name="ongkir" class="form-control" value="{{$tpo->ongkir}}"  readonly>
              </div>
              <div class="form-group">
                <label>Komisi</label>
                <input type="number" id="komisi" name="komisi" class="form-control" value="{{$tpo->komisi}}" readonly>
              </div>
              <div class="form-group">
                <label>Pendapatan</label>
                <input type="number" id="hasil" name="total" class="form-control" value="{{$tpo->total}}"  readonly>
              </div>   
              <div class="form-group text-right">
                <a href="/transaksi/data-pemesanan-online" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              </div>
            </form>
          @endforeach
        </table>
    </div>
  </div>
</div>

</section>


@endsection