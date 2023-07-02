@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Kategori
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
         
            <form method="POST" action="{{route('simpankategori')}}">
              @csrf
              <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                      <input type="text" name="addMoreInputFields[0][kode_kategori]" placeholder="Kode Kategori" class="form-control kode_kategori" id="kode_kategori" required />
                    </td>
                    <td>
                      <input type="text" name="addMoreInputFields[0][nama_kategori]" placeholder="Nama Kategori" class="form-control nama_kategori" id="nama_kategori" required />
                    </td>
                    <td>
                      <input type="text" name="addMoreInputFields[0][keterangan_kategori]" placeholder="Keterangan  Kategori" class="form-control keterangan_kategori" id="keterangan_kategori" required />
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button>
                    </td>
                </tr>
            </table>
            <div class="form-group text-right">
              <a href="/master-data/data-kategori" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
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
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="addMoreInputFields[' + i + '][kode_kategori]" placeholder="Kode Kategori" class="form-control kode_kategori" id="kode_kategori" required /></td><td><input type="text" name="addMoreInputFields[' + i + '][nama_kategori]" placeholder="Nama Kategori" class="form-control nama_kategori" id="nama_kategori" required /></td><td><input type="text" name="addMoreInputFields[' + i + '][keterangan_kategori]" placeholder="Keterangan  Kategori" class="form-control keterangan_kategori" id="keterangan_kategori" required /></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>');
        
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>  
</section>
@endsection