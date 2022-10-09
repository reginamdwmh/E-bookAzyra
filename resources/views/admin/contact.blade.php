@extends('layouts.backend-admin.app')
@section('title')

@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Default box -->
            <div class="card">
              <div class="card-header">
                <h5 class="modal-title" id="myModalLabel">
                    <i class="nav-icon fas fa-phone">
                    Contact</i></h5>
              <div class="card-footer">
                <table>
                <tr>
                <td><img src="{{ asset('assets/AdminLTE/dist/img/tlp.png')}}" width="35px" height="35px"/> Telepon</i></td> <td>:</td> <td>0853-4895-1790</td>
                </tr>
                <tr><td> </td></tr>
                <tr>
                <td><img src="{{ asset('assets/AdminLTE/dist/img/instagram.png')}}" width="35px" height="35px"/>Instagram</i></td> <td>:</td> <td>@azyrasnackandfood</td>
                </tr> 
                <tr><td> </td></tr>
                <tr>
                <td><img src="{{ asset('assets/AdminLTE/dist/img/gojek.png')}}" width="35px" height="35px"/>Gojek</i></td> <td>:</td> <td>Azyra</td>
                </tr>
                <tr><td> </td></tr>
                <tr>
                <td><img src="{{ asset('assets/AdminLTE/dist/img/grab.png')}}" width="35px" height="35px"/>Grab</i></td> <td>:</td> <td>Azyra</td>
                </tr>
                <tr><td> </td></tr>
                <tr>
                <td><img src="{{ asset('assets/AdminLTE/dist/img/shopee.png')}}" width="35px" height="35px"/>Shopee</i></td> <td>:</td> <td>Azyra</td>
                </tr>
                </table>
              </div>
              <!-- /.card-footer-->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->

    {{-- <section class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
    <div class="card-danger">
    <div class="card-header">
        <h4 class="modal-title" id="myModalLabel">
            <i class="nav-icon fas fa-phone">
            Contact Us</i></h4>
        </div>
        <table>
        <tr>
        <td><i class="nav-icon fas fa-">No Telepon</td> <td>:</td> <td>0853-4895-1790</td>
        </tr>
        <tr>
        <td>Instagram</td> <td>:</td> <td>@azyrasnackandfood</td>
        </tr> 
        <tr>
        <td>Gojek</td> <td>:</td> <td>Azyra Cimol Cilok</td>
        </tr>
        <tr>
        <td>Grab</td> <td>:</td> <td>Azyra Cimol Cilok</td>
        </tr>
        </table>
    </div>
    </div>
    </div>
    </div> --}}


  @endsection
