@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Transaksi Pemesanan Online
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanpemesananonline')}}" >
              @csrf
              <div class="form-group">
                <label>Keterangan Pemesanan</label>
                <select name="keterangan_pemesanan" id="keterangan_pemesanan" class="form-control" >
                  <option value="">-Pilih-</option>
                  @foreach ($transaksi_pemesanan_online as $tpm)
                  <option value="{{ $tpm->keterangan_pemesanan }}">{{$tpm->keterangan_pemesanan}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Kode Pemesanan</label>
                <input type="text" id="kode_pemesanan" name="kode_pemesanan" class="form-control" placeholder="Kode Pemesanan" required="">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" id="jumlah_harga" onkeyup="sum();" name="jumlah" class="form-control" placeholder="Jumlah" required="">
              </div>
              <div class="form-group">
                <label>---Komisi Pemesanan Melalui Aplikasi---</label>
              </div>
              <div class="form-group">
                <label>Biaya Admin</label><span style="color: red">*tulis angka tanpa persen</span>
                <input type="number" id="admin" onkeyup="sum();" name="biaya_admin" class="form-control" value="0">
              </div>
              <div class="form-group">
                <label>Ongkir</label>
                <input type="number" id="biaya_ongkir" onkeyup="sum();" name="ongkir" class="form-control" value="0">
              </div>
              <div class="form-group">
                <label>Komisi</label>
                <input type="number" id="komisi" onkeyup="sum();" name="komisi" class="form-control" placeholder="Komisi" readonly>
              </div>
              <div class="form-group">
                <label>Pendapatan</label>
                <input type="number" id="hasil" onkeyup="sum();" name="total" class="form-control" placeholder="Total" readonly>
              </div>
              <div class="form-group text-right">
                <a href="/transaksi/data-pemesanan-online" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
    </div>
  </div>
</div>
<script>
  function sum(){
    var jumlah = document.getElementById('jumlah_harga').value;
    var admin = document.getElementById('admin').value;
    var ongkir = document.getElementById('biaya_ongkir').value;
    var total = (parseInt(jumlah)-(parseInt(jumlah) * parseInt(admin)/100)) - parseInt (ongkir);
    var potongan = (parseInt(jumlah) * parseInt(admin)/100) + parseInt (ongkir);
      document.getElementById('komisi').value=potongan;
      document.getElementById('hasil').value=total;
  }
</script>

</section>


@endsection