@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Transaksi Bahan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpantransaksibahan')}}" >
              @csrf
              <div class="form-group">
                <label>Nama Bahan</label>
                <select name="nama_bahan" id="nama_bahan" class="form-control" >
                  <option value="">-Pilih-</option>
                  @foreach ($bahan as $b)
                  <option value="{{ $b->nama_bahan }}" data-harga="{{$b->harga}}">{{$b->nama_bahan}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required="">
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" id="jumlah_harga" onkeyup="sum();" name="jumlah" class="form-control" placeholder="Jumlah" required="">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" id="hasil" onkeyup="sum();" name="total" class="form-control" placeholder="Total" readonly>
              </div>
              <div class="form-group text-right">
                <a href="/transaksi/data-bahan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
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