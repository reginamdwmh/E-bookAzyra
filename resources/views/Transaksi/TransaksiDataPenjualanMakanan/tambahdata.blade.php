@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Transaksi Penjualan Makanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover" id="table">
            <form method="post" action="{{route('simpanpenjualanmakanan')}}">
              @csrf

              <tr>
                  <td>Makanan</td>
                  <td>Harga</td>
                  <td>Jumlah</td>
                  <td>Diskon <span style="color: red">*tanpa %</span></td>
                  <td>Total</td>
                  <td><button class="btn btn-success" id="tambah">+</button></td>
              </tr>

              <tr>
              <td>
                <select name="nama_makanan" id="nama_makanan" class="form-control" >
                  <option value="">-Pilih-</option>
                  @foreach ($transaksi_penjualan_makanan as $tpm)
                  <option value="{{ $tpm->nama_makanan }}" data-harga="{{$tpm->harga}}">{{$tpm->nama_makanan}}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required="">
              </td>
              <td>
                <input type="number" id="jumlah_harga" onkeyup="sum();" name="jumlah" class="form-control" placeholder="Jumlah" required="">
              </td>
              <td>
                <input type="number" id="diskon_makanan" onkeyup="sum();" name="diskon" class="form-control" value="0">
              </td>
              <td>
                <input type="number" id="hasil" onkeyup="sum();" name="total" class="form-control" placeholder="Total" readonly>
              </td>
              <td><button class="btn-sm btn-danger" id="hapus">-</button></td>
            </tr> 
            
              
            </form>
        </table>
        <div class="">
          <a href="/transaksi/data-penjualan-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </div>
  </div>
</div>

<script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>


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

<script>
  $(document).ready(function () {
    let baris = 1

    $(document).on('click' , '#tambah', function() {
      baris = baris + 1
      var html = "<tr id ='baris'" + baris + ">"
          html += "<td><select name='nama_makanan' id='nama_makanan' class='form-control'><option value=''>-Pilih-</option> @foreach ($transaksi_penjualan_makanan as $tpm) <option value='{{ $tpm->nama_makanan }}' data-harga='{{$tpm->harga}}'>{{$tpm->nama_makanan}}</option> @endforeach </select>"
                    "</td>"
          html += "<td><input type='number' id='harga_satuan' onkeyup='sum();' name='harga' class='form-control' placeholder='Harga' required=''></td>"
          html += "<td><input type='number' id='jumlah_harga' onkeyup='sum();' name='jumlah' class='form-control' placeholder='Jumlah' required=''></td>"
          html += "<td><input type='number' id='diskon_makanan' onkeyup='sum();' name='diskon' class='form-control' value='0'></td>"
          html += "<td><input type='number' id='hasil' onkeyup='sum();' name='total' class='form-control' placeholder='Total' readonly></td>"
          html += "<td><button class='btn-sm btn-danger' data-row='baris'" + baris +" id='hapus'>-</button></td>"
          html += "<tr>"

          $('#table').append(html)
    })
    

  })

  $(document).on('click', '#hapus' , function (){
    let hapus = $(this).data('row')
    $('#' + hapus).remove()
  })


</script>

</section>


@endsection