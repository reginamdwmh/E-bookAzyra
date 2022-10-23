@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Transaksi Alat
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($transaksi_alat as $ta)
              <form method="post" action="{{route('updatetransaksialat')}}">
                @csrf
                <input type="hidden" name="id_transaksialat" value="{{$ta->id_transaksialat}}">
                <div class="form-group">
                  <label>Nama Alat</label>
                  <select name="nama_alat" id="nama_alat" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($alat as $a)
                    @if(old('nama_alat', $ta->nama_alat == $a->nama_alat))
                    <option value="{{ $a->nama_alat }}" selected>{{$a->nama_alat}}</option>
                    @else
                     <option value="{{ $a->nama_alat }}" data-harga="{{$a->harga}}" >{{$a->nama_alat}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" value="{{$ta->harga}}" class="form-control" placeholder="Harga" required="">
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" id="jumlah_harga" onkeyup="sum();" name="jumlah" value="{{$ta->jumlah}}" class="form-control" placeholder="Jumlah" required="">
                </div>
                <div class="form-group">
                  <label>Total</label>
                  <input type="number" id="hasil" onkeyup="sum();" name="total" value="{{$ta->total}}" class="form-control" placeholder="Total" readonly>
                </div>                
                <div class="form-group text-right">
                  <a href="/transaksi/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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
        var total = parseInt(harga) * parseInt(jumlah);
    
          document.getElementById('hasil').value=total;
      }
    </script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script>
    // Ambil dari atribut data
    $(document).ready(function() {
      $('#nama_alat').on('change', function() {
        const selected = $(this).find('option:selected');
        const nb = selected.data('harga'); 

        $("#harga_satuan").val(nb);
      });
    });
  </script>
  
 </section>
@endsection