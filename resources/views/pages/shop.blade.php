@php
use App\Models\Category;
@endphp

<x-app-layout>
    <section class="flex-wrap product spad d-flex">
        @include('layouts.filters', ['category' => 'all'])
        <div class="container col-lg-9 col-md-6 col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="m-0">All Products</h2>
                <div class="d-flex gap-2 align-items-center">
                    <button class="btn btn-primary btn-sm" id="showing_category_btn">
                        <span id="showing_category_text" class="me-3">All</span><i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>

            <div class="row" id="product-list">
                @foreach($products as $product)
                @php
                $categoryName = Category::where('id', $product->category_id)->value('category_name');
                @endphp
                <x-product-card :product="$product" class="{{ $categoryName }}" />
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </section>
</x-app-layout>