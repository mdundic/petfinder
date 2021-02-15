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
    	<div class="col-xs-4">
    		<img src="{{ asset(config('filesystems.disks.public.path')) . $pet->picture }}" width="100%">
    	</div>

    	<div class="col-xs-8">
    		<div class="table-responsive">
                <table id="pets-list-table" class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <th>@lang('admin_pet.lost.index.table.type')</th>
                            <td>{{ $pet->type }}</th>
                        </tr>
                        <tr>
                        	<th>@lang('admin_pet.lost.index.table.name')</th>
                        	<td>{{ $pet->name }}</th>
                        </tr>
                        <tr>
							<th>@lang('admin_pet.lost.index.table.breed')</th>
							<td>{{ $pet->breed }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.lost.index.table.color')</th>
							<td>{{ $pet->color }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.lost.index.table.location')</th>
							<td>{{ $pet->location }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.lost.index.table.date')</th>
							<td>{{ $pet->lost_at }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.lost.index.table.description')</th>
							<td>{{ $pet->description }}</td>
						</tr>
                    </tbody>
                </table>
    		</div>
    	</div>
    </div>
    <div class="row" style="padding-top: 20px;">
        <div class="col-xs-12 text-right">
        	@if( $pet->is_published === true )
        	<button type="button" class="btn btn-success">
        		<span class="glyphicon glyphicon glyphicon-ok" style="padding-right: 5px;"></span>
        		Mark pet as FOUND</button>
        	@endif
        	@if( $pet->is_published === false )
        	<button type="button" class="btn btn-success">
        		<span class="glyphicon glyphicon glyphicon-ok" style="padding-right: 5px;"></span>@lang('admin_pet.lost.index.table.approve')
        	</button>
        	@endif
        </div>

    </div>
</div>

@endsection