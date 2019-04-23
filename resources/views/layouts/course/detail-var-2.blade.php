@extends('template')

@section('title')
<title>Pintaar - {{ $course->nama_course }}</title>
@endsection

@section('extra-style')
<style>

* {
  font-family: Verdana, Geneva, sans-serif;
}

.section {
	margin-top: 10px;
}

#diskon {
	font-size: 17px;
	margin-top: -5px;
	margin-bottom: 10px;
}

#info-promo > [class*='col-'] > .alert {
	margin-bottom: 10px;
	padding-top: 10px;
	padding-bottom: 0px;
}

@media screen and (min-width: 601px) {
  	#image_for_mobile {
		display: none;
	}

    #read-more-description, #pengajar, #course-review {
        font-size: 1.1em;
    }
}

@media only screen and (max-width: 600px) {

	#image_for_mobile {
		display: block;
		margin-bottom: 10px;
	}

	#image_for_desktop {
		display: none;
	}

	#info-promo > [class*='col-'] > .alert > h4 {
		font-size: 15px;
	}

    #read-more-description, #pengajar, #course-review {
        font-size: 1.2em;
    }

    #course-name {
        font-size: 24px;
    }
}
</style>

@endsection

@section('content')



<section class="section">
	<div class="container">
		@if((empty($status_pembayaran) || $status_pembayaran->status_pembayaran != 3))
		<div id="info-promo" class="row">
			<div class="col-xs-12 col-md-12 text-center">
				@if ($course->harga == 0)
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4>Kelas ini masih <strong>GRATIS SAMPAI BEBERAPA HARI KEDEPAN!</strong> Ayo segera beli dan gabung di kelas ini!</h4>
					</div>
				@else
					@if($course->diskon != null and $course->diskon > 0)
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4>Kelas ini diskon {{ $course->diskon }}% hingga 15 April 2019.</h4>
							<h4 id="timer-diskon"></h4>
						</div>
					@endif
				@endif
			</div>
		</div>
		@endif

		<div id="image_for_mobile" class="row">
			<div class="col-xs-12">
				<div class="embed-responsive embed-responsive-16by9">
					<img id="image_for_mobile" class="embed-responsive-item" src= "{{ URL::asset('images/gambar_course/'.$course->foto ) }}"></img>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-7">
				<h2 id="course-name">{{ $course->nama_course }}</h2>

				<p class="starability-result" data-rating="{{ round($rating->rating) }}"></p>

				<h4><span class="label label-default">{{ $count_student_learned }} Murid Sudah Bergabung</span></h4>

				<!-- <p><strong>Dibuat oleh {{ $course->creator->users->nama }} </strong><p> -->
				<br>
				@if(empty($status_pembayaran) || $status_pembayaran->status_pembayaran != 3)

				@else
					<a href="{{ route('topik', $list_topik[0]->id) }}" class="btn btn-primary btn-lg">Mulai Belajar Sekarang</a>
					<br><br>
				@endif

				<h3 id="class-detail">Deskripsi Kelas</h3>
				<div id="read-more-description">
					{!! html_entity_decode($course->deskripsi) !!}
				</div>
				<hr>

			</div>

			<div class="col-xs-12 col-md-5">
				<div id="image_for_desktop" class="embed-responsive embed-responsive-16by9">
					<img class="embed-responsive-item"  src= "{{ URL::asset('images/gambar_course/'.$course->foto ) }}"></img>
				</div>
			</div>
		</div>



		<div class="row">
			<div class="col-xs-12 col-md-7">
				@if(empty($status_pembayaran) || $status_pembayaran->status_pembayaran != 3)
					<div class="alert alert-info text-center" role="alert">
					@if($course->harga == 0)
						<a href="{{ route('buy-course', $course->id) }}" class="btn btn-primary btn-lg">Beli Kelas Ini Gratis</a>
					@else
						@if($course->diskon != null and $course->diskon > 0)
							<h4 id="sisa-hari-promo"></h4>
							<h4><strike>Rp {{ number_format($course->harga, 0, ',', '.') }}</strike> Rp {{ number_format((100-$course->diskon)/100*$course->harga, 0, ',', '.') }}</h4>
							<!-- <div id="diskon">
								<span class="label label-primary">Diskon {{ $course->diskon }}%</span>
							</div> -->

						@else
							<h4>Rp {{ number_format($course->harga, 0, ',', '.') }}</h4>
						@endif
						<a id="beli-kelas" href="{{ route('buy-course', $course->id) }}" class="btn btn-primary btn-lg">Beli Kelas Ini Sekarang</a>
						<br><br>

						<div class="row">
							<div class="col-xs-12 col-md-6 col-md-offset-3">

								<p><strong>Harga sudah termasuk:</strong></p>
								<ul align="left">
									<li>Garansi 7 hari uang kembali</li>
									<li>Akses materi kelas selamanya</li>
									<li>Tanya jawab dengan pengajar</li>
									<li>Sertifikat kelas</li>
								</ul>

							</div>
						</div>

					@endif
					</div>

					<div class="alert alert-success text-center" role="alert">
						<h4>Ada yang ingin kamu tanya?</h4>


            			<a class="btn btn-success" href="{{ route('faq') }}" target="_blank">Baca FAQ Disini</a>
            			<br>
            			<p> atau </p>
            			<a id="button-whatsapp" class="btn btn-success" href="https://wa.me/6285212221431" target="_blank">Tanya Disini (WhatsApp)</a>

          			</div>
					<hr>
				@endif


			</div>
		</div>

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
		<div id="pengajar" class="row">
			<div class="col-xs-12 col-md-7">
				<h3>Pengajar</h3>
				<br>
				@foreach($course->tutors as $tutorCourse)
				<div class="row">
					<div class="col-xs-3 col-sm-3 col-md-2">
						<img class="profile-user-img img-responsive img-circle" src="{{ $tutorCourse->tutor->profile_photo ? URL::asset('images/gambar_course/'.$tutorCourse->tutor->profile_photo) : URL::asset('images/user-default.png') }}" alt="User profile picture">
					</div>
					<div class="col-xs-9 col-sm-9 col-md-10">
						<h4>{{ $tutorCourse->tutor->name }}</h4>
						<div id="read-more-teacher">
							{!! html_entity_decode($tutorCourse->tutor->story) !!}
						</div>
					</div>
				</div>
				@endforeach
                <hr>
			</div>
		</div>
		@endif

        <div id="recommended-course" class="row">
            <div class="col-xs-12 col-md-7">
                <h3>Murid Lain Juga Membeli Kelas Ini</h3>

                @include('layouts.course.recommended-course')

                <h4><a href="{{ route('courses-category', 1) }}"><i class="fa fa-angle-right" aria-hidden="true"></i> Lihat Kelas Lainnya</a></h4>
                <hr>
            </div>
        </div>



		@if(!empty($status_pembayaran) && $status_pembayaran->status_pembayaran == 3 && empty($status_pernah_review))

		<br>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-7">
				<h3>Bagaimana penilaianmu terhadap kelas ini?</h3>
				<form class="form" method="post" action="{{ route('course_review_submit')}}" role="form">

					<fieldset class="starability-basic">
						<h4>Beri Bintang</h4>
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
					<h4>Beri Ulasan</h4>
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="idCourse" value="{{ $course->id }}">
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
				<h3>Ulasan Kelas</h3>
				@if (count($course->reviews) > 0)
					@foreach($course->reviews as $review)
					<hr/>
					<div id="course-review" class="row">

						<div class="col-xs-3 col-md-2">
							<img class="profile-user-img img-responsive img-circle" src="{{ $review->foto ? URL::asset($review->foto) : URL::asset('images/user-default.png')}}" alt="User profile picture">
						</div>
						<div class="col-xs-9 col-md-10">
							<p>
								<strong>{{ $review->getUser->nama }}</strong> |
								<small>{{ $review->created_at->format("d-m-Y") }}</small>
							</p>
							<p id="rating-star" class="starability-result" data-rating="{{ $review->getRating($course->id, $review->getUser->id) }}"></p>
							<p>{{ $review->review }}</p>
						</div>
					</div>
					@endforeach
				@else
					<p>Belum ada review kelas ini.</p>
				@endif
			</div>
		</div>






	</div>
</section>

@endsection

@section('extra-script')
<script src="{{ URL::asset('js/readmore.min.js') }}"></script>

<script>
	$('#read-more-description').readmore({
		speed: 50,
		collapsedHeight: 300,
		moreLink: '<a href="#">Lihat Semua</a>',
		lessLink: '<a href="#">Tutup</a>',
		afterToggle: function(trigger, element, expanded) {
			if(!expanded) {
				$('html, body').animate({scrollTop: $('#class-detail').offset().top }, {duration: 20 } );
			}
		}
	});
	$('#read-more-teacher').readmore({
		moreLink: '<a href="#">Lihat Semua</a>',
		lessLink: '<a href="#">Tutup</a>',
		afterToggle: function(trigger, element, expanded) {
			if(!expanded) {
				$('html, body').animate({scrollTop: $('#pengajar').offset().top }, {duration: 20 } );
			}
		}
	});
</script>

<script>
  	// Set the date we're counting down to
  	var countDownDate = new Date("April 22, 2019 23:59:55").getTime();

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
		document.getElementById("timer-diskon").innerHTML = days + " hari " + hours + " jam " + minutes + " menit " + seconds + " detik ";

		document.getElementById("sisa-hari-promo").innerHTML = "Promo tinggal " + days + " hari lagi!";

		// If the count down is over, write some text
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("timer-diskon").innerHTML = "";
			document.getElementById("sisa-hari-promo").innerHTML = "";
		}
	}, 1000);
</script>
@endsection
