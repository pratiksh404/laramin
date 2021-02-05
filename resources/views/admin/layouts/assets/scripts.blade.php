<!-- BEGIN Vendor JS-->
<script src="{{asset('laramin/assets/app-assets/vendors/js/vendors.min.js')}}"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="{{asset('laramin/assets/app-assets/vendors/js/ui/prism.min.js')}}"></script>
<!-- END: Page Vendor JS-->

{{-- Plugin Injection --}}
@include('laramin::admin.layouts.assets.plugin_scripts')
{{-- End Plugin Injection --}}

{{-- Toastr --}}
@include('laramin::admin.layouts.components.toastr')
{{-- ----------------- --}}

<!-- BEGIN: Theme JS-->
<script src="{{asset('laramin/assets/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('laramin/assets/app-assets/js/core/app.js')}}"></script>
<!-- END: Theme JS-->