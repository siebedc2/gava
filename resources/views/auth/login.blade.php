@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container vh-90">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="bg-transparent border-0 card">
                <div class="font-weight-bold text-center bg-transparent border-0 col-12 card-header">{{ __('Login') }}</div>

                <div class="card-body mt-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <label for="email" class="d-none col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input placeholder="email" id="email" type="email" class="border-0 bg-light rounded-pill form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <label for="password" class="d-none col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input placeholder="password" id="password" type="password" class="border-0 bg-light rounded-pill form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-6">
                                <div class="form-check pl-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="w-100 rounded-pill btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col text-center">
                                <p>Don't have an account? <strong><a class="auth-link" href="/register">Register</a></strong></p>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col text-center">
                                @if (Route::has('password.request'))
                                    <a class="auth-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.mobile-menu')
@endsection