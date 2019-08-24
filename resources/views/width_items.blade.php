          
          <?php $count = 0; ?>
          @foreach( $items as $item )

              @if($count == 8 || $count == 14)
              <section class="section" id="discount">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-4 col-lg-5 col-sm-4 col-xs-12">
                      <div class="single-discount">
                        <div class="discount-image">
                          <img src="/assets/img/discount/add01.png" class="mx-auto d-block" alt="discount">
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
                          <img src="/assets/img/discount/add02.png" class="mx-auto d-block" alt="discount">
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
                          <img src="/assets/img/discount/add03.png" class="mx-auto d-block" alt="discount">
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
              @endif


              <?php $count++; ?>
              @if($count > 8)
              <!-- Single Product -->
              <div class="col-md-3 col-lg-2 col-sm-4 col-xs-12">
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

                    <div class="footer-product-button">
                      <a href="#" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
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