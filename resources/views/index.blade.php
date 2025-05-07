@php
use App\Models\Category;
@endphp

<x-app-layout>
  <!-- Categories Section Begin -->
  <section class="categories">
    <div class="container-fluid">
      <div class="row">
        <div class="p-0 col-lg-6">
          <div
            class="categories__item categories__large__item set-bg"
            data-setbg="{{ asset('assets/img/categories/category-1.jpg ')}}">
            <div class="categories__text">
              <h1>Women’s fashion</h1>
              <p>
                Sitamet, consectetur adipiscing elit, sed do eiusmod tempor
                incidid-unt labore edolore magna aliquapendisse ultrices
                gravida.
              </p>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row">
            <div class="p-0 col-lg-6 col-md-6 col-sm-6">
              <div
                class="categories__item set-bg"
                data-setbg="{{ asset('assets/img/categories/category-2.jpg') }}">
                <div class="categories__text">
                  <h4>Men’s fashion</h4>
                  <p><span class="counter" data-count="{{ $menProductsCount }}">0</span> items</p>
                  <a href="{{ route("men") }}">Shop now</a>
                </div>
              </div>
            </div>
            <div class="p-0 col-lg-6 col-md-6 col-sm-6">
              <div
                class="categories__item set-bg"
                data-setbg="{{ asset('assets/img/categories/category-3.jpg') }}">
                <div class="categories__text">
                  <h4>Kid’s fashion</h4>
                  <p><span class="counter" data-count="{{ $kidsProductsCount }}">0</span> items</p>
                  <a href="{{ route("kid") }}">Shop now</a>
                </div>
              </div>
            </div>
            <div class="p-0 col-lg-6 col-md-6 col-sm-6">
              <div
                class="categories__item set-bg"
                data-setbg="{{ asset('assets/img/categories/category-4.jpg') }}">
                <div class="categories__text">
                  <h4>Cosmetics</h4>
                  <p><span class="counter" data-count="159">0</span> items</p>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
            <div class="p-0 col-lg-6 col-md-6 col-sm-6">
              <div
                class="categories__item set-bg"
                data-setbg="{{ asset('assets/img/categories/category-5.jpg') }}">
                <div class="categories__text">
                  <h4>Accessories</h4>
                  <p><span class="counter" data-count="102">0</span> items</p>
                  <a href="#">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
  <section class="banner set-bg" data-setbg="{{ asset('assets/img/banner/banner-1.jpg') }}">
    <div class="container">
      <div class="row">
        <div class="m-auto col-xl-7 col-lg-8">
          <div class="banner__slider owl-carousel">
            <div class="banner__item">
              <div class="banner__text">
                <span>The Chloe Collection</span>
                <h1>The Project Jacket</h1>
                <a href="#">Shop now</a>
              </div>
            </div>
            <div class="banner__item">
              <div class="banner__text">
                <span>The Chloe Collection</span>
                <h1>The Project Jacket</h1>
                <a href="#">Shop now</a>
              </div>
            </div>
            <div class="banner__item">
              <div class="banner__text">
                <span>The Chloe Collection</span>
                <h1>The Project Jacket</h1>
                <a href="#">Shop now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Banner Section End -->

  <!-- Trend Section Begin -->
  <section class="trend spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="trend__content">
            <div class="section-title">
              <h4>Hot Trend</h4>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/ht-1.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Chain bucket bag</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/ht-2.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Pendant earrings</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/ht-3.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Cotton T-Shirt</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="trend__content">
            <div class="section-title">
              <h4>Best seller</h4>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/bs-1.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Cotton T-Shirt</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/bs-2.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Zip-pockets pebbled tote <br />briefcase</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/bs-3.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Round leather bag</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6">
          <div class="trend__content">
            <div class="section-title">
              <h4>Feature</h4>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/f-1.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Bow wrap skirt</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/f-2.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Metallic earrings</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
            <div class="trend__item">
              <div class="trend__item__pic">
                <img src="{{ asset('assets/img/trend/f-3.jpg') }}" alt="" />
              </div>
              <div class="trend__item__text">
                <h6>Flap cross-body bag</h6>
                <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                </div>
                <div class="product__price">$ 59.0</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Trend Section End -->

  <!-- Discount Section Begin -->
  <section class="discount">
    <div class="container">
      <div class="row">
        <div class="p-0 col-lg-6">
          <div class="discount__pic">
            <img src="{{  asset('assets/img/discount.jpg') }}" alt="" />
          </div>
        </div>
        <div class="p-0 col-lg-6">
          <div class="discount__text">
            <div class="discount__text__title">
              <span>Discount</span>
              <h2>Summer 2019</h2>
              <h5><span>Sale</span> 50%</h5>
            </div>
            <div class="discount__countdown" id="countdown-time">
              <div class="countdown__item">
                <span>22</span>
                <p>Days</p>
              </div>
              <div class="countdown__item">
                <span>18</span>
                <p>Hour</p>
              </div>
              <div class="countdown__item">
                <span>46</span>
                <p>Min</p>
              </div>
              <div class="countdown__item">
                <span>05</span>
                <p>Sec</p>
              </div>
            </div>
            <a href="#">Shop now</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Discount Section End -->

  <!-- Services Section Begin -->
  <section class="services spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
            <i class="fa fa-car"></i>
            <h6>Free Shipping</h6>
            <p>For all oder over $99</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
            <i class="fa fa-money"></i>
            <h6>Money Back Guarantee</h6>
            <p>If good have Problems</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
            <i class="fa fa-support"></i>
            <h6>Online Support 24/7</h6>
            <p>Dedicated support</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6">
          <div class="services__item">
            <i class="fa fa-headphones"></i>
            <h6>Payment Secure</h6>
            <p>100% secure payment</p>
          </div>
        </div>
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