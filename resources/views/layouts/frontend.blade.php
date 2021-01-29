<!DOCTYPE html>
<html lang="en">
<!--
<head>

    <! meta tags -->
    <!-- <meta charset="utf-8">
    <meta name="keywords" content="click ,to earn, money" />
    <meta name="description" content="Click to earn money" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->

    <!-- Title -->
    <title>{{ conf('title') }}</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="theme/assets/images/favicon.ico" />

    <!-- inject css start -->

    <link href="theme/assets/css/theme-plugin.css" rel="stylesheet" />
    <link href="theme/assets/css/theme.min.css" rel="stylesheet" />

    <!-- inject css end -->

</head>

<body>

    <!-- page wrapper start -->

    <div class="page-wrapper">

        <!-- preloader start -->

        <div id="ht-preloader">
            <div class="loader clear-loader">
                <span></span>
                <p>
                  <img src="{{ asset(conf('logo')) }}" alt="">
                </p>
            </div>
        </div>

        <!-- preloader end -->


        <!--header start-->

        <header class="site-header">
            <div id="header-wrap">
                <div class="container">
                    <div class="row">
                        <!--menu start-->
                        <div class="col d-flex align-items-center justify-content-between"> <a class="navbar-brand logo text-dark h2 mb-0" href="{{ route('root') }}">

                          <img src="{{ asset(conf('logo')) }}" alt="">

                            </a>
                            <nav class="navbar navbar-expand-lg navbar-light ml-auto">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <!-- <li class="nav-item">
                                            <a class="nav-link {{ requestIs('root') }}" href="{{ route('root') }}">Home</a>
                                        </li> -->
                                        <!-- {{-- <li class="nav-item">
                                            <a class="nav-link " href="{{ route('root') }}">Payment Proof</a>
                                        </li> --}} -->
                                        <!-- <li class="nav-item">
                                            <a class="nav-link" href="{{ route('policy') }}">Privacy Policy</a>
                                        </li> -->
                                        <!-- <li class="nav-item">
                                            <a class="nav-link {{ requestIs('contactus') }}" href="{{ route('contactus') }}">Contact US</a>
                                        </li> -->


                                        @if (Auth::check())
                                          <li class="nav-item d-block d-lg-none">
                                              <a class="nav-link {{ requestIs('home') }}" href="{{ route('home') }}">Dashboard</a>
                                          </li>

                                        @else
                                          <li class="nav-item d-block d-lg-none">
                                              <a class="nav-link {{ requestIs('login') }}" href="{{ route('login') }}">Login</a>
                                          </li>
                                          {{-- <li class="nav-item d-block d-lg-none">
                                              <a class="nav-link {{ requestIs('register') }}" href="{{ route('register') }}">Register</a>
                                          </li> --}}

                                        @endif

                                    </ul>
                                </div>
                            </nav>

                            @if (Auth::check())
                            <a class="btn btn-primary ml-8 d-none d-lg-block" href="{{ route('home') }}">Dashboard</a>
                            @else
                            <a class="btn btn-primary ml-8 d-none d-lg-block" href="{{ route('login') }}">Login</a>
                            {{-- <a class="btn btn-primary ml-8 d-none d-lg-block" href="{{ route('register') }}">Register</a> --}}
                            @endif


                        </div>
                        <!--menu end-->
                    </div>
                </div>
            </div>
        </header>

        <!--header end-->

        @yield('body')

        <!--footer start-->

        <!-- <footer class="bg-light " data-bg-img="theme/assets/images/bg/03.png"> -->

            <!-- <div class="container mt-11">

                <div class="row  text-white text-center pb-3 pt-3">
                    <div class="col">
                      <a class="ml-3" href="https://www.facebook.com/clicktoearnmoneyonline" target="_blank">Facebook</a>
                      <a class="ml-3" href="https://www.instagram.com/clicktoearnmoney" target="_blank">Instagram</a>
                      <a class="ml-3" href="https://twitter.com/Clicktoearnmon1" target="_blank">Twitter</a>
                      <a class="ml-3" href="https://www.youtube.com/channel/UCoN-mK_Z0RR16Kcf6kIefyQ" target="_blank">Youtube</a>

                         </div>
                </div>
            </div> -->
        </footer>

        <!--footer end-->

    </div>

    <!-- page wrapper end -->


    <!--back-to-top start-->

    <div class="scroll-top"><a class="smoothscroll" href="#top"><i class="las la-angle-up"></i></a></div>

    <!--back-to-top end-->

    <!-- inject js start -->

    <script src="theme/assets/js/theme-plugin.js"></script>
    <script src="theme/assets/js/theme-script.js"></script>

    <!-- inject js end -->

</body>

</html>
