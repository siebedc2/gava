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
                <h1 class="page-not-found-title font-weight-bold">404</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p class="page-not-found-description font-weight-bold">Sorry! This page could not be found.</p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="/" class="rounded-pill px-4 btn btn-primary">return home</a>
            </div>
        </div>
    </div>
</div>
@endsection