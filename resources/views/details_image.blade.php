            @foreach( $items as $item )
            <!--== Product Gallery Area Start ==-->
            <div class="product-image-box">
              <div class="xzoom-image-area">
                <img class="xzoom" src="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" xoriginal="/products/{{ $item->PRODUCT_ID }}/zoom/{{ $item->IMAGE_PATH }}" />
              </div>

              <script type="text/javascript">
                /* calling script */
                $(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});
              </script>

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