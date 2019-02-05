@extends('template')

@section('title')
  <title>Pintaar - Kelas</title>
@endsection

@section('content')
    <section class="section-padding">
        <div class="container" style="word-wrap: break-word;">
          <h1>Belajar dapat lebih menyenangkan disini!</h1>
          <br>

          @foreach($list_courses_with_users as $list_course_with_user)
               @if (($loop->index) % 4  == 0)
                  <div class="row display-flex">
                    <div class="col-xs-12 col-md-3">
                      <a href="{{route(('course'), $list_course_with_user->id)}}">
                         <div class="thumbnail">
                             <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="Gambar Kelas" height="120" width="500">
                             <div class="caption">
                                <h4>{{$list_course_with_user->nama_course}}</h4>
                                <p><span class="ti-user"></span> {{$list_course_with_user->nama}}</p>
                                <p class="starability-result" data-rating="{{ round($list_course_with_user->rating) }}"></p>
                                @if($list_course_with_user->harga == 0)
                                  <h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
                                @else
                                  <h4 class="text-right">Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}</h4>
                                @endif
                             </div>
                         </div>
                       </a>
                    </div>
                  
               @elseif (($loop->index) % 4  == 3)
                    <div class="col-xs-12 col-md-3">
                      <a href="{{route(('course'), $list_course_with_user->id)}}">
                         <div class="thumbnail">
                             <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="Gambar Kelas" height="120" width="500">
                             <div class="caption">
                                <h4>{{$list_course_with_user->nama_course}}</h4>
                                <p><span class="ti-user"></span> {{$list_course_with_user->nama}}</p>
                                <p class="starability-result" data-rating="{{ round($list_course_with_user->rating) }}"></p>
                                @if($list_course_with_user->harga == 0)
                                  <h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
                                @else
                                  <h4 class="text-right">Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}</h4>
                                @endif
          
                             </div>
                         </div>
                       </a>
                    </div>
                  </div>

               @else
                   <div class="col-xs-12 col-md-3">
                      <a href="{{route(('course'), $list_course_with_user->id)}}">
                         <div class="thumbnail">
                             <img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="Gambar Kelas" height="120" width="500">
                             <div class="caption">
                                <h4>{{$list_course_with_user->nama_course}}</h4>
                                <p><span class="ti-user"></span> {{$list_course_with_user->nama}}</p>
                                <p class="starability-result" data-rating="{{ round($list_course_with_user->rating) }}"></p>
                                
                                @if($list_course_with_user->harga == 0)
                                  <h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
                                @else
                                  <h4 class="text-right">Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}</h4>
                                @endif
                             </div>
                         </div>
                       </a>
                   </div>

               @endif

              @endforeach


        </div>
    </section>

@endsection
