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
                    <h2>Ketika kamu berhenti belajar, saat itu kamu akan mati</h2> 
					<p>-Albert Einstein</p>
					<hr>
                    <p>Pintaar merupakan sebuah platform kelas online yang dapat membantu masyarakat Indonesia memperoleh Ilmu dengan mudah. Saat ini, masih tersedia kelas pemrograman dan memasak</p>
                    
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

   
   
    <section class="testimonial-area section-padding gray-bg overlay">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Testimoni Pengguna Pintaar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <div class="testimonials">
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="{{ URL::asset('images/user4-128x128.jpg') }}" alt="">
                            </div>
                            <h3>Afiq Rasyid Muhammad</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                        <div class="testimonial">
                            <div class="testimonial-photo">
                                <img src="{{ URL::asset('images/avatar-small-2.png') }}" alt="">
                            </div>
                            <h3>AR Rahin</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel vero dolore officiis, velit id libero illum harum hic magni, quae repellendus adipisci possimus saepe nostrum doloribus repudiandae asperiores commodi voluptate.</p>
                        </div>
                                 
                    </div>
                </div>
            </div>
        </div>
    </section>



    
@endsection
