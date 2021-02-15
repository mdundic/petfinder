@extends('admin.layouts.master')

@section('title', trans('global.welcome'))

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <h3>@lang('global.welcome')</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                WELCOME TO PETFINDER ADMIN
            </div>
            <div class="col-xs-12 section separator"></div>
        </div>
    </div>
@endsection
