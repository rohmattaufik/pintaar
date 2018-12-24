@extends('auth.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<form role="form" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Lupa Password</h2>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? 'error' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
            @if ($errors->has('email'))
                <span class="error">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <div class="col-md-8 col-md-offset-2">
            <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </div>
    </div>
    
</form>
@endsection
