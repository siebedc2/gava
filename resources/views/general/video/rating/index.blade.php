@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
            <a href="{{ url()->previous() }}">
                <img src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-4 text-center">
            <h2>Video ratings</h2>
        </div>
        <div class="col-4 text-right">
            <a class="rounded-pill px-5 btn btn-primary" href="{{Request::url()}}/add">add rating</a>
        </div>
    </div>

    @if($ratings->count() == 0)
    <div class="row">
        <div class="col-12 text-center">
            <p class="text-black-50">There are no ratings yet</p>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-md-2">
            
        </div>

        <div class="col-md-9 offset-md-1">
            
        </div>
    </div>
    @endif
</div>

@endsection