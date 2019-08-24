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
                <li class="breadcrumb-item"><a href="#">Banner</a></li>
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
                    <a href="{{ URL('/admin/banner/create')}}" class="btn btn-primary">Refresh</a>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-body">
                <!--== Data Form Start ==-->
                <form action="{{url('/admin/banner/store')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Banner Title</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="banner_title" placeholder="Banner Title">

                      @if ($errors->has('banner_title'))
                          <span class="error_msg">
                            {{ $errors->first('banner_title') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Banner Details</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="details" placeholder="Banner Content" rows="6"></textarea>

                      @if ($errors->has('details'))
                          <span class="error_msg">
                            {{ $errors->first('details') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Page</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="page_name">
                        <option value="">Select Page</option>
                        <option value="H">Home Page</option>
                      </select>

                      @if ($errors->has('page_name'))
                          <span class="error_msg">
                            {{ $errors->first('page_name') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Location</label>
                    <div class="col-sm-8">
                      <select class="form-control" name="location">
                        <option value="">Select Location</option>
                        <option value="M">Page Middle</option>
                        <option value="L">Left Sidebar</option>
                        <option value="R">Right Sidebar</option>
                      </select>

                      @if ($errors->has('location'))
                          <span class="error_msg">
                            {{ $errors->first('location') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Banner Image</label>
                    <div class="col-sm-8">
                      <input type="file" class="form-control" name="banner_image" placeholder="Banner Image">
                      Best Resolution : 400px X 280px

                      @if ($errors->has('banner_image'))
                          <span class="error_msg">
                            {{ $errors->first('banner_image') }}
                          </span>
                      @endif
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Serial No</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="serial_no" placeholder="Serial No">

                      @if ($errors->has('serial_no'))
                          <span class="error_msg">
                            {{ $errors->first('serial_no') }}
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