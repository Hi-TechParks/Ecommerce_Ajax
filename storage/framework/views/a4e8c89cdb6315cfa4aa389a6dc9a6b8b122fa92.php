<?php $__env->startSection('content'); ?>

    <!--== Main Content Area Start ==-->
    <section class="section" id="product-details">
      <div class="container">

        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12" id="item_image">

            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--== Product Gallery Area Start ==-->
            <div class="product-image-box">
              <div class="xzoom-image-area">
                <img class="xzoom" src="/products/<?php echo e($item->PRODUCT_ID); ?>/<?php echo e($item->IMAGE_PATH); ?>" xoriginal="/products/<?php echo e($item->PRODUCT_ID); ?>/zoom/<?php echo e($item->IMAGE_PATH); ?>" />
              </div>

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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
          <div class="col-md-6 col-lg-6 col-sm-12">

            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--== Product Details Area Start ==-->
            <div class="product-details-box">
              <h2 class="product-title"><?php echo e($item->PRODUCT_NAME); ?></h2>

              <!-- <div class="product-description">Item Details: <?php echo $item->PRODUCT_DETAILS; ?></div>
              <br/> -->

              <div class="product-price">Price : <span><?php echo e($item->PRICE); ?> Taka</span></div>

              <div class="product-price">Brand : <span><?php echo e($item->BRAND_NAME); ?></span></div>


              <!-- Get Item id in hidden form -->
              <input type="hidden" name="pro_id" value="<?php echo e($item->PRODUCT_ID); ?>">
              <!-- Get Item id in hidden form -->


              <br/>
              <div class="mb-3 mt-3 quantity-button-group" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group" role="group" aria-label="Basic example">
                  <button type="button" class="btn btn-number"  disabled="disabled" data-type="minus" data-field="quant"><i class="fas fa-minus"></i></button>
                
                  <input type="text" name="quant" class="form-control input-number" value="1" min="1" max="10">
                
                  <button type="button" class="btn btn-number" data-type="plus" data-field="quant"><i class="fas fa-plus"></i></button>
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card item-details">
              <div class="card-header">
                Product details
              </div>
              <div class="card-body">

                  <?php if(count($sizes) > 0): ?>
                  <div class="product-size"><div class="title">Size :</div> <span></span>

                    <div class="sideber-inside size-sidebar">

                      <?php $__currentLoopData = $sizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_size" id="pro_size_<?php echo e($size->PRODUCT_SIZE_ID); ?>" value="<?php echo e($size->SIZE); ?>">
                        <label class="form-check-label" for="pro_size_<?php echo e($size->PRODUCT_SIZE_ID); ?>">
                          <div class="size-box">
                            <?php echo e($size->SIZE); ?>

                          </div>
                        </label>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                  </div>
                  <?php endif; ?>

                  <?php if(count($colors) > 0): ?>
                  <div class="product-color"><div class="title">Color :</div> <span></span>

                    <div class="sideber-inside color-sidebar">

                      <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="pro_color" id="pro_color_<?php echo e($color->COLOR_ID); ?>" value="<?php echo e($color->COLOR_ID); ?>">
                        <label class="form-check-label" for="pro_color_<?php echo e($color->COLOR_ID); ?>">
                          <div class="color-box" style="background: <?php echo e($color->COLOR_CODE); ?>;">
                            
                          </div>
                        </label>
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                  </div>
                  <?php endif; ?>


                  <p class="card-text"><?php echo $item->PRODUCT_DETAILS; ?></p>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php $__env->stopSection(); ?>



<script src="http://code.jquery.com/jquery-3.3.1.min.js"
       integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
       crossorigin="anonymous">
</script>

<?php echo $__env->make('ajax_item_details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/details.blade.php */ ?>