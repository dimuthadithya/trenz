@extends('layouts.profile')

@section('profile-content')
<!-- Welcome Section -->
<div class="welcome-section">
    <h1 class="h3 mb-4">Welcome, {{ Auth::user()->name }}!</h1>
    <p class="text-muted">Manage your account settings and view your shopping activity.</p>
</div>

<!-- Quick Stats -->
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

<!-- Recent Orders -->
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
@endsection