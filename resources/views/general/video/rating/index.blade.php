@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row mt-4">
        <div class="col-3 col-md-4 d-flex align-items-center">
            <a href="{{ url()->previous() }}">
                <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
            <h2 class="font-weight-normal mb-0">Video ratings</h2>
        </div>
        <div class="col-3 col-md-4 text-right">
            <a class="rounded-pill px-md-5 btn btn-confirm" href="{{Request::url()}}/add">add rating</a>
        </div>
    </div>

    @if($ratings->count() == 0)
    <div class="row mt-4">
        <div class="col-12 text-center">
            <p class="text-black-50">There are no ratings yet</p>
        </div>
    </div>
    @else
    <div class="row mt-4">
        <div class="col-md-2 d-none d-md-block">
            <div class="row mb-4">
                <div class="col-8">
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                </div>
                <div class="col-4">
                    <p class="mb-0">{{$ratings->where('stars', 5)->count()}}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8">
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                </div>
                <div class="col-4">
                    <p class="mb-0">{{$ratings->where('stars', 4)->count()}}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8">
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                </div>
                <div class="col-4">
                    <p class="mb-0">{{$ratings->where('stars', 3)->count()}}</p>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-8">
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                </div>
                <div class="col-4">
                    <p class="mb-0">{{$ratings->where('stars', 2)->count()}}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <span class="star star-checked"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                    <span class="star"><i class="fa fa-star"></i></span>
                </div>
                <div class="col-4">
                    <p class="mb-0">{{$ratings->where('stars', 1)->count()}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-7 offset-md-1">
            @foreach($ratings as $rating)
            <div class="rating pb-2 mb-3 border-bottom">
                <div class="row mb-3">
                    <div class="col-12 d-flex align-items-center">
                        <p class="mb-0">{{$rating->user->name}}</p>
                        <span class="report-user ml-2 mb-1"><img class="report-icon" src="/images/report.svg" alt="Report icon"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>{{$rating->comment}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-md-4 d-flex">
                        <p class="mr-2">content</p>
                        <div class="rating">
                            @for ($i = $rating->stars; $i >= 1; $i--)
                                <span class="star star-checked"><i class="fa fa-star"></i></span>
                            @endfor
                            @for ($i = $rating->stars; $i <= 4; $i++) 
                                <span class="star"><i class="fa fa-star"></i></span>
                            @endfor
                        </div>
                    </div>
                    <div class="col-6 col-md-4 d-flex">
                        <p class="mr-2">quality</p>
                        <div class="rating">
                            @for ($i = $rating->quality; $i >= 1; $i--)
                                <span class="star star-checked"><i class="fa fa-star"></i></span>
                            @endfor
                            @for ($i = $rating->quality; $i <= 4; $i++) 
                                <span class="star"><i class="fa fa-star"></i></span>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@endsection