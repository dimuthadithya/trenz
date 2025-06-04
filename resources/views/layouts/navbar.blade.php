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
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li>
            <a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">{{ $wishlistCount }}</div>
            </a>
        </li>
        <li>
            <a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">{{ $cartCount }}</div>
            </a>
        </li>
    </ul>
    <div class="offcanvas__logo">
        <a href="{{ route('home') }}">
            <img class="logo" src="{{ asset('assets/img/logo/logo.png') }}" alt="">
        </a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>
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
                        <li class="{{ Route::currentRouteName() == 'kid' ? 'active' : '' }}">
                            <a href="{{ route('kid') }}">Kid's</a>
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
                        @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li>
                            <a href="{{ route('wishlist.index') }}"><span class="icon_heart_alt"></span>
                                <div class="tip">
                                    @auth
                                    {{ $wishlistCount }}
                                    @else
                                    0
                                    @endauth
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('cart.index') }}"><span class="icon_bag_alt"></span>
                                <div class="tip">
                                    @auth
                                    {{ $cartCount }}
                                    @else
                                    0
                                    @endauth
                                </div>
                            </a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('profile.index') }}"><span class="fa-regular fa-user"></span>
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->