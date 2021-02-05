@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-create-page name="role" route="role">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('laramin::admin.layouts.module.role.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-create-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.role.scripts')
@endsection