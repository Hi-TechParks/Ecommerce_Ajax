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
                      <!-- <input type="text" id="price_range_slider" name="my_range" value="" />

                      <script type="text/javascript">
                        $("#price_range_slider").ionRangeSlider({
                              type: "double",
                              grid: true,
                              min: 0,
                              max: 1000,
                              from: 0,
                              to: 1000,
                              prefix: "$"
                          });
                      </script> -->

                      <select class="form-control" id="price_range_slider" name="my_range">
                        <option value="0;100000">Select Price Range (All Range)</option>
                        <option value="0;100">0 to 100 Tk</option>
                        <option value="101;500">101 to 500 Tk</option>
                        <option value="501;1000">501 to 1000 Tk</option>
                        <option value="1001;5000">1001 to 5000 Tk</option>
                        <option value="5001;10000">5001 to 10000 Tk</option>
                        <option value="10001;100000">10000+ Tk</option>
                      </select>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            @if(count($brands) > 0)
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
                        <input type="radio" class="custom-control-input pro_brand" id="pro_brand_{{ $brand->BRAND_ID }}" value="{{ $brand->BRAND_ID }}" name="pro_brand">
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
            </div>
            @else
            <input type="hidden" name="pro_brand">
            @endif


            @if(count($colors) > 0)
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
                          <div class="color-box" style="background: {{ $color->COLOR_CODE }};">
                            
                          </div>
                        </label>
                      </div>
                      @endforeach

                    </div>

                  </div>
                </div>
              </div>
            </div>
            @else
            <input type="hidden" name="pro_color">
            @endif


            @if(count($sizes) > 0)
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

                    </div>

                  </div>
                </div>
              </div>
            </div>
            @else
            <input type="hidden" name="pro_size">
            @endif