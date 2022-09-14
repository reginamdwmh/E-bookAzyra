<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login | E-Book</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/icheck-boostrap/icheck-boostrap.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css')}}">
	<!-- Google Font : Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page bg-gradient-danger">
	<div class="login-box">
		<!--/.Login-Logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<div class="login-logo">
					<a href="#">
						<font color="black">
							<b>E-Book Azyra</b>
						</font>
					</a>
				</div>

				
				<form action="/login" method="post">
					@csrf 
					<div class="input-group mb-3">
						<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="name@example.com" id="email" autofocus required value="{{ old('email') }}">
						<div class="input-group-append">
							<div class="input-group-text">
								
							</div>
						</div>
						@error('email')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>

					<div class="input-group mb-3">
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
						<div class="input-group-append">
							<div class="input-group-text">
							</div>
						</div>
						@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
						@enderror
					</div>
					<div class="row">
						<div class="col-12">
							<button class="w-100 btn-lg btn-success" type="submit">
							 	<b>Masuk</b>
							 </button>
						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
	<!-- /.Login-box -->
	
	<!-- jQuery -->
	<script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->
	<script src="{{ asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/AdminLTE/dist/js/adminlte.min.js')}}"></script>
	<!-- Alert -->
	<script src="{{ asset('assets/AdminLTE/plugins/alert.js')}}"></script>


</body>
</html>