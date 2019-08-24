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

                      <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="pro_brand_0" value="" name="pro_brand" checked>
                        <label class="custom-control-label" for="pro_brand_0">All Brand</label>
                      </div>

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

                      <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_color" id="pro_color_0" value="">
                        <label class="form-check-label" for="pro_color_0">
                          <div class="color-box">
                            All
                          </div>
                        </label>
                      </div> -->

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

                      <!-- <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_size" id="pro_size_0" value="">
                        <label class="form-check-label" for="pro_size_0">
                          <div class="size-box">
                            All
                          </div>
                        </label>
                      </div> -->

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