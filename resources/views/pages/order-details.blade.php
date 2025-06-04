@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if(session('error'))
            <div class="mb-4 alert alert-danger">
                {{ session('error') }}
            </div>
            @endif

            <x-order-card :order="$order">
                <!-- Custom content for order details -->
                <!-- Shipping Information -->
                <div class="pb-4 mb-4 border-bottom">
                    <h5 class="mb-4 card-title">Shipping Information</h5>
                    @if($order->address)
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <p class="mb-1 text-muted small">Name</p>
                            <p class="fw-medium">{{ $order->address->fname }} {{ $order->address->lname }}</p>
                        </div>
                        <div class="mb-3 col-md-6">
                            <p class="mb-1 text-muted small">Phone</p>
                            <p class="fw-medium">{{ $order->address->phone_number }}</p>
                        </div>
                        <div class="col-12">
                            <p class="mb-1 text-muted small">Address</p>
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
                <h5 class="mb-4 card-title">Order Items</h5>
                <div class="mb-4">
                    @forelse($order->orderItems as $item)
                    <div class="mb-3 d-flex align-items-start">
                        <div class="flex-shrink-0 me-3" style="width: 60px; height: 60px;">
                            <img src="{{ asset($item->product->image) }}"
                                alt="{{ $item->product->name }}"
                                class="border rounded img-fluid"
                                style="width: 60px; height: 60px; object-fit: cover;"
                                loading="lazy">
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1 fw-medium text-truncate">{{ $item->product->name }}</h6>
                            <p class="mb-1 text-muted small">Qty: {{ $item->quantity }}</p>
                            <p class="fw-medium">Rs. {{ number_format($item->price * $item->quantity, 2) }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-muted">No items found in this order.</p>
                    @endforelse
                </div>

                <!-- Order Summary -->
                <div class="pt-4 mt-4 border-top">
                    <div class="text-sm d-flex justify-content-between align-items-center">
                        <span class="text-muted">Items Total</span>
                        <span class="fw-medium">Rs. {{ number_format($order->total_price, 2) }}</span>
                    </div>
                    @if($order->status === 'processing')
                    <div class="mt-4 text-end">
                        <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="px-4 btn btn-outline-danger btn-sm rounded-pill"
                                onclick="return confirm('Are you sure you want to cancel this order?')">
                                Cancel Order
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </x-order-card>

            <!-- Back Button -->
            <div>
                <a href="{{ route('profile.orders') }}" class="text-decoration-none">
                    <i class="fas fa-arrow-left me-1"></i>
                    Back to Orders
                </a>
            </div>
        </div>
    </div>
</div>
@endsection