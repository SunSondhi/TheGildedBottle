@extends('layouts.app')
@include('layouts.nav')

@section('content')
<div class="container">
    <div class="card-body py-5 px-md-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-body py-5 px-md-5">
                    <div class="fw-bold mb-5">{{ __('Login') }}</div>

                    <div class="form-outline">
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
                                    <button class="button" type="submit">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                    <a class="button" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <p>or sign up with:</p>
                <a id="foot-link" class="nav-link fa fa-facebook" href="https://www.Facebook.com/" id="facebook-logo"></a>
                <a id="foot-link" class="nav-link fa fa-github" href="https://www.GitHub.com/" id="github-logo"></a>
                <a id="foot-link" class="nav-link fa fa-linkedin" href="https://www.Linkedin.com/" id="linkedin-logo"></a>
                <a id="foot-link" class="nav-link fa fa-twitter" href="https://www.Twitter.com/" id="twitter-logo"></a>
            </div>
        </div>
    </div>
</div>
@endsection