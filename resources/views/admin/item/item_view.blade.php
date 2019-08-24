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
                <li class="breadcrumb-item active" aria-current="page">View</li>
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

            <!--== Data View Card Start ==-->
            @foreach( $items as $item )
            <div class="card">
              <img src="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" class="card-img-top" alt="Event">
              <div class="card-body">

                <!-- <a href="/admin/product/item/color/create/{{ $item->PRODUCT_ID }}" class="btn btn-success">Add Color</a>
                <a href="/admin/product/item/size/create/{{ $item->PRODUCT_ID }}" class="btn btn-success">Add Size</a> -->

                <a href="/admin/product/item/price/show/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Price</a>
                <a href="/admin/product/item/color/show/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Colors</a>
                <a href="/admin/product/item/size/show/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Sizes</a>
                <br/><br/>

                <h5 class="card-title">{{ $item->PRODUCT_NAME }}</h5>
                <p class="card-text">{!! $item->PRODUCT_DETAILS !!}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Category Name: {{ $item->CATEGORY_NAME }}</li>
                <li class="list-group-item">Brand Name: {{ $item->BRAND_NAME }}</li>
                <li class="list-group-item">Short Code: {{ $item->SHORT_CODE }}</li>
                <li class="list-group-item">Product ID: {{ $item->USER_PRODUCT_CODE }}</li>
                <li class="list-group-item">
                  @if( $item->ACTIVE_STATUS == '1' )
                    <p class="active_status">Active</p>
                  @else
                    <p class="inactive_status">Inactive</p>
                  @endif
                </li>
              </ul>
              <div class="card-body">
                <a href="/admin/product/item/edit/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Edit</a>
              </div>
            </div>
            @endforeach
            <!--== Data View Card End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection