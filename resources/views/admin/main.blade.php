@extends('layouts.admin')

@section('content')
    <div class="admin-content welcome">
        @if(!Auth::guest() && Auth::user()->is_admin())
            <div class="welcome-text">
                <h1>@lang('admin.welcome1')</h1>
            </div>                     
            <div class="welcome-text">
                <p>@lang('admin.welcome2')</p>
            </div> 
        @elseif(!Auth::guest() && !Auth::user()->is_admin())    
            <div class="welcome-text">
                <h1>@lang('admin.welcome1')</h1>
            </div>                     
            <div class="welcome-text">
                <p>Please wait when another admin uesr approve your account to provide permissions to you.</p>
            </div>         
        @else
            <div class="welcome-text">
                <h1>@lang('admin.welcome1')</h1>
            </div>
            <div class="reg-buttons">
                <a href="{{url('/login')}}" class="hvr-hollow">Login</a>
                <a href="{{url('/register')}}" class="hvr-hollow">Register</a>
            </div>
            <div class="welcome-text">
                <p>Please login if you have already had account.</p>
                <p>Or register new account. After regestration admin user should approve your account to provide permissions to you.</p>
            </div>            
        @endif
    </div>
@endsection
