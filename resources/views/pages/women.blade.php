<x-app-layout>
    <section class="flex-wrap product spad d-flex">
        @include('layouts.filters',['category' => 'women'])
        <div class="container col-lg-9 col-md-6 col-12">
            <div class="row">
                @foreach($products as $product)
                <x-product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>