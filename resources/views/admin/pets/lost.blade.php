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
                <div class="table-responsive">
                    <table id="lost-pets-list-table" class="table table-hover table-striped">

                    </table>
                </div>
            </div>
            <div class="col-xs-12 section separator"></div>
        </div>
    </div>
@endsection
