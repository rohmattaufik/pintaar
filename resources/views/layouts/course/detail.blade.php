@extends('template')

@section('title')
  <title>Pintaar - {{ $course->nama_course }}</title>
@endsection

@section('extra-style')
  
@endsection

@section('content')
	<script>
	  fbq('track', 'ViewContent');
	</script>

<section class="section-padding">		 
		<div class="container">


	  @if((empty($status_pembayaran) || $status_pembayaran->status_pembayaran != 3))
          <div class="row">
            <div class="col-xs-12 col-md-12 text-center"> 
    			    <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                @if ($course->harga == 0)
                  <h4><strong>Pemberitahuan!</strong> Kelas ini masih <strong>GRATIS SAMPAI BEBERAPA HARI KEDEPAN!</strong> Ayo segera daftar dan belajar di Pintaar!</h4>
                @else
                  <h4>Kelas ini diskon 75% hingga 11 Maret 2019.</h4>
                  <h4 id="timer-diskon"></h4>
                @endif
              </div>
            </div>
          </div>
    @endif

    <div class="row">
        <div class="col-xs-12 col-md-7">
          <h1>{{ $course->nama_course }}</h1>
             
	        <p class="starability-result" data-rating="{{ round($rating->rating) }}"></p>
             
		      <p><strong>Murid yang sudah mengambil: {{ $count_student_learned}}</strong></p>

          <!-- <p><strong>Dibuat oleh {{ $course->creator->users->nama }} </strong><p> -->
			    <br>

        @if(empty($status_pembayaran) || $status_pembayaran->status_pembayaran != 3)
            @if($course->harga == 0)
              <a href="{{ route('buy-course', $course->id) }}" class="btn btn-primary btn-lg">Beli Kelas Ini Gratis</a>
    					<br><br>
    					{!! html_entity_decode($course->deskripsi) !!} 
    					<br><br>
    					<a href="{{ route('buy-course', $course->id) }}" class="btn btn-primary btn-lg">Beli Kelas Ini Gratis</a>
              <br><br>
    			  @else
              <h2><strike>Rp 300.000</strike> Rp {{ number_format($course->harga, 0, ',', '.') }}</h2>
  				    
              <a href="{{ route('buy-course', $course->id) }}" onclick="trackWebConversion()" class="btn btn-primary btn-lg">Beli Kelas Ini Sekarang</a>
  				    <br><br>
      				
              <script>
        				function trackWebConversion() {
        				
        				  fbq('track', 'Purchase', {
        					value: {{ $course->harga }},
        					currency: 'IDR',
        				  });

        				}
      				</script>
  				    
                  
              {!! html_entity_decode($course->deskripsi) !!} 
  				    <br>
              <h2><strike>Rp 300.000</strike> Rp {{ number_format($course->harga, 0, ',', '.') }}</h2>
  				    <a href="{{ route('buy-course', $course->id) }}" onclick="trackWebConversion()" class="btn btn-primary btn-lg">Beli Kelas Ini Sekarang</a>
  				    <br><br>
  			   @endif  
                
      @else
          <a href="{{ route('topik', $list_topik[0]->id) }}" class="btn btn-primary btn-lg">Mulai Belajar Sekarang</a>
          <br>
  				{!! html_entity_decode($course->deskripsi) !!} 
  				<br>  
      @endif
			   
      </div>
      <div class="col-xs-12 col-md-5">
          <div class="embed-responsive embed-responsive-16by9">
              <img class="embed-responsive-item"  src= "{{ URL::asset('images/gambar_course/'.$course->foto ) }}"></img>
          </div>
      </div>
                
    </div>
    <hr/>
            
            
      <div class="row">
          <div class="col-xs-12 col-md-7">
              <h3>Konten Kelas</h3>
              <div class="panel-group" id="accordion">
               
			          @foreach($list_topik as $topik)
                      <div class="panel">       
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="'#collapse{{($topik['id'])}}"> {{ $topik -> judul_topik }}</a>
                          </h4>

                          <div id="collapse{{($topik['id'])}}" class="panel-collapse collapse">
                            @if (count($topik['childs']) > 0)
                                @foreach ($topik['childs'] as $subtopik)
                                    <div class="panel">
                                        <h4 class="panel-title">
                                          <a href="{{ route('topik', $subtopik->id) }}">{{ $subtopik->judul_topik }}</a>
                                        </h4>
                                    </div>
                                @endforeach
                            @endif
                          </div>
                      </div>
                @endforeach

              </div>
          </div>
      </div>
        @if (count($course->tutors) > 0)
        <div class="row">
          <div class="col-xs-12 col-md-7">
              <h3>Pengajar</h3>
              <br>
              @foreach($course->tutors as $tutorCourse)
                <div class="row">
                    <div class="col-xs-2 col-md-2">
                    <img class="profile-user-img img-responsive img-circle" src="{{ $tutorCourse->tutor->profile_photo ? URL::asset('images/gambar_course/'.$tutorCourse->tutor->profile_photo) : URL::asset('images/user-default.png') }}" alt="User profile picture">
                    </div>
                  <div class="col-xs-10 col-md-10">
                    <h5>{{ $tutorCourse->tutor->name }}</h5>
                    <div id="more">
                      {!! html_entity_decode($tutorCourse->tutor->story) !!}
                    </div> 

                  </div>
                </div>
              @endforeach
          </div>
        </div>
        @endif


            

            @if(!empty($status_pembayaran) && $status_pembayaran->status_pembayaran == 3 && empty($status_pernah_review))
              <meta name="csrf-token" content="{{ csrf_token() }}">
              <br>
              <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-7"> 
                    <h3>Bagaimana pendapat kamu tentang kelas ini?</h3>
                          <form class="form" method="post" action="" role="form">

                            <fieldset class="starability-basic">
                              <h4>Beri Rating</h4>
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
                            <h4>Beri Review</h4>
                             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                             <div class="form-group">
                                <textarea required name="body_review" class="form-control" rows="5" id="comment"></textarea>
                             </div>
                             
                             <div class="form-group">
                                <button type="submit" name="review" class="btn btn-primary btn-lg">Simpan</button>
                             </div>
                             
                          </form>
                       
                     </div>
                   </div>
              @endif
               




           <div class="row">
              <div class="col-xs-12 col-md-7">
                  <br>
                  <h3>Review Kelas</h3>
                  
                   @foreach($list_review as $review)
                      <hr/>
                      <div class="row">
                        
                        <div class="col-xs-2 col-md-1">
                          <img class="profile-user-img img-responsive img-circle" src="{{ $review->foto ? URL::asset($review->foto) : URL::asset('images/user-default.png')}}" alt="User profile picture">
                        </div>
                        <div class="col-xs-8 col-md-9">
                          <p><strong>{{ $review->nama }}</strong></p>
                          <p>{{ $review -> review }}</p> 

                        </div>
                        <div class="col-xs-2 col-md-2 text-right">
                          <p>{{ substr($review->created_at, 0, 10) }}</p>
                        </div>
                      </div>
                    @endforeach
              </div>
           </div>





             
        </div>
    </section>

@endsection

@section('extra-script')
<script src="{{ URL::asset('js/readmore.min.js') }}"></script>
<script>
  $('#more').readmore({ moreLink: '<a href="#">Lihat Semua</a>', lessLink: '<a href="#">Tutup</a>' });
</script>

<script>
  // Set the date we're counting down to
  var countDownDate = new Date("March 11, 2019 23:59:55").getTime();

  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get todays date and time
    var now = new Date().getTime();
      
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
      
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      
    // Output the result in an element with id="demo"
    document.getElementById("timer-diskon").innerHTML = days + " hari " + hours + " jam "
    + minutes + " menit " + seconds + " detik ";
      
    // If the count down is over, write some text 
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("timer-diskon").innerHTML = "DISKON TELAH HABIS!";
    }
  }, 1000);
</script>
@endsection
