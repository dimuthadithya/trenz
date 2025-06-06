@php
$user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
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

        .profile-hero {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
            padding: 2.5rem 2rem 2rem 2rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .profile-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 1rem;
        }

        .profile-name {
            font-size: 2rem;
            font-weight: 700;
        }

        .profile-email {
            color: #888;
            font-size: 1rem;
            margin-bottom: 0.5rem;
        }

        .profile-badge {
            font-size: 0.9rem;
        }

        .stat-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.2s;
        }

        .stat-card:hover {
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.10);
        }

        .stat-icon {
            font-size: 2.2rem;
            padding: 0.7rem;
            border-radius: 0.7rem;
            margin-bottom: 0.5rem;
        }

        .stat-orders {
            background: #e7f1ff;
            color: #0d6efd;
        }

        .stat-wishlist {
            background: #ffe7ec;
            color: #dc3545;
        }

        .stat-reviews {
            background: #fff8e1;
            color: #ffc107;
        }

        .recent-orders-card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
        }

        .recent-orders-title {
            font-weight: 700;
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
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0d6efd&color=fff&size=96"
                            alt="Avatar" class="user-avatar rounded-circle">
                        <div class="user-name">{{ $user->name }}</div>
                        <div class="user-email">{{ $user->email }}</div>
                    </div>
                    <ul class="profile-nav">
                        <li><a href="{{ route('profile.index') }}"
                                class="@if(request()->routeIs('profile.index')) active @endif"><i class="fas fa-user"></i>
                                Overview</a></li>
                        <li><a href="{{ route('profile.edit') }}"
                                class="@if(request()->routeIs('profile.edit')) active @endif"><i class="fas fa-user-edit"></i>
                                Edit Profile</a></li>
                        <li><a href="{{ route('profile.address') }}"
                                class="@if(request()->routeIs('profile.address')) active @endif"><i class="fas fa-map-marker-alt"></i>
                                Addresses</a></li>
                        <li><a href="{{ route('profile.orders') }}"
                                class="@if(request()->routeIs('profile.orders')) active @endif"><i class="fas fa-shopping-bag"></i>
                                Orders</a></li>
                        <li><a href="{{ route('profile.wishlist') }}"
                                class="@if(request()->routeIs('profile.wishlist')) active @endif"><i class="fas fa-heart"></i>
                                Wishlist</a></li>
                        <li><a href="{{ route('profile.reviews') }}"
                                class="@if(request()->routeIs('profile.reviews')) active @endif"><i class="fas fa-star"></i>
                                Reviews</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <!-- Profile Hero -->
                <div class="profile-hero">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0d6efd&color=fff&size=128"
                        alt="Avatar" class="profile-avatar">
                    <div class="profile-name">{{ $user->name }}</div>
                    <div class="profile-email">{{ $user->email }}</div>
                    <span class="bg-opacity-75 badge bg-primary profile-badge">Member</span>
                    <div class="mt-3">
                        <a href="{{ route('profile.edit') }}"
                            class="btn btn-outline-primary btn-sm"><i class="fas fa-user-edit me-1"></i> Edit Profile</a>
                    </div>
                </div>
                <!-- Stats -->
                <div class="mb-4 row g-4">
                    <div class="col-12 col-md-4">
                        <div class="py-3 text-center card stat-card">
                            <div class="mx-auto mb-2 stat-icon stat-orders"><i class="fas fa-shopping-bag"></i></div>
                            <div class="fw-bold text-uppercase small text-muted">Total Orders</div>
                            <div class="mb-1 fs-2 fw-bold">{{ $totalOrders }}</div>
                            <a href="{{ route('profile.orders') }}" class="link-primary small">View Orders</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="py-3 text-center card stat-card">
                            <div class="mx-auto mb-2 stat-icon stat-wishlist"><i class="fas fa-heart"></i></div>
                            <div class="fw-bold text-uppercase small text-muted">Wishlist Items</div>
                            <div class="mb-1 fs-2 fw-bold">{{ $wishlistCount }}</div>
                            <a href="{{ route('profile.wishlist') }}" class="link-danger small">View Wishlist</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="py-3 text-center card stat-card">
                            <div class="mx-auto mb-2 stat-icon stat-reviews"><i class="fas fa-star"></i></div>
                            <div class="fw-bold text-uppercase small text-muted">Reviews Written</div>
                            <div class="mb-1 fs-2 fw-bold">{{ $reviewsCount }}</div>
                            <a href="{{ route('profile.reviews') }}" class="link-warning small">View Reviews</a>
                        </div>
                    </div>
                </div>
                <!-- Recent Orders -->
                @if($recentOrders->count() > 0)
                <div class="card recent-orders-card">
                    <div class="py-3 bg-white border-0 card-header d-flex align-items-center justify-content-between">
                        <span class="recent-orders-title">Recent Orders</span>
                        <a href="{{ route('profile.orders') }}" class="px-3 btn btn-sm btn-primary rounded-pill">View All
                            Orders</a>
                    </div>
                    <div class="p-0 card-body">
                        <div class="list-group list-group-flush">
                            @foreach($recentOrders as $order)
                            <x-order-card :order="$order" />
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
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