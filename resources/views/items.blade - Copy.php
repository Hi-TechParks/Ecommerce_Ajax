              
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

      			@foreach($items as $item)
          	<!-- Single Product -->
              <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
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
