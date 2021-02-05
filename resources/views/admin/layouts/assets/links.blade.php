<link
    href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

<link rel="apple-touch-icon" href="{{asset('laramin/assets/app-assets/images/ico/apple-icon-120.png')}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('laramin/assets/app-assets/images/ico/favicon.ico')}}">

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('laramin/assets/app-assets/vendors/css/vendors.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('laramin/assets/app-assets/vendors/css/ui/prism.min.css')}}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('laramin/assets/app-assets/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('laramin/assets/app-assets/css/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('laramin/assets/app-assets/css/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('laramin/assets/app-assets/css/components.css')}}">
<!-- END: Theme CSS-->

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css"
    href="{{asset('laramin/assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('laramin/assets/app-assets/css/core/colors/palette-gradient.css')}}">
<!-- END: Page CSS-->

{{-- Plugin Injection --}}
@include('laramin::admin.layouts.assets.plugin_links')
{{-- End Plugin Injection --}}

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('laramin/assets/assets/css/style.css')}}">
<!-- END: Custom CSS-->