@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="/profile/edit/change-password" method="post">
                {{csrf_field()}}
                <div class="row mt-4">               
                    <div class="col-4">
                        <a href="/profile/edit">
                            <img src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                    <div class="col-4 text-center">
                        <h2>Change password</h2>
                    </div>
                    <div class="col-4 text-right">
                        <button type="submit" class="rounded-pill px-5 btn btn-primary">save</button>
                    </div>
                </div>
                
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4 mt-4">
                        <div class="form-group">
                            <label class="d-none" for="currentPassword">Name</label>
                            <input name="currentPassword" type="password" class="w-100 rounded-pill border-0 bg-light form-control" id="currentPassword" placeholder="current password" required>
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="newPassword">Email address</label>
                            <input name="newPassword" type="password" class="w-100 rounded-pill border-0 bg-light form-control" id="newPassword" placeholder="new password" required>
                        </div>
                        <div class="form-group">
                            <label class="d-none" for="repeatNewPassword">Email address</label>
                            <input name="repeatNewPassword" type="password" class="w-100 rounded-pill border-0 bg-light form-control" id="repeatNewPassword" placeholder="repeat new password" required>
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
@endsection