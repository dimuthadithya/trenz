<x-app-layout>
    <section class="flex-wrap product spad d-flex">
        @include('layouts.filters')
        <div class="container col-lg-9 col-md-6 col-12">
            <div class="row">
                <x-product-card></x-product-card>
            </div>
        </div>
    </section>
</x-app-layout>