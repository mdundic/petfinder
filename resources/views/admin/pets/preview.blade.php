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
   
        <div class="col-xs-4">
        	<p>@lang('admin_pet.lost.index.table.type')</p>
        	<p>@lang('admin_pet.lost.index.table.name')</p>
        	<p>@lang('admin_pet.lost.index.table.breed')</p>
            <p>@lang('admin_pet.lost.index.table.color')</p>
            <p>@lang('admin_pet.lost.index.table.location')</p>
            <p>@lang('admin_pet.lost.index.table.date')</p>
            <p>@lang('admin_pet.lost.index.table.description')</p>
        </div>
        <div class="col-xs-4">
        	<p>{{ $pet->type }}</p>
        	<p>{{ $pet->name }}</p>
        	<p>{{ $pet->breed }}</p>
            <p>{{ $pet->color }}</p>
            <p>{{ $pet->location }}</p>
            <p>{{ $pet->lost_at }}</p>
            <p>{{ $pet->description }}</p>
        </div>
    </div>
    <div class="row" style="padding: 100px;">
        <div class="col-xs-12 text-right">
        	@if( $pet->is_published === true )
        	<button type="button" class="btn btn-success">
        		<span class="glyphicon glyphicon glyphicon-ok" style="padding-right: 5px;"></span>
        		Mark pet as FOUND</button>
        	@endif
        	@if( $pet->is_published === false )
        	<button type="button" class="btn btn-success">
        		<span class="glyphicon glyphicon glyphicon-ok" style="padding-right: 5px;"></span>Approve request to submit new Found Pet</button>
        	@endif
        </div>

    </div>
</div>

@endsection