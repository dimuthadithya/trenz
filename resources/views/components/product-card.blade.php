@php
use App\Models\Category;

$product_id = $product->id;
$categoryName = Category::where('id', $product->category_id)->value('category_name');
@endphp

<div {{ $attributes->merge(['class' => 'col-lg-3 col-md-4 col-sm-6 product-card-item']) }}>
    <div class="cursor-pointer product__item">
        <div class="product__item__pic set-bg" data-setbg="{{ $product->image }}">
            <div class="label new">{{$categoryName }}</div>
            <ul class="product__hover">
                <li>
                    <a href="{{ $product->image }}" class="image-popup"><span class="arrow_expand"></span></a>
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
        <div class="pb-3 product__item__text d-flex flex-column ctz-height">
            <div class="flex-grow-1">
                <h5><a href="{{ route('product.show', $product_id) }}">{{ $product->name ?? 'Buttons tweed blazer' }}</a></h5>
            </div>
            <div class="h-1 mt-2 product__price">LKR {{ $product->price ?? '0.0' }}</div>
        </div>
    </div>
</div>