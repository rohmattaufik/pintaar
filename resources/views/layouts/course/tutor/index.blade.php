@extends('template')

@section('title')
	<title>Daftar Kelas</title>
@endsection

@section('content')
<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<a href="{{ route('course-create')}}" class="btn btn-success pull-left">Buat Kelas Baru</a>
						<h3 class="box-title">Daftar Kelas</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
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
								<td>{{ $course->nama_course}}</td>
								<td>Rp {{ $course->harga}}</td>
								<td>{{ $course->diskon }} %</td>
								<td>
									<a href="{{ route('course-detail',$course->id)}}" class="btn btn-primary">Lihat</a>
									<a href="{{ route('course-update', $course->id) }}" class="btn btn-info">Ubah</a>
									<a href="{{ route('course',$course->id)}}" class="btn btn-default" target="_blank">Lihat Sebagai Murid</a>
									<a href="{{ route('sales-course',$course->id)}}" class="btn btn-warning">Penjualan Kelas</a>
									<a href="{{ route('publish-course',$course->id)}}" class="btn btn-danger">Rilis</a>
									
								</td>
							</tr>
							@endforeach
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
		</div>
	</div>
</section>


@endsection
