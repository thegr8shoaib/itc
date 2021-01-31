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
                        <h2 class="content-header-title float-left mb-0">Update Expence</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('expence.update', $expence->id) }}">
                            @csrf
                            {{ method_field('put') }}

                            <div class="row mt-1">





                                @if (isset($expence) && superAdmin())
                                  <div class="row mt-1">


                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                <label for="name" > Name :</label>
                                                 <input type="text" id="name" class="form-control" name="name" value="{{ $expence->name }}" required>
                                              </div>
                                          </div>
                                      </div>



                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="amount">Amount :</label>
                                                 <input type="number" class="form-control" id="amount" name="amount" value="{{$expence->amount }}" required>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="discription">Discription:</label>
                                                 <input type="text" class="form-control" id="discription" name="discription" value="{{$expence->discription}}" required>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                <label for="Date">Date:</label>
                                               <input type="number" class="form-control Date" id="Date" name="Date" value="{{$expence->Date}}" required>
                                              </div>
                                          </div>
                                      </div>


                                @endif


                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Update Expence</button>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
<script type="text/javascript">
flatpickr('.Date')
</script>

<!-- END: Content-->
@endsection

@section('pageend')
@include('common.sweetalert')
@endsection

@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
@endsection
