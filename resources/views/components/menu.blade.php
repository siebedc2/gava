<div class="w-100 menu">
<div class="container pt-3 pb-3 d-none d-md-block">
    <div class="row d-flex justify-content-center">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <a href="/home">
                        <img class="logo-gava mt-1" src="/images/logo.svg" alt="Logo Gava">
                    </a>
                </div>

                @if(Route::getCurrentRoute() != null )
                <div class="col-6 d-flex justify-content-end">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="text-white link nav-link @if(\Request::route()->getName() == 'home') active @endif" href="/home">courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white link nav-link @if(\Request::route()->getName() == 'subscriptions') active @endif" href="/subscriptions">subscriptions</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white link nav-link @if(\Request::route()->getName() == 'dashboard') active @endif" href="/dashboard">dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white link nav-link @if(\Request::route()->getName() == 'profile') active @endif" href="/profile">profile</a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
</div>