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
                <li class="breadcrumb-item"><a href="#">Offer</a></li>
                <li class="breadcrumb-item"><a href="#">Category</a></li>
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
                <!-- <form action="{{ url('/admin/product/item') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="product_name" placeholder="Item Title">
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-success">Search</button>
                    </div>
                  </div>
                </form> -->
                <!--== Search Form End ==-->


                @include('admin.inc.message')

                <a href="/admin/shop" class="btn btn-primary">Refresh</a>


                <!-- Add New Record Start -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                  Add Shop
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Shop</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          

                        <!--== Data Form Start ==-->
                        <form action="{{url('/admin/shop/store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Shop Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="shop_name" placeholder="Shop Name">

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
                              <input type="text" class="form-control" name="short_code" placeholder="Short Code">

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
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </form>
                        <!--== Data Form End ==-->


                      </div>
                    </div>
                  </div>
                </div>
                <!-- Add New Record End -->

              </div>
            </div>

            <!--== Data table Start ==-->
            <div class="table-responsive">
              <table class="table table-hover table-bordered table-striped">
                <caption>List of Shops</caption>
                <thead>
                  <tr>
                    <th scope="col">Shop Name</th>
                    <th scope="col">Short Code</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $shops as $shop )
                  <tr>
                    <td>{{ $shop->SHOP_NAME }}</td>
                    <td>{{ $shop->SHORT_CODE }}</td>
                    <td>
                      @if( $shop->ACTIVE_STATUS == '1' )
                        <span class="active_status">Active</span>
                      @else
                        <span class="inactive_status">Inactive</span>
                      @endif
                    </td>
                    <td>

                      <!-- Edit Record Start -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $shop->SHOP_ID }}">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editModal-{{ $shop->SHOP_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalTitle">Edit Shop</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            



                            <!--== Data Form Start ==-->
                            <form action="/admin/shop/update/{{ $shop->SHOP_ID }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Shop Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="shop_name" value="{{ $shop->SHOP_NAME }}" placeholder="Shop Name">

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
                                  <input type="text" class="form-control" name="short_code" value="{{ $shop->SHORT_CODE }}" placeholder="Short Code">

                                  @if ($errors->has('short_code'))
                                      <span class="error_msg">
                                        {{ $errors->first('short_code') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Active Status</label>
                                <div class="col-sm-8">
                                  <select class="form-control" name="active_status">
                                    <option value="1" @if( $shop->  ACTIVE_STATUS == '1' ) selected @endif>Active</option>
                                    <option value="0" @if( $shop->  ACTIVE_STATUS == '0' ) selected @endif>Inactive</option>
                                  </select>

                                  @if ($errors->has('active_status'))
                                      <span class="error_msg">
                                        {{ $errors->first('active_status') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group row">
                                <div class="col-sm-10">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </form>
                            <!--== Data Form End ==-->



                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Edit Record Start -->



                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $shops->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection