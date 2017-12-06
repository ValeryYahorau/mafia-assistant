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
                <p>Пожалуйста пододжите когда другой администратор подтвердит ваш аккаунт.</p>
            </div>         
        @else
            <div class="welcome-text">
                <h1>@lang('admin.welcome1')</h1>
            </div>
            <div class="welcome-text">
                <p>Здесь вы можете легко управлять контентом на вашем сайте.</p>
            </div>                       
            <div class="reg-buttons">
                <a href="{{url('/login')}}" class="hvr-hollow">Login</a>
                <a href="{{url('/register')}}" class="hvr-hollow">Register</a>
            </div>
            <div class="welcome-text">
                <p>Пожалуйста залогиньтесь, если у вас есть аккаунт.</p>
                <p>Или зарегестрируйте новый аккаунт.</p>
            </div>            
        @endif
    </div>
@endsection
