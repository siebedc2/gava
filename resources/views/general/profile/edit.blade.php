@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-10">
            <form>
                <div class="row">               
                    <div class="col-4">

                    </div>
                    <div class="col-4">

                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="">change password</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="">change profile picture</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="">edit banner color</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-primary" href="">payement methods</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a class="text-danger" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">{{ csrf_field() }}</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection