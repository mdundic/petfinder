@extends('admin.layouts.master')

@section('title', trans('admin_pet.found.index.heading'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h3>@lang('admin_pet.found.index.heading')</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <form class="search-form">
                <div class="table-responsive search-table-wraper">
                    <table id="found-pets-list-table" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('admin_pet.found.index.table.approved')</th>
                                    <th>@lang('admin_pet.found.index.table.type')</th>
                                    <th>@lang('admin_pet.found.index.table.name')</th>
                                    <th>@lang('admin_pet.found.index.table.breed')</th>
                                    <th>@lang('admin_pet.found.index.table.color')</th>
                                    <th>@lang('admin_pet.found.index.table.size')</th>
                                    <th>@lang('admin_pet.found.index.table.location')</th>
                                    <th>@lang('admin_pet.found.index.table.contact_phone')</th>
                                    <th>@lang('admin_pet.found.index.table.date')</th>
                                    <th>@lang('admin_pet.found.index.table.returned')</th>
                                    <th>Actions</th>
                                </tr>
                                <tr id="lists-search-row">
                                    <td>
                                        <select class="form-control" id="is_published" name="is_published">
                                            <option value="" selected> {{ trans('admin_pet.found.index.table.select') }}</option>
                                            @foreach (trans('enums.booleans') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($searchParams['is_published']) ?
                                                        (($searchParams['is_published'] == $key) ? 'selected' : '') :
                                                        ''
                                                    }}
                                                >
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="type" name="type">
                                            <option value="" selected> {{ trans('admin_pet.found.index.table.select') }}</option>
                                            @foreach (trans('enums.pet_types') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($searchParams['type']) ?
                                                        (($searchParams['type'] == $key) ? 'selected' : '') :
                                                        ''
                                                    }}
                                                >
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" id="name" name="name" value="{{ $searchParams['name'] ?? '' }}">
                                    </td>
                                    <td>
                                        <input type="text" id="breed" name="breed" value="{{ $searchParams['breed'] ?? '' }}">
                                    </td>
                                    <td>
                                        <select class="form-control" id="color" name="color">
                                            <option value="" selected> {{ trans('admin_pet.found.index.table.select') }}</option>
                                            @foreach (trans('enums.pet_colors') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($searchParams['color']) ?
                                                        (($searchParams['color'] == $key) ? 'selected' : '') :
                                                        ''
                                                    }}
                                                >
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="size" name="size">
                                            <option value="" selected> {{ trans('admin_pet.found.index.table.select') }}</option>
                                            @foreach (trans('enums.pet_sizes') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($searchParams['size']) ?
                                                        (($searchParams['size'] == $key) ? 'selected' : '') :
                                                        ''
                                                    }}
                                                >
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="form-control" id="location" name="location">
                                            <option value="" selected> {{ trans('admin_pet.found.index.table.select') }}</option>
                                            @foreach (trans('enums.locations') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($searchParams['location']) ?
                                                        (($searchParams['location'] == $key) ? 'selected' : '') :
                                                        ''
                                                    }}
                                                >
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" id="contact_phone" name="contact_phone" value="{{ $searchParams['contact_phone'] ?? '' }}">
                                    </td>
                                    <td>
                                        <input type='text' name="date_from" id="date-from" autocomplete="off"
                                            value="{{ isset($searchParams['date_from']) ?
                                                format_date_rs($searchParams['date_from']) : '' }}"
                                            placeholder="@lang('global.date_from')"
                                        >
                                        <input type='text' name="date_to" id="date-to" autocomplete="off"
                                            value="{{ isset($searchParams['date_to']) ?
                                                format_date_rs($searchParams['date_to']) : '' }}"
                                            placeholder="@lang('global.date_to')"
                                        >
                                    </td>
                                    <td>
                                        <select class="form-control" id="is_returned" name="is_returned">
                                            <option value="" selected> {{ trans('admin_pet.found.index.table.select') }}</option>
                                            @foreach (trans('enums.booleans') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ isset($searchParams['is_returned']) ?
                                                        (($searchParams['is_returned'] == $key) ? 'selected' : '') :
                                                        ''
                                                    }}
                                                >
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="submit" value="@lang('global.search.search')" class="submit btn btn-primary">
                                        <a href="{{ route('admin-found-pet-list') }}" class="btn btn-default">
                                            @lang('global.search.clear')
                                        </a>
                                    </td>
                                    </form>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pets as $pet)
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
                                    <td>{{ $pet->size }}</td>
                                    <td>{{ $pet->location }}</td>
                                    <td>{{ $pet->contact_phone }}</td>
                                    <td>{{ $pet->found_at }}</td>
                                    <td>
                                        @if($pet->is_returned)
                                            <span class="glyphicon glyphicon glyphicon-ok"></span>
                                        @else
                                            <span class="glyphicon glyphicon-remove"></span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin-found-pet-preview', $pet->id) }}">
                                            <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if (!$pets->count() && !empty(array_filter($searchParams)))
                            <div class="alert-danger"><p>{{ trans('global.search.no_results_found') }}</p></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 section separator"></div>
        </div>
        {{ $pets->appends($searchParams)->links() }}
    </div>
@endsection
