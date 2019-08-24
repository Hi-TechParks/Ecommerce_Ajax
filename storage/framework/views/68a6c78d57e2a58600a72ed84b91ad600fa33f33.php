<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>NAN</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/all.min.css')); ?>">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/jquery.fancybox.min.css')); ?>">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owl.carousel.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/owl.theme.default.min.css')); ?>">
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/ion.rangeSlider.min.css')); ?>">
    <!-- xzoom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/xzoom.css')); ?>">

    <!-- Google Font CSS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i|Roboto:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/style.css')); ?>">
    
  </head>
  <body>

    <div class="cart_icon_fixed">
      <div class="my-cart-button">
        <a class="" href="#" id="top_cart_button">
          <span><i class="fas fa-cart-arrow-down"></i></span> 
        </a>

        <div class="" id="top_cart_list">
          
          <!--== Cart Summary Area Start ==-->
          <div class="card cart-summary" id="cart_items_load">
            <div class="card-header">
              Cart Summary
            </div>
            <div class="card-body table-responsive">
              <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th>&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <tr>
                    <td>
                      <a href="#"><img src="/products/<?php echo e($cart_item->PRODUCT_ID); ?>/<?php echo e($cart_item->IMAGE_PATH); ?>" class="img-fluid mx-auto d-block" alt="Product"></a>
                    </td>
                    <td><a href="#"><?php echo e($cart_item->PRODUCT_NAME); ?></a></td>
                    <td><?php echo e($cart_item->PRICE); ?> Tk</td>
                    <td>
                      <ul>
                      <li class="remove_cart_item" id="remove_cart_item_<?php echo e($cart_item->CART_ID); ?>" value="<?php echo e($cart_item->CART_ID); ?>"><i class="fas fa-window-close"></i>

                        <!-- Get Cart id in hidden form -->
                        <input type="hidden" name="cart_id" value="<?php echo e($cart_item->CART_ID); ?>">
                        <!-- Get Cart id in hidden form -->
                      </li>
                      </ul>
                    </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>
              </table>
            </div>
            <div class="card-footer">
              <a href="/order" class="btn order-button">Checkout Now</a>
            </div>


              <!-- Ajax Remove Cart Item -->
              <?php $__currentLoopData = $cart_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <script>
               jQuery(document).ready(function(){
                  jQuery(document).on('click', '#remove_cart_item_<?php echo e($cart_item->CART_ID); ?>', function(e) {
                    //alert(jQuery('#remove_cart_item_<?php echo e($cart_item->CART_ID); ?>').val())
                     e.preventDefault();
                     $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                  jQuery.ajax({
                     url: "<?php echo e(url('/cart/remove')); ?>",
                     method: 'get',
                     data: {
                        cart_id: jQuery('#remove_cart_item_<?php echo e($cart_item->CART_ID); ?>').val()
                     },
                     success: function(result){
                        console.log(result.values);
                        jQuery('#cart_items_load').show();
                        jQuery('#cart_items_load').html(result.values);
                        jQuery('#cart_page_items_load').show();
                        jQuery('#cart_page_items_load').html(result.page_data);
                     }});

                      // list reload after action
                      //$("#cart_items_load").load(" #cart_items_load > *");
                  });
               });
              </script>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
          <!--== Cart Summary Area End ==-->


        </div>

      </div>
    </div>


    <div id="pre_loader_overlay">
        <img src="/assets/img/spinner.svg" class="overlay-img" alt="Loading..." /><br/>
    </div>
    

    <section id="header-navbar">
      <!--== Top Navbar Area Start ==-->
      <section class="navbar-main-top">
         <div class="container">
          <div class="row">
            <div class="col-md-6 text-left">
              <span><i class="fas fa-phone-volume"></i></span> +22 554 88 33
            </div>
            <div class="col-md-6 text-right">

              <?php if(auth()->guard()->guest()): ?>

                    <a href="<?php echo e(route('login')); ?>"><span><i class="fas fa-unlock-alt"></i></span> sign in</a>

                  <?php if(Route::has('register')): ?>
                    <a href="<?php echo e(route('register')); ?>"><span><i class="fas fa-user"></i></span> sign up</a>
                  <?php endif; ?>

              <?php else: ?>

              <div class="dropdown auth-profile">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo e(Auth::user()->name); ?>

                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownProfile">
                  
                  <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      <?php echo e(__('Logout')); ?>

                  </a>

                  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                      <?php echo csrf_field(); ?>
                  </form>
                  
                </div>
              </div>

              <?php endif; ?>

            </div>
          </div>
         </div>
      </section>
      <!--== Top Navbar Area End ==-->

      <!--== Top Navbar Area Start ==-->
      <section class="navbar-main-search">
         <div class="container">
          <div class="row">

            <div class="col-md-3 col-lg-3">
              <a href="/" class="logo">
                <img src="/assets/img/logo.png" alt="logo"/>
                <!-- <span>nun shop</span> -->
              </a>          
            </div>

            <div class="col-md-7 col-lg-7">
              <form action="<?php echo e(url('/search')); ?>" method="get">
                <div class="form-row search-form">
                  <div class="col">
                    <select class="form-control" name="category_name">
                      <option value="">All Category</option>
                      <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->PRODUCT_CATEGORY_ID); ?>">
                        <?php echo e($category->CATEGORY_NAME); ?>

                      </option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                  </div>
                  <div class="col">
                    <input type="text" name="product_name" class="form-control" value="<?php echo e(old('product_name')); ?>" placeholder="Type Product Name...">
                  </div>
                  <div class="col">
                    <button type="submit" id="header_search" class="btn"><i class="fas fa-search"></i> Search</button>
                  </div>
                </div>
              </form>
            </div>

            <div class="col-md-2 col-lg-2">
              
            </div>

          </div>
         </div>
      </section>
      <!--== Top Navbar Area End ==-->

      <!--== Main Navbar Area Start ==-->
      <section class="navbar-main-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <nav class="navbar navbar-expand-lg navbar-light">
            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto" id="main_nav">

                    <?php $__currentLoopData = $shops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item " value="<?php echo e($shop->SHOP_ID); ?>">
                      <a class="nav-link" href="#"><?php echo e($shop->SHOP_NAME); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <!-- <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Clothing</a>
                    </li>
                    <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Shoes</a>
                    </li>
                    <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Life style</a>
                    </li>
                    <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Home & livings</a>
                    </li>
                    <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Health & Fitness</a>
                    </li>
                    <li class="nav-item <?php echo e(Request::path() == 'academic' ? 'active' : ''); ?>">
                      <a class="nav-link" href="#">Daily Needs</a>
                    </li> -->

                  </ul>
                </div>
              </nav>

            </div>
          </div>
        </div>
      </section>
      <!--== Main Navbar Area End ==-->
    </section>



    <!--== Main Content Area Start ==-->
    <?php echo $__env->yieldContent('content'); ?>
    <!--== Main Content Area End ==-->



  	<!--== Main Footer Area Start ==-->
    <section class="section" id="footer-top">
      <div class="container">
        <div class="row">

          <!--== Single Footer Area ==-->
          <div class="col-lg-5 col-md-8 col-sm-7 col-xs-12">
            <div class="single-footer-box">
              <a href="/" class="logo">
                <img src="/assets/img/logo.png" alt="logo"/>
                <!-- <span>nun shop</span> -->
              </a>

              <ul class="footer-address">
                <li>
                  <div class="address-icon"><div><i class="fas fa-phone-volume"></i></div></div>
                  <div class="address-details"><span>Hot Line :</span> +088171111111111</div>
                </li>
                <li>
                  <div class="address-icon"><div><i class="fas fa-phone"></i></div></div>
                  <div class="address-details"><span>Corporate Sales :</span> +088171111111111</div>
                </li>
                <li>
                  <div class="address-icon"><div><i class="fas fa-envelope-open"></i></div></div>
                  <div class="address-details"><span>Mail Us :</span> jamakaporvalo@gmail.com</div>
                </li>
                <li>
                  <div class="address-icon"><div><i class="fas fa-home"></i></div></div>
                  <div class="address-details"><span>Address :</span> House - 45, Road - 5, Block - B, Section - 2B, Dhaka, Bangladesh.</div>
                </li>
              </ul>
            </div>
          </div>
          <!--== Single Footer Area ==-->

          <!--== Single Footer Area ==-->
          <div class="col-lg-2 col-md-4 col-sm-5 col-xs-12">
            <div class="single-footer-box">
              <ul class="footer-links">
                <li><a href="#">Explore</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Special Offers</a></li>
                <li><a href="#">Popular Products</a></li>
              </ul>
            </div>
          </div>
          <!--== Single Footer Area ==-->

          <!--== Single Footer Area ==-->
          <div class="col-lg-2 col-md-4 col-sm-5 col-xs-12">
            <div class="single-footer-box">
              <ul class="footer-links">
                <li><a href="#">FAQ's</a></li>
                <li><a href="#">Track Order</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">New Products</a></li>
              </ul>
            </div>
          </div>
          <!--== Single Footer Area ==-->

          <!--== Single Footer Area ==-->
          <div class="col-lg-3 col-md-8 col-sm-7 col-xs-12">
            <div class="single-footer-box">
              <h4 class="single-footer-title">Social Media</h4>

              <ul class="social-links">
                <li><a href="#"><span><i class="fab fa-facebook-square"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-twitter-square"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-google-plus-square"></i></span></a></li>
                <li><a href="#"><span><i class="fab fa-linkedin"></i></span></a></li>
              </ul>
            </div>
          </div>
          <!--== Single Footer Area ==-->

        </div>
      </div>

      <!--== Footer Copywrite Area Start ==-->
      <div class="container" id="footer-bottom">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="copywrite">
              &copy; 2018 all copyright reserved.
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="poweredby">
              Developed by <a href="#">BIZIITECH</a>
            </div>
          </div>
        </div>
      </div>
      <!--== Footer Copywrite Area End ==-->
    </section>
    <!--== Main Footer Area End ==-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

    <!-- Bootstrap JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/bootstrap.min.js')); ?>"></script>
    <!-- Font Awesome JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/all.min.js')); ?>"></script>
    <!-- Fancybox JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/jquery.fancybox.min.js')); ?>"></script>
    <!-- Owl Carousel JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/owl.carousel.min.js')); ?>"></script>
    <!--Plugin JavaScript file-->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/ion.rangeSlider.min.js')); ?>"></script>
    <!-- xzoom JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/xzoom.min.js')); ?>"></script>
    <!-- Dynaamic Form JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/dynamic-form.js')); ?>"></script>
    <!-- Ckeditor JS -->
    <script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>

    

    <!-- Custom JS -->
    <script type="text/javascript" src="<?php echo e(asset('assets/js/main.js')); ?>"></script>


    <script>
        CKEDITOR.replace( 'content' );
    </script>

    <!-- Ajax item cart function -->
    <script>
     jQuery(document).ready(function(){
        jQuery(document).on('click', '#add_to_cart', function(e) {
          //alert(jQuery('[name="quant"]').val())
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
              pro_id: jQuery('[name="pro_id"]').val(),
              pro_color: jQuery('[name="pro_color"]:checked').val(),
              pro_size: jQuery('[name="pro_size"]:checked').val(),
              pro_qty: jQuery('[name="quant"]').val()
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
            $("#cart_items_load").load(" #cart_items_load > *");
            // Hide and show top car list
            $('#top_cart_list').addClass('cart_list_show');
        });
     });
    </script>



    <!-- Ajax cart Item reload on cart button click -->
    <script>
     jQuery(document).ready(function(){
        $(document).on('click', '#top_cart_button', function(e) {
          //alert('ok')
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "<?php echo e(url('/cart/buttton')); ?>",
           method: 'get',
           success: function(result){
              console.log(result.values);
              jQuery('#cart_items_load').show();
              jQuery('#cart_items_load').html(result.values);
           }});

          // Hide and show top car list
          $('#top_cart_list').toggleClass('cart_list_show');
        });
     });
    </script>




    <!-- Header search function -->
    <script>
     jQuery(document).ready(function(){
        jQuery(document).on('click', '#header_search', function(e) {
          //alert(jQuery('[name="pro_id"]').val())
           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "<?php echo e(url('/headersearch')); ?>",
           method: 'get',
           data: {
              category_name: jQuery('[name="category_name"]').val(),
              product_name: jQuery('[name="product_name"]').val()
           },
           success: function(result){
              console.log(result.values);
              jQuery('#item_view').show();
              jQuery('#item_view').html(result.values);
              jQuery('#item_width_view').show();
              jQuery('#item_width_view').html(result.width_values);
           }});

            // Filter reload after action
            $("#sidebar_filters").load(" #sidebar_filters > *");
            // Hide and show top car list
            $('#top_cart_list').removeClass('cart_list_show');
            // Remove active class form main nav
            $('#main_nav li').removeClass('active');

        });
     });
    </script>


    <!-- <script type="">
      $("#header_search").click(function() {
        //alert('clicked')
        $("#sidebar_filters").load(" #sidebar_filters > *");
      });
    </script> -->


    <!-- Defoult Preloader -->
    <script>
      jQuery(document).ready(function(){
        $("#pre_loader_overlay").fadeOut();
      });
    </script>


    <!-- Ajax load Preloader -->
    <script>
    $(document).ready(function(){
      $(document).ajaxSend(function(){
        //alert('hi ajax is running');
        $("#pre_loader_overlay").fadeIn();
      });
      $(document).ajaxComplete(function(){
        //alert('hi ajax is close');
        $("#pre_loader_overlay").fadeOut();
      });
    });
    </script>

    


  </body>
</html>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/layouts/master.blade.php */ ?>