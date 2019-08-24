<?php $__env->startSection('content'); ?>

    <!--== Slider Area Start ==-->
  	<section id="slider">
  		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		  <ol class="carousel-indicators">
  		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
  		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		  </ol>
  		  <div class="carousel-inner">

          <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  		    <div class="carousel-item">
  		      <img src="/uploads/images/slide/<?php echo e($slide->IMAGE_PATH); ?>" class="d-block w-100" alt="...">
  		      <div class="carousel-caption d-none d-md-block">
  			    <div class="carouser-caption-box">
  			    	<h5><?php echo e($slide->IMAGE_TITLE); ?></h5>
              <p><?php echo $slide->IMAGE_DESC; ?></p>
  			    </div>
  			  </div>
  		    </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

  		  </div>
  		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  		    <span class="sr-only">Previous</span>
  		  </a>
  		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  		    <span class="sr-only">Next</span>
  		  </a>
  		</div>
  	</section>
    <!--== Slider Area End ==-->


    <!--== Main Content Area Start ==-->
    <section class="section" id="product">
      <div class="container-fluid">
        <div class="row">

          <!--== Product Area Start ==-->
          <main class="col-md-12">
            
              <!--== Sidebar Search Area Start ==-->
              <?php echo $__env->make('search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <!--== Sidebar Search Area End ==-->


            <div id="item_view">

              <div class="container">
                <div class="row mx-auto d-block">
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <?php echo e($items->links()); ?>

                    </ul>
                  </nav>
                </div>
              </div>
              

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
                    <div class="product-price">
                      <?php echo e($item->PRICE); ?> Tk 
                      <span>
                        <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if(!empty($item->OFFER_PERCENTAGE) || !empty($item->OFFER_GROSS)): ?>

                            <?php if(!empty($item->OFFER_PERCENTAGE)): ?>
                              (<?php echo e($item->OFFER_PERCENTAGE); ?>% Off)
                            <?php elseif(!empty($item->OFFER_GROSS)): ?>
                              (<?php echo e($item->OFFER_GROSS); ?>Tk Off)
                            <?php endif; ?>

                          <?php elseif(!empty($offer->OFFER_PERCENTAGE)): ?>
                            (<?php echo e($offer->OFFER_PERCENTAGE); ?>% Off)
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </span>
                    </div>

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
                        <div class="col-md-3 col-lg-2 col-sm-6 col-xs-12 item-width">
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
                              <div class="product-price">
                                <?php echo e($item->PRICE); ?> Tk 

                                <span>
                                  <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!empty($item->OFFER_PERCENTAGE) || !empty($item->OFFER_GROSS)): ?>

                                      <?php if(!empty($item->OFFER_PERCENTAGE)): ?>
                                        (<?php echo e($item->OFFER_PERCENTAGE); ?>% Off)
                                      <?php elseif(!empty($item->OFFER_GROSS)): ?>
                                        (<?php echo e($item->OFFER_GROSS); ?>Tk Off)
                                      <?php endif; ?>

                                    <?php elseif(!empty($offer->OFFER_PERCENTAGE)): ?>
                                      (<?php echo e($offer->OFFER_PERCENTAGE); ?>% Off)
                                    <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </span>
                              </div>

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


            </div>
          </main>
          <!--== Product Area End ==-->

        </div>
      </div>
    </section>





    <!--== Discount Area Start ==-->
    <!-- <section class="section" id="discount">
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
    </section> -->
    <!--== Discount Area End ==-->


    <!--== Product Carousel Area Start ==-->
    <!-- <section class="section" id="product">
      <div class="container"> -->
        <!--== Section Title Area ==-->
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">New Items</h2>
            </div>
          </div>
        </div> -->
        <!--== Section Title Area ==-->

        <!-- <div class="row">
          <div class="owl-carousel owl-theme" id="product-carousel"> -->

            <!-- Single Product -->
            <!-- <div class="item">
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
            </div> -->
            <!-- Single Product -->


          <!-- </div>
        </div>
      </div>
    </section> -->
    <!--== Product Carousel Area End ==-->


    <!--== Banner Area Start ==-->
    <section class="section" id="banner">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="banner-area">
              <img src="/assets/img/advertise2.png" class="mx-auto d-block" alt="banner">
            </div>
          </div>
        </div>
      </div>      
    </section>
    <!--== Banner Area End ==-->



    <!--== Review Area Start ==-->
    <section class="section" id="review">
      <div class="container">
        <!--== Section Title Area ==-->
        <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">Client Reviews</h2>
            </div>
          </div>
        </div>
        <!--== Section Title Area ==-->

        <div class="row">
          <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="review-image">
              <img src="/assets/img/clients.png" alt="review">
            </div>
          </div>

          <div class="col-md-6 col-lg-6 col-sm-12">

            <div class="row">
            <div class="owl-carousel owl-theme" id="review-carousel">

              <!-- Single Reivew -->
              <div class="card">
                <div class="card-body">
                  <div class="person-box-footer">
                    <div class="card-icon"><i class="fas fa-quote-right"></i></div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  took a galley of type and scrambled it to make a type specimen book to continue <a href="#"> Read More</a>
                  </div>
                  <div class="person-box-header">
                    <div class="person-box-image">
                      <img src="/assets/img/client/student1.jpg" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="person-box-info">
                      <h5 class="card-title">Samilana Tiktok</h5>
                      <p class="card-text">Buy 210+ Products</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Reivew -->

              <!-- Single Reivew -->
              <div class="card">
                <div class="card-body">
                  <div class="person-box-footer">
                    <div class="card-icon"><i class="fas fa-quote-right"></i></div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  took a galley of type and scrambled it to make a type specimen book to continue <a href="#"> Read More</a>
                  </div>
                  <div class="person-box-header">
                    <div class="person-box-image">
                      <img src="/assets/img/client/student1.jpg" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="person-box-info">
                      <h5 class="card-title">Samilana Tiktok</h5>
                      <p class="card-text">Buy 210+ Products</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Reivew -->

              <!-- Single Reivew -->
              <div class="card">
                <div class="card-body">
                  <div class="person-box-footer">
                    <div class="card-icon"><i class="fas fa-quote-right"></i></div>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum  took a galley of type and scrambled it to make a type specimen book to continue <a href="#"> Read More</a>
                  </div>
                  <div class="person-box-header">
                    <div class="person-box-image">
                      <img src="/assets/img/client/student1.jpg" class="img-fluid mx-auto d-block">
                    </div>
                    <div class="person-box-info">
                      <h5 class="card-title">Samilana Tiktok</h5>
                      <p class="card-text">Buy 210+ Products</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Single Reivew -->

            </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!--== Review Area End ==-->



    <!--== Pay Method Support Area Start ==-->
    <!-- <section class="section" id="support">
      <div class="container"> -->
        <!--== Section Title Area ==-->
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="section-title-area">
              <h2 class="section-title">We Support</h2>
            </div>
          </div>
        </div> -->
        <!--== Section Title Area ==-->

        <!-- <div class="row text-center">

          <div class="single-support">
            <img src="/assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="/assets/img/paymethod/bkash.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="/assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="/assets/img/paymethod/bkash.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="/assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="/assets/img/paymethod/bkash.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>

          <div class="single-support">
            <img src="/assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="bank">
          </div>
          
        </div>
      </div>
    </section> -->
    <!--== Pay Method Support Area End ==-->

    <!--== Main Content Area End ==-->

<?php $__env->stopSection(); ?>



<script src="http://code.jquery.com/jquery-3.3.1.min.js"
       integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
       crossorigin="anonymous">
</script>

<?php echo $__env->make('ajax_search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/index.blade.php */ ?>