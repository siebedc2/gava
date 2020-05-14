<?php 
    $subscriptionService = new App\Services\Subscription();
?>

@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row pt-4">
        <div class="col-3 col-md-4 d-flex align-items-center">
            <a href="/profile/edit/purchase-history">
                <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
            <h2 class="font-weight-normal mb-0">Purchase history</h2>
        </div>
    </div>

    <div class="row d-flex justify-content-center justify-content-md-start align-items-center mt-4">
        <div class="col-7 col-md-3">
            <div class="row d-flex align-items-center">
                <div class="col-4">
                    <div style="background-image: url(/images/uploads/{{$firstSubscription->creator->profile_picture}});" class="subscriber-image rounded-circle"></div>
                </div>
                <div class="col-8">
                    <p class="mb-0">{{$firstSubscription->creator->name}}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="row">
                <div class="col-6 col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1 text-black-50">start date</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{ date('Y-m-d', strtotime($firstSubscription->created_at)) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-12 mt-md-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1 text-black-50">status</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                        @if(in_array($firstSubscription->creator->id, $subscribersIds))
                            <p>active subscription</p>
                        @else
                            <p>inactive subscription</p>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-12 mt-md-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1 text-black-50">reference</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{ mt_rand(1000000000,9999999999) }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-12 mt-md-3">
                    <div class="row">
                        <div class="col-12">
                            <p class="mb-1 text-black-50">price</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>&euro;8,00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row d-none d-md-flex">
                <div class="col-md-2">
                    <p class="text-black-50">date</p>
                </div>
                <div class="col-md-3">
                    <p class="text-black-50">method</p>
                </div>
                <div class="col-md-2">
                    <p class="text-black-50">receiver</p>
                </div>
                <div class="col-md-2">
                    <p class="text-black-50">VAT number</p>
                </div>
                <div class="col-md-2">
                    <p class="text-black-50">VAT</p>
                </div>
                <div class="col-md-1">
                    <p class="text-black-50">total</p>
                </div>
            </div>
            <div class="row mt-3 d-md-none">
                <div class="col-12">
                    <p class="mb-1 text-black-50">transactions</p>
                </div>
            </div>

            @foreach($subscriptions as $subscription)
            @foreach($subscriptionService->getsubscribedMonths($subscription) as $month)
            <div class="row mt-3">
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-4 d-md-none">
                            <p class="mb-1">date</p>
                        </div>
                        <div class="col-8 col-md-12">
                            <p class="mb-1">{{ $month }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-4 d-md-none">
                            <p class="mb-1">method</p>
                        </div>
                        <div class="col-8 col-md-12">
                            <p class="mb-1">Mastercard</p>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-4 d-md-none">
                            <p class="mb-1">receiver</p>
                        </div>
                        <div class="col-8 col-md-12">
                            <p class="mb-1">Gava</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-4 d-md-none">
                            <p class="mb-1">VAT number</p>
                        </div>
                        <div class="col-8 col-md-12">
                            <p class="mb-1">SE{{mt_rand(1000000000,9999999999)}}</p>
                        </div>
                    </div>      
                </div>
                <div class="col-md-2">
                    <div class="row">
                        <div class="col-4 d-md-none">
                            <p class="mb-1">VAT</p>
                        </div>
                        <div class="col-8 col-md-12">
                            <p class="mb-1">&euro;1,73</p>
                        </div>
                    </div>     
                </div>
                <div class="col-md-1">
                    <div class="row">
                        <div class="col-4 d-md-none">
                            <p>total</p>
                        </div>
                        <div class="col-8 col-md-12">
                            <p>&euro;8,00</p>
                        </div>
                    </div>      
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</div>
@endsection