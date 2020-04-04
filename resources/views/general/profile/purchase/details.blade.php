@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row mt-4">               
                <div class="col-4">
                    <a href="/profile/edit">
                        <img src="/images/arrowBack.png" alt="Arrow back">
                    </a>
                </div>
                <div class="col-4 text-center">
                    <h2>Purchase history</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection