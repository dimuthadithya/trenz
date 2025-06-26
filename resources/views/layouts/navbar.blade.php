@php
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Wishlist;

$cartCount = Cart::where('user_id', Auth::id())->count();
$wishlistCount = Wishlist::where('user_id', Auth::id())->count();
@endphp




<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <div class="offcanvas__logo">
        <a href="{{ route('home') }}">
            <img class="logo" src="{{ asset('assets/img/logo/logo.png') }}" alt="">
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class=" header__logo">
                    <a href="{{ route('home') }}">
                        <img class="logo" src="{{ asset('assets/img/logo/logo.png') }}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul class="d-flex justify-content-center">
                        <li class="{{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            <a href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'women' ? 'active' : '' }}">
                            <a href="{{ route('women') }}">Women's</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'men' ? 'active' : '' }}">
                            <a href="{{ route('men') }}">Men's</a>
                        </li>
                        <li><a href="./contact.html">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @auth
                        <a href="{{ route('logout') }}">Logout</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->