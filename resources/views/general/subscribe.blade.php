@extends('layouts.app')

@section('content')
@include('components.menu')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form method="post">
                {{csrf_field()}}
                <div class="row mt-4">
                    <div class="col-4">
                        <a href="{{ url()->previous() }}">
                            <img src="/images/arrowBack.png" alt="Arrow back">
                        </a>
                    </div>
                </div>

                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center">
                                        <img src="/images/crownBig.png" alt="Crown">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12 text-center">
                                        <h2>Subscribe to <span class="username">{{ $user->name }}</span> for €8,00 *</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-4 col-md-12 d-flex justify-content-center">
                                        <img src="/images/lock.png" alt="Lock">
                                    </div>

                                    <div class="col-8 col-md-12 text-md-center mt-md-3 px-md-4">
                                        <p>Exclusive content <br> Learn from exclusive videos, only accessible to subscribed users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-4 col-md-12 d-flex justify-content-center">
                                        <img src="/images/crown.png" alt="Crown">
                                    </div>

                                    <div class="col-8 col-md-12 text-md-center mt-md-3 px-md-4">
                                        <p>Stand out <br> Special user-flair will make you more distinguishable from normal users</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="row">
                                    <div class="col-4 col-md-12 d-flex justify-content-center">
                                        <img src="/images/notifications.png" alt="Notifications">
                                    </div>

                                    <div class="col-8 col-md-12 text-md-center mt-md-3 px-md-4">
                                        <p>Get notified <br> Receive notifications when new content is published</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                                    <label class="form-check-label" for="defaultCheck1">I accept the <a href="">terms & conditions</a></label>
                                </div>
                            </div>
                        </div>

                        <div class="row my-4">
                            <div class="col-12 text-center">
                                <button class="rounded-pill px-5 btn btn-secondary" type="submit">complete subscription</button>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-8 text-center">
                                <p>* Subscriptions are €8 a month and renew automatically. You can cancel or edit your payment at any time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection