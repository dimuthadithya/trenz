<x-app-layout>
    <section class="flex-wrap p-lg-5 product spad d-flex">
        @include('layouts.filters')
        <div class="container col-lg-9 col-md-6 col-12">
            <div class="row">
                @foreach($wishlistItems as $wishlistItem)
                <x-wishlist-card :wishlistItem="$wishlistItem" />
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>