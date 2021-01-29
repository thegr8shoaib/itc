@extends('layouts.dashboard')

@section('body')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Profile</h2>

                        <a
                        @if (superAdmin() && Auth::id() != $user->id )
                        href="{{ route('users.index') }}"
                        @else
                        href="{{ route('profile') }}"
                        @endif

                         class="btn btn-icon btn-icon rounded-circle btn-primary">
                          <i class="feather icon-arrow-left-circle"></i>
                        </a>


                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">


          <section class="users-edit">
                     <div class="card">
                         <div class="card-content">
                             <div class="card-body">
                                 <ul class="nav nav-tabs mb-3" role="tablist">
                                     <li class="nav-item">
                                         <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                             <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                             <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
                                         </a>
                                     </li>
                                     <li class="nav-item">
                                         <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                             <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Social</span>
                                         </a>
                                     </li>
                                 </ul>
                                 <div class="tab-content">
                                    
                                     @include('user.profile.edit.account')


                                     @include('user.profile.edit.information')



                                    @include('user.profile.edit.social')






                                 </div>
                             </div>
                         </div>
                     </div>
                 </section>








        </div>
    </div>
</div>

@endsection

@section('headend')
  <link rel="stylesheet" type="text/css" href="{!! asset('app-assets/vendors/css/forms/select/select2.min.css') !!}">
  <link rel="stylesheet" type="text/css" href="{!! asset('mawaisnow/lib/flatpicker/flatpickr.min.css') !!}">

@endsection

@section('pageend')
  <script src="{!! asset('app-assets/vendors/js/forms/select/select2.full.min.js') !!}"></script>
  <script src="{!! asset('mawaisnow/lib/flatpicker/flatpickr.js') !!}"></script>
  <script src="{!! asset('app-assets/js/scripts/pages/app-user.js') !!}"></script>
  <script type="text/javascript">
    $(".birthdate").flatpickr();
  </script>
@endsection
