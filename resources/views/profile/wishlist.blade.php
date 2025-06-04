@extends('layouts.profile')

@section('profile-content')
<div class="container py-4">
    <h2 class="mb-4">My Wishlist</h2>

    @if($wishlistItems->count() > 0)
    <div class="row g-4">
        @foreach($wishlistItems as $item)
        <div class="col-md-6 col-lg-4">
            <div class="card h-100">
                <img src="{{ asset($item->product->image) }}"
                    class="card-img-top"
                    alt="{{ $item->product->name }}"
                    style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->product->name }}</h5>
                    <p class="mb-2 card-text text-muted">Rs. {{ number_format($item->product->price, 2) }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <form action="{{ route('cart.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fas fa-shopping-cart me-1"></i>
                                Add to Cart
                            </button>
                        </form>
                        <form action="{{ route('wishlist.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash-alt me-1"></i>
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="py-5 text-center">
        <div class="mb-4">
            <i class="fas fa-heart text-muted" style="font-size: 48px;"></i>
        </div>
        <h3 class="mb-3 h5">Your wishlist is empty</h3>
        <p class="mb-4 text-muted">Browse our products and add items you love to your wishlist</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Start Shopping</a>
    </div>
    @endif
</div>
@endsection