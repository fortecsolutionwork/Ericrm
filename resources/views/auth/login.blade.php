@extends('layouts.app')
@section('content')
<style>
    body {
        background: #fff !important;
    }

    .log-in-form {
        width: 40%;
        display: block;
        margin: 100px auto;
        border: 1px solid #000;
        padding: 50px;
        border-radius: 10px;
    }

    .log-in-form input {
        width: 100%;
        height: 40px;
    }

    .login-btn a {
        color: #fff;
    }

    .login-btn {
        background: #225ed8;
        color: #fff;
        border: none;
        width: 100%;
        height: 40px;
    }

    .form_links {
        margin-top: 20px;
        text-align: center;
    }

    @media screen and (max-width:767px) {
        .log-in-form {
            width: 100%;
            padding: 15px;
        }
    }
</style>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
<section class="log-in-form">
    <h2 class="mb-5">Log into Webzolution</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="fname">Email address</label><br>
        <input type="email" id="email" name="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus><br><br>
        @error('email')
            <strong>{{ $message }}</strong>
        @enderror
        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" class="@error('password') is-invalid @enderror" required autocomplete="current-password"><br><br>
        @error('password')
            <strong>{{ $message }}</strong>
        @enderror
        <button type="submit" class="login-btn">{{ __('Login') }}</button>
        <div class="form_links">
        @if (Route::has('password.request'))<a href="{{ route('password.request') }}" class="forgot-login">{{ __('Forgot Password?') }}</a>@endif| <a href="{{ route('register') }}" class="register-login">Register to start</a>
        </div>
    </form>
</section>
@endsection