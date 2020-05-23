@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row pt-4 header">
        <div class="col-3 col-md-4 d-flex align-items-center">
            <a href="{{ url()->previous() }}">
                <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
            <h2 class="font-weight-normal mb-0">Subscribers</h2>
        </div>
    </div>
    <div class="row">
        <div class="d-md-none col-12 mt-4 mt-md-0">
            

            @if(!empty($subscriptions)) 

            @foreach($subscriptions as $subscription)
            
            @if($subscription->user_id != Auth::id())
            
            @if($subscription['status'] == "online")
            <a href="/profile/{{ $subscription->user_id }}" class="text-decoration-none">
                <div class="row my-3 d-flex align-items-center">
                    <div class="col-2">
                        <div style="background-image: url(/images/uploads/{{$subscription->user->profile_picture}});" class="subscriber-image rounded-circle"></div>
                    </div>
                    <div class="col-10">
                        <p class="mb-0">{{ $subscription->user['name'] }}</p>
                    </div>
                </div>
            </a>
            @endif

            @else
            @if($subscription['status'] == "online")
            <div>
                <div class="row my-3 d-flex align-items-center">
                    <div class="col-2">
                        <div style="background-image: url(/images/uploads/{{$subscription->user->profile_picture}});" class="subscriber-image rounded-circle"></div>
                    </div>
                    <div class="col-10">
                        <p class="mb-0">{{ $subscription->user['name'] }}</p>
                    </div>
                </div>
            </div>
            @endif
            @endif
            @endforeach

            @else
            <p class="text-black-50">No subscribers yet</p>
            @endif
        </div>
    </div>
</div>
@include('components.mobile-menu')
@endsection