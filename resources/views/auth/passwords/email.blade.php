@extends('layouts.app')

<!-- Main Content -->
@section('content')
<section>
    <div class="admin-content">
        <div class="reset-pass-form">
            <h1>Reset Password</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="wr">
                        <div class="l">
                            <label class="control-label">E-Mail Address : </label>
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
                        <div class="l"></div>
                        <div class="r">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
