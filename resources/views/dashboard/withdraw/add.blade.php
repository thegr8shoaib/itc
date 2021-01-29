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
                        <h2 class="content-header-title float-left mb-0">Make Withdraw</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('withdraws.store') }}">
                            @csrf

                            <div class="row mt-1">

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Gateway Name</label>
                                            <select class="form-control" name="gateway" >
                                              <option value="EasyPaisa">EasyPaisa</option>
                                              <option value="JazzCash">JazzCash</option>
                                              {{-- <option value="Perfect Money">Perfect Money</option>
                                              <option value="Mezaan Bank">Mezaan Bank</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Amount</label>
                                        <input type="text" class="form-control" name="amount" value="{{ old('amount') }}" placeholder="" required>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Account ID / Mobile Number</label>
                                            <input type="text" class="form-control" name="accountNumber" value="{{ old('accountNumber') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="controls">
                                            <label>Account Title (If required)</label>
                                            <input type="text" class="form-control" name="accountTitle" value="{{ old('accountTitle') }}">
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
@endsection

@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
@endsection
