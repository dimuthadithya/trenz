<div class="card mb-4">
    <div class="card-body">
        <!-- Order Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h5 class="mb-1">Order #{{ $order->order_number }}</h5>
                <p class="text-muted small mb-0">{{ $order->created_at->format('F j, Y') }}</p>
            </div>
            <span class="order-status status-{{ strtolower($order->status) }}">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <!-- Order Items -->
        <div class="mb-4">
            @foreach ($order->orderItems as $item)
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
        <div class="border-top pt-3">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted small">Order Total</span>
                <span class="fw-medium">Rs. {{ number_format($order->total_price, 2) }}</span>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <a href="{{ route('order.show', $order->id) }}"
                    class="btn btn-link btn-sm text-decoration-none p-0">
                    View Details
                </a>
                @if($order->status === 'processing')
                <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill">
                        Cancel Order
                    </button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>