@extends('template')

@section('title')
<title>Pintaar - Kelas</title>
@endsection

@section('content')
<section class="section-padding">
	<div class="container">
		<h1>Kelas {{$kategori_kelas_str}}</h1>
		<br>

		@if (count($list_courses_with_users) == 0)
		<h3>Kelas belum ada! Sabar yaaa...</h3>
		@else
		@foreach($list_courses_with_users as $list_course_with_user)
		@if (($loop->index) % 4 == 0)
		<div class="row display-flex">
			<div class="col-xs-12 col-md-3">
				<a href="{{route(('course'), $list_course_with_user->id)}}">
					<div class="thumbnail">
						<img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="Gambar Kelas" height="120" width="500">
						<div class="caption">
							<h4 class="thumbnail-nama-kelas">{{$list_course_with_user->nama_course}}</h4>
							<p><span class="ti-user"></span> {{$list_course_with_user->nama}}</p>
							<p class="starability-result" data-rating="{{ round($list_course_with_user->rating) }}"></p>

							@if($list_course_with_user->harga > 0)
							@if($list_course_with_user->diskon > 0)
							<h4 class="text-right">
								<strike>Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}</strike>
								Rp {{ number_format((100-$list_course_with_user->diskon)/100*$list_course_with_user->harga, 0, ',', '.') }}
							</h4>
							@else
							<h4 class="text-right">
								Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}
							</h4>
							@endif
							@else
							<h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
							@endif

						</div>
					</div>
				</a>
			</div>

			@elseif (($loop->index) % 4 == 3)
			<div class="col-xs-12 col-md-3">
				<a href="{{route(('course'), $list_course_with_user->id)}}">
					<div class="thumbnail">
						<img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="Gambar Kelas" height="120" width="500">
						<div class="caption">
							<h4 class="thumbnail-nama-kelas">{{$list_course_with_user->nama_course}}</h4>
							<p><span class="ti-user"></span> {{$list_course_with_user->nama}}</p>
							<p class="starability-result" data-rating="{{ round($list_course_with_user->rating) }}"></p>

							@if($list_course_with_user->harga > 0)
							@if($list_course_with_user->diskon > 0)
							<h4 class="text-right">
								<strike>Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}</strike>
								Rp {{ number_format((100-$list_course_with_user->diskon)/100*$list_course_with_user->harga, 0, ',', '.') }}
							</h4>
							@else
							<h4 class="text-right">
								Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}
							</h4>
							@endif
							@else
							<h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
							@endif

						</div>
					</div>
				</a>
			</div>
		</div>

		@else
		<div class="col-xs-12 col-md-3">
			<a href="{{route(('course'), $list_course_with_user->id)}}">
				<div id="thumbnail-nama-kelas" class="thumbnail">
					<img src="{{ URL::asset('images/gambar_course/'.$list_course_with_user->foto ) }}" alt="Gambar Kelas" height="120" width="500">
					<div class="caption">
						<h4 class="thumbnail-nama-kelas">{{$list_course_with_user->nama_course}}</h4>
						<p><span class="ti-user"></span> {{$list_course_with_user->nama}}</p>
						<p class="starability-result" data-rating="{{ round($list_course_with_user->rating) }}"></p>

						@if($list_course_with_user->harga > 0)
						@if($list_course_with_user->diskon > 0)
						<h4 class="text-right">
							<strike>Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}</strike>
								Rp {{ number_format((100-$list_course_with_user->diskon)/100*$list_course_with_user->harga, 0, ',', '.') }}
						</h4>
						@else
						<h4 class="text-right">
							Rp {{ number_format($list_course_with_user->harga, 0, ',', '.') }}
						</h4>
						@endif
						@else
							<h3 class="text-right"><span class="label label-warning">Gratis</span></h3>
						@endif


					</div>
				</div>
			</a>
		</div>

		@endif
		@endforeach
		@endif

	</div>
</section>

@endsection
