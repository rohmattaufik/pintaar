@extends('template')
@section('title')
  <title>Pintaar</title>
@endsection

@section('extra-style')

@endsection

@section('content')
  <section class="section-padding">
    <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
              <div style="color:green;"><i class="fas fa-check-circle fa-7x"></i></div>
              <br>
              <h4>Terima kasih sudah membeli kelas ini. Selamat belajar!</h4>
              <br>
              <a href="{{ route('kelas_saya') }}" class="btn btn-lg btn-primary">Belajar Sekarang</a>
           
          </div>
        </div>      
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
