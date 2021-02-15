@extends('admin.layouts.master')

@section('title', trans('auth.login'))

<link href="{{ asset('css/admin/login.css') }}" rel="stylesheet">

@section('content')
<div class="container">
    <div class="row">
        <div class="account-wall">
            <img class="profile-img" src="/img/admin/profile.png" alt="">
            <form method="post" accept-charset="utf-8" id="login-form" class="form-signin">
                {{ csrf_field() }}
                <input type="text" name="email" class="form-control" placeholder="{{ trans('admin_user.email') }}" required autofocus>
                <input type="password" name="password" class="form-control" placeholder="{{ trans('admin_user.password') }}" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{ trans('auth.login') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection
