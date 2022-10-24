@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Makanan
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($makanan as $m)
              <form method="post" action="{{route('updatemakanan')}}" enctype="multipart/form-data" >
                @csrf
                <input type="hidden" name="id_makanan" value="{{$m->id_makanan}}">
                <div class="form-group">
                  <label>Kategori Makanan</label>
                  <select name="nama_kategori" class="form-control">
                    <option value="">-Pilih-</option>
                    @foreach($kategori as $k)
                    @if(old('nama_kategori', $m->nama_kategori == $k->nama_kategori))
                    <option value="{{ $k->nama_kategori }}" selected>{{$k->nama_kategori}}</option>
                    @else
                     <option value="{{ $k->nama_kategori }}">{{$k->nama_kategori}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" id="nama_makanan" name="nama_makanan" value="{{$m->nama_makanan}}" class="form-control" placeholder="Nama Makanan" required="">
                </div>
                 <div class="form-group">
                  <label>Harga</label>
                  <input type="text" id="harga" name="harga" value="{{$m->harga}}" class="form-control" placeholder="Harga" required="">
                </div>
                <div class="form-group"> 
                  <label for="Image">Foto</label> 
                  <input type="hidden" name="image" value="{{$m->image}}"> 
                  @if($m->image) 
                  <img src="{{asset('storage/'. $m->image)}}" img class="img-preview img-fluid mb-3 col-sm-5 d-block" alt=""> 
                  @else 
                  <img class="img-preview img-fluid mb-3 col-sm-5"> 
                  @endif 
                  <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" aria-describedby="image" onchange="previewImage()"> 
                  @error('image') 
                  <div class="invalid-feeedback"> 
                      {{ $message }} 
                  </div> 
                  @enderror 
              </div>
                <div class="form-group text-right">
                  <a href="/master-data/data-makanan" title="Kembali" class="btn btn-primary"><i class="fa fa-back"></i>Kembali</a>
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Data</button>
                </div>
              </form>
            @endforeach
          </table>
          </div>
        </div>
    </div>
 </section>
@endsection