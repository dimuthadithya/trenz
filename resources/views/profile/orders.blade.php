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
</style>
@endpush

@section('profile-content')
<div class="p-6">
    <!-- Orders Page Content -->
    <div class="orders-header">
        <h1 class="font-medium h2">My Orders</h1>
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
    <form action="{{ route('profile.orders') }}" method="GET" class="mb-5">
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
    <x-order-card :order="$order" />
    @empty
    <div class="py-5 text-center">
        <div class="mb-4">
            <img src="{{ asset('img/no-orders.svg') }}" alt="No orders" class="mx-auto" style="height: 200px">
        </div>
        <h3 class="mb-2 h5">No Orders Found</h3>
        <p class="mb-4 text-muted">You haven't placed any orders yet.</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Start Shopping</a>
    </div>
    @endforelse

    <!-- Pagination -->
    <div class="mt-4">
        {{ $orders->appends(request()->query())->links() }}
    </div>
</div>
@endsection