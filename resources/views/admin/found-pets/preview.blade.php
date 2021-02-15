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
    	<div class="col-xs-4">
    		<img src="{{ asset(config('filesystems.disks.public.path')) . '/' . $pet->picture }}" width="100%">
    	</div>

    	<div class="col-xs-8">
    		<div class="table-responsive">
                <table id="pets-list-table" class="table table-hover table-striped">
                    <tbody>
                        <tr>
                            <th>@lang('admin_pet.found.index.table.approved')</th>
                            <td>
                            @if($pet->is_published)
                                <span class="glyphicon glyphicon glyphicon-ok"></span>
                            @else
                                <span class="glyphicon glyphicon-remove"></span>
                            @endif</td>
                        </tr>
                        <tr>
                            <th>@lang('admin_pet.found.index.table.type')</th>
                            <td>{{ $pet->type }}</th>
                        </tr>
                        <tr>
                        	<th>@lang('admin_pet.found.index.table.name')</th>
                        	<td>{{ $pet->name }}</th>
                        </tr>
                        <tr>
							<th>@lang('admin_pet.found.index.table.breed')</th>
							<td>{{ $pet->breed }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.found.index.table.color')</th>
							<td>{{ $pet->color }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.found.index.table.location')</th>
							<td>{{ $pet->location }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.found.index.table.date')</th>
							<td>{{ $pet->found_at }}</th>
						</tr>
						<tr>
							<th>@lang('admin_pet.found.index.table.description')</th>
							<td>{{ $pet->description }}</td>
						</tr>
                        <tr>
                            <th>@lang('admin_pet.found.index.table.returned')</th>
                            <td>
                            @if($pet->is_returned)
                                <span class="glyphicon glyphicon glyphicon-ok"></span>
                            @else
                                <span class="glyphicon glyphicon-remove"></span>
                            @endif</td>
                        </tr>
                    </tbody>
                </table>
    		</div>
    	</div>
    </div>
    <div class="row" style="padding-top: 20px;">
        <div class="col-xs-12 text-right">
        	@if( $pet->is_published === true && $pet->is_returned === false)
            	<form method="POST" action="{{ route('admin-found-pet-return', $pet->id) }}" id='mark-as-returned-form'>
    			    @csrf
    			    @method('PATCH')

    			    <button type="submit" class="btn btn-success">
    	        		<span class="glyphicon glyphicon glyphicon-ok" style="padding-right: 5px;"></span>
    	        			@lang('admin_pet.found.index.table.mark_as_returned')
    	        	</button>
    			</form>
        	@endif
        	@if( $pet->is_published === false )
            	<form method="POST" action="{{ route('admin-found-pet-approve', $pet->id) }}" id='approve-found-pet-form'>
    			    @csrf
    			    @method('PATCH')

    			    <button type="submit" class="btn btn-success">
    	        		<span class="glyphicon glyphicon glyphicon-ok" style="padding-right: 5px;"></span>@lang('admin_pet.found.index.table.approve')
    	        	</button>
    			</form>
        	@endif
        </div>
    </div>
    <div class="row">
        @if (session('status'))
        <div class="col">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
        @endif
    </div>
</div>

@endsection