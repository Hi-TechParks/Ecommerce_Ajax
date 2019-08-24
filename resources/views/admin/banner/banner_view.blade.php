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
            @foreach( $banners as $banner )
            <div class="card">
              <img src="/uploads/images/banner/{{ $banner->IMAGE_PATH }}" class="card-img-top" alt="Event">
              <div class="card-body">
                <h5 class="card-title">{{ $banner->BANNER_TITLE }}</h5>
                <p class="card-text">{!! $banner->BANNER_DESC !!}</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Page Name: 
                      @if( $banner->PAGE_SHORT_CODE == 'H')
                        Home Page
                      @endif
                </li>
                <li class="list-group-item">Location: 
                      @if( $banner->PAGE_LOC_SHORT_CODE == 'M')
                        Page Middle
                      @elseif( $banner->PAGE_LOC_SHORT_CODE == 'L')
                        Left Sidebar
                      @elseif( $banner->PAGE_LOC_SHORT_CODE == 'R')
                        Right Sidebar
                      @endif
                </li>
                <li class="list-group-item">Serial No: {{ $banner->SL_NO }}</li>
                <li class="list-group-item">
                  @if( $banner->ACTIVE_STATUS == '1' )
                    <p class="active_status">Active</p>
                  @else
                    <p class="inactive_status">Inactive</p>
                  @endif
                </li>
              </ul>
              <div class="card-body">
                <a href="/admin/banner/edit/{{ $banner->BANNER_ID }}" class="btn btn-primary">Edit</a>
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