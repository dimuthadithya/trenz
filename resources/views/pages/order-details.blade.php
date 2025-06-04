@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Order Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-1">Order #{{ $order->order_number }}</h1>
                    <p class="text-muted">Placed on {{ $order->created_at->format('F j, Y') }}</p>
                </div>
                <span class="order-status status-{{ strtolower($order->status) }}">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <!-- Order Details Card -->
            <div class="card mb-4">
                <!-- Shipping Information -->
                <div class="card-body border-bottom">
                    <h5 class="card-title mb-4">Shipping Information</h5>
                    @if($order->address)
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <p class="text-muted small mb-1">Name</p>
                            <p class="fw-medium">{{ $order->address->fname }} {{ $order->address->lname }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <p class="text-muted small mb-1">Phone</p>
                            <p class="fw-medium">{{ $order->address->phone_number }}</p>
                        </div>
                        <div class="col-12">
                            <p class="text-muted small mb-1">Address</p>
                            <p class="fw-medium">
                                {{ $order->address->address }}<br>
                                {{ $order->address->city }}, {{ $order->address->country }} {{ $order->address->zip_code }}
                            </p>
                        </div>
                    </div>
                    @else
                    <p class="text-muted">No shipping information available.</p>
                    @endif
                </div>

                <!-- Order Items -->
                <div class="card-body">
                    <h5 class="card-title mb-4">Order Items</h5>
                    <div class="mb-4">
                        @foreach($order->orderItems as $item)
                        <div class="d-flex align-items-start mb-3">
                            <div class="flex-shrink-0 me-3" style="width: 60px; height: 60px;">
                                <img src="{{ asset($item->product->image) }}"
                                    alt="{{ $item->product->name }}"
                                    class="img-fluid rounded border"
                                    style="width: 60px; height: 60px; object-fit: cover;"
                                    loading="lazy">
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="fw-medium text-truncate mb-1">{{ $item->product->name }}</h6>
                                <p class="text-muted small mb-1">Qty: {{ $item->quantity }}</p>
                                <p class="fw-medium">Rs. {{ number_format($item->price * $item->quantity, 2) }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Order Summary -->
                    <div class="border-top pt-4 mt-4">
                        <div class="d-flex justify-content-between align-items-center text-sm">
                            <span class="text-muted">Items Total</span>
                            <span class="fw-medium">Rs. {{ number_format($order->total_price, 2) }}</span>
                        </div>
                        @if($order->status === 'processing')
                        <div class="text-end mt-4">
                            <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit"
                                    class="btn btn-outline-danger btn-sm rounded-pill px-4">
                                    Cancel Order
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Back Button -->
            <div>
                <a href="{{ route('profile.orders') }}"
                    class="text-decoration-none">
                    <i class="fas fa-arrow-left me-1"></i>
                    Back to Orders
                </a>
            </div>
        </div>
    </div>
</div>
@endsection