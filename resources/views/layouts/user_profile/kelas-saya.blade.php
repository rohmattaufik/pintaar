@extends('template')

@section('title')
<title>Pintaar - Kelas Saya</title>
@endsection

@section('extra-style')

@endsection

@section('content')
<section class="section-padding">
	<div class="container">

		@if (count($list_courses_that_has_bought) == 0)
			<div class="row">
				<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
					<div><i class="fas fa-book-open fa-5x"></i></div>
					<h3>Kelas kamu belum ada!</h3>
					<p>Setelah kamu membeli kelas dan pembayaran sudah dikonfirmasi, kelas dapat diakses disini.</p>
					<a href="{{ route('courses-category', 1) }}" class="btn btn-lg btn-primary">Beli Kelas Sekarang</a>
				</div>
			</div>
		@else
				@if (empty(Auth::User()->foto))
					<div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p><strong>Selamat belajar {{Auth::User()->nama}}!</strong> Ayo lengkapi profil kamu <a href="{{ route('user-profil') }}"><strong>disini.</strong></a></p>
					</div>
				@endif
		<h2>Kelas Saya</h2>
		<br>
		<div class="row display-flex">
		@foreach($list_courses_that_has_bought as $list_course_with_user_that_has_bought)

				<div class="col-xs-12 col-md-3">
					<a href="{{ route(('course'), $list_course_with_user_that_has_bought->id) }}">
						<div class="thumbnail">
							<img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user_that_has_bought->foto ) }}" alt="Gambar Kelas" height="120" width="500">
							<div class="caption">
								<h4 id="thumbnail-nama-kelas">{{$list_course_with_user_that_has_bought->nama_course}}</h4>
								<p><span class="ti-user"></span> {{ $list_course_with_user_that_has_bought->nama }}</p>

								@if(empty($list_course_with_user_that_has_bought->rating))
									<p class="starability-result" data-rating="0"></p>
								@else
									<p class="starability-result" data-rating="{{ round($list_course_with_user_that_has_bought->rating) }}"></p>
								@endif
								<br>
								<button class="btn btn-block btn-primary">Belajar Di Kelas Ini</button>
							</div>
						</div>
					</a>
				</div>


			@endforeach
			</div>

		@endif

	</div>
</section>

@endsection
