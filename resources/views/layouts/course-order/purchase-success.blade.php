	@extends('template')
@section('title')
  <title>Pintaar</title>
@endsection

@section('extra-style')

@endsection

@section('content')
	<script>
	  fbq('track', 'Purchase', {
		value: 10000,
		currency: 'IDR',
	  });
	</script>  
	<section class="section-padding">
    <div class="container">

        @if (session('free-course'))
           <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                <div style="color:green;"><i class="fas fa-check-circle fa-7x"></i></div>
                <br>
                <h4>Terima kasih! Pembelian kelas kamu BERHASIL!</h4> 
                <h4>Kelas ini GRATIS. Namun, kamu harus share postingan facebook Pintaar di timeline kamu. Jika sudah, kelas dapat kamu akses dalam 1x24 jam.</h4>
                <br>
                <a href="https://www.facebook.com/permalink.php?story_fbid=728135720913345&id=722335064826744" class="btn btn-lg btn-primary">Share Sekarang</a>
            </div>
            </div>     

        @else
           <div class="row">
              <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                <div style="color:green;"><i class="fas fa-check-circle fa-7x"></i></div>
                <br>
                <h4>Bukti pembayaran telah kami terima!</h4>
                <p>Silahkan tunggu dalam 1x24 jam dan kamu akan bisa menikmati kelas yang sudah dibeli.</p>
                <a href="{{ route('courses') }}" class="btn btn-primary btn-lg">Beli Kelas Lagi</a>  
              </div>
            </div>
        @endif
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
