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


                @foreach( $items as $item )
                <a href="/admin/product/item/size/show/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Refresh</a>

                <!-- <a href="/admin/product/item/size/create/{{ $item->PRODUCT_ID }}" class="btn btn-success">Add Size</a> -->

                <a href="/admin/product/item/show/{{ $item->PRODUCT_ID }}" class="btn btn-info">Back</a>
                @endforeach



                <!-- Add New Record Start -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                  Add Size
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product Size</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          

                        <!--== Data Form Start ==-->
                        <form action="{{url('/admin/product/item/size/store')}}" method="post" enctype="multipart/form-data">
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
                <caption>List of Product Colors</caption>
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Size</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $sizes as $size )
                  <tr>
                    <td><img src="/products/{{ $size->PRODUCT_ID }}/{{ $size->IMAGE_PATH }}" alt="Slide" style="max-height: 50px; width: auto;"></td>
                    <td>{{ $size->PRODUCT_NAME }}</td>
                    <td>{{ $size->SIZE }}</td>
                    <td>
                      @if( $size->ACTIVE_STATUS == '1' )
                        <span class="active_status">Active</span>
                      @else
                        <span class="inactive_status">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <!-- <a href="/admin/product/item/size/edit/{{ $size->PRODUCT_SIZE_ID }}" class="btn btn-primary">Edit</a> -->




                      <!-- Edit Record Start -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $size->PRODUCT_SIZE_ID }}">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editModal-{{ $size->PRODUCT_SIZE_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalTitle">Edit Size</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            



                            <!--== Data Form Start ==-->
                            <form action="/admin/product/item/size/update/{{ $size->PRODUCT_SIZE_ID }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Product Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" value="{{ $size->PRODUCT_NAME }}" name="" disabled="disabled">

                                  <input type="hidden" class="form-control" value="{{ $size->PRODUCT_ID }}" name="product_id">
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Product Size</label>
                                <div class="col-sm-8">
                                  <input type="text"  class="form-control" name="product_size" value="{{ $size->SIZE }}" placeholder="Item Size">

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

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Active Status</label>
                                <div class="col-sm-8">
                                  <select class="form-control" name="active_status">
                                    <option value="1" @if( $size->  ACTIVE_STATUS == '1' ) selected @endif>Active</option>
                                    <option value="0" @if( $size->  ACTIVE_STATUS == '0' ) selected @endif>Inactive</option>
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

            {{ $sizes->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection