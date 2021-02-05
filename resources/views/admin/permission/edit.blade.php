@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-edit-page name="permission" route="permission" :model="$permission">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('laramin::admin.layouts.module.permission.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-edit-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.permission.scripts')
@endsection