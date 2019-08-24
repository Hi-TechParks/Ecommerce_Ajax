
<script type="text/javascript">
jQuery(document).ready(function(){
  // uncheck and check funcion
  $(document).on('change', '[name=pro_color]', function(e) {
      //alert('555');
      if($("input[name=pro_color]").is(":checked")){

          $("input[name=pro_size]").prop('checked', false);

      }
  });

  $(document).on('change', '[name=pro_size]', function(e) {
      //alert('555');
      if($("input[name=pro_size]").is(":checked")){

          $("input[name=pro_color]").prop('checked', false);

      }
  });

});
</script>


<script>
 jQuery(document).ready(function(){
    jQuery(document).on('change', '[name="pro_color"]', function(e) {
      //alert(jQuery('[name="pro_id"]').val())
      //alert(jQuery('[name="pro_color"]:checked').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/colorImage') }}",
       method: 'get',
       data: {
          pro_id: jQuery('[name="pro_id"]').val(),
          pro_color: jQuery('[name="pro_color"]:checked').val()
       },
       success: function(result){
          console.log(result.values);
          jQuery('#item_image').show();
          jQuery('#item_image').html(result.values);
       }});
    });
 });
</script>


<script>
 jQuery(document).ready(function(){
    jQuery(document).on('change', '[name="pro_size"]', function(e) {
      //alert(jQuery('[name="pro_id"]').val())
      //alert(jQuery('[name="pro_size"]:checked').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/product/sizeImage') }}",
       method: 'get',
       data: {
          pro_id: jQuery('[name="pro_id"]').val(),
          pro_size: jQuery('[name="pro_size"]:checked').val()
       },
       success: function(result){
          console.log(result.values);
          jQuery('#item_image').show();
          jQuery('#item_image').html(result.values);
       }});
    });
 });
</script>