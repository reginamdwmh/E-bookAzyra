@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Transaksi Bahan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($transaksi_bahan as $tb)
              <form method="post" action="{{route('updatetransaksibahan')}}">
                @csrf
                <input type="hidden" name="id_transaksibahan" value="{{$tb->id_transaksibahan}}">
                <div class="form-group">
                  <label>Nama Bahan</label>
                  <select name="nama_bahan" id="nama_bahan" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($bahan as $b)
                    @if(old('nama_bahan', $tb->nama_bahan == $b->nama_bahan))
                    <option value="{{ $b->nama_bahan }}" selected>{{$b->nama_bahan}}</option>
                    @else
                     <option value="{{ $b->nama_bahan }}" data-harga="{{$b->harga}}" >{{$b->nama_bahan}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" value="{{$tb->harga}}" class="form-control" placeholder="Harga" required="">
                </div>
                <div class="form-group">
                  <label>Jumlah</label>
                  <input type="number" id="jumlah_harga" onkeyup="sum();" name="jumlah" value="{{$tb->jumlah}}" class="form-control" placeholder="Jumlah" required="">
                </div>
                <div class="form-group">
                  <label>Total</label>
                  <input type="number" id="hasil" onkeyup="sum();" name="total" value="{{$tb->total}}" class="form-control" placeholder="Total" readonly>
                </div>                
                <div class="form-group text-right">
                  <a href="/transaksi/data-bahan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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
      $('#nama_bahan').on('change', function() {
        const selected = $(this).find('option:selected');
        const nb = selected.data('harga'); 

        $("#harga_satuan").val(nb);
      });
    });
  </script>
  
 </section>
@endsection