@extends('auth.app')

@section('title')
    <title>Pintaar - Daftar</title>
@endsection

@section('content')
<form role="form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Daftar Akun Baru</h2>
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
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <label>Sudah punya akun? <a href="{{ route('login') }}">Log in disini</a></label>
        </div>
    </div>

</form>
@endsection
