@extends('template')

@section('title')
  <title>Konfirmasi Pembayaran</title>
@endsection

@section('extra-style')

@endsection


@section('content')
  <section class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-8 col-md-offset-2">
          <div class="panel panel-default text-center">
            <div class="panel-body"> 
                <h4>Bukti pembayaran telah kami terima!</h4>
                <p>Silahkan tunggu dalam 1x24 jam dan kamu akan bisa menikmati kelas yang sudah dibeli!</p>
                <a href="{{ route('courses') }}" class="btn btn-primary btn-lg">Kembali ke halaman utama</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

  
  
@section('extra-script')
  
@endsection