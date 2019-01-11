@extends('template')

@section('title')
  <title>Pintaar - Kelas Saya</title>
@endsection

@section('content')
    <section class="section-padding">
        <div class="container">
          
          @if (count($list_courses_that_has_bought) == 0)
            <div class="row">
              <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                <div><i class="fas fa-book-open fa-5x"></i></div>
                <h3>Kamu belum membeli kelas!</h3>
                <a href="{{ route('courses') }}" class="btn btn-lg btn-primary">Beli Kelas Disini</a>
              </div>
            </div>
          @else
            @foreach($list_courses_that_has_bought as $list_course_with_user_that_has_bought)
                 @if (($loop->index) % 4  == 0)
                   <div class="row">
                     <div class="col-xs-12 col-md-3">                     
                           <div class="thumbnail">
                               <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user_that_has_bought->foto ) }}" alt="">
                               <div class="caption">
                                  <h3>{{$list_course_with_user_that_has_bought->nama_course}}</h3>
                                  <p><span class="ti-user"></span> {{ $list_course_with_user_that_has_bought->nama }}</p>

                                  @if(empty($list_course_with_user_that_has_bought->rating))
                                    <p class="starability-result" data-rating="0"></p>
                                  @else
                                    <p class="starability-result" data-rating="{{ round($list_course_with_user_that_has_bought->rating) }}"></p>
                                  @endif 
                                  <br>
                                  <a href="{{ route(('course'), $list_course_with_user_that_has_bought->id) }}" class="btn btn-block btn-primary">Belajar di kelas ini</a>
                               </div>
                           </div>                      
                     </div>
                 @elseif (($loop->index) % 4  == 3)
                      <div class="col-xs-12 col-md-3">
                            <div class="thumbnail">
                               <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user_that_has_bought->foto ) }}" alt="">
                               <div class="caption">
                                  <h3>{{$list_course_with_user_that_has_bought->nama_course}}</h3>
                                  <p><span class="ti-user"></span> {{ $list_course_with_user_that_has_bought->nama }}</p>

                                  @if(empty($list_course_with_user_that_has_bought->rating))
                                    <p class="starability-result" data-rating="0"></p>
                                  @else
                                    <p class="starability-result" data-rating="{{ round($list_course_with_user_that_has_bought->rating) }}"></p>
                                  @endif 
                                  <br>
                                  <a href="{{ route(('course'), $list_course_with_user_that_has_bought->id) }}" class="btn btn-block btn-primary">Belajar di kelas ini</a>
                               </div>
                            </div>   
                      </div>
                 </div>

                 @else
                      <div class="col-xs-12 col-md-3">
                            <div class="thumbnail">
                               <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user_that_has_bought->foto ) }}" alt="">
                               <div class="caption">
                                  <h3>{{$list_course_with_user_that_has_bought->nama_course}}</h3>
                                  <p><span class="ti-user"></span> {{ $list_course_with_user_that_has_bought->nama }}</p>

                                  @if(empty($list_course_with_user_that_has_bought->rating))
                                    <p class="starability-result" data-rating="0"></p>
                                  @else
                                    <p class="starability-result" data-rating="{{ round($list_course_with_user_that_has_bought->rating) }}"></p>
                                  @endif 
                                  <br>
                                  <a href="{{ route(('course'), $list_course_with_user_that_has_bought->id) }}" class="btn btn-block btn-primary">Belajar di kelas ini</a>
                               </div>
                            </div>   
                      </div>
                 @endif

                @endforeach
              @endif

        </div>
    </section>

@endsection
