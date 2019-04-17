@extends('template')

@section('title')
<title>{{$data['course']->nama_course}} </title>
@endsection

@section('content')
<section class="section-padding">
	<div class="container">
		@if (session('submit-review'))
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<p>Terima kasih. Ulasan kamu sudah disimpan.</p>
				</div>
			</div>
		</div>
		@endif
		
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
				<div style="color:#138fc2;"><i class="fas fa-award fa-7x"></i></div>
				<h3>Selamat {{$data['user']->nama}}!</h3> 
				<p><strong>
					Kamu telah menyelesaikan kelas "{{ $data['course']->nama_course }}" dengan baik. Semoga ilmu yang kamu dapatkan bermanfaat yaa :)</strong>
				</p>  
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
		
				@if(empty($data['status_pernah_review']))
					<form class="form" method="post" action="{{ route('course_review_submit')}}" role="form">
						<h4>Bagaimana penilaianmu terhadap kelas ini?</h4>	
						<fieldset class="starability-basic">
							<input type="radio" id="rate1" name="rating" value="1" />
							<label for="rate1" title="Tidak bagus">1 star</label>

							<input type="radio" id="rate2" name="rating" value="2" />
							<label for="rate2" title="Kurang bagus">2 stars</label>

							<input type="radio" id="rate3" name="rating" value="3" />
							<label for="rate3" title="Biasa aja">3 stars</label>

							<input type="radio" id="rate4" name="rating" value="4" />
							<label for="rate4" title="Bagus">4 stars</label>

							<input type="radio" id="rate5" name="rating" value="5" />
							<label for="rate5" title="Sangat bagus">5 stars</label>
						</fieldset>
						

						<h4>Beri Ulasan</h4>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="idCourse" value="{{ $data['course']->id }}">
						<div class="form-group">
							<textarea required name="body_review" class="form-control" rows="5" id="comment" placeholder="Apakah kelas ini bagus? Apa yang kamu pelajari di kelas ini?"></textarea>
						</div>

						<div class="form-group">
							<button type="submit" name="review" class="btn btn-primary">Simpan</button>
						</div>

					</form>
				@endif
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
				<h4>Apakah kamu ingin belajar lebih jauh tentang ilmu ini?</h4>
				<a href="https://goo.gl/forms/r4jmiirHYNOudWrt1" target="_blank" class="btn btn-primary">Ya, Saya Tertarik.</a> 
			</div>
		</div>

	</div>
</section>
@endsection
