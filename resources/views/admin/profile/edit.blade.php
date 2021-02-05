@extends('laramin::admin.layouts.app')

@section('custom_css')
<style>
    input[type="file"] {
        display: none;
    }
</style>
@endsection

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">{{ $user->name ?? "User" }} Profile</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{adminRedirectRoute('dashboard')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">Edit Profile
                </li>
            </ol>
        </div>
    </div>
</div>
<div class="content-body">
    <!-- users view start -->
    <section class="users-view">
        <!-- users view media object start -->
        <div class="row">
            <div class="col-12">
                {{-- ================================Form================================ --}}
                @include('laramin::admin.layouts.module.profile.edit_add')
                {{-- =================================================================== --}}
            </div>
        </div>
    </section>
</div>

@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.profile.scripts')
@endsection