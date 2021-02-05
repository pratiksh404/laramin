@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-edit-page name="user" route="user" :model="$user">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('laramin::admin.layouts.module.user.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-edit-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.user.scripts')
@endsection