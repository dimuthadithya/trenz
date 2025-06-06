<x-app-layout>
    <div class="container py-5">
        <div class="text-center mb-4">
            <div class="mb-4">
                <svg class="mx-auto text-success" width="64" height="64" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <h1 class="h3 mb-3">Thank you for your order!</h1>
            <p class="text-muted">Your order has been placed and is being processed.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Details</h5>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <p class="mb-0 text-muted">Order Number</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="mb-0 fw-bold">#{{ $order->id }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <p class="mb-0 text-muted">Order Date</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="mb-0">{{ $order->created_at->format('F d, Y') }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <p class="mb-0 text-muted">Total Amount</p>
                            </div>
                            <div class="col-sm-8">
                                <p class="mb-0 fw-bold">LKR {{ number_format($order->total_price, 2) }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Order Items</h5>
                        @foreach($order->orderItems as $item)
                        <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                            <div class="flex-shrink-0">
                                <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" class="rounded" style="width: 64px; height: 64px; object-fit: cover;">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">{{ $item->product->name }}</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="mb-0 text-muted">Qty: {{ $item->quantity }}</p>
                                    <p class="mb-0 fw-bold">LKR {{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary me-3">Continue Shopping</a>
                    <a href="{{ route('profile.orders') }}" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>