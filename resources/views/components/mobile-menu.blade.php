<div class="container-fluid d-block d-md-none mobile-menu fixed-bottom">
    <div class="row pt-3">
        <div class="col-12">
            <ul class="nav">
                <li class="nav-item text-center">
                    <img class="nav-icon" src="/images/mobile-home.svg" alt="Icon courses">
                    <a class="text-white link nav-link @if(\Request::route()->getName() == 'home') active @endif" href="/home">courses</a>
                </li>
                <li class="nav-item text-center">
                    <img class="nav-icon" src="/images/mobile-subscriptions.svg" alt="Icon subscriptions">
                    <a class="text-white link nav-link @if(\Request::route()->getName() == 'subscriptions') active @endif" href="/subscriptions">subscriptions</a>
                </li>
                <li class="nav-item text-center">
                    <img class="nav-icon" src="/images/mobile-dashboard.svg" alt="Icon dashboard">
                    <a class="text-white link nav-link @if(\Request::route()->getName() == 'dashboard') active @endif" href="/dashboard">dashboard</a>
                </li>
                <li class="nav-item text-center">
                    <img class="nav-icon" src="/images/mobile-profile.svg" alt="Icon profile">
                    <a class="text-white link nav-link @if(\Request::route()->getName() == 'profile') active @endif" href="/profile">profile</a>
                </li>
            </ul>
        </div>
    </div>
</div>

<!--<div class="container-fluid d-block d-md-none mobile-menu fixed-bottom rounded-top">
    <div class="row">
        <div class="col-3">
            <a href="/home">
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <img class="w-100" src="/images/mobile-home.svg" alt="Icon courses">
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-white">courses</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="/subscriptions">
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <img class="w-100" src="/images/mobile-subscriptions.svg" alt="Icon subscriptions">
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-white">subscriptions</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="/dashboard">
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <img class="w-100" src="/images/mobile-dashboard.svg" alt="Icon dashboard">
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-white">dashboard</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3">
            <a href="/profile">
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <img class="w-100" src="/images/mobile-profile.svg" alt="Icon profile">
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <p class="text-white">profile</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>-->