<tr>
    <td class="cart__product__item">
        <img src="{{ asset($product["image"]) }}" alt="" style="object-fit: contain;width: 100px;height: 100px;">
        <div class="cart__product__item__title">
            <h6>{{ $product["name"] }}</h6>
            <div class="rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
        </div>
    </td>
    <td class="cart__price">${{ $product["price"] }}</td>
    <td class="cart__quantity">
        <div class="pro-qty">
            <form action="{{ route('cart.update', $product['id']) }}" method="POST" class="update-cart-form">
                @csrf
                @method('PUT')
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                @php
                use App\Models\Cart;

                $cartQty = Cart::where('user_id', auth()->user()->id)
                ->where('product_id', $product['id'])
                ->first()->quantity;


                @endphp
                <input type="number" name="quantity" value="{{ $cartQty }}" min="1">
            </form>
        </div>
    </td>
    <td class="cart__total">${{ $product["price"]*$cartQty }}</td>
    <td class="cart__close">
        <form action="{{ route('cart.remove', $product['id']) }}" method="POST" class="">
            @csrf
            @method('DELETE')
            <button type="submit" class="remove-from-cart"><span class="icon_close" id="removeFromCart"></span></button>
        </form>
    </td>


</tr>