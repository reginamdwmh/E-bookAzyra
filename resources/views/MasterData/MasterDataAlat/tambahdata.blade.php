@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Alat
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          
            <form method="POST" action="{{route('simpanalat')}}">
              @csrf
              <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Nama Alat</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                      <input type="text" name="addMoreInputFields[0][nama_alat]" placeholder="Nama Alat" class="form-control nama_alat" id="nama_alat" required />
                    </td>
                    <td>
                      <input type="text" name="addMoreInputFields[0][harga]" placeholder="harga" class="form-control harga" id="harga" required />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button>
                    </td>
                </tr>
            </table>
            <div class="form-group text-right">
              <a href="/master-data/data-alat" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
            </form>
        
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
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i + '][nama_alat]" placeholder="Nama Alat" class="form-control nama_alat" id="nama_alat" required /></td><td><input type="text" name="addMoreInputFields[' + i + '][harga]" placeholder="harga" class="form-control harga" id="harga" required /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>');
        
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });

    
    // var rupiah = document.getElementById('harga');
		// rupiah.addEventListener('keyup', function(e){
		// 	// tambahkan 'Rp.' pada saat form di ketik
		// 	// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		// 	rupiah.value = formatRupiah(this.value, 'Rp. ');
		// });
 
		// /* Fungsi formatRupiah */
		// function formatRupiah(angka, prefix){
		// 	var number_string = angka.replace(/[^,\d]/g, '').toString(),
		// 	split   		= number_string.split(','),
		// 	sisa     		= split[0].length % 3,
		// 	rupiah     		= split[0].substr(0, sisa),
		// 	ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
		// 	// tambahkan titik jika yang di input sudah menjadi angka ribuan
		// 	if(ribuan){
		// 		separator = sisa ? '.' : '';
		// 		rupiah += separator + ribuan.join('.');
		// 	}
 
		// 	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		// 	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		// }
</script>  
</section>

@endsection
{{-- 

  <div class="modal-body">
      <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="POST" action="{{route('simpanalat')}}">
              @csrf
              <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Nama Alat</th>
                    <th>Harga</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                      <input type="text" name="addMoreInputFields[0][nama_alat]" placeholder="Nama Alat" class="form-control nama_alat" id="nama_alat" required="" />
                    </td>
                    <td>
                      <input type="number" name="addMoreInputFields[0][harga]" placeholder="harga" class="form-control harga" id="harga" required="" />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button>
                    </td>
                </tr>
              </table>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
      </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script type="text/javascript">
      var i = 0;
      $("#dynamic-ar").click(function () {
          ++i;
          $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i + '][nama_alat]" placeholder="Nama Alat" class="form-control nama_alat" id="nama_alat" required="" /></td><td><input type="text" name="addMoreInputFields[' + i + '][harga]" placeholder="harga" class="form-control harga" id="harga" required="" /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>');
          
      });
  
      $(document).on('click', '.remove-input-field', function () {
          $(this).parents('tr').remove();
      });
  </script>  
 --}}
