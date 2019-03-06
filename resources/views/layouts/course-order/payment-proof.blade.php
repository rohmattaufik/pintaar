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
          <div class="panel panel-default">
            <div class="panel-heading text-center">
              <h4>Konfirmasi Pembayaran</h4>
            </div>
            <div class="panel-body"> 
              <form action="{{ route('store-payment-proof') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  
                  <input type="hidden" name="order_id" value="{{ $order->id }}">
                  <div class="form-group {{ !$errors->has('paymentProof') ?: 'has-error' }}">
                    <label for="paymentProof">Silahkan upload bukti pembayaran kamu!</label>
                    <input type="file" name="paymentProof" class="form-control-file" id="paymentProof" required>
                    <span class="help-block text-danger">{{ $errors->first('paymentProof') }}</span>  
                  </div>
                
                <button type="submit" class="btn btn-primary btn-lg">Kirim bukti pembayaran</button>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

  
  
@section('extra-script')
  
@endsection