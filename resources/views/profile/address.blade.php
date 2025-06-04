@php
$user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Addresses - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}" type="text/css" />
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

        .address-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
            padding: 2.5rem 2rem 2rem 2rem;
            margin-bottom: 2rem;
        }

        .address-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .address-list .card {
            border-radius: 0.75rem;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04);
            margin-bottom: 1.2rem;
        }

        .address-list .card .card-body {
            padding: 1.2rem 1.5rem;
        }

        .address-list .card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .address-list .card .card-text {
            color: #555;
        }

        .address-list .btn {
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
                <div class="address-card">
                    <div class="address-title">My Addresses</div>
                    <!-- Example address list, replace with dynamic addresses -->
                    <div class="address-list">
                        <div class="mb-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="mb-1 card-title">Home Address</div>
                                        <div class="card-text">123 Main Street, City, Country</div>
                                        <div class="card-text text-muted small">Phone: 0712345678</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="mb-1 card-title">Work Address</div>
                                        <div class="card-text">456 Office Park, City, Country</div>
                                        <div class="card-text text-muted small">Phone: 0776543210</div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-outline-primary btn-sm me-2"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="mt-3 btn btn-primary"><i class="fas fa-plus me-1"></i> Add New Address</a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>