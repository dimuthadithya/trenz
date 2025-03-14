                <tr class="alert" role="alert">
                    <td>
                        <label class="checkbox-wrap checkbox-primary">
                            <input type="checkbox" checked>
                            <span class="checkmark"></span>
                        </label>
                    </td>
                    <td>
                        <div class="img" style="background-image: url(images/product-1.png);"></div>
                    </td>
                    <td>
                        <div class="email">
                            <span>{{ $product['name'] }} </span>
                            <span>{{ $product['description'] }}</span>
                        </div>
                    </td>
                    <td>${{ $product['price'] }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </td>
                </tr>