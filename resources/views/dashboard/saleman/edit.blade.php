@extends('layouts.dashboard')

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Update Saleman</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('salemans.update', $saleman->id) }}">
                            @csrf
                            {{ method_field('put') }}

                            <div class="row mt-1">





                                @if (isset($saleman) && superAdmin())
                                  <div class="row mt-1">


                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                <label for="name" > Name :</label>
                                                 <input type="text" id="name" class="form-control" name="name" value="{{ $saleman->name }}" required>
                                              </div>
                                          </div>
                                      </div>



                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="designation">Email:</label>
                                                 <input type="email" class="form-control" id="designation" name="designation" value="{{$saleman->designation }}" required>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="contactNumber">Contact Number:</label>
                                                 <input type="number" class="form-control" id="contactNumber" name="contactNumber" value="{{$saleman->contactNumber}}" required>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="address">Address:</label>
                                                 <input type="text" class="form-control" id="address" name="address" value="{{$saleman->address }}" required>
                                              </div>
                                          </div>
                                      </div>

                                @endif


                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Update Saleman</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- END: Content-->
@endsection

@section('pageend')
@include('common.sweetalert')
@endsection

@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
@endsection
