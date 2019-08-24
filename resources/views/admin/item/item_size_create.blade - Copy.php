@extends('layouts.master')
@section('content')


    <!--== Dashboard Area Start ==-->
    <section class="section mt-50" id="deshboard">
      <div class="container">
        <!--== Dashboard Breadcrumb Start ==-->
        <div class="row">
          <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item"><a href="#">Item</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
              </ol>
            </nav>
          </div>
        </div>
        <!--== Dashboard Breadcrumb End ==-->

        <div class="row">
          <!--== Dashboard Sidebar Start ==-->
          <aside class="col-md-3">
            @include('admin.inc.sidebar')
          </aside>
          <!--== Dashboard Sidebar End ==-->

          <!--== Dashboard Main Start ==-->
          <main class="col-md-9">

            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-5">
                    @foreach( $items as $item )
                    <a href="/admin/product/item/size/create/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Refresh</a>

                    <a href="/admin/product/item/color/create/{{ $item->PRODUCT_ID }}" class="btn btn-success">Add Color</a>

                    <a href="/admin/product/item/show/{{ $item->PRODUCT_ID }}" class="btn btn-info">Back</a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/product/item/size/store')}}" method="post" enctype="multipart/form-data">
                  @csrf

                <div id="dynamic_form">

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Product Name</label>
                    <div class="col-sm-8">
                      @foreach( $items as $item )
                      <input type="text" class="form-control" value="{{ $item->PRODUCT_NAME }}" name="" disabled="disabled">

                      <input type="hidden" class="form-control" value="{{ $item->PRODUCT_ID }}" name="product_id">
                      @endforeach
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Product Size</label>
                    <div class="col-sm-8">
                      <input type="text"  class="form-control" name="product_size" placeholder="Item Size">

                      @if ($errors->has('product_size'))
                          <span class="error_msg">
                            {{ $errors->first('product_size') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Item Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="item_image" placeholder="Item Image">

                      @if ($errors->has('item_image'))
                          <span class="error_msg">
                            {{ $errors->first('item_image') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <!-- <div class="form-group row">
                    <div class="col-sm-10">
                      <a href="javascript:void(0)" class="btn btn-danger" id="minus">Remove</a>

                      <a href="javascript:void(0)" class="btn btn-primary" id="plus">Add More</a>
                    </div>
                  </div> -->

                </div>

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
                <!--== Data Form End ==-->
              </div>
            </div>


            
              <!-- <form method="POST">
                <div class="form-group" id="dynamic_form">
                  <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="p_name" id="p_name" placeholder="Enter Product Name" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter Product Quantity" onkeyup = "if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')";>
                    </div>
                    <div class="col-md-4">
                        <textarea class="form-control" rows="1" name="remarks" placeholder="Enter Remarks" id="remarks"></textarea>
                    </div>
                    <div class="button-group">
                        <a href="javascript:void(0)" class="btn btn-primary" id="plus">Add More</a>
                        <a href="javascript:void(0)" class="btn btn-danger" id="minus">Remove</a>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form> -->
        
          <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
          <script type="text/javascript" src="js/dynamic-form.js"></script>
          <!-- <script>
              $(document).ready(function() {
                  var dynamic_form =  $("#dynamic_form").dynamicForm("#dynamic_form","#plus", "#minus", {
                    limit:10,
                    formPrefix : "dynamic_form",
                    normalizeFullForm : false
                });


                $("#dynamic_form #minus").on('click', function(){
                  var initDynamicId = $(this).closest('#dynamic_form').parent().find("[id^='dynamic_form']").length;
                  if (initDynamicId === 2) {
                    $(this).closest('#dynamic_form').next().find('#minus').hide();
                  }
                  $(this).closest('#dynamic_form').remove();
                });

              });
          </script> -->


          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection