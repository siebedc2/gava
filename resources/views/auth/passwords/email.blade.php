@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container vh-90">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="bg-transparent border-0 card">
                <div class="font-weight-bold text-center bg-transparent border-0 col-12 card-header">{{ __('Reset Password') }}</div>

                <div class="card-body mt-5">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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

                        <div class="form-group row mb-0 justify-content-center">
                            <div class="col-md-6">
                                <button type="submit" class="w-100 rounded-pill btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
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