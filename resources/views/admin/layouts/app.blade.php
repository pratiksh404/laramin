<!-- - var menuBorder = true-->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description"
                content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords"
                content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>{{ config('laramin.title','Tech Coderz') }}</title>
        {{-- =========================================Admin Panel Links========================================= --}}
        @include('laramin::admin.layouts.assets.links')
        {{-- ==================================================================================================== --}}
        {{-- Custom CSS --}}
        <link rel="stylesheet" href="{{asset('laramin/assets/assets/custom/custom.css')}}">
        @yield('custom_css')
        {{-- --------- --}}
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="{{config('laramin.body_class','vertical-layout vertical-menu 2-columns fixed-navbar')}}"
        data-open="{{config('laramin.data-open','click')}}" data-menu="{{config('laramin.data-menu','vertical-menu')}}"
        data-col="{{config('laramin.data-col','2-columns')}}">

        <!-- BEGIN: Header-->
        @include('laramin::admin.layouts.components.header')
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        @include('laramin::admin.layouts.components.navbar')
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content">
                <div class="content-overlay"></div>
                <div class="content-wrapper">
                        @yield('content')
                </div>
        </div>
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>


        <!-- BEGIN: Footer-->
        @include('laramin::admin.layouts.components.footer')
        <!-- END: Footer-->


        <!-- BEGIN: Vendor JS-->
        @include('laramin::admin.layouts.assets.scripts')
        <!-- END: Page JS-->

        {{-- Custom Javascripts --}}
        <script src="{{asset('laramin/assets/assets/custom/custom.js')}}"></script>
        @yield('custom_js')
        {{-- ---------------- --}}

</body>
<!-- END: Body-->

</html>