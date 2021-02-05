@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-create-page name="user" route="user">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('laramin::admin.layouts.module.user.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-create-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.user.scripts')
@endsection