@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Transaksi Makanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($transaksi_penjualan_makanan as $tpm)
              <form method="post" action="{{route('updatepenjualanmakanan')}}">
                @csrf
                <input type="hidden" name="id_penjualan" value="{{$tpm->id_penjualan}}">
                <div class="form-group">
                  <label>Nama Makanan</label>
                  <select name="nama_makanan" id="nama_makanan" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($makanan as $m)
                    @if(old('nama_makanan', $tpm->nama_makanan == $m->nama_makanan))
                    <option value="{{ $m->nama_makanan }}" selected>{{$m->nama_makanan}}</option>
                    @else
                     <option value="{{ $m->nama_makanan }}" data-harga="{{$m->harga}}" >{{$m->nama_makanan}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" value="{{$tpm->harga}}" class="form-control" placeholder="Harga" required="">
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" id="jumlah_harga" onkeyup="sum();" name="jumlah" value="{{$tpm->jumlah}}" class="form-control" placeholder="Jumlah" required="">
                </div>
                <div class="form-group">
                  <label>Diskon</label><span style="color: red">*tulis angka tanpa persen</span>
                  <input type="number" id="diskon_makanan" onkeyup="sum();" name="diskon" class="form-control" value="{{$tpm->diskon}}"  class="form-control">
                </div>
                <div class="form-group">
                  <label>Total</label>
                  <input type="number" id="hasil" onkeyup="sum();" name="total" value="{{$tpm->total}}" class="form-control" placeholder="Total" readonly>
                </div>                
                <div class="form-group text-right">
                  <a href="/transaksi/data-penjualan-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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
        var harga = document.getElementById('harga_satuan').value;
        var jumlah = document.getElementById('jumlah_harga').value;
        var diskon = document.getElementById('diskon_makanan').value;
        var total = (parseInt(harga) * parseInt(jumlah)) - (((parseInt(harga) * parseInt(jumlah))*parseInt(diskon))/100);
    
          document.getElementById('hasil').value=total;
      }
    </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    // Ambil dari atribut data
    $(document).ready(function() {
      $('#nama_makanan').on('change', function() {
        const selected = $(this).find('option:selected');
        const nb = selected.data('harga'); 

        $("#harga_satuan").val(nb);
      });
    });
  </script>
  
 </section>
@endsection