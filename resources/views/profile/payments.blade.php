@extends('profile.index')

@push('styles')
<style>
    .payment-container {
        background-color: white;
        padding: 24px;
        border-radius: 8px;
    }

    .payment-card {
        border: 1px solid var(--gray-200);
        padding: 20px;
        margin-bottom: 16px;
        border-radius: 8px;
        background: white;
        transition: box-shadow 0.2s ease;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .payment-card:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .payment-info {
        display: flex;
        align-items: center;
        gap: 16px;
    }

    .card-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--gray-50);
        border-radius: 8px;
    }

    .card-icon i {
        font-size: 24px;
        color: var(--gray-600);
    }

    .card-details h4 {
        font-size: 1rem;
        font-weight: 500;
        color: var(--gray-800);
        margin-bottom: 4px;
    }

    .card-details p {
        font-size: 0.875rem;
        color: var(--gray-600);
        margin: 0;
    }

    .card-actions {
        display: flex;
        gap: 8px;
    }

    .add-payment-card {
        border: 2px dashed var(--gray-200);
        padding: 24px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 160px;
    }

    .add-payment-card:hover {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .add-payment-card i {
        font-size: 2rem;
        margin-bottom: 1rem;
        color: var(--gray-400);
        transition: color 0.3s ease;
    }

    .add-payment-card:hover i {
        color: var(--primary-color);
    }
</style>
@endpush

@section('profile-content')
<div class="p-6">
    <div class="payment-container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h4 class="m-0">Payment Methods</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                <i class="fas fa-plus"></i> Add New Payment Method
            </button>
        </div>

        <!-- Payment Cards -->
        <div>
            @forelse($paymentMethods ?? [] as $method)
            <div class="payment-card">
                <div class="payment-info">
                    <div class="card-icon">
                        @if($method->type === 'visa')
                        <i class="fab fa-cc-visa"></i>
                        @elseif($method->type === 'mastercard')
                        <i class="fab fa-cc-mastercard"></i>
                        @else
                        <i class="fas fa-credit-card"></i>
                        @endif
                    </div>
                    <div class="card-details">
                        <h4>{{ ucfirst($method->type) }} ending in {{ $method->last_four }}</h4>
                        <p>Expires {{ $method->expiry_month }}/{{ $method->expiry_year }}</p>
                    </div>
                </div>
                <div class="card-actions">
                    <button class="btn btn-outline-danger btn-sm" onclick="deletePaymentMethod({{ $method->id }})">
                        Remove
                    </button>
                    @if(!$method->is_default)
                    <button class="btn btn-outline-secondary btn-sm" onclick="setDefaultPaymentMethod({{ $method->id }})">
                        Set as Default
                    </button>
                    @else
                    <span class="badge bg-primary">Default</span>
                    @endif
                </div>
            </div>
            @empty
            <div class="add-payment-card" data-bs-toggle="modal" data-bs-target="#addPaymentModal">
                <i class="fas fa-credit-card"></i>
                <h5>Add Payment Method</h5>
                <p class="mb-0 text-muted">Add your first payment method</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<!-- Add Payment Modal -->
<div class="modal fade" id="addPaymentModal" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel">Add Payment Method</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('profile.payments.store') }}" method="POST" id="payment-form">
                    @csrf
                    <div class="mb-3">
                        <label for="cardName" class="form-label">Name on Card</label>
                        <input type="text" class="form-control" id="cardName" required>
                    </div>
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" required>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="expiryDate" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="expiryDate" placeholder="MM/YY" required>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cvv" required>
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="defaultPayment" name="is_default">
                        <label class="form-check-label" for="defaultPayment">Set as default payment method</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Payment Method</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function deletePaymentMethod(id) {
        if (confirm('Are you sure you want to remove this payment method?')) {
            fetch(`/profile/payments/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            }).then(response => {
                if (response.ok) {
                    window.location.reload();
                }
            });
        }
    }

    function setDefaultPaymentMethod(id) {
        fetch(`/profile/payments/${id}/default`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            }
        });
    }
</script>
@endpush
@endsection