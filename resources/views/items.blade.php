              
          @if(!empty($categories_msg) || !empty($product_name))
              @if(count($categories_msg) > 0)
                <div class="alert alert-success text-center mx-auto d-block" role="alert">
                  You Search For Category: 
                  @foreach( $categories_msg as $category )
                    <strong>{{ $category->CATEGORY_NAME }}</strong>
                  @endforeach
                  And Item Name: 
                    <strong>{{ $product_name }}</strong>
                </div>
              @endif

              @if(count($categories_msg) <= 0)
                <div class="alert alert-success text-center mx-auto d-block" role="alert">
                  You Search For Category: 
                    <strong>All</strong>
                  And Item Name: 
                    <strong>{{ $product_name }}</strong>
                </div>
              @endif
          @endif


              <div class="container">
                <div class="row mx-auto d-block">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      {{ $items->links() }}
                    </ul>
                  </nav>
                </div>
              </div>


              @if(count($items) <= 0)
                <div class="alert alert-danger text-center mx-auto d-block" role="alert">
                  Sorry!!! No Item Found On Your Filter...
                </div>
              @endif
              

              <?php $count = 0; ?>
              @foreach( $items as $item )
                  
              <?php $count++; ?>

              @if($count <= 8)
              <!-- Single Product -->
              <div class="item-4">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="/item/{{ $item->PRODUCT_ID }}" target="_blank">
                      <img src="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" class="mx-auto d-block" alt="product">
                    </a>
                  </div>
                  <div class="product-footer">
                    <p class="product-title"><a href="/item/{{ $item->PRODUCT_ID }}" target="_blank">{{ $item->PRODUCT_NAME }}</a> <span>Cat: {{ $item->CATEGORY_NAME }}</span></p>
                    <div class="product-price">{{ $item->PRICE }} Tk <span>(10% Off)</span></div>

                    <!-- Get Item id in hidden form -->
                    <input type="hidden" name="pro_id" id="pro_id_{{ $item->PRODUCT_ID }}" value="{{ $item->PRODUCT_ID }}">
                    <!-- Get Item id in hidden form -->

                    <div class="footer-product-button">
                      <a href="#" id="add_to_cart_{{ $item->PRODUCT_ID }}" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                      <a href="#" class="product-button">Buy</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Product -->
              @endif

              @endforeach



              
              <!-- width item start -->
              <section>
                <div class="container-fluid">
                  <div class="row">
                    <?php $count = 0; ?>
                    @foreach( $items as $item )

                        @if($count == 8)
                        <section class="section" id="discount">
                          <div class="container-fluid">
                            <div class="row">

                              <?php $banner_count = 0; ?>
                              @foreach( $banners as $banner )
                              <?php $banner_count++; ?>

                              @if($banner_count <= 3)

                              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <div class="single-discount">
                                  <div class="discount-image">
                                    <img src="/uploads/images/banner/{{ $banner->IMAGE_PATH }}" class="mx-auto d-block" alt="discount">
                                    <div class="discount-details">
                                      <div class="discount-details-inner">
                                        <div class="discount-title">{{ $banner->BANNER_TITLE }}</div>
                                        <p class="discount-desc">{{ $banner->BANNER_DESC }}</p>
                                        <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @endif
                              @endforeach

                            </div>
                          </div>
                        </section>
                        @endif


                        @if($count == 14)
                        <section class="section" id="discount">
                          <div class="container-fluid">
                            <div class="row">

                              <?php $banner_count = 0; ?>
                              @foreach( $banners as $banner )
                              <?php $banner_count++; ?>

                              @if($banner_count >= 4 && $banner_count <= 6)

                              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <div class="single-discount">
                                  <div class="discount-image">
                                    <img src="/uploads/images/banner/{{ $banner->IMAGE_PATH }}" class="mx-auto d-block" alt="discount">
                                    <div class="discount-details">
                                      <div class="discount-details-inner">
                                        <div class="discount-title">{{ $banner->BANNER_TITLE }}</div>
                                        <p class="discount-desc">{{ $banner->BANNER_DESC }}</p>
                                        <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              @endif
                              @endforeach

                            </div>
                          </div>
                        </section>
                        @endif


                        <?php $count++; ?>
                        @if($count > 8)
                        <!-- Single Product -->
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-12 item-width">
                          <div class="single-product">
                            <div class="header-product-button">
                              <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                              <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                            </div>
                            <div class="product-box">
                              <a href="/item/{{ $item->PRODUCT_ID }}" target="_blank">
                                <img src="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" class="mx-auto d-block" alt="product">
                              </a>
                            </div>
                            <div class="product-footer">
                              <p class="product-title"><a href="/item/{{ $item->PRODUCT_ID }}" target="_blank">{{ $item->PRODUCT_NAME }}</a> <span>Cat: {{ $item->CATEGORY_NAME }}</span></p>
                              <div class="product-price">{{ $item->PRICE }} Tk <span>(10% Off)</span></div>

                              <!-- Get Item id in hidden form -->
                              <input type="hidden" name="pro_id" id="pro_id_{{ $item->PRODUCT_ID }}" value="{{ $item->PRODUCT_ID }}">
                              <!-- Get Item id in hidden form -->

                              <div class="footer-product-button">
                                <a href="#" id="add_to_cart_{{ $item->PRODUCT_ID }}" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                                <a href="#" class="product-button">Buy</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Single Product -->
                        @endif

                    @endforeach


                        <div class="container">
                          <div class="row mx-auto d-block">
                            <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-center">
                                {{ $items->links() }}
                              </ul>
                            </nav>
                          </div>
                        </div>
                        
                  </div>
                </div>
              </section>
              <!-- width item end -->



    <!-- Ajax item cart from Home Page function -->
    @foreach( $items as $item )
    <script>
     jQuery(document).ready(function(){
        jQuery(document).on('click', '#add_to_cart_{{ $item->PRODUCT_ID }}', function(e) {
          //alert(jQuery('#pro_id_{{ $item->PRODUCT_ID }}').val())
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "{{ url('/cart') }}",
           method: 'get',
           data: {
              pro_id: jQuery('#pro_id_{{ $item->PRODUCT_ID }}').val(),
              pro_color: jQuery('[name="pro_color"]:checked').val(),
              pro_size: jQuery('[name="pro_size"]:checked').val(),
              pro_qty: 1
           },
           success: function(result){
              console.log(result.values);
              jQuery('#item_button_before').hide();
              jQuery('#item_button_after').show();
              jQuery('#item_button_after').html(result.values);
              jQuery('#cart_items_load').show();
              jQuery('#cart_items_load').html(result.cart);
           }});

            // list reload after action
            //$("#cart_items_load").load(" #cart_items_load > *");
            // Hide and show top car list
            $('#top_cart_list').addClass('cart_list_show');
        });
     });
    </script>
    @endforeach