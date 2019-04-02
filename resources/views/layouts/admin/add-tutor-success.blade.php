@extends('template')

@section('title')
  <title>Tambah Pengajar</title>
@endsection

@section('extra-style')
	
@endsection

@section('content')
<section class="section-padding">
    <!-- Main content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                
                <h3 class="box-title">Akun Pengajar</h3>                  
              	<table width="100%">
                    <tr>
                        <td align="left">Nama</td>
                        <td align="left">{{ $newTutor->nama }}</td>
                    </tr>
                    <tr>
                        <td align="left">Email</td>
                        <td align="left">{{ $newTutor->email }}</td>
                    </tr>
                    <tr>
                        <td align="left">Password</td>
                        <td align="left">123456</td>
                    </tr>
                </table>
                <br>
                        
                <div class="alert alert-success" role="alert"><strong>Perhatian!</strong> Segera ubah password!</div> 
	        </div>
	    </div>
    </div>
</section>    
@endsection

  
  
@section('extra-script')
	
@endsection
