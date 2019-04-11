@extends('template')

@section('title')
	<title>Daftar Kelas</title>
@endsection

@section('content')
<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h3>Informasi Pengajar</h3>
				<a href="{{ route('show-tutor') }}" class="btn btn-primary">Lihat Informasi Pengajar</a>
				<a href="{{ route('edit-tutor') }}" class="btn btn-primary">Ubah Informasi Pengajar</a>

			</div>
		</div>
		<br>

		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h3>Daftar Kelas</h3>

				<a href="{{ route('course-create')}}" class="btn btn-primary">Buat Kelas Baru</a>
				<br><br>
				<table class="table table-hover text-left">
					<tr>
						<th>No.</th>
						<th>Nama Kelas</th>
						<th>Harga Kelas</th>
						<th>Diskon kelas</th>
						<th>Aksi</th>
					</tr>
					@foreach($courses as $key => $course)
					<tr>
						<td>{{ ++$key }}</td>
						<td>
							<a href="{{ route('course-detail',$course->id)}}">{{ $course->nama_course}}</a>
						</td>
						<td>Rp {{ $course->harga}}</td>
						<td>{{ $course->diskon }} %</td>
						<td>
							<a href="{{ route('course-detail',$course->id)}}" class="btn btn-primary">Lihat</a>
							<a href="{{ route('course',$course->id)}}" class="btn btn-default" target="_blank">Lihat Sebagai Murid</a>
							<a href="{{ route('sales-course',$course->id)}}" class="btn btn-warning">Penjualan</a>
							<a href="{{ route('publish-course',$course->id)}}" class="btn btn-danger">Rilis</a>
							
						</td>
					</tr>
					@endforeach
				</table>
					
			</div>
		</div>
	</div>
</section>


@endsection
