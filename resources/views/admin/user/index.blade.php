@extends('laramin::admin.layouts.app')

@section('content')
<x-laramin-index-page name="user" route="user">
    <x-slot name="content">
        {{-- ================================Card================================ --}}
        <!-- users list start -->
        <section class="users-list-wrapper">
            <div class="users-list-table">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <!-- datatable start -->
                            <div class="table-responsive">
                                <table id="users-list-datatable" class="table table-striped table-bordered datatable">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>username</th>
                                            <th>name</th>
                                            <th>email</th>
                                            <th>role</th>
                                            <th>status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->profile->username ?? 'N/A'}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->roles->first()->name ?? 'N/A'}}</td>
                                            <td><span
                                                    class="badge badge-{{$user->profile->status == 'Active' ? 'success' : ($user->profile->status == 'Inactive' ? 'danger' : 'warning')}}">{{$user->profile->status}}</span>
                                            </td>
                                            <td>
                                                <x-laramin-action :model="$user" route="user" />
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- datatable ends -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- users list ends -->
        {{-- =================================================================== --}}
    </x-slot>
</x-laramin-index-page>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.user.scripts')
@endsection