@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-create-page name="permission" route="permission">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('laramin::admin.layouts.module.permission.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-create-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.permission.scripts')
@endsection