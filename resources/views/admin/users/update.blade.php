@extends('admin.layouts.master')

@section('title', trans('admin_user.update.heading'))

@section('content')
    <div class="container-fluid padding-bottom-xl">
        <div class="row">
            <div class="col-xs-12">
                <h3>@lang('admin_user.update.heading')</h3>
                <hr>
            </div>
        </div>
        <div class="row">

        @include('admin.partials.forms.user')
            <div class="form-actions">
                <button type="submit" class="submit btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-disk"></span>
                    @lang('global.update')
                </button>
                <a href="{{ route('admin-user-delete', $user->id) }}" class="btn btn-danger btn-delete">
                    <i class="glyphicon glyphicon-trash" aria-hidden="true"></i> @lang('global.delete')
                </a>
            </div>
        </form>
        </div>
    </div>
@endsection
