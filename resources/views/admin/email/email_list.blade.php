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
                <li class="breadcrumb-item"><a href="#">Contact</a></li>
                <li class="breadcrumb-item"><a href="#">Email</a></li>
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
                <form action="{{ url('/admin/email') }}" method="get" class="dashboard-search-form">
                  <div class="row">
                    <div class="col">
                      <input type="text" class="form-control" name="subject" placeholder="Subject">
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="email" placeholder="Email">
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
                <caption>List of Emails</caption>
                <thead>
                  <tr>
                    <th scope="col">Subject</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Active Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach( $emails as $email )
                  <tr>
                    <td>{{ $email->SUBJECT }}</td>
                    <td>{{ $email->FROM_EMAIL_ID }}</td>
                    <td>
                      @if( $email->ACTIVE_STATUS == '1' )
                        <a href="/admin/email/status/{{ $email->CONTACT_EMAIL_ID }}" class="active_status">Active</a>
                      @else
                        <a href="/admin/email/status/{{ $email->CONTACT_EMAIL_ID }}" class="inactive_status">Inactive</a>
                      @endif
                    </td>
                    <td>
                      <a href="/admin/email/show/{{ $email->CONTACT_EMAIL_ID }}" class="btn btn-success">View</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            {{ $emails->links() }}
            <!--== Data table End ==-->

          </main>
          <!--== Dashboard Main End ==-->
        </div>
      </div>
    </section>
    <!--== Dashboard Area End ==-->


@endsection