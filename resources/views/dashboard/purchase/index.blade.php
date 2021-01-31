@extends('layouts.dashboard')

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">

        @include('common.messages')
        <div class="content-body">



            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Purchase</h4>
                            @if (superAdmin())
                              <a href="{{ route('purchase.create') }}" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Add Purchase</a>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-hover-animation mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Quantity :</th>
                                            <th>Purchase Price :</th>
                                            <th>Sale Price :</th>
                                            <th>Manufacturing Date:</th>
                                            <th>Expire Date:</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (!$purchases->count())
                                        <tr>
                                          <td colspan="10" class="text-center">
                                            <h2 class="py-2">No Result Found</h2>
                                          </td>
                                        </tr>
                                      @else

                                        @foreach ($purchases as $purchase)
                                        <tr>
                                          @php

                                          @endphp
                                            <td>
                                              {{ $loop->iteration }}
                                            </td>

                                            <td>

                                              {{ $purchase->product->name }}
                                            </td>

                                            <td>
                                              {{ $purchase->quantity }}
                                            </td>

                                            <td>
                                              {{ $purchase->purchasePrice }}
                                            </td>

                                            <td>
                                              {{ $purchase->salePrice }}
                                            </td>

                                            <td>
                                              {{ $purchase->manufacturingDate }}
                                            </td>

                                            <td>
                                              {{ dateTimeToFormatedDate($purchase->expireDate, 'd M, Y') }}
                                            </td>



                                            <td>
                                             {{-- <a  href="{{ route('purchase.edit',$purchase->id) }}"><i class="fa fa-edit d-inline">  </i></a> --}}
                                             <form class="d-inline" action="{{ route('purchase.destroy' , $purchase->id) }}" method="post">
                                                 @csrf


                                                 {{ method_field('delete') }}
                                               <button type="submit" name="button" class="bg-transparent border-0 d-inline text-danger "> <i class="fa fa-trash"> </i></button>

                                             </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                      @endif


                                    </tbody>
                                </table>
                            </div>


                            @if ($purchases->count())
                            <div class="justify-content-center d-flex mt-2">
                              {{ $purchases->links() }}
                            </div>
                            @endif


                        </div>
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
