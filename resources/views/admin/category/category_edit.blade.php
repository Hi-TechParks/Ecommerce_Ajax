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
                <li class="breadcrumb-item"><a href="#">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
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

            @foreach ($categories as $category)
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-10">
                    
                    @include('admin.inc.message')
                    
                  </div>
                  <div class="col-md-2">
                    <a href="/admin/product/category/edit/{{ $category->PRODUCT_CATEGORY_ID }}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="/admin/product/category/update/{{ $category->PRODUCT_CATEGORY_ID }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Category Name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="category" value="{{ $category->CATEGORY_NAME }}" placeholder="Category Title">

                      @if ($errors->has('category'))
                          <span class="error_msg">
                            {{ $errors->first('category') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Shop Name</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="shop_name">
                        <option value="">Select Shop</option>
                        @foreach( $shops as $shop )
                        <option value="{{ $shop->SHOP_ID }}" @if( $shop->SHOP_ID == $category->SHOP_ID ) selected @endif>{{ $shop->SHOP_NAME }}</option>
                        @endforeach
                      </select>

                      @if ($errors->has('shop_name'))
                          <span class="error_msg">
                            {{ $errors->first('shop_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Short Code</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="short_code" value="{{ $category->SHORT_CODE }}" placeholder="Short Code">

                      @if ($errors->has('short_code'))
                          <span class="error_msg">
                            {{ $errors->first('short_code') }}
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
            @endforeach

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection