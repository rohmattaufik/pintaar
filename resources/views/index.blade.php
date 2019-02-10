@extends('template')

@section('title')
    <title>Pintaar - Home</title>
@endsection

@section('content')
    <header class="header-area overlay full-height relative v-center" id="home-page">
        <div class="absolute anlge-bg"></div>
        <div class="container">
            <div class="row v-center">
                <div class="col-xs-12 col-md-7 header-text">
                    <h2>Ketika kamu berhenti belajar, saat itu kamu akan mati.</h2> 
					<p>-Albert Einstein</p>
					<hr>
                    <p>Pintaar merupakan sebuah platform kelas online yang ingin membantu masyarakat Indonesia memperoleh Ilmu dengan mudah. Saat ini, Pintaar masih menyediakan 2 katogori kelas, yaitu kelas pemrograman dan memasak.</p>
                    <a href="#blog-page" class="button white">Ayo Belajar Sekarang</a>
                </div>
                <div class="hidden-xs hidden-sm col-md-5 text-right">
                <!--<div class="screen-box screen-slider">
                        <div class="item">
                            <img src="{{ URL::asset('images/screen-2.jpg') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ URL::asset('images/screen-3.jpg') }}" alt="">
                        </div>
                    </div>
                -->
                </div>
            </div>
        </div>
    </header>

    <section class="section-padding" id="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4><strong>Pemberitahuan!</strong> Saat ini, hampir semua kelas masih <strong>GRATIS SAMPAI BEBERAPA HARI KEDEPAN SAJA!</strong> Ayo segera daftar dan belajar di Pintaar!</h4>
                    </div>
                    <div class="page-title">
                        <h2>Kelas Pemrograman Website</h2>
                    </div>
                </div>
            </div>
            <div class="row display-flex">
                @foreach($list_courses_code as $list_course_code)
            
                  
                    <div class="col-xs-12 col-md-3">
                      <a href="{{route(('course'), $list_course_code->id)}}">
                         <div class="thumbnail">
                             <img src="{{ URL::asset('images/gambar_course/'.$list_course_code->foto ) }}" alt="Gambar Kelas" height="120" width="500">
                             <div class="caption">
                                <h4>{{$list_course_code->nama_course}}</h4>
                                <p><span class="ti-user"></span> {{$list_course_code->nama}}</p>
                                <p class="starability-result" data-rating="{{ round($list_course_code->rating) }}"></p>
                                @if($list_course_code->harga == 0)
                                  <h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
                                @else
                                  <h4 class="text-right">Rp {{ number_format($list_course_code->harga, 0, ',', '.') }}</h4>
                                @endif
                                
                             </div>
                         </div>
                       </a>
                    </div>
             
              @endforeach
            </div>
        </div>
    </section>
	
	
          

  <section class="section-padding" id="blog-page-2">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Kelas Lainnya</h2>
                    </div>
                </div>
            </div>
               
            <div class="row display-flex">
                @foreach($list_courses_others as $list_courses_others)
            
                  
                    <div class="col-xs-12 col-md-3">
                      <a href="{{route(('course'), $list_courses_others->id)}}">
                         <div class="thumbnail">
                             <img src="{{ URL::asset('images/gambar_course/'.$list_courses_others->foto ) }}" alt="Gambar Kelas" height="120" width="500">
                             <div class="caption">
                                <h4>{{$list_courses_others->nama_course}}</h4>
                                <p><span class="ti-user"></span> {{$list_courses_others->nama}}</p>
                                <p class="starability-result" data-rating="{{ round($list_courses_others->rating) }}"></p>
                                @if($list_courses_others->harga == 0)
                                  <h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
                                @else
                                  <h4 class="text-right">Rp {{ number_format($list_courses_others->harga, 0, ',', '.') }}</h4>
                                @endif
                                
                             </div>
                         </div>
                       </a>
                    </div>
             
              @endforeach
            
            </div>
        </div>
    </section>

   
    <section class="testimonial-area section-padding gray-bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Testimoni</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <div class="testimonials">
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="{{ URL::asset('images/afiq.jpg') }}" alt="" width="100" height="200">
                            </div>
                            <h4>Afiq Rasyid Muhammad</h4>
                            <p>Software Engineer dan Alumni Fakultas Ilmu Komputer Universitas Indonesia</p>
                            <p>--</p>
                            <p>Platform ini sangat bagus dan mudah. Luar biasa Pintaar adalah solusi untuk pendidikan di Indonesia</p>
														
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="{{ URL::asset('images/luqman.jpg') }}" alt="" width="100" height="200">
                            </div>
                            <h4>Luqman Hakim</h4>
							<p>Founder Startup dan Alumni Fakultas Ilmu Komputer Universitas Indonesia</p>
                            <p>--</p>
                            <p>Ini merupakan solusi belajar terbaru. Dengan ada Pintaar, pendidikan bagus bisa diakses seluruh masyarakat Indonesia dengan mudah</p>
							
						</div>
                                 
                    </div>
                </div>
            </div>
        </div>
    </section>



    
@endsection
