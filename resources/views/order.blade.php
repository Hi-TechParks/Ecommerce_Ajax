@extends('layouts.master')
@section('content')

    <!--== Main Content Area Start ==-->
    <section class="section" id="order">
      <div class="container">
        <div class="row">

          <div class="col-md-6 col-lg-6 col-sm-12">
            <!--== Order Details Area Start ==-->
            <div class="card order-details">
              <div class="card-header">
                Order Details <span>Order Number : 98hju&8</span>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" id="fname" placeholder="First Name">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" id="lname" placeholder="Last Name">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="phone">Phone No</label>
                      <input type="text" class="form-control" id="phone" placeholder="123456789">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="address">Address</label>
                      <textarea class="form-control" id="address" rows="3"></textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <h6>Payment Method</h6>
                  </div>
                  <div class="col-sm-12">
                  <div class="payment-box">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="pay_card" name="paymentType" class="custom-control-input">
                      <label class="custom-control-label" for="pay_card">Credit/Debit Card
                        <img src="assets/img/paymethod/dbbl.png" class="img-fluid mx-auto d-block" alt="Bank Card">
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="pay_bkash" name="paymentType" class="custom-control-input">
                      <label class="custom-control-label" for="pay_bkash">Payment By Bkash
                        <img src="assets/img/paymethod/bkash.png" class="img-fluid mx-auto d-block" alt="Bkash">
                      </label>
                    </div>
                    <div class="custom-control custom-radio">
                      <input type="radio" id="pay_cash" name="paymentType" class="custom-control-input">
                      <label class="custom-control-label" for="pay_cash">Cash On delivery</label>
                    </div>
                  </div>
                  </div>
                </div>

                <div class="row" id="card-box">

                  <div class="col-sm-12">
                    <h6>Credit/Debit Card Info</h6>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="card_number">Card Number</label>
                      <input type="text" class="form-control" id="card_number" placeholder="Card Number">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="month">Expire Month</label>
                      <select class="form-control" id="month">
                        <option>Jan</option>
                        <option>Feb</option>
                        <option>Mar</option>
                        <option>Apr</option>
                        <option>May</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="year">Expire Year</label>
                      <select class="form-control" id="year">
                        <option>2019</option>
                        <option>2020</option>
                        <option>2021</option>
                        <option>2022</option>
                        <option>2023</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="card_cvc">Security Code</label>
                      <input type="text" class="form-control" id="card_cvc" placeholder="CVC">
                    </div>
                  </div>
                </div>

                <div class="row" id="bkash-box">

                  <div class="col-sm-12">
                    <h6>Bkash Payment Process</h6>
                    <ol>
                      <li>Dial *247#</li>
                      <li>Choose "Payment"</li>
                      <li>Enter Demo Shop Bkash No.(+0161XXXXXXXX)</li>
                      <li>Enter the amount BDT 100 of your order</li>
                      <li>Enter Order ID: [10000HGFHJ8] as Your Reference</li>
                      <li>Enter the counter Number (1)</li>
                      <li>Enter your bKash PIN to confirm</li>
                      <li>Then Fill Up the Box Bellow bKash Mob. No. and Transaction number</li>
                    </ol>
                  </div>

                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="bkash_number">bKash Mobile Number</label>
                      <input type="text" class="form-control" id="bkash_number" placeholder="bKash Mobile Number">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="trans_id">bKash Transaction No</label>
                      <input type="text" class="form-control" id="trans_id" placeholder="bKash Transaction No">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="confirm">
                      <label class="custom-control-label" for="confirm">By checking the button you agree to the</label><a href="#">Tearms and Conditions</a>
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="card-footer">
                <button type="submit" class="btn order-button">Place Order</button>
              </div>
            </div>
            <!--== Order Details Area End ==-->
          </div>

          <div class="col-md-6 col-lg-6 col-sm-12">
            <!--== Cart Summary Area Start ==-->
            <div class="card cart-summary">
              <div class="card-header">
                Cart Summary
              </div>
              <div class="card-body table-responsive">
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th scope="col">Image</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">QTY</th>
                      <th scope="col">Price</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody id="cart_page_items_load">
                    @foreach( $cart_items as $cart_item )
                    <tr>
                      <td>
                        <a href="#"><img src="/products/{{ $cart_item->PRODUCT_ID }}/{{ $cart_item->IMAGE_PATH }}" class="img-fluid mx-auto d-block" alt="Product"></a>
                      </td>
                      <td><a href="#">{{ $cart_item->PRODUCT_NAME }}</a></td>
                      <td>
                        <input type="number" class="form-control" id="qty" name="" value="{{ $cart_item->QTY }}" min="1" max="10">
                      </td>
                      <td>
                        {{ $cart_item->PRICE }} Tk
                        <input type="hidden" class="form-control" id="price" name="" value="{{ $cart_item->PRICE }}">
                      </td>
                      <td><div id="total"></div> Tk</td>
                      <td>
                        <ul>
                        <li class="remove_cart_item" id="remove_cart_item_{{ $cart_item->CART_ID }}" value="{{ $cart_item->CART_ID }}"><i class="fas fa-window-close"></i>

                          <!-- Get Cart id in hidden form -->
                          <input type="hidden" name="cart_id" value="{{ $cart_item->CART_ID }}">
                          <!-- Get Cart id in hidden form -->
                        </li>
                        </ul>
                      </td>
                    </tr>
                    @endforeach
                    <!-- <tr>
                      <td>
                        <a href="#"><img src="assets/img/client/student1.jpg" class="img-fluid mx-auto d-block" alt="Product"></a>
                      </td>
                      <td><a href="#">Product Name</a></td>
                      <td>
                        <input type="number" class="form-control" name="" value="01">
                      </td>
                      <td>$50.00</td>
                      <td>$50.00</td>
                      <td>
                        <a href="#"><i class="fas fa-window-close"></i></a>
                      </td>
                    </tr> -->
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <table class="table table-striped total-table">
                  <thead>
                    <tr>
                      <td>Order Number : 98hju&8</td>
                      <th>Total Price</th>
                      <th>$150.00</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
            <!--== Cart Summary Area End ==-->
          </div>

        </div>
      </div>
    </section>
    <!--== Main Content Area End ==-->

@endsection



<script src="http://code.jquery.com/jquery-3.3.1.min.js"
               integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
               crossorigin="anonymous"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
   var qty = $(this).val();
   var price = $('#price').val();
   $('#total').html(qty*price);

  $('#qty').on('keyup',function(){
   //alert('key had pressed');
   var qty = $(this).val();
   var price = $('#price').val();
   $('#total').html(qty*price);
  });

  $('#qty').on('click',function(){
   //alert('key had pressed');
   var qty = $(this).val();
   var price = $('#price').val();
   $('#total').html(qty*price);
  });
 });
</script>
<!-- 
<script>
 jQuery(document).ready(function(){
    jQuery(document).on('click', '#qty', function(e) {
      alert('clicked')
       e.preventDefault();

    });
 });
</script> -->