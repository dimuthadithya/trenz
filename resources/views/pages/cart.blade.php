<x-app-layout>
    <!-- Shop Cart Section Begin -->
    <section class="py-5 shop-cart">
        <div class="container">
            @if(count($products) > 0)
            <div class="mb-4 card">
                <div class="table-responsive">
                    <table class="table mb-0 table-hover">
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
                            @foreach ($products as $product)
                            <x-cart-item :product="$product" />
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mb-4 row">
                <div class="col-md-6">
                    <div class="gap-3 d-flex">
                        <a href="{{ route('shop') }}" class="btn btn-outline-secondary">
                            Continue Shopping
                        </a>
                        <button id="updateCart" class="btn btn-primary">
                            Update Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 ms-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="mb-4 card-title">Order Summary</h5>
                            <div class="mb-3">
                                <div class="mb-2 d-flex justify-content-between">
                                    <span class="text-muted">Subtotal</span>
                                    <span class="fw-bold" id="cartSubTotal"></span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="text-muted">Total</span>
                                    <span class="fw-bold" id="cartTotal"></span>
                                </div>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn btn-primary w-100">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="py-5 text-center">
                <div class="mb-4">
                    <svg class="mx-auto" width="48" height="48" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h2 class="mb-3 h4">Your cart is empty</h2>
                <p class="mb-4 text-muted">Looks like you haven't added anything to your cart yet.</p>
                <a href="{{ route('shop') }}" class="btn btn-primary">
                    Start Shopping
                </a>
            </div>
            @endif
        </div>
    </section>
    <!-- Shop Cart Section End -->

    @push('scripts')
    <script>
        function updateCartTotals() {
            let subtotal = 0;
            document.querySelectorAll('tbody tr').forEach(row => {
                const price = parseFloat(row.querySelector('td:nth-child(2)').textContent.replace('LKR ', '').replace(',', ''));
                const quantity = parseInt(row.querySelector('input[name="quantity"]').value);
                const total = price * quantity;
                subtotal += total;

                // Update row total
                row.querySelector('td:nth-child(4)').textContent = 'LKR ' + total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            });

            // Update cart totals
            document.getElementById('cartSubTotal').textContent = 'LKR ' + subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            document.getElementById('cartTotal').textContent = 'LKR ' + subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initial calculation of totals
            updateCartTotals();

            // Handle quantity changes
            document.querySelectorAll('.pro-qty').forEach(container => {
                container.addEventListener('click', function(e) {
                    if (!e.target.classList.contains('qtybtn') && !e.target.parentElement.classList.contains('qtybtn')) return;

                    const button = e.target.classList.contains('qtybtn') ? e.target : e.target.parentElement;
                    const form = button.closest('form');
                    const input = form.querySelector('input[name="quantity"]');
                    const oldValue = parseInt(input.value);
                    let newValue;

                    if (button.classList.contains('inc')) {
                        newValue = oldValue + 1;
                    } else {
                        newValue = oldValue > 1 ? oldValue - 1 : 1;
                    }

                    input.value = newValue;
                    updateCartTotals();
                    form.submit();
                });
            });

            // Handle update cart button
            document.getElementById('updateCart')?.addEventListener('click', function() {
                document.querySelectorAll('.update-cart-form').forEach(form => form.submit());
            });
        });
    </script>
    @endpush
</x-app-layout>