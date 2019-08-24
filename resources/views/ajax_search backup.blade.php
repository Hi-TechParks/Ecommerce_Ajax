@foreach( $categories as $category )
<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '#pro_category_{{ $category->PRODUCT_CATEGORY_ID }}', function(e){
      //alert(jQuery('#pro_category_{{ $category->PRODUCT_CATEGORY_ID }}').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/category') }}",
       method: 'get',
       data: {
          pro_category: jQuery('#pro_category_{{ $category->PRODUCT_CATEGORY_ID }}').val()
       },
       success: function(result){
          //console.log(result.values);
          jQuery('#item_view').show();
          jQuery('#item_view').html(result.values);
       }});
    });
 });
</script>
@endforeach



@foreach( $categories as $category )
<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '#pro_category_{{ $category->PRODUCT_CATEGORY_ID }}', function(e){
      //alert(jQuery('#pro_category_{{ $category->PRODUCT_CATEGORY_ID }}').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/search') }}",
       method: 'get',
       data: {
          pro_category: jQuery('#pro_category_{{ $category->PRODUCT_CATEGORY_ID }}').val()
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
@endforeach



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
       url: "{{ url('/product/shop') }}",
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
       url: "{{ url('/shop/category') }}",
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



<!-- @foreach( $filters as $brand )
<script>
 jQuery(document).ready(function(){
    jQuery('#pro_brand_{{ $brand->BRAND_ID }}').on('change', function(e){
      //alert(jQuery('#pro_brand_{{ $brand->BRAND_ID }}').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/brand') }}",
       method: 'get',
       data: {
          pro_brand: jQuery('#pro_brand_{{ $brand->BRAND_ID }}:checked').val()
       },
       success: function(result){
          jQuery('#pro_category_view').show();
          jQuery('#pro_category_view').html(result.values);
       }});
    });
 });
</script>
@endforeach



@foreach( $filters as $color )
<script>
 jQuery(document).ready(function(){
    jQuery('#pro_color_{{ $color->COLOR_ID }}').on('change', function(e){
      //alert(jQuery('#pro_color_{{ $color->COLOR_ID }}').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/color') }}",
       method: 'get',
       data: {
          pro_color: jQuery('#pro_color_{{ $color->COLOR_ID }}:checked').val()
       },
       success: function(result){
          jQuery('#pro_category_view').show();
          jQuery('#pro_category_view').html(result.values);
       }});
    });
 });
</script>
@endforeach



@foreach( $filters as $size )
<script>
 jQuery(document).ready(function(){
    jQuery('#pro_size_{{ $size->PRODUCT_SIZE_ID }}').on('change', function(e){
      //alert(jQuery('#pro_size_{{ $size->PRODUCT_SIZE_ID }}').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/size') }}",
       method: 'get',
       data: {
          pro_size: jQuery('#pro_size_{{ $size->PRODUCT_SIZE_ID }}:checked').val()
       },
       success: function(result){
          jQuery('#pro_category_view').show();
          jQuery('#pro_category_view').html(result.values);
       }});
    });
 });
</script>
@endforeach






<script>
 jQuery(document).ready(function(){
    jQuery('#price_range_slider').on('change', function(e){
      //alert(jQuery('#price_range_slider').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/price') }}",
       method: 'get',
       data: {
          pro_price: jQuery('#price_range_slider').val()
       },
       success: function(result){
          jQuery('#pro_category_view').show();
          jQuery('#pro_category_view').html(result.values);
       }});
    });
 });
</script> -->





<!-- @foreach( $filters as $filter )
<script>
 jQuery(document).ready(function(){
    jQuery('[name="pro_brand"], [name="pro_color"], [name="pro_size"], #price_range_slider').on('change', function(e){
      //alert(jQuery('#pro_brand_{{ $filter->BRAND_ID }}').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/filter') }}",
       method: 'get',
       data: {
          pro_brand: jQuery('#pro_brand_{{ $filter->BRAND_ID }}:checked').val(),
          pro_color: jQuery('#pro_color_{{ $filter->COLOR_ID }}:checked').val(),
          pro_size: jQuery('#pro_size_{{ $filter->PRODUCT_SIZE_ID }}:checked').val(),
          pro_price: jQuery('#price_range_slider').val()
       },
       success: function(result){
          jQuery('#pro_category_view').show();
          jQuery('#pro_category_view').html(result.values);
       }});
    });
 });
</script>
@endforeach -->



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




<!-- <script type="text/javascript">


  if (!$('input[name="pro_color"]').is(':checked') && !$('input[name="pro_size"]').is(':checked')) {
    //  block of code to be executed if the condition is true
    alert('Data is empty');
  } 

  else if (!$('input[name="pro_color"]').is(':checked') && !$('input[name="pro_size"]').is(':checked')) {
    //  block of code to be executed if the condition is false
    alert('Size is empty');
  }

  else if (!$('input[name="pro_color"]').is(':checked') && !$('input[name="pro_size"]').is(':checked')) {
    //  block of code to be executed if the condition is false
    alert('Color is empty');
  }

  else if ($('input[name="pro_color"]').is(':checked') && $('input[name="pro_size"]').is(':checked')) {
    //  block of code to be executed if the condition is false
    alert('We have data');
  }

</script> -->


<!-- <script type="text/javascript">
    $(document).on("click", '[name="pro_brand"]', function(){
      alert("The button is clicked in Ajax content!!");
    }); 
</script> -->


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
           url: "{{ url('/product/filterAll') }}",
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
           url: "{{ url('/product/filterSize') }}",
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
           url: "{{ url('/product/filterColor') }}",
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
           url: "{{ url('/product/filter') }}",
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


<!-- <script>
 jQuery(document).ready(function(){
    jQuery('[name="pro_brand"], [name="pro_color"], [name="pro_size"], #price_range_slider').on('change', function(e){
        alert(jQuery('[name="pro_brand"]:checked').val())

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
           url: "{{ url('/product/filterAll') }}",
           method: 'get',
           data: {
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_color: jQuery('[name="pro_color"]:checked').val(),
              pro_size: jQuery('[name="pro_size"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#pro_category_view').show();
              jQuery('#pro_category_view').html(result.values);
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
           url: "{{ url('/product/filterSize') }}",
           method: 'get',
           data: {
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_size: jQuery('[name="pro_size"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#pro_category_view').show();
              jQuery('#pro_category_view').html(result.values);
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
           url: "{{ url('/product/filterColor') }}",
           method: 'get',
           data: {
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_color: jQuery('[name="pro_color"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#pro_category_view').show();
              jQuery('#pro_category_view').html(result.values);
           }});

      }

      else if ($('input[name="pro_color"]').is(':not(:checked)') && $('input[name="pro_size"]').is(':not(:checked)')) {
        //  block of code to be executed if the condition is true
        //alert('Data is empty');

           e.preventDefault();
           $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
              }
          });
        jQuery.ajax({
           url: "{{ url('/product/filter') }}",
           method: 'get',
           data: {
              pro_brand: jQuery('[name="pro_brand"]:checked').val(),
              pro_price: jQuery('#price_range_slider').val()
           },
           success: function(result){
              jQuery('#pro_category_view').show();
              jQuery('#pro_category_view').html(result.values);
           }});

      }

      
    });
 });
</script> -->



<!-- <script>
 jQuery(document).ready(function(){
    jQuery('[name="pro_brand"], [name="pro_color"], [name="pro_size"], #price_range_slider').on('change', function(e){
      //alert(jQuery('[name="pro_brand"]:checked').val())
      //alert(jQuery('[name="pro_color"]:checked').val())
      //alert(jQuery('[name="pro_size"]:checked').val())
      //alert(jQuery('#price_range_slider').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/filter') }}",
       method: 'get',
       data: {
          pro_brand: jQuery('[name="pro_brand"]:checked').val(),
          pro_color: jQuery('[name="pro_color"]:checked').val(),
          pro_size: jQuery('[name="pro_size"]:checked').val(),
          pro_price: jQuery('#price_range_slider').val()
       },
       success: function(result){
          jQuery('#pro_category_view').show();
          jQuery('#pro_category_view').html(result.values);
       }});
    });
 });
</script> -->



<!-- <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();

            var url = $(this).attr('href').split('page=')[1];
            //console.log(page);

            $.ajax({
                url : "/pagination?page="+url

            }).done(function (data) {
                $('#pro_category_view').html(data);
            })

        });
    });
</script> -->


<!-- <script type="text/javascript">
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(e) {

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
                $('#pro_category_view').html(data);
            })

        });
    });
</script> -->




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