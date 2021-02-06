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
                        <h2 class="content-header-title float-left mb-0">Add Purchase</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('purchase.store') }}">
                            @csrf

                            <div class="row mt-1">


                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                          <label for="productId" >Slect Product :</label>
                                           <select class="form-control" id="productId" name="productId">

                                           </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="quantity">Quantity :</label>
                                           <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="purchasePrice">Purchase Price :</label>
                                           <input type="number" class="form-control" id="purchasePrice" name="purchasePrice" value="{{ old('purchasePrice') }}" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="salePrice">Sale Price :</label>
                                           <input type="number" class="form-control" id="salePrice" name="salePrice" value="{{ old('salePrice') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="manufacturingDate">Manufacturing Date:</label>
                                           <input type="number" class="form-control manufacturingDate" id="manufacturingDate" name="manufacturingDate" value="{{ old('manufacturingDate') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label for="expireDate">Expire Date:</label>
                                           <input type="number" class="form-control expireDate" id="expireDate" name="expireDate" value="{{ old('expireDate') }}" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
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
      flatpickr('.manufacturingDate',{
        defaultDate: "{{ date('Y-m-d') }}"
      });
      flatpickr('.expireDate',{
        defaultDate: "{{ date('Y-m-d',strtotime('+1 week')) }}"
      });
      // product
      $('#productId').select2({
        ajax: {
          url: '{{ route('productsSearch') }}',
          dataType: 'json',
          processResults: function (data) {
            console.log(data);
   // Transforms the top-level key of the response object from 'items' to 'results'
             return {
               results: data
             };
           },

        },
        minimumInputLength: 1,
        placeholder: 'Search products',
      });
  });
</script>
@endsection
@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
<link rel="stylesheet" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
@endsection
