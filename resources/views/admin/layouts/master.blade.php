<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta-data')

    <link href="{{ asset(config('admin_asset.css.bootstrap')) }}" rel="stylesheet">
    <link href="{{ asset(config('admin_asset.css.bootstrap-datetimepicker')) }}" rel="stylesheet">
    <link href="{{ asset(config('admin_asset.css.bootstrap-multiselect')) }}" rel="stylesheet">
    <link href="{{ asset('css/admin/master.css') }}" rel="stylesheet">
    <link href="{{ asset(config('admin_asset.css.bootstrap-select')) }}" rel="stylesheet">
    @stack('styles')
</head>
<body>
<div class="wrapper" id="main-container">
    @if (Auth::check())
        <div class="sidebar-wrapper">
            @include('admin.partials.sidebar')
        </div>
    @endif
    <div class="main-wrapper padding-bottom-xl">
        @if (!empty(session('error')))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (!empty(session('success')))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </div>
</div>

<script src="{{ asset(config('admin_asset.js.jquery')) }}"></script>
<script src="{{ asset(config('admin_asset.js.moment')) }}"></script>
<script src="{{ asset(config('admin_asset.js.moment-locale-rs')) }}"></script>
<script src="{{ asset(config('admin_asset.js.bootstrap')) }}"></script>
<script src="{{ asset(config('admin_asset.js.bootstrap-datetimepicker')) }}"></script>
<script src="{{ asset(config('admin_asset.js.bootbox')) }}"></script>
<script src="{{ asset(config('admin_asset.js.bootstrap-multiselect')) }}"></script>
<script src="{{ asset(config('admin_asset.js.bootstrap-select')) }}"></script>
<script src="{{ asset('js/admin/master.js') }}"></script>
<script>
    var Translate = {
        global: {
            yes: '@lang('global.yes')',
            no: '@lang('global.no')',
            are_you_sure: '@lang('global.are_you_sure')',
            please_select: '@lang('global.please_select')',
            edit: '@lang('global.edit')',
            create: '@lang('global.create')',
            delete: '@lang('global.delete')',
            cancel: '@lang('global.cancel')',
            message_error: '@lang('global.message_error')',
            message_success_update: '@lang('global.message.success_update')',
            message_success_delete: '@lang('global.message.success_delete')'
        }
    };

</script>
@stack('footer-scripts')

</body>
</html>
