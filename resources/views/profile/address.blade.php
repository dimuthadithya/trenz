<x-app-layout>
    @push('styles')
    <style>
        :root {
            --daraz-orange: #FF6A00;
            --light-gray: #f5f5f5;
            --dark-gray: #757575;
        }

        body {
            background-color: #F0F0F0;
            font-family: Arial, sans-serif;
        }

        .account-container {
            background-color: white;
            border-radius: 3px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
            margin-bottom: 20px;
        }

        .account-sidebar {
            background-color: white;
            padding: 15px;
            margin-right: 10px;
        }

        .account-sidebar h5 {
            color: #424242;
            font-size: 1rem;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-menu li {
            padding: 3px 0;
            color: #757575;
            font-size: 0.9rem;
        }

        .sidebar-menu .active {
            color: var(--daraz-orange);
            font-weight: 500;
        }

        .address-container {
            background-color: white;
            padding: 20px;
            border-radius: 3px;
        }

        .address-card {
            border: 1px solid #e0e0e0;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 3px;
        }

        .address-type {
            font-weight: 600;
            color: #424242;
            margin-bottom: 10px;
        }

        .address-details {
            color: #757575;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .address-actions {
            margin-top: 10px;
        }

        .address-actions .btn {
            font-size: 0.85rem;
            padding: 5px 10px;
            margin-right: 10px;
        }

        .add-address-card {
            border: 2px dashed #e0e0e0;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .add-address-card:hover {
            border-color: var(--daraz-orange);
            color: var(--daraz-orange);
        }
    </style>
    @endpush

    <div class="container mt-4 mb-5">
        <div class="row">
            <!-- Left sidebar -->
            <div class="col-md-3">
                <div class="account-sidebar">
                    <div class="pb-2">Hello, {{ auth()->user()->name }}</div>

                    <h5 class="mt-3">Manage My Account</h5>
                    <ul class="sidebar-menu ms-3">
                        <li class="{{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }}">
                            <a href="{{ route('profile.edit') }}">My Profile</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'profile.address' ? 'active' : '' }}">
                            <a href="{{ route('profile.address') }}">Address Book</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'profile.payments' ? 'active' : '' }}">
                            <a href="{{ route('profile.payments') }}">My Payment Options</a>
                        </li>
                    </ul>

                    <h5 class="mt-3">My Orders</h5>
                    <ul class="sidebar-menu ms-3">
                        <li class="{{ Route::currentRouteName() == 'profile.orders' ? 'active' : '' }}">
                            <a href="{{ route('profile.orders') }}">My Orders</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'profile.returns' ? 'active' : '' }}">
                            <a href="{{ route('profile.returns') }}">My Returns</a>
                        </li>
                        <li class="{{ Route::currentRouteName() == 'profile.cancellations' ? 'active' : '' }}">
                            <a href="{{ route('profile.cancellations') }}">My Cancellations</a>
                        </li>
                    </ul>

                    <h5 class="mt-3">My Reviews</h5>
                    <ul class="sidebar-menu ms-3">
                        <li class="{{ Route::currentRouteName() == 'profile.reviews' ? 'active' : '' }}">
                            <a href="{{ route('profile.reviews') }}">Reviews</a>
                        </li>
                    </ul>

                    <h5 class="mt-3">My Wishlist & Followed Stores</h5>
                    <ul class="sidebar-menu ms-3">
                        <li class="{{ Route::currentRouteName() == 'profile.wishlist' ? 'active' : '' }}">
                            <a href="{{ route('profile.wishlist') }}">My Wishlist</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main content area -->
            <div class="col-md-9">
                <div class="address-container">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <h4 class="m-0">My Addresses</h4>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                            <i class="fas fa-plus"></i> Add New Address
                        </button>
                    </div>

                    <!-- Address Cards -->
                    <div class="row">
                        @forelse($addresses ?? [] as $address)
                        <div class="mb-3 col-md-6">
                            <div class="address-card">
                                <div class="address-type">
                                    {{ $address->type }}
                                    @if($address->is_default)
                                    <span class="badge bg-primary ms-2">Default</span>
                                    @endif
                                </div>
                                <div class="address-details">
                                    <p>{{ $address->full_name }}</p>
                                    <p>{{ $address->address_line1 }}<br>{{ $address->address_line2 }}</p>
                                    <p>{{ $address->city }}, {{ $address->state }} {{ $address->postal_code }}</p>
                                    <p>{{ $address->country }}</p>
                                    <p>Phone: {{ $address->phone }}</p>
                                </div>
                                <div class="address-actions">
                                    <button class="btn btn-outline-primary btn-sm">Edit</button>
                                    <button class="btn btn-outline-danger btn-sm">Delete</button>
                                    @if(!$address->is_default)
                                    <button class="btn btn-outline-secondary btn-sm">Set as Default</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="mb-3 col-md-6">
                            <div class="add-address-card" data-bs-toggle="modal" data-bs-target="#addAddressModal">
                                <i class="mb-2 fas fa-plus-circle fa-2x"></i>
                                <h5>Add New Address</h5>
                                <p class="mb-0 text-muted">Add your first delivery address</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Address Modal -->
    <div class="modal fade" id="addAddressModal" tabindex="-1" aria-labelledby="addAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addAddressModalLabel">Add New Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.address.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="fullName" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullName" name="full_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label for="address1" class="form-label">Address Line 1</label>
                            <input type="text" class="form-control" id="address1" name="address_line1" required>
                        </div>
                        <div class="mb-3">
                            <label for="address2" class="form-label">Address Line 2 (Optional)</label>
                            <input type="text" class="form-control" id="address2" name="address_line2">
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="city" class="form-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="state" class="form-label">State/Province</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="postalCode" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postalCode" name="postal_code" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="country" class="form-label">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="addressType" class="form-label">Address Type</label>
                            <select class="form-select" id="addressType" name="type" required>
                                <option value="home">Home</option>
                                <option value="work">Work</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="defaultAddress" name="is_default">
                            <label class="form-check-label" for="defaultAddress">Set as default address</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Address</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>