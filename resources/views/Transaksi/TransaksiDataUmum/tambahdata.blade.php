@extends('layouts.backend-dashboard.app')
@section('title')

{{-- @section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Transaksi Umum
            </h5>
        </div>
        <div class="card-body">
          <div class="table">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpantransaksiumum')}}" >
              @csrf
              <div class="row g-3">
                <div class="col-sm-4">
                <label>Nama Makanan</label>
                <select name="nama_makanan" id="nama_makanan" class="form-control" >
                  <option value="">-Pilih-</option>
                  @foreach ($makanan as $m)
                  <option value="{{ $m->nama_makanan }}" data-harga="{{$m->harga}}">{{$m->nama_makanan}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-sm-4">
                <label>Harga</label>
                <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required>
              </div>
              <div class="col-sm-4">
                <label>Penjualan</label>
                <input type="number" id="jumlah_penjualan" onkeyup="sum();" name="jumlah_penjualan" class="form-control" placeholder="Jumlah Penjualan" required="">
              </div>
              </div>


            
              <table class="table" id="pesanans_table">
                <thead>
                  <tr>
                    <th>Mitra</th>
                    <th>Pemesanan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="pesanan0">
                    <td>
                      <select name="keterangan_pemesanan" id="keterangan_pemesanan" class="form-control" >
                        <option value="">-Pilih-</option>
                        @foreach ($pemesanan as $p)
                        <option value="{{ $p->keterangan_pemesanan }}">{{$p->keterangan_pemesanan}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input type="number" id="jumlah_pemesanan" name="jumlah_pemesanan" class="form-control" placeholder="Jumlah Pemesanan" required="">
                    </td>
                  </tr>
                  <tr id="pesanan1"></tr>
                </tbody>
            </table>

            <div class="row">
                  <div class="col-md-12">
                      <button id="add_row" class="btn btn-default pull-left">+ Add Row</button>
                      <button id='delete_row' class="pull-right btn btn-danger">- Delete Row</button>
                  </div>
              </div>
          </div>


              <hr class="my-4">
              <div class="col-sm-4">
                <label>Total Penjualan</label>
                <input type="number" id="hasil" onkeyup="sum();" name="total" class="form-control" placeholder="Total" readonly>
              </div>
              <div class="form-group text-right">
                <a href="/transaksi/data-umum" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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

<script>
$(document).ready(function(){
  let row_number = 1;
  $("#add_row").click(function(e){
    e.preventDefault();
    let new_row_number = row_number - 1;
    $('#pesanan' + row_number).html($('#pesanan' + new_row_number).html()).find('td:first-child');
    $('#pesanans_table').append('<tr id="pesanan' + (row_number + 1) + '"></tr>');
    row_number++;
  });

  $("#delete_row").click(function(e){
    e.preventDefault();
    if(row_number > 1){
      $("#pesanan" + (row_number - 1)).html('');
      row_number--;
    }
  });
});
</script>



</section>
@endsection --}}

@section('content')
<section class="content">
  <div class="card card-danger">
      <div class="card-header">
          <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Tambah Data Transaksi Umum
          </h5>
      </div>
      <div class="card-body">
        <div class="table">

          <form method="post" action="{{route('simpantransaksiumum')}}" >
            @csrf
            <div class="row g-3">
              <div class="col-sm-4">
              <label>Nama Makanan</label>
              <select name="nama_makanan" id="nama_makanan" class="form-control nama_makanan" required>
                <option value="">-Pilih-</option>
                @foreach ($makanan as $m)
                <option value="{{ $m->nama_makanan }}" data-harga="{{$m->harga}}">{{$m->nama_makanan}}</option>
                @endforeach
              </select>
            </div>
            <div class="col-sm-4">
              <label>Harga</label>
              <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required>
            </div>
            <div class="col-sm-4">
              <label>Penjualan</label>
              <input type="number" id="jumlah_penjualan" onkeyup="sum();" name="jumlah_penjualan" class="form-control" placeholder="Jumlah Penjualan" required>
            </div>
            </div>
          
<br>

          
            <table class="table" id="dynamicAddRemove">
              <thead>
                <tr>
                  <th>Mitra</th>
                  <th>Pemesanan</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <select name="addMoreInputFields[0][keterangan_pemesanan]" id="keterangan_pemesanan" class="form-control" required>
                      <option value="">-Pilih-</option>
                      @foreach ($pemesanan as $p)
                      <option value="{{ $p->keterangan_pemesanan }}">{{$p->keterangan_pemesanan}}</option>
                      @endforeach
                    </select>
                  </td>
                  <td>
                    <input type="number" id="jumlah_pemesanan" name="addMoreInputFields[0][jumlah_pemesanan]" class="form-control" placeholder="Jumlah Pemesanan" required>
                  </td>
                  <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
                </tr>
              </tbody>
          </table>


            <hr class="my-4">
            <div class="col-sm-4">
              <label>Total Penjualan</label>
              <input type="number" id="hasil" onkeyup="sum();" name="total" class="form-control" placeholder="Total" readonly>
            </div>
            <div class="form-group text-right">
              <a href="/transaksi/data-umum" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
          </form>  
     
  </div>
</div>
</div>

    
  
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/priceformat/jquery.priceformat.min.js')}}"></script>
<script src="{{ asset ('assets/AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
  var i = 0;
  $("#dynamic-ar").click(function () {
      ++i;
      $("#dynamicAddRemove").append('<tr><td><select name="addMoreInputFields[' + i + '][keterangan_pemesanan]" id="keterangan_pemesanan" class="form-control" ><option value="">-Pilih-</option>@foreach ($pemesanan as $p)<option value="{{ $p->keterangan_pemesanan }}">{{$p->keterangan_pemesanan}}</option>@endforeach</select></td><td><input type="number" id="jumlah_pemesanan" name="addMoreInputFields[' + i + '][jumlah_pemesanan]" class="form-control" placeholder="Jumlah Pemesanan" required></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
      );

  });

  $(document).on('click', '.remove-input-field', function () {
      $(this).parents('tr').remove();
  });

  $(document).ready(function(){
  //Initialize Select2
  $('.nama_makanan').select2({
      theme: 'bootstrap4'
    })
  
 
    $("#nama_makanan").on('change', function() {
      const selected = $(this).find('option:selected');
      const nb = selected.data('harga'); 

      $("#harga_satuan").val(nb);
    });
  });  

  function sum(){
      var harga = document.getElementById('harga_satuan').value;
      var jumlah = document.getElementById('jumlah_penjualan').value;
      var total = parseInt(harga) * parseInt(jumlah);
  
        document.getElementById('hasil').value=total;
    }
</script>

</section>
@endsection