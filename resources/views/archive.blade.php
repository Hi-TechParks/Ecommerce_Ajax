@extends('layouts.master')
@section('content')

    <!--== Main Content Area Start ==-->
    <section class="section" id="product">
      <div class="container-fluid">
        <div class="row">

          <!--== Sidebar Search Area Start ==-->
          <input type="hidden" name="category_name_old" class="form-control" value="{{ $category_name }}">

          <input type="hidden" name="product_name_old" class="form-control" value="{{ $product_name }}">

          @include('search')
          <!--== Sidebar Search Area End ==-->


          <!--== Product Area Start ==-->
          <main class="col-md-9 col-lg-9 col-sm-8 col-xs-12">

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

            <div class="row" id="item_view">

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

              <!-- Single Product -->
              <!-- <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
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
              </div> -->
              <!-- Single Product -->

            </div>
          </main>
          <!--== Product Area End ==-->

        </div>
      </div>
    </section>
    <!--== Main Content Area End ==-->

@endsection


<script src="http://code.jquery.com/jquery-3.3.1.min.js"
       integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
       crossorigin="anonymous">
</script>

@include('ajax_search')