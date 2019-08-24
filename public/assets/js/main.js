    // Add Active Class In Slider First Element
    $('#slider .carousel-item:first-child').addClass('active');


    // Sidebar Filter Nav
    $(document).on('click', '#sidebar-nav li a', function() {
      $(this).parent().addClass('active').siblings().removeClass('active');

    });

    // Main Nav on Header
    $(document).on('click', '#main_nav li a', function() {
      $(this).parent().addClass('active').siblings().removeClass('active');

    });


    
	   // Product Carousel Script
	   $(document).ready(function() {
        $('#product-carousel').owlCarousel({
          loop: true,
          margin: 10,
          loop: false,
          nav: true,
          dots: true,
          responsiveClass: true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 2
            },
            800: {
              items: 3
            },
            1000: {
              items: 4
            },
            1200: {
              items: 5
            }
          }
        })
    });


    // Review Carousel Script
    $(document).ready(function() {
        $('#review-carousel').owlCarousel({
          loop: true,
          margin: 10,
          loop: false,
          nav: true,
          dots: false,
          navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'],
          responsiveClass: true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            800: {
              items: 1
            },
            1000: {
              items: 1
            },
            1200: {
              items: 1
            }
          }
        })
    });



    // Product Carousel Script
     $(document).ready(function() {
        $('#related-product-carousel').owlCarousel({
          loop: true,
          margin: 10,
          loop: false,
          nav: true,
          dots: true,
          responsiveClass: true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 2
            },
            800: {
              items: 3
            },
            1000: {
              items: 4
            },
            1200: {
              items: 5
            }
          }
        })
    });



    // Product Carousel Script
     $(document).ready(function() {
        $('#similar-product-carousel').owlCarousel({
          loop: true,
          margin: 10,
          loop: false,
          nav: true,
          dots: true,
          responsiveClass: true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 2
            },
            800: {
              items: 3
            },
            1000: {
              items: 4
            },
            1200: {
              items: 5
            }
          }
        })
    });

// http://ionden.com/a/plugins/ion.rangeSlider/demo.html

$("#price_range_slider").ionRangeSlider({
    type: "double",
    grid: true,
    min: 0,
    max: 1000,
    from: 0,
    to: 1000,
    prefix: "$"
});


// Payment Method Selector
$(document).ready(function () {

      $("#card-box").hide();
      $("#bkash-box").hide();

     $("input[name=paymentType]").change(function(){

        if($("#pay_card").is(':checked')){
            $("#card-box").show();
            $("#bkash-box").hide();
        }
        else if($("#pay_bkash").is(':checked')){
            $("#card-box").hide();
            $("#bkash-box").show();
        }
        else if($("#pay_cash").is(':checked')){
            $("#card-box").hide();
            $("#bkash-box").hide();
        }
    });
 });


// https://www.jqueryscript.net/gallery/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom.html

/* calling script */
$(".xzoom, .xzoom-gallery").xzoom({tint: '#333', Xoffset: 15});



$('.dropdown-toggle').dropdown()



/*$('div.dropdown a').on('click', function (event) {
    $(this).parent().toggleClass('open');
});

$('body').on('click', function (e) {
    if (!$('div.dropdown').is(e.target) 
        && $('div.dropdown').has(e.target).length === 0 
        && $('.open').has(e.target).length === 0
    ) {
        $('div.dropdown').removeClass('open');
    }
    else {
      e.preventDefault();
    }
})

$('.dropdown-menu').on('click', function (e) {
    e.preventDefault();
})*/

/*
jQuery('.dropdown-toggle').on('click', function (e) {
  $(this).next().toggle();
});
jQuery('.dropdown-menu.keep-open').on('click', function (e) {
  e.stopPropagation();
});

if(1) {
  $('body').attr('tabindex', '0');
}
else {
  alertify.confirm().set({'reverseButtons': true});
  alertify.prompt().set({'reverseButtons': true});
}*/



//plugin bootstrap minus and plus
//http://jsfiddle.net/laelitenetwork/puJ6G/
$('.btn-number').click(function(e){
    e.preventDefault();
    
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});


$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});


$('.input-number').change(function() {
    
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    
    
});


$(".input-number").keydown(function (e) {
    // Allow: backspace, delete, tab, escape, enter and .
    if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
         // Allow: Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true) || 
         // Allow: home, end, left, right
        (e.keyCode >= 35 && e.keyCode <= 39)) {
             // let it happen, don't do anything
             return;
    }
    // Ensure that it is a number and stop the keypress
    if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
    }
});