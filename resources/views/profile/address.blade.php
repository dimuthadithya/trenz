@extends('layouts.profile')

@section('profile-content')
<div class="address-container">
    <h2 class="mb-4">My Addresses</h2>

    <!-- Existing Addresses -->
    @forelse($addresses as $address)
    <div class="address-card">
        <div class="address-type">
            <span>{{ $address->type ?? 'Shipping Address' }}</span>
        </div>
        <div class="address-details">
            <p class="mb-1"><strong>{{ $address->fname }} {{ $address->lname }}</strong></p>
            <p class="mb-1">{{ $address->address }}</p>
            <p class="mb-1">{{ $address->city }}, {{ $address->country }} {{ $address->zip_code }}</p>
            <p class="mb-0">Phone: {{ $address->phone_number }}</p>
        </div>
        <div class="address-actions">
            <button class="btn btn-sm btn-outline-primary">Edit</button>
            <form action="#" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
            </form>
        </div>
    </div>
    @empty
    <div class="py-4 text-center">
        <p class="text-muted">No addresses added yet.</p>
    </div>
    @endforelse

    <!-- Add New Address Button -->
    <div class="mt-4 add-address-card">
        <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#addAddressModal">
            <i class="fas fa-plus me-2"></i>Add New Address
        </button>
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
            <form action="{{ route('profile.address.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="fname" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="fname" name="fname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="lname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" required>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" required>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="col-md-6">
                            <label for="zip_code" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                        </div>
                        <div class="col-12">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="country" name="country" required>
                        </div>
                        <div class="col-12">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone_number" name="phone_number" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('styles')
<style>
    .address-container {
        background-color: white;
        padding: 24px;
        border-radius: 8px;
    }

    .address-card {
        border: 1px solid var(--gray-200);
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 3px;
        background: white;
        transition: box-shadow 0.2s ease;
    }

    .address-card:hover {
        box-shadow: var(--shadow);
    }

    .address-type {
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .address-details {
        color: var(--gray-600);
        font-size: 0.9rem;
        line-height: 1.5;
    }

    .address-actions {
        margin-top: 15px;
        display: flex;
        gap: 8px;
    }

    .address-actions .btn {
        font-size: 0.85rem;
        padding: 6px 12px;
        border-radius: 6px;
    }

    .add-address-card {
        border: 2px dashed var(--gray-300);
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .add-address-card:hover {
        border-color: var(--primary-color);
    }
</style>
@endpush
@endsection