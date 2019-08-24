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


                <a href="/admin/offer" class="btn btn-primary">Refresh</a>


                <!-- Add New Record Start -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
                  Add Offer
                </button>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Offer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          

                        <!--== Data Form Start ==-->
                        <form action="{{url('/admin/offer/store')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Offer Name</label>
                            <div class="col-sm-8">
                              <input type="text"  class="form-control" name="offer_name" placeholder="Offer Name">

                              @if ($errors->has('offer_name'))
                                  <span class="error_msg">
                                    {{ $errors->first('offer_name') }}
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

                          <div class="form-group row">
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
                <caption>List of Offers</caption>
                <thead>
                  <tr>
                    <th scope="col">Offer Name</th>
                    <th scope="col">Offer Percentage</th>
                    <th scope="col">Offer Start</th>
                    <th scope="col">Offer End</th>
                    <th scope="col">Has Child</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Child</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $offers as $offer )
                  <tr>
                    <td>{{ $offer->OFFER_NAME }}</td>
                    <td>{{ $offer->OFFER_PERCENTAGE }} %</td>
                    <td>{{ $offer->VALID_FROM_DATE }}</td>
                    <td>{{ $offer->VALID_END_DATE }}</td>
                    <td>
                      @if( $offer->CHD_EXIST == '1' )
                        Yes
                      @else
                        No
                      @endif
                    </td>
                    <td>
                      @if( $offer->ACTIVE_STATUS == '1' )
                        <span class="active_status">Active</span>
                      @else
                        <span class="inactive_status">Inactive</span>
                      @endif
                    </td>
                    <td>
                      @if( $offer->CHD_EXIST == '1' )
                      <a href="/admin/offer/category/{{ $offer->OFFER_ID }}" class="btn btn-success">Child</a>
                      @endif
                    </td>
                    <td>
                      <!-- <a href="/admin/product/item/size/edit/{{ $offer->OFFER_ID }}" class="btn btn-primary">Edit</a> -->

                      <!-- Edit Record Start -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal-{{ $offer->OFFER_ID }}">
                        Edit
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="editModal-{{ $offer->OFFER_ID }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalTitle" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalTitle">Edit Offer</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                            



                            <!--== Data Form Start ==-->
                            <form action="/admin/offer/update/{{ $offer->OFFER_ID }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Name</label>
                                <div class="col-sm-8">
                                  <input type="text"  class="form-control" name="offer_name" value="{{ $offer->OFFER_NAME }}" placeholder="Offer Name">

                                  @if ($errors->has('offer_name'))
                                      <span class="error_msg">
                                        {{ $errors->first('offer_name') }}
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

                              <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Offer Child Exist</label>
                                <div class="col-sm-8">
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="child_exist" value="1" id="child_exist_{{ $offer->OFFER_ID }}" @if( $offer->CHD_EXIST == '1' ) checked @endif>
                                    <label class="custom-control-label" for="child_exist_{{ $offer->OFFER_ID }}">Has Child</label>
                                  </div>

                                  @if ($errors->has('child_exist'))
                                      <span class="error_msg">
                                        {{ $errors->first('child_exist') }}
                                      </span>
                                  @endif
                                </div>
                              </div>

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