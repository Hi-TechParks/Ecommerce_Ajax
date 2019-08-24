              
          <?php if(!empty($categories_msg) || !empty($product_name)): ?>
              <?php if(count($categories_msg) > 0): ?>
                <div class="alert alert-success text-center mx-auto d-block" role="alert">
                  You Search For Category: 
                  <?php $__currentLoopData = $categories_msg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <strong><?php echo e($category->CATEGORY_NAME); ?></strong>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  And Item Name: 
                    <strong><?php echo e($product_name); ?></strong>
                </div>
              <?php endif; ?>

              <?php if(count($categories_msg) <= 0): ?>
                <div class="alert alert-success text-center mx-auto d-block" role="alert">
                  You Search For Category: 
                    <strong>All</strong>
                  And Item Name: 
                    <strong><?php echo e($product_name); ?></strong>
                </div>
              <?php endif; ?>
          <?php endif; ?>


              <div class="container">
                <div class="row mx-auto d-block">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <?php echo e($items->links()); ?>

                    </ul>
                  </nav>
                </div>
              </div>


              <?php if(count($items) <= 0): ?>
                <div class="alert alert-danger text-center mx-auto d-block" role="alert">
                  Sorry!!! No Item Found On Your Filter...
                </div>
              <?php endif; ?>
              

              <?php $count = 0; ?>
              <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  
              <?php $count++; ?>

              <?php if($count <= 8): ?>
              <!-- Single Product -->
              <div class="item-4">
                <div class="single-product">
                  <div class="header-product-button">
                    <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                    <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                  </div>
                  <div class="product-box">
                    <a href="/item/<?php echo e($item->PRODUCT_ID); ?>" target="_blank">
                      <img src="/products/<?php echo e($item->PRODUCT_ID); ?>/<?php echo e($item->IMAGE_PATH); ?>" class="mx-auto d-block" alt="product">
                    </a>
                  </div>
                  <div class="product-footer">
                    <p class="product-title"><a href="/item/<?php echo e($item->PRODUCT_ID); ?>" target="_blank"><?php echo e($item->PRODUCT_NAME); ?></a> <span>Cat: <?php echo e($item->CATEGORY_NAME); ?></span></p>
                    <div class="product-price"><?php echo e($item->PRICE); ?> Tk <span>(10% Off)</span></div>

                    <!-- Get Item id in hidden form -->
                    <input type="hidden" name="pro_id" id="pro_id_<?php echo e($item->PRODUCT_ID); ?>" value="<?php echo e($item->PRODUCT_ID); ?>">
                    <!-- Get Item id in hidden form -->

                    <div class="footer-product-button">
                      <a href="#" id="add_to_cart_<?php echo e($item->PRODUCT_ID); ?>" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                      <a href="#" class="product-button">Buy</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Product -->
              <?php endif; ?>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



              
              <!-- width item start -->
              <section>
                <div class="container-fluid">
                  <div class="row">
                    <?php $count = 0; ?>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($count == 8): ?>
                        <section class="section" id="discount">
                          <div class="container-fluid">
                            <div class="row">

                              <?php $banner_count = 0; ?>
                              <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $banner_count++; ?>

                              <?php if($banner_count <= 3): ?>

                              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <div class="single-discount">
                                  <div class="discount-image">
                                    <img src="/uploads/images/banner/<?php echo e($banner->IMAGE_PATH); ?>" class="mx-auto d-block" alt="discount">
                                    <div class="discount-details">
                                      <div class="discount-details-inner">
                                        <div class="discount-title"><?php echo e($banner->BANNER_TITLE); ?></div>
                                        <p class="discount-desc"><?php echo e($banner->BANNER_DESC); ?></p>
                                        <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                          </div>
                        </section>
                        <?php endif; ?>


                        <?php if($count == 14): ?>
                        <section class="section" id="discount">
                          <div class="container-fluid">
                            <div class="row">

                              <?php $banner_count = 0; ?>
                              <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <?php $banner_count++; ?>

                              <?php if($banner_count >= 4 && $banner_count <= 6): ?>

                              <div class="col-md-4 col-lg-4 col-sm-4 col-xs-12">
                                <div class="single-discount">
                                  <div class="discount-image">
                                    <img src="/uploads/images/banner/<?php echo e($banner->IMAGE_PATH); ?>" class="mx-auto d-block" alt="discount">
                                    <div class="discount-details">
                                      <div class="discount-details-inner">
                                        <div class="discount-title"><?php echo e($banner->BANNER_TITLE); ?></div>
                                        <p class="discount-desc"><?php echo e($banner->BANNER_DESC); ?></p>
                                        <a href="#" class="discount-button">Get Offer <i class="fas fa-arrow-right"></i></a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <?php endif; ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                          </div>
                        </section>
                        <?php endif; ?>


                        <?php $count++; ?>
                        <?php if($count > 8): ?>
                        <!-- Single Product -->
                        <div class="col-md-3 col-lg-2 col-sm-4 col-xs-12 item-width">
                          <div class="single-product">
                            <div class="header-product-button">
                              <a href="#" class="product-button"><i class="fas fa-align-justify"></i> Simillar</a>
                              <a href="#" class="product-button"><i class="fas fa-adjust"></i> Related</a>
                            </div>
                            <div class="product-box">
                              <a href="/item/<?php echo e($item->PRODUCT_ID); ?>" target="_blank">
                                <img src="/products/<?php echo e($item->PRODUCT_ID); ?>/<?php echo e($item->IMAGE_PATH); ?>" class="mx-auto d-block" alt="product">
                              </a>
                            </div>
                            <div class="product-footer">
                              <p class="product-title"><a href="/item/<?php echo e($item->PRODUCT_ID); ?>" target="_blank"><?php echo e($item->PRODUCT_NAME); ?></a> <span>Cat: <?php echo e($item->CATEGORY_NAME); ?></span></p>
                              <div class="product-price"><?php echo e($item->PRICE); ?> Tk <span>(10% Off)</span></div>

                              <!-- Get Item id in hidden form -->
                              <input type="hidden" name="pro_id" id="pro_id_<?php echo e($item->PRODUCT_ID); ?>" value="<?php echo e($item->PRODUCT_ID); ?>">
                              <!-- Get Item id in hidden form -->

                              <div class="footer-product-button">
                                <a href="#" id="add_to_cart_<?php echo e($item->PRODUCT_ID); ?>" class="product-button product-card"><i class="fas fa-shopping-cart"></i> Add cart</a>
                                <a href="#" class="product-button">Buy</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- Single Product -->
                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                        <div class="container">
                          <div class="row mx-auto d-block">
                            <nav aria-label="Page navigation example">
                              <ul class="pagination justify-content-center">
                                <?php echo e($items->links()); ?>

                              </ul>
                            </nav>
                          </div>
                        </div>
                        
                  </div>
                </div>
              </section>
              <!-- width item end -->



    <!-- Ajax item cart from Home Page function -->
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
     jQuery(document).ready(function(){
        jQuery(document).on('click', '#add_to_cart_<?php echo e($item->PRODUCT_ID); ?>', function(e) {
          //alert(jQuery('#pro_id_<?php echo e($item->PRODUCT_ID); ?>').val())
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "<?php echo e(url('/cart')); ?>",
           method: 'get',
           data: {
              pro_id: jQuery('#pro_id_<?php echo e($item->PRODUCT_ID); ?>').val(),
              pro_color: jQuery('[name="pro_color"]:checked').val(),
              pro_size: jQuery('[name="pro_size"]:checked').val(),
              pro_qty: 1
           },
           success: function(result){
              console.log(result.values);
              jQuery('#item_button_before').hide();
              jQuery('#item_button_after').show();
              jQuery('#item_button_after').html(result.values);
              jQuery('#cart_items_load').show();
              jQuery('#cart_items_load').html(result.cart);
           }});

            // list reload after action
            //$("#cart_items_load").load(" #cart_items_load > *");
            // Hide and show top car list
            $('#top_cart_list').addClass('cart_list_show');
        });
     });
    </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/items.blade.php */ ?>