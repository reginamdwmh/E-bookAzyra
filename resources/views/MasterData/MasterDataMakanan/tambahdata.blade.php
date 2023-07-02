@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Makanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          
            <form method="POST" action="{{route('simpanmakanan')}}" enctype="multipart/form-data" >
              @csrf
              <table class="table table-bordered" id="dynamicAddRemove">
                <tr>
                    <th>Kategori Makanan</th>
                    <th>Alat</th>
                    <th>Nama Makanan</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th></th>
                </tr>
                <tr>
                    <td>
                      <select name="addMoreInputFields[0][nama_kategori]" class="form-control" required>
                        <option value="">-Pilih-</option>
                        @foreach ($kategori as $k)
                        <option value="{{ $k->nama_kategori }}">{{$k->nama_kategori}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <select name="addMoreInputFields[0][id_alat]" class="form-control" required>
                        <option value="">-Pilih-</option>
                        @foreach ($alat as $a)
                        <option value="{{ $a->id_alat }}">{{$a->nama_alat}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td>
                      <input type="text" id="nama_makanan" name="addMoreInputFields[0][nama_makanan]" class="form-control" placeholder="Makanan" required>
                    </td>
                    <td>
                      <input type="number" id="harga" name="addMoreInputFields[0][harga]" class="form-control" placeholder="Harga" required>
                    </td>
                    <td>
                      <input type="file" name="addMoreInputFields[0][image]" required>
                      <p class="help-block">
                        <font color="red">"Format file Jpg/Png"</font>
                      </p>
                    </td>
                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button>
                    </td>
                </tr>
            </table>
            <div class="form-group text-right">
              <a href="/master-data/data-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
            </form>
              
              
             {{-- @csrf
              <div class="form-group">
                <label>Kategori Makanan</label>
                <select name="nama_kategori" class="form-control" >
                  <option value="">-Pilih-</option>
                  @foreach ($kategori as $k)
                  <option value="{{ $k->nama_kategori }}">{{$k->nama_kategori}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Nama Makanan</label>
                <input type="text" id="nama_makanan" name="nama_makanan" class="form-control" placeholder="Makanan" required>
              </div>
              <div class="form-group">
                <label>Harga</label>
                <input type="text" id="harga" name="harga" class="form-control" placeholder="Harga" required>
              </div>
              <div class="form-group">
                <label>Foto</label>
                <input type="file" name="image" required>
                <p class="help-block">
                  <font color="red">"Format file Jpg/Png"</font>
                </p>
              </div>
              <div class="form-group text-right">
                <a href="/master-data/data-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form> --}}

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
        $("#dynamicAddRemove").append('<tr><td><select name="addMoreInputFields[' + i + '][nama_kategori]" class="form-control" required>  <option value="">-Pilih-</option>  @foreach ($kategori as $k)  <option value="{{ $k->nama_kategori }}">{{$k->nama_kategori}}</option>  @endforeach</select></td><td><select name="addMoreInputFields[' + i + '][id_alat]" class="form-control" required>  <option value="">-Pilih-</option>  @foreach ($alat as $a)  <option value="{{ $a->id_alat }}">{{$a->nama_alat}}</option>  @endforeach</select></td><td><input type="text" id="nama_makanan" name="addMoreInputFields[' + i + '][nama_makanan]" class="form-control" placeholder="Makanan" required></td><td><input type="number" id="harga" name="addMoreInputFields[' + i + '][harga]" class="form-control" placeholder="Harga" required></td><td><input type="file" name="addMoreInputFields[' + i + '][image]" required><p class="help-block">  <font color="red">"Format file Jpg/Png"</font></p></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td></tr>');
        
    });
    
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>  
</section>
@endsection