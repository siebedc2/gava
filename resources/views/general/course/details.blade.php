@extends('layouts.app')

@section('meta')
    <title>Gava - {{ $course->title }}</title>
    <meta name="og:title" content="Gava - {{ $course->name }}">
@endsection

@section('content')
@include('components.menu')
<div class="container">
    <h1>Course {{ $course->title }}</h1>

    @foreach($videos as $video)
        <p>{{ $video->title }}</p>
    @endforeach
</div>
@endsection