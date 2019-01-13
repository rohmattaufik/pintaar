@extends('template')

@section('title')
  <title>Pintaar - {{ $course->nama_course }}</title>
@endsection

@section('content')
    <section class="section-padding">
        
			 
		<div class="container" >
            
			
			<div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4><strong>Pemberitahuan!</strong> Saat ini, semua kelas masih <strong>GRATIS SAMPAI BEBERAPA HARI KEDEPAN SAJA!</strong>. Ayo segera daftar dan belajar di Pintaar!</h4>
             </div>

			<div class="row">
                <div class="col-xs-12 col-md-7">
                    
                        <h1>{{ $course->nama_course }}</h1>
                        <p class="starability-result" data-rating="0"></p>
                        <h4>{{$course->deskripsi }}</h4>
                        
                        <p>Dibuat oleh <a href="{{ route('tutor.show', $course->id_tutor) }}">  {{ $course -> nama }} </a><p>
                        @if(empty($status_pembayaran) || $status_pembayaran->status_pembayaran != 3 )
                          <h2>Rp. {{ number_format($course->harga, 0, ',', '.') }}</h2>
                          <a href="{{ route('buy-course', $course->id) }}" class="btn btn-primary btn-lg">Beli Kelas Ini</a>
                        @endif
                    
                </div>
                <div class="col-xs-12 col-md-5">
                    <div class="embed-responsive embed-responsive-16by9">
                        <img class="embed-responsive-item"  src= "{{ URL::asset('video/video_course/'.$course->video ) }}"></img>
                    </div>
                </div>      
                
            </div>
            <hr>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="panel-group" id="accordion">
                      <h2>Silabus</h2>

						          @foreach($list_topik as $topik)
                            <div class="panel">
                                @if(empty($topik -> is_already_watch))
                                  <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="'#collapse{{($topik['id'])}}">
                                      <a> {{ $topik -> judul_topik }}</a>
                                  </h4>

                                  <div id="collapse{{($topik['id'])}}" class="panel-collapse collapse">
                                    @if (count($topik['childs']) > 0)
                                        @foreach ($topik['childs'] as $subtopik)
                                            <div class="panel">
                                                <h4 class="panel-title" data-toggle="collapse" data-parent="#collapse{{($topik->id)}}" href="'#collapse{{($subtopik['id'])}}">
                                                    <a> {{$subtopik->judul_topik}}</a>
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
                                      <a> {{ $topik -> judul_topik }}
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


            

            @if(!empty($status_pembayaran) && $status_pembayaran->status_pembayaran == 3 && empty($status_pernah_review))
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7"> 
                    <h2>Bagaimana pendapat kamu tentang kelas ini?</h2>
                          <form class="form" method="post" action="" role="form">

                            <fieldset class="starability-basic">
                              <h4>Rating</h4>
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
                            <h4>Review</h4>
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="form-group">
                                <textarea required name="body_review" class="form-control" rows="5" id="comment" style="background-color:#FAF9F9;" ></textarea>
                             </div>
                             
                             <div class="form-group">
                                <button type="submit" name="review" class="btn btn-primary btn-lg">Simpan</button>
                             </div>
                             
                          </form>
                       
                     </div>
                   </div>
              @endif
               




               <div class = "row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                       <h2>Reviews</h2>
                       
                        @foreach($list_review as $review)
                          <p>	{{$review -> review }}
                          <p><strong>- Oleh {{ $review -> nama }}, Pada tanggal {{ $review -> created_at }}</strong></p>
                          </p>
                          <hr>
                        @endforeach
                  </div>
               </div>





             
        </div>
    </section>

@endsection
