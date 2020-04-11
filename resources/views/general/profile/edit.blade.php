@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="/profile/edit" method="post">
                {{csrf_field()}}
                <div class="row mt-4">               
                    <div class="col-4">
                        <a href="/profile">
                            <img src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <h2>Settings</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-5 btn btn-primary">save</button>
                    </div>
                </div>
                
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4">
                        <div class="form-group d-flex justify-content-center my-4">
                            <img class="w-25 rounded-circle" src="/images/uploads/{{Auth::user()->profile_picture}}" alt="Profile image">
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="name">Name</label>
                            <input name="name" type="text" class="w-100 rounded-pill border-0 bg-light form-control" id="name" value="{{ Auth::user()->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="email">Email address</label>
                            <input name="email" type="email" class="w-100 rounded-pill border-0 bg-light form-control" id="email" value="{{ Auth::user()->email }}" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">enable notifications</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-4">
            <div class="row mt-3">
                <div class="col-12">
                    <a class="w-100 rounded-pill btn btn-primary" href="/profile/edit/change-password">change password</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <a class="w-100 rounded-pill btn btn-primary" href="/profile/edit/payment-methods">payement methods</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">
                    <a class="w-100 rounded-pill btn btn-primary" href="/profile/edit/purchase-history">purchase history</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12 text-center">
                    <a class="text-danger" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">{{ csrf_field() }}</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection