@extends('admin.layouts.card')
{{-- Card Title --}}
@section('card_title','Users')
{{-- Card Header Element --}}
@section('heading_elements')

@endsection
{{-- Card Text --}}
@section('card_text')

@endsection
{{-- Card Content --}}
@section('card_content')

@endsection

{{-- Card Component --}}
<x-card title="All Users">
    <x-slot name="heading_element"></x-slot>
    <x-slot name="card_text">
        List of all users in the system.
    </x-slot>
    <x-slot name="buttons">
        <a href="{{adminCreateRoute('user')}}" class="btn btn-primary">Create User</a>
    </x-slot>
    <x-slot name="card_content">
        <table class="table table-striped table-bordered datatable">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <x-action :model="$user" route="user" />
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </tfoot>
        </table>
    </x-slot>
</x-card>