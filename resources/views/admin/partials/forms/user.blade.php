<form method="post"
    accept-charset="utf-8" id="user-form" class="form-horizontal">
    {{ csrf_field() }}
    <div class="personal-info well">
        <div class="form-group">
            <label for="first_name" class="col-sm-3 control-label">
                @lang('admin_user.first_name')
            </label>
            <div class="col-md-9">
                <input type="text" name="first_name" id="first_name" class="form-control"
                    value="{{ isset($user) ? old('first_name', $user->first_name) : old('first_name') }}">
                <span class="error">{{ $errors->first('first_name') }}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="last_name" class="col-sm-3 control-label">
                @lang('admin_user.last_name')
            </label>
            <div class="col-md-9">
                <input type="text" name="last_name" id="last_name" class="form-control"
                    value="{{ isset($user) ? old('last_name', $user->last_name) : old('last_name') }}">
                <span class="error">{{ $errors->first('last_name') }}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">
                @lang('admin_user.email')
            </label>
            <div class="col-md-9">
                <input type="text" name="email" id="email" class="form-control"
                    value="{{ isset($user) ? old('email', $user->email) : old('email') }}">
                <span class="error">{{ $errors->first('email') }}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-3 control-label">
                @lang('admin_user.password')
            </label>
            <div class="col-md-9">
                <input type="password" name="password" id="password" class="form-control">
                <span class="error">{{ $errors->first('password') }}</span>
            </div>
        </div>
        <div class="form-group">
            <label for="role" class="col-sm-3 control-label">
                @lang('admin_user.role')
            </label>
            <div class="col-md-9">
                <select name="role" id="role" class="form-control">
                    <option value="">@lang('global.please_select')</option>
                    @foreach (trans('admin_user.roles') as $key => $value)
                        <option
                            {{ isset($user) ?
                                (old('role', $user->role) === $key ? 'selected' : '') :
                                (old('role') === $key ? 'selected' : '')
                            }}
                            value="{{ $key }}">{{ $value }}
                        </option>
                    @endforeach
                </select>
                <span class="error">{{ $errors->first('role') }}</span>
            </div>
        </div>
