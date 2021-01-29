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
                        <h2 class="content-header-title float-left mb-0">Update Purchase</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('purchase.update',$purchase->id) }}">
                            @csrf
                            {{ method_field('put') }}

                            <div class="row mt-1">





                                @if (isset($purchase) && superAdmin())
                                  <div class="row mt-1">


                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                <label for="product" >Purchase Name :</label>
                                                 <input type="text" id="product" class="form-control" name="product" value="{{ $purchase->product->name }}" required>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="quantity">Quantity :</label>
                                                 <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $purchase->quantity}}" required>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="purchasePrice">Purchase Price :</label>
                                                 <input type="number" class="form-control" id="purchasePrice" name="purchasePrice" value="{{ $purchase->purchasePrice }}" required>
                                              </div>
                                          </div>
                                      </div>


                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="salePrice">Sale Price :</label>
                                                 <input type="text" class="form-control" id="salePrice" name="salePrice" value="{{$purchase->salePrice }}" required>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="manufacturingDate">Manufacturing Date:</label>
                                                 <input type="number" class="form-control manufacturingDate" id="manufacturingDate" name="manufacturingDate" value="{{$purchase->manufacturingDate}}" required>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                                          <div class="form-group">
                                              <div class="controls">
                                                  <label for="expireDate">Expire Date:</label>
                                                 <input type="number" class="form-control expireDate" id="expireDate" name="expireDate" value="{{$purchase->expireDate }}" required>
                                              </div>
                                          </div>
                                      </div>

                                @endif


                                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Update Product</button>

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
flatpickr('.manufacturingDate')
 flatpickr('.expireDate')
</script>
<!-- END: Content-->
@endsection

@section('pageend')

@include('common.sweetalert')

@endsection

@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
<script type="text/javascript" href="/mawaisnow/lib/flatpicker/flatpickr.js" >


</script>
<link rel="stylesheet" href="/mawaisnow/lib/flatpicker/flatpickr.min.css">
@endsection
