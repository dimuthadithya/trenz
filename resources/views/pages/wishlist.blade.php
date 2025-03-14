      @php
      $wishlistItems = $wishlistItems->toArray();

      @endphp

      <x-app-layout>
          @push('styles')
          <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
          <link rel="stylesheet" href="{{ asset('assets/css/wishlist/css/style.css') }}">
          @endpush

          <div class="container mt-5">
              <section class=" ftco-section">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="table-wrap">
                              <table class="table">
                                  <thead class="thead-primary">
                                      <tr>
                                          <th>&nbsp;</th>
                                          <th>&nbsp;</th>
                                          <th>Product</th>
                                          <th>Price</th>
                                          <th>&nbsp;</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($wishlistItems as $product )
                                      <x-wishlist-card :product="$product"></x-wishlist-card>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </section>
          </div>

          @push('scripts')
          <script src="{{ asset('assets/js/wishlist/js/jquery.min.js') }}"></script>
          <script src="{{ asset('assets/js/wishlist/js/popper.js') }}"></script>
          <script src="{{ asset('assets/js/wishlist/js/bootstrap.min.js') }}"></script>
          <script src="{{ asset('assets/js/wishlist/js/main.js') }}"></script>
          @endpush
      </x-app-layout>