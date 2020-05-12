@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <video class="w-100" id="player" playsinline controls data-poster="/path/to/poster.jpg">
                <source src="/images/uploads/video.mp4" type="video/mp4" />

                <!-- Captions are optional -->
                <!--<track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default />-->
            </video>
        </div>
    </div>
</div>
@endsection