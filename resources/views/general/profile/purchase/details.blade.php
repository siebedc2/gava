@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row mt-4">
        <div class="col-4">
            <a href="/profile/edit/purchase-history">
                <img src="/images/arrowBack.png" alt="Arrow back">
            </a>
        </div>
        <div class="col-4 text-center">
            <h2>Purchase history</h2>
        </div>
    </div>

    <div class="row d-flex align-items-center">
        <div class="col-1">
            <img class="w-100 rounded-circle" src="/images/uploads/{{$subscription->creator->profile_picture}}" alt="Profile picture">
        </div>
        <div class="col-11">
            <p>{{$subscription->creator->name}}</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-black-50">start date</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>{{ date('Y-m-d', strtotime($subscription->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-black-50">status</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>active subscription</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <p class="text-black-50">reference</p>
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
                            <p class="text-black-50">price</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p>&euro;8</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="row">
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
            <div class="row">
                <div class="col-md-2">
                    <p>{{ date('Y-m-d', strtotime($subscription->created_at)) }}</p>
                </div>
                <div class="col-md-3">
                    <p>method</p>
                </div>
                <div class="col-md-2">
                    <p>Gava</p>
                </div>
                <div class="col-md-2">
                    <p>VAT number</p>
                </div>
                <div class="col-md-2">
                    <p>VAT</p>
                </div>
                <div class="col-md-1">
                    <p>&euro;8</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection