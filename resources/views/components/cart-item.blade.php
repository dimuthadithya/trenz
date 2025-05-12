<tr class="done">
    <td class="cart__product__item">
        <img src="{{ asset($product["image"]) }}" alt="" style="object-fit: contain;width: 100px;height: 100px;">
        <div class="cart__product__item__title">
            <a href="{{ route('product.show', $product["id"]) }}">
                <h6>{{ $product["name"] }}</h6>
            </a>
            <div class="mb-2 rating">
                @php
                $rating = $product["rating"];
                @endphp
                @for ($i = 0; $i < 5; $i++)
                    @if ($i < $rating)
                    <i class="fa-solid fa-star"></i>
                    @else
                    <i class="fa-regular fa-star"></i>
                    @endif
                    @endfor
            </div>
        </div>
    </td>
    <td class="cart__price">LKR <span>{{ $product["price"] }}</span></td>
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
    <td class="cart__total">LKR {{ $product["price"]*$cartQty }}.00</td>
    <td class="cart__close">
        <form action="{{ route('cart.remove', $product['id']) }}" method="POST" class="">
            @csrf
            @method('DELETE')
            <button type="submit" class="remove-from-cart"><span class="icon_close" id="removeFromCart"></span></button>
        </form>
    </td>
</tr>