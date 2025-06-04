<x-app-layout>
    <style type="text/css">
        .orders-header {
            padding: 24px 0;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 24px;
        }

        .orders-tabs {
            display: flex;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            margin: -4px;
            padding: 4px;
            gap: 8px;
            margin-bottom: 24px;
        }

        .tab-item {
            padding: 12px 24px;
            color: #666;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            white-space: nowrap;
            transition: all 0.2s ease;
        }

        .tab-item:hover {
            background-color: #f5f5f5;
        }

        .tab-item.active {
            color: #FF6A00;
            background-color: #FFF0E6;
            font-weight: 500;
        }

        .search-box {
            position: relative;
            margin-bottom: 24px;
        }

        .search-box input {
            width: 100%;
            padding: 12px 48px;
            border: 1px solid #e0e0e0;
            border-radius: 24px;
            font-size: 14px;
            transition: border-color 0.2s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #FF6A00;
        }

        .search-box i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
        }

        button[type="submit"] {
            background-color: #FF6A00;
            color: white;
            border: none;
            border-radius: 20px;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        button[type="submit"]:hover {
            background-color: #E65C00;
        }

        .order-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            margin-bottom: 16px;
            background: white;
            transition: box-shadow 0.2s ease;
        }

        .order-card:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .order-header {
            padding: 16px 20px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fafafa;
        }

        .order-status {
            padding: 6px 16px;
            border-radius: 16px;
            font-size: 13px;
            font-weight: 500;
            text-transform: capitalize;
        }

        .status-processing {
            background-color: #E3F2FD;
            color: #1976D2;
        }

        .status-shipped {
            background-color: #F3E5F5;
            color: #7B1FA2;
        }

        .status-delivered {
            background-color: #E8F5E9;
            color: #2E7D32;
        }

        .status-cancelled {
            background-color: #FFEBEE;
            color: #C62828;
        }

        .status-pending {
            background-color: #FFF3E0;
            color: #EF6C00;
        }

        .empty-state {
            text-align: center;
            padding: 48px 20px;
        }

        .empty-state svg {
            color: #ccc;
            margin-bottom: 16px;
        }

        .empty-state h3 {
            margin-bottom: 8px;
            color: #333;
        }

        .empty-state p {
            color: #666;
            margin-bottom: 24px;
        }

        .empty-state a:not(.btn) {
            color: #FF6A00;
            text-decoration: none;
        }

        .empty-state a:not(.btn):hover {
            text-decoration: underline;
        }

        .empty-state .btn {
            display: inline-flex;
            align-items: center;
            background: #FF6A00;
            color: white;
            padding: 12px 24px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        .empty-state .btn:hover {
            background: #E65C00;
        }

        .pagination {
            margin-top: 24px;
            display: flex;
            justify-content: center;
        }

        .pagination>* {
            margin: 0 4px;
        }

        /* Order item styles */
        .w-16 {
            width: 4rem;
        }

        .h-16 {
            height: 4rem;
        }

        .object-cover {
            object-fit: cover;
        }

        /* Cancel button styles */
        button[type="submit"].cancel-btn {
            background-color: white;
            color: #C62828;
            border: 1px solid #C62828;
        }

        button[type="submit"].cancel-btn:hover {
            background-color: #FFEBEE;
        }
    </style>

    <div class="container px-4 py-8 mx-auto">
        <div class="orders-header">
            <h1 class="text-2xl font-medium">My Orders</h1>
        </div>

        <!-- Order Status Tabs -->
        <div class="orders-tabs">
            <a href="{{ route('profile.orders', ['status' => 'all']) }}"
                class="tab-item {{ !request('status') || request('status') === 'all' ? 'active' : '' }}">
                All Orders
            </a>
            <a href="{{ route('profile.orders', ['status' => 'pending']) }}"
                class="tab-item {{ request('status') === 'pending' ? 'active' : '' }}">
                To Pay
            </a>
            <a href="{{ route('profile.orders', ['status' => 'processing']) }}"
                class="tab-item {{ request('status') === 'processing' ? 'active' : '' }}">
                Processing
            </a>
            <a href="{{ route('profile.orders', ['status' => 'shipped']) }}"
                class="tab-item {{ request('status') === 'shipped' ? 'active' : '' }}">
                To Receive
            </a>
            <a href="{{ route('profile.orders', ['status' => 'delivered']) }}"
                class="tab-item {{ request('status') === 'delivered' ? 'active' : '' }}">
                Delivered
            </a>
            <a href="{{ route('profile.orders', ['status' => 'cancelled']) }}"
                class="tab-item {{ request('status') === 'cancelled' ? 'active' : '' }}">
                Cancelled
            </a>
        </div>

        <!-- Search Form -->
        <form action="{{ route('profile.orders') }}" method="GET">
            <div class="flex gap-2">
                <input type="hidden" name="status" value="{{ request('status', 'all') }}">
                <div class="flex-1 search-box">
                    <i class="fas fa-search"></i>
                    <input type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search orders by order number or product name..."
                        class="w-full">
                </div>
                <button type="submit">
                    Search
                </button>
            </div>
        </form>

        <!-- Orders List -->
        @if($orders->count() > 0)
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="order-card">
                <!-- Order Header -->
                <div class="order-header">
                    <div>
                        <h3 class="text-base font-medium">Order #{{ $order->order_number }}</h3>
                        <p class="text-sm text-gray-500">Placed on {{ $order->created_at->format('F j, Y') }}</p>
                    </div>
                    <div>
                        <span class="order-status status-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="p-4">
                    @foreach($order->orderItems as $item)
                    <div class="flex items-center py-3 {{ !$loop->last ? 'border-b border-gray-100' : '' }}">
                        <div class="flex-shrink-0 w-16 h-16">
                            @if($item->product)
                            <img src="{{ asset($item->product->image) }}"
                                alt="{{ $item->product->name }}"
                                class="object-cover w-full h-full rounded">
                            @else
                            <div class="flex items-center justify-center w-full h-full bg-gray-100 rounded">
                                <span class="text-gray-400">No image</span>
                            </div>
                            @endif
                        </div>
                        <div class="flex-grow ml-4">
                            <div class="flex justify-between">
                                <div>
                                    <h4 class="text-sm font-medium">
                                        {{ $item->product ? $item->product->name : 'Product Unavailable' }}
                                    </h4>
                                    <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                                </div>
                                <p class="font-medium">
                                    LKR {{ number_format($item->price, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Order Summary -->
                    <div class="flex items-center justify-between pt-4 mt-4 border-t">
                        <div>
                            <p class="text-sm text-gray-500">Total Items: {{ $order->orderItems->sum('quantity') }}</p>
                            <p class="mt-1 text-base font-medium">
                                Total: LKR {{ number_format($order->total_price, 2) }}
                            </p>
                        </div>
                        @if($order->status === 'processing')
                        <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="cancel-btn">
                                Cancel Order
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

            <!-- Pagination -->
            <div class="mt-6">
                {{ $orders->appends(request()->query())->links() }}
            </div>
        </div>
        @else
        <div class="empty-state">
            <div class="mb-4 text-gray-400">
                <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                    </path>
                </svg>
            </div>
            <h3>No orders found</h3>
            @if(request('search') || request('status') !== 'all')
            <p>Try adjusting your search or filter to find what you're looking for.</p>
            <a href="{{ route('profile.orders') }}">
                View all orders
            </a>
            @else
            <p>You haven't placed any orders yet.</p>
            <a href="{{ route('men') }}" class="btn">
                Start Shopping
            </a>
            @endif
        </div>
        @endif
    </div>
</x-app-layout>