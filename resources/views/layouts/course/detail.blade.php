@extends('template')

@section('title')
  <title>Kelas {{ $course->nama_course }}</title>
@endsection

@section('content')



    <section class="section-padding">
        <div class="container" >
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                    <div class="page-title">
                        <h2>Selamat datang di kelas {{ $course->nama_course }}</h2>
                        
                        <div class="embed-responsive embed-responsive-16by9">
                          <video class="embed-responsive-item"  src= "{{ URL::asset('video/video_course/'.$course->video ) }}" controls allowfullscreen></video>
                        </div>
                        <br>
                        <br>
                        <p>{{$course->deskripsi }}</p>
                        <p> Oleh: <strong> <a href="{{ route('tutor.show', $course->id_tutor) }}">  {{$course-> nama}} </a></strong><p>
                          @if(empty($status_pembayaran) || $status_pembayaran->status_pembayaran != 3 )
                            <br>
                            <a href="{{ route('buy-course', $course->id) }}" class="btn btn-primary btn-lg btn-block">Ayo beli kelas ini sekarang! Hanya :Rp. {{$course-> harga}} (untuk 1 bulan)</a>
                          @else
                            <p>Kelas boleh dibuka dari : <strong> {{$status_pembayaran-> waktu_disetujui}} </strong> sampai  <strong> {{$status_pembayaran-> waktu_valid_pembelian}} </strong> </p>
                          @endif
                    </div>

                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
                    <div class="panel-group" id="accordion">
                      <h3>Disini, kamu akan belajar: </h3>

						@foreach($list_topik as $topik)
                            <div class="panel">
                                @if(empty($topik -> is_already_watch))
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="'#collapse{{($topik['id'])}}">
                                    <a> {{$topik -> judul_topik}} @if(($loop->index)  == 0)  (Gratis) @endif</a>
                                </h4>
                                <div id="collapse{{($topik['id'])}}" class="panel-collapse collapse">
                    @if (count($topik['childs']) > 0)
                        @foreach ($topik['childs'] as $subtopik)
                                  <div class="panel">
                                      <h4 class="panel-title" data-toggle="collapse" data-parent="#collapse{{($topik->id)}}" href="'#collapse{{($subtopik['id'])}}">
                                          <a> {{$subtopik->judul_topik}} @if(($loop->index)  == 0)  (Gratis) @endif</a>
                                      </h4>
    
                                      <div id="collapse{{($subtopik['id'])}}" class="panel-collapse collapse">
                                          <p>{{$subtopik->penjelasan }}</p>
                                          <a href = "{{route(('topik'), $subtopik->id)}}" > Detail > </a>
                                      </div>
                                  </div>
                        @endforeach
                    @endif
                                </div>
                                @else
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="'#collapse{{($loop->index)}}">
                                    <a> {{$topik -> judul_topik}} @if(($loop->index)  == 0) (Gratis) @endif
                                      <i class="fas fa-check" style=" margin-left:10px;font-size:30px;color:green;"></i>
                                    </a>
                                </h4>

                                <div id="collapse{{($loop->index)}}" class="panel-collapse collapse">
                                    <p>{{$topik -> penjelasan }}</p>

                                      <a href = "{{route(('topik'), $topik->id)}}" > Detail > </a>
                                </div>
                                @endif
                            </div>
          @endforeach

                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-sm-10 col-sm-offset-1 ">

            @if(!empty($status_pembayaran) && $status_pembayaran->status_pembayaran == 3 && empty($status_pernah_review))

            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="row">

                  <div class="card">
                     <div class="header">
                       <br><br>
                        <h2>
                           Review
                        </h2>
                        <br><br>
                        <form class="form" method="post" action="" role="form">

                          <fieldset class="starability-basic">
                            <legend>Beri Rating:</legend>

                            <input type="radio" id="rate1" name="rating" value="1" />
                            <label for="rate1" title="Terrible">1 star</label>

                            <input type="radio" id="rate2" name="rating" value="2" />
                            <label for="rate2" title="Not good">2 stars</label>

                            <input type="radio" id="rate3" name="rating" value="3" />
                            <label for="rate3" title="Average">3 stars</label>

                            <input type="radio" id="rate4" name="rating" value="4" />
                            <label for="rate4" title="Very good">4 stars</label>

                            <input type="radio" id="rate5" name="rating" value="5" />
                            <label for="rate5" title="Amazing">5 stars</label>



                          </fieldset>

                          <br><br>

                           <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           <div class="form-group">
                              <textarea required name="body_review" class="form-control" rows="5" id="comment" style="background-color:#FAF9F9;" ></textarea>
                           </div>
                           <br>
                           <div>
                              <button   type="submit" name="review" class="btn btn-primary btn-lg " style="display: block; margin-right: auto; margin-left: auto;">Beri Komentar</button>
                           </div>
                           <br>
                           <br>
                        </form>
                     </div>
                   </div>
                 </div>
              @endif
               <div class = "row">
                <hr style="height:1px;border:none;color:#333;background-color:#333;" />
                     <fieldset class="starability-basic">
                      <br>
                      <h4>Rating: </h4>

                     @if(empty($rating->rating))
                        <label for="rate" title="Terrible"></label>
                     @else

                        @for ($i = 0; $i < $rating->rating; $i++)
                              <label for="rate" title="Terrible"></label>
                        @endfor
                     @endif
                     </fieldset>
                     <br><br><br>
                     <div class="body" style= "word-wrap: break-word;">
                       <h4>Review: </h4>
                       <br>
                        @foreach($list_review as $review)
                        <p>	{{$review -> review }}
                        <p><strong>- Oleh {{ $review -> nama }}, Pada tanggal {{ $review -> created_at }}</strong></p>
                        </p>
                        <hr>
                        @endforeach
                     </div>
                     <br><br><br>
               </div>
             </div>
        </div>
    </section>

@endsection
