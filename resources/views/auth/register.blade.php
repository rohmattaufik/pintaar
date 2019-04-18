@extends('auth.app')

@section('title')
    <title>Pintaar - Daftar</title>
@endsection

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Daftar Akun Baru</h3>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <input type="text" class="form-control {{ $errors->has('name') ? 'error' : '' }}" name="name" value="{{ old('name') }}" placeholder="Nama Lengkap" required autofocus>
            @if ($errors->has('name'))
                <span class="error">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <input type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
            @if ($errors->has('email'))
                <span class="error">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <input type="password" class="form-control {{ $errors->has('password') ? ' error' : '' }}" name="password" placeholder="Password" required>

            @if ($errors->has('password'))
                <span class="error">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password" required>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <button id="sign-up-button" type="submit" class="btn btn-primary btn-block"  onclick="trackLead()" >Daftar</button>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <p>atau</p>
        </div>
    </div>

    <div class="form-group row text-center social-btn">
            <div class="col-md-8 col-md-offset-2">
              <a href="{{route('social-login', 'facebook')}}" id="sign-up-button-fb" class="btn btn-primary btn-block" onclick="trackLead()" ><i class="fa fa-facebook"></i> Daftar dengan <b>Facebook</b></a>
            </div>
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <label>Sudah punya akun? <a href="{{ route('login') }}">Log in disini</a></label>
        </div>
    </div>

</form>



<script>
function trackLead() {

	   !function(f,b,e,v,n,t,s)
	  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
	  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
	  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
	  n.queue=[];t=b.createElement(e);t.async=!0;
	  t.src=v;s=b.getElementsByTagName(e)[0];
	  s.parentNode.insertBefore(t,s)}(window, document,'script',
	  'https://connect.facebook.net/en_US/fbevents.js');
	  fbq('init', '2163834067280375');

	  fbq('track', 'Lead');
}
</script>

@endsection
