      <x-admin-app-layout>
          <div class="container mx-auto mt-5 col-lg-6">
              <h1 class="mb-3 display-6">
                  Create New Product
              </h1>
              <div class="mt-3 accordion" id="accordionPanelsStayOpenExample">
                  <div class="accordion-item">
                      <h2 class="accordion-header">
                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                              <p class="p-0 m-0 fw-bold d-flex align-items-center"><i class="fas fa-info-circle me-3 fs-2"></i> <span>Product Info</span></p>
                          </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                          <div class="accordion-body">
                              <div class="container mt-5 mb-5 d-flex justify-content-center">
                                  <div class="px-1 py-4 card">
                                      <div class="card-body">
                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group">
                                                      <input class="form-control" type="text" placeholder="Product Name">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group">
                                                      <input class="form-control" type="number" placeholder="Price" min="0">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group">
                                                      <input class="form-control" type="number" placeholder="Stock" min="0">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group">
                                                      <input class="form-control" type="text" placeholder="Slug">
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-sm-12">
                                                  <div class="form-group">
                                                      <select class="form-control">
                                                          <option selected disabled>Select Category</option>
                                                          <option value="electronics">Electronics</option>
                                                          <option value="fashion">Fashion</option>
                                                          <option value="home">Home & Living</option>
                                                          <option value="beauty">Beauty & Health</option>
                                                      </select>
                                                  </div>
                                              </div>
                                          </div>

                                          <div class="px-5 mt-3 mb-3 text-center d-flex flex-column">
                                              <small class="agree-text">By adding this product, you agree to the</small>
                                              <a href="#" class="terms">Terms & Conditions</a>
                                          </div>
                                          <button class="btn btn-primary btn-block confirm-button">Add Product</button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="accordion-item">
                      <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                              <p class="p-0 m-0 fw-bold d-flex align-items-center"><i class=" fas fa-box me-3 fs-2"></i> <span>Name and description</span></p>
                          </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                          <div class="accordion-body">
                              <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                      </div>
                  </div>
                  <div class="accordion-item">
                      <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                              <p class="p-0 m-0 fw-bold d-flex align-items-center"><i class=" fas fa-images me-3 fs-2"></i> <span>Images</span></p>
                          </button>
                      </h2>
                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                          <div class="accordion-body">
                              <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </x-admin-app-layout>