@extends('template')

@section('title')
  <title>Kelas</title>
@endsection

@section('content')
    <section class="section-padding">
        <div class="container" style="word-wrap: break-word;">
          <h1>Kamu bisa belajar saat ini juga!  Berikut kelas yang dibuka: </h1>
          <br>

          @foreach($list_courses_with_users as $list_course_with_user)
               @if (($loop->index) % 4  == 0)
                 <div class="row">
                   <div class="col-xs-12 col-md-3">
                      <a href="{{route(('course'), $list_course_with_user -> id)}}">
                         <div class="thumbnail">
                             <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="">
                             <div class="caption">
                                 <h3>{{$list_course_with_user->nama_course}}</h3>
                                 <p><span class="ti-user"></span> {{$list_course_with_user->nama}}</p>

                                <br>
                                <fieldset class="starability-basic">
                                @if(empty($list_course_with_user->rating))
                                <label for="rate" title="Terrible"></label>
                                @else
                                   @for ($i = 0; $i < $list_course_with_user->rating; $i++)
                                         <label for="rate" title="Terrible"></label>
                                   @endfor
                                @endif
                                </fieldset>
                                 

                                 <p>{{$list_course_with_user -> deskripsi}}</p>
                                 <h4 class="text-right">Rp{{$list_course_with_user -> harga}}</h4>
                             </div>
                         </div>
                       </a>
                   </div>
               @elseif (($loop->index) % 4  == 3)
                    <div class="col-xs-12 col-md-3">
                        <a href="{{route(('course'), $list_course_with_user -> id)}}">
                          <div class="thumbnail">
                            <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="">
                             <div class="caption">
                                  <h3><a href="{{route(('course'), $list_course_with_user -> id)}}"> {{$list_course_with_user-> nama_course}}</a></h3>
                                  <p><span class="ti-user"></span>    {{$list_course_with_user-> nama}}</p>

                                  <br>
                                  <fieldset class="starability-basic">
                                  @if(empty($list_course_with_user->rating))
                                  <label for="rate" title="Terrible"></label>
                                  @else
                                     @for ($i = 0; $i < $list_course_with_user->rating; $i++)
                                           <label for="rate" title="Terrible"></label>
                                     @endfor
                                  @endif
                                  </fieldset>

                                  <p>{{$list_course_with_user -> deskripsi}}</p>
                                  <h4 class="text-right">Rp{{$list_course_with_user -> harga}}</h4>
                              </div>
                          </div>
                        </a>
                    </div>
               </div>

               @else
                    <div class="col-xs-12 col-md-3">
                        <a href="{{route(('course'), $list_course_with_user -> id)}}">
                          <div class="thumbnail">
                            <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="">
                               <div class="caption">
                                  <h3><a href="{{route(('course'), $list_course_with_user -> id)}}"> {{$list_course_with_user-> nama_course}}</a></h3>
                                  <p><span class="ti-user"></span>    {{$list_course_with_user-> nama}}</p>

                                  <br>
                                  <fieldset class="starability-basic">
                                  @if(empty($list_course_with_user->rating))
                                  <label for="rate" title="Terrible"></label>
                                  @else
                                     @for ($i = 0; $i < $list_course_with_user->rating; $i++)
                                           <label for="rate" title="Terrible"></label>
                                     @endfor
                                  @endif
                                  </fieldset>

                                  <p>{{$list_course_with_user -> deskripsi}}</p>
                                  <h4 class="text-right">Rp{{$list_course_with_user -> harga}}</h4>
                              </div>
                          </div>
                        </a>
                    </div>

               @endif

              @endforeach


        </div>
    </section>

@endsection
