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
                <form action="{{ url('/admin/banner') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="banner_title" placeholder="Banner Title">
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
                <caption>List of Banners</caption>
                <thead>
                  <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Page Name</th>
                    <th scope="col">Location</th>
                    <th scope="col">Serial No</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $banners as $banner )
                  <tr>
                    <td><img src="/uploads/images/banner/{{ $banner->IMAGE_PATH }}" alt="Slide"></td>
                    <td>{{ $banner->BANNER_TITLE }}</td>
                    <td>
                      @if( $banner->PAGE_SHORT_CODE == 'H')
                        Home Page
                      @endif
                    </td>
                    <td>
                      @if( $banner->PAGE_LOC_SHORT_CODE == 'M')
                        Page Middle
                      @elseif( $banner->PAGE_LOC_SHORT_CODE == 'L')
                        Left Sidebar
                      @elseif( $banner->PAGE_LOC_SHORT_CODE == 'R')
                        Right Sidebar
                      @endif
                    </td>
                    <td>{{ $banner->SL_NO }}</td>
                    <td>
                      @if( $banner->ACTIVE_STATUS == '1' )
                        <a href="/admin/banner/status/{{ $banner->BANNER_ID }}" class="active_status">Active</a>
                      @else
                        <a href="/admin/banner/status/{{ $banner->BANNER_ID }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="/admin/banner/show/{{ $banner->BANNER_ID }}" class="btn btn-success">View</a>
                      <a href="/admin/banner/edit/{{ $banner->BANNER_ID }}" class="btn btn-primary">Edit</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $banners->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection