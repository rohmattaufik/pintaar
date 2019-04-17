@extends('auth.app')

@section('title')
    <title>Pintaar - Log In</title>
@endsection

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <h4>Sudah punya akun? Login disini</h4>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' error' : '' }}" name="password" placeholder="Password" required>
        </div>
    </div>

    @if ($errors->has('email') or $errors->has('password'))
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <span class="error" style="color:red;">
                <strong>Email atau password kamu tidak sesuai!</strong>
            </span>
        </div>
    </div>
    @endif

   <!--  <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                </label>
            </div>
        </div>
    </div> -->

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <button type="submit" class="btn btn-primary btn-block">
                Login
            </button>
            <br>
            <div class="text-center">atau</div>
        </div>
    </div>


    <div class="form-group row text-center social-btn">
        <div class="col-md-8 col-md-offset-2">
          <a href="{{route('social-login', 'facebook')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook"></i> Login dengan <b>Facebook</b></a>
        </div>
    </div>
    <hr>
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <label><a href="{{ route('password.request') }}">Lupa password?</a> Atau belum punya akun?</label>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <a href="{{route('register')}}" class="btn btn-danger btn-block">Daftar Disini</a>
        </div>
    </div>
</form>
@endsection
