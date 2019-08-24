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


                <a href="/admin/offer" class="btn btn-info">Back</a>

                @foreach( $parent_offers as $parent_offer )
                <a href="/admin/offer/category/{{ $parent_offer->OFFER_ID }}" class="btn btn-primary">Refresh</a>
                @endforeach


                <!-- Add New Record Start -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                  Add Offer Category
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Offer Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          

                        <!--== Data Form Start ==-->
                        <form action="{{url('/admin/offer/category/store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Name</label>
                            <div class="col-sm-8">
                              @foreach( $parent_offers as $parent_offer )
                              <input type="text" class="form-control" value="{{ $parent_offer->OFFER_NAME }}" name="" disabled="disabled">

                              <input type="hidden" class="form-control" value="{{ $parent_offer->OFFER_ID }}" name="offer_id">
                              @endforeach
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Category</label>
                            <div class="col-sm-8">
                              <select class="form-control" name="offer_category" required="required">
                                <option value="">Select Category</option>
                                @foreach( $categories as $category )
                                <option value="{{ $category->PRODUCT_CATEGORY_ID }}">{{ $category->CATEGORY_NAME }}</option>
                                @endforeach
                              </select>

                              @if ($errors->has('offer_category'))
                                  <span class="error_msg">
                                    {{ $errors->first('offer_category') }}
                                  </span>
                              @endif
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Percentage</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="offer_percentage" placeholder="Offer Percentage">

                              @if ($errors->has('offer_percentage'))
                                  <span class="error_msg">
                                    {{ $errors->first('offer_percentage') }}
                                  </span>
                              @endif
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Gross</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="offer_gross" placeholder="Offer Gross">

                              @if ($errors->has('offer_gross'))
                                  <span class="error_msg">
                                    {{ $errors->first('offer_gross') }}
                                  </span>
                              @endif
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Start</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" name="offer_start" placeholder="Offer Start">

                              @if ($errors->has('offer_start'))
                                  <span class="error_msg">
                                    {{ $errors->first('offer_start') }}
                                  </span>
                              @endif
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer End</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" name="offer_end" placeholder="Offer End">

                              @if ($errors->has('offer_end'))
                                  <span class="error_msg">
                                    {{ $errors->first('offer_end') }}
                                  </span>
                              @endif
                            </div>
                          </div>

                          <!-- <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Child Exist</label>
                            <div class="col-sm-8">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="child_exist" value="1" id="child_exist">
                                <label class="custom-control-label" for="child_exist">Has Child</label>
                              </div>

                              @if ($errors->has('child_exist'))
                                  <span class="error_msg">
                                    {{ $errors->first('child_exist') }}
                                  </span>
                              @endif
                            </div>
                          </div> -->

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
                <caption>List of Offers</caption>
                <thead>
                  <tr>
                    <th scope="col">Offer Name</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Offer Percentage</th>
                    <th scope="col">Offer Gross</th>
                    <th scope="col">Offer Start</th>
                    <th scope="col">Offer End</th>
                    <!-- <th scope="col">Has Child</th> -->
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $offers as $offer )
                  <tr>
                    <td>{{ $offer->OFFER_NAME }}</td>
                    <td>{{ $offer->CATEGORY_NAME }}</td>
                    <td>{{ $offer->OFFER_PERCENTAGE }} %</td>
                    <td>{{ $offer->OFFER_GROSS }} Tk</td>
                    <td>{{ $offer->VALID_FROM_DATE }}</td>
                    <td>{{ $offer->VALID_END_DATE }}</td>
                    <!-- <td>
                      @if( $offer->CHD_EXIST == '1' )
                        Yes
                      @else
                        No
                      @endif
                    </td> -->
                    <td>
                      @if( $offer->ACTIVE_STATUS == '1' )
                        <span class="active_status">Active</span>
                      @else
                        <span class="inactive_status">Inactive</span>
                      @endif
                    </td>
                    <td>
                      <!-- <a href="/admin/product/item/size/edit/{{ $offer->OFFER_CATEGORY_ID }}" class="btn btn-primary">Edit</a> -->

                      <!-- @if( $offer->CHD_EXIST == '1' )
                      <a href="/admin/product/item/size/edit/{{ $offer->OFFER_CATEGORY_ID }}" class="btn btn-success">Add Child</a>
                      @endif -->

                      <!-- Edit Record Start -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $offer->OFFER_CATEGORY_ID }}">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editModal-{{ $offer->OFFER_CATEGORY_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalTitle">Edit Offer Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            



                            <!--== Data Form Start ==-->
                            <form action="/admin/offer/category/update/{{ $offer->OFFER_CATEGORY_ID }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Name</label>
                                <div class="col-sm-8">
                                  @foreach( $parent_offers as $parent_offer )
                                  <input type="text" class="form-control" value="{{ $parent_offer->OFFER_NAME }}" name="" disabled="disabled">

                                  <input type="hidden" class="form-control" value="{{ $parent_offer->OFFER_ID }}" name="offer_id">
                                  @endforeach
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Category</label>
                                <div class="col-sm-8">
                                  <select class="form-control" name="offer_category" required="required">
                                    @foreach( $categories as $category )
                                    <option value="{{ $category->PRODUCT_CATEGORY_ID }}" @if( $category->PRODUCT_CATEGORY_ID == $offer->PRODUCT_CATEGORY_ID ) selected @endif>{{ $category->CATEGORY_NAME }}</option>
                                    @endforeach
                                  </select>

                                  @if ($errors->has('offer_category'))
                                      <span class="error_msg">
                                        {{ $errors->first('offer_category') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Percentage</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="offer_percentage" value="{{ $offer->OFFER_PERCENTAGE }}" placeholder="Offer Percentage">

                                  @if ($errors->has('offer_percentage'))
                                      <span class="error_msg">
                                        {{ $errors->first('offer_percentage') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Gross</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control" name="offer_gross" value="{{ $offer->OFFER_GROSS }}" placeholder="Offer Gross">

                                  @if ($errors->has('offer_gross'))
                                      <span class="error_msg">
                                        {{ $errors->first('offer_gross') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Start</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control" name="offer_start" value="{{ $offer->VALID_FROM_DATE }}" placeholder="Offer Start">

                                  @if ($errors->has('offer_start'))
                                      <span class="error_msg">
                                        {{ $errors->first('offer_start') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer End</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control" name="offer_end" value="{{ $offer->VALID_END_DATE }}" placeholder="Offer End">

                                  @if ($errors->has('offer_end'))
                                      <span class="error_msg">
                                        {{ $errors->first('offer_end') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

                              <!-- <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Child Exist</label>
                                <div class="col-sm-8">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="child_exist" value="1" id="child_exist_{{ $offer->OFFER_CATEGORY_ID }}" @if( $offer->CHD_EXIST == '1' ) checked @endif>
                                    <label class="custom-control-label" for="child_exist_{{ $offer->OFFER_CATEGORY_ID }}">Has Child</label>
                                  </div>

                                  @if ($errors->has('child_exist'))
                                      <span class="error_msg">
                                        {{ $errors->first('child_exist') }}
                                      </span>
                                  @endif
                                </div>
                              </div> -->

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Active Status</label>
                                <div class="col-sm-8">
                                  <select class="form-control" name="active_status">
                                    <option value="1" @if( $offer->  ACTIVE_STATUS == '1' ) selected @endif>Active</option>
                                    <option value="0" @if( $offer->  ACTIVE_STATUS == '0' ) selected @endif>Inactive</option>
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

            {{ $offers->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection