

<!-- <script>
 jQuery(document).ready(function(){
    jQuery('[name="pro_color"]').on('change', function(e){
      //alert(jQuery('[name="pro_id"]').val())
      //alert(jQuery('[name="pro_color"]:checked').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/item/colorImage') }}",
       method: 'get',
       data: {
          pro_id: jQuery('[name="pro_id"]').val(),
          pro_color: jQuery('[name="pro_color"]:checked').val()
       },
       success: function(result){
          jQuery('#item_image').show();
          jQuery('#item_image').html(result.values);
       }});
    });
 });
</script> -->


<script>
 jQuery(document).ready(function(){
    jQuery(document).on('change', '[name="pro_color"]', function(e) {
      //alert(jQuery('[name="pro_color"]:checked').val())
       e.preventDefault();
       $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
      });
    jQuery.ajax({
       url: "{{ url('/item/colorImage') }}",
       method: 'get',
       data: {
          pro_id: jQuery('[name="pro_id"]').val(),
          pro_color: jQuery('[name="pro_color"]:checked').val()
       },
       success: function(result){
          //console.log(result.values)
          //alert(result.values);
          jQuery('#item_image').show();
          jQuery('#item_image').html(result.values);
       }});
    });
 });
</script>