@php
$user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - {{ config('app.name', 'Laravel') }}</title>
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

        .orders-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
            padding: 2.5rem 2rem 2rem 2rem;
            margin-bottom: 2rem;
        }

        .orders-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .order-list .card {
            border-radius: 0.75rem;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04);
            margin-bottom: 1.2rem;
        }

        .order-list .card .card-body {
            padding: 1.2rem 1.5rem;
        }

        .order-list .card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .order-list .card .card-text {
            color: #555;
        }

        .order-list .btn {
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
                <div class="orders-card">
                    <div class="orders-title">My Orders</div>
                    <!-- Search and filter bar -->
                    <div class="mb-4">
                        <form action="{{ route('profile.orders') }}" method="GET" class="row g-3">
                            <div class="col-md-4">
                                <select name="status" class="form-select">
                                    <option value="all" @if(request('status')=='all' ) selected @endif>All Orders</option>
                                    <option value="pending" @if(request('status')=='pending' ) selected @endif>Pending</option>
                                    <option value="processing" @if(request('status')=='processing' ) selected @endif>Processing</option>
                                    <option value="shipped" @if(request('status')=='shipped' ) selected @endif>Shipped</option>
                                    <option value="delivered" @if(request('status')=='delivered' ) selected @endif>Delivered</option>
                                    <option value="canceled" @if(request('status')=='canceled' ) selected @endif>Canceled</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search orders..." value="{{ request('search') }}">
                                    <button class="btn btn-outline-primary" type="submit">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Orders list -->
                    @if($orders->isEmpty())
                    <div class="py-5 text-center">
                        <i class="mb-3 fas fa-shopping-bag fa-3x text-muted"></i>
                        <h5>No orders found</h5>
                        <p class="text-muted">Start shopping to see your orders here.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary">Browse Products</a>
                    </div>
                    @else
                    <div class="order-list">
                        @foreach($orders as $order)
                        <div class="mb-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <div class="mb-1 card-title">
                                            Order #{{ $order->order_number }}
                                            @switch($order->status)
                                            @case('processing')
                                            <span class="badge bg-info">Processing</span>
                                            @break
                                            @case('shipped')
                                            <span class="badge bg-primary">Shipped</span>
                                            @break
                                            @case('delivered')
                                            <span class="badge bg-success">Delivered</span>
                                            @break @case('canceled')
                                            <span class="badge bg-danger">Canceled</span>
                                            @break
                                            @endswitch
                                        </div>
                                        <div class="card-text">Placed on: {{ $order->created_at->format('M d, Y') }}</div>
                                        <div class="card-text text-muted small">Total: Rs. {{ number_format($order->total_price, 2) }}</div>

                                        <!-- Order Items Preview -->
                                        <div class="mt-2">
                                            @foreach($order->orderItems->take(2) as $item)
                                            <div class="small text-muted">
                                                {{ $item->product->name }} × {{ $item->quantity }}
                                            </div>
                                            @endforeach
                                            @if($order->orderItems->count() > 2)
                                            <div class="small text-muted">
                                                and {{ $order->orderItems->count() - 2 }} more item(s)
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div>
                                        <a href="{{ route('order.show', $order->id) }}" class="btn btn-outline-primary btn-sm me-2">
                                            <i class="fas fa-eye"></i> View Details
                                        </a>
                                        @if($order->status === 'processing')
                                        <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to cancel this order?');">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-times"></i> Cancel Order
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4 d-flex justify-content-center">
                        {{ $orders->withQueryString()->links() }}
                    </div>
                    @endif
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