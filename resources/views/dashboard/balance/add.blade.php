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
                        <h2 class="content-header-title float-left mb-0">Add Balance</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">


                        <form method="post" enctype="multipart/form-data" action="{{ route('balance.store') }}">
                            @csrf

                            <div class="row mt-1">


                                <div class="col-12 col-sm-6 col-md-4 col-lg-6">
                                    <div class="form-group">
                                        <div class="controls">
                                          <label for="amount" >Amount: </label>
                                           <input type="number" id="amount" class="form-control" name="amount" value="{{ old('amount') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-6">
                                    <div class="form-group">
                                        <div class="controls">
                                          <label for="date" >Date: </label>
                                           <input type="text" id="date" class="form-control" name="date" value="{{ old('date') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-6">
                                    <div class="form-group">
                                        <div class="controls">
                                          <label for="description" >Description: </label>
                                          <textarea id="description" class="form-control" required name="description" rows="8" cols="80">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-md-4 col-lg-6">
                                    <div class="form-group">
                                        <div class="controls">
                                          <label for="note" >Note: </label>
                                          <textarea id="note" class="form-control" name="note" rows="8" cols="80">{{ old('note') }}</textarea>
                                        </div>
                                    </div>
                                </div>









                                <div class="col-12 mb-5 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                    <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save</button>
                                    {{-- <button type="reset" class="btn btn-outline-warning">Reset</button> --}}
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

flatpickr('#date', {
    defaultDate: "{{ date('Y-m-d') }}"
});

</script>
@endsection

@section('headend')
<link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
<link rel="stylesheet" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
@endsection
