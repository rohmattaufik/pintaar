@extends('template')

@section('title')
  <title>Change Password</title>
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
                        <h1 class="box-title">Ubah Password</h1>
                    </div>
                    <div class="box-body">
                      	<form id="form" class="form-horizontal" method="post" action="{{ route('change-password-submit') }}">
            
                            <div class="form-group">
                                <label for="inputName" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                	<div class="form-line">
	                                    <input type="password" name="password" class="form-control" required="true">
	                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">Konfirmasi Password</label>
                                <div class="col-sm-8">
                                	<div class="form-line">
	                                    <input type="password" class="form-control" name="password_confirm" required="true">
	                                </div>
                                </div>
                            </div>
                            
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-4">
                                    <button type="submit" class="btn btn-danger">Simpan</button>
                                </div>
                            </div>
                    	</form>
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
