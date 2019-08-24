<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '#pro_category_<?php echo e($category->PRODUCT_CATEGORY_ID); ?>', function(e){
      //alert(jQuery('#pro_category_<?php echo e($category->PRODUCT_CATEGORY_ID); ?>').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "<?php echo e(url('/product/category')); ?>",
       method: 'get',
       data: {
          pro_category: jQuery('#pro_category_<?php echo e($category->PRODUCT_CATEGORY_ID); ?>').val()
       },
       success: function(result){
          //console.log(result.values);
          jQuery('#item_view').show();
          jQuery('#item_view').html(result.values);
       }});
    });
 });
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '#pro_category_<?php echo e($category->PRODUCT_CATEGORY_ID); ?>', function(e){
      //alert(jQuery('#pro_category_<?php echo e($category->PRODUCT_CATEGORY_ID); ?>').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "<?php echo e(url('/product/search')); ?>",
       method: 'get',
       data: {
          pro_category: jQuery('#pro_category_<?php echo e($category->PRODUCT_CATEGORY_ID); ?>').val()
       },
       success: function(result){
          jQuery('#search_filers').show();
          jQuery('#search_filers').html(result.values);

          $('#search_filers').reload();
          window.location.reload();
       }});


        // Header Search reload after action
        $(".search-form").load(" .search-form > *");


    });
 });
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '#main_nav li', function(e){
      //alert(jQuery('#main_nav li.active').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "<?php echo e(url('/product/shop')); ?>",
       method: 'get',
       data: {
          shop_name: jQuery('#main_nav li.active').val()
       },
       success: function(result){
          //console.log(result.values);
          jQuery('#item_view').show();
          jQuery('#item_view').html(result.values);
       }});
    });
 });
</script>



<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '#main_nav li', function(e){
      //alert(jQuery('#main_nav li.active').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "<?php echo e(url('/shop/category')); ?>",
       method: 'get',
       data: {
          shop_name: jQuery('#main_nav li.active').val()
       },
       success: function(result){
          console.log(result.values);
          jQuery('#sidebar_filters').show();
          jQuery('#sidebar_filters').html(result.values);
       }});


        // Header Search reload after action
        $(".search-form").load(" .search-form > *");


    });
 });
</script>




<script type="text/javascript">


  if (jQuery('[name="pro_color"]').val() == "undefined" && jQuery('[name="pro_size"]').val() == "undefined") {
    //  block of code to be executed if the condition is true
    //alert('Data is empty');
  } 

  else if (jQuery('[name="pro_color"]:checked').val() != null && jQuery('[name="pro_size"]:checked').val() == null) {
    //  block of code to be executed if the condition is false
    //alert('Size is empty');
  }

  else if (jQuery('[name="pro_color"]:checked').val() == null && jQuery('[name="pro_size"]:checked').val() != null) {
    //  block of code to be executed if the condition is false
    //alert('Color is empty');
  }

  else if (jQuery('[name="pro_color"]').val() != "undefined" && jQuery('[name="pro_size"]').val() != "undefined") {
    //  block of code to be executed if the condition is false
    //alert('We have data');
  }

</script>




<script>
 jQuery(document).ready(function(){
    jQuery(document).on('change', '[name="pro_brand"], [name="pro_color"], [name="pro_size"], #price_range_slider', function(e){
        //alert(jQuery('[name="pro_brand"]:checked').val())

      if ($('input[name="pro_color"]').is(':checked') && $('input[name="pro_size"]').is(':checked')) {
        //  block of code to be executed if the condition is true
        //alert('We have data');

           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "<?php echo e(url('/product/filterAll')); ?>",
           method: 'get',
           data: {
              pro_cate: jQuery('.pro_cate.active').val(),
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_color: jQuery('[name="pro_color"]:checked').val(),
              pro_size: jQuery('[name="pro_size"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#item_view').show();
              jQuery('#item_view').html(result.values);
           }});

      } 

      else if ($('input[name="pro_color"]').is(':not(:checked)') && $('input[name="pro_size"]').is(':checked')) {
        //  block of code to be executed if the condition is true
        //alert('Color is empty');

           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "<?php echo e(url('/product/filterSize')); ?>",
           method: 'get',
           data: {
              pro_cate: jQuery('.pro_cate.active').val(),
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_size: jQuery('[name="pro_size"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#item_view').show();
              jQuery('#item_view').html(result.values);
           }});

      }

      else if ($('input[name="pro_color"]').is(':checked') && $('input[name="pro_size"]').is(':not(:checked)')) {
        //  block of code to be executed if the condition is true
        //alert('Size is empty');

           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "<?php echo e(url('/product/filterColor')); ?>",
           method: 'get',
           data: {
              pro_cate: jQuery('.pro_cate.active').val(),
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_color: jQuery('[name="pro_color"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#item_view').show();
              jQuery('#item_view').html(result.values);
           }});

      }

      else if ($('input[name="pro_color"]').is(':not(:checked)') && $('input[name="pro_size"]').is(':not(:checked)')) {
        //  block of code to be executed if the condition is true
        //alert(jQuery('[name="pro_brand"]:checked').val());

           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "<?php echo e(url('/product/filter')); ?>",
           method: 'get',
           data: {
              pro_cate: jQuery('.pro_cate.active').val(),
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#item_view').show();
              jQuery('#item_view').html(result.values);
           }});

      }

      
    });
 });
</script>





<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '.pagination a', function(e) {


      if ($('input[name="pro_color"]').is(':checked') && $('input[name="pro_size"]').is(':checked') && $('.pro_cate.active')) {
        //  block of code to be executed if the condition is true
        //alert('We have data');


        e.preventDefault();
        var url = $(this).attr('href').split('page=')[1];
        //console.log(page);

        $.ajax({
            url : "/product/filterAllPage?page="+url,
            data: {
                pro_cate: jQuery('.pro_cate.active').val(),
                pro_brand: jQuery('[name="pro_brand"]:checked').val(),
                pro_color: jQuery('[name="pro_color"]:checked').val(),
                pro_size: jQuery('[name="pro_size"]:checked').val(),
                pro_price: jQuery('#price_range_slider').val()
             },

        }).done(function (data) {
            $('#item_view').html(data);
        })

        // Pre loader remove after pagination
        $("#pre_loader_overlay").fadeOut();

      } 

      else if ($('input[name="pro_color"]').is(':not(:checked)') && $('input[name="pro_size"]').is(':checked') && $('.pro_cate.active')) {
        //  block of code to be executed if the condition is true
        //alert('Color is empty');


        e.preventDefault();
        var url = $(this).attr('href').split('page=')[1];
        //console.log(page);

        $.ajax({
            url : "/product/filterSizePage?page="+url,
            data: {
                pro_cate: jQuery('.pro_cate.active').val(),
                pro_brand: jQuery('[name="pro_brand"]:checked').val(),
                pro_size: jQuery('[name="pro_size"]:checked').val(),
                pro_price: jQuery('#price_range_slider').val()
             },

        }).done(function (data) {
            $('#item_view').html(data);
        })

        // Pre loader remove after pagination
        $("#pre_loader_overlay").fadeOut();

      }

      else if ($('input[name="pro_color"]').is(':checked') && $('input[name="pro_size"]').is(':not(:checked)') && $('.pro_cate.active')) {
        //  block of code to be executed if the condition is true
        //alert('Size is empty');


        e.preventDefault();
        var url = $(this).attr('href').split('page=')[1];
        //console.log(page);

        $.ajax({
            url : "/product/filterColorPage?page="+url,
            data: {
                pro_cate: jQuery('.pro_cate.active').val(),
                pro_brand: jQuery('[name="pro_brand"]:checked').val(),
                pro_color: jQuery('[name="pro_color"]:checked').val(),
                pro_price: jQuery('#price_range_slider').val()
             },

        }).done(function (data) {
            $('#item_view').html(data);
        })

        // Pre loader remove after pagination
        $("#pre_loader_overlay").fadeOut();

      }

      else if ($('input[name="pro_color"]').is(':not(:checked)') && $('input[name="pro_size"]').is(':not(:checked)') && $('.pro_cate.active')) {
        //  block of code to be executed if the condition is true
        //alert('Data is empty');


        e.preventDefault();
        var url = $(this).attr('href').split('page=')[1];
        //console.log(page);

        $.ajax({
            url : "/product/filterPage?page="+url,
            data: {
                pro_cate: jQuery('.pro_cate.active').val(),
                pro_brand: jQuery('[name="pro_brand"]:checked').val(),
                pro_price: jQuery('#price_range_slider').val()
             },

        }).done(function (data) {
            $('#item_view').html(data);
        })

        // Pre loader remove after pagination
        $("#pre_loader_overlay").fadeOut();

      }

      else{

        e.preventDefault();
        var url = $(this).attr('href').split('page=')[1];
        //console.log(page);

        $.ajax({
            url : "/pagination?page="+url,
            data: {
                category_name: jQuery('[name="category_name_old"]').val(),
                product_name: jQuery('[name="product_name_old"]').val(),
                shop_name: jQuery('#main_nav li.active').val()
             },

        }).done(function (data) {
            $('#item_view').html(data);
        })

        // Pre loader remove after pagination
        $("#pre_loader_overlay").fadeOut();

      }

      
    });
 });
</script>
<?php /* D:\Running Project\nun-14-05-19\nan\resources\views/ajax_search.blade.php */ ?>