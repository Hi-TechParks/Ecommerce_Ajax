                    @foreach( $cart_items as $cart_item )
                    <tr>
                      <td>
                        <a href="#"><img src="/products/{{ $cart_item->PRODUCT_ID }}/{{ $cart_item->IMAGE_PATH }}" class="img-fluid mx-auto d-block" alt="Product"></a>
                      </td>
                      <td><a href="#">{{ $cart_item->PRODUCT_NAME }}</a></td>
                      <td>
                        <input type="number" class="form-control" name="" value="{{ $cart_item->QTY }}" min="1">
                      </td>
                      <td>{{ $cart_item->PRICE }} Tk</td>
                      <td> Tk</td>
                      <td>
                        <ul>
                        <li class="remove_cart_item" id="remove_cart_item_{{ $cart_item->CART_ID }}" value="{{ $cart_item->CART_ID }}"><i class="fas fa-window-close"></i>

                          <!-- Get Cart id in hidden form -->
                          <input type="hidden" name="cart_id" value="{{ $cart_item->CART_ID }}">
                          <!-- Get Cart id in hidden form -->
                        </li>
                        </ul>
                      </td>
                    </tr>
                    @endforeach