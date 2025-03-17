      @php
      $products = $products->toArray();

      @endphp

      <x-admin-app-layout>
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
                                          <th>#</th>
                                          <th>Name | Slug</th>
                                          <th>Image</th>
                                          <th>Description</th>
                                          <th>Price</th>
                                          <th>Stock</th>
                                          <th>Category</th>
                                          <th>Actions</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($products as $product )
                                      <x-admin.product-row :product="$product" :indexVal="$loop->iteration" />
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </section>
          </div>

          @push('scripts')
          <script src=" {{ asset('assets/js/wishlist/js/jquery.min.js') }}"></script>
          <script src="{{ asset('assets/js/wishlist/js/popper.js') }}"></script>
          <script src="{{ asset('assets/js/wishlist/js/bootstrap.min.js') }}"></script>
          <script src="{{ asset('assets/js/wishlist/js/main.js') }}"></script>
          @endpush
      </x-admin-app-layout>