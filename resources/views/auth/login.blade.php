@extends('layouts.admin')

@section('content')
    <div class="admin-content">
        <div class="login-form">
            <h1>Sign in</h1>
            <form class="form-horizontal" role="form" method="POST" action="{{ LaravelLocalization::localizeURL('/login') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="wr">
                        <div class="l">
                            <label class="control-label">E-Mail Address : </label>
                        </div>
                        <div class="r">
                            <input type="email" class="form-control {{ $errors->has('email') ? ' has-error' : '' }}" name="email" value="">
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="wr">
                        <div class="l">
                            <label class="control-label">Password : </label>
                        </div>
                        <div class="r">
                            <input type="password" class="form-control {{ $errors->has('password') ? ' has-error' : '' }}" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="wr">
                        <div class="l"></div>
                        <div class="r">
                            <label class="checkbox">
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="wr">
                        <div class="l"></div>
                        <div class="r">
                            <button type="submit" class="btn btn-yellow">
                                Login
                            </button>
                            <!-- TODO 
                            <a class="form-link hvr-underline-from-center" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
