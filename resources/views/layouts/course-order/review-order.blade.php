@extends('template')

@section('title')
  <title>Pembayaran</title>
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
              <div class="col-md-6 col-md-offset-3">
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
              <div class="col-md-6 col-md-offset-3">
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
              <div class="col-md-6 col-md-offset-3">
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
        <div class="row text-center">
            <div class="col-md-4 col-md-offset-4">
              <a href="{{ route('payment-proof', $courseOrder->no_order) }}" class="btn btn-primary btn-lg">Upload Bukti Bayar</a>
            </div>
        </div>
          
      @else
         <div class="row text-center">
            <div class="col-md-6 col-md-offset-3">        
              <h3>Nomor Pesanan : {{ $courseOrder->no_order }}</h3>
              <h3><span class="label label-success">{{ $courseOrder->status }}</span></h3>
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

            <div class="alert alert-warning" role="alert">
              <h4>Butuh bantuan? Hubungi kami disini</h4>
              <a class="btn btn-success" href="https://wa.me/6282361888896">WhatsApp</a>
              <a class="btn btn-primary" href="https://www.facebook.com/Pintaar-722335064826744">Facebook</a>
            </div>             
          </div>
      </div>

    </div>
  </section>
@endsection

  
  
@section('extra-script')
  
@endsection

