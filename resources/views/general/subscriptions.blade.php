@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row d-flex flex-wrap-reverse">
        <div class="col-12 order-1">
            <div class="row d-flex justify-content-center">
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-6">
                            <a class="border rounded-pill" href="">courses</a>
                        </div>
                        <div class="col-6">
                            <a class="border rounded-pill" href="">creators</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9">
            
        </div>
    </div>
</div>
@endsection