@php
use App\Models\Category;
@endphp

<x-app-layout>
    <section class="flex-wrap product spad d-flex">
        @include('layouts.filters',['category' => 'women'])
        <div class="container col-lg-9 col-md-6 col-12">
            <button class="mb-4 btn btn-primary btn-sm" id="showing_category_btn">
                <span id="showing_category_text" class="me-3">All</span><i class="fa-solid fa-xmark"></i>
            </button>
            <div class="row" id="product-list">
                @foreach($products as $product)
                @php
                $categoryName = Category::where('id', $product->category_id)->value('category_name');
                @endphp
                <x-product-card :product="$product" class="{{ $categoryName }}" />
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>