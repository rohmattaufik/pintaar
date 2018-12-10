@extends('template')

@section('title')
  <title>Kelas Saya</title>
@endsection

@section('content')
    <section class="section-padding">
        <div class="container">
          <h1>Ayo belajar sekarang! Berikut kelas yang telah kamu beli: </h1>
         
          @foreach($list_courses_that_has_bought as $list_course_with_user_that_has_bought)
               @if (($loop->index) % 4  == 0)
                 <div class="row">
                   <div class="col-xs-12 col-md-3">
                      
                         <div class="thumbnail">
                             <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user_that_has_bought->foto ) }}" alt="">
                             <div class="caption">
                                <h3>{{$list_course_with_user_that_has_bought->nama_course}}</h3>
                                <p><span class="ti-user"></span> {{ $list_course_with_user_that_has_bought->nama }}</p>

                                <p>{{$list_course_with_user_that_has_bought -> deskripsi}}</p>
                                <fieldset class="starability-basic">
                                  @if(empty($list_course_with_user_that_has_bought->rating))
                                    <label for="rate" title="Terrible"></label>
                                  @else
                                     @for ($i = 0; $i < $list_course_with_user_that_has_bought->rating; $i++)
                                        <label for="rate" title="Terrible"></label>
                                     @endfor
                                  @endif
                                </fieldset>


                                 
                                 <a href="{{ route(('course'), $list_course_with_user_that_has_bought->id) }}" class="btn btn-block btn-primary">Belajar di kelas ini</a>
                             </div>
                         </div>
                       
                   </div>
               @elseif (($loop->index) % 4  == 3)
                    <div class="col-xs-12 col-md-3">
                        
                          <div class="thumbnail">
                              <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user_that_has_bought->foto ) }}" alt="">
                              <div class="caption">
                                  <h3><a href="{{route(('course'), $list_course_with_user_that_has_bought -> id)}}"> {{$list_course_with_user_that_has_bought->nama_course}}</a></h3>
                                  <p><span class="ti-user"></span> {{ $list_course_with_user_that_has_bought->nama }}</p>
                                  <p>{{$list_course_with_user_that_has_bought -> deskripsi}}</p>

                                  <fieldset class="starability-basic">
                                    @if(empty($list_course_with_user_that_has_bought->rating))
                                      <label for="rate" title="Terrible"></label>
                                    @else
                                       @for ($i = 0; $i < $list_course_with_user_that_has_bought->rating; $i++)
                                             <label for="rate" title="Terrible"></label>
                                       @endfor
                                    @endif
                                  </fieldset>

                                  
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
                                  <h3><a href="{{route(('course'), $list_course_with_user_that_has_bought -> id)}}"> {{$list_course_with_user_that_has_bought-> nama_course}}</a></h3>
                                  <p><span class="ti-user"></span>    {{$list_course_with_user_that_has_bought-> nama}}</p>
                                  <p>{{ $list_course_with_user_that_has_bought->deskripsi }}</p>
                                  <fieldset class="starability-basic">
                                    @if(empty($list_course_with_user_that_has_bought->rating))
                                    <label for="rate" title="Terrible"></label>
                                    @else
                                       @for ($i = 0; $i < $list_course_with_user_that_has_bought->rating; $i++)
                                             <label for="rate" title="Terrible"></label>
                                       @endfor
                                    @endif
                                  </fieldset>

                                  <a href="{{ route(('course'), $list_course_with_user_that_has_bought->id) }}" class="btn btn-block btn-primary">Belajar di kelas ini</a>
                              </div>
                          </div>
                        
                    </div>

               @endif

              @endforeach


        </div>
    </section>

@endsection
