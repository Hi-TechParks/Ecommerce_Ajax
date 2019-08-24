@extends('layouts.master')
@section('content')

    <!--== Main Content Area Start ==-->
    <section class="section" id="product-details">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12" id="item_image">

            @foreach( $items as $item )
            <!--== Product Gallery Area Start ==-->
            <div class="product-image-box">
              <img class="xzoom" src="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" xoriginal="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" />

              <!-- <div class="xzoom-thumbs">
                <a href="//assets/img/slider/slider.png">
                  <img class="xzoom-gallery" width="80" src="//assets/img/product/dress01.png"  xpreview="//assets/img/product/dress01.png">
                </a>
                <a href="//assets/img/slider/slider.png">
                  <img class="xzoom-gallery" width="80" src="//assets/img/product/dress02.png">
                </a>
                <a href="//assets/img/slider/slider.png">
                  <img class="xzoom-gallery" width="80" src="//assets/img/product/dress03.png">
                </a>
                <a href="//assets/img/slider/slider.png">
                  <img class="xzoom-gallery" width="80" src="//assets/img/product/dress04.png">
                </a>
              </div> -->
            </div>
            <!--== Product Gallery Area End ==-->
            @endforeach

          </div>
          <div class="col-md-6 col-lg-6 col-sm-12">

            @foreach( $items as $item )
            <!--== Product Details Area Start ==-->
            <div class="product-details-box">
              <h2 class="product-title">{{ $item->PRODUCT_NAME }}</h2>

              <!-- <div class="product-description">Item Details: {!! $item->PRODUCT_DETAILS !!}</div>
              <br/> -->

              <div class="product-price">Price : <span>{{ $item->PRICE }} Taka</span></div>

              <div class="product-price">Brand : <span>{{ $item->BRAND_NAME }}</span></div>


              <!-- Get Item id in hidden form -->
              <input type="hidden" name="pro_id" value="{{ $item->PRODUCT_ID }}">
              <!-- Get Item id in hidden form -->


              @if(count($sizes) > 0)
              <div class="product-size">Size : <span></span>

                    <div class="sideber-inside size-sidebar">

                      @foreach( $sizes as $size )
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_size" id="pro_size_{{ $size->PRODUCT_SIZE_ID }}" value="{{ $size->SIZE }}">
                        <label class="form-check-label" for="pro_size_{{ $size->PRODUCT_SIZE_ID }}">
                          <div class="size-box">
                            {{ $size->SIZE }}
                          </div>
                        </label>
                      </div>
                      @endforeach

                      <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size1" value="1">
                        <label class="form-check-label" for="size1">
                          <div class="size-box">
                            30
                          </div>
                        </label>
                      </div> -->

                    </div>

              </div>
              @endif

              @if(count($colors) > 0)
              <div class="product-color">Color : <span></span>

                    <div class="sideber-inside color-sidebar">

                      @foreach( $colors as $color )
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_color" id="pro_color_{{ $color->COLOR_ID }}" value="{{ $color->COLOR_ID }}">
                        <label class="form-check-label" for="pro_color_{{ $color->COLOR_ID }}">
                          <div class="color-box" style="background: {{ $color->COLOR_CODE }};">
                            
                          </div>
                        </label>
                      </div>
                      @endforeach

                      <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="color1" value="1">
                        <label class="form-check-label" for="color1">
                          <div class="color-box cl1">
                            
                          </div>
                        </label>
                      </div> -->

                    </div>

              </div>
              @endif

              <br/>
              <div class="btn-toolbar mb-3 quantity-button-group" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-number"  disabled="disabled" data-type="minus" data-field="quant[1]"><i class="fas fa-minus"></i></button>
                </div>
                <div class="input-group">
                  <input type="text" name="quant[1]" class="form-control input-number" value="1" min="1" max="10">
                </div>
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-number" data-type="plus" data-field="quant[1]"><i class="fas fa-plus"></i></button>
                </div>
              </div>

              <div class="product-button">
                <div id="item_button_before" style="float: left;">
                  <a href="#" id="add_to_cart" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                </div>

                <div id="item_button_after" style="float: left;">

                </div>

                <a href="/order" class="product-button">Buy</a>
              </div>
              

              

            </div>
            <!--== Product Details Area End ==-->
            @endforeach

          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            @foreach( $items as $item )
            <div class="card item-details">
              <div class="card-header">
                Product details
              </div>
              <div class="card-body">

                  @if(count($sizes) > 0)
                  <div class="product-size">Size : <span></span>

                    <div class="sideber-inside size-sidebar">

                      @foreach( $sizes as $size )
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_size" id="pro_size_{{ $size->PRODUCT_SIZE_ID }}" value="{{ $size->SIZE }}">
                        <label class="form-check-label" for="pro_size_{{ $size->PRODUCT_SIZE_ID }}">
                          <div class="size-box">
                            {{ $size->SIZE }}
                          </div>
                        </label>
                      </div>
                      @endforeach
                    </div>

                  </div>
                  @endif

                  @if(count($colors) > 0)
                  <div class="product-color">Color : <span></span>

                    <div class="sideber-inside color-sidebar">

                      @foreach( $colors as $color )
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_color" id="pro_color_{{ $color->COLOR_ID }}" value="{{ $color->COLOR_ID }}">
                        <label class="form-check-label" for="pro_color_{{ $color->COLOR_ID }}">
                          <div class="color-box" style="background: {{ $color->COLOR_CODE }};">
                            
                          </div>
                        </label>
                      </div>
                      @endforeach
                    </div>

                  </div>
                  @endif


                  <p class="card-text">{!! $item->PRODUCT_DETAILS !!}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>  

      </div>
    </section>




    <section class="section" id="product">
      <div class="container">
        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">See Related Products</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <div class="row">
          <div class="owl-carousel owl-theme" id="related-product-carousel">

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

          </div>
        </div>
      </div>
    </section>



    <section class="section" id="product">
      <div class="container">
        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">See Similar Products</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <div class="row">
          <div class="owl-carousel owl-theme" id="similar-product-carousel">

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="/assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
                  </a>
                </div>
                <div class="product-footer">
                  <p class="product-title"><a href="#">Product Name</a></p>
                  <div class="product-price">$50.00 <span>(10% Off)</span></div>

                  <div class="footer-product-button">
                    <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                    <a href="#" class="product-button">Buy</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Single Product -->

          </div>
        </div>
      </div>
    </section>
    <!--== Main Content Area End ==-->

@endsection



<script src="http://code.jquery.com/jquery-3.3.1.min.js"
       integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
       crossorigin="anonymous">
</script>

@include('ajax_item_details')