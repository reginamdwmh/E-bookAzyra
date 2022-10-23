@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Transaksi Umum
            </h5>
        </div>
        <div class="card-body">
          <div class="table">
          
            @foreach($transaksi_umum as $tu)
              <form method="post" action="{{route('updatetransaksiumum',['id_umum' => $tu->id_umum ])}}">
                @csrf
                <input type="hidden" name="id_umum" value="{{$tu->id_umum}}">
                <div class="row g-3">
                  <div class="col-sm-4">
                  <label>Nama Makanan</label>
                  <select name="nama_makanan" id="nama_makanan" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($makanan as $m)
                    @if(old('nama_makanan', $tu->nama_makanan == $m->nama_makanan))
                    <option value="{{ $m->nama_makanan }}" selected>{{$m->nama_makanan}}</option>
                    @else
                     <option value="{{ $m->nama_makanan }}" data-harga="{{$m->harga}}" >{{$m->nama_makanan}}</option>
                    @endif
                    @endforeach
                  </select>
                 </div>
                <div class="col-sm-4">
                  <label>Harga</label>
                  <input type="number" id="harga_satuan" value="{{$tu->harga}}" onkeyup="sum();" name="harga" class="form-control" placeholder="Harga" required="">
                </div>
                <div class="col-sm-4">
                  <label>Penjualan</label>
                  <input type="number" id="jumlah_penjualan" value="{{$tu->jumlah_penjualan}}" onkeyup="sum();" name="jumlah_penjualan" class="form-control" placeholder="Jumlah Penjualan" required="">
                </div>
              </div>
                

<br>

                @if(old('get_transaksiumumdetail',$tu->get_transaksiumumdetail))
                <table class="table" id="dynamicAddRemove">
                  <thead>
                    <tr >
                      <th>Mitra</th>
                      <th>Pemesanan</th>
                      <th><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></th>
                    </tr>
                  </thead>

                  
                    
                  <tbody>
                    @foreach(old('get_transaksiumumdetail',$tu->get_transaksiumumdetail) as $key => $gt)
                    {{-- @foreach($tu->get_transaksiumumdetail as $tud) --}}
                    <tr>
                      <td>
                        <select name="addMoreInputFields[{{ $key }}][keterangan_pemesanan]" id="keterangan_pemesanan" class="form-control">
                          <option value="">-Pilih-</option>
                          @foreach($pemesanan as $p)
                          @if(old('keterangan_pemesanan', $gt->keterangan_pemesanan == $p->keterangan_pemesanan))
                          <option value="{{ $p->keterangan_pemesanan }}" selected>{{$p->keterangan_pemesanan}}</option>
                          @else
                           <option value="{{ $p->keterangan_pemesanan }}" data-harga="{{$p->harga}}" >{{$p->keterangan_pemesanan}}</option>
                          @endif
                          @endforeach
                        </select>
                      </td>
                      <td>
                        <input type="number" id="jumlah_pemesanan" value="{{$gt->jumlah_pemesanan}}" name="addMoreInputFields[{{ $key }}][jumlah_pemesanan]" class="form-control" placeholder="Jumlah Pemesanan" required="">
                      </td>
                      <td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td> 
                    </tr>
                    @endforeach
                    </tbody>
                  </table>

                    
                    {{-- @endforeach --}}
                    @else

                    <table class="table" id="dynamicAddRemove">
                      <thead>
                        <tr >
                          <th>Mitra</th>
                          <th>Pemesanan</th>
                          <th><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">+</button></th>
                        </tr>
                      </thead>
                    <tbody>
                      @foreach ($tu->get_transaksiumumdetail as $tud)
                    <tr>
                      <input type="hidden" name="id_transaksi_umum_detail" value="{{$tud->id_transaksi_umum_detail}}">
                      <input type="hidden" name="id_umum" value="{{$tud->id_umum}}">
                        <td>
                          <select name="addMoreInputFields[0][keterangan_pemesanan]" id="keterangan_pemesanan" class="form-control">
                            <option value="">-Pilih-</option>
                            @foreach($pemesanan as $p)
                            @if(old('keterangan_pemesanan', $tud->keterangan_pemesanan == $p->keterangan_pemesanan))
                            <option value="{{ $p->keterangan_pemesanan }}" selected>{{$p->keterangan_pemesanan}}</option>
                            @else
                            <option value="{{ $p->keterangan_pemesanan}}" data-harga="{{$p->harga}}" >{{$p->keterangan_pemesanan}}</option>
                            @endif
                            @endforeach
                          </select>
                        </td>
                        <td>
                          <input type="number" id="jumlah_pemesanan" value="{{$tud->jumlah_pemesanan}}" name="addMoreInputFields[0][jumlah_pemesanan]" class="form-control" placeholder="Jumlah Pemesanan" required="">
                        </td>
                        <td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td> 
                      </tr>
                      
                      @endforeach
                      
                  </tbody>
                </table>
                @endif
                
                <hr class="my-4">
                <div class="col-sm-4">
                  <label>Total Penjualan</label>
                  <input type="number" id="hasil" onkeyup="sum();" value="{{$tu->total}}" name="total" class="form-control" placeholder="Total" readonly>
                </div>      
                <div class="form-group text-right">
                  <a href="/transaksi/data-umum" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Data</button>
                </div>
              </form>
            @endforeach
          
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

  <!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
  var i = 0;
  $("#dynamic-ar").click(function () {
      ++i;
      $("#dynamicAddRemove").append('<tr><td><select name="addMoreInputFields[' + i + '][keterangan_pemesanan]" id="keterangan_pemesanan" class="form-control" ><option value="">-Pilih-</option>@foreach ($pemesanan as $p)<option value="{{ $p->keterangan_pemesanan }}">{{$p->keterangan_pemesanan}}</option>@endforeach</select></td><td><input type="number" id="jumlah_pemesanan" " name="addMoreInputFields[' + i + '][jumlah_pemesanan]" class="form-control" placeholder="Jumlah Pemesanan" required=""></td><td><button type="button" class="btn btn-outline-danger remove-input-field">-</button></td> </tr>'
      );

  });

  $(document).on('click', '.remove-input-field', function () {
      $(this).parents('tr').remove();
  });
</script>
  
 </section>
@endsection