@extends('template')

@section('title')
  <title>Tambah Tutor</title>
@endsection

@section('extra-style')
	<link rel="stylesheet" href="{{URL::asset('css/admin-lte.min.css')}}">
@endsection

@section('content')
<section class="section-padding">
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box box-primary">
                    <div class="box-header">
                        <h1 class="box-title">Akun Pengajar</h1>
                    </div>
                    <div class="box-body">
                      	<table width="100%">
                            <tr>
                                <td>Nama</td>
                                <td>{{ $newTutor->nama }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $newTutor->email }}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>123456</td>
                            </tr>
                        </table>
                        <br>
                        <div class="col-sm-12">
                            <div class="alert alert-success" role="alert"><strong>Perhatian!</strong> Segera ubah password!</div>
                        </div>
                       
                        <div class="col-xs-6 col-md-6">
                            <a href="{{ route('home') }}" class="btn btn-danger btn-block">Kembali ke beranda</a>
                        </div>
                        <div class="col-xs-6 col-md-6">
                            <a href="{{ route('create-tutor') }}" class="btn btn-primary btn-block">Tambah tutor lagi</a>
                        </div>                       
                    </div>
                </div>          
	        </div>
	    </div>
    </div>
    <!-- /.col -->
<!-- /.content-wrapper -->
</section>    
@endsection

  
  
@section('extra-script')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endsection
