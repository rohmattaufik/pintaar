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
          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
              <div><i class="fas fa-shopping-cart fa-5x"></i></div>
              <p>Keranjang kamu kosong!</p>
              <a href="{{ route('courses-category', 1) }}" class="btn btn-lg btn-primary">Beli Kelas Sekarang</a>
           
          </div>
        </div>      
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
