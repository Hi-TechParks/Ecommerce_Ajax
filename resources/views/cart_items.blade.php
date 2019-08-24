                  <!--== Cart Summary Area Start ==-->
                  
                    <div class="card-header">
                      Cart Summary
                    </div>
                    <div class="card-body table-responsive">
                      <table class="table table-striped table-hover">
                        <thead>
                          <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                            <th scope="col">&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach( $cart_items as $cart_item )
                          <tr>
                            <td>
                              <a href="#"><img src="/products/{{ $cart_item->PRODUCT_ID }}/{{ $cart_item->IMAGE_PATH }}" class="img-fluid mx-auto d-block" alt="Product"></a>
                            </td>
                            <td><a href="#">{{ $cart_item->PRODUCT_NAME }}</a></td>
                            <td>{{ $cart_item->PRICE }} Tk</td>
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

                        </tbody>
                      </table>
                    </div>
                    <div class="card-footer">
                      <a href="/order" class="btn order-button">Checkout Now</a>
                    </div>

                  <!--== Cart Summary Area End ==-->




    <!-- Ajax Remove Cart Item -->
    @foreach( $cart_items as $cart_item )
    <script>
     jQuery(document).ready(function(){
        jQuery(document).on('click', '#remove_cart_item_{{ $cart_item->CART_ID }}', function(e) {
          //alert(jQuery('#remove_cart_item_{{ $cart_item->CART_ID }}').val())
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "{{ url('/cart/remove') }}",
           method: 'get',
           data: {
              cart_id: jQuery('#remove_cart_item_{{ $cart_item->CART_ID }}').val()
           },
           success: function(result){
              console.log(result.values);
              jQuery('#cart_items_load').show();
              jQuery('#cart_items_load').html(result.values);
              jQuery('#cart_page_items_load').show();
              jQuery('#cart_page_items_load').html(result.page_data);
           }});

            // list reload after action
            //$("#cart_items_load").load(" #cart_items_load > *");
        });
     });
    </script>
    @endforeach