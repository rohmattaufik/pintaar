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
                    <h2>Ayo Bergabung dan Berkembang Bersama Ribuan Orang Pintar!</h2>
					<hr>
                    <p>Pintaar merupakan sebuah platform kelas online yang ingin membantu masyarakat Indonesia memperoleh Ilmu dengan mudah.</p>
                    <a href="#blog-page" class="button white">Gabung ke Kelas Sekarang</a>
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

     <section class="section-padding" id="feature-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Mengapa Belajar di Pintaar?</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="box">
                        <div class="box-icon">
                            <img src="images/portfolio-icon-6.png" alt="">
                        </div>
                        <h3>100% Kelas Online</h3>
                        <p>Kamu bisa belajar kapanpun dan dimanapun. Kamu akan belajar melalui video, ditambah dengan file pendukung lainnya.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="box">
                        <div class="box-icon">
                            <img src="images/portfolio-icon-1.png" alt="">
                        </div>
                        <h3>Akses Kelas Selamanya</h3>
                        <p>Sekali kamu membeli kelas, kamu akan bergabung ke kelas dan dapat akses materi selamanya.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="box">
                        <div class="box-icon">
                            <img src="images/rsz_teacher-icon.png" alt="">
                        </div>
                        <h3>Dibimbing Pengajar Berpengalaman</h3>
                        <p>Kamu akan mendapatkan materi yang diterapkan di praktik aslinya. Kamu juga akan dibantu saat kesulitan.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="box">
                        <div class="box-icon">
                            <img src="images/service-icon-1.png" alt="">
                        </div>
                        <h3>Diskusi dan Kolaborasi</h3>
                        <p>Kamu akan belajar dan berbagi ilmu bersama teman yang memiliki minat dan tujuan yang sama.</p>
                    </div>
                </div>
              
               
               
            </div>
            <hr/>
        </div>
    </section>

    <section class="section-padding" id="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="page-title">
                        <h2>Kelas Pemrograman</h2>
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
                                  <h4 class="text-right"><strike>Rp 300.000</strike> Rp {{ number_format($list_course_code->harga, 0, ',', '.') }}</h4>
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
                                  <h4 class="text-right"><strike>Rp 300.000</strike> Rp {{ number_format($list_courses_others->harga, 0, ',', '.') }}</h4>
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
                                <img src="{{ URL::asset('images/odie.jpg') }}" alt="" width="100" height="200">
                            </div>
                            <h4>Yudhistira Oktaviandie, S.Si.</h4>
                            <p>Mahasiswa Berprestasi UI 2017 dan Juara 2 Mahasiswa Berprestasi Nasional</p>
                            <p>--</p>
                            <p>"Belajar menjadi lebih mudah dan fleksibel. Cocok untuk mereka yang ingin belajar hal baru, namun memiliki keterbatasan waktu."</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="{{ URL::asset('images/bagus.jpg') }}" alt="" width="100" height="200">
                            </div>
                            <h4>Bagus Aris Saputra, ST </h4>
                            <p>Mahasiswa National Taiwan University of Science and Technology</p>
                            <p>--</p>
                            <p>"Sarana yang tepat untuk orang yang haus ilmu"</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="{{ URL::asset('images/said.jpg') }}" alt="" width="100" height="200">
                            </div>
                            <h4>Said Iskandar, SIA</h4>
							              <p>Mahasiswa FISIP UI</p>
                            <p>--</p>
                            <p>"Bodoh itu absolut, pintar itu pilihan. Makanya, ayo belajar"</p>
						             </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
