@extends('layouts.admin')

@section('content')
    <div class="admin-content">
        <div class="register-form">
            <h1>Register</h1>

            <form class="form-horizontal" role="form" method="POST" action="{{ LaravelLocalization::localizeURL('/register') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="wr">
                        <div class="l">
                            <label class="control-label">Name</label>
                        </div>
                        <div class="r">
                            <input type="text" class="form-control {{ $errors->has('name') ? ' has-error' : '' }}" name="name" value="">
                            @if ($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}<</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="wr">
                        <div class="l">
                            <label class="control-label">E-Mail Address</label>
                        </div>
                        <div class="r">
                            <input type="email" class="form-control{{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="">
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="wr">
                        <div class="l">
                            <label class="control-label">Password</label>
                        </div>
                        <div class="r">
                            <input type="password" class="form-control{{ $errors->has('password') ? ' has-error' : '' }}" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="wr">
                        <div class="l">
                            <label class="control-label">Confirm Password</label>
                        </div>
                        <div class="r">
                            <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' has-error' : '' }}" name="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="wr">
                        <div class="l"></div>
                        <div class="r">
                            <button type="submit" class="btn btn-yellow">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
