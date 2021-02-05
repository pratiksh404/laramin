@extends('laramin::admin.layouts.app')

@section('content')
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-1">
        <h3 class="content-header-title">{{ $user->name ?? "User" }} Profile</h3>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-12">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{adminRedirectRoute('dashboard')}}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{adminRedirectRoute('user')}}">User</a>
                </li>
                <li class="breadcrumb-item active">Show User
                </li>
            </ol>
        </div>
    </div>
</div>

<div class="content-body">
    <!-- users view start -->
    <section class="users-view">
        <!-- users view media object start -->
        <div class="row">
            <div class="d-flex justify-contern-between">
                <div class="col-12">
                    <div class="media mb-2">
                        <a class="mr-1" href="{{adminShowRoute('user',$user->id)}}">
                            @if (isset($user->profile->profile_pic))
                            <img src="{{asset($user->profile->thumbnail('small','profile_pic'))}}"
                                alt="{{$user->name}} view avatar" class="users-avatar-shadow rounded-circle" height="64"
                                width="64">
                            @else
                            <img src="{{asset('storage/static/profile.png')}}" alt="{{$user->name}} view avatar"
                                class="users-avatar-shadow rounded-circle" height="64" width="64">
                            @endif
                        </a>
                        <div class="media-body pt-25">
                            <h4 class="media-heading"><span class="users-view-name">{{$user->name ?? "User"}}</span>
                                @if (isset($user->profile->username))
                                <span class="text-muted font-medium-1"> @</span><span
                                    class="users-view-username text-muted font-medium-1 ">{{$user->profile->username}}</span>
                                @endif
                            </h4>
                            <span>ID:</span>
                            <span class="users-view-id">{{$user->id}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5">
                    <a href="{{adminRedirectRoute('user')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
        <!-- users view media object ends -->
        <!-- users view card data start -->
        <div class="card" style="max-height:40vh">
            <div class="card-content">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Registered:</td>
                                        <td>{{$user->created_at ? $user->created_at->toDateString() : ''}}</td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td class="users-view-latest-activity">{{$user->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>Verified:</td>
                                        <td class="users-view-verified">{{$user->email_verified_at ? "Yes" : "No"}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Role:</td>
                                        <td class="users-view-role">
                                            @isset($user->roles)
                                            @foreach ($user->roles as $role)
                                            | {{$role->name}} |
                                            @endforeach
                                            @endisset
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Status:</td>
                                        <td><span
                                                class="badge badge-success users-view-status">{{$user->profile->status ?? ''}}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12 col-md-8" style="max-height:35vh;overflow-y:scroll">
                            @foreach ($user->roles as $role)
                            <b>{{$role->name ?? 'Role'}}'s Permissions</b> <br>
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Module Permission</th>
                                            <th>Browse</th>
                                            <th>Read</th>
                                            <th>Edit</th>
                                            <th>Add</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($role->permissions as $permission)
                                        <tr>
                                            <td>{{$permission->model ?? ''}}</td>
                                            <td>{{$permission->browse ? 'Yes' : 'No'}}</td>
                                            <td>{{$permission->read ? 'Yes' : 'No'}}</td>
                                            <td>{{$permission->edit ? 'Yes' : 'No'}}</td>
                                            <td>{{$permission->add ? 'Yes' : 'No'}}</td>
                                            <td>{{$permission->delete ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- users view card data ends -->
        <!-- users view card details start -->
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    {{--                     <div class="row bg-primary bg-lighten-5 rounded mb-2 mx-25 text-center text-lg-left">
                        <div class="col-12 col-sm-4 p-2">
                            <h6 class="text-primary mb-0">Posts: <span class="font-large-1 align-middle">125</span></h6>
                        </div>
                        <div class="col-12 col-sm-4 p-2">
                            <h6 class="text-primary mb-0">Followers: <span class="font-large-1 align-middle">534</span>
                            </h6>
                        </div>
                        <div class="col-12 col-sm-4 p-2">
                            <h6 class="text-primary mb-0">Following: <span class="font-large-1 align-middle">256</span>
                            </h6>
                        </div>
                    </div> --}}
                    <div class="col-12">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Username:</td>
                                    <td class="users-view-username">{{$user->profile->username ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Name:</td>
                                    <td class="users-view-name">{{$user-> name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>E-mail:</td>
                                    <td class="users-view-email">{{$user->email ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Gender:</td>
                                    <td>{{$user->profile->gender ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Address:</td>
                                    <td>{{$user->profile->address ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Phone Number:</td>
                                    @if (isset($user->profile->phone_no))
                                    @foreach ($user->profile->phone_no as $phone_no)
                                    <td>{{$phone_no}}</td>
                                    @endforeach
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                        <h5 class="mb-1"><i class="feather icon-link"></i> Social Links</h5>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Twitter:</td>
                                    <td><a
                                            href="{{$user->profile->twitter ?? ''}}">{{$user->profile->twitter ?? ''}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Facebook:</td>
                                    <td><a
                                            href="{{$user->profile->facebook ?? ''}}">{{$user->profile->facebook ?? ''}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Instagram:</td>
                                    <td><a
                                            href="{{$user->profile->instagram ?? ''}}">{{$user->profile->instagram ?? ''}}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>LinkedIn:</td>
                                    <td><a
                                            href="{{$user->profile->linkedin ?? ''}}">{{$user->profile->linkedin ?? ''}}</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h5 class="mb-1"><i class="feather icon-info"></i> Personal Info</h5>
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    <td>Birthday:</td>
                                    <td>{{$user->profile->birthday ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Country:</td>
                                    <td>{{$user->profile->country ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Martial Status:</td>
                                    <td>{{$user->profile->martial_status ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Blood Group:</td>
                                    <td>{{$user->profile->blood_group ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Father Name:</td>
                                    <td>{{$user->profile->father_name ?? ''}}</td>
                                </tr>
                                <tr>
                                    <td>Mother Name:</td>
                                    <td>{{$user->profile->mother_name ?? ''}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- users view card details ends -->

    </section>
    <!-- users view ends -->
</div>
@endsection

@section('custom_js')
@include('laramin::admin.layouts.module.user.scripts')
@endsection