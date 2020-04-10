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
                            <span id="my-courses" class="border rounded-pill btn btn-primary active">my courses</span>
                        </div>
                        <div class="col-4">
                            <span id="my-statistics" class="border rounded-pill btn btn-primary non-active">my statistics</span>
                        </div>
                        <div class="col-4">
                            <a class="border rounded-pill btn btn-primary" href="/course/add">create new course</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   

<div class="container" id="myCoursesContainer">
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
      

<div id="myStatisticsContainer" class="container d-none">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <p>Views</p>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-12">

                </div>
            </div>
        </div>

        <div class="col-12 col-md-6">
            <div class="row">
                <div class="col-12">
                    <p>Revenue</p>
                </div>
            </div>
            <div class="row bg-light">
                <div class="col-12">

                </div>
            </div>
        </div>
    </div> 
    
    <div class="row">
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Subscribers</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>{{ $subscribersAmount }}</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Revenue</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $subscribersAmount * 8 }}
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Courses</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    {{ $coursesAmount }}
                </div>
            </div>
        </div>
        <div class="col-6 col-md-3 text-center bg-light rounded">
            <div class="row">
                <div class="col-12">
                    <p>Total Views</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12">
                    <p>Subscribers</p>
                </div>
            </div>

            <div class="row">
                @foreach($subscriptions as $subscription)
                <div class="col-12 col-md-6">
                    <a href="/profile/{{ $subscription->user_id }}">
                        <div class="row">
                            <div class="col-4">
                                <img src="" alt="">
                            </div>
                            <div class="col-8">
                                <p>{{ $subscription->user['name'] }}</p>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection