@extends('template')

@section('title')
<title>Kelas {{$course -> nama_course}} </title>
@endsection

@section('content')
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
        <div style="color:#138fc2;"><i class="fas fa-award fa-7x"></i></div>
        <h2>Selamat! Kamu telah menyelesaikan kelas {{ $course->nama_course }}!</h2>  
		
        <br/><br/>
		<h4>Apakah kamu ingin belajar lebih jauh tentang ilmu ini?</h4>
		<a href="https://goo.gl/forms/r4jmiirHYNOudWrt1" class="btn btn-primary">Ya, Saya Tertarik.</a> 
			           
	  </div>
    </div>
  </div>
</section>
@endsection
