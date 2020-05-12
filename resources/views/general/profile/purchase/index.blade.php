@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row mt-4">
        <div class="col-3 col-md-4 d-flex align-items-center">
            <a href="/profile/edit">
                <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
            <h2 class="font-weight-normal mb-0">Purchase history</h2>
        </div>
    </div>

    <div class="row mt-4 d-none d-md-block">
        <div class="col-2">
            <p class="text-black-50">content creator</p>
        </div>
        <div class="col-2">
            <p class="text-black-50">data</p>
        </div>
        <div class="col-2">
            <p class="text-black-50">reference</p>
        </div>
        <div class="col-2">
            <p class="text-black-50">price</p>
        </div>
        <div class="col-2">
            <p class="text-black-50">valid until</p>
        </div>
        <div class="col-2">

        </div>
    </div>

    @foreach($subscriptions as $subscription)
    <div class="row mt-4 mt-md-0">
        <div class="col-6 col-md-2">
            <div class="row">
                <div class="col-4">
                    <img class="w-100 rounded-circle" src="/images/uploads/{{$subscription->user->profile_picture}}" alt="Profile picture">
                </div>
                <div class="col-8">
                    <a href="">{{$subscription->user->name}}</a>
                </div>
            </div>
        </div>
        <div class="col-2 d-none d-md-block">
            <p>{{ date('Y-m-d', strtotime($subscription->created_at)) }}</p>
        </div>
        <div class="col-2 d-none d-md-block">

        </div>
        <div class="col-2 d-none d-md-block">
            <p> &euro;8 </p>
        </div>
        <div class="col-2 d-none d-md-block">
            <p>{{ date('Y-m-d', strtotime("+1 month", strtotime($subscription->created_at))) }}</p>
        </div>

        <div class="col-6 col-md-2 d-flex justify-content-end">
            <a class="rounded-pill btn btn-primary" href="/profile/edit/purchase-history/{{$subscription->id}}">view details</a>
        </div>
    </div>
    @endforeach
</div>
@endsection