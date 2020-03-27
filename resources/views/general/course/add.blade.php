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
            <form method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Email address</label>
                    <input name="title" type="text" class="rounded-pill form-control" id="title" placeholder="course title">
                </div>
                <div class="form-group">
                    <label for="description">Example textarea</label>
                    <textarea name="description" class="form-control" id="description" rows="3" placeholder="course description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="col-12 col-md-5 offset-md-2">
            <a href="" class="w-100 text-center rounded-pill btn btn-primary mb-2">add video</a>
        </div>
    </div>
</div>
@endsection