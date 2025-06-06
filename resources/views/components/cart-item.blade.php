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
        <form action="{{ route('cart.update', $product['id']) }}" method="POST" class="update-cart-form">
            @csrf
            @method('PUT')
            <div class="input-group" style="width: 120px">
                <button type="button" class="btn btn-outline-secondary qtybtn dec"><i class="fas fa-minus"></i></button>
                <input type="text" name="quantity" value="{{ $product['cart_quantity'] }}" class="px-2 text-center form-control" readonly>
                <button type="button" class="btn btn-outline-secondary qtybtn inc"><i class="fas fa-plus"></i></button>
            </div>
        </form>
    </td>
    <td class="align-middle">LKR {{ number_format($product["price"] * $product['cart_quantity'], 2) }}</td>
    <td class="align-middle">
        <form action="{{ route('cart.destroy', $product['id']) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-0 btn btn-link text-danger" onclick="return confirm('Are you sure you want to remove this item?')">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>