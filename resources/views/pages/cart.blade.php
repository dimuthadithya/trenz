      <x-app-layout>
          <!-- Shop Cart Section Begin -->
          <section class="shop-cart spad">
              <div class="container">
                  <div class="row">
                      <div class="col-lg-12">
                          <div class="shop__cart__table">
                              <table>
                                  <thead>
                                      <tr>
                                          <th>Product</th>
                                          <th>Price</th>
                                          <th>Quantity</th>
                                          <th>Total</th>
                                          <th></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($products as $product )
                                      <x-cart-item :product="$product" />
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="cart__btn">
                              <a href="#">Continue Shopping</a>
                          </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                          <div class="cart__btn update__btn">
                              <button class="border-0 btn btn-primary" id="updateCart"><span class="icon_loading"></span> Update cart</button>
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="discount__content">
                              <h6>Discount codes</h6>
                              <form action="#">
                                  <input type="text" placeholder="Enter your coupon code">
                                  <button type="submit" class="site-btn">Apply</button>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-4 offset-lg-2">
                          <div class="cart__total__procced">
                              <h6>Cart total</h6>
                              <ul>
                                  <li>Subtotal <span id="cartSubTotal"></span></li>
                                  <li>Total <span id="cartTotal"></span></li>
                              </ul>
                              <a href="{{ route('checkout') }}" class="primary-btn">Proceed to checkout</a>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- Shop Cart Section End -->
      </x-app-layout>