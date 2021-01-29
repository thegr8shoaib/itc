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
                        <h2 class="content-header-title float-left mb-0">Update Company</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('company.update',$company->id) }}">
                            @csrf
                            {{ method_field('put') }}

                            <div class="row mt-1">





                                @if (isset($company) && superAdmin())
                                  <div class="row mt-1">


                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                <label for="name" > Name :</label>
                                                 <input type="text" id="name" class="form-control" name="name" value="{{ $company->name }}" required>
                                              </div>
                                          </div>
                                      </div>

                                @endif


                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Update Company</button>

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
