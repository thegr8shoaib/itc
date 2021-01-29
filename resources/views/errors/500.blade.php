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
            <!-- error 500 -->
            <section class="row flexbox-container">
                <div class="col-xl-7 col-md-8 col-12 d-flex justify-content-center">
                    <div class="card auth-card bg-transparent shadow-none rounded-0 mb-0 w-100">
                        <div class="card-content">
                            <div class="card-body text-center">
                                <img src="{!! route('app-assets/images/pages/500.png') !!}" class="img-fluid align-self-center" alt="branding logo">
                                <h1 class="font-large-2 mt-1 mb-0">Internal Server Error!</h1>
                                <p class="p-3">
                                  We are working on fixing the problem. Please try again.
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- error 500 end -->

        </div>





    </div>
</div>
<!-- END: Content-->

@endsection
