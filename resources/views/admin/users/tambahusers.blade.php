@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Pengguna
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanusers')}}">
              @csrf
              <div class="form-group">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" placeholder="Nama" required="">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" required="">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" id="pass" name="password" class="form-control" placeholder="Password" required="">
                <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
              </div>
              <div class="form-group">
                <label>Role</label>
                <select name="role" id="role" class="form-control">
                  <option>- Pilih -</option>
                  <option>admin</option>
                  <option>user</option>
                </select>
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
    </div>
  </div>
</div>
</section>

<script type="text/javascript">
	function change() {
		var x = document.getElementById('pass').type;

		if (x == 'password') {
			document.getElementById('pass').type = 'text';
			document.getElementById('mybutton').innerHTML;
		} else {
			document.getElementById('pass').type = 'password';
			document.getElementById('mybutton').innerHTML;
		}
	}
</script>

@endsection