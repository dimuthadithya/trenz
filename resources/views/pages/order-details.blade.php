@php
$user = Auth::user();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details - {{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background: #f8f9fa;
        }

        .order-details-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
            padding: 2.5rem 2rem 2rem 2rem;
            margin-bottom: 2rem;
        }

        .order-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .order-status-badge {
            font-size: 1rem;
        }

        .order-summary-table th,
        .order-summary-table td {
            vertical-align: middle;
        }

        .order-address-card {
            background: #f8f9fa;
            border-radius: 0.75rem;
            padding: 1.2rem 1.5rem;
            margin-bottom: 1.2rem;
        }

        .order-items-list .card {
            border-radius: 0.75rem;
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.04);
            margin-bottom: 1.2rem;
        }

        .order-items-list .card .card-body {
            padding: 1.2rem 1.5rem;
        }

        .order-items-list .card .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .order-items-list .card .card-text {
            color: #555;
        }

        .order-items-list .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 0.5rem;
            margin-right: 1rem;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="order-details-card">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <div class="mb-0 order-title">Order #{{ $order->order_number }}</div>
                        @switch($order->status)
                        @case('processing')
                        <span class="badge bg-info order-status-badge">Processing</span>
                        @break
                        @case('shipped')
                        <span class="badge bg-primary order-status-badge">Shipped</span>
                        @break
                        @case('delivered')
                        <span class="badge bg-success order-status-badge">Delivered</span>
                        @break
                        @case('cancelled')
                        <span class="badge bg-danger order-status-badge">Cancelled</span>
                        @break
                        @endswitch
                    </div>
                    <div class="mb-4 row g-4">
                        <div class="col-md-6">
                            <div class="order-address-card">
                                <div class="mb-1 fw-bold">Shipping Address</div>
                                @if($order->address)
                                <div>{{ $order->address->fname }} {{ $order->address->lname }}</div>
                                <div>{{ $order->address->address }}, {{ $order->address->city }}</div>
                                <div>{{ $order->address->country }}, {{ $order->address->zip_code }}</div>
                                <div>Phone: {{ $order->address->phone_number }}</div>
                                <div>Email: {{ $order->address->email }}</div>
                                @else
                                <div class="text-muted">No address found.</div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order-address-card">
                                <div class="mb-1 fw-bold">Order Summary</div>
                                <table class="table mb-0 order-summary-table">
                                    <tr>
                                        <th>Date:</th>
                                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            @switch($order->status)
                                            @case('processing') Processing @break @case('shipped') Shipped @break
                                            @case('delivered') Delivered @break
                                            @case('canceled') Canceled @break
                                            @endswitch
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Total:</th>
                                        <td>Rs. {{ number_format($order->total_price, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment:</th>
                                        <td class="text-capitalize">{{ $order->payment_status ?? 'N/A' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-3 fw-bold">Order Items</div>
                        <div class="order-items-list">
                            @foreach($order->orderItems as $item)
                            <div class="mb-3 card">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ asset('storage/products/' . ($item->product->image ?? '')) ?? 'https://via.placeholder.com/60x60.png?text=Product' }}" class="product-img" alt="Product Image">
                                    <div>
                                        <div class="mb-1 card-title">{{ $item->product->name ?? 'Product' }}</div>
                                        <div class="card-text text-muted small">Price: Rs. {{ number_format($item->price, 2) }}</div>
                                        <div class="card-text text-muted small">Quantity: {{ $item->quantity }}</div>
                                        <div class="card-text text-muted small">Subtotal: Rs. {{ number_format($item->price * $item->quantity, 2) }}</div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @if($order->status === 'processing')
                    <div class="mt-4 text-end">
                        <form action="{{ route('profile.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="px-4 btn btn-outline-danger btn-sm rounded-pill" onclick="return confirm('Are you sure you want to cancel this order?')">
                                Cancel Order
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
                <div>
                    <a href="{{ route('profile.orders') }}" class="text-decoration-none">
                        <i class="fas fa-arrow-left me-1"></i>
                        Back to Orders
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
    <script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nicescroll.min.js') }}"></script>
    <script type="module" src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/notyf.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>