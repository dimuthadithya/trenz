@extends('layouts.app')

@section('content')
<div class="profile-container">
    <div class="profile-grid">
        <aside class="profile-sidebar">
            <div class="user-info">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-details">
                    <h4>{{ Auth::user()->name }}</h4>
                    <p>{{ Auth::user()->email }}</p>
                </div>
            </div>

            <nav>
                <div class="nav-section">
                    <h5>Account Settings</h5>
                    <ul class="nav-links">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="nav-link {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                                <i class="fas fa-user-edit"></i>
                                Edit Profile
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.address') }}" class="nav-link {{ request()->routeIs('profile.address') ? 'active' : '' }}">
                                <i class="fas fa-map-marker-alt"></i>
                                Addresses
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.payments') }}" class="nav-link {{ request()->routeIs('profile.payments') ? 'active' : '' }}">
                                <i class="fas fa-credit-card"></i>
                                Payment Methods
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="nav-section">
                    <h5>My Shopping</h5>
                    <ul class="nav-links">
                        <li>
                            <a href="{{ route('profile.orders') }}" class="nav-link {{ request()->routeIs('profile.orders') ? 'active' : '' }}">
                                <i class="fas fa-shopping-bag"></i>
                                Orders
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.cancellations') }}" class="nav-link {{ request()->routeIs('profile.cancellations') ? 'active' : '' }}">
                                <i class="fas fa-ban"></i>
                                Cancellations
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.reviews') }}" class="nav-link {{ request()->routeIs('profile.reviews') ? 'active' : '' }}">
                                <i class="fas fa-star"></i>
                                Reviews
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('profile.wishlist') }}" class="nav-link {{ request()->routeIs('profile.wishlist') ? 'active' : '' }}">
                                <i class="fas fa-heart"></i>
                                Wishlist
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>

        <main class="profile-content">
            <div class="welcome-section">
                <h1 class="h3 mb-4">Welcome, {{ Auth::user()->name }}!</h1>
                <p class="text-muted">Manage your account settings and view your shopping activity.</p>
            </div>

            <div class="quick-stats mt-5">
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-shopping-bag fa-2x text-primary"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="card-title mb-0">Total Orders</h6>
                                    </div>
                                </div>
                                <h3 class="mb-0">{{ $totalOrders }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-heart fa-2x text-danger"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="card-title mb-0">Wishlist Items</h6>
                                    </div>
                                </div>
                                <h3 class="mb-0">{{ $wishlistCount }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-star fa-2x text-warning"></i>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="card-title mb-0">Reviews Written</h6>
                                    </div>
                                </div>
                                <h3 class="mb-0">{{ $reviewsCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if($recentOrders->count() > 0)
            <div class="recent-orders mt-5">
                <h2 class="h4 mb-4">Recent Orders</h2>
                @foreach($recentOrders as $order)
                <x-order-card :order="$order" />
                @endforeach
                <div class="text-end mt-3">
                    <a href="{{ route('profile.orders') }}" class="btn btn-outline-primary">View All Orders</a>
                </div>
            </div>
            @endif
        </main>
    </div>
</div>

@push('styles')
<style>
    :root {
        --primary-color: #FF6A00;
        --gray-100: #f5f5f5;
        --gray-200: #e5e5e5;
        --gray-300: #d4d4d4;
        --gray-400: #a3a3a3;
        --gray-500: #737373;
        --gray-600: #525252;
        --gray-700: #404040;
        --gray-800: #262626;
    }

    .profile-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem 1rem;
    }

    .profile-grid {
        display: grid;
        grid-template-columns: 260px 1fr;
        gap: 2rem;
    }

    .profile-sidebar {
        position: sticky;
        top: 2rem;
        height: fit-content;
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        padding: 1.5rem;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--gray-200);
        margin-bottom: 1.5rem;
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: var(--gray-500);
    }

    .user-details h4 {
        font-size: 1rem;
        font-weight: 600;
        color: var(--gray-800);
        margin: 0;
    }

    .user-details p {
        font-size: 0.875rem;
        color: var(--gray-500);
        margin: 0;
    }

    .nav-section {
        margin-bottom: 1.5rem;
    }

    .nav-section h5 {
        font-size: 0.875rem;
        font-weight: 600;
        color: var(--gray-600);
        text-transform: uppercase;
        letter-spacing: 0.05em;
        margin-bottom: 0.75rem;
    }

    .nav-links {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .nav-links li {
        margin-bottom: 0.25rem;
    }

    .nav-links a {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.5rem 0.75rem;
        border-radius: 6px;
        color: var(--gray-600);
        text-decoration: none;
        transition: all 0.2s ease;
    }

    .nav-links a:hover {
        background: var(--gray-100);
        color: var(--primary-color);
    }

    .nav-links a.active {
        background: var(--primary-color);
        color: white;
    }

    .nav-links a i {
        width: 16px;
        text-align: center;
    }

    .profile-content {
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    @media (max-width: 991px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }

        .profile-sidebar {
            position: static;
            margin-bottom: 2rem;
        }
    }
</style>
@endpush
@endsection