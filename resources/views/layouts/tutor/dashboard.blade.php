@extends('template')

@section('title')
	<title>Dashboard</title>
@endsection

@section('content')
<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h3>Informasi Pengajar</h3>
				<a href="{{ route('show-tutor') }}" class="btn btn-primary">Lihat Informasi Pengajar</a>
				<a href="{{ route('edit-tutor') }}" class="btn btn-primary">Ubah Informasi Pengajar</a>
				<br><br>
				<h3>Saldo</h3>
				<h4>Rp {{ number_format($tutor->getTutorSaldo(), 0, ',', '.') }}</h4>
				<a href="{{ route('show-transaction') }}" class="btn btn-primary">Tarik Saldo</a>
				<br><br>
				
			</div>
		</div>
		<br>

					
			
		
	</div>
</section>


@endsection
