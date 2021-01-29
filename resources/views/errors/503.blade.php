@extends('layouts.auth')

@section('body')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>




        <div class="content-body">
            <!-- maintenance -->
            <section class="row flexbox-container">
                <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                    <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="{!! asset('app-assets/images/pages/maintenance-2.png') !!}" class="img-fluid align-self-center" alt="branding logo">
                                <h1 class="font-large-2 my-1">Under Maintenance!</h1>
                                <p class="px-2">
                                  Welcome to {{ conf('title') }}. We are doing planned maintenance.
                                </p>
                                <br>
                                <h3>Please check back soon.</h3>
                                {{-- <a class="btn btn-primary btn-lg mt-1" href="index.html">Back to Home</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- maintenance end -->

        </div>






    </div>
</div>
<!-- END: Content-->

@endsection
