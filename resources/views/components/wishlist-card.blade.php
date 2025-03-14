      <div class="mb-3 card" style="max-width: 540px;">
          <div class="row g-0">
              <div class="col-md-4">
                  <img src="{{ asset('assets/img/product/details/product-1.jpg') }}" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <h5 class="card-title">{{ $wishlistItem->name }}</h5>
                      <p class="card-text">
                          {{ $wishlistItem->description }}
                      </p>
                      <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                  </div>
              </div>
          </div>
      </div>