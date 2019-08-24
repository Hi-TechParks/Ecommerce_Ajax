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
                      <ul class="nav nav-list" id="sidebar-nav">

                        @foreach( $categories as $category )
                        <!-- <li><a href="#{{ $category->PRODUCT_CATEGORY_ID }}">{{ $category->CATEGORY_NAME }}</a></li> -->

                        <li class="pro_cate" id="pro_category_{{ $category->PRODUCT_CATEGORY_ID }}" value="{{ $category->PRODUCT_CATEGORY_ID }}">
                          <a href="#">
                            <span><i class="fas fa-angle-right"></i></span> 
                            {{ $category->CATEGORY_NAME }}
                          </a>
                        </li>
                        @endforeach

                      </ul>
                    </nav>

                  </div>
                </div>
              </div>
            </div>
            
            <!-- Search Filter -->

            <div id="search_filers">
            <!-- Dynamic Ajax Filter Option -->

            @foreach( $left_banners as $left_banner )
            <!-- Sidebar Temporary Ad Portion -->
            <div class="single-discount">
              <div class="discount-image">
                <img src="/uploads/images/banner/{{ $left_banner->IMAGE_PATH }}" class="mx-auto d-block" alt="discount">
                <div class="discount-details">
                  <div class="discount-details-inner">
                    <div class="discount-title">{{ $left_banner->BANNER_TITLE }}</div>
                    <p class="discount-desc">{{ $left_banner->BANNER_DESC }}</p>
                    <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Sidebar Temporary Ad Portion -->
            @endforeach
              
            </div>
            <!-- Search Filter -->