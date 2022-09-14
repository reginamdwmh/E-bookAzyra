@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    {{-- bootstrap  --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Alat
            </h5>
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
            <a class="btn btn-success" href="{{route('tambahalat')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
            @foreach($alat as $index => $a) 
            <tr>
                <td>{{ $index + $alat->firstItem()}}</td>
                <td>{{$a->nama_alat}}</td>
                <td>@currency($a->harga) </td>
                <td>
                <a href="/master-data/data-alat/ubah/{{$a->id_alat}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/master-data/data-alat/hapus/{{$a->id_alat}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>

            @endforeach
            </table>
        </div>
        {{-- perhatikan script di bawah ini untuk membuat paginasi dan yang berkaitan dengan paginasi  --}}
        Current Page: {{ $alat->currentPage() }}<br>
        Jumlah Data: {{ $alat->total() }}<br>
        Data perhalaman: {{ $alat->perPage() }}<br>
        <br>
        {{ $alat->links() }}
    </div>
<!-- DataTables -->
    {{-- <script src="{{ asset('/assets/AdminLTE/plugins/datatables/jquery.dataTables.js')}}"></script>
	<script src="{{ asset('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>

    <script>
		$(function() {
			$("#example1").DataTable();
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
			});
		});
	</script> --}}
</section>

@endsection