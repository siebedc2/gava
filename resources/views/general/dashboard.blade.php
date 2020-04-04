    @extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12 order-1">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
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
                    <a class="rounded-pill px-5 btn btn-primary" href="/course/edit/{{ $course->id }}">Edit</a>
                    <form action="/course/delete/{{ $course->id }}" method="post">
                        {{csrf_field()}}
                        <button class="rounded-pill px-5 btn btn-primary" type="submit">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection