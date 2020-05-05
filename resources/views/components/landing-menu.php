<div class="container-fluid py-4 menu">
    <div class="row d-flex justify-content-center">
        <div class="col-10">
            <div class="row">
                <div class="col-6">
                    <a href="/">
                        <img class="mt-1" src="/images/logo.png" alt="Logo Gava">
                    </a>
                </div>

                
                <div class="col-6">
                    <div class="row d-flex justify-content-end">
                        <div class="col-6 d-none d-md-block">
                            <div class="d-flex justify-content-between">
                                <a class="text-decoration-none text-white link d-block" href="#what-to-learn">learning</a>
                                <a class="text-decoration-none text-white link d-block" href="#about">about</a>
                                <a class="text-decoration-none text-white link link-primary rounded-pill d-block px-4 text-center" href="/login">sign in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
    <div class="row vh-10 d-flex align-items-center">
    <div class="col-12">
        <div class="row align-items-center">
            <div class="col-6 justify-items-start align-items-center">
                @if(Route::currentRouteName() != 'home')
                <a href="/">
                    <img class="logo" src="/images/logo.svg" alt="Fluogeel logo">
                </a>
                @endif
            </div>

            <div class="col-6 d-flex justify-content-end align-items-center">
                
                @if(Route::getCurrentRoute() != null )
                @if(Route::getCurrentRoute()->getPrefix() != '/bestelling')
                <div class="cart-little-wrapper">
                    @include('cart.cart-little')
                </div>
                @endif
                @endif

                <div class="menu">
                    <div class="line line1"></div>
                    <div class="line line2"></div>
                    <div class="line line3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="buttonsContainer">
    <div class="buttons">
        <div class="{{ (Route::currentRouteName() == 'home') ? 'active' : '' }}">
            <a class="option font-size-40 text-uppercase d-block" href="/">Home</a>
        </div>
                
        <div class="{{ (Route::currentRouteName() == 'shop' ||  Route::currentRouteName() == 'product') ? 'active' : '' }}">
            <a class="option font-size-40 mt-3 text-uppercase d-block" href="/shop"><span class="color-yellow">-</span>  The shop <span class="color-yellow">-</span></a>
        </div>
        <div class="{{ (Route::currentRouteName() == 'cart') ? 'active' : '' }}">
            <a class="option font-size-40 mt-3 text-uppercase d-block" href="/bestelling/winkelmandje">Winkelmandje</a>
        </div>
        <div class="{{ (Route::currentRouteName() == 'contact') ? 'active' : '' }}">
            <a class="option font-size-40 mt-3 text-uppercase d-block" href="/contact">Contact</a>
        </div>
        @guest
            <div class="{{ (Route::currentRouteName() == 'login') ? 'active' : '' }}">
                <a class="option font-size-40 mt-3 text-uppercase d-block" href="/login">Inloggen</a>
            </div>
        @endguest

        @auth
            @if(Auth::user()->role == "member")
                <div>
                    <a class="option font-size-40 mt-3 text-uppercase d-block" href="/account/info">Mijn account</a>
                </div>
            @elseif(Auth::user()->role == "admin")
                <div>
                    <a class="option font-size-40 mt-3 text-uppercase d-block" href="/dashboard/home">Mijn account</a>
                </div>
            @endif
        @endauth
    </div>
</div>
-->