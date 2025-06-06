@php
use App\Models\Cart;
@endphp

<x-app-layout>
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container"></div>
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <form action="{{ route('order.create') }}" class="checkout__form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-8">
                        <h5>Billing detail</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>First Name <span>*</span></p>
                                    <input type="text" name="fname" value="{{ $defaultAddress->fname ?? old('fname') }}">
                                    @error('fname')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Last Name <span>*</span></p>
                                    <input type="text" name="lname" value="{{ $defaultAddress->lname ?? old('lname') }}">
                                    @error('lname')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Country <span>*</span></p>
                                    <input type="text" name="country" value="{{ $defaultAddress->country ?? old('country') }}">
                                    @error('country')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="checkout__form__input">
                                    <p>Address <span>*</span></p>
                                    <input type="text" name="address" placeholder="Address" value="{{ $defaultAddress->address ?? old('address') }}">
                                    @error('address')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="checkout__form__input">
                                    <p>Town/City <span>*</span></p>
                                    <input type="text" name="city" value="{{ $defaultAddress->city ?? old('city') }}">
                                    @error('city')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="checkout__form__input">
                                    <p>Postcode/Zip <span>*</span></p>
                                    <input type="text" name="postcode" value="{{ $defaultAddress->zip_code ?? old('postcode') }}">
                                    @error('postcode')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Phone <span>*</span></p>
                                    <input type="text" name="phone" value="{{ $defaultAddress->phone_number ?? old('phone') }}">
                                    @error('phone')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" name="email" value="{{ $defaultAddress->email ?? old('email') }}">
                                    @error('email')
                                    <p class="mt-0 text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout__order">
                            <h5>Your order</h5>
                            <div class="checkout__order__product">
                                <ul>
                                    <li>
                                        <span class="top__text">Product</span>
                                        <span class="top__text__right">Total</span>
                                    </li>

                                    @foreach ($products as $product )
                                    @php
                                    $cartQty = Cart::where('user_id', auth()->user()->id)
                                    ->where('product_id', $product['id'])
                                    ->first()->quantity;
                                    $itemTotal = $product['price'] * $cartQty;
                                    @endphp
                                    <li class="py-2 border-2 d-flex justify-content-between border-bottom">
                                        <span class="w-50 fw-medium">{{$loop->iteration }}. {{ $product['name'] }} (× {{ $cartQty }})</span>
                                        <span class="">LKR {{ number_format($itemTotal, 2) }}</span>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="checkout__order__total">
                                <ul>
                                    <li>Total
                                        <span>LKR {{ number_format($cartItemsTotal, 2) }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="checkout__order__widget">
                                <label for="cod">
                                    Cash On Delivery
                                    <input type="radio" name="payment_method" id="cod" value="cod" required checked>
                                    <span class="checkmark"></span>
                                </label>
                                <label for="card">
                                    Card Payment
                                    <input type="radio" name="payment_method" id="card" value="card" required>
                                    <span class="checkmark"></span>
                                </label>
                                <label for="paypal">
                                    PayPal
                                    <input type="radio" name="payment_method" id="paypal" value="paypal" required>
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('payment_method')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="submit" class="site-btn" value="Place an order">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- Checkout Section End -->


</x-app-layout>