@extends('admin.layouts.master')

@section('title', trans('admin_user.index.heading'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h3>@lang('admin_user.index.heading')</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table id="users-list-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>@lang('admin_user.first_name')</th>
                                <th>@lang('admin_user.last_name')</th>
                                <th>@lang('admin_user.email')</th>
                                <th>@lang('admin_user.role')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="user-row">
                                    <td>
                                        <a href="{{ route('admin-user-update', $user->id) }}">
                                            <span class="glyphicon glyphicon-file"></span>
                                        </a>
                                    </td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xs-12 section separator"></div>
        </div>
    </div>
@endsection
