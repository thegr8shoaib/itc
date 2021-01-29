@extends('layouts.frontend')

@section('body')


          <!--hero section start-->

          <!-- <section class="pb-2">
              <div class="container">
                  <div class="row align-items-center">
                      <div class="col-12 col-lg-5 col-lg-6 order-lg-2 mb-8 mb-lg-0">
-->
                          <!-- <img src="theme/assets/images/hero/01.png" class="img-fluid" alt="..."> -->
                            <!--
                      </div>
                      <div class="col-12 col-lg-7 col-xl-6 order-lg-1">

                          {{-- <h5 class="badge badge-primary-soft font-w-6">Welcome</h5> --}}-->
                          <h1   class="text-center mt-11">

                              Welcome to <span class="text-primary">{{ conf('title') }}</span>
                          </h1>
<!--
                          <p class="lead text-muted">
                              A Profitable Platform for High Margin Ads Investment.

                          </p>
                          {{-- <a href="#" class="btn btn-primary shadow mr-1">
                  Learn More
          </a> --}}
                          <a href="{{ route('register') }}" class="btn btn-outline-primary">
                              Get Started
                          </a>

                      </div>
                  </div>
                  <div class="d-flex justify-content-center row text-center">


                    <div class="col-lg-4 col-md-6">
                      <div>
                        <h4 class=" mt-4">Whatsapp:  <a href="tel:+923163934312">0316 3934312</a></h4>

                      </div>
                    </div>
                  </div>

              </div>

          </section> -->

          <!--hero section end-->

          <!-- <section class="custom-pb-3 bg-primary position-relative" style="padding-bottom:9rem !important">
              <div class="container">
                  <div class="row justify-content-center text-center">
                      <div class="col-12 col-md-12 col-lg-12">
                          <div>
                              <h2 class="text-white font-w-5">About Us</h2>
                              <p class="lead mb-0 text-light">Clicktoearnmoney is leading earning platform for Pakistani citizens to make extra income.
  Watch daily few ads and earn money to fulfill your dreams from only a single platform.</p>
                          </div>
                      </div>
                  </div>

              </div>
              <div class="shape-1 bottom" style="height: 140px; overflow: hidden;">
                  <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
                      <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: #fff;"></path>
                  </svg>
              </div>
          </section> -->


          <!-- <section>
            <div class="container">
              <div class="row align-items-center justify-content-between">
                <div class="col-12 col-lg-6 order-lg-1 mb-8 mb-lg-0">
                  <img src="theme/assets/images/about/03.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-12 col-lg-6 col-xl-5">
                  <div class="mb-5">
                    <h2 class="mt-3 font-w-5">Why Choose Us?</h2>
                    <p class="lead">
                      You can manage your investment from anywhere either from home or work place anytime.

                    </p>
                  </div>
                  <div class="">
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">Certified Business</p>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">Safe & Secure</p>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">Daily Income</p>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">Daily Withdrawals</p>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">24/7 Support</p>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">Fastest Payments</p>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">Easy to Use</p>
                      </div>
                    </div>
                    <div>
                      <div class="d-flex align-items-start">
                        <div class="badge-primary-soft rounded p-1">
                          <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check">
                            <polyline points="20 6 9 17 4 12"></polyline>
                          </svg>
                        </div>
                        <p class="mb-0 ml-3">Affiliate Program</p>
                      </div>
                    </div>



                  </div>
                </div>
              </div>
            </div>
          </section> -->


          <!--body content start-->

          <div class="page-content">

              <!--feature start-->




              <!-- <section class="pt-0">
                <div class="container">
                  <div class="row align-items-center">
                    <div class="col-lg-5 col-12 order-lg-1 mb-8 mb-lg-0">
                      <img src="theme/assets/images/about/08.png" alt="Image" class="img-fluid">
                    </div>
                    <div class="col-lg-7 col-12">
                      <div class="mb-8">
                        <h2 class="mt-3 mb-0">

                          How It Works?
                          <div class="video-btn"> <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=lgm3puP3tMA"><i class="la la-play"></i></a>
                                <div class="spinner-eff">
                                  <div class="spinner-circle circle-1"></div>
                                  <div class="spinner-circle circle-2"></div>
                                </div>
                              </div>

                          </h2>
                      </div>
                      <div class="row">
                        <div class="col-lg-6 col-md-6">
                          <div class="d-flex align-items-start">
                            <div>
                              <div class="f-icon-shape-sm text-white bg-primary rounded-circle shadow-primary mr-3"> <i class="la la-user-plus ic-2x"></i>
                              </div>
                            </div>
                            <div>
                              <h5>Register</h5>
                              <p class="mb-0">First step is to complete a simple registration with us</p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-6 mt-md-0">
                          <div class="d-flex align-items-start">
                            <div>
                              <div class="f-icon-shape-sm text-white bg-dark rounded-circle shadow-primary mr-3"> <i class="la la-box ic-2x"></i>
                              </div>
                            </div>
                            <div>
                              <h5>Select Plan</h5>
                              <p class="mb-0">
                                Buy Any Package to Start Earning
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-6">
                          <div class="d-flex align-items-start">
                            <div>
                              <div class="f-icon-shape-sm text-white bg-white rounded-circle shadow-primary mr-3"> <i class="la la-file-video ic-2x text-primary"></i>
                              </div>
                            </div>
                            <div>
                              <h5>Watch Ads</h5>
                              <p class="mb-0">
                                Watch Ads to Earn in Your Account
                              </p>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 mt-6">
                          <div class="d-flex align-items-start">
                            <div>
                              <div class="f-icon-shape-sm text-white bg-orange rounded-circle shadow-primary mr-3"> <i class="la la-money-check ic-2x"></i>
                              </div>
                            </div>
                            <div>
                              <h5>Withdraw</h5>
                              <p class="mb-0">
                                Withdraw your earning anytime
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section> -->





              <!--feature end-->















              <!-- <section>
                <div class="container">
                  <div class="row align-items-end justify-content-between">
                    <div class="col-12 col-md-6 col-lg-5 mb-5 mb-md-0">
                      <div>
                        <h2 class="mt-3 font-w-5">Simple, Fair and affordable prices for all.</h2>
                      </div>
                    </div>
                    {{-- <div class="col-12 col-md-6 col-lg-6">
                      <nav>
                        <div class="nav nav-tabs d-flex justify-content-md-end border-0" id="nav-tab" role="tablist"> <a class="nav-item nav-link border-0 active" id="nav-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Monthly</a>
                          <a class="nav-item nav-link border-0" id="nav-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Yearly</a>
                        </div>
                      </nav>
                    </div> --}}
                  </div>

                  <div class="row">
                    <div class="col-12">
                      <div class="tab-content mt-8" id="nav-tabContent">
                        <div class="tab-pane fade active show" id="tab-1" role="tabpanel" aria-labelledby="nav-tab-1">
                          <div class="row align-items-center">

                            @foreach ($plans as $plan)


                            <div class="col-12 col-lg-4 mb-4">

                              <div class="card border-0 shadow">

                                <div class="card-body py-8 px-6">

                                  <div class="text-center mb-5"> <span class="badge shadow">
                                      <span class="h4 text-uppercase text-primary">{{ $plan->name }}</span>
                                    </span>
                                  </div>


                                  <div class="d-flex align-items-start justify-content-between">

                                    <p>Total Return</p>

                                    <div class="ml-4">
                                      {{ $plan->totalReturn }}
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-start justify-content-between">

                                    <p>Daily Earning</p>

                                    <div class="ml-4">
                                      {{ $plan->dailyEarning }}
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-start justify-content-between">

                                    <p>Daily Ads</p>

                                    <div class="ml-4">
                                      {{ $plan->dailyAds }}
                                    </div>
                                  </div>

                                  <div class="d-flex align-items-start justify-content-between">

                                    <p>Referral Commission</p>

                                    <div class="ml-4">
                                      {{ $plan->referCommission }}
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-start justify-content-between">

                                    <p>Packege Duration</p>

                                    <div class="ml-4">
                                      {{ $plan->packegeDurration }}
                                    </div>
                                  </div>
                                  <div class="d-flex align-items-start justify-content-between">

                                    <p>Minimum Withdraw</p>

                                    <div class="ml-4">
                                      {{ $plan->minimumWithdraw }}
                                    </div>
                                  </div>





                                  <div class="d-flex justify-content-center mt-5"> <span class="h3 mb-0 mt-2">Rs</span>
                                    <span class="price display-3 text-primary font-w-6">{{ $plan->price }}</span>
                                  </div>

                                  <p class="text-center text-muted">2 month</p>
                               <a href="{{ route('register') }}" class="btn btn-block btn-primary mt-5">
                                      Get started
                                    </a>
                                </div>
                              </div>
                            </div>
                            @endforeach




                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
              </section> -->
<!--
              <section>
                <div class="container">
                  <div class="row align-items-end justify-content-between">
                    <div class="col-12 col-md-6 col-lg-5 mb-5 mb-md-0">
                      <div>
                        <h2 class="mt-3 font-w-5 text-primary">FBR Registered Company</h2>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <img src="{!! asset('mawaisnow/fbr.jpeg') !!}" class="img-fluid" alt="">
                  </div>


                </div>
              </section> -->












          </div>

          <!--body content end-->


@endsection
