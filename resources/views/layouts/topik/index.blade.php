@extends('template')

@section('title')
  <title>Kelas  </title>
@endsection

@section('content')


    <section class="section-padding gray-bg" id="blog-page">
        <div class="container"  style=" word-wrap: break-word;" >
          <h1>Kamu bisa belajar saat ini juga!  Berikut kelas yang dibuka: </h1>
          <br>
              @foreach($list_courses_with_users as $list_course_with_user)

               @if (($loop->index) % 3  == 0 )
               <div class="row">

               <div class="col-xs-12 col-sm-4">
                   <div class="single-blog">
                       <div class="blog-photo">
                           <img src="{{ URL::asset('images/small1.jpg') }}" alt="">
                       </div>
                       <div class="blog-content">
                           <h3><a href="{{route(('course'), $list_course_with_user -> id)}}"> {{$list_course_with_user-> nama_course}}</a></h3>

                           <ul class="blog-meta">
                               <li><span class="ti-user"></span> <a href="#">Oleh: <strong> LOL   {{$list_course_with_user-> nama}} </strong></a></li>
                               <li><span class="ti-money"></span> Rp. {{$list_course_with_user -> harga}}</a></li>
                           </ul>
                           <p>{{$list_course_with_user -> deskripsi}}</p>
                       </div>

                   </div>

               </div>

               @elseif (($loop->index) % 3  != 2 )


                              <div class="col-xs-12 col-sm-4">
                                  <div class="single-blog">
                                      <div class="blog-photo">
                                          <img src="{{ URL::asset('images/small1.jpg') }}" alt="">
                                      </div>
                                      <div class="blog-content">
                                          <h3><a href="{{route(('course'), $list_course_with_user -> id)}}"> {{$list_course_with_user-> nama_course}}</a></h3>

                                          <ul class="blog-meta">
                                              <li><span class="ti-user"></span> <a href="#">Oleh: <strong> LOL   {{$list_course_with_user-> nama}} </strong></a></li>
                                              <li><span class="ti-money"></span> Rp. {{$list_course_with_user -> harga}}</a></li>
                                          </ul>
                                          <p>{{$list_course_with_user -> deskripsi}}</p>
                                      </div>

                                  </div>

                              </div>
               @else


                              <div class="col-xs-12 col-sm-4">
                                  <div class="single-blog">
                                      <div class="blog-photo">
                                          <img src="{{ URL::asset('images/small1.jpg') }}" alt="">
                                      </div>
                                      <div class="blog-content">
                                          <h3><a href="{{route(('course'), $list_course_with_user -> id)}}"> {{$list_course_with_user-> nama_course}}</a></h3>

                                          <ul class="blog-meta">
                                              <li><span class="ti-user"></span> <a href="#">Oleh: <strong> LOL   {{$list_course_with_user-> nama}} </strong></a></li>
                                              <li><span class="ti-money"></span> Rp. {{$list_course_with_user -> harga}}</a></li>
                                          </ul>
                                          <p>{{$list_course_with_user -> deskripsi}}</p>
                                      </div>

                                  </div>

                              </div>
               </div>
               <br>
               @endif




              @endforeach


        </div>
    </section>




@endsection
