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
                        <h2 class="font-weight-normal mb-0">Change password</h2>
                    </div>
                    <div class="col-3 col-md-4 text-right">
                        <button type="submit" class="rounded-pill px-md-5 btn btn-confirm">save</button>
                    </div>
                </div>
                
                <div class="row d-flex justify-content-center">
                    <div class="col-12 col-md-4 mt-4">
                        <div class="form-group">
                            <input name="currentPassword" type="password" class="
                                @if(session('errors'))
                                    @if(session('errors.type') == '1')
                                        border border-danger
                                    @else
                                        border-0
                                    @endif
                                @else
                                    border-0
                                @endif
                            
                             w-100 rounded-pill bg-light form-control" id="currentPassword" placeholder="current password" required>
                        </div>
                        <div class="form-group">
                            <input name="newPassword" type="password" class="
                                @if(session('errors'))
                                    @if(session('errors.type') == '2')
                                        border border-danger
                                    @else
                                        border-0
                                    @endif
                                @else
                                    border-0
                                @endif

                            w-100 rounded-pill bg-light form-control" id="newPassword" placeholder="new password" required>
                        </div>
                        <div class="form-group">
                            <input name="repeatNewPassword" type="password" class=" 
                                @if(session('errors'))
                                    @if(session('errors.type') == '2')
                                        border border-danger
                                    @else
                                        border-0
                                    @endif
                                @else
                                    border-0
                                @endif
                            
                            w-100 rounded-pill bg-light form-control" id="repeatNewPassword" placeholder="repeat new password" required>
                        </div>
                    </div>

                    @if(session('errors'))
                        <div class="col-12">
                            <div class="alert text-center">
                                <p class="text-danger">{{session('errors.message')}}</p>
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