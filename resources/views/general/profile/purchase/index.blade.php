@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row pt-4">
        <div class="col-3 col-md-4 d-flex align-items-center">
            <a href="/profile/edit">
                <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
            <h2 class="font-weight-normal mb-0">Purchase history</h2>
        </div>
    </div>

    <div class="row mt-4 d-none d-md-flex">
        <div class="col-3">
            <p class="text-black-50">content creator</p>
        </div>
        <div class="col-2">
            <p class="text-black-50">data</p>
        </div>
        <div class="col-2">
            <p class="text-black-50">reference</p>
        </div>
        <div class="col-1">
            <p class="text-black-50">price</p>
        </div>
        <div class="col-2">
            <p class="text-black-50">valid until</p>
        </div>
    </div>

    @foreach($subscriptions->unique('creator_id') as $subscription)
    <div class="row mt-4 d-flex align-items-center">
        <div class="col-7 col-md-3">
            <div class="row d-flex align-items-center">
                <div class="col-4">
                    <div style="background-image: url(/images/uploads/{{$subscription->creator->profile_picture}});" class="subscriber-image rounded-circle"></div>
                </div>
                <div class="col-8">
                    <p class="mb-0">{{$subscription->creator->name}}</p>
                </div>
            </div>
        </div>
        <div class="col-2 d-none d-md-block">
            <p class="mb-0">{{ date('Y-m-d', strtotime($subscription->created_at)) }}</p>
        </div>
        <div class="col-2 d-none d-md-block">
            <p class="mb-0">{{ mt_rand(1000000000,9999999999) }}</p>
        </div>
        <div class="col-1 d-none d-md-block">
            <p class="mb-0"> &euro;8,00</p>
        </div>
        <div class="col-2 d-none d-md-block">
            <p class="mb-0">{{ date('Y-m-d', strtotime("+1 month", strtotime($subscription->created_at))) }}</p>
        </div>

        <div class="col-5 col-md-2 d-flex justify-content-end">
            <a class="rounded-pill btn btn-primary" href="/profile/edit/purchase-history/{{$subscription->creator_id}}">view details</a>
        </div>
    </div>
    @endforeach
</div>
@include('components.mobile-menu')
@endsection