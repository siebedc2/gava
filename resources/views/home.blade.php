<?php 
    $videoService = new App\Services\Video(); 
    $ratingService = new App\Services\Rating();
?>

@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container pb-5 mb-5">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12">
            <div class="row my-4 filter">
                <div class="col-12 d-md-none">
                    <span class="ml-2 filter-menu"><img class="filter-icon" src="/images/filter-icon.svg" alt="Filter icon"></span>
                </div>
                <div class="col-12 d-none d-md-block filter-container">
                    <form class="filter-form">
                        <div class="row mt-4 d-md-none">               
                            <div class="col-4 d-flex align-items-center">
                                <span class="close-filter">
                                    <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                                </span>                            
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-center">
                                <h2 class="font-weight-normal mb-0">Filters</h2>
                            </div>
                            <div class="col-4 text-right">
                                <span class="close-filter rounded-pill px-md-5 btn btn-confirm">apply</span>
                            </div>
                        </div>  
                        <div class="form-row mt-2 mt-md-0">
                            <div class="col-12 col-md-3 my-2 my-md-0 search-filter">
                                <input type="text" name="search" id="search" class="rounded-pill border-0 bg-light form-control" placeholder="Search">
                                <span><i class="fa fa-search"></i></span>
                            </div>
                            <div class="col-12 col-md-3 my-2 my-md-0">
                                <select name="tags" class="rounded-pill border-0 bg-light custom-select" id="tags">
                                    <option value="">Filter on technologies</option>
                                    @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-3 my-2 my-md-0">
                                <select name="sort" class="rounded-pill border-0 bg-light custom-select" id="sort">
                                    <option val="des">Sort</option>
                                    <option value="desc">New</option>
                                    <option value="asc">Old</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3 my-2 my-md-0">
                                <div class="form-control bg-light rounded-pill d-flex justify-content-between align-items-center rating-filter border-0">
                                    <p class="mb-0">Minimum rating</p>
                                    <div class="d-flex">
                                        <div class="form-check pl-0">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content1star" value="1">
                                            <label class="form-check-label" for="content1star"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content2stars" value="2">
                                            <label class="form-check-label" for="content2stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content3stars" value="3">
                                            <label class="form-check-label" for="content3stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content4stars" value="4">
                                            <label class="form-check-label" for="content4stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>  
                                        <div class="form-check pl-2">
                                            <input class="form-check-input star-input" type="radio" name="rating" id="content5stars" value="5">
                                            <label class="form-check-label" for="content5stars"><span class="star"><i class="fa fa-star"></i></span></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="courses-wrapper">
                @include('components.courses', ['search' => '', 'sort' => '', 'filterRating' => 0, 'courseTagId' => ''])
            </div>
        </div>
    </div>
</div>
@include('components.mobile-menu')
@endsection