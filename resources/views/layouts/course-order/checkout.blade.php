@extends('template')

@section('title')
  <title>Pemesanan</title>
@endsection

@section('extra-style')
<style>
/* The radio-button */
.radio-button {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.radio-button input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.radio-button:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.radio-button input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.radio-button input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.radio-button .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
</style>
@endsection
<script>

function trackWebConversion($value) {
	trackGoogleAdWordWebConversion($value);
	trackFBWebConversion($value);
}

function trackGoogleAdWordWebConversion($value) {
	var callback = function () {
		if (typeof(url) != 'undefined') {
			window.location = url;

		};
		gtag('event', 'conversion', {
			'send_to': 'AW-810238926/rDzaCMnUupYBEM6HrYID',
			'value': $value,
			'currency': 'IDR',
			'transaction_id': '',
			'event_callback': callback
		});
		return false;
	}
}

function trackFBWebConversion($value) {

	fbq('track', 'Purchase', {
		value: $value,
		currency: 'IDR',
	});

}
</script>




@section('content')
  <section class="section-padding">
    <div class="container">
    
        <form role="form" action="{{ route('checkout-success') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="cart_id" value="{{ $cart->id }}">
          
          <div class="row">
            <div class="col-md-8">
              <h2>Mau bayar dengan apa?</h2>
              <div class="panel panel-default">
                
                <div class="panel-body">
                  
                  <div class="form-check">  
                    <label class="radio-button">Transfer Bank BNI
                      <input class="form-check-input" value="payment1" type="radio" checked="checked" name="payment_method" required>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="radio-button">Transfer Bank BCA
                      <input class="form-check-input" value="payment2" type="radio" name="payment_method" required>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="radio-button">Transfer OVO
                      <input class="form-check-input" value="payment3" type="radio" name="payment_method" required>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                  <div class="form-check">
                    <label class="radio-button">Transfer GO-PAY
                      <input class="form-check-input" value="payment4" type="radio" name="payment_method" required>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </div>
            </div>
          
            <div class="col-md-4">
              <h2>Pemesanan Kamu</h2>
              <div>
                <ul class="list-group list-group-flush">
                  <!-- <li class="list-group-item"><a href="#">Punya voucher? Masukkan disini!</a></li> -->
                  <li class="list-group-item">
                    <table style="width:100%">
                    
                      <tr>
                        <td><h4></h4></td>
                      </tr>  
                      <tr>
                        <td><h4>Total Harga</h4></td>
                        <td align="right"><h4>Rp {{ number_format($cart->total_price, 0, ',', '.') }}</h4></td>
                      </tr>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-primary btn-lg btn-block" onclick="trackWebConversion({{ $cart->total_price }})" >Bayar Sekarang</button>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </form>
      


    
    </div>
  </section>
<!-- /.page content -->
@endsection

  
  


@section('extra-script')
  
@endsection
