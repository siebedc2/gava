@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post">
                {{csrf_field()}}
                <div class="row mt-4">               
                    <div class="col-4">
                        <a href="{{ url()->previous() }}">
                            <img src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <h2 class="font-weight-normal">Add a rating</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-5 btn btn-primary">save</button>
                    </div>
                </div>
                
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4 mt-4">
                        <div class="content-rating">
                            <label for="content">How would you rate the content of this video?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="content" id="content1star" value="1">
                                <label class="form-check-label" for="content1star"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="content" id="content2stars" value="2">
                                <label class="form-check-label" for="content2stars"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="content" id="content3stars" value="3">
                                <label class="form-check-label" for="content3stars"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="content" id="content4stars" value="4">
                                <label class="form-check-label" for="content4stars"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="content" id="content5stars" value="5">
                                <label class="form-check-label" for="content5stars"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                        </div>
                        
                        <div class="quality-rating mt-4">
                            <label for="quality">How would you rate the quality of this video?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quality" id="quality1star" value="1">
                                <label class="form-check-label" for="quality1star"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quality" id="quality2star" value="2">
                                <label class="form-check-label" for="quality2star"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quality" id="quality3star" value="3">
                                <label class="form-check-label" for="quality3star"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="quality" id="quality4star" value="4">
                                <label class="form-check-label" for="quality4star"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                            <div class="form-check">
                                <input class="d-none form-check-input" type="radio" name="quality" id="quality5star" value="5">
                                <label class="form-check-label" for="quality5star"><span class="star"><i class="fa fa-star"></i></span></label>
                            </div>
                        </div>

                        <div class="form-group mt-4">
                            <label for="comment">Can you give some feedback?</label>
                            <textarea name="comment" class="border-0 bg-light form-control" id="description" rows="3" placeholder="Type here..." required></textarea>
                        </div>
                    </div>

                    @if(session('errors'))
                        <div class="col-12">
                            <div class="alert text-center">
                                <p class="text-danger">{{session('errors.message')}}</p>
                            </div>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="col-12">
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection