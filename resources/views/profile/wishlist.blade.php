@php
$user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Css Styles (copied from profile/index) -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f8f9fa;
        }

        .profile-sidebar {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
        }

        .profile-sidebar .user-info {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile-sidebar .user-avatar {
            width: 60px;
            height: 60px;
            margin-bottom: 0.5rem;
        }

        .profile-sidebar .user-name {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .profile-sidebar .user-email {
            font-size: 0.95rem;
            color: #888;
        }

        .profile-nav {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .profile-nav li {
            margin-bottom: 0.5rem;
        }

        .profile-nav a {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            padding: 0.6rem 1rem;
            border-radius: 0.5rem;
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: background 0.15s, color 0.15s;
        }

        .profile-nav a.active,
        .profile-nav a:hover {
            background: #f0f4ff;
            color: #0d6efd;
        }

        .profile-nav a i {
            width: 20px;
            text-align: center;
        }

        .wishlist-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
            padding: 2.5rem 2rem 2rem 2rem;
            margin-bottom: 2rem;
        }

        .wishlist-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .wishlist-list .card {
            border-radius: 0.75rem;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04);
            margin-bottom: 1.2rem;
        }

        .wishlist-list .card .card-body {
            padding: 1.2rem 1.5rem;
        }

        .wishlist-list .card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .wishlist-list .card .card-text {
            color: #555;
        }

        .wishlist-list .btn {
            font-size: 0.95rem;
        }

        @media (max-width: 991px) {
            .profile-sidebar {
                margin-bottom: 1.5rem;
            }
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="mb-4 col-lg-3 mb-lg-0">
                <!-- Profile Sidebar -->
                <div class="profile-sidebar">
                    <div class="user-info">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0d6efd&color=fff&size=96" alt="Avatar" class="user-avatar rounded-circle">
                        <div class="user-name">{{ $user->name }}</div>
                        <div class="user-email">{{ $user->email }}</div>
                    </div>
                    <ul class="profile-nav">
                        <li><a href="{{ route('profile.index') }}" class="@if(request()->routeIs('profile.index')) active @endif"><i class="fas fa-user"></i> Overview</a></li>
                        <li><a href="{{ route('profile.edit') }}" class="@if(request()->routeIs('profile.edit')) active @endif"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
                        <li><a href="{{ route('profile.address') }}" class="@if(request()->routeIs('profile.address')) active @endif"><i class="fas fa-map-marker-alt"></i> Addresses</a></li>
                        <li><a href="{{ route('profile.orders') }}" class="@if(request()->routeIs('profile.orders')) active @endif"><i class="fas fa-shopping-bag"></i> Orders</a></li>
                        <li><a href="{{ route('profile.wishlist') }}" class="@if(request()->routeIs('profile.wishlist')) active @endif"><i class="fas fa-heart"></i> Wishlist</a></li>
                        <li><a href="{{ route('profile.reviews') }}" class="@if(request()->routeIs('profile.reviews')) active @endif"><i class="fas fa-star"></i> Reviews</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="wishlist-card">
                    <div class="wishlist-title">My Wishlist</div>
                    <!-- Example wishlist items, replace with dynamic data -->
                    <div class="wishlist-list">
                        <div class="mb-3 card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/60x60.png?text=Product" class="rounded me-3" style="width:60px;height:60px;object-fit:cover;" alt="Product Image">
                                    <div>
                                        <div class="mb-1 card-title">Wireless Headphones</div>
                                        <div class="card-text text-muted small">Rs. 2,500.00</div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 card">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="https://via.placeholder.com/60x60.png?text=Product" class="rounded me-3" style="width:60px;height:60px;object-fit:cover;" alt="Product Image">
                                    <div>
                                        <div class="mb-1 card-title">Smart Watch</div>
                                        <div class="card-text text-muted small">Rs. 4,800.00</div>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                    <a href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')

    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/notyf.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>