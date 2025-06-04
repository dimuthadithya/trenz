@extends('profile.index')

@push('styles')
<style>
    .address-container {
        background-color: white;
        padding: 24px;
        border-radius: 8px;
    }

    .address-card {
        border: 1px solid #e0e0e0;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 3px;
        background: white;
        transition: box-shadow 0.2s ease;
    }

    .address-card:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
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
        border: 2px dashed var(--gray-200);
        padding: 24px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 8px;
        height: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 200px;
    }

    .add-address-card:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .add-address-card i {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--gray-400);
        transition: color 0.3s ease;
    }

    .add-address-card:hover i {
        color: var(--primary-color);
    }
</style>
@endpush

@section('profile-content')
<div class="p-6">
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
@endsection