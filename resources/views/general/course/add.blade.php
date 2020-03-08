@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <p>Add course</p>
        </div>
        <div class="col-4">
        
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-5">
            <form>
                <div class="form-group">
                    <label class="d-none" for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="rounded-pill form-control" id="exampleFormControlInput1" placeholder="course title">
                </div>
                <div class="form-group">
                    <label class="d-none" for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class=" form-control" id="exampleFormControlTextarea1" rows="3" placeholder="course description"></textarea>
                </div>
            </form>
        </div>

        <div class="col-12 col-md-5 offset-md-2">
            <a href="" class="w-100 text-center rounded-pill btn btn-primary mb-2">add video</a>
        </div>
    </div>
</div>
@endsection