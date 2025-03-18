      @php
      $products = $products->toArray();

      @endphp

      <x-admin-app-layout>
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
                                          <th>&nbsp;</th>
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

      </x-admin-app-layout>