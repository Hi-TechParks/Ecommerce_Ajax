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
                    <a href="/admin/product/item/color/create/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Refresh</a>

                    <a href="/admin/product/item/size/create/{{ $item->PRODUCT_ID }}" class="btn btn-success">Add Size</a>

                    <a href="/admin/product/item/show/{{ $item->PRODUCT_ID }}" class="btn btn-info">Back</a>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/product/item/color/store')}}" method="post" enctype="multipart/form-data">
                  @csrf

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
                    <label class="col-sm-4 col-form-label">Product Color</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="color_name" required="">
                        <option value="">Select Color</option>
                        @foreach( $colors as $color )
                        <option value="{{ $color->COLOR_ID }}">
                          {{ $color->COLOR_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('color_name'))
                          <span class="error_msg">
                            {{ $errors->first('color_name') }}
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

                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </div>
                </form>
                <!--== Data Form End ==-->
              </div>
            </div>

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection