                <tr class="alert" role="alert">
                    <td>
                        {{ $indexVal }}
                    </td>
                    <td>
                        <div class="form-group d-flex">
                            <x-text-input type=" text" value="{{ $product['name'] }}" />
                            <x-text-input type=" text" value="{{ $product['slug'] }}" />
                        </div>
                    </td>
                    <td>
                        <div class="img" style="background-image: url(images/product-1.png);"></div>
                    </td>
                    <td>
                        <x-text-input type=" text" value="{{ $product['description'] }}" />
                    </td>
                    <td>
                        <x-text-input type="text" value="{{ $product['price'] }}" />
                    </td>
                    <td>
                        <x-text-input type="text" value="{{ $product['stock'] }}" />
                    </td>
                    <td>
                        <x-text-input type="text" value="{{ $product['category_id'] }}" />
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </td>
                </tr>