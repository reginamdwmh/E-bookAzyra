@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Transaksi Umum
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($transaksi_umum as $tu)
              <form method="post" action="{{route('updatetransaksiumum')}}">
                @csrf
                <input type="hidden" name="id_umum" value="{{$tu->id_umum}}">
                <div class="form-group">
                  <label>Nama Makanan</label>
                  <select name="nama_makanan" id="nama_makanan" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($makanan as $m)
                    @if(old('nama_makanan', $tu->nama_makanan == $m->nama_makanan))
                    <option value="{{ $m->nama_makanan }}" selected>{{$m->nama_makanan}}</option>
                    @else
                     <option value="{{ $m->nama_makanan }}" data-harga="{{$m->harga}}" >{{$m->nama_makanan}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" id="harga_satuan" value="{{$tu->harga}}" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required="">
                </div>
                <div class="form-group">
                  <label>Penjualan</label>
                  <input type="number" id="jumlah_penjualan" value="{{$tu->jumlah_penjualan}}" onkeyup="sum();" name="jumlah_penjualan" class="form-control" placeholder="Jumlah Penjualan" required="">
                </div>
                <div class="form-group">
                  <label>Mitra</label>
                  <select name="keterangan_pemesanan" id="keterangan_pemesanan" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($pemesanan as $p)
                    @if(old('keterangan_pemesanan', $tu->keterangan_pemesanan == $p->keterangan_pemesanan))
                    <option value="{{ $p->keterangan_pemesanan }}" selected>{{$p->keterangan_pemesanan}}</option>
                    @else
                     <option value="{{ $p->keterangan_pemesanan }}" data-harga="{{$p->harga}}" >{{$p->keterangan_pemesanan}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Pemesanan</label>
                  <input type="number" id="jumlah_pemesanan" value="{{$tu->jumlah_pemesanan}}" name="jumlah_pemesanan" class="form-control" placeholder="Jumlah Pemesanan" required="">
                </div>
                <div class="form-group">
                  <label>Total Penjualan</label>
                  <input type="number" id="hasil" onkeyup="sum();" value="{{$tu->total}}" name="total" class="form-control" placeholder="Total" readonly>
                </div>               
                <div class="form-group text-right">
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
        var jumlah = document.getElementById('jumlah_penjualan').value;
        var total = parseInt(harga) * parseInt(jumlah);

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