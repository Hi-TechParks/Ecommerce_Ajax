@extends('layouts.master')
@section('content')

    <!--== Slider Area Start ==-->
  	<section id="slider">
  		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		  <ol class="carousel-indicators">
  		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		  </ol>
  		  <div class="carousel-inner">

          @foreach( $slides as $slide )
  		    <div class="carousel-item">
  		      <img src="/uploads/images/slide/{{ $slide->IMAGE_PATH }}" class="d-block w-100" alt="...">
  		      <div class="carousel-caption d-none d-md-block">
  			    <div class="carouser-caption-box">
  			    	<h5>{{ $slide->IMAGE_TITLE }}</h5>
              <p>{!! $slide->IMAGE_DESC !!}</p>
  			    </div>
  			  </div>
  		    </div>
          @endforeach

  		  </div>
  		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  		    <span class="sr-only">Previous</span>
  		  </a>
  		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  		    <span class="sr-only">Next</span>
  		  </a>
  		</div>
  	</section>
    <!--== Slider Area End ==-->



    <!--== Main Content Area Start ==-->
    <section class="section" id="product">
      <div class="container-fluid">
        <div class="row">

          <!--== Sidebar Search Area Start ==-->
          <aside class="col-md-3 col-lg-3 col-sm-4 col-xs-12">
            <div class="accordion sidebar-tab" id="accordionCategory">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Product Category <span><i class="fas fa-chevron-down"></i></span>
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionCategory">
                  <div class="card-body">
                    
                    <nav id="column_left">  
                      <ul class="nav nav-list">

                        @foreach( $categories as $category )
                        <!-- <li><a href="#{{ $category->PRODUCT_CATEGORY_ID }}">{{ $category->CATEGORY_NAME }}</a></li> -->

                        <li id="pro_category_{{ $category->PRODUCT_CATEGORY_ID }}" value="{{ $category->PRODUCT_CATEGORY_ID }}">
                          <a href="#">{{ $category->CATEGORY_NAME }}
                          </a>
                        </li>
                        @endforeach

                          <!-- <li class="">
                            <a class="accordion-heading" data-toggle="collapse" data-target="#notice">
                                <span class="nav-header-primary">Notice <span class="pull-right"><b class="caret"></b></span></span>
                            </a>
                            <ul class="nav nav-list collapse" id="notice">
                              <li><a href="#">Notice List</a></li>
                              <li><a href="#">Create Notice</a></li>
                            </ul>
                          </li>

                          <li class="active">
                            <a class="accordion-heading" data-toggle="collapse" data-target="#notice2">
                                <span class="nav-header-primary">Notice <span class="pull-right"><b class="caret"></b></span></span>
                            </a>
                            <ul class="nav nav-list collapse" id="notice2">
                              <li><a href="#">Notice List</a></li>
                              <li><a href="#">Create Notice</a></li>
                            </ul>
                          </li> -->
                      </ul>
                    </nav>

                  </div>
                </div>
              </div>
            </div>

            <div class="accordion sidebar-tab" id="accordionRange">
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      Price Range <span><i class="fas fa-chevron-down"></i></span>
                    </button>
                  </h2>
                </div>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionRange">
                  <div class="card-body">

                    <div class="sideber-inside">
                      <input type="text" id="price_range_slider" name="my_range" value="" />
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="accordion sidebar-tab" id="accordionBrand">
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                      Brand <span><i class="fas fa-chevron-down"></i></span>
                    </button>
                  </h2>
                </div>
                <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionBrand">
                  <div class="card-body">
                    
                    <div class="sideber-inside">

                      @foreach( $brands as $brand )
                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="pro_brand_{{ $brand->BRAND_ID }}" value="{{ $brand->BRAND_ID }}" name="pro_brand">
                        <label class="custom-control-label" for="pro_brand_{{ $brand->BRAND_ID }}">{{ $brand->BRAND_NAME }}</label>
                      </div>
                      @endforeach


                      <!-- @foreach( $brands as $brand )
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="pro_brand_{{ $brand->BRAND_ID }}" value="{{ $brand->BRAND_ID }}">
                        <label class="custom-control-label" for="pro_brand_{{ $brand->BRAND_ID }}">{{ $brand->BRAND_NAME }}</label>
                      </div>
                      @endforeach -->

                  </div>
                </div>
              </div>
            </div>


            <div class="accordion sidebar-tab" id="accordionColor">
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                      Color <span><i class="fas fa-chevron-down"></i></span>
                    </button>
                  </h2>
                </div>
                <div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordionColor">
                  <div class="card-body">
                    
                    <div class="sideber-inside color-sidebar">

                      @foreach( $colors as $color )
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_color" id="pro_color_{{ $color->COLOR_ID }}" value="{{ $color->COLOR_ID }}">
                        <label class="form-check-label" for="pro_color_{{ $color->COLOR_ID }}">
                          <div class="color-box cl1">
                            {{ $color->COLOR_NAME }}
                          </div>
                        </label>
                      </div>
                      @endforeach

                      <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="color2" value="2">
                        <label class="form-check-label" for="color2">
                          <div class="color-box cl2">
                            
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="color3" value="3">
                        <label class="form-check-label" for="color3">
                          <div class="color-box cl3">
                            
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="color4" value="4">
                        <label class="form-check-label" for="color4">
                          <div class="color-box cl4">
                            
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="color5" value="5">
                        <label class="form-check-label" for="color5">
                          <div class="color-box cl5">
                            
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="color6" value="6">
                        <label class="form-check-label" for="color6">
                          <div class="color-box cl6">
                            
                          </div>
                        </label>
                      </div> -->

                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="accordion sidebar-tab" id="accordionSize">
              <div class="card">
                <div class="card-header" id="headingFive">
                  <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                      Size <span><i class="fas fa-chevron-down"></i></span>
                    </button>
                  </h2>
                </div>
                <div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordionSize">
                  <div class="card-body">
                    
                    <div class="sideber-inside size-sidebar">


                      @foreach( $sizes as $size )
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_size" id="pro_size_{{ $size->PRODUCT_SIZE_ID }}" value="{{ $size->PRODUCT_SIZE_ID }}">
                        <label class="form-check-label" for="pro_size_{{ $size->PRODUCT_SIZE_ID }}">
                          <div class="size-box">
                            {{ $size->SIZE }}
                          </div>
                        </label>
                      </div>
                      @endforeach


                      <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size2" value="2">
                        <label class="form-check-label" for="size2">
                          <div class="size-box">
                            32
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size3" value="3">
                        <label class="form-check-label" for="size3">
                          <div class="size-box">
                            34
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size4" value="4">
                        <label class="form-check-label" for="size4">
                          <div class="size-box">
                            36
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size5" value="5">
                        <label class="form-check-label" for="size5">
                          <div class="size-box">
                            38
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size6" value="6">
                        <label class="form-check-label" for="size6">
                          <div class="size-box">
                            40
                          </div>
                        </label>
                      </div> -->

                    </div>

                  </div>
                </div>
              </div>
            </div>

          </aside>
          <!--== Sidebar Search Area End ==-->


          <!--== Product Area Start ==-->
          <main class="col-md-9 col-lg-9 col-sm-8 col-xs-12">
            <div class="row" id="pro_category_view">

              <!-- Ajax search result -->
              <div id=""></div>
              <!-- Ajax search result -->

              @foreach( $items as $item )
              <!-- Single Product -->
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="/item/{{ $item->PRODUCT_ID }}">
                      <img src="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" class="mx-auto d-block" alt="product">
                    </a>
                  </div>
                  <div class="product-footer">
                    <p class="product-title"><a href="/item/{{ $item->PRODUCT_ID }}">{{ $item->PRODUCT_NAME }}</a></p>
                    <div class="product-price">{{ $item->PRICE }} <span>(10% Off)</span></div>

                    <div class="footer-product-button">
                      <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                      <a href="#" class="product-button">Buy</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Product -->
              @endforeach

              

              <!-- Single Product -->
              <!-- <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="#">
                      <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
              </div> -->
              <!-- Single Product -->

            </div>
          </main>
          <!--== Product Area End ==-->

        </div>
      </div>
    </section>


    <!--== Discount Area Start ==-->
    <section class="section" id="discount">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 col-lg-5 col-sm-4 col-xs-12">
            <div class="single-discount">
              <div class="discount-image">
                <img src="assets/img/discount/add01.png" class="mx-auto d-block" alt="discount">
                <div class="discount-details">
                  <div class="discount-details-inner">
                    <div class="discount-title">10% Discount</div>
                    <p class="discount-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                    <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
            <div class="single-discount">
              <div class="discount-image">
                <img src="assets/img/discount/add02.png" class="mx-auto d-block" alt="discount">
                <div class="discount-details">
                  <div class="discount-details-inner">
                    <div class="discount-title">10% Discount</div>
                    <p class="discount-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                    <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
            <div class="single-discount">
              <div class="discount-image">
                <img src="assets/img/discount/add03.png" class="mx-auto d-block" alt="discount">
                <div class="discount-details">
                  <div class="discount-details-inner">
                    <div class="discount-title">10% Discount</div>
                    <p class="discount-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>
                    <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== Discount Area End ==-->


    <!--== Product Carousel Area Start ==-->
    <section class="section" id="product">
      <div class="container">
        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">New Items</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <div class="row">
          <div class="owl-carousel owl-theme" id="product-carousel">

            <!-- Single Product -->
            <div class="item">
              <div class="single-product">
                <div class="header-product-button">
                  <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                  <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                </div>
                <div class="product-box">
                  <a href="#">
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
                    <img src="assets/img/product/dress04.png" class="mx-auto d-block" alt="product">
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
    <!--== Product Carousel Area End ==-->


    <!--== Banner Area Start ==-->
    <section class="section" id="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="banner-area">
              <img src="assets/img/advertise2.png" class="mx-auto d-block" alt="banner">
            </div>
          </div>
        </div>
      </div>      
    </section>
    <!--== Banner Area End ==-->



    <!--== Review Area Start ==-->
    <section class="section" id="review">
      <div class="container">
        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">What the say about us</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="review-image">
              <img src="assets/img/clients.png" alt="review">
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-12">

            <div class="row">
            <div class="owl-carousel owl-theme" id="review-carousel">

              <!-- Single Reivew -->
              <div class="card">
                <div class="card-body">
                  <div class="person-box-footer">
                    <div class="card-icon"><i class="fas fa-quote-right"></i></div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  took a galley of type and scrambled it to make a type specimen book to continue <a href="#"> Read More</a>
                  </div>
                  <div class="person-box-header">
                    <div class="person-box-image">
                      <img src="assets/img/client/student1.jpg" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="person-box-info">
                      <h5 class="card-title">Samilana Tiktok</h5>
                      <p class="card-text">Buy 210+ Products</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Reivew -->

              <!-- Single Reivew -->
              <div class="card">
                <div class="card-body">
                  <div class="person-box-footer">
                    <div class="card-icon"><i class="fas fa-quote-right"></i></div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  took a galley of type and scrambled it to make a type specimen book to continue <a href="#"> Read More</a>
                  </div>
                  <div class="person-box-header">
                    <div class="person-box-image">
                      <img src="assets/img/client/student1.jpg" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="person-box-info">
                      <h5 class="card-title">Samilana Tiktok</h5>
                      <p class="card-text">Buy 210+ Products</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Reivew -->

              <!-- Single Reivew -->
              <div class="card">
                <div class="card-body">
                  <div class="person-box-footer">
                    <div class="card-icon"><i class="fas fa-quote-right"></i></div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  took a galley of type and scrambled it to make a type specimen book to continue <a href="#"> Read More</a>
                  </div>
                  <div class="person-box-header">
                    <div class="person-box-image">
                      <img src="assets/img/client/student1.jpg" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="person-box-info">
                      <h5 class="card-title">Samilana Tiktok</h5>
                      <p class="card-text">Buy 210+ Products</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Reivew -->

            </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!--== Review Area End ==-->



    <!--== Pay Method Support Area Start ==-->
    <section class="section" id="support">
      <div class="container">
        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">We Support</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <div class="row text-center">

          <div class="single-support">
            <img src="assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="assets/img/paymethod/bkash.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="assets/img/paymethod/bkash.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="assets/img/paymethod/bkash.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>
          
        </div>
      </div>
    </section>
    <!--== Pay Method Support Area End ==-->

    <!--== Main Content Area End ==-->

@endsection



<script src="http://code.jquery.com/jquery-3.3.1.min.js"
       integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
       crossorigin="anonymous">
</script>

@include('ajax_search')