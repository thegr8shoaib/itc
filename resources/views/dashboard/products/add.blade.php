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
                        <h2 class="content-header-title float-left mb-0">Add Product</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('products.store') }}">
                            @csrf

                            <div class="row mt-1">


                                <div class="col-12 col-sm-6 col-md-4 col-lg-6">
                                    <div class="form-group">
                                        <div class="controls">
                                          <label for="name" >Product Name :</label>
                                           <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>






                                {{-- <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="company">Company :</label>
                                            <select class="form-control" name="company">
                                              @foreach ($companies as $comapny )
                                                <option value="{{ $comapny->name }}">{{ $comapny->name }}</option>
                                              @endforeach
                                            </select>
                                           {{-- <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}" required> --}}
                                        </div>
                                    </div>
                                </div>


{{--
                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="unit">Units Per Pack:</label>
                                           <input type="number" class="form-control" id="unit" name="unit" value="{{ old('unit') }}" required>
                                        </div>
                                    </div>
                                </div> --}}


                                <div class="col-12 mb-5 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                                    <button type="reset" class="btn btn-outline-warning">Reset</button>
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
<script src="{{ asset("app-assets/vendors/js/forms/select/select2.full.min.js") }}" charset="utf-8"></script>
<script type="text/javascript">
  $(document).ready(function() {
      $('.select2Video').select2();
      $('.select2Video').val(60).trigger('change');

  });
</script>
@endsection

@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
<link rel="stylesheet" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
@endsection
