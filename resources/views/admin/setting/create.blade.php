@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-create-page name="setting" route="setting">
    <x-slot name="content">
        {{-- ================================Form================================ --}}
        @include('laramin::admin.layouts.module.setting.edit_add')
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-create-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.setting.scripts')
@endsection