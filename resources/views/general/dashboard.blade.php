    @extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12 order-1">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="row mt-4">
                        <div class="col-4">
                            <a class="border rounded-pill btn btn-primary active" href="">my courses</a>
                        </div>
                        <div class="col-4">
                            <a class="border rounded-pill btn btn-primary non-active" href="">my statistics</a>
                        </div>
                        <div class="col-4">
                            <a class="border rounded-pill btn btn-primary" href="/course/add">add course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            @foreach($courses as $course)
            <div class="row">
                <div class="col-4">
                    <p>{{ $course->title }}</p>
                </div>
                <div class="col-4 offset-4">
                    <a href="/course/edit/{{ $course->id }}">Edit</a>
                    <a href="">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection