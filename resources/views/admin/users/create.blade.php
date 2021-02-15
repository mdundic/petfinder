@extends('admin.layouts.master')

@section('title', trans('admin_user.create.heading'))

@section('content')
    <div class="container-fluid padding-bottom-xl">
        <div class="row">
            <div class="col-xs-12">
                <h3>@lang('admin_user.create.heading')</h3>
                <hr>
            </div>
        </div>
        <div class="row">

        @include('admin.partials.forms.user')
            <div class="form-actions">
                <button type="submit" class="submit btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-disk"></span>
                    @lang('global.create')
                </button>
            </div>
        </form>
        </div>
    </div>
@endsection
