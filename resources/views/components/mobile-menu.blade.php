<div class="container-fluid d-block d-md-none mobile-menu fixed-bottom">
    <div class="row pt-3">
        <div class="col-12">
            <ul class="nav d-flex justify-content-between">
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