@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="/profile/edit/change-password" method="post">
                {{csrf_field()}}
                <div class="row mt-4">               
                    <div class="col-3 col-md-4 d-flex align-items-center">
                        <a href="/profile/edit">
                            <img class="arrow-icon" src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-6 col-md-4 d-flex align-items-center justify-content-center">
                        <h2 class="font-weight-normal mb-0">Payment methods</h2>
                    </div>
                    <div class="col-3 col-md-4 text-right">
                        <button type="submit" class="rounded-pill px-md-5 btn btn-confirm">save</button>
                    </div>
                </div>
                
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4 mt-4">
                        <div class="form-group">
                            <select class="rounded-pill border-0 bg-light custom-select" id="validationCustom04">
                                <option value="">Mastercard</option>
                                <option value=""></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="currentPassword">Name</label>
                            <input name="currentPassword" type="text" class="w-100 rounded-pill border-0 bg-light form-control" id="currentPassword" placeholder="cardholder name" required>
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="newPassword">Email address</label>
                            <input name="newPassword" type="text" class="w-100 rounded-pill border-0 bg-light form-control" id="newPassword" placeholder="card number" required>
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="repeatNewPassword">Email address</label>
                            <input name="repeatNewPassword" type="text" class="w-100 rounded-pill border-0 bg-light form-control" id="repeatNewPassword" placeholder="date" required>
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="repeatNewPassword">Email address</label>
                            <input name="repeatNewPassword" type="text" class="w-100 rounded-pill border-0 bg-light form-control" id="repeatNewPassword" placeholder="cvv" required>
                        </div>
                    </div>

                    @if(session('errors'))
                        <div class="col-12">
                            <div class="alert alert-danger text-center">
                                <ul>
                                    <li>{{session('errors')}}</li>
                                </ul>
                            </div>
                        </div>
                    @endif

                    
                    @if (session('status'))
                        <div class="col-12">
                            <div class="alert alert-success text-center">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@include('components.mobile-menu')
@endsection