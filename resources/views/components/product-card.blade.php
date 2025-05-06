@php
use App\Models\Category;

$product_id = $product->id;

$categoryName = Category::where('id', $product->category_id)->value('category_name');
@endphp

<div {{ $attributes->merge(['class' => 'col-lg-3 col-md-4 col-sm-6 product-card-item']) }} onclick="window.location='{{ route('product.show', $product->id) }}'">
    <div class="cursor-pointer product__item">
        <div class="product__item__pic set-bg" data-setbg="../{{ $product->image ?? asset('assets/img/product/product-1.jpg') }}">
            <div class="label new">{{$categoryName }}</div>
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
        <div class="pb-3 border product__item__text d-flex flex-column ctz-height">
            <div class="flex-grow-1">
                <h5><a href="#">{{ $product->name ?? 'Buttons tweed blazer' }}</a></h5>
            </div>
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
            <div class=" product__price">LKR {{ $product->price ?? '0.0' }}</div>
        </div>
        </a>
    </div>
</div>