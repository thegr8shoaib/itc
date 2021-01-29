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
                        <h2 class="content-header-title float-left mb-0">Profile</h2>
                    </div>
                </div>
            </div>

        </div>
        @include('common.messages')
        <div class="content-body">


            <div id="user-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="profile-header mb-2">
                            <div class="relative">

                                @if ($profile->cover)
                                  <div class="cover-container">
                                    <div class="cover-container" style="height:300px;background-image: url({!! asset($profile->cover) !!})">
                                    </div>
                                  </div>
                                @else
                                  <div class="cover-container" style="height:200px;background-image: url({!! asset('mawaisnow/svg/banner.svg') !!})">
                                  </div>
                                @endif

                                <div class="profile-img-container d-flex align-items-center justify-content-between">
                                  @if ($user->image)
                                    <img src="{{ asset("storage/".$user->image) }}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                  @else
                                    <img src="{{ asset('mawaisnow/svg/profile.svg') }}" class="rounded-circle img-border box-shadow-1" alt="Card image">
                                  @endif


                                    <div class="float-right">
                                        <a class="btn btn-icon btn-icon rounded-circle btn-primary mr-1" href="{!! route('profileUpdate', $user->id) !!}">
                                          <i class="feather icon-edit-2"></i>
                                        </a>

                                        {{-- <button type="button" class="btn btn-icon btn-icon rounded-circle btn-primary">
                                            <i class="feather icon-settings"></i>
                                        </button> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end align-items-center profile-header-nav">
                                <nav class="navbar navbar-expand-sm w-100 pr-0">
                                    <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                    </button>

                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav justify-content-around w-75 ml-sm-auto">
                                            <li class="nav-item px-sm-0">
                                                <a href="#" class="nav-link font-small-3">&nbsp;</a>
                                            </li>
                                            {{-- <li class="nav-item px-sm-0">
                                                <a href="#" class="nav-link font-small-3">About</a>
                                            </li>
                                            <li class="nav-item px-sm-0">
                                                <a href="#" class="nav-link font-small-3">Photos</a>
                                            </li>
                                            <li class="nav-item px-sm-0">
                                                <a href="#" class="nav-link font-small-3">Friends</a>
                                            </li>
                                            <li class="nav-item px-sm-0">
                                                <a href="#" class="nav-link font-small-3">Videos</a>
                                            </li>
                                            <li class="nav-item px-sm-0">
                                                <a href="#" class="nav-link font-small-3">Events</a>
                                            </li> --}}
                                        </ul>
                                    </div>

                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

                <section id="profile-info">
                    <div class="row">


                        @include('user.profile.view.about')
                        @include('user.profile.view.address')
                        @include('user.profile.view.social')




                    </div>

                </section>
            </div>










        </div>
    </div>
</div>
<!-- END: Content-->
@endsection


@section('headend')
  <link rel="stylesheet" href="{!! asset('app-assets/css/pages/users.css') !!}">
@endsection
