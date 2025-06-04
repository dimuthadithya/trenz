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
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div class="mb-0 address-title">My Addresses</div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                            <i class="fas fa-plus me-1"></i> Add New Address
                        </button>
                    </div>

                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if($addresses->isEmpty())
                    <div class="py-5 text-center">
                        <i class="mb-3 fas fa-map-marker-alt fa-3x text-muted"></i>
                        <h5>No addresses found</h5>
                        <p class="text-muted">Add a new address to get started.</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                            Add New Address
                        </button>
                    </div>
                    @else
                    <div class="address-list">
                        @foreach($addresses as $address)
                        <div class="mb-3 card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="mb-1 card-title">
                                            {{ $address->fname }} {{ $address->lname }}
                                            @if($address->is_default)
                                            <span class="badge bg-primary">Default</span>
                                            @endif
                                        </div>
                                        <div class="card-text">{{ $address->address }}, {{ $address->city }}</div>
                                        <div class="card-text">{{ $address->country }}, {{ $address->zip_code }}</div>
                                        <div class="card-text text-muted small">Phone: {{ $address->phone_number }}</div>
                                        <div class="card-text text-muted small">Email: {{ $address->email }}</div>
                                    </div>
                                    <div class="text-end">
                                        <button type="button" class="btn btn-outline-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editAddressModal{{ $address->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        @if(!$address->is_default)
                                        <form action="{{ route('profile.address.delete', $address->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this address?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                        @if(!$address->is_default)
                                        <form action="{{ route('profile.address.default', $address->id) }}" method="POST" class="mt-2 d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-secondary btn-sm w-100">
                                                Set as Default
                                            </button>
                                        </form>
                                        @endif
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Address Modal for {{ $address->id }} -->
                        <div class="modal fade" id="editAddressModal{{ $address->id }}" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('profile.address.update', $address->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Address</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" name="fname" value="{{ $address->fname }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" name="lname" value="{{ $address->lname }}" required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Address</label>
                                                    <input type="text" class="form-control" name="address" value="{{ $address->address }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">City</label>
                                                    <input type="text" class="form-control" name="city" value="{{ $address->city }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Country</label>
                                                    <input type="text" class="form-control" name="country" value="{{ $address->country }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">ZIP Code</label>
                                                    <input type="text" class="form-control" name="zip_code" value="{{ $address->zip_code }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Phone Number</label>
                                                    <input type="tel" class="form-control" name="phone_number" value="{{ $address->phone_number }}" required>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" class="form-control" name="email" value="{{ $address->email }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Address Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('profile.address.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" name="fname" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="lname" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">ZIP Code</label>
                                <input type="text" class="form-control" name="zip_code" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" name="phone_number" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="defaultAddress" name="is_default">
                                    <label class="form-check-label" for="defaultAddress">Set as default address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Address</button>
                    </div>
                </form>
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