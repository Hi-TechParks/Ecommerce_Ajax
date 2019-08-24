@extends('layouts.master')
@section('content')

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

                          <li class="">
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
                          </li>

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
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Arong</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label" for="customCheck2">Grammenchek</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck3">
                        <label class="custom-control-label" for="customCheck3">Yellow</label>
                      </div>

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck4">
                        <label class="custom-control-label" for="customCheck4">Lereve</label>
                      </div>
                    </div>

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
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="color" id="color1" value="1">
                        <label class="form-check-label" for="color1">
                          <div class="color-box cl1">
                            
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
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
                      </div>
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
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="size" id="size1" value="1">
                        <label class="form-check-label" for="size1">
                          <div class="size-box">
                            30
                          </div>
                        </label>
                      </div>
                      <div class="form-check form-check-inline">
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
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </aside>
          <!--== Sidebar Search Area End ==-->


          <!--== Product Area Start ==-->
          <main class="col-md-9 col-lg-9 col-sm-8 col-xs-12">
            <div class="row">

              <!-- Single Product -->
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="#">
                      <img src="assets/img/product/dress01.png" class="mx-auto d-block" alt="product">
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
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="#">
                      <img src="assets/img/product/dress02.png" class="mx-auto d-block" alt="product">
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
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="#">
                      <img src="assets/img/product/dress03.png" class="mx-auto d-block" alt="product">
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
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
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
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="#">
                      <img src="assets/img/product/dress01.png" class="mx-auto d-block" alt="product">
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
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="#">
                      <img src="assets/img/product/dress02.png" class="mx-auto d-block" alt="product">
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
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="#">
                      <img src="assets/img/product/dress03.png" class="mx-auto d-block" alt="product">
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
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
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
          </main>
          <!--== Product Area End ==-->

        </div>
      </div>
    </section>
    <!--== Main Content Area End ==-->

@endsection