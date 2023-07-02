{{-- @extends('layouts.backend-dashboard.app')
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
                <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required>
              </div>
              <div class="form-group">
                <label>Jumlah</label>
                <input type="number" id="jumlah_item" onkeyup="sum();" name="jumlah" class="form-control" placeholder="Jumlah" required="">
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
  function sum(){
  var harga = document.getElementById('harga_satuan').value;
  var jumlah = document.getElementById('jumlah_item').value;
  var total = parseInt(harga) * parseInt(jumlah);

    document.getElementById('hasil').value=total;
}
</script>
</section>
@endsection --}}



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
          
            <form method="POST" action="{{route('simpantransaksibahan')}}" >
              @csrf
              <table class="table table-bordered" id="dynamicAddRemove">
                <thead>
                <tr>
                    <th>Nama Bahan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                    <td>
                      <select name="addMoreInputFields[0][nama_bahan]" id="nama_bahan" class="form-control nama_bahan" required>
                        <option value="">-Pilih-</option>
                        @foreach ($bahan as $b)
                        <option value="{{ $b->nama_bahan }}" data-harga="{{$b->harga}}">{{$b->nama_bahan}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input type="number" id="harga_satuan" onkeyup="sum();" name="addMoreInputFields[0][harga]" class="form-control harga_satuan" placeholder="Harga" required>
                    </td>
                    <td>
                      <input type="number" id="jumlah_item" onkeyup="sum();" name="addMoreInputFields[0][jumlah]" class="form-control jumlah_item" placeholder="Jumlah" required>
                    </td>
                    <td>
                      <input type="number" id="hasil" onkeyup="sum();" name="addMoreInputFields[0][total]" class="form-control hasil" placeholder="Total" readonly>
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></td>
                </tr>
              </tbody>
                </table>
                <div class="form-group text-right">
                  <a href="/transaksi/data-bahan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
                </div>
                </form>

        </table>
    </div>
  </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
var i = 0;
$("#dynamic-ar").click(function () {
    ++i;
    $("#dynamicAddRemove").append('<tr><td><select name="addMoreInputFields[' + i + '][nama_bahan]"  id="nama_bahan" class="form-control nama_bahan" required>  <option value="">-Pilih-</option>@foreach ($bahan as $b)<option value="{{ $b->nama_bahan }}" data-harga="{{$b->harga}}">{{$b->nama_bahan}}</option>@endforeach</select></td><td><input type="number" id="harga_satuan" onkeyup="sum();" name="addMoreInputFields[' + i + '][harga]" class="form-control harga_satuan" placeholder="Harga" required></td><td><input type="number" id="jumlah_item" onkeyup="sum();" name="addMoreInputFields[' + i + '][jumlah]" class="form-control jumlah_item" placeholder="Jumlah" required></td><td><input type="number" id="hasil" onkeyup="sum();" name="addMoreInputFields[' + i + '][total]" class="form-control hasil" placeholder="Total" readonly></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
    );
    
});

$(document).on('click', '.remove-input-field', function () {
    $(this).parents('tr').remove();
});

$(document).on('change', '.nama_bahan', function() {
  var tr = $(this).parent().parent();
  const selected = $(this).find('option:selected');
  const nb = selected.data('harga'); 
  // var i = $(this).data('index');
  
  tr.find(".harga_satuan").val(nb);
  // $(".harga_satuan").eq(i).val(nb);
});   



  $('tbody').delegate('.harga_satuan,.jumlah_item','keyup',function(){
    var tr = $(this).parent().parent();
    var harga = tr.find('.harga_satuan').val();
    var jumlah = tr.find('.jumlah_item').val();
    var total = (harga * jumlah);
    tr.find(".hasil").val(total);
  });

</script>
</section>


@endsection
