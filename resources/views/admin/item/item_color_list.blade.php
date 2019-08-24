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

                @include('admin.inc.message')


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
                @foreach( $items as $item )
                <a href="/admin/product/item/color/show/{{ $item->PRODUCT_ID }}" class="btn btn-primary">Refresh</a>

                <!-- <a href="/admin/product/item/color/create/{{ $item->PRODUCT_ID }}" class="btn btn-success">Add Color</a> -->

                <a href="/admin/product/item/show/{{ $item->PRODUCT_ID }}" class="btn btn-info">Back</a>
                @endforeach


                <!-- Add New Record Start -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal">
                  Add Color
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product Color</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        


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
                                @foreach( $pre_colors as $pre_color )
                                <option value="{{ $pre_color->COLOR_ID }}">
                                  {{ $pre_color->COLOR_NAME }}
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
                    <th scope="col">Color Name</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $colors as $color )
                  <tr>
                    <td><img src="/products/{{ $color->PRODUCT_ID }}/{{ $color->IMAGE_PATH }}" alt="Slide" style="max-height: 50px; width: auto;"></td>
                    <td>{{ $color->PRODUCT_NAME }}</td>
                    <td>{{ $color->COLOR_NAME }}</td>
                    <td>
                      @if( $color->ACTIVE_STATUS == '1' )
                        <span class="active_status">Active</span>
                      @else
                        <span class="inactive_status">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <!-- <a href="/admin/product/item/color/edit/{{ $color->PRODUCT_COLOR_ID }}" class="btn btn-primary">Edit</a> -->

                      <!-- Edit Record Start -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $color->PRODUCT_COLOR_ID }}">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editModal-{{ $color->PRODUCT_COLOR_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Color</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              


                              <!--== Data Form Start ==-->
                              <form action="/admin/product/item/color/update/{{ $color->PRODUCT_COLOR_ID }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Product Name</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $color->PRODUCT_NAME }}" name="" disabled="disabled">

                                    <input type="hidden" class="form-control" value="{{ $color->PRODUCT_ID }}" name="product_id">
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <label class="col-sm-4 col-form-label">Product Color</label>
                                  <div class="col-sm-8">
                                    <select class="form-control" name="color_name" required="">
                                      <option value="">Select Color</option>
                                      @foreach( $pre_colors as $pre_color )
                                      <option value="{{ $pre_color->COLOR_ID }}" @if( $color->COLOR_ID == $pre_color->COLOR_ID ) selected @endif>
                                        {{ $pre_color->COLOR_NAME }}
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
                                <label class="col-sm-4 col-form-label">Active Status</label>
                                <div class="col-sm-8">
                                  <select class="form-control" name="active_status">
                                    <option value="1" @if( $color->  ACTIVE_STATUS == '1' ) selected @endif>Active</option>
                                    <option value="0" @if( $color->  ACTIVE_STATUS == '0' ) selected @endif>Inactive</option>
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
                      <!-- Edit Record End -->


                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $colors->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection