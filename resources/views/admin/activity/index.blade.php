@extends('laramin::admin.layouts.app')

@section('content')
    <x-laramin-card title="All Activities">
        <x-slot name="heading_element">
        </x-slot>
        <x-slot name="card_text">
            List of all activities in the system.
        </x-slot>
        <x-slot name="buttons">
            <div class="btn-group mr-1 mb-1">
                <button type="button" class="btn btn-info btn-min-width dropdown-toggle" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">Action</button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ adminRedirectRoute('delete-all-activities') }}">Delete All</a>
                    <a class="dropdown-item" href="{{ adminRedirectRoute('delete-last-month') }}">Delete Last Month</a>
                    <a class="dropdown-item" href="{{ adminRedirectRoute('keep-this-month-activities') }}">Keep This
                        Month</a>
                    <a class="dropdown-item" href="{{ adminRedirectRoute('keep-latest-two-month-activities') }}">Keep Latest
                        2
                        Month</a>
                    <a class="dropdown-item" href="{{ adminRedirectRoute('keep-latest-three-month-activities') }}">Keep
                        Latest
                        3 Month</a>
                </div>
            </div>
        </x-slot>
        <x-slot name="card_content">
            <div class="table-responsive">
                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Log Name</th>
                            <th>Description</th>
                            <th>Model</th>
                            <th>Subject ID</th>
                            <th>Causer ID</th>
                            <th>Caused At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <td>{{ $activity->id }}</td>
                                <td>{{ $activity->log_name }}</td>
                                <td><span
                                        class="badge badge-{{ $activity->description == 'deleted' ? 'danger' : ($activity->description == 'created' ? 'success' : 'info') }}">{{ $activity->description }}</span>
                                </td>
                                <td>{{ $activity->subject_type }}</td>
                                <td>{{ $activity->subject_id }}</td>
                                <td><a
                                        href="{{ url(config('coderz.prefix', 'admin') . '/' . 'user/' . $activity->causer_id) }}">{{ $activity->causer_id }}</a>
                                </td>
                                <td>{{ $activity->created_at->diffForHumans() }}</td>
                                <td>
                                    <form action="{{ adminDeleteRoute('activity', $activity->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Log Name</th>
                            <th>Description</th>
                            <th>Model</th>
                            <th>Subject ID</th>
                            <th>Causer ID</th>
                            <th>Caused At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </x-slot>
        </x-card>
    @endsection

    @section('custom_js')
        @include('laramin::admin.layouts.module.activity.scripts')
    @endsection
