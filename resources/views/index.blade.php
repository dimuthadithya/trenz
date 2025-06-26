@php
use App\Models\Category;
@endphp

<x-app-layout>
  <!-- Categories Section Begin -->
  <section class="categories">
    <img src="{{ asset("assets/img/banner/hero.jpg") }}" alt="">
  </section>
  <!-- Categories Section End -->

  <!-- Product Section Begin -->
  <section class="product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          <div class="section-title">
            <h4>New product</h4>
          </div>
        </div>
        <div class="col-lg-8 col-md-8">
          <ul class="filter__controls">
            <li class="active" data-filter="*">All</li>
            <li data-filter=".women">Women’s</li>
            <li data-filter=".men">Men’s</li>
            <li data-filter=".kid">Kid’s</li>
            <li data-filter=".accessories">Accessories</li>
            <li data-filter=".cosmetic">Cosmetics</li>
          </ul>
        </div>
      </div>
      <div class="row property__gallery justify-content-center">
        @foreach($products as $product)
        @php
        $category_id = $product->category_id;
        $category = Category::find($category_id);
        $parent_category_id = $category->parent_category_id;
        $parent_category_name = $parent_category_id ? Category::find($parent_category_id)->category_name : null;
        @endphp
        <x-product-card :product="$product" class="mix {{ strtolower(str_replace(' ', '-', $parent_category_name)) }}" />
        @endforeach
      </div>
    </div>
  </section>
  <!-- Product Section End -->

  <!-- Banner Section Begin -->
  <section class="">
    <div class="container">
      <video src="{{ asset('assets/videos/hero_v.mp4') }}" autoplay muted loop playsinline style="width: 100%;"></video>
    </div>
  </section>
  <!-- Banner Section End -->

  <!-- Discount Section Begin -->
  <section class="mb-5 discount">
    <div class="container">
      <div class="p-0 col-lg-12">
        <video src="{{ asset('assets/videos/dis_v.mp4') }}" autoplay muted loop playsinline style="width:auto;height:400px"></video>
      </div>
    </div>
  </section>

  @push('scripts')
  <script type="module">
    import {
      CountUp
    } from 'https://cdn.jsdelivr.net/npm/countup.js@2.6.2/dist/countUp.min.js';

    document.addEventListener("DOMContentLoaded", () => {
      const counters = document.querySelectorAll(".counter");

      counters.forEach(counter => {
        const endVal = parseInt(counter.dataset.count, 10);

        const duration = 20;

        const countUp = new CountUp(counter, endVal, {
          duration: duration
        });

        if (!countUp.error) {
          countUp.start();
        } else {
          console.error(countUp.error);
        }
      });
    });
  </script>


  @endpush
  <!-- Services Section End -->
</x-app-layout>