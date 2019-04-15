@extends('layouts.shared')

@section('title', 'Manage')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/manage/change_done') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{csrf_token()}}">

                        <div class="form-group row">
                            <label for="current_psw" class="col-md-4 col-form-label text-md-right">{{ __('Current password') }}</label>

                            <div class="col-md-6">
                                <input id="current_psw" type="password" class="form-control{{ $errors->has('current_psw') ? ' is-invalid' : '' }}" name="current_psw" value="{{ $current_psw ?? old('current_psw') }}" required autofocus>

                                @if ($errors->has('current_psw'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_psw') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
