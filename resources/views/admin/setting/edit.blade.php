@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-edit-page name="setting" route="setting" :model="$setting">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('laramin::admin.layouts.module.setting.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-edit-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.setting.scripts')
@endsection