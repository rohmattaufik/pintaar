@extends('template')

@section('title')
<title>Kelas {{$course -> nama_course}} </title>
@endsection

@section('content')
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        
        <h2>Selamat Kamu Telah Menyelesaikan Kelas {{ $course->nama_course }}! </h2>  
        <br> </br>
		<h4>Apakah kamu ingin belajar lebih jauh tentang ilmu ini? </h4> 
		<h4>Tenang jika banyak permintaan terhadap kelas ini, kami akan buka versi lanjutan dari kelas ini segera!</h4>
		<br> </br>
		<h4>Tinggal isi form dibawah ini jika kamu berminat!</h4> 
		<h4>Dan jadilah orang pertama yang akan kami beritahu bila kelasnya telah dibuka!</h4	>
		<br> </br>
		<div class="row">
	           <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
	                 <a href="https://goo.gl/forms/bPsNZz3LtgcjKsuG3" ><button type="submit" class="btn btn-success">Saya tertarik untuk belajar lebih jauh!</button></a>
	           </div>
	     </div>
		 <br> </br>
		 <div class="row">
	           <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
	                <a href="https://goo.gl/forms/r4jmiirHYNOudWrt1" ><button type="submit" class="btn btn-danger">Saya tertarik untuk belajar hal lain!</button></a>
	           </div>
	     </div>
		<br> </br>
	  </div>
    </div>
  </div>

@endsection
