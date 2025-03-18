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
                        <!-- <x-text-input type=" text" value="{{ $product['description'] }}" /> -->
                        <!-- Button trigger modal -->
                        <input type="text" class="form-control" data-bs-toggle="modal" data-bs-target="#exampleModal" value="{{ $product['description'] }}">

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $product['name'] }}</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea id="mytextarea">
                                        {{ $product['description'] }}
                                        </textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <x-text-input type="text" value="{{ $product['price'] }}" />
                    </td>
                    <td>
                        <x-text-input type="text" value="{{ $product['stock'] }}" />
                    </td>
                    <td>
                        <button class="btn btn-success btn-sm"><i class=" fas fa-check-circle"></i></button>
                    </td>
                    <td>
                        <x-text-input type="text" value="{{ $product['category_id'] }}" />
                    </td>
                    <td class="">
                        <button class="btn btn-danger btn-sm">
                            <!-- <span>Remove</span> -->
                            <i class="icon-trash"></i>
                        </button>
                    </td>
                </tr>