     <!-- Page Preloder -->
     <div id="preloder">
         <div class="loader"></div>
     </div>

     <!-- Offcanvas Menu Begin -->
     <div class="offcanvas-menu-overlay"></div>
     <div class="offcanvas-menu-wrapper">
         <div class="offcanvas__close">+</div>
         <ul class="offcanvas__widget">
             <li><span class="icon_search search-switch"></span></li>
             <li>
                 <a href="#"><span class="icon_heart_alt"></span>
                     <div class="tip">2</div>
                 </a>
             </li>
             <li>
                 <a href="#"><span class="icon_bag_alt"></span>
                     <div class="tip">2</div>
                 </a>
             </li>
         </ul>
         <div class="offcanvas__logo">
             <a href="{{ route('home') }}">
                 <span>Trenz</span>
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
                     <div class="header__logo">
                         <a href="{{ route('home') }}">
                             <span class="brand_text text-dark h1">Trenz</span>
                         </a>
                     </div>
                 </div>
                 <div class="col-xl-6 col-lg-7">
                     <nav class="header__menu">
                         <ul>
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
                             <li class="{{Route::currentRouteName() == 'home' ? 'active' : '' }}}}">
                                 <a href="./shop.html">Shop</a>
                             </li>
                             <li>
                                 <a href="#">Pages</a>
                                 <ul class="dropdown">
                                     <li>
                                         <a href="./product-details.html">Product Details</a>
                                     </li>
                                     <li><a href="./shop-cart.html">Shop Cart</a></li>
                                     <li><a href="./checkout.html">Checkout</a></li>
                                     <li><a href="./blog-details.html">Blog Details</a></li>
                                 </ul>
                             </li>
                             <li><a href="./blog.html">Blog</a></li>
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
                                 <a href="#"><span class="icon_heart_alt"></span>
                                     <div class="tip">2</div>
                                 </a>
                             </li>
                             <li>
                                 <a href="#"><span class="icon_bag_alt"></span>
                                     <div class="tip">2</div>
                                 </a>
                             </li>
                             @auth
                             <li>
                                 <a href="{{ route('profile.edit') }}"><span class="fa-regular fa-user"></span>
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