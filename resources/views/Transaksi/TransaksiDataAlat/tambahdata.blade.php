{{-- @extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Transaksi Alat
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpantransaksialat')}}" >
              @csrf
              <div class="form-group">
                <label>Nama Alat</label>
                <select name="nama_alat" id="nama_alat" class="form-control" ><option value="">-Pilih-</option>
                  @foreach ($alat as $a)
                  <option value="{{ $a->nama_alat }}" data-harga="{{$a->harga}}">{{$a->nama_alat}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="number" id="harga_satuan" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required="">
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
                <a href="/transaksi/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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
    var jumlah = document.getElementById('jumlah_item').value;
    var total = parseInt(harga) * parseInt(jumlah);

      document.getElementById('hasil').value=total;
  }

  // $('tbody').delegate('.harga_satuan,.jumlah_item','keyup',function(){
  //   var tr = $(this).parent().parent();
  //   var harga = tr.find('.harga_satuan').val();
  //   var jumlah = tr.find('.jumlah_item').val();
  //   var total = (harga * jumlah);
  //   tr.find('.hasil').val(total);
  // });
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
@endsection --}}

@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
  <div class="card card-danger">
      <div class="card-header">
          <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Tambah Data Transaksi Alat
          </h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        
          <form method="POST" action="{{route('simpantransaksialat')}}" >
            @csrf
            <table class="table table-bordered" id="dynamicAddRemove">
              <thead>
              <tr>
                <th>Nama Alat</th>
                <th style="display:none">ID Alat</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <select name="addMoreInputFields[0][nama_alat]" id="nama_alat" class="form-control nama_alat" required>
                    <option value="">-Pilih-</option>
                    @foreach ($alat as $a)
                    <option value="{{ $a->nama_alat }}" data-harga="{{$a->harga}}" data-alat="{{ $a->id_alat }}">{{$a->nama_alat}}</option>
                    @endforeach
                  </select>
                </td>
                <td style="display:none">
                  <input type="text" name="addMoreInputFields[0][id_alat]" placeholder="ID ALAT" class="form-control id_alat" id="id_alat" />
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
                <a href="/transaksi/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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
<script src="{{ asset ('assets/AdminLTE/plugins/priceformat/jquery.priceformat.min.js')}}"></script>
{{-- <!-- Select2 -->
<script src="{{ asset ('assets/AdminLTE/plugins/select2/js/select2.full.min.js')}}"></script> --}}
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
      ++i;
      $("#dynamicAddRemove").append('<tr><td><select name="addMoreInputFields[' + i + '][nama_alat]" id="nama_alat" class="form-control nama_alat" required>  <option value="">-Pilih-</option>  @foreach ($alat as $a)  <option value="{{ $a->nama_alat }}" data-harga="{{$a->harga}}" data-alat="{{ $a->id_alat }}">{{$a->nama_alat}}</option>  @endforeach</select></td><td style="display:none"><input type="text" name="addMoreInputFields[' + i + '][id_alat]" placeholder="ID ALAT" class="form-control id_alat" id="id_alat" /></td><td><input type="number" id="harga_satuan" onkeyup="sum();" name="addMoreInputFields[' + i + '][harga]" class="form-control harga_satuan" placeholder="Harga" required></td><td><input type="number" id="jumlah_item" onkeyup="sum();" name="addMoreInputFields[' + i + '][jumlah]" class="form-control jumlah_item" placeholder="Jumlah" required></td><td><input type="number" id="hasil" onkeyup="sum();" name="addMoreInputFields[' + i + '][total]" class="form-control hasil" placeholder="Total" readonly></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>'
      );
      
    });

    $(document).on('click', '.remove-input-field', function () {
      $(this).parents('tr').remove();
    });

    // $(document).ready(function(){

    // Initialize Select2
    // $('.nama_alat').select2({
    //     theme: 'bootstrap4'
    //   })

    $(document).on('change', '.nama_alat', function() {
    var tr = $(this).parent().parent();
    const selected = $(this).find('option:selected');
    const nb = selected.data('harga'); 
    const alat = selected.data('alat'); 
    // var i = $(this).data('index');

    tr.find(".harga_satuan").val(nb);
    tr.find(".id_alat").val(alat);
    // $(".harga_satuan").eq(i).val(nb);
    });   
    // });   

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