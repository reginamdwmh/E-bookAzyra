@extends('layouts.backend-dashboard.app')
@section('title')


{{-- @section('content')
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
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanpenjualanmakanan')}}" >
              @csrf
              <div class="form-group">
                <label>Nama Makanan</label>
                <select name="nama_makanan" id="nama_makanan" class="form-control" >
                  <option value="">-Pilih-</option>
                  @foreach ($transaksi_penjualan_makanan as $tpm)
                  <option value="{{ $tpm->nama_makanan }}" data-harga="{{$tpm->harga}}">{{$tpm->nama_makanan}}</option>
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
                <label>Diskon</label><span style="color: red">*tulis angka tanpa persen</span>
                <input type="number" id="diskon_makanan" onkeyup="sum();" name="diskon" class="form-control" value="0">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="number" id="hasil" onkeyup="sum();" name="total" class="form-control" placeholder="Total" readonly>
              </div>
              <div class="form-group text-right">
                <a href="/transaksi/data-penjualan-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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


@endsection --}}



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
            <form action="{{ route('simpanpenjualanmakanan') }}" method="POST">
              @csrf
              <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Diskon</th>
                    <th>Total</th>
                </tr>
                <tr>
                    <td>
                      <select name="addMoreInputFields[0][nama_makanan]" id="nama_makanan" class="form-control nama_makanan" >
                        <option value="">-Pilih-</option>
                        @foreach ($transaksi_penjualan_makanan as $tpm)
                        <option value="{{ $tpm->nama_makanan }}" data-harga="{{$tpm->harga}}">{{$tpm->nama_makanan}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input type="text" name="addMoreInputFields[0][harga]" placeholder="Enter harga" class="form-control harga_satuan" id="harga_satuan"  onkeyup="sum();" />
                    </td>
                    <td>
                      <input type="text" name="addMoreInputFields[0][jumlah]" placeholder="Enter jumlah" class="form-control jumlah_harga" id="jumlah_harga"  onkeyup="sum();" />
                    </td>
                    <td>
                      <input type="text" name="addMoreInputFields[0][diskon]" placeholder="Enter diskon" class="form-control diskon_makanan" id="diskon_makanan"  onkeyup="sum();" />
                    </td>
                    <td>
                      <input type="text" name="addMoreInputFields[0][total]" placeholder="Enter total" class="form-control hasil" id="hasil"  onkeyup="sum();" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
                </tr>
            </table>
            <div class="form-group text-right">
              <a href="/transaksi/data-penjualan-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
            </form>
          </div>
        </div>
    </div>

{{-- <script>
  $(document).ready(function () {
    let baris = 1
    $(document).on('click' , '#tambah', function() {
      baris = baris + 1
      var html = "<tr id ='baris'" + baris + ">"
          html += "<td><select name='nama_makanan' data-makanan='baris'" + baris +" id='nama_makanan' class='form-control'><option value=''>-Pilih-</option> @foreach ($transaksi_penjualan_makanan as $tpm) <option value='{{ $tpm->nama_makanan }}' data-harga='{{$tpm->harga}}'>{{$tpm->nama_makanan}}</option> @endforeach </select>"
                    "</td>"
          html += "<td><input type='number' id='harga_satuan' data-satuan='baris'" + baris +" onkeyup='sum();' name='harga' class='form-control' placeholder='Harga' required=''></td>"
          html += "<td><input type='number' id='jumlah_harga' onkeyup='sum();' name='jumlah' class='form-control' placeholder='Jumlah' required=''></td>"
          html += "<td><input type='number' id='diskon_makanan' onkeyup='sum();' name='diskon' class='form-control' value='0'></td>"
          html += "<td><input type='number' id='hasil' onkeyup='sum();' name='total' class='form-control' placeholder='Total' readonly></td>"
          html += "<td><button class='btn-sm btn-danger' data-row='baris'" + baris +" id='hapus'>-</button></td>"
          html += "<tr>"
          $('#table').append(html);
    })
  })
    $(document).on('change', '#nama_makanan', function() {
      let price = $(this).data('satuan');
      const selected = $(this).find('option:selected');
      const nb = selected.data('harga');
 
    $('#harga_satuan' + price).val(nb);
  })
  $(document).on('click', '#hapus' , function (){
    let hapus = $(this).data('row');
    $('#' + hapus).remove();
  })
</script> --}}

<script>
  function sum(){
      var harga = document.getElementById('harga_satuan').value;
      var jumlah = document.getElementById('jumlah_harga').value;
      var diskon = document.getElementById('diskon_makanan').value;
      var total = (parseInt(harga) * parseInt(jumlah)) - (((parseInt(harga) * parseInt(jumlah))*parseInt(diskon))/100);

        document.getElementById('hasil').value=total;
  };
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

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        $("#dynamicAddRemove").append('<tr><td><select name="addMoreInputFields[' + i + '][nama_makanan]" id="nama_makanan" class="form-control nama_makanan" ><option value="">-Pilih-</option>@foreach ($transaksi_penjualan_makanan as $tpm)<option value="{{ $tpm->nama_makanan }}" data-harga="{{$tpm->harga}}">{{$tpm->nama_makanan}}</option>@endforeach</select></td><td><input type="text" name="addMoreInputFields[' + i + '][harga]" placeholder="Enter subject" class="form-control harga_satuan" id="harga_satuan"  onkeyup="sum();"/></td><td><input type="text" name="addMoreInputFields[' + i + '][jumlah]" placeholder="Enter subject" class="form-control jumlah_harga" id="jumlah_harga"  onkeyup="sum();"/></td><td><input type="text" name="addMoreInputFields[' + i + '][diskon]" placeholder="Enter subject" class="form-control diskon_makanan" id="diskon_makanan"  onkeyup="sum();"/></td><td><input type="text" name="addMoreInputFields[' + i + '][total]" placeholder="Enter subject" class="form-control hasil" id="hasil"  onkeyup="sum();"/></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
        );
        
    // $('#nama_makanan').on('change', function() {
    //   const selected = $(this).find('option:selected');
    //   const nb = selected.data('harga'); 
      
    //   $("#harga_satuan").val(nb);
    // });

    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
</section>

@endsection
