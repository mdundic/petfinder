@extends('admin.layouts.master')

@section('title', trans('admin_pet.lost.index.heading'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h3>@lang('admin_pet.lost.index.heading')</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <table id="lost-pets-list-table" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>@lang('admin_pet.lost.index.table.approved')</th>
                                <th>@lang('admin_pet.lost.index.table.type')</th>
                                <th>@lang('admin_pet.lost.index.table.name')</th>
                                <th>@lang('admin_pet.lost.index.table.breed')</th>
                                <th>@lang('admin_pet.lost.index.table.color')</th>
                                <th>@lang('admin_pet.lost.index.table.location')</th>
                                <th>@lang('admin_pet.lost.index.table.date')</th>
                                <th>@lang('admin_pet.lost.index.table.description')</th>
                                <th>@lang('admin_pet.lost.index.table.found')</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lost_pets as $pet)
                            <tr class="pet-row">
                                <td>
                                    @if($pet->is_published) 
                                        <span class="glyphicon glyphicon glyphicon-ok"></span>
                                    @else
                                        <span class="glyphicon glyphicon-remove"></span>
                                    @endif
                                </td>
                                <td>{{ $pet->type }}</td>
                                <td>{{ $pet->name }}</td>
                                <td>{{ $pet->breed }}</td>
                                <td>{{ $pet->color }}</td>
                                <td>{{ $pet->location }}</td>
                                <td>{{ $pet->lost_at }}</td>
                                <td>{{ $pet->description }}</td>
                                <td>
                                    @if($pet->is_found) 
                                        <span class="glyphicon glyphicon glyphicon-ok"></span>
                                    @else
                                        <span class="glyphicon glyphicon-remove"></span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin-lost-pet-preview', $pet->id) }}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
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
