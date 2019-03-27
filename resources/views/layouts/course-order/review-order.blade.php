@extends('template')

@section('title')
<title>Pintaar - Pembayaran Kelas</title>
@endsection

@section('extra-style')

@endsection


@section('content')
<section class="section-padding">
	<div class="container">

		@if ($courseOrder->status_pembayaran == 1)
		@if($courseOrder->metode_pembayaran == 'payment1')
		<div class="row text-center">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<h2>Pembayaran via Transfer Bank BNI</h2>
				<h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
				<p>Silahkan transfer sebesar:</p>
				<h2>Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h2>
				<p>ke nomor rekening <b>0302916703</b> a/n <b>Muhammad Luqman Hakim</b> pada Bank :</p>
				<img src="{{ asset('/images/bank-bni.png') }}" height="50" width="150" alt="Card image cap">
			</div>
		</div>
		@elseif ($courseOrder->metode_pembayaran == 'payment2')
		<div class="row text-center">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<h2>Pembayaran via Transfer Bank BCA</h2>
				<h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
				<p>Silahkan transfer sebesar:</p>
				<h2>Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h2>
				<p>ke nomor rekening <b>4210161274</b> a/n <b>Muhammad Luqman Hakim</b> pada Bank :</p>
				<img src="{{ asset('/images/bank-bca.png') }}" height="50" width="150" alt="Card image cap">
			</div>
		</div>
		@elseif ($courseOrder->metode_pembayaran == 'payment3')
		<div class="row text-center">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<h2>Pembayaran via Transfer OVO</h2>
				<h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
				<p>Silahkan transfer sebesar:</p>
				<h2>Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h2>
				<p>ke nomor <b>082361888896</b> a/n <b>Muhammad Luqman Hakim</b> dengan :</p>
				<img src="{{ asset('/images/ovo.png') }}" height="50" width="150" alt="Card image cap">
			</div>
		</div>
		@elseif ($courseOrder->metode_pembayaran == 'payment4')
		<div class="row text-center">
			<div class="col-xs-12 col-md-6 col-md-offset-3">
				<h2>Pembayaran via Transfer GO-PAY</h2>
				<h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
				<p>Silahkan transfer sebesar:</p>
				<h2>Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h2>
				<p>ke nomor <b>082361888896</b> a/n <b>Luqman</b> dengan :</p>
				<img src="{{ asset('/images/gopay.png') }}" height="50" width="150" alt="Card image cap">
			</div>
		</div>
		@endif
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-4 col-md-offset-4 text-center">
				<div class="alert alert-info" role="alert">
					
				<h4>Batas waktu pembayaran:<br> {{ $courseOrder->updated_at->addDays(3)->format('d-m-Y') }} pukul 23:59.</h4>
				
				</div>
			
				<a href="{{ route('payment-proof', $courseOrder->no_order) }}" class="btn btn-primary btn-lg">Upload Bukti Bayar Disini</a>
			</div>
		</div>

		@else
		<div class="row text-center">
			<div class="col-xs-12 col-md-6 col-md-offset-3">        
				<h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
				<h3><span class="label label-success">{{ $courseOrder->statusPembayaran->status }}</span></h3>
				<h4>Total Tagihan : Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h4>
				@if ($courseOrder->metode_pembayaran != null)
				<h4>Metode Pembayaran :
					@if ($courseOrder->metode_pembayaran == 'payment1')
					Transfer Bank BNI
					@elseif ($courseOrder->metode_pembayaran == 'payment2')
					Transfer Bank BNI
					@elseif ($courseOrder->metode_pembayaran == 'payment3')
					Transfer OVO
					@elseif ($courseOrder->metode_pembayaran == 'payment4')
					Transfer GO-PAY
					@endif
				</h4>
				<h4>Bukti Pembayaran : <a href="{{ URL::asset($courseOrder->bukti_pembayaran) }}" target="_blank">Lihat Bukti Bayar</a></h4>
				@endif
			</div>
		</div>
		@endif
		<br>
		<div class="row">
			<div class="col-xs-12 col-md-6 col-md-offset-3 text-center">

				<div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<h3>Kelas Yang Dibeli</h3>
						</li>
						@foreach($cart->getCartCourses as $cartCourse)
							<li class="list-group-item">
								<div class="row">
									<div class="col-xs-8 col-md-8 text-left">
										<p>{{ $cartCourse->getCourse->nama_course }}</p>
									</div>
									<div class="col-xs-4 col-md-4 text-right">
											@if ($cartCourse->course_price > 0)
												@if($cartCourse->discount_percentage != null and $cartCourse->discount_percentage > 0)
													<p><strike>Rp {{ number_format($cartCourse->course_price, 0, ',', '.') }}
													</strike>
													Rp {{ number_format((100-$cartCourse->discount_percentage)/100*$cartCourse->course_price, 0, ',', '.') }}
													</p>
												@else
													<p>
													Rp {{ number_format($cartCourse->course_price, 0, ',', '.') }}
													</p>
												@endif

											@else
												<p>Gratis</p>
											@endif
									</div>
								</div>
									
							</li>
						@endforeach
					</ul>
				</div>
				<br>
				<h4>Ingin mendapatkan kelas gratis? Klik <a href="{{ route('referral') }}">disini </a>sekarang</h4>
				<br>

				<div class="alert alert-warning" role="alert">
					<h4>Butuh bantuan? Hubungi kami disini</h4>
					<a class="btn btn-success" href="https://wa.me/6285212221431" target="_blank">WhatsApp</a>
					<a class="btn btn-primary" href="https://www.facebook.com/Pintaar-722335064826744" target="_blank">Facebook</a>
				</div>

			</div>
		</div>

	</div>
</section>
@endsection



@section('extra-script')

@endsection

