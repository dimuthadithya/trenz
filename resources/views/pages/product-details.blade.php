@php
use App\Models\ProductImage;
@endphp

<x-app-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                        <a href="{{ $product->category_id > 26 ? route('men') : route('women') }}">
                            {{ $product->category_id > 26 ? 'Men' : 'Women' }}
                        </a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__left product__thumb nice-scroll">
                            <a class="pt active" href="#product-main">
                                <img src="Storage::url{{ $product->image }}" alt="">
                            </a>
                            @php
                            $product_images = ProductImage::where('product_id', $product->id)->get();
                            @endphp
                            @foreach ($product_images as $product_image)

                            <a class="pt" href="#product-{{ $loop->iteration }}">
                                <img src="{{ $product_image->image_path }}" alt="">
                            </a>
                            @endforeach
                        </div>
                        <div class="product__details__slider__content">
                            <div class="product__details__pic__slider owl-carousel">
                                <img data-hash="product-main" class="product__big__img" src="../{{ $product->image }}" alt="">
                                @foreach ($product_images as $product_image)
                                <img data-hash="product-{{ $loop->iteration }}" class="product__big__img" src="./{{ $product_image->image_path }}" alt="">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product__details__text">
                        <h3>{{ $product->name }}<span>Brand: SKU{{$product->id}}{{ $product->category_id }}{{ $product->stock }}</span></h3>
                        <div class="mb-2 rating">
                            @php
                            $rating = $product->rating;
                            @endphp
                            @for ($i = 0; $i < 5; $i++)
                                @if ($i < $rating)
                                <i class="fa-solid fa-star"></i>
                                @else
                                <i class="fa-regular fa-star"></i>
                                @endif
                                @endfor
                        </div>
                        <div class="product__details__price">LKR {{ $product->price }} <span>LKR {{ $product->price+10 }}.00</span></div>
                        <p>{{ $product->description }}</p>
                        <div class="product__details__button">
                            @auth
                            <form action="{{ route("cart.store") }}" method="post" id="addToCartForm">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="quantity">
                                    <span>Quantity:</span>
                                    <div class="pro-qty">
                                        <input type="text" name="quantity" value="1" id="quantityInput">
                                    </div>
                                </div>
                                <button type="submit" class="border-0 cart-btn"><span class="icon_bag_alt"></span> Add to cart</button>
                            </form>
                            @else
                            <a href="{{ route("login") }}" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                            @endauth
                            <ul>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Availability:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            In Stock
                                            <input type="checkbox" id="stockin">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </li>

                                <li>
                                    <span>Available size:</span>
                                    <div class="size__btn">
                                        <label for="xs-btn" class="active">
                                            <input type="radio" id="xs-btn">
                                            xs
                                        </label>
                                        <label for="s-btn">
                                            <input type="radio" id="s-btn">
                                            s
                                        </label>
                                        <label for="m-btn">
                                            <input type="radio" id="m-btn">
                                            m
                                        </label>
                                        <label for="l-btn">
                                            <input type="radio" id="l-btn">
                                            l
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <span>Promotions:</span>
                                    <p>Free shipping</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <div class="description-content">
                            <h6>Description</h6>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="text-center col-lg-12">
                    <div class="related__title">
                        <h5>RELATED PRODUCTS</h5>
                    </div>
                </div>
                @php
                $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->take(4)
                ->get();

                @endphp
                @foreach ($relatedProducts as $relatedProduct)
                <x-product-card :product="$relatedProduct" />
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->
    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get references to the quantity input and form
            const quantityInput = document.getElementById('quantityInput');
            const form = document.getElementById('addToCartForm');

            // Listen for changes to the quantity through the pro-qty buttons
            document.querySelector('.pro-qty').addEventListener('click', function(e) {
                if (e.target.classList.contains('qtybtn')) {
                    // Wait for the input value to be updated
                    setTimeout(() => {
                        // Update the form's quantity value
                        quantityInput.value = parseInt(quantityInput.value) || 1;
                    }, 100);
                }
            });

            // Also listen for direct input changes
            quantityInput.addEventListener('change', function() {
                // Ensure the value is at least 1
                this.value = Math.max(1, parseInt(this.value) || 1);
            });
        });
    </script>
    @endpush
</x-app-layout>