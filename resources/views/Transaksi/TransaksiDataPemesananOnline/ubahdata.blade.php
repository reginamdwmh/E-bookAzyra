@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Transaksi Pemesanan Online
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($transaksi_pemesanan_online as $tpo)
              <form method="post" action="{{route('updatepemesananonline')}}">
                @csrf
                <input type="hidden" name="id_online" value="{{$tpo->id_online}}">
                <div class="row g-3">
                  <div class="col-sm-4">
                  <label>Keterangan_Pemesanan</label>
                  <select name="keterangan_pemesanan" id="keterangan_pemesanan" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($online as $o)
                    @if(old('keterangan_pemesanan', $tpo->keterangan_pemesanan == $o->keterangan_pemesanan))
                    <option value="{{ $o->keterangan_pemesanan }}" selected>{{$o->keterangan_pemesanan}}</option>
                    @else
                     <option value="{{ $o->keterangan_pemesanan }}" data-biaya_admin="{{$o->biaya_admin}}" data-ongkir="{{$o->ongkir}}">{{$o->keterangan_pemesanan}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-4">
                  <label>Kode Pemesanan</label>
                  <input type="text" id="kode_pemesanan" name="kode_pemesanan" class="form-control" placeholder="Kode Pemesanan" value="{{$tpo->kode_pemesanan}}">
                </div>
                <div class="col-sm-4">
                  <label>Jumlah</label>
                  <input type="number" id="jumlah_harga" onkeyup="sum();" name="jumlah" class="form-control" placeholder="Jumlah" required="" value="{{$tpo->jumlah}}">
                </div>
                </div>



              <hr class="my-4">
                <div class="row g-3">
                <div class="col-sm-4">
                  <label>Biaya Admin</label><span style="color: red">*tulis angka tanpa persen</span>
                  <input type="number" id="admin" onkeyup="sum();" name="biaya_admin" class="form-control" value="{{$tpo->biaya_admin}}">
                </div>
                <div class="col-sm-4">
                  <label>Ongkir</label>
                  <input type="number" id="biaya_ongkir" onkeyup="sum();" name="ongkir" class="form-control" value="{{$tpo->ongkir}}">
                </div>
                <div class="col-sm-4">
                  <label>Komisi</label>
                  <input type="number" id="komisi" onkeyup="sum();" name="komisi" class="form-control" placeholder="Komisi" value="{{$tpo->komisi}}" readonly>
                </div>
                </div>

                <hr class="my-4">
                <div class="row g-3">
                  <div class="col-sm-4">
                  <label>Pendapatan</label>
                  <input type="number" id="hasil" onkeyup="sum();" name="total" class="form-control" placeholder="Total" value="{{$tpo->total}}" readonly>
                </div>   
                </div>

                <div class="form-group text-right">
                  <a href="/transaksi/data-pemesanan-online" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Data</button>
                </div>
              </form>
            @endforeach
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
  // Ambil dari atribut data
  $(document).ready(function() {
    $('#keterangan_pemesanan').on('change', function() {
      const selected = $(this).find('option:selected');
      const nb = selected.data('biaya_admin');
      const nc = selected.data('ongkir'); 
      
      $("#admin").val(nb);
      $("#biaya_ongkir").val(nc);
    });
  });
</script>
  
 </section>
@endsection