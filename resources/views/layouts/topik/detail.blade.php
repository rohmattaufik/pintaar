@extends('template')

@section('title')
<title>Pintaar - {{$topik -> judul_topik}} </title>
@endsection

@section('content')
<section class="section-padding">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <h2>{{ $topik->judul_topik }}</h2>  
      </div>
    </div>

    <!-- Video Penjelasan -->
    @if (!empty($topik->video))
      <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
          <div class="embed-responsive embed-responsive-16by9">
            {!! html_entity_decode($topik->video) !!}

            <!-- <iframe class="embed-responsive-item" src= "{{ URL::asset('video/video_topik/'.$topik->video ) }}" ?> allowfullscreen></iframe> -->
          </div>
        </div>
      </div>
      <br>
    @endif

    <!-- Deskripsi Topik -->
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        {!! html_entity_decode($topik->penjelasan) !!}
      </div>
    </div>

    <!-- FILE ATTACHMENTS -->
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        @if (count($file_topik) > 0)
            <h3>Lampiran</h3>
            <ul>
              @foreach ($file_topik as $file)
                <li><a href="{{URL::asset('attachments/'.$file->url)}}" target="_blank">{{$file->file_name}}</a></li>
              @endforeach
            </ul>
        @endif
      </div>
    </div>

    <!-- PERTANYAAN -->
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        <br/>
        @foreach ($questions as $key => $question)
          <div class="panel panel-primary">
            <div class="panel-heading"><strong>Kuis {{ ++$key }}</strong></div>
            <div class="panel-body">           
                <p>{{ $question->pertanyaan }}</p>

                @if (!empty($question->gambar))
                  <img class="profile-user-img img-responsive img-circle" src="{{ URL::asset('images/gambar_pertanyaan/'.$question->gambar) }}">
                @endif
              
                <div class="demo-radio-button">
                  <div>
                    <input name="opsi-{{$question->id}}" type="radio" data-id="{{ $question->jawaban }}" id="radio_1" value=1 />
                    <label for="radio_1">{{ $question->opsi_1 }}</label>
                  </div>
                  <div>
                    <input name="opsi-{{$question->id}}" type="radio" data-id="{{ $question->jawaban }}" id="radio_2" value=2 />
                    <label for="radio_2">{{ $question->opsi_2 }}</label>
                  </div>
                  <div>
                     <input name="opsi-{{$question->id}}" type="radio" data-id="{{ $question->jawaban }}" id="radio_3" value=3 />
                     <label for="radio_3">{{ $question->opsi_3 }}</label>
                  </div>
                  <div>
                     <input name="opsi-{{$question->id}}" type="radio" data-id="{{ $question->jawaban }}" id="radio_4" value=4 />
                     <label for="radio_4">{{ $question->opsi_4 }}</label>
                  </div>
                </div>
              
                
                <button onclick="check_jawaban({{$question->id}})" type="button" data-id="1"  class="btn btn-primary">Jawab</button>
                          
                <div class="row">
                   <div class="col-md-8 col-md-offset-2 text-center">
                    <i id="salah-{{$question->id}}" class="far fa-times-circle" style="display:none; font-size:60px; color:red;"></i>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-8 col-md-offset-2 text-center">
                      <p id="jawaban_salah-{{$question->id}}" style="display:none;">Jawaban kamu kurang tepat</p>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-8 col-md-offset-2 text-center">
                      <i id="benar-{{$question->id}}" class="far fa-check-circle" style="display:none; font-size:60px; color:green;"></i>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-8 col-md-offset-2 text-center">
                      <p id="jawaban_benar-{{$question->id}}" style=" display:none;">Jawaban kamu benar</p>
                   </div>
                </div>
              </div>    
            </div>
          @endforeach

      </div>
    </div>

    <!-- NAVIGASI TOPIK -->
    <div class="row">
      <br/>
      <div class="col-xs-12 col-md-8 col-md-offset-2">
        @if (empty($topik_after-> id) && empty($topik_before-> id))
        
        @elseif (empty($topik_before->id))
          <div class="row">
            <div class="col-xs-6 col-md-6">
            </div>
            <div class="col-xs-6 col-md-6 text-right">
              <span class="pull-right">
               <a href ="{{route(('topik'), $topik_after -> id)}}">
                   <i class="fas fa-angle-double-right" style="font-size:50px; color:#138fc2;" ></i>
                   <p>Selanjutnya</p>
               </a>
              </span>
            </div>     
          </div>
        @elseif (empty($topik_after->id))
          <div class="row">
            <div class=" col-xs-6 col-md-6">
               <a href ="{{route(('topik'), $topik_before->id)}}">
                   <i class="fas fa-angle-double-left" style="font-size:50px; color:#138fc2;"></i>
                   <p>Sebelumnya</p>
               </a>
            </div>

            <div class="col-xs-6 col-md-6 text-right">
              <span class="pull-right">
               <a href ="{{route(('subscribe-course'), $topik -> id)}}">
                   <i class="fas fa-angle-double-right" style="font-size:50px; color:#138fc2;" ></i>
                   <p>Selanjutnya</p>
               </a>
               </span>
            </div>
        @else
          <div class="row">
            <div class="col-xs-6 col-md-6">
               <a href ="{{route(('topik'), $topik_before->id)}}">
                   <i class="fas fa-angle-double-left" style="font-size:50px; color:#138fc2;" ></i>
                   <p>Sebelumnya</p>
               </a>
            </div>

            <div class="col-xs-6 col-md-6 text-right">
              <span class="pull-right">
               <a href ="{{route(('topik'), $topik_after -> id)}}">
                   <i class="fas fa-angle-double-right" style="font-size:50px; color:#138fc2;" ></i>
                   <p>Selanjutnya</p>
               </a>
               <span>
            </div>
          </div>
        @endif

      </div>
    </div>

    <!-- KOMENTAR -->
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2">
         <meta name="csrf-token" content="{{ csrf_token() }}">

            <h2 id="commentTitle">Komentar</h2>
            <!-- FORM ISI KOMENTAR -->       
            <form class="form" method="post" action="" role="form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="form-group">
                 <textarea required name="body_comment" class="form-control" rows="5" id="comment" style="background-color:#FAF9F9;" ></textarea>
              </div>
              <div class="form-group">
                 <button type="submit" name="comment" class="btn btn-primary">Beri Komentar</button>
              </div>
            </form>
                      
            @foreach($comments_and_user as $comment_and_user)
              <!-- KOMENTAR LEVEL 1 -->
              <hr/>
              <div id="comment{{ $comment_and_user->id }}" class="row">

                <div class="col-xs-2 col-md-1">
                  <img class="profile-user-img img-responsive img-circle" src="{{ $comment_and_user->user->foto ? URL::asset($user->foto) : URL::asset('images/user4-128x128.jpg')}}" alt="User profile picture">
                </div>
                <div class="col-xs-8 col-md-9">
                  <p><strong>{{ $comment_and_user->user->nama }}</strong></p>
                  <p>{{ $comment_and_user->komentar }}</p> 
                  <div id="tombol_balas_{{($loop->index)}}" onclick="reply_comment({{($loop->index)}})"><a role="button" style="color:#138fc2;">Balas</a></div>
                </div>
                <div class="col-xs-2 col-md-2 text-right">
                  <p>{{ $comment_and_user->created_at->format('d-m-Y') }}</p>
                </div>
              </div>
              
              
              <!-- BALAS KOMENTAR LEVEL 1 -->
              <div class="row">
                <div class="col-sm-11 col-sm-offset-1">
                  <form id="reply_comment_{{($loop->index)}}" class="form" method="post" action="" role="form" style="display:none">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                       <textarea required name="body_comment_reply" class="form-control" rows="5" id="comment" style="background-color:#FAF9F9;"></textarea>
                    </div>
                    <div class="form-group">
                      <input type="hidden" name="id_komentar_topik" value="{{ ($comment_and_user->id) }}">
                      <button type="submit" name="comment_reply" class="btn btn-primary">Balas</button>
                    </div>
                  </form>
                </div>
              </div>
              
              <!-- KOMENTAR LEVEL 2 -->
             
              @foreach($comment_and_user->reply_komentar_topik as $reply_komentar_topik)
                <div class="row">
                  <div class="col-xs-11 col-xs-offset-1 col-md-11 col-md-offset-1">
                    <hr/>
                    <div class="row">
                      <div class="col-xs-2 col-md-1">
                        <img class="profile-user-img img-responsive img-circle" src="{{ $reply_komentar_topik->user->foto ? URL::asset($user->foto) : URL::asset('images/user4-128x128.jpg')}}" alt="User profile picture">
                      </div>
                      <div class="col-xs-8 col-md-9">
                        <p><strong>{{ $reply_komentar_topik->user->nama }}</strong></p>
                        <p>{{ $reply_komentar_topik->komentar }}</p>
                      </div>
                      <div class="col-xs-2 col-md-2 text-right">
                        <p>{{ $reply_komentar_topik->created_at->format('d-m-Y') }}</p>
                      </div>
                    </div>
                    
                  </div>
                </div>
              @endforeach
                             
              
          @endforeach
      </div>
    </div>
        
  </div>
</section>

<script>
    function check_jawaban(id) {
  
      var field = document.querySelector('input[name="opsi-'+id+'"]:checked');
      var jawaban_user = field.value;
      var jawaban_benar = $(field).data('id');

      if(jawaban_benar == jawaban_user ) {
        document.getElementById("salah-"+id).style.display = "none";
        document.getElementById("benar-"+id).style.display = "inline";
        document.getElementById("jawaban_salah-"+id).style.display = "none";
        document.getElementById("jawaban_benar-"+id).style.display = "inline";
      }
      else{
        document.getElementById("benar-"+id).style.display = "none";
        document.getElementById("salah-"+id).style.display = "inline";
        document.getElementById("jawaban_benar-"+id).style.display = "none";
        document.getElementById("jawaban_salah-"+id).style.display = "inline";
      }
    }
    function reply_comment (id) {
      var form_id_comment = "reply_comment_"+id;
      var button_reply_id = "tombol_balas_"+id;
      document.getElementById(form_id_comment).style.display = "inline";
      document.getElementById(button_reply_id).style.display = "none";  
    }
  </script>
@endsection
