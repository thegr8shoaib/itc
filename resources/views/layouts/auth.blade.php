<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>@yield('title', conf('title'))</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{!! asset('app-assets/images/ico/favicon.ico') !!}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/vendors/css/vendors.min.css") }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/bootstrap-extended.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/colors.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/components.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/themes/dark-layout.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/themes/semi-dark-layout.css") }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/core/menu/menu-types/horizontal-menu.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/core/colors/palette-gradient.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("app-assets/css/pages/authentication.css") }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/css/style.css") }}">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
    @yield('body')

    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset("app-assets/vendors/js/vendors.min.js") }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset("app-assets/vendors/js/ui/jquery.sticky.js") }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset("app-assets/js/core/app-menu.js") }}"></script>
    <script src="{{ asset("app-assets/js/core/app.js") }}"></script>
    <script src="{{ asset("app-assets/js/scripts/components.js") }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>
