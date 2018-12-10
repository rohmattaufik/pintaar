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
                        <h1 class="box-title">Tambah Tutor Baru</h1>
                    </div>
                    <div class="box-body">
                      	<form class="form-horizontal" method="post" action="{{ route('store-tutor') }}">
            
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-10">
                                	<div class="form-line {{ $errors->has('name') ? ' error' : '' }}">
	                                    <input type="text" name="name" class="form-control" required="true">
	                                </div>
	                                @if ($errors->has('name'))
							            <label id="email-error" class="error" for="email">{{ $errors->first('name') }}</label>
							        @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                	<div class="form-line {{ $errors->has('email') ? ' error' : '' }}">
	                                    <input type="email" class="form-control" name="email" required="true">
	                                </div>
	                                @if ($errors->has('email'))
							            <label id="email-error" class="error" for="email">{{ $errors->first('email') }}</label>
							        @endif
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
