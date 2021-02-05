@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-index-page name="role" route="role">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Role</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                @if ($role->name != 'superadmin')
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td>{{$role->level}}</td>
                    <td>
                        <x-laramin-action :model="$role" route="role">
                            <x-slot name="buttons">
                                <a href="{{ adminShowRoute('role',$role->id) }}" class="btn btn-info btn-sm"
                                    data-toggle="tooltip" placement="top" title="Role's Permissions"><i
                                        class="feather icon-unlock"></i></a>
                            </x-slot>
                        </x-laramin-action>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Role</th>
                    <th>Level</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-index-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.role.scripts')
@endsection