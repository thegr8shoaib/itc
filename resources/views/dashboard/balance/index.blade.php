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
                            <h4 class="mb-0">Balance</h4>
                            @if (superAdmin())
                            <a href="{{ route('balance.create') }}" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Add Balance</a>
                            @endif
                        </div>
                        <div class="card-content">
                            <div class="table-responsive mt-1">
                                <table class="table table-hover-animation mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Credit:</th>
                                            <th>Debit:</th>
                                            <th>Balance:</th>
                                            <th>Description</th>
                                            <th>Note</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!$balances->count())
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                <h2 class="py-2">No Result Found</h2>
                                            </td>
                                        </tr>
                                        @else

                                        @php
                                        $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                                        @endphp

                                        @foreach ($balances as $balance)

                                        <tr>

                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>
                                                {{ $balance->date->format('M d, Y') }}
                                            </td>

                                            <td>
                                                @if ($balance->type == 1)
                                                <p class="styleForMoney" title="{{ $f->format($balance->amount) }}">
                                                    {{ number_format($balance->amount, 2) }}
                                                    @endif

                                                </p>

                                            </td>

                                            <td>
                                                @if ($balance->type == 2)
                                                <p class="styleForMoney" title="{{ $f->format($balance->amount) }}">
                                                    {{ number_format($balance->amount, 2) }}
                                                </p>
                                                @endif
                                            </td>
                                            <td>
                                                <p class="styleForMoney" title="{{ $f->format($balance->closingBalance) }}">
                                                    {{ number_format($balance->closingBalance, 2) }}
                                                </p>
                                            </td>

                                            <td>
                                                {{ $balance->description }}
                                            </td>
                                            <td>
                                                {{ $balance->note }}
                                            </td>

                                            <td>
                                                <a href="{{ route('balance.edit',$balance->id) }}">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach
                                        @endif


                                    </tbody>
                                </table>
                            </div>


                            @if ($balances->count())
                            <div class="justify-content-center d-flex mt-2">
                                {{ $balances->links() }}
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
<style media="screen">
    .styleForMoney {
        font-family: monospace;
        font-weight: 700;
    }
</style>
@endsection
