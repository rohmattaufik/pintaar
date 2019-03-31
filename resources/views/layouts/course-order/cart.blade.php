@extends('template')

@section('title')
	<title>Keranjang</title>
@endsection

@section('extra-style')

@endsection

@section('content')
<section class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<h2>Keranjang</h2>
				
				<ul class="list-group">
					@foreach($cart->getCartCourses as $cartCourse)
						<li class="list-group-item">
							<div class="row">
								<div class="col-xs-8 col-md-8">
									<font size="4">{{ $cartCourse->getCourse->nama_course }}</font>

									<form role="form" action="{{ route('remove-from-cart') }}" method="post">
										{{ csrf_field() }}
										<input type="hidden" name="cart_course_id" value="{{ $cartCourse->id }}">
										<button type="submit" class="btn btn-danger btn-sm">Hapus</button>
									</form>
								</div>
								<div class="col-xs-4 col-md-4 text-right">
									@if ($cartCourse->getCourse->diskon != null and $cartCourse->getCourse->diskon > 0)
										<font size="4"><strike>Rp {{ number_format($cartCourse->getCourse->harga, 0, ',', '.') }}</strike></font>
										<font size="4">Rp {{ number_format((100-$cartCourse->getCourse->diskon)/100*$cartCourse->getCourse->harga, 0, ',', '.') }}</font>

										<br>
										<span class="label label-primary">Diskon {{ $cartCourse->getCourse->diskon }}%</span>

									@else
										<font size="4">Rp {{ number_format($cartCourse->getCourse->harga, 0, ',', '.') }}</font>
									@endif
								</div>	
							</div>
						</li>
					@endforeach
				</ul>
				
				<ul class="list-group">
					<li class="list-group-item">
						<div class="row">
							<div class="col-xs-8 col-md-8">
								<h4>Total Harga</h4>
							</div>
							<div class="col-xs-4 col-md-4 text-right">
								<h4>Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h4>
							</div>
						</div>

					</li>
				</ul>
			
				<div class="row">
					<form role="form" action="{{ route('checkout') }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="cart_id" value="{{ $cart->id }}">
						
						<div class="col-xs-6 col-md-6">
							<a href="{{ route('courses-category', 1) }}" class="btn btn-success btn-block">Beli Kelas Lain</a>
						</div>
						<div class="col-xs-6 col-md-6">
							<button type="submit" class="btn btn-primary btn-block">Bayar Sekarang</button>
						</div>
						
					</form>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- /.page content -->
@endsection





@section('extra-script')
<script type="text/javascript">
	window._vis_opt_queue = window._vis_opt_queue || [];
	window._vis_opt_queue.push(function() {_vis_opt_revenue_conversion("1000");});
</script>
@endsection
