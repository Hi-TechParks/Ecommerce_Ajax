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
                <li class="breadcrumb-item active" aria-current="page">List</li>
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
                <!--== Search Form Start ==-->
                <form action="{{ url('/admin/product/item') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="product_name" placeholder="Item Title">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-success">Search</button>
                    </div>
                  </div>
                </form>
                <!--== Search Form End ==-->
              </div>
            </div>

            <!--== Data table Start ==-->
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped">
                <caption>List of Products</caption>
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Item Title</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $items as $item )
                  <tr>
                    <td><img src="/products/{{ $item->PRODUCT_ID }}/{{ $item->IMAGE_PATH }}" alt="Slide" style="max-height: 50px; width: auto;"></td>
                    <td>{{ $item->PRODUCT_NAME }}</td>
                    <td>{{ $item->CATEGORY_NAME }}</td>
                    <td>{{ $item->BRAND_NAME }}</td>
                    <td>
                      @if( $item->ACTIVE_STATUS == '1' )
                        <a href="/admin/product/item/status/{{ $item->PRODUCT_ID }}" class="active_status">Active</a>
                      @else
                        <a href="/admin/product/item/status/{{ $item->PRODUCT_ID }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="/admin/product/item/show/{{ $item->PRODUCT_ID }}" class="btn btn-success">View</a>
                      <a href="/admin/product/item/edit/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $items->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection