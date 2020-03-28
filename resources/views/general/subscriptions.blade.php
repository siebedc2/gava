@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12 order-1">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="row mt-4">
                        <div class="col-6">
                            <a class="border rounded-pill btn btn-primary active" href="">courses</a>
                        </div>
                        <div class="col-6">
                            <a class="border rounded-pill btn btn-primary non-active" href="">creators</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9">
            @foreach($courses as $course)
                @if(in_array($course->user_id, $subscribersIds))
                    <p>{{ $course->title }}</p>              
                @endif
            @endforeach

            @foreach($creators as $creator)
                <p>{{ $creator->creator->name }}</p>
            @endforeach
        </div>
    </div>
</div>
@endsection