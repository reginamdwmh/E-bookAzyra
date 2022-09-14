@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Pengguna
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($users as $u)
              <form method="post" action="{{route('updateusers')}}">
                @csrf
                <input type="hidden" name="id" value="{{$u->id}}">
                <div class="form-group">
                  <label>Nama</label>
                  <input type="text" name="name" value="{{$u->name}}" class="form-control" placeholder="Nama" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" value="{{$u->email}}" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="text" name="password" value="{{$u->password}}" class="form-control" placeholder="Password" required="">
                </div>

                <div class="form-group text-right">
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