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
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="{{ URL('/admin/product/item/create')}}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/product/item/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Product Category</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="category_name" required="">
                        <option value="">Select Category</option>
                        @foreach( $categories as $category )
                        <option value="{{ $category->PRODUCT_CATEGORY_ID }}">
                          {{ $category->CATEGORY_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('category_name'))
                          <span class="error_msg">
                            {{ $errors->first('category_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Product Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="product_name" placeholder="Item Title">

                      @if ($errors->has('product_name'))
                          <span class="error_msg">
                            {{ $errors->first('product_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Short Code</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="short_code" placeholder="Short Code">

                      @if ($errors->has('short_code'))
                          <span class="error_msg">
                            {{ $errors->first('short_code') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Product Code</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="product_code" placeholder="Product Code">

                      @if ($errors->has('product_code'))
                          <span class="error_msg">
                            {{ $errors->first('product_code') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Brand Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="brand_name">
                        <option value="">Select Brand</option>
                        @foreach( $brands as $brand )
                        <option value="{{ $brand->BRAND_ID }}">
                          {{ $brand->BRAND_NAME }}
                        </option>
                        @endforeach
                      </select>

                      @if ($errors->has('brand_name'))
                          <span class="error_msg">
                            {{ $errors->first('brand_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Product Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="content" placeholder="Product Content" rows="15"></textarea>

                      @if ($errors->has('content'))
                          <span class="error_msg">
                            {{ $errors->first('content') }}
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