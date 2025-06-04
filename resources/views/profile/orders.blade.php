@extends('profile.index')

@push('styles')
<style>
    .orders-header {
        padding: 24px 0;
        border-bottom: 1px solid var(--gray-200);
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
        color: var(--gray-600);
        text-decoration: none;
        border-radius: 20px;
        font-size: 14px;
        white-space: nowrap;
        transition: all 0.2s ease;
    }

    .tab-item:hover {
        background-color: var(--gray-100);
    }

    .tab-item.active {
        color: var(--primary-color);
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
        border: 1px solid var(--gray-200);
        border-radius: 24px;
        font-size: 14px;
        transition: border-color 0.2s ease;
    }

    .search-box input:focus {
        outline: none;
        border-color: var(--primary-color);
    }

    .search-box i {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gray-400);
    }

    .order-card {
        border: 1px solid var(--gray-200);
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
        border-bottom: 1px solid var(--gray-200);
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: var(--gray-50);
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
        color: #388E3C;
    }

    .status-cancelled {
        background-color: #FFEBEE;
        color: #D32F2F;
    }

    button[type="submit"] {
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 20px;
        padding: 12px 24px;
        font-size: 14px;
        font-weight: 500;
        transition: background-color 0.2s ease;
    }

    button[type="submit"]:hover {
        background-color: var(--primary-hover);
    }

    button[type="submit"].cancel-btn {
        background-color: white;
        color: #C62828;
        border: 1px solid #C62828;
    }

    button[type="submit"].cancel-btn:hover {
        background-color: #FFEBEE;
    }
</style>
@endpush

@section('profile-content')
<div class="p-6">
    <!-- Orders Page Content -->
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
                    placeholder="Search by Order ID or Product Name"
                    class="block w-full">
            </div>
            <button type="submit">Search</button>
        </div>
    </form>

    <!-- Orders List -->
    @forelse($orders as $order)
    <div class="order-card">
        <div class="order-header">
            <div>
                <h4 class="text-sm font-medium text-gray-900">Order #{{ $order->id }}</h4>
                <p class="text-sm text-gray-500">Placed on {{ $order->created_at->format('M d, Y') }}</p>
            </div>
            <span class="order-status status-{{ $order->status }}">{{ $order->status }}</span>
        </div>

        <div class="p-4">
            <!-- Order Items -->
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
    @empty
    <div class="empty-state">
        <div class="text-center">
            <img src="{{ asset('img/no-orders.svg') }}" alt="No orders" class="mx-auto mb-4" style="height: 200px">
            <h3 class="text-lg font-medium text-gray-900">No Orders Found</h3>
            <p class="mt-1 text-gray-500">You haven't placed any orders yet.</p>
            <div class="mt-4">
                <a href="{{ route('home') }}" class="btn">Start Shopping</a>
            </div>
        </div>
    </div>
    @endforelse

    <!-- Pagination -->
    <div class="mt-6">
        {{ $orders->appends(request()->query())->links() }}
    </div>
</div>
@endsection