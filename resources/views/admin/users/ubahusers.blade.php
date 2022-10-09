@extends('layouts.backend-admin.app')
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
                  <input type="password" class="form-control" id="pass" name="password" value="{{$u->password}}" required="">
                  <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                </div>
                <div class="form-group">
                  <label>Role</label>
                  <select name="role" id="role" class="form-control">
                    <option>- Pilih -</option>                 
                    @if( $u->role == "admin") echo "<option value='admin' selected>admin</option>";
                    @else echo "<option value='admin'>admin</option>";
                    @endif
                    @if( $u->role == "user") echo "<option value='user' selected>user</option>";
                    @else echo "<option value='user'>user</option>";
                    @endif
                  </select>
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

