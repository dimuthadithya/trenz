          <div class="mb-3 card" style="max-width: 450px;">
              <div class="row g-0 ">
                  <div class="col-md-4" onclick="window.location=`{{ route('product.show', $wishlistItem->id) }}`">
                      <img src="{{ asset('assets/img/product/details/product-1.jpg') }}" class="img-fluid rounded-start" alt="...">
                  </div>
                  <div class="col-md-8">
                      <div class=" card-body">
                          <h5 class="card-title">
                              {{ $wishlistItem->name }}
                          </h5>
                          <p class="card-text">
                              {{ $wishlistItem->description }}
                          </p>
                          <p class=" align-items-center card-text d-flex">
                              <small class="text-body-secondary bold">
                                  ${{ $wishlistItem->price }}
                              </small>
                          </p>
                          <p class="card-text">
                              <button class="btn btn-danger btn-sm">
                                  <a href="" class="text-white text-decoration-none">
                                      <i class="text-white fa-solid fa-cart-plus"></i>
                                  </a>
                              </button>
                          </p>
                      </div>
                  </div>
              </div>
          </div>