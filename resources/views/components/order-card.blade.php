<div class="mb-4 card">
    <div class="card-body">
        <!-- Order Header -->
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-1">Order #{{ $order->order_number }}</h5>
                <p class="mb-0 text-muted small">{{ $order->created_at->format('F j, Y') }}</p>
            </div>
            <span class="order-status status-{{ strtolower($order->status) }}">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        @if (isset($slot) && !empty($slot->toHtml()))
        {{ $slot }}
        @else
        <!-- Order Items -->
        <div class="mb-4">
            @foreach ($order->orderItems as $item)
            <div class="mb-3 d-flex align-items-start">
                <div class="flex-shrink-0 me-3" style="width: 60px; height: 60px;">
                    <img src="{{ asset($item->product->image) }}"
                        alt="{{ $item->product->name }}"
                        class="border rounded img-fluid"
                        style="width: 60px; height: 60px; object-fit: cover;"
                        loading="lazy"
                        onerror="this.src='data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNjAiIGhlaWdodD0iNjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHJlY3Qgd2lkdGg9IjYwIiBoZWlnaHQ9IjYwIiBmaWxsPSIjZjFmMWYxIi8+PHRleHQgeD0iNTAlIiB5PSI1MCUiIGZvbnQtZmFtaWx5PSJBcmlhbCIgZm9udC1zaXplPSIxMiIgZmlsbD0iIzk5OSIgdGV4dC1hbmNob3I9Im1pZGRsZSIgZHk9Ii4zZW0iPk5vIEltYWdlPC90ZXh0Pjwvc3ZnPg=='">
                </div>
                <div class="flex-grow-1">
                    <h6 class="mb-1 fw-medium text-truncate">{{ $item->product->name }}</h6>
                    <p class="mb-1 text-muted small">Qty: {{ $item->quantity }}</p>
                    <p class="fw-medium">Rs. {{ number_format($item->price * $item->quantity, 2) }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Order Summary -->
        <div class="pt-3 border-top">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted small">Order Total</span>
                <span class="fw-medium">Rs. {{ number_format($order->total_price, 2) }}</span>
            </div>
            <div class="mt-3 d-flex justify-content-between align-items-center">
                <a href="{{ route('order.show', $order->id) }}"
                    class="p-0 btn btn-link btn-sm text-decoration-none">
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
        @endif
    </div>
</div>