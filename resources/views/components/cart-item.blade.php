<tr>
    <td class="align-middle">
        <div class="d-flex align-items-center">
            <img src="{{ asset($product["image"]) }}" alt="" class="me-3" style="object-fit: contain;width: 80px;height: 80px;">
            <div>
                <h6 class="mb-1">
                    <a href="{{ route('product.show', $product["id"]) }}" class="text-decoration-none text-dark">
                        {{ $product["name"] }}
                    </a>
                </h6>
                <div class="mb-2">
                    @php
                    $rating = $product["rating"];
                    @endphp
                    @for ($i = 0; $i < 5; $i++)
                        @if ($i < $rating)
                        <i class="fa-solid fa-star text-warning"></i>
                        @else
                        <i class="fa-regular fa-star text-warning"></i>
                        @endif
                        @endfor
                </div>
            </div>
        </div>
    </td>
    <td class="align-middle">LKR {{ number_format($product["price"], 2) }}</td>
    <td class="align-middle">
        <div class="pro-qty input-group" style="width: 130px">
            <form action="{{ route('cart.update', $product['id']) }}" method="POST" class="update-cart-form d-flex">
                @csrf
                @method('PUT')
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <button type="button" class="btn btn-outline-secondary qtybtn dec">-</button>
                <input type="text" name="quantity" value="{{ $product['cart_quantity'] }}" min="1" class="form-control text-center" readonly>
                <button type="button" class="btn btn-outline-secondary qtybtn inc">+</button>
            </form>
        </div>
    </td>
    <td class="align-middle">LKR {{ number_format($product["price"] * $product['cart_quantity'], 2) }}</td>
    <td class="align-middle">
        <form action="{{ route('cart.destroy', $product['id']) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Are you sure you want to remove this item?')">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>