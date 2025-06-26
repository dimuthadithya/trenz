        <div class="order-item">
            <div class="order-header">
                <div class="order-vendor">
                    <span class="badge bg-secondary"></span> {{ $orderDetails->order_number }}
                </div>
                <div class="order-status">
                    <span class="delivered-label">{{ $orderDetails->status }}</span>
                </div>
            </div>
            <div class="order-content">
                <div class="order-img">
                    <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                </div>
                <div class="order-details">
                    <div class="lowercase order-title">{{ $product->name }}</div>
                    <div class="order-info">Phone Number: 0740069520</div>
                </div>
                <div class="order-price">LKR {{ $product->price }}</div>
                <div class="order-qty">Qty: {{ $orderItem->quantity }}</div>
            </div>
        </div>