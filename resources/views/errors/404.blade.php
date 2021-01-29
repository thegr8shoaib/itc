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
            <!-- error 404 -->
            <section class="row flexbox-container">
                <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                    <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="{{ asset('app-assets/images/pages/404.png') }}" class="img-fluid align-self-center" alt="branding logo">
                                <h1 class="font-large-2 my-1">Sorry, this page isn't available.</h1>
                                <p class="p-2">
                                    The link you followed may be broken, or the page may have been removed.
                                </p>
                                <a class="btn btn-primary btn-lg mt-2" href="{{ route('root') }}">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- error 404 end -->

        </div>






    </div>
</div>
<!-- END: Content-->

@endsection
