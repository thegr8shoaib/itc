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
                        <h2 class="content-header-title float-left mb-0">Order Detail</h2>
                    </div>
                </div>
            </div>
            {{-- {{ dd($order) }} --}}
        </div>
        @include('common.messages')
        <div class="card-content">
            <div class="table-responsive mt-1">
                <table class="table table-hover-animation mb-0">
                    <thead>
                        <tr>

                            <th>Product Name</th>
                            <th>Total Products</th>
                            <th>Total Amount</th>
                            <th>Order Date Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->quantity * $item->salePrice }}</td>
                            {{-- <td>{{ $date }}</td> --}}
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <form class="d-inline" action="{{ route('returnOrderItem' , $item->id) }}" method="post">
                                    @csrf

                                    <label for="returnitems">Return items</label>
                                    <input type="number" style="width:90px" max="{{ $item->quantity }}"
                                     class="form-control d-inline" name="quantity" min="0" value="1">
                                    <button type="submit" name="button" class="bg-transparent border-0 d-inline  "> <i class="fa fa-edit"></i></button>

                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>


            {{-- @if ($order->count())
            <div class="justify-content-center d-flex mt-2">
              {{ $order->links() }}
        </div>
        @endif --}}


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
