@extends('template')

@section('title')
  <title>Pemesanan</title>
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
              <a href="{{ route('courses') }}" class="btn btn-lg btn-primary">Beli Kelas Disini</a>
           
          </div>
        </div>      
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
