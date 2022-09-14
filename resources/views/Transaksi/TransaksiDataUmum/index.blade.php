@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Mahasiswa
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="?page=add-mhs" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Fakultas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
    
                    
                    </tbody>
                    </tfoot>
                </table>
            </div>
        </div>
</body>

</html>
@endsection