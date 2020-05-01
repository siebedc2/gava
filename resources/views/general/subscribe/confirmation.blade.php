@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="subcribe-confirmation row d-flex justify-content-center mt-4">
        <div class="col-12 col-md-10">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <img src="/images/crownBig.png" alt="Crown">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center">
                            <h2>The payment was successfully completed.</h2>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <a class="rounded-pill mt-3 px-5 btn btn-secondary" href="/subscriptions">start exploring</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection