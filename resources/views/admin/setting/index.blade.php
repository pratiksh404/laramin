@extends('laramin::admin.layouts.app')

@section('content')
<!-- BEGIN: Content-->
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">Account setting</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{adminRedirectRoute('dashboard')}}">Home</a>
                </li>
                <li class="breadcrumb-item active"> Settings
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex active" id="account-pill-general" data-toggle="pill"
                            href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe"></i>
                            Meta Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" id="account-pill-password" data-toggle="pill"
                            href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock"></i>
                            Open Graph Information
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" id="account-pill-info" data-toggle="pill"
                            href="#account-vertical-info" aria-expanded="false">
                            <i class="feather icon-info"></i>
                            Info
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" id="account-pill-social" data-toggle="pill"
                            href="#account-vertical-social" aria-expanded="false">
                            <i class="feather icon-camera"></i>
                            Social links
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex" id="account-pill-connections" data-toggle="pill"
                            href="#account-vertical-connections" aria-expanded="false">
                            <i class="feather icon-feather"></i>
                            Site
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{adminUpdateRoute('setting',isset($setting->id) ? $setting->id : 1)}}"
                                method="POST" enctype="multipart/form-data">
                                @method('PATCH')
                                @csrf
                                @include('laramin::admin.layouts.module.setting.edit_add')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->
</div>
<!-- END: Content-->
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.setting.scripts')
@endsection