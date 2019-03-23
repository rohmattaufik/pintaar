	@extends('template')
@section('title')
  <title>Pintaar</title>
@endsection

@section('extra-style')

@endsection

@section('content')
  
	<section class="section-padding">
    <div class="container">

        @if (session('free-course'))
           <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                <div style="color:green;"><i class="fas fa-check-circle fa-7x"></i></div>
                <br>
                <h4>Terima kasih! Pembelian kelas kamu BERHASIL!</h4> 
                <h4>Kelas ini GRATIS. Namun, kamu harus share postingan Pintaar di Line atau Facebook. Jika sudah, tunggu selama 1x24 jam dan kelas akan dapat kamu akses.</h4>
                <br>
                <div class="row">
                  <div class="col-xs-12 col-md-6 col-md-offset-3">
                      <a href="http://line.me/R/home/public/post?id=lov2313r&postId=1155273919305023787" target="_blank" class="btn btn-block btn-lg btn-success">Share di Line Sekarang</a>
                      <p>atau</p>
                 
                      <a href="https://www.facebook.com/permalink.php?story_fbid=728135720913345&id=722335064826744" target="_blank" class="btn btn-block btn-lg btn-primary">Share di Facebook Sekarang</a>
                  </div> 
                </div>     

            </div>
          </div>     

        @else
           <div class="row">
              <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
                <div style="color:green;"><i class="fas fa-check-circle fa-7x"></i></div>
                <br>
                <h4>Bukti pembayaran telah kami terima!</h4>
                <p>Silahkan tunggu dalam 1x24 jam dan kamu akan bisa menikmati kelas yang sudah dibeli.</p>
                <a href="{{ route('courses-category', 1) }}" class="btn btn-primary btn-lg">Beli Kelas Lain</a>  
              </div>
            </div>
        @endif
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
