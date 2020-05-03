@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="" method="post">
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
                        <div class="form-group">
                            <label for="comment">How would you rate the content of this video?</label>
                            <div class="rating">
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <label for="comment">How would you rate the quality of this video?</label>
                            <div class="rating">
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
                                <span class="star"><i class="fa fa-star"></i></span>
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