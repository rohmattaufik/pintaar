@extends('template')

@section('title')
  <title>Pintaar - Ubah Password</title>
@endsection

@section('extra-style')

@endsection

@section('content')
<section class="section-padding">
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                
                    
                        <h1>Ubah Password</h1>
                        <br>
                      	<form id="form" class="form-horizontal" method="post" action="{{ route('change-password-submit') }}">
            
                            <div class="form-group">
                                <label for="inputName" class="col-sm-4 control-label">Password Baru</label>
                                <div class="col-sm-8">
                                	<div class="form-line">
	                                    <input type="password" name="password" class="form-control" required="true">
	                                </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-4 control-label">Ulangi Password Baru</label>
                                <div class="col-sm-8">
                                	<div class="form-line">
	                                    <input type="password" class="form-control" name="password_confirm" required="true">
	                                </div>
                                </div>
                            </div>
                            
                            {{ csrf_field() }}

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-4 text-left">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                    	</form>
                        
	        </div>
	    </div>
    </div>
</section>    
@endsection

  
  
@section('extra-script')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

@endsection
