@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6">
                    <a href="">subscribe</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <iframe width="100%" src="https://www.youtube.com/embed/YOdzjHDtPjQ" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
            <div class="video-information border-bottom text-white">
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Dit is een beschrijving</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p>Dit zijn tags</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <form action="">
                        <div class="form-group">
                            <label class="d-none" for="exampleFormControlInput1">Comment</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="add comment">
                        </div>
                        <button type="submit" class="rounded-pill btn btn-primary mb-2">verzenden</button>
                    </form>
                </div>
            </div>

            <div class="row text-white">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <p>Username</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Comment</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-12 col-md-5 offset-md-1">
            <a href="" class="row rounded bg-white">
                <div class="col-4">
                    <div class="row">
                        <div class="rounded col-12 video-image"></div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="row">
                        <div class="col-12">
                            <h3>Dit is een titel</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Dit is een creator</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Dit is een beschrijving</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>Dit zijn tags</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
@endsection