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

                    <div class="card-body">


                      <form  action="{{ route('pos.index') }}" method="get">


                      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                          <div class="form-group">
                              <div class="controls">
                                  <label for="saleman">Saleman:</label>

                                  @if ($s)
                                    <select ref="saleman" class="form-control" id="saleman" name="s">
                                        <option value="" >select an option</option>
                                        @foreach ($salemans as $saleman)
                                          <option @if($saleman->id == $s) selected @endif value="{{ $saleman->id }}">{{ $saleman->name }}</option>
                                        @endforeach
                                    </select>
                                  @else
                                    <select ref="saleman" class="form-control" id="saleman" name="s">
                                        <option value="">select an option</option>
                                        @foreach ($salemans as $saleman)
                                          <option value="{{ $saleman->id }}">{{ $saleman->name }}</option>
                                        @endforeach
                                    </select>
                                  @endif

                              </div>
                          </div>
                      </div>
                      <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-sm" name="">Filter</button>
                      </div>
                    </form>




                    </div>
                </div>
              </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Point of sale</h4>
                            @if (superAdmin())
                              <a href="{{ route('pos.create') }}" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Create Invoice</a>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-hover-animation mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Saleman Name</th>
                                            <th>Total Products</th>
                                            <th>Total Amount</th>

                                            <th>Order Date</th>
                                            <th>Created</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @if (!$orders->count())
                                        <tr>
                                          <td colspan="10" class="text-center">
                                            <h2 class="py-2">No Result Found</h2>
                                          </td>
                                        </tr>
                                      @else

                                        @foreach ($orders as $order)
                                        <tr>
                                          @php

                                          @endphp
                                            <td>
                                              {{ $loop->iteration }}
                                            </td>
                                            <td>

                                              {{ $order->saleman->name }}
                                            </td>


                                            <td>
                                              {{ $order->orderItems->count() }}
                                            </td>
                                            <td>
                                              {{ $order->totalAmount() }}
                                            </td>


                                            <td>
                                              {{ $order->created_at->format('M d, Y') }}
                                            </td>
                                            <td>

                                              {{ $order->date->format('M d, Y') }}
                                            </td>



                                            <td>
                                             <a  href="{{ route('pos.show',$order->id) }}"><i class="fa fa-eye d-inline">  </i></a>

                                             <form class="d-inline" action="{{ route('pos.destroy' , $order->id) }}" method="post">
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


                            @if ($orders->count())
                            <div class="justify-content-center d-flex mt-2">
                              {{ $orders->links() }}
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
