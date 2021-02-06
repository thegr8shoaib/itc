@extends('layouts.dashboard')

@section('body')
  <!-- BEGIN: Content-->
  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">

           @include('common.messages')
          <div class="content-body">





              <!-- Vuexy Checkbox Sizes start -->
              <section class="vuexy-checkbox-sizes">
                  <div class="row">

                    @if (superAdmin())
                      <div class="col-lg-4 col-sm-12 col-12">
                         <div class="card">
                             <div class="card-header d-flex align-items-start pb-0">
                                 <div>
                                     <h2 class="text-bold-700 mb-0">
                                       <a href="{{ route('products.index') }}">{{$shortItems}}</a>
                                     </h2>
                                     <p>Short Items</p>
                                 </div>
                                 <div class="avatar bg-rgba-primary p-50 m-0">
                                     <div class="avatar-content">
                                         <i class="feather icon-users text-primary font-medium-5"></i>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                      <div class="col-lg-4 col-sm-12 col-12">
                         <div class="card">
                             <div class="card-header d-flex align-items-start pb-0">
                                 <div>
                                     <h2 class="text-bold-700 mb-0">
                                       <a href="{{ route('pos.index') }}">{{ $salesToday }}</a>
                                     </h2>
                                     <p>Sales Today</p>
                                 </div>
                                 <div class="avatar bg-rgba-primary p-50 m-0">
                                     <div class="avatar-content">
                                         <i class="feather icon-users text-primary font-medium-5"></i>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                      <div class="col-lg-4 col-sm-12 col-12">
                         <div class="card">
                             <div class="card-header d-flex align-items-start pb-0">
                                 <div>
                                     <h2 class="text-bold-700 mb-0">
                                       <a href="{{ route('pos.index') }}">{{ $salesThisMonth }}</a>
                                     </h2>
                                     <p>Sales This Month</p>
                                 </div>
                                 <div class="avatar bg-rgba-primary p-50 m-0">
                                     <div class="avatar-content">
                                         <i class="feather icon-users text-primary font-medium-5"></i>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>



                    @endif

                  </div>




              </section>
              <!-- Vuexy Checkbox Sizes end -->

          </div>
      </div>
  </div>
  <!-- END: Content-->
@endsection
