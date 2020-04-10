@extends('layouts.app')

@section('meta')
<title>Gava- Page not found</title>
@endsection

@section('content')
@include('components.menu')
<div class="container vh-90 d-flex justify-content-center align-items-center">
    <div class="pageWrapper">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="pageNotFoundTitle font-weight-bold">404</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p>Can't find this page.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <a href="/" class="rounded-pill btn btn-primary">Back to home</a>
            </div>
        </div>
    </div>
</div>
@endsection