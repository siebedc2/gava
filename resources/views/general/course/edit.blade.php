@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-4">

        </div>
        <div class="col-4">
            <p>Add video</p>
        </div>
        <div class="col-4">

        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-md-5">
            <form enctype="multipart/form-data" method="post">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Email address</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ $course->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Example textarea</label>
                    <textarea name="description"  class="form-control" id="description" rows="3">{{ $course->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection