@extends('template')

@section('title')
  <title>Pembayaran</title>
@endsection

@section('extra-style')

@endsection


@section('content')
  <section class="section-padding">
    <div class="container">
      
      @if ($courseOrder->status_pembayaran != 2)
        <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">        
              <h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
              <h3><span class="label label-success">{{ $courseOrder->status }}</span></h3>
              <h4>Total Tagihan : Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h4>
              <h4>Metode Pembayaran : {{ $courseOrder->metode_pembayaran }}</h4>
              <h4>Bukti Pembayaran : <a href="{{ URL::asset($courseOrder->bukti_pembayaran) }}" target="_blank">Lihat Bukti Bayar</a></h4>
            </div>
        </div>
      @else
        <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">
                <h2>Pembayaran via Transfer Bank</h2>
                <h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
                <p>Silahkan transfer sebesar:</p>
                <h2>Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h2>
               <!--  <div class="alert alert-warning" role="alert">
                  <b>Penting!</b> Transfer sampai 3 digit terakhir agar memudahkan kami melakukan verifikasi. 
                </div> -->
                <p>ke rekening <b>12345678999</b> a/n <b>PT Indonesia Pintaar</b> pada Bank :</p>
            </div>
        </div>
        <div class="row text-center">
            <div class="col-md-4 col-md-offset-4">
              <div class="card">
                <img class="card-img-top" src="{{ asset('/images/mandiri.png') }}" alt="Card image cap">
                <div class="card-body">
                  <p class="card-title">Cab. UI Depok {{ $courseOrder->metode_pembayaran }}</p>
                </div>
              </div>
            
              <br>

              
              
              <a href="{{ route('payment-proof', $courseOrder->no_order) }}" class="btn btn-primary btn-lg">Sudah Bayar?</a>
              
            </div>
        </div>
      @endif
      <br>
      <div class="row">
          <div class="col-md-6 col-md-offset-3 text-center">
              
              
              <div>
              <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <h3>Kelas Yang Dibeli</h3>
                  </li>
                  @foreach($courses as $course)
                    <li class="list-group-item">
                      <table style="width:100%">
                        <tr>
                          <td width="70%" align="left">{{ $course->nama_course }}</td>
                          <td align="right">Rp {{ number_format($course->harga, 0, ',', '.') }}</td>
                        </tr>
                      </table>
                    </li>
                  @endforeach
              </ul>
            </div> 
             
             
          </div>
      </div>

    </div>
  </section>
@endsection

  
  
@section('extra-script')
  
@endsection

