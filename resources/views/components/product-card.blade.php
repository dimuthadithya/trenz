<!-- resources/views/components/product-item.blade.php -->

<div {{ $attributes->merge(['class' => 'col-lg-3 col-md-4 col-sm-6 product-card-item']) }} onclick="window.location='{{ route('product.show', $product->id) }}'">
    <div class="cursor-pointer product__item">
        <div class="product__item__pic set-bg" data-setbg="{{ $product->image ?? asset('assets/img/product/product-1.jpg') }}">
            <div class="label new">{{ $label ?? 'New' }}</div>
            <ul class="product__hover">
                <li>
                    <a href="{{ $product->image ?? asset('assets/img/product/product-1.jpg') }}" class="image-popup"><span class="arrow_expand"></span></a>
                </li>
                <li>
                    @auth
                    <form action="{{ route('wishlist.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit">
                            <span class="icon_heart_alt"></span>
                        </button>
                    </form>
                    @else
                    <a href="{{ route('login') }}"><span class="icon_heart_alt"></span></a>
                    @endauth
                </li>
                <li>
                    <a href="#"><span class="icon_bag_alt"></span></a>
                </li>
            </ul>
        </div>
        <div class="product__item__text">
            <h6><a href="#">{{ $product->name ?? 'Buttons tweed blazer' }}{{ $product->id }}</a></h6>
            <div class="rating">
                @php
                $rating = $rating ?? 0;
                @endphp
                @for ($i = 0; $i < 5; $i++)
                    <i class="fa fa-star{{ $i < $rating ? '' : '-o' }}"></i>
                    @endfor
            </div>
            <div class="product__price">${{ $product->price ?? '0.0' }}</div>
        </div>
        </a>
    </div>
</div>